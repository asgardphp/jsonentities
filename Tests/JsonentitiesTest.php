<?php
namespace Asgard\Jsonentities\Tests;

class JsonentitiesTest extends \PHPUnit_Framework_TestCase {
	public function testJson() {
		$container = new \Asgard\Container\Container;
		$container['hooks'] = new \Asgard\Hook\HooksManager($container);
		$container['cache'] = new \Asgard\Cache\NullCache();
		$container['config'] = new \Asgard\Config\Config();
		$container['entitiesmanager'] = new \Asgard\Entity\EntitiesManager($container);

		$controller = new Fixtures\Controller($container);
		$controller->addFilter(new \Asgard\Jsonentities\Filter);
		$res = $controller->run('index');

		$this->assertEquals('[{"title":"The title 1!","content":"The content 1!"},{"title":"The title 2!","content":"The content 2!"}]', $res->content);

		$controller = new Fixtures\Controller($container);
		$controller->addFilter(new \Asgard\Jsonentities\Filter);
		$res = $controller->run('show');

		$this->assertEquals('{"title":"The title!","content":"The content!"}', $res->content);
	}
}