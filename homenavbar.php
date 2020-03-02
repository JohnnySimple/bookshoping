<Link rel="stylesheet" href="css/bootstrap.min.css"></Link>
<script src="js/bootstrap.min.js"></script>

<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">Book Store</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <!-- <ul class="nav navbar-nav navbar-right">
    <?php

      if($_SESSION["loggedin"] == true) {
        // echo "<li><a href='logout.php'>Logout</a></li>";
        echo '
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $_SESSION["username"] .
            '<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        ';
      } else {
        echo "
        <li><a href='register.php'>Register</a></li>
        <li><a href='login.php'>Login</a></li>
        ";
      }
    ?>
       
      </ul> -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href='register.php'>Register</a></li>
        <li><a href='login.php'>Login</a></li>
      </ul>
    </div>
  </div>
</nav>