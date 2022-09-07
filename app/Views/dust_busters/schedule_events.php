
    <!-- Complain Form-->
    <div class="heading">
        <br />
        <h1>Welcome to the event Scheduling Page</h1>
      </div>
      <div class="main main3">
        <div class="f1">
          <form onsubmit="set_event(event)">
            <div class="form-group">
            <label for="ename">Event Name:</label>
            <input type="text" id="ename" name="ename" required/><br /><br />
  
            <label for="evenue">Event Venue:</label>
            <input type="text" id="evenue" name="evenue" required/><br /><br />

            <label for="date">Event Date:</label>
            <input type="date" id="date" name="date" required/><br /><br />
            
            <label for="time">Event Time:</label>
            <input type="time" id="time" name="time" required/><br /><br />


            <label for="edesc">Brief Description of Event:</label>
            <input type="text" id="edesc" name="edesc" required/><br /><br />

            <input style="float:centre ;" type="submit" id="submit" name="submit"/>
            
      <div class="alert alert-success" role="alert">
        The Event Has Been Successfully Entered
      </div>
      <div class="alert alert-danger" role="alert">
        The Event Has not Been Entered
      </div>
            </div>
          </form>
        </div>
      </div>

      <section id="About Us">
        <div class="footer">
          <div class="title">
              <h3>About Us</h3>
              <p class="abouts">
                Saligao Dust Busters<br>                      
                Phone No: 2288293892<br>
                Saligao, Bardez Goa 403511<br>   
                Email:saligaodustbusters@gamil.com
              </p>
              <p>Dust | Busters</p>
            </ul>
        </div>
      </div>
  </section>

    <script>
      function set_event(){
        event.preventDefault();

        let ename = document.getElementById("ename").value;
        let evenue = document.getElementById("evenue").value;
        let date = document.getElementById("date").value;
        let time = document.getElementById("time").value;
        let edesc = document.getElementById("edesc").value;
        
          $.ajax({
            url: "ScheduleEvents/SetEvent",
            type: "POST",
            data: {
                  ename: ename,
                  evenue: evenue,
                  date: date,
                  time: time,
                  edesc:edesc
              },
            success: function(res){
          if(res == "0")
          {
            document.getElementsByClassName("alert-success")[0].style.display = "block";
            document.getElementsByClassName("alert-danger")[0].style.display = "none";
          }
          else{
            document.getElementsByClassName("alert-success")[0].style.display = "none";
            document.getElementsByClassName("alert-danger")[0].style.display = "block";
          }
        }
      });

       
      }
    </script>
  </body>
</html>
