<?php
/**
*
*/
namespace Kernel\Routing;

use Kernel\Server\Server;

class Router
{
    private $methods = [
        'GET', 'POST'
    ];

    private $routes = [];

    private $server;

    public function __construct()
    {
        $this->server = new Server();
    }

    public function on($method, $path, $callback)
    {
        $path = $this->checkPath($path);

        $node_rote = [$path, $callback];

        $this->addNodeRouteList($method, $node_rote);

        return $this;
    }

    private function addNodeRouteList($method, $node_rote)
    {
        $method = $this->checkMethod($method);

        if (!array_key_exists($method, $this->routes)) {
            $this->routes[$method] = [];
        }

        if (!in_array($node_rote, $this->routes[$method])) {
            array_push($this->routes[$method], $node_rote);
        }
    }

    public function getListRoutes()
    {
        return  $this->routes;
    }

    private function checkPath($path)
    {
        $uri = substr($path, 0, 1) !== '/' ? '/' . $path : $path;
        $pattern = str_replace('/', '\/', $uri);
        $pattern = preg_replace('/{(.*?)}/','(.*?)',$pattern);
        $route = '/^' . $pattern . '$/';
        return $route;
    }

    private function checkMethod($method)
    {
        $method = strtoupper($method);

        if (!in_array($method, $this->methods)) {
            throw new \Exception("Method {$method}, não suportado pela rota, Utilize GET OU POST", 1);
        }
        return $method;
    }

    private function checkUriFromServer(Server $server)
    {
        $self = isset($server->php_self) ? str_replace('index.php/', '', $server->php_self) : '';

        $uri = explode('?', $server->request_uri)[0];

        if ($self !== $uri) {
            $peaces = explode('/', $self);
            array_pop($peaces);
            $start = implode('/', $peaces);
            $search = '/' . preg_quote($start, '/') . '/';
            $uri = preg_replace($search, '', $uri, 1);
        }

        return $uri;
    }

    public function run (Server $server = null)
    {
        $server = is_null($server) ? $this->server : $server;
        $uri = $this->checkUriFromServer($server);
        foreach ($this->routes[$server->request_method] as $route) {
            if(preg_match($route[0], $uri, $parameters)) {
                array_shift($parameters);
                return call_user_func_array($route[1], $parameters);
            }
        }

        throw new \Exception("Rota não encontrada", 1);
    }

}