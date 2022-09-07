<div class="heading">
        <br />
        <h1>Welcome to the News Editing page</h1>
      </div>
      <div class="main main3">
        <div class="f1">
          <form onsubmit=send() method="POST" enctype="multipart/form-data">
            <br>            
            <label for="ntitle">Enter the title of the news:</label>
            <input type="text" id="ntitle" name="ntitle" /><br /><br />

            <label for="newsdetails">All Details on the news in brief</label>
            <textarea id="newsdetails" name="newsdetails" rows="4" cols="55"></textarea>
            <br><br>
            <label for="fname">Add Image if any</label><br>
            <input
              type="file"
              id="file"
              src="./images/suggestdefault.png"
              alt="profilepic"
              style="float: left; background-color: rgb(182, 174, 174);"
              width="100"
              height="100"
            />
            <br /><br />
            <input type="submit"  style="float: left;" value="Submit" />
            <br /><br />
      <div class="alert alert-success" role="alert">
        The Event Has Been Successfully Entered
      </div>
      <div class="alert alert-danger" role="alert">
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
    </div>
  </section>

  </body>
  <script>
    function send(){
      event.preventDefault();

      let formdata = new FormData();
      formdata.append("ntitle", document.getElementById("ntitle").value);
      formdata.append("newsdetails", document.getElementById("newsdetails").value);
      let file = document.getElementById("file").files[0];
      formdata.append("img", file, file.name);

      $.ajax({
            url: "AddNews/send",
            data: formdata,
            type: "POST",
            processData: false,
            contentType: false,
            success: function(res){
          if(res == "0")
          {
            document.getElementsByClassName("alert-success")[0].style.display = "block";
            document.getElementsByClassName("alert-danger")[0].style.display = "none";
          }
          else{
            document.getElementsByClassName("alert-success")[0].style.display = "none";
            document.getElementsByClassName("alert-danger")[0].style.display = "block";
            document.getElementsByClassName("alert-danger")[0].innerHTML = "The Complaint/Suggestion Has not Been Entered<br>"+res;

          }
        }
      });
      
    }
    </script>
</html>
