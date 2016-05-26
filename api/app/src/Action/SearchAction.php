<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\CategoryModel as Category;
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
        $categoryResults = "";
        $commentResults = "";
        $userResults = "";
        for ($i=0; $i < count($optionsTab); $i++) { 
            switch ($optionsTab[$i]) {
                case 'category':
                    $categoryResults = Category::where('titleCat', 'LIKE', '%'.$tag.'%')->get();
                break;

                case 'comment':
                    $commentResults = Comment::where('contentComment', 'LIKE', '%'.$tag.'%')->get();
                break;
                
                case 'user':
                    $userResults = User::where('pseudoUser', 'LIKE', '%'.$tag.'%')->get();
                break;
                
                
                default:
                    # code...
                break;
            }
        }


        // $categoryResults = Category::where('titleCat',$args['titleCat'])->get();
        // $commentResults = Comment::where('titleCat',$args['titleCat'])->get();
        // $userResults = User::where('titleCat',$args['titleCat'])->get();
        
        /*$this->view->render($response, 'home.twig', [
            'categoryResults' => $categoryResults,
            'commentResults' => $commentResults,
            'userResults' => $userResults
            ]);*/


        $categoryResultsArray = array();
        foreach($categoryResults as $v) {
            $categoryResultsArray[key($v)] = current($v);
        }
        $catRes = json_encode($categoryResultsArray, 128);

        $commentResultsArray = array();
        foreach($categoryResults as $v) {
            $commentResultsArray[key($v)] = current($v);
        }
        $commentRes= json_encode($commentResultsArray, 128);

        $userResultsArray = array();
        foreach($categoryResults as $v) {
            $userResultsArray[key($v)] = current($v);
        }
         $userRes = json_encode($userResultsArray, 128);

        echo json_encode(array_merge(json_decode($catRes,true),json_decode($commentRes,true),json_decode($userRes,true)));

        /*echo json_encode($categoryResults);
        echo json_encode($commentResults);
        echo json_encode($userResults);*/

        return $response;
    }
}
