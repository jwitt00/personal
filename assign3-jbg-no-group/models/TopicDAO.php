<?php
    include_once 'Topic.php';

    class TopicDAO {

        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }
 
        public function addTopic($topic){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO topics (name, description) VALUES (?, ?)");
            $stmt->bind_param("ss", $topic->getName(), $topic->getDescription());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteTopic($topID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM topics WHERE topID = ?");
            $stmt->bind_param("i", $topID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getTopics(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM topics;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $topic = new Topic();
                $topic->load($row);
                $topics[]=$topic;
            }    
            $stmt->close();
            $connection->close();
            return $topics;
        }

    }
?>
