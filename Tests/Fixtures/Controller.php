<?php
namespace Asgard\Jsonentities\Tests\Fixtures;

class Controller extends \Asgard\Http\Controller {
	public function indexAction(\Asgard\Http\Request $request) {
		$ent1 = new Entity(['title'=>'The title 1!', 'content'=>'The content 1!']);
		$ent2 = new Entity(['title'=>'The title 2!', 'content'=>'The content 2!']);
		return [$ent1, $ent2];
	}

	public function showAction(\Asgard\Http\Request $request) {
		return new Entity(['title'=>'The title!', 'content'=>'The content!']);
	}
}