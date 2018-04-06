<?php

namespace Kernel;
/**
*
*/
use Kernel\Routing\Router;
use Kernel\Server\Server;

class Kernel
{
    public $router_file = __DIR__.'/../../router/router.php';

    private $route;
    private $server;

    public function __construct()
    {
        $this->route = new Router();
        $this->server = new Server();
    }
    public function start()
    {
        $route = $this->route;
        if(file_exists($this->router_file)) {
            require $this->router_file;
        }
        $route->run($this->server);
    }


}