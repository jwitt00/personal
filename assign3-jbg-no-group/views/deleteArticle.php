<?php 

    $articles = $_REQUEST['articles'];
    $articleDAO = new ArticlesDAO();
    $userID = $_SESSION['userid'];
    //echo "$userID";

?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Delete An Article</h5>
                        <br>
                        <!-- <p class="card-text"></p> -->
                        <div class="col">
            <form action="controller.php" method="POST">
            <input type="hidden" name="page" value="deleteArticle">
                    <?php
                        if($articles != null){

                            echo "
                            <a href=\"http://localhost/projects/assign-3-laptop/controller.php?page=addArticle\" role=\"button\" class=\"btn btn-primary\">Create New Article</a>
                            <button class=\"btn btn-primary btn-danger\" type=\"submit\" name=\"submit\" value=\"DELETE\">Delete Article</button>

                            <table class=\"table table-bordered table-striped mt-3\">
                            <thead><tr><th>Select Article</th><th>Your Articles</th></tr></thead>
                            <tbody>";

                            for($index=0;$index<count($articles);$index++){

                                echo "<tr><td><input type=\"radio\" name=\"articleID\" value=\"".$articles[$index]->getArtID()."\"></td>";
                                echo "<td>".$articles[$index]->getTitle()."</td>";
                                
                            }
                        }else{

                            echo "<h4>You don't have any articles :/</h4>";
                            echo "<h6>Click <a href=\"http://localhost/projects/assign-3-laptop/controller.php?page=addArticle\">here</a> to create one!</h6>";

                        }

                        
                    ?>
                </tbody>        
            </table>  
            </form>
        </div>
                    </div>
                </div>      
            </div>
        </div>
    </div>

