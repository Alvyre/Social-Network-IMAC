<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\CategoryModel as Category;

final class CategoryAction
{
    private $view;
    private $logger;
    protected $table;

    public function __construct(Twig $view, LoggerInterface $logger, $table)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->table = $table;
    }

    public function create(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        Category::firstOrCreate(array('titleCat' => $args['titleCat']));

        $this->view->render($response, 'home.twig', [
            'datas' => 'Catégorie ajouté !'
        ]);

        return $response;
    }

    public function readAll(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = Category::all();
  
        $this->view->render($response, 'home.twig', [
            'datas' => $datas
        ]);

        return $response;
    }

    public function readOne(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = Category::where('idCat', $args['idCat'])->get();
  
        echo $datas->toJson();
        
        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        Category::where('idCat', 'like', $args['idCat'])->update(array('titleCat' => $args['titleCat']));

        $this->view->render($response, 'home.twig', [
            'datas' => 'Catégorie modifié !'
        ]);

        return $response;
    }

    public function delete(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        Category::where('titleCat',$args['titleCat'])->delete();
        
        $this->view->render($response, 'home.twig', [
            'datas' => 'Catégorie supprimé !'
        ]);

        return $response;
    }
}
