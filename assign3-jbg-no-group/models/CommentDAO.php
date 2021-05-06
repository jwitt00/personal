<?php
    include_once 'Comment.php';

    class CommentDAO {

        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }
 
        public function addComment($comment){
            $connection=$this->getConnection();

            $authorID = $comment->getAuthorID();
            $articleID = $comment->getArtID();
            $content = $comment->getContent();

            $stmt = $connection->prepare("INSERT INTO comments (authorID, artID, content) VALUES (?, ?, ?);");
            $stmt->bind_param("iis",$authorID, $articleID, $content);
            $stmt->execute();
            $id = mysqli_insert_id($connection);;
            $stmt->close();
            $connection->close();
            return $id;
        }

        public function deleteComment($comID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM comments WHERE comID = ?");
            $stmt->bind_param("i", $comID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteOldComments(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM comments WHERE artID = null");
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getComments($articleID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM comments WHERE artID = ?"); 
            $stmt->bind_param("i", $articleID);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $comment = new Comment();
                $comment->load($row);
                $comments[]=$comment;
            }    
            $stmt->close();
            $connection->close();
            return $comments;
        }

        public function getComment($commentID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM comments WHERE commentID = ?"); 
            $stmt->bind_param("i", $commentID);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $comment = new Comment();
                $comment->load($row);
                $comments[]=$comment;
            }    
            $stmt->close();
            $connection->close();
            return $comment;
        }

        public function getAllComments(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM comments"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $comment = new Comment();
                $comment->load($row);
                $comments[]=$comment;
            }    
            $stmt->close();
            $connection->close();
            return $comments;
        }

    }
?>
