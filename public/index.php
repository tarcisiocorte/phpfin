<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use SONFin\Application;
use SONFin\Plugins\RoutePlugin;
use SONFin\Plugins\ViewPlugin;
use SONFin\ServiceContainer;
use SONFin\Plugins\DbPlugin;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());

//$app->get('/{name}', function(ServerRequestInterface $request) use($app){
//    $view = $app->service('view.renderer');
//    return $view->render('test.html.twig', ['name' => $request->getAttribute('name')]);
//});

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request){
    $response = new \Zend\Diactoros\Response();
    $response->getBody()->write("response com emmiter do diactoros");
    return $response;
});

$app->get('/category-costs', function() use($app){
    $view = $app->service('view.renderer');
    $meuModel = new \SONFin\Models\CategoryCost();
    $categories = $meuModel->all();
    return $view->render('category-costs/list.html.twig', [
        'categories' => $categories
    ]);
});

$app
    ->get('/category-costs', function() use($app){
        $meuModel = new CategoryCost();
        $categories = $meuModel->all();
        $view = $app->service('view.renderer');
        return $view->render('category-costs/list.html.twig',[
            'categories' => $categories
        ]);
    }, 'category-costs.list')
    ->get('/category-costs/new', function() use($app){
        $view = $app->service('view.renderer');
        return $view->render('category-costs/create.html.twig');
    }, 'category-costs.new')
    ->get('/category-costs/{id}/edit', function(ServerRequestInterface $request) use($app){
        $view = $app->service('view.renderer');
        $id = $request->getAttribute('id');
        $category = \SONFin\Models\CategoryCost::findOrFail($id);
        return $view->render('category-costs/edit.html.twig', [
            'category' => $category
        ]);
    }, 'category-costs.edit')
    ->post('/category-costs/{id}/update', function(ServerRequestInterface $request) use($app) {
        $id = $request->getAttribute('id');
        $category = \SONFin\Models\CategoryCost::findOrFail($id);
        $data = $request->getParsedBody();
        $category->fill($data);
        $category->save();
        return $app->route('category-costs.list');
    }, 'category-costs.update')
    ->post('/category-costs/store', function(ServerRequestInterface $request) use($app){
        $data = $request->getParsedBody();
        SONFin\Models\CategoryCost::create($data);
        return $app->route('category-costs.list');
    }, 'category-costs.store');

$app->start();