<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title ?></title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/fonts.google.css" />

		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<h1>
										<i class="icon-building green"></i>
										<span class="red">SAB</span>
										<span class="white">Multi Project</span>
									</h1>
									<h4 class="blue">&copy; MCS-2012</h4>
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-coffee green"></i>
													Please Enter Your Information
												</h4>
												<div id="msg" class="alert">&nbsp;</div>
												<div class="space-6"></div>

												<form>
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" id="email" class="span12" placeholder="Email" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" id="password" class="span12" placeholder="Password" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="clearfix">
															<label class="inline">
																<input type="checkbox" />
																<span class="lbl"> Remember Me</span>
															</label>

															<button type="button" onclick="submit_this();" class="width-35 pull-right btn btn-small btn-primary">
																<i class="icon-key"></i>
																Login
															</button>
														</div>

														<div class="space-4"></div>
													</fieldset>
												</form>

											
											</div><!--/widget-main-->

											<div class="toolbar clearfix">
												<div>
													<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
														<i class="icon-arrow-left"></i>
														I forgot my password
													</a>
												</div>

												<div>
													<a href="#" onclick="show_box('signup-box'); return false;" class="user-signup-link">
														I want to register
														<i class="icon-arrow-right"></i>
													</a>
												</div>
											</div>
										</div><!--/widget-body-->
									</div><!--/login-box-->

									<div id="forgot-box" class="forgot-box widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header red lighter bigger">
													<i class="icon-key"></i>
													Retrieve Password
												</h4>

												<div class="space-6"></div>
												<p>
													Enter your email and to receive instructions
												</p>

												<form />
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="Email" />
																<i class="icon-envelope"></i>
															</span>
														</label>

														<div class="clearfix">
															<button onclick="return false;" class="width-35 pull-right btn btn-small btn-danger">
																<i class="icon-lightbulb"></i>
																Send Me!
															</button>
														</div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													Back to login
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/forgot-box-->

									<div id="signup-box" class="signup-box widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header green lighter bigger">
													<i class="icon-group blue"></i>
													New User Registration
												</h4>

												<div class="space-6"></div>
												<p> Enter your details to begin: </p>

												<form />
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="Email" />
																<i class="icon-envelope"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12" placeholder="Username" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="Password" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="Repeat password" />
																<i class="icon-retweet"></i>
															</span>
														</label>

														<label>
															<input type="checkbox" />
															<span class="lbl">
																I accept the
																<a href="#">User Agreement</a>
															</span>
														</label>

														<div class="space-24"></div>

														<div class="clearfix">
															<button type="reset" class="width-30 pull-left btn btn-small">
																<i class="icon-refresh"></i>
																Reset
															</button>

															<button onclick="return false;" class="width-65 pull-right btn btn-small btn-success">
																Register
																<i class="icon-arrow-right icon-on-right"></i>
															</button>
														</div>
													</fieldset>
												</form>
											</div>

											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													<i class="icon-arrow-left"></i>
													Back to login
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/signup-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
		<script src="<?php echo base_url()?>assets/jquery.min.js"></script>
		<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url()?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='<?php echo base_url()?>assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url()?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="<?php echo base_url()?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			function show_box(id) {
				$('.widget-box.visible').removeClass('visible');
				$('#'+id).addClass('visible');
			}

			function submit_this(){
				var base_url = '<?php echo base_url() ?>';
				$.ajax({
					url: base_url+"index.php/account/login",
					type: "POST",
						data:{
						email:$("#email").val(),
						passwor:$("#password").val(),
					},
					success:function(response){
						if(response == 1){
							$("#msg").text("Login success...");
							$(location).attr('href',base_url);

							// $("form.login input, form.login h1, form.login p").fadeOut(800).delay(2000);
							// $(".progress").fadeIn(1000);
							// $("#response").removeClass();
							// $("#response").addClass("alert alert-success").html("Hello <?php echo $this->session->userdata('login_fname')?>. You are successfully loged in. Please wait, the login session being created.");
							// for(i = 1; i<=100; i++){
							// 	$(".progress-bar").attr("style","width:"+i+"%");
							// }
						} else if(response == 2){
							$("#msg").text("Password not correct. Please try again");
							$("#msg").addClass("alert-danger");
							// $("#response").removeClass();
							// $("#response").addClass("alert alert-danger").html("Login email is not correct...");
						}
					}
				})

		
			}

		</script>
	</body>
</html>
