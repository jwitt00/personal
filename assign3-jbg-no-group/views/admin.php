<?php 

    $articleDAO = new ArticlesDAO();
    $commentDAO = new CommentDAO();
    $userDAO = new UserDAO();

    $articles = $articleDAO->getArticles();
    $comments = $commentDAO->getAllComments();
    $users = $userDAO->getUsers();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
   
</head>
<body>
    <section class="header">
        <h1>Admin Hub</h1>
        <h4>Manage Website</h4>
    </section>
    <hr>

    <div class="container">
        <div class="col">


        <form action="controller.php" method="POST">
        <input type="hidden" name="page" value="admin">
        <h3>Users</h3>
            <table class="table table-bordered table-striped mt-3">
                <thead><tr><th>Select User</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Email</th></tr></thead>
                <tbody>
                    <?php
                        for($index=0;$index<count($users);$index++){
                            echo "<tr><td><input type=\"radio\" name=\"userID\" value=\"".$users[$index]->getUserID()."\"></td>";
                            echo "<td>".$users[$index]->getUsername()."</td>";
                            echo "<td>".$users[$index]->getFirstName()."</td>";
                            echo "<td>".$users[$index]->getLastName()."</td>";
                            echo "<td>".$users[$index]->getEmail()."</td></tr>";
                        }
                    ?>
                    
                </tbody>        
            </table>
            <div class="button">
                
                <tr><td><button class="btn btn-primary mb-3 btn-danger" type="submit" name="submit" value="deleteUser">Delete User</button></tr></td>

                 </div>
        </form>

            <hr>
            <h3>Articles</h3>
            <form action="controller.php" method="POST">
            <input type="hidden" name="page" value="admin">
            <table class="table table-bordered table-striped mt-3">
                <thead><tr><th>Select Article</th><th>Author</th><th>Title</th></tr></thead>
                <tbody>
                    <?php
                        for($index=0;$index<count($articles);$index++){

                            echo "<tr><td><input type=\"radio\" name=\"articleID\" value=\"".$articles[$index]->getArtID()."\"></td>";
                            echo "<td>".$articleDAO->getAuthor($articles[$index]->getAuthorID())."</td>";
                            echo "<td>".$articles[$index]->getTitle()."</td>";
                            
                        }
                    ?>
                    
                </tbody>        
            </table>
            <div class="button">
                    <tr><td><button class="btn btn-primary mb-3 btn-danger" type="submit" name="submit" value="deleteArticle">Delete Article</button></tr></td>
                    
                    </div>
            </form>

            <hr>
            <h3>Comments</h3>
            <form action="controller.php" method="POST">
            <input type="hidden" name="page" value="admin">
            <table class="table table-bordered table-striped mt-3">
                <thead><tr><th>Comment ID</th><th>Article Title</th><th>Author ID</th><th>Content</th></tr></thead>
                <tbody>
                    <?php
                        for($index=0;$index<count($comments);$index++){

                            echo "<tr><td><input type=\"radio\" name=\"commentID\" value=\"".$comments[$index]->getComID()."\"></td>";
                            echo "<td>".$articleDAO->getArticleTitle($comments[$index]->getArtID())."</td>";
                            echo "<td>".$articleDAO->getAuthor($comments[$index]->getAuthorID())."</td>";
                            echo "<td><div class=\"card\" style=\"width: 20rem;\">".$comments[$index]->getContent()."</div></td></tr>";
                        }
                    ?>
                </tbody>        
            </table>
            <div>
                    <tr><td><button class="btn btn-primary mb-3 btn-danger" type="submit" name="submit" value="deleteComment">Delete Comment</button></tr></td>
                            <!-- <button class="btn btn-primary mb-3 btn-danger" type="submit" name="submit" value="deleteComments">Delete All Comments From Deleted Articles</button> -->
                    </div>
            <hr>           
            </form>
        </div>
    </div>
</body>
</html>