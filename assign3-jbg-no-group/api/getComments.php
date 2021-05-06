<?php
    include_once "../models/CommentDAO.php";
    

   $commentDAO = new CommentDAO();
   $articleID = $_GET['articleID'];

   if(isset($_GET['articleID'])){

        $comments = $commentDAO->getComments($articleID);

   }else{

        $comments = $commentDAO->getAllComments();
   }

    echo json_encode($comments);
?>