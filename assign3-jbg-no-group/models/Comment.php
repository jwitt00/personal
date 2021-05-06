<?php
    class Comment implements JsonSerializable{

        private $comID;
        private $authorID;
        private $artID;
        private $content;
        

        public function load($row){
            
            $this->setComID($row['comID']);
            $this->setAuthorID($row['authorID']);
            $this->setArtID($row['artID']);
            $this->setContent($row['content']);
            
        }

        public function setComID($comID){
            $this->comID=$comID;
        }
        public function getComID(){
            return $this->comID;
        }

        public function setAuthorID($authorID){
            $this->authorID=$authorID;
        }
        public function getAuthorID(){
            return $this->authorID;
        }

        public function setArtID($artID){
            $this->artID=$artID;
        }
        public function getArtID(){
            return $this->artID;
        }

        public function setContent($content){
            $this->content=$content;
        }
        public function getContent(){
            return $this->content;
        }

        public function jsonSerialize(){
            
            return array(
                'commentID' => $this->commID,
                'authorID'=> $this->authorID,
                'articleID'=> $this->artID,
                'content' => $this->content
            );

        }

        
    }
?>