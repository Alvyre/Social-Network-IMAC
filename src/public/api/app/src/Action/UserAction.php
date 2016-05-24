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

    public function __construct(Twig $view, LoggerInterface $logger, Builder $table)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->table = $table;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = $this->table->get();
        
        $this->view->render($response, 'home.twig', [
            'datas' => $datas
        ]);

        return $response;
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

    public function read(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = Home::all();

        $route = $request->getAttribute('route');
        $userId = $route->getArgument('id');

        $datas = $this->table->get();
        
        $this->view->render($response, 'home.twig', [
            'datas' => $datas
        ]);

        return $response;
    }

    public function delete(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = $this->table->get();
        
        $this->view->render($response, 'home.twig', [
            'datas' => $datas
        ]);

        return $response;
    }

    public function edit(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = $this->table->get();
        
        $this->view->render($response, 'home.twig', [
            'datas' => $datas
        ]);

        return $response;
    }
}
