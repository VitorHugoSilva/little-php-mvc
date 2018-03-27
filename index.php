<?php
ini_set('display_errors', true);
function dd($data) {
    echo "<pre>";
    var_dump($data);
    die();
}

require __DIR__.'/bootstrap/autolad.php';

use Routing\Router;

$rotas = new Router();

$rotas->on('GET', '/teste/{to}/action/{to2}', function($to, $to2){
    echo 'estou aqui'. $to.'   '. $to2;
})
->on('GET','/',function(){
    echo "olá";
});
// ->on('POST', '/dd', function(){
//     echo "roda 2";
// })
// ->on('POST', '/dd', function(){
//     echo "roda 2";
// });

// dd($server->request_method);
$rotas->run();
//$server->request_method, $server->request_uri
// dd($rotas->getListRoutes());
// dd($server);

// {(.*?)}