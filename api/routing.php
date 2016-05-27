<?php
    /**
     * ROUTING CLASS
     */
    class ROUTING {
        private $root;
        private $request;
        private $routes;
        private $route;
        private $parameter;
        function __construct(){
            //TODO : Remplacer avec un __DIR__
            $_this = $this;
            $this->root = __DIR__.'\\';
            $this->request = $_SERVER['REQUEST_URI'];
            $this->route = $this->root;
            $this->parameter = array();
            $this->routes = json_decode(file_get_contents(__DIR__ ."/routes.json"),true);
            if($this->routes == null){
                echo "Error on JSON file";
                exit;
            }
            $parameter = explode('/',$this->request);
            $parameter = $parameter[count($parameter) -1];
            $request = substr($this->request,0,strrpos($this->request,'/'));
            $request = explode('/',$request);
            $indexOfApi = array_search("api",$request);
            $new_request = "";
            for($i = ($indexOfApi + 1); $i < count($request); $i ++){
                $new_request .= $request[$i].'/';
            }
            $fail_finding_parameter = true;
            $this->request = $new_request;
            $this->parameter = array();
            if($parameter != ''){
                foreach($this->routes as $name => $route){
                    //On récupère les routes avec paramètres
                    if(strpos($name,'{') !== false){
                        $tmpName = explode('/',$name);
                        $variable = substr($tmpName[1],1,-1);
                        $tmpRoute = "";
                        foreach($tmpName as $tmp){
                            if($tmp != $tmpName[count($tmpName) - 1]){
                                $tmpRoute.= $tmp.'/';
                            }
                        }
                        if($_this->request == $tmpRoute){
                            array_push($_this->parameter,$parameter);
                            $_this->route = $_this->routes[$name]["request"];
                            $fail_finding_parameter = false;
                            return;
                        }
                    }
                }
            }
            if($fail_finding_parameter){
                if(array_key_exists($this->request,$this->routes)){
                    $this->route = $this->routes[$this->request]["request"];
                } else {
                    //$this->route = $this->routes["404/"]["request"];
                }
            }
        }
        function getRoute(){
            return $this->route;
        }
        function getParameter(){
            return $this->parameter;
        }
        function getRoot(){
            return $this->root;
        }
    }
?>