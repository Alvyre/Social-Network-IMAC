<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\SubjectModel as Subject;

final class SubjectAction
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

        Subject::firstOrCreate(array(
            'titleSubject' => $args['titleSubject'], 
            'contentSubject' => $args['contentSubject'], 
            'dateSubject' => $args['dateSubject'])
        );
  
        $this->view->render($response, 'home.twig', [
            'datas' => 'La CorentAction du subject fonctionne!'
        ]);


        return $response;
    }

    public function readAll(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = Subject::with('cat','user','comment')->get();
  
        echo $datas;

        return $response;
    }

    public function readOne(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = Subject::with('cat','user','comment')
                ->where('idSubject','like',$args['idSubject'])
                ->get();
  
        echo $datas->toJson();

        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        Subject::where('idSubject', 'like', $args['idSubject'])->update(array(
            'titleSubject' => $args['titleSubject'],
            'contentSubject' => $args['contentSubject']
        ));
        
        $this->view->render($response, 'home.twig', [
            'datas' => 'Sujet mis à jour magueule'
        ]);

        return $response;
    }

    public function delete(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = Subject::where('titleSubject',$args['titleSubject'])->delete();

        return $response;
    }
}
