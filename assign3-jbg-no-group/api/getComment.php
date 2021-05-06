<?php
    include_once "../models/CommentDAO.php";

    $commentID = intval($_GET['id']);
    $commentDAO = new CommentDAO();
    $comment = $commentDAO->getComments($comID);

    echo json_encode($comment);
    
?>