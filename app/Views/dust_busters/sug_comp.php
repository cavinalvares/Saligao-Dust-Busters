<div class="heading">
        <br />
        <h1>FORM FOR USER COMPLAINS OR SUGGESTIONS</h1>
      </div>
      <div class="main">
        <div class="f1">
          <form onsubmit=send() method="POST" enctype="multipart/form-data">
            <br>
            <label for="sem">Select the type of input</label>
  
            <select name="itype" id="itype">
              <option value="Complain">Complain</option>
              <option value="Suggestion">Suggestion</option>

            </select>
            <br /><br />
            <label for="fname"> Details</label>
            <textarea id="ctextar" name="txtcomplain" rows="4" cols="50"></textarea><br /><br />
            
            <label for="fname">Add Image if any</label><br>
            <input
              type="file"
              name="img"
              id="file"
              style="float: left; background-color: rgb(182, 174, 174);"
              width="100"
              height="100"
            />
            <br /><br />
            <input style="float:centre ;" type="submit" id="submit" name="submit" />
            <div class="alert alert-success" role="alert">
              The Complaint/Suggestion Has Been Successfully Entered
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

  <script>
    function send(){
      event.preventDefault();
      console.log("here");
      let formdata = new FormData();
      formdata.append("itype", document.getElementById("itype").value);
      formdata.append("txtcomplain", document.getElementById("ctextar").value);
      let file = document.getElementById("file").files[0];
      
      if(file != undefined)
        formdata.append("img", file, file.name);

      $.ajax({
            url: "Form/send",
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
  </body>
</html>