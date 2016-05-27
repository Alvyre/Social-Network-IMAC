<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\VoteModel as Vote;

final class VoteAction
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

        $vote = new Vote();
        $vote->upVote = $args['upVote'];
        $vote->downVote = $args['downVote'];
        $vote->subject()->associate($args['idSubject']);
        $vote->user()->associate($args['idUser']);
        $vote->save();
        
        $ar = array("created");
        echo json_encode($ar);

        return $response;
    }
   
    public function readAll(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = Vote::with('subject','user')->get();

        echo $datas->toJson();

        return $response;
    }
     
     public function readOne(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = Vote::with('subject','user')
                ->where('idVote','like',$args['idVote'])
                ->get();
        
        echo $datas->toJson();

        return $response;
    }

     public function update(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        Vote::where('idVote', 'like', $args['idVote'])->update(array(
            'upVote' => $args['upVote'],
            'downVote' => $args['downVote']
            ));
        
        $ar = array("updated");
        echo json_encode($ar);

        return $response;
    }

     public function delete(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = Vote::where('upVote',$args['upVote'])->delete();
        
        $ar = array("deleted");
        echo json_encode($ar);

        return $response;
    }
}
