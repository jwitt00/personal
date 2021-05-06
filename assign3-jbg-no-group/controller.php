<?php
    include_once "controllers/ControllerAction.php";
    include_once "controllers/ArticleControllers.php";
    include_once "models/ArticlesDAO.php";
    include_once "models/UserDAO.php";
    include_once "models/CommentDAO.php";

    class FrontController { 
        private $controllers;
        

        public function __construct(){
            $this->showErrors(1);
            $this->controllers = $this->loadControllers();
        }

        public function run(){
            session_start();

            //***** 1. Get Request Method and Page Variable *****/
            $method = $_SERVER['REQUEST_METHOD'];
            $page = $_REQUEST['page'];
        
            //***** 2. Route the Request to the Controller Based on Method and Page ****/
            $controller = $this->controllers[$method.$page];
            
            //** 3. Check Security Access ***/
            if($controller == null){
                $controller = $this->controllers['GET'.'home'];
            }
            $controller = $this->securityCheck($controller);

            //** 4. Execute the Controller */
            if($method=='GET'){
                $content=$controller->processGET();
            }
            if($method=='POST'){
                $controller->processPOST();
            }

            //**** 5. Render Page Template */
            include "template/template.php";
        }

        private function loadControllers(){
        /******************************************************
         * Register the Controllers with the Front Controller *
         ******************************************************/
            $controllers["GET"."listArticles"] = new ArticleList();
            $controllers["POST"."listArticles"] = new ArticleList();
            $controllers["GET"."addArticle"] = new ArticleAdd();
            $controllers["POST"."addArticle"] = new ArticleAdd();
            $controllers["GET"."deleteArticle"] = new ArticleDelete();
            $controllers["POST"."deleteArticle"] = new ArticleDelete();
            $controllers["GET"."login"] = new Login();
            $controllers["POST"."login"] = new Login();
            $controllers["GET"."home"] = new Home();
            $controllers["GET"."about"] = new About();
            $controllers["GET"."register"] = new Register();
            $controllers["POST"."register"] = new Register();
            $controllers["GET"."listComments"] = new ListComments();
            $controllers["POST"."listComments"] = new ListComments();
            $controllers["POST"."admin"] = new Admin();
            $controllers["GET"."admin"] = new Admin();
            
            return $controllers;
        }

        private function securityCheck($controller){
        /******************************************************
         * Check Access restrictions for selected controller  *
         ******************************************************/
            if($controller->getAccess()=='PROTECTED'){
                if(!isset($_SESSION['loggedin'])){
                    //*** Not Logged In ****/
                    $controller = $this->controllers["GET"."login"];
                }
            }
            return $controller;
        }

        private function showErrors($debug){
            if($debug==1){
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
            }
        }
    }

    $controller = new FrontController();
    $controller->run();
?>