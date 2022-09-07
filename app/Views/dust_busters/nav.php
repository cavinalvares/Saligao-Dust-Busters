<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= esc($title) ?></title>
    <link rel="icon" type="image/x-icon" href="./images/pngegg.png">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/custom.css" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" id="project" href="/">
                <img src="./images/logo.png" alt="trashlogo" width="30" height="30" class="d-inline-block align-text-bottom">
                <h3 class="d-inline-block" >SALIGAO DUST BUSTERS</h3>
              </a>
              <div class="menu">
              <button class="navbar-toggler" id="closeoc" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNavDropdown">
                <div class="offcanvas-header text-white">
                  <h5 id="offcanvasRightLabel" class="align-text-bottom">Menu</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <ul class="navbar-nav offcanvas-body">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#Services">Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="News">News</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Events">Events</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#About Us">About&nbspUs</a>
                  </li>

                 <li id='log' class='nav-item dropdown'>
                              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                              <?php echo $_SESSION['username'] ?></a>
                              <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdownMenuLink'>
                              <li><a class='dropdown-item' href='map'>Village Map</a></li>
                              <li><a class='dropdown-item' href='Donation.html'>Donate item</a></li>
                              <li><a class='dropdown-item' href='DonatedItems'>View Donated Items</a></li>
                              <li><a class='dropdown-item' href='Form'>Complain/Suggestion Box</a></li>
                              <li><a class='dropdown-item' href='ScheduleEvents'>Schedule Event</a></li>
                              <li><hr class='dropdown-divider'></li>
                              <?php if($_SESSION['mode'] == 1){?>
                                <li><a class='dropdown-item' href='AdminOptions'>Admin Option</a></li>
                                <li><hr class='dropdown-divider'></li>
                              <?php }?>
                              <li><a class='dropdown-item' id='logout' onclick='logout()'>Log Out</a></li></ul>
                              </li>
                </ul>
              </div>
            </div>
      </nav>

<script>
     function logout(){

let log = document.getElementById("log");
log.classList.remove('dropdown');
log.innerHTML = "<a class='nav-link' id='login' data-bs-toggle='modal' data-bs-target='#loginForm'>Login</a>";
window.open("logout", "_self");
   
}

    window.onresize = window.onload = function(){
        console.log(window.innerWidth);
        if(window.innerWidth <= 393){
          console.log(window.innerWidth);
          offset = 0.88*(325-window.innerWidth);
          document.getElementById('project').setAttribute('style', 'left:'+offset+'px')
        }
      }

</script>