<?php
/**
*
*/
namespace Kernel\Server;

class Server
{
        private $document_root;
        private $remote_addr;
        private $remote_port;
        private $server_software;
        private $server_protocol;
        private $server_name;
        private $server_port;
        private $request_uri;
        private $request_method;
        private $script_name;
        private $script_filename;
        // private $path_info;
        private $php_self;
        private $http_host;
        private $http_connection;
        // private $http_cache_control;
        private $http_user_agent;
        private $http_upgrade_insecure_requests;
        private $http_accept;
        private $http_accept_encoding;
        private $http_accept_language;
        private $http_cookie;
        private $request_time_float;
        private $request_time;

    function __construct()
    {
        $this->document_root = $_SERVER['DOCUMENT_ROOT'];
        $this->remote_addr = $_SERVER['REMOTE_ADDR'];
        $this->remote_port = $_SERVER['REMOTE_PORT'];
        $this->server_software = $_SERVER['SERVER_SOFTWARE'];
        $this->server_protocol = $_SERVER['SERVER_PROTOCOL'];
        $this->server_name = $_SERVER['SERVER_NAME'];
        $this->server_port = $_SERVER['SERVER_PORT'];
        $this->request_uri = $_SERVER['REQUEST_URI'];
        $this->request_method = $_SERVER['REQUEST_METHOD'];
        $this->script_name = $_SERVER['SCRIPT_NAME'];
        $this->script_filename = $_SERVER['SCRIPT_FILENAME'];
        // $this->path_info = $_SERVER['PATH_INFO'];
        $this->php_self = $_SERVER['PHP_SELF'];
        $this->http_host = $_SERVER['HTTP_HOST'];
        $this->http_connection = $_SERVER['HTTP_CONNECTION'];
        // $this->http_cache_control = $_SERVER['HTTP_CACHE_CONTROL'];
        $this->http_user_agent = $_SERVER['HTTP_USER_AGENT'];
        $this->http_upgrade_insecure_requests = $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'];
        $this->http_accept = $_SERVER['HTTP_ACCEPT'];
        $this->http_accept_encoding = $_SERVER['HTTP_ACCEPT_ENCODING'];
        $this->http_accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $this->http_cookie = $_SERVER['HTTP_COOKIE'];
        $this->request_time_float = $_SERVER['REQUEST_TIME_FLOAT'];
        $this->request_time = $_SERVER['REQUEST_TIME'];
    }

    public function __get($attribute)
    {
        return trim($this->{$attribute});
    }
}