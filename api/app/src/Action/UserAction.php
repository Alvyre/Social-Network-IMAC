<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\UserModel as User;

final class UserAction
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

        User::firstOrCreate(array(
            'pseudoUser' => $args['pseudoUser'], 
            'statusUser' => $args['statusUser'], 
            'photoUser' => $args['photoUser'], 
            'emailUser' => $args['emailUser'], 
            'sexUser' => $args['sexUser'],
            'bioUser' => $args['bioUser'], 
            'passUser' => password_hash($args['passUser'],PASSWORD_BCRYPT))
        );

        $this->view->render($response, 'home.twig', [
            'datas' => 'true'
        ]);

        return $response;
    }

    public function readAll(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $datas = User::with('sub','comment')->get();
  
        echo $datas->toJson();

        return $response;
    }

    public function readOne(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $datas = User::where('idUser', $args['idUser'])->get();
  
        echo $datas->toJson();
        
        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");


        User::where('idUser', 'like', $args['idUser'])->update(array('pseudoUser' => $args['pseudoUser']));

        $this->view->render($response, 'home.twig', [
            'datas' => 'Utilisateur modifié !'
        ]);

        return $response;
    }

    public function delete(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        User::where('pseudoUser',$args['pseudoUser'])->delete();
        
        $this->view->render($response, 'home.twig', [
            'datas' => 'Utilisateur supprimé !'
        ]);

        return $response;
    }

     public function login(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $login = $args['pseudoUser'];
        $password = $args['password'];

        $data = User::where('pseudoUser', 'like', $login)->select('idUser','pseudoUser','passUser')->get();
        
        foreach ($data as $val) {
            $goodPass= $val->passUser;
            $result = $val->idUser;
            $result = $result." ".$val->pseudoUser;
        
        }
        
        $data->toJson();
        foreach ($data as $val) {
            unset($data[1]);
        }
        echo $data;

        if(password_verify($password,$goodPass)) {
           $result = $result.' 1';
        }
        else echo 'pas ouais';       

            echo $result;

        $this->view->render($response, 'home.twig', [
            'datas' => 'Utilisateur modifié !'
        ]);

        return $response;
    }

}