<?php
    //include "ControllerAction.php";
    //include "model/ContactDAO.php";


    class ArticleList implements ControllerAction{

        function processGET(){
            $articleDAO = new ArticlesDAO();
            $articles = $articleDAO->getArticles();
            $_REQUEST['articles']=$articles;
            return "views/listArticles.php";
        }

        function processPOST(){
            $articleID = $_POST['articleID'];
            $_SESSION['articleID'] = $articleID;
        
            header("Location: controller.php?page=listComments");
        
        }

        function getAccess(){
            return "PUBLIC";
        }

    }

    class ArticleAdd implements ControllerAction{

        function processGET(){
            return "views/addArticle.php";
        }

        function processPOST(){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $authorID = $_POST['authorID'];
            $catID = $_POST['catID'];

            $article = new Article();
            $article->setTitle($title);
            $article->setContent($content);
            $article->setImage($image);
            $article->setAuthorID($authorID);
            $article->setCatID($catID);

            $articleDAO = new ArticlesDAO();
            $articleDAO->addArticle($article);
            header("Location: controller.php?page=listArticles");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }

    class ArticleDelete implements ControllerAction{

        function processGET(){
            
            $authorID = $_SESSION['userid'];
            $articleDAO = new ArticlesDAO();
            $articles = $articleDAO->getAuthorsArticles($authorID);
            $_REQUEST['articles']=$articles;
            return "views/deleteArticle.php";

        }

        function processPOST(){

                if(isset($_POST['articleID'])){

                    $articleid=$_POST['articleID'];
                    $articleDAO = new ArticlesDAO();
                    $articleDAO->deleteArticle($articleid);
                    $nextView = "Location: controller.php?page=listArticles";

                }else{

                    $nextView = "Location: controller.php?page=deleteArticle";

                }
                
            
            header($nextView);
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class Login implements ControllerAction{

        function processGET(){
            return "views/login.php";
        }

        function processPOST(){
            $username=$_POST['username'];
            $passwd=$_POST['passwd'];

            $articleDAO = new ArticlesDAO();
            $userID = $articleDAO->getUserID($username);
            $found=$articleDAO->authenticate($username,$passwd);

            $userDAO = new UserDAO();
            $role = $userDAO->getRole($userID);

            
            if($found==null){
                $nextView="Location: controller.php?page=login";
            }else{
                $nextView="Location: controller.php?page=listArticles";
                $_SESSION['loggedin']='TRUE';
                $_SESSION['userid']=$userID;
                $_SESSION['role']=$role;
            }
            header($nextView);
            exit;       
        }
        function getAccess(){
            return "PUBLIC";
        }

    }

    class Home implements ControllerAction{

        function processGET(){
            return "views/home.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }

    class About implements ControllerAction{

        function processGET(){
            return "views/about.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }
    
    class Register implements ControllerAction{

        function processGET(){
            return "views/register.php";
        }

        function processPOST(){

               $username = $_POST['username'];
               $firstname = $_POST['firstname'];
               $lastname = $_POST['lastname'];
               $email = $_POST['email'];
               $password = $_POST['password'];
               $role = $_POST['role'];

               $user = new User();
               $user->setUsername($username);
               $user->setFirstName($firstname);
               $user->setLastName($lastname);
               $user->setEmail($email);
               $user->setPassword($password);
               $user->setRole($role);

               $userDAO = new UserDAO();
               $userDAO->addUser($user);

               header("Location: controller.php?page=listArticles");


        }

        function getAccess(){
            return "PUBLIC";
        }
        
    }

    class ListComments implements ControllerAction{

        function processGET(){
            
            $articleID = $_SESSION['articleID'];
            return "views/listComments.php";

        }

        function processPOST(){
            
            
        }

        function getAccess(){
            return"PROTECTED";
        }

    }

    class Admin implements ControllerAction{

        function processGET(){
            
            return "views/admin.php";

        }

        function processPOST(){
            
            $userID = $_POST['userID'];
            $articleID = $_POST['articleID'];
            $commentID = $_POST['commentID'];
            $submit = $_POST['submit'];
            if($submit == 'deleteComment'){

                $commentDAO = new CommentDAO();
                $commentDAO->deleteComment($commentID);

            }
            if($submit == 'deleteComments'){

                $commentDAO = new CommentDAO();
                $commentDAO->deleteOldComments();

            }
            if($submit == 'deleteArticle'){

                $articleDAO = new ArticlesDAO();
                $articleDAO->deleteArticle($articleID);

            }
            if($submit == 'deleteUser'){

                $userDAO = new UserDAO();
                $userDAO->deleteUser($userID);

            }
            header("Location: controller.php?page=admin");
            exit;
        }

        function getAccess(){
            return"PROTECTED";
        }

    }
?>