<?php 

    $articles = $_REQUEST['articles'];
    $articleDAO = new ArticlesDAO();
    $userID = $_SESSION['userid'];
    //echo "$userID";

?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto"> 
              <table class="table table-borderless text-center">
                 <tbody>
                 <form action="controller.php" method="POST">

                 <input type="hidden" name="page" value="listArticles">
                       <?php
                          for($index=0;$index<count($articles);$index++){
                              
                               echo "<tr><td><h1>".$articles[$index]->getTitle()."</h1></td></tr>";
                               echo "<tr><td><h3>".$articleDAO->getAuthor($articles[$index]->getAuthorID())."</h3></td></tr>";
                               echo "<tr><td>".$articles[$index]->getContent()."</td></tr>";
                               echo "<tr><td>".$articles[$index]->blankLine()."</td></tr>";
                               echo "<tr><td><button class=\"btn btn-primary\" type=\"submit\" name=\"articleID\" value=\"".$articles[$index]->getArtID()."\">Read Comments</button></td></tr>";
                               echo "<tr><td><hr></td></tr>";
                               echo "<tr><td>".$articles[$index]->blankLine()."</td></tr>";
                               
                          }
                      ?>
                   </tbody>  
                   </form>    
              </table>
          </div>        
        </div>
    </div>