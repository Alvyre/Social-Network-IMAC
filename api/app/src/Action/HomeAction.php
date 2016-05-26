<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\SubjectModel as Subject;

final class HomeAction
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

    public function getRecentSubjects(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = Subject::orderBy('dateSubject', 'desc')
                ->take(5)
                ->get();
  
        echo $datas->toJson();
        
        return $response;
    }

    public function getMostPopular(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
//"SELECT * FROM subject, (SELECT IdSubject, COUNT(IdSubject) as nbCom from comment group by IdSubject) AS tempTable WHERE subject.IdSubject = tempTable.IdSubject ORDER BY tempTable.nbCom DESC LIMIT 5"
        
        $subjectComments = Subject::with('comment')->take(5)->get()->sortBy(function($post) {
            return $post->comment->count();
        }, SORT_REGULAR, true);

        echo $subjectComments;
        
        return $response;
    }
}