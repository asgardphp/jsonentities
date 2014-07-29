<?php
namespace Asgard\Jsonentities;

class Bundle extends \Asgard\Core\BundleLoader {
	public function run($container) {
		$container['httpKernel']->filterAll('Asgard\Jsonentities\Filter');
	}
}