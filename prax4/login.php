<!-- BEGIN # MODAL TRIGGER INFO
<div class="container">
	<div class="row">
		<h1 class="text-center">Modal Login with jQuery Effects</h1>
        <p class="text-center"><a href="#" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Open Login Modal</a></p>
	</div>
</div>END # MODAL TRIGGER INFO -->

<?php
	if (isset($_GET["signup"])) {
		echo "<script>alert('".$_GET["signup"]."');</script>";
	}
?>

<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<!-- <img class="img-circle" id="img_logo" src="logo.jpg"> -->
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="fa fa-times" aria-hidden="true"></span>
					</button>
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form" action="php/signin.php" method="POST">
		                <div class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="fa fa-chevron-right"></div>
                                <span id="text-login-msg">Enter your credentials.</span>
                            </div>
				    		<input name="login_username" id="login_username" class="form-control" type="text" placeholder="Username" required>
				    		<input name="login_password" id="login_password" class="form-control" type="password" placeholder="Password" required>
                            <div class="checkbox">
                            </div>
        		    	</div>
				        
		    		    <div class="modal-footer">
							<div class="container btn-block">
							  <div class="row">
								<div class="col-lg-4 col-md-6 mx-auto">
									<button type="submit" name="signin_submit" class="btn btn-primary btn-lg btn-block" style="float: right;">Login</button>
							  </div>
							</div>
						</div>
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form
                    <form id="lost-form" style="display:none;">
    	    		    <div class="modal-body">
		    				<div id="div-lost-msg">
                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-lost-msg">Type your e-mail.</span>
                            </div>
		    				<input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                            </div>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
		    		    </div>
                    </form>
                    End | Lost Password Form -->
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
	</div>
</div>
    <!-- END # MODAL LOGIN -->
	
<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<!-- <img class="img-circle" id="img_logo" src="logo.jpg"> -->
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="fa fa-times" aria-hidden="true"></span>
					</button>
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                    
                    <!-- Begin | Register Form -->
                    <form id="register-form" action="php/signup.php" method="POST">
            		    <div class="modal-body">
		    				<div id="div-register-msg">
                                <div id="icon-register-msg" class="fa fa-chevron-right"></div>
                                <span id="text-register-msg">Register an account.</span>
                            </div>
		    				<input name="register_username" id="register_username" class="form-control" type="text" placeholder="Username" required>
                            <input name="register_email" id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                            <input name="register_password" id="register_password" class="form-control" type="password" placeholder="Password" required>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                            </div>
							<!--
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            </div>
							-->
		    		    </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
	</div>
    <!-- END # MODAL SIGNUP -->