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

        $comment = new Comment();
        $comment->contentComment = $args['contentComment'];
        $comment->dateComment = date("Y-m-d");
        $comment->subject()->associate($args['idSubject']);
        $comment->user()->associate($args['idUser']);
        $comment->save();

        $ar = array("created");
        echo json_encode($ar);

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

        Comment::where('idcomment', 'like', $args['idComment'])->update(array('idComment' => $args['idComment']));

        $ar = array("updated");
        echo json_encode($ar);
    }

    public function delete(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        Comment::where('idComment',$args['idComment'])->delete();
        
        $ar = array("deleted");
        echo json_encode($ar);
    
        return $response;
    }
}
