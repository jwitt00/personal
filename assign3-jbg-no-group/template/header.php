<?php
  if(isset($_SESSION['loggedin'])){
    $status="Logged In";
    $class="disabled";
    $role=$_SESSION['role'];
  }else{
    $status="Login";
    $class="";
  }
?>
<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm">
  <p class="h5 my-0 me-md-auto fw-normal">CS 2033: Assignment Three - Blog Management System</p>
  <nav class="my-2 my-md-0 me-md-3">
    <a class="p-2 text-dark" href="controller.php?page=home">Home</a>
    <a class="p-2 text-dark" href="controller.php?page=about">About</a>
    <a class="p-2 text-dark" href="controller.php?page=listArticles">All Articles</a>
    <a class="p-2 text-dark" href="controller.php?page=deleteArticle">Your Articles</a>
    <a class="p-2 text-dark" href="controller.php?page=addArticle">Create an Article</a>
    <a class="p-2 text-dark" href="controller.php?page=register">Register</a>

    <?php  

          if($role == 'admin'){
            echo "<a class=\"p-2 text-dark\" href=\"controller.php?page=admin\">Admin</a>";
          }
    
    ?>

  </nav>

  <a class="btn btn-outline-primary <?php echo $class; ?>" href="controller.php?page=login"><?php echo $status; ?></a>
</header>