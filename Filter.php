<?php
namespace Asgard\Jsonentities;

class Filter extends \Asgard\Http\Filter {
	protected $serializer;

	public function __construct(\Asgard\Entity\Serializer $serializer=null) {
		if(!$serializer)
			$serializer = \Asgard\Entity\Serializer::singleton();
		$this->serializer = $serializer;
	}

	public function after(\Asgard\Http\Controller $controller, \Asgard\Http\Request $request, &$result) {
		if($result !== null) {
			if($result instanceof \Asgard\Entity\Entity) {
				$controller->response->setHeader('Content-Type', 'application/json');
				$result = $result->toJSON();
			}
			elseif(is_array($result)) {
				$controller->response->setHeader('Content-Type', 'application/json');
				$result = $this->serializer->arrayToJSON($result);
			}
		}
	}
}