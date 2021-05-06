
  
  <hr>
 
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    
                    <?php 

                          if(isset($_SESSION['loggedin'])){
    
                              echo"<h3>You are already logged in!</h3>";
                            }else{

                            
                            echo"
                        <h2 class=\"card-title\">Create Your Account</h2>

                        <form action=\"controller.php\" method=\"POST\">

                            <input type=\"hidden\" name=\"page\" value=\"register\"></input>  
                            <input type=\"hidden\" name=\"role\" value=\"author\"></input>   

                            <label for=\"username\" class=\"form-label\">Username</label>
                            <input type=\"text\" class=\"form-control mb-3\" id=\"username\" name=\"username\" placeholder=\"Enter A Username\" required>

                            <label for=\"firstname\" class=\"form-label\">First Name</label>
                            <input type=\"text\" class=\"form-control mb-3\" id=\"firstname\" name=\"firstname\" placeholder=\"Enter Your First Name\"  required>

                            <label for=\"lastname\" class=\"form-label\">Last Name</label>
                            <input type=\"text\" class=\"form-control mb-3\" id=\"lastname\" name=\"lastname\" placeholder=\"Enter Your Last Name\"  required>

                            <label for=\"email\" class=\"form-label\">Email</label>
                            <input type=\"text\" class=\"form-control mb-3\" id=\"email\" name=\"email\" placeholder=\"Enter An Email Address\"  required>

                            <label for=\"password\" class=\"form-label\">Password</label>
                            <input type=\"text\" class=\"form-control mb-3\" id=\"password\" name=\"password\" placeholder=\"Enter A Password\"  required>


                            <button type=\"submit\" class=\"btn btn-primary\">Create Account</button>
                                ";
                        }
                    ?>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</body>
</html>