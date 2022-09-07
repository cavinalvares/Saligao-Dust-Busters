
              <div class="modal-body">
                <form  action="users" method="POST">
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
                  <input id="check" type="checkbox" checked="checked" name="remember" value="signedin"/> Remember
                  me
                </label>
                
                <div class="modal-footer">
                <span id='sis' class='text-warning'></span>
                <a class="text-info" id="signup" data-bs-toggle="modal" data-bs-target="#signupForm">or create new Account</a>
                <button type="submit" class="btn btn-success">Login</button>
                </form>
              </div>
             