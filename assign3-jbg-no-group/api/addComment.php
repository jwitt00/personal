<?php

include_once "../models/CommentDAO.php";
    
    //Set Response Header
    header("Content-Type: application/json");

    //Read the JSON Payload from the Post Request and convert to associative array
    $data = json_decode(file_get_contents("php://input"),true);

    //Create Comment and Populate from Associative Array
    $comment = new Comment();
    $comment->setAuthorID($data['authorID']);
    $comment->setArtID($data['articleID']);
    $comment->setContent($data['content']);
   
    //Add the Comment and then Get the Comment
    $commentDAO = new CommentDAO();
    $id = $commentDAO->addComment($comment);
    $result = $commentDAO->getComment($id);
  
    //Return the Comment Record in JSON Format in the Response
    echo json_encode($result);
    

    ?>