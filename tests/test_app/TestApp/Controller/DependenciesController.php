<?php
declare(strict_types=1);

namespace TestApp\Controller;

use Cake\Controller\ComponentRegistry;
use Cake\Controller\Controller;
use Cake\Event\EventManagerInterface;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use stdClass;

/**
 * DependenciesController class
 */
class DependenciesController extends Controller
{
    public function __construct(
        ?ServerRequest $request = null,
        ?Response $response = null,
        ?string $name = null,
        ?EventManagerInterface $eventManager = null,
        ?ComponentRegistry $components = null,
        ?stdClass $inject = null
    ) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->inject = $inject;
    }

    public function optionalDep($any = null, ?string $str = null, ?stdClass $dep = null)
    {
        return $this->response->withStringBody(json_encode(compact('dep', 'any', 'str')));
    }

    public function requiredDep(stdClass $dep, $any = null, ?string $str = null)
    {
        return $this->response->withStringBody(json_encode(compact('dep', 'any', 'str')));
    }
}