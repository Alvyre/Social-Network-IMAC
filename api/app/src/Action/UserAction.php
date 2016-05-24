<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\UserModel as User;

final class UserAction
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

        $datas = $this->table->get();
        
        $this->view->render($response, 'home.twig', [
            'datas' => $datas
        ]);

        return $response;
    }

    public function readAll(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = User::all();
  
        $this->view->render($response, 'home.twig', [
            'datas' => $datas
        ]);

        return $response;
    }

    public function readOne(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = User::where('idUser', 2)->get();
  
        echo $datas->toJson();
        
        // $this->view->render($response, 'home.twig', [
        //     'datas' => $datas
        // ]);

        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = $this->table->get();
        
        $this->view->render($response, 'home.twig', [
            'datas' => $datas
        ]);

        return $response;
    }

    public function delete(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $route = $request->getAttribute('route');
        $pseudoUser = $route->getArgument('pseudoUser');

        $datas = User::delete($pseudoUser);
        
        $this->view->render($response, 'home.twig', [
            'datas' => $datas
        ]);

        return $response;
    }
}