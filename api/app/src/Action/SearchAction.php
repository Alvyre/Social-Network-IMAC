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
                    $categoryResults = Category::where('titleCat',$tag)->get();
                break;

                case 'comment':
                    $commentResults = Comment::where('contentComment',$tag)->get();
                break;
                
                case 'user':
                    $userResults = User::where('pseudoUser',$tag)->get();
                break;
                
                
                default:
                    # code...
                break;
            }
        }


        // $categoryResults = Category::where('titleCat',$args['titleCat'])->get();
        // $commentResults = Comment::where('titleCat',$args['titleCat'])->get();
        // $userResults = User::where('titleCat',$args['titleCat'])->get();
        
        $this->view->render($response, 'home.twig', [
            'categoryResults' => $categoryResults,
            'commentResults' => $commentResults,
            'userResults' => $userResults
            ]);

        return $response;
    }
}
