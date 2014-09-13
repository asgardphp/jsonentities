<?php
namespace Asgard\Jsonentities;

class Bundle extends \Asgard\Core\BundleLoader {
	public function run(\Asgard\Container\Container $container) {
		$container['httpKernel']->filterAll('Asgard\Jsonentities\Filter');
	}
}