<?php

declare (strict_types=1);

namespace Koalati\Utils\Rector;

use Koalati\Webflow\Api\Client;
use Koalati\Webflow\Api\SiteClient;
use LogicException;
use PhpParser\Builder\Param;
use PhpParser\Comment\Doc;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\ComplexType;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\IntersectionType;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\UnionType;
use Rector\Core\Rector\AbstractRector;
use ReflectionClass;
use ReflectionClassConstant;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionType;
use ReflectionUnionType;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class MaintainSiteClientParityRector extends AbstractRector
{
	public function getRuleDefinition() : RuleDefinition
	{
		return new RuleDefinition('Updates the `SiteClient` class to have complete feature parity with `Client`.');
	}

	/**
	 * @return array<class-string<Node>>
	 */
	public function getNodeTypes() : array
	{
		return [Class_::class];
	}

	/**
	 * @param Class_ $node
	 */
	public function refactor(Node $node) : ?Node
	{
		if ($node->namespacedName != SiteClient::class) {
			return null;
		}

		$clientReflection = new ReflectionClass(Client::class);

		foreach ($clientReflection->getMethods(ReflectionClassConstant::IS_PUBLIC) as $originalMethod) {
			if ($originalMethod->name == "__construct") {
				continue;
			}
			
			$method = $node->getMethod($originalMethod->name);

			if (!$method) {
				$method = $this->createMethod($originalMethod);
				$node->stmts[] = $method;
			}

			$this->syncParameters($method, $originalMethod);
			$this->syncReturnType($method, $originalMethod);
			$this->syncDocblock($method, $originalMethod);
		}

		return $node;
	}

	private function createMethod(ReflectionMethod $originalMethod): ClassMethod
	{
		return new ClassMethod($originalMethod->name, ['flags' => Class_::MODIFIER_PUBLIC]);
	}

	private function syncParameters(ClassMethod $method, ReflectionMethod $originalMethod): void
	{
		$originalParameters = $originalMethod->getParameters();
		$parameters = [];
		$innerArguments = [];

		foreach ($originalParameters as $originalParameter) {
			if ($originalParameter->name == "siteId") {
				$innerArguments[] = new Arg(new PropertyFetch(new Variable("this"), $originalParameter->getName()));
				continue;
			}

			$paramBuilder = new Param($originalParameter->name);
			$paramBuilder->setType(self::createType($originalParameter->getType()));

			if ($originalParameter->isDefaultValueAvailable()) {
				$paramBuilder->setDefault($originalParameter->getDefaultValue());
			}
				
			if ($originalParameter->isPassedByReference()) {
				$paramBuilder->makeByRef();
			}

			$parameters[] = $paramBuilder->getNode();
			$innerArguments[] = new Arg(new Variable($originalParameter->getName()));
		}

		$method->params = $parameters;
		$method->stmts = [
			new Return_(
				$this->nodeFactory->createMethodCall(
					new PropertyFetch(new Variable("this"), "client"),
					$originalMethod->name,
					$innerArguments,
				)
			)
		];
	}

	private function syncReturnType(ClassMethod $method, ReflectionMethod $originalMethod): void
	{
		$method->returnType = self::createType($originalMethod->getReturnType());
	}
	

	private function syncDocblock(ClassMethod $method, ReflectionMethod $originalMethod): void
	{
		$docblock = $originalMethod->getDocComment();

		if (!$docblock) {
			return;
		}
		
		// Ensures that there is no PHPDoc for the $siteId parameter
		$expectedDocblock = preg_replace('~^\s+\* @param string(?:\|Site)? \$siteId\s+.+\n~', '', $docblock);

		if ($method->getDocComment()?->getText() != $docblock) {
			$method->setDocComment(new Doc($expectedDocblock));
		}
	}

	private static function createType(ReflectionType $reflectionType): Name|Identifier|ComplexType
	{
		if ($reflectionType instanceof ReflectionNamedType) {
			$nameString = $reflectionType->getName();

			if (str_contains('\\', $nameString)) {
				$nameString = "\\" . $nameString;
			}

			if ($reflectionType->allowsNull()) {
				return new NullableType(new Name($nameString, ['originalName' => new Name($nameString)]));
			}

			return new Name($nameString, ['originalName' => new Name($nameString)]);
		} 
		
		if ($reflectionType instanceof ReflectionUnionType) {
			return new UnionType(
				array_map(fn (ReflectionNamedType $type) => self::createType($type), $reflectionType->getTypes())
			);
		}
		
		if ($reflectionType instanceof ReflectionUnionType) {
			return new IntersectionType(
				array_map(fn (ReflectionNamedType $type) => self::createType($type), $reflectionType->getTypes())
			);
		}

		throw new LogicException("Unexpected ReflectionType received");
	}
}
