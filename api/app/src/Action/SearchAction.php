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
        $option1 = $args['option1'];
        $option2 = $args['option2'];
        $option3 = $args['option3'];


   
        $categoryResults = Category::where('titleCat',$args['titleCat'])->get();
        $commentResults = Comment::where('titleCat',$args['titleCat'])->get();
        $userResults = User::where('titleCat',$args['titleCat'])->get();
        
        $this->view->render($response, 'home.twig', [
            'datas' => 'Catégorie supprimé !'
        ]);

        return $response;
    }
}
