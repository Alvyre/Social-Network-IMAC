<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\SubjectModel as Subject;
use App\Model\UserModel as User;
use App\Model\CategoryModel as Category;

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

        $subject = new Subject();
        $subject->titleSubject = $args['titleSubject'];
        $subject->contentSubject = $args['contentSubject'];
        $subject->dateSubject = date("Y-m-d");
        $subject->cat()->associate($args['idCat']);
        $subject->user()->associate($args['idUser']);
        $subject->save();


        $ar = array("created");
        echo json_encode($ar);


        return $response;
    }

    public function readAll(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = Subject::with('cat','user','comment','vote')->get();
  
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
        
        $ar = array("updated");
        echo json_encode($ar);

        return $response;
    }

    public function delete(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = Subject::where('titleSubject',$args['titleSubject'])->delete();

        $ar = array("deleted");
        echo json_encode($ar);

        return $response;
    }
}
