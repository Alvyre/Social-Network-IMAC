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
        
        $comments = Subject::with('comment')->get()->first();


        echo "\n\n\n5 Most popular :";
        echo $comments->toJson();
        
        return $response;
    }
}
