<?php
namespace PHPFin\Plugins;

use Aura\Router\RouterContainer;
use PHPFin\ServiceContainerInterface;

class RoutePlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer();

        /* Registrar as rotas da aplicação */
        $map = $routerContainer->getMap();

        /* Tem a função de identificar a rota que está sendo acessada */
        $matcher = $routerContainer->getMatcher();

        /* Tem a funão de gerar links com base nas rotas registradas*/
        $generator = $routerContainer->getGenerator();

        // posso user qualquer nome, mas é ideal usar nomes que ajudem
        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
    }
}
?>
