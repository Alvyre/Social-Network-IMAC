<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\CommentModel as Comment;

final class CommentAction
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

        echo $datas->toJson();

        return $response;
    }

    public function readAll(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = Comment::all();

        echo $datas->toJson();

        return $response;
    }

    public function readOne(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = Comment::first();

        echo $datas->toJson();

        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        User::where('idUser', 'like', $args['idUser'])->update(array('pseudoUser' => $args['pseudoUser']));

        $this->view->render($response, 'home.twig', [
            'datas' => 'Utilisateur modifié !'
        ]);
    }

    public function delete(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        User::where('idComment',$args['idComment'])->delete();
        
        $this->view->render($response, 'home.twig', [
            'datas' => 'commentaire supprimé !'
        ]);
    
        return $response;
    }
}
