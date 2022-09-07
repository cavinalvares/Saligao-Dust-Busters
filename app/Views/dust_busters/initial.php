<?php
if(session_id() == ''){
  session_start();
  if(isset($_COOKIE['username'])){
    $_SESSION['username'] = $_COOKIE['username']; 
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/custom.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/pngegg.png">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
  </head>
  <nav class="navbar navbar-expand-lg navbar-fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" id="project" href="#">
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
                    <a class="nav-link" id="missionlink" href="#mission-id">Our&nbspMissions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="aboutuslink" href="#About Us">About&nbspUs</a>
                  </li>
                </ul>
              </div>
            </div>
      </nav>

  <body id="top">
    
   <!-- Banner and intro-->
   <div class="banner2">
    <p class="first" style="margin-top: 0px;">Dust Busters Login</p>
    <br>
    <br>
    <br>
    <p class="second">
      Login to our website to access the various features we have provided. In case
      you do not have an account sign in and create your account.
    </p>
    <br><br>
    <br><br>
    <div class="logoncontainer">
        <button class="logonbtn" data-bs-toggle="modal" data-bs-target="#signupForm">Sign up</button>
        <button class="logonbtn" data-bs-toggle="modal" data-bs-target="#loginForm">Login</button>
    </div>
  </div>

  <div id="signupForm" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="signupForm" aria-hidden="true">
        <div class="modal-dialog zoom-in">
          <div class="modal-content">
            <div class="modal-header">
              <img src="./images/usrIcon.jpg" alt="Avatar" class="avatar" />
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="signup" onsubmit="return validatesuf()" method="POST">
                <label for="fname"><b>First Name</b></label>
                <input
                  type="text"
                  placeholder="Enter First Name"
                  name="fname"
                  required
                />
                <label for="fname"><b>Last Name</b></label>
                <input
                  type="text"
                  placeholder="Enter last Name"
                  name="lname"
                  required
                />
                <label for="uname"><b>Username</b><p id="suids" class="text-warning"></p></label>
                <input
                  id="suid"
                  type="text"
                  placeholder="Enter Username"
                  name="uname"
                  onchange="signup(this.value)"
                  required
                />
                <label for="address"><b>Address</b></label>
                <textarea
                  placeholder="Enter your Address..."
                  name="address"
                ></textarea>
                <label for="phno"><b>Phone no</b></label>
                <input
                  type="tel"
                  placeholder="Enter your Phone no"
                  name="phno"
                  required
                />
                <label for="email"><b>Email</b></label>
                <input
                  type="email"
                  placeholder="Enter Email"
                  name="email"
                  required
                />
                <label for="psw"><b>Password</b></label>
                <input
                  type="password"
                  placeholder="Enter Password"
                  name="psw"
                  required
                />
                
                <div class="modal-footer">
                <button type="submit" class="btn btn-success">Sign Up</button>
                </div>
                </form>
              </div>
              </div>
              </div>
      </div>

      
      <div id="loginForm" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="loginForm" aria-hidden="true">
        <div class="modal-dialog zoom-in">
          <div class="modal-content">
            <div class="modal-header">
              <img src="./images/usrIcon.jpg" alt="Avatar" class="avatar" />
              <button type="button" id="closesi" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="signin(event)" method="POST">
                <label for="uname"><b>Username</b></label>
                <input
                  id="user"
                  type="text"
                  placeholder="Enter Username"
                  name="uname"
                  required
                />
      
                <label for="psw"><b>Password</b></label>
                <input
                  id="pass"
                  type="password"
                  placeholder="Enter Password"
                  name="psw"
                  required
                />
                <label>
                  <input id="check" type="checkbox" name="remember" value="signedin"/> Remember Me
                </label>
                
              <div class="modal-footer">
               <span id='sis' class='text-warning'></span>
                <!--<a class="text-info" id="signup" data-bs-toggle="modal" data-bs-target="#forgotPass">Forgot Password?</a> -->
                <button type="submit" id="formin" class="btn btn-success">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="forgotPass" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="forgotPass" aria-hidden="true">
        <div class="modal-dialog zoom-in">
          <div class="modal-content">
            <div class="modal-header">
              <h3>Forgot Password</h3>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="signin/forgot" method="POST">
                <label for="uname"><b>User Name</b></label>
                <input
                  type="text"
                  placeholder="Enter User Name"
                  name="uname"
                  required
                />
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Next</button>
              </div>
                </form>
            </div>
          </div>
        </div>
      </div>

      </div>
    </section>

    <section class="mission" id="mission-id">
      <div class="misscontainer">
        <div class="title">
          <h2>Our Missions</h2>
          <p>
          We plan to get rid of <span class="spanimp">Wastage</span> and deliver
            <span class="spanimp">Donations</span> to needy People
          </p>
        </div>
        <div class="gallery-sec">
          <div class="misscontainer">
            <div class="image-container">
              <div class="image">
                <img src="images/miss/1.jpg" alt="img" />
              </div>
              <div class="image">
                <img src="images/miss/2.jpg" alt="img" />
              </div>
              <div class="image">
                <img src="images/miss/3.jpg" alt="img" />
              </div>
              <div class="image">
                <img src="images/miss/4.jpg" alt="img" />
              </div>
              <div class="image">
                <img src="images/miss/5.jpg" alt="img" />
              </div>
              <div class="image">
                <img src="images/miss/6.jpg" alt="img" />
              </div>
            </div>
          </div>
          <div class="pop-image">
            <span>&times;</span>
            <img src="img/gallery/1.jpg" alt="gallery-img" />
          </div>
        </div>
      </div>
    </section>

    <section id="About Us">
      <div class="footer">
        <div class="title">
            <h3>About Us</h3>
            <p class="abouts">
              Saligao Dust Busters<br>                      
              Phone No: 2288293892<br>
              Saligao, Bardez Goa 403511<br>   
              Email:saligaodustbusters@gamil.com<br>
            </p>
            <p>Dust | Busters</p>
          </ul>
      </div>
    </div>
  </div>
</section>

    <script>
     function signup(str){
        if (str == "") {
          document.getElementById("suids").innerHTML = "";
            return;
        } else 
        {
          $.ajax({
            url: "signup/dupuser/?uname="+str,
            type: "GET",
            success: function(data){
                      document.getElementById("suids").innerHTML = data;             
                    }
          });
        }


      }


      function signin(){
        event.preventDefault();

        var usr = document.getElementById("user").value;
        let pswd = document.getElementById("pass").value;
        let check = document.getElementById("check").checked;

        if (usr != "" && pswd !="") {

          $.ajax({
            url: "login",
            type: "POST",
            data: {
                  uname: usr,
                  psw: pswd,
                  check: check
              },
            success: function(res){
          if(res == "0")
            document.getElementById("sis").innerHTML = "The Username or Password is Incorrect";
          else
            location.reload();             
        }
      });

      }
        else 
        {
          document.getElementById("sis").innerHTML = "";
          return;
      }

      }

      function logout(){

                let log = document.getElementById("log");
                log.classList.remove('dropdown');
                log.innerHTML = "<a class='nav-link' id='login' data-bs-toggle='modal' data-bs-target='#loginForm'>Login</a>";
                window.open("logout", "_self");
                   
      }
      
      function validatesuf(){
        var sp = document.getElementById("suids");

        if(sp.innerHTML != "")
        {
          sp.scrollIntoView();
          return false;
        }
        else
          return true;
      }


      window.onresize = window.onload = function(){
        if(window.innerWidth <= 393){
          offset = 0.88*(325-window.innerWidth);
          document.getElementById('project').setAttribute('style', 'left:'+offset+'px')
        }
      }
    </script>
  </body>
</html>
