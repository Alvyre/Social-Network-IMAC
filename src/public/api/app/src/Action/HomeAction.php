<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HomeAction
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
}
