<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\SubjectModel as Subject;
use App\Model\CommentModel as Comment;
use App\Model\UserModel as User;


final class SearchAction
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



    public function research(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        $tag = $args['tag'];
        $optionsTab[0] = $args['option1'];
        $optionsTab[1] = $args['option2'];
        $optionsTab[2] = $args['option3'];
        /* init */
        $subjectResults = "";
        $commentResults = "";
        $userResults = "";
        for ($i=0; $i < count($optionsTab); $i++) { 
            switch ($optionsTab[$i]) {
                case 'subject':
                    $subjectResults = Subject::where('titleSubject', 'LIKE', '%'.$tag.'%')->get();
                    echo json_encode($subjectResults);
                break;

                case 'comment':
                    $commentResults = Comment::where('contentComment', 'LIKE', '%'.$tag.'%')->get();
                    echo json_encode($commentResults);
                break;
                
                case 'user':
                    $userResults = User::where('pseudoUser', 'LIKE', '%'.$tag.'%')->get();
                    echo json_encode($userResults);
                break;
                
                
                default:
                    # code...
                break;
            }
        }

        return $response;
    }
}
