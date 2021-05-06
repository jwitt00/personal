<?php
    include_once 'Article.php';

    class ArticlesDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addArticle($article){
            $connection=$this->getConnection();

            $title = $article->getTitle();
            $content = $article->getContent();
            $image = $article->getImage();
            $authorID = $article->getAuthorID();
            $catID = $article->getCatID();
            
            $stmt = $connection->prepare("INSERT INTO articles (title, content, image, authorID, catID) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssii",$title, $content, $image, $authorID, $catID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteArticle($artID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM articles WHERE artID = ?");
            $stmt->bind_param("i", $artID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getArticles(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM articles;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $article = new Article();
                $article->load($row);
                $articles[]=$article;
            }    
            $stmt->close();
            $connection->close();
            return $articles;
        }

        public function getAuthorsArticles($authorID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM articles WHERE authorID = ?;"); 
            $stmt->bind_param("i", $authorID);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $article = new Article();
                $article->load($row);
                $articles[]=$article;
            }    
            $stmt->close();
            $connection->close();
            return $articles;
        }


        public function getAuthor($authorID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT firstname,lastname FROM users WHERE userID = ?;"); 
            $stmt->bind_param("i",$authorID);
            $stmt->execute();
            $result = $stmt->get_result();
            $temp = $result->fetch_assoc();
            $stmt->close();
            $connection->close();
            $author = $temp['firstname']." ".$temp['lastname'];
            return $author;
            
        }
        
        public function getUserID($username){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT userID FROM users WHERE username = ?;"); 
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $result = $stmt->get_result();
            $temp = $result->fetch_assoc();
            $stmt->close();
            $connection->close();
            $userID = $temp['userID'];
            return $userID;
            
        }

        public function authenticate($username, $passwd){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? and password = ?;");
            $stmt->bind_param("ss",$username,$passwd); 
            $stmt->execute();
            $result = $stmt->get_result();
            $found=$result->fetch_assoc();
            $stmt->close();
            $connection->close();
            var_dump($found);
            return $found;
        }

        public function getArticleTitle($articleID){

            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT title FROM articles WHERE artID = ?;"); 
            $stmt->bind_param("i",$articleID);
            $stmt->execute();
            $result = $stmt->get_result();
            $temp = $result->fetch_assoc();
            $stmt->close();
            $connection->close();
            $error = "WARNING: Comment is from a deleted article.";
            if($temp == null){
                return $error;
            }else{
                $title = $temp['title'];
                return $title;
            } 
        }

        
    }
?>
