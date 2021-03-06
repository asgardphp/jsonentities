<?php
namespace Asgard\Jsonentities\Tests;

class JsonentitiesTest extends \PHPUnit_Framework_TestCase {
	public function testJson() {
		$container = new \Asgard\Container\Container;
		$container['hooks'] = new \Asgard\Hook\HookManager($container);
		$container['cache'] = new \Asgard\Cache\NullCache();
		$container['config'] = new \Asgard\Config\Config();
		$container['entityManager'] = new \Asgard\Entity\EntityManager($container);

		$controller = new Fixtures\Controller($container);
		$controller->addFilter(new \Asgard\Jsonentities\Filter);
		$res = $controller->run('index');

		$this->assertEquals('[{"id":null,"title":"The title 1!","content":"The content 1!"},{"id":null,"title":"The title 2!","content":"The content 2!"}]', $res->getContent());

		$controller = new Fixtures\Controller($container);
		$controller->addFilter(new \Asgard\Jsonentities\Filter);
		$res = $controller->run('show');

		$this->assertEquals('{"id":null,"title":"The title!","content":"The content!"}', $res->getContent());
	}
}