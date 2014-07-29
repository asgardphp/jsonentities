<?php
namespace Asgard\Jsonentities\Tests\Fixtures;

class Entity extends \Asgard\Entity\Entity {
	public static function definition(\Asgard\Entity\EntityDefinition $definition) {
		$definition->properties = [
			'title',
			'content',
		];
	}
}