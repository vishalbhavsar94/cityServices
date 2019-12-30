<div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action='pages/LoginProcess.php' method="POST">
                        <input  name='Login' type='hidden'/>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name='userid' id="userid" aria-describedby="userid" placeholder="Enter Usrid.....!" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user"  name='password' id="password" placeholder="Password" required>
                    </div>
                    <input type="submit"  class='btn btn-primary btn-user btn-block' value='Login'/>
                    <hr>
                    <div class='text-center text-danger'><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ""; ?></div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>