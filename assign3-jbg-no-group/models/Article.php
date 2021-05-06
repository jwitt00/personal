<?php
    class Article{
        private $artID;
        private $authorID;
        private $catID;
        private $title;
        private $image;
        private $content;

        public function load($row){
            $this->setArtID($row['artID']);
            $this->setAuthorID($row['authorID']);
            $this->setCatID($row["catID"]);
            $this->setTitle($row["title"]);
            $this->setImage($row["image"]);
            $this->setContent($row["content"]);
        }

        public function setArtID($artID){
            $this->artID=$artID;
        }

        public function getArtID(){
            return $this->artID;
        }

        public function setAuthorID($authorID){
            $this->authorID=$authorID;
        }

        public function getAuthorID(){
            return $this->authorID;
        }

        public function setCatID($catID){
            $this->catID=$catID;
        }

        public function getCatID(){
            return $this->catID;
        }

        public function setTitle($title){
            $this->title=$title;
        }

        public function getTitle(){
            return $this->title;
        }

        public function setImage($image){
            $this->image=$image;
        }

        public function getImage(){
            return $this->image;
        }

        public function setContent($content){
            $this->content=$content;
        }

        public function getContent(){
            return $this->content;
        }

        public function blankLine(){
            return " ";
        }


    }
?>