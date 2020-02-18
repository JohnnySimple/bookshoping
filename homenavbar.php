<nav class="navbar navbar-default nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Book Store</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <?php
        if($_SESSION["loggedin"] == true) {
          echo "<li><a href='logout.php'>Logout</a></li>";
        } else {
          echo "
          <li><a href='register.php'>Register</a></li>
          <li><a href='login.php'>Login</a></li> 
          ";
        }
      ?>
      
    </ul>
  </div>
</nav>