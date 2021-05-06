<?php
  if(isset($_SESSION['loggedin'])){
    $status="Logged In";
    $class="disabled";
    $role=$_SESSION['role'];
  }else{
    $status="Login";
    $class="";
  }
  $articleID = $_SESSION['articleID'];
  $authorID = $_SESSION['userid'];
  $_GET['authorID'] = $authorID;

?>
 <hr>
 <div class="container">
     <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-body">
                 
                 
                     <h2 class="card-title">Join the conversation, leave a comment!</h2>
                     <br>
                     
                     <form id="commentform" action="">
                           
                            <!-- <input type="hidden" name="page" value="listComments"> -->

                            <input type="hidden" name="authorID" value="<?php echo $authorID; ?>"/>
                            <input type="hidden" name="articleID" value="<?php echo $articleID; ?>"/>

                            <input type="text" class="form-control mb-3" id="content" name="content" placeholder="Enter A Comment" required>
                            
                            <button type="submit" class="btn btn-primary mb-3">Post</button>
                            <a href="http://localhost/projects/assign3-jbg-no-group/controller.php?page=listArticles" role="button" class="btn btn-primary mb-3">Back to Articles</a>

                        </form>
                        <br>
                        <br>


        <h2 class="card-title">Comments</h2>            
            <div class="col-auto"> 
                
              <button id="refresh" class="btn btn-primary mtb-3">Refresh Comments</button>
              
                <div id="message" class="mtb-3"></div>
                <br>

                <table id="commentstable" class="table table-bordered table-striped"> 
                    
                </table>  
                </tbody>  

            </div>        
                 </div>
             </div>      
         </div>
     </div>
 </div>
 <script src="comment.js"></script>

