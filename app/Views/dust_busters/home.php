<?php
if(session_id() == ''){
  session_start();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SALIGAO DUST BUSTERS</title>
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
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                              <li><a class='dropdown-item' href='/map'>Village Map</a></li>
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

      <div class="weatherWidget" ></div>
      
      
      
          <div class="banner">
      <br />
      <br />
      <br />
      <script> var res="success";
      
      </script>
      <p class="first">Welcome to the Saligao Dust Busters Website</p>
      <p class="second">
        We mean to keep Saligao Clean by using the various features of our
        website to organize cleaning drives, schedule garbage pickups, set up
        donation shops to donate and give out old clothes among others.
      </p>
    </div>

    <div class="d-block">
      <section id="Services">
        <div class="d-block servicetext title">
          <div class="sertitle">
            <div class="title">
              <h2>OUR BEST FEATURES</h2>
              <p>
                Here are the some services we provide
                <br />
                We mean to keep Saligao Clean
              </p>
            </div>
          </div>
          <article>
            <h3>Dustbin Location</h3>
            <img src="./images/location.png" alt="Location" class="ff" />
            <p>
              One of our main services is providing the location of
              <br />
              dust bins and other useful commodities in our village
            </p>
            <h3>Daily News and Events</h3>
            <img src="./images/newspaper.png" alt="newspaper" class="ff" />
            <p>
              We provide daily news about the village and its happenings
              <br />
              We also notify our users of any current or future events upon
              login.
            </p>
            <h3>Donation Centres</h3>
            <img src="./images/donation.png" alt="donation" class="ff" />
            <p>
              Our Site lets you donate various old items
              <br />
              so that they can be recycled or given to those in need of Them
            </p>

            <h3>Complain and Suggestions Module</h3>
            <img src="./images/complaint.png" alt="complain" class="ff" />
            <p>
              People always have useful suggestions. Well now
              <br />
              You have a place to add those suggestions.
              <br />
              Users can also submit any complains they have in our complain box.
            </p>
          </article>
        </div>
        <!-- Wrapper end-->
      </section>
      <!--Services ENd-->

      <!-- ABOUT US-->
      <section id="About Us">
          <div class="abtback">
          </div>

          <div>
            <div class="title">
              <div class="containerabt">
                <pre class="Aboutus">
                  Saligao Dust Buster is a non-profit initiative in the business of changing and shaping lives of Saligao Society. 
                    SDB is focused towards solving Saligao issues through field work and increasing awareness. 
           
                  Founded in 2022, our initiative was born with the intention to not only make a change but also to provide an 
                  opportunity to people who want to make a change. Dealing with the challenges of today requires problem-solvers 
                  who bring different perspectives and are willing to take risks. SDB emerged out of a pursuit to inspire and 
                    support the community, and a desire for actions to speak louder than words.
          
                  We have conduct several garbage collection drive across many parts of Saligao. We have also distributed items 
                  to the needy people which are donated by people. we have conducted Street play ,Supply paper bags , Plantation 
                          drive to raise awareness of pollution cause by Garbage.  
          
                  Here at SDB, we are driven by a single goal, to do our part in making the world a better place for all. Our 
                  decision making process is informed by comprehensive  empirical studies and high quality data evaluation. 
                  We strive to build productive relationships and make a positive impact with all of our Saligao Society.
          
                </pre>
              </div>
            </div>
          </div>
          
          <div class="teamback">
          </div>  
          <div class="footer">
            <div class="title">
              <div class="containerteam">
                <div class="row">
                    <!--First User design starts here-->
                    <div class="profile-card">
                        <div class="profile-content">
                            <div class="profile-image">
                                <img class="profile-img" src="./images/usrIcon.jpg" alt="first user">
                            </div>
                            <div class="desc">
                                <h2>Jedidiah Alvares</h2>
                                <p>Master in Computer Application</p>
                                <p>Backend Developer </p>
                            </div>
                            <div class="btn-div">
                                <a href="https://www.instagram.com/">
                                <img class="profile-img" src="./images/Instagram.jpeg" alt="Error" style="width:40px;height:40px;"> </a>
                                
                                <a href="https://www.facebook.com/">
                                <img class="profile-img" src="./images/Facebook.jpeg" alt="Error" style="width:40px;height:40px;"> </a>
                            </div>
                        </div> 
                    </div>
                    <!--First user design ends here-->
                     <!--second User design starts here-->
                     <div class="profile-card">
                        <div class="profile-content">
                            <div class="profile-image">
                                <img class="profile-img" src="./images/usrIcon.jpg" alt="first user">
                            </div>
                            <div class="desc">
                                <h2>Adit Ghadi</h2>
                                <p>Master in Computer Application</p>
                                <p>Developer / Tester </p>
                            </div>
                            <div class="btn-div">
                                <a href="https://www.instagram.com/">
                                <img class="profile-img" src="./images/Instagram.jpeg" alt="Error" style="width:40px;height:40px;"> </a>
                                
                                <a href="https://www.facebook.com/">
                                <img class="profile-img" src="./images/Facebook.jpeg" alt="Error" style="width:40px;height:40px;"> </a>
                            </div>
                        </div>
                    </div>
                    <!--second user design ends here.jpeg-->
                     <!--third User design starts here-->
                     <div class="profile-card">
                        <div class="profile-content">
                            <div class="profile-image">
                                <img  class="profile-img" src="./images/Sahil.jpeg" alt="first user">
                            </div>
                            <div class="desc">
                                <h2>Sahil Belurkar</h2>
                                <p>Master in Computer Application</p>
                                <p>Frontend developer/ Design specialist </p>
                            </div>
                            <div class="btn-div">
                                <a href="https://www.instagram.com/">
                                <img class="profile-img" src="./images/Instagram.jpeg" alt="Error" style="width:40px;height:40px"> </a>
                                
                                <a href="https://www.facebook.com/">
                                <img class="profile-img" src="./images/Facebook.jpeg" alt="Error" style="width:40px;height:40px;"> </a>
                            </div>
                        </div>
                    </div>
                    <!--third user design ends here-->
                     <!--fourth User design starts here-->
                     <div class="profile-card">
                        <div class="profile-content">
                            <div class="profile-image">
                                <img class="profile-img" src="./images/Mohit.jpeg" alt="first user">
                            </div>
                            <div class="desc">
                                <h2>Mohit Borkar</h2>
                                <p>Master in Computer Application</p>
                                <p>Frontend Developer / Tester </p>
                            </div>
                            <div class="btn-div">
                                <a href="https://www.instagram.com/">
                                <img class="profile-img" src="./images/Instagram.jpeg" alt="Error" style="width:40px;height:40px"> </a>
                                
                                <a href="https://www.facebook.com/">
                                <img class="profile-img" src="./images/Facebook.jpeg" alt="Error" style="width:40px;height:40px;"> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <div class="footer">
              <div class="title">
                  <p>Important Site links</p>
                  <a href="#top">Home</a>
                  <a href="#Services">Services</a>
                  <a href="News">News</a>
                  <a href="Events">Events</a>
                  <a href="#About Us">About Us</a>
                  <p>Dust | Busters</p>
            </div>
          </div>
        </section>
    </div>

    <script>


      
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
        console.log(window.innerWidth);
        if(window.innerWidth <= 393){
          console.log(window.innerWidth);
          offset = 0.88*(325-window.innerWidth);
          document.getElementById('project').setAttribute('style', 'left:'+offset+'px')
        }
      }

      window.weatherWidgetConfig =  window.weatherWidgetConfig || [];
   window.weatherWidgetConfig.push({
       selector:".weatherWidget",
       apiKey:"YHLRC4FD6GJ54L2AR6AT56LCF", // key
       location:"GOA PANJIM, IN", //Enter an address
       unitGroup:"metric", //"us" or "metric"
       forecastDays:5, //how many days forecast to show
       title:"Saligao,Goa", //optional title to show in the 
       showTitle:true, 
       showConditions:true
   });
  
   (function() {
   var d = document, s = d.createElement('script');
   s.src = 'https://www.visualcrossing.com/widgets/forecast-simple/weather-forecast-widget-simple.js';
   s.setAttribute('data-timestamp', +new Date());
   (d.head || d.body).appendChild(s);
   })();

    </script>
    
</body>

</html>
