<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/includesPF/helpers.inc.php'; ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
	<head>
		        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css"/>
		<script type = "text/javascript">
			function comPWords(){
				var p1 = document.getElementById('passwordsignup').value;
				var p2 = document.getElementById('passwordsignup_confirm').value;
				if(p1 != p2){
					document.getElementById('pWordMsg').style.color ="red";
					document.getElementById('pWordMsg').innerHTML = "X";
					document.getElementById('signinBtn').disabled = "true";
				}else{
					document.getElementById('pWordMsg').style.color ="green";
					document.getElementById('pWordMsg').innerHTML = "&#10004";
					document.getElementById('signinBtn').disabled = "false";
				}
			}
		</script>
		
	</head>
	<body><section>
		<div id = "content"></div>			
			
			<div id = "welcome">
				<h1>Welcome to <br>
				Phamily Fotos</h1>
			</div>
			<div id = "welcomeImgs">
				<img id = "scene9" src = "images/large/image27.jpg" alt = "Gang at Skerries"/>
				<img id = "scene5" src = "images/large/image31.jpg" alt = "View at Cobh"/>
			</div>
			
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" autocomplete="on" method = "post"> 
                                <h1>Log in</h1> 
								<?php if(isset($loginError)): ?>
									<p><?php echo htmlout($loginError); ?></p>
								<?php endif; ?>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button">
									<input type = "hidden" name = "action" value = "login"/>
                                    <input type="submit" value="Login"/> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="join.php" autocomplete="on" method = "post"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="username" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
								
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" onkeyup = "comPWords()" placeholder="eg. X8df!90EO"/><div id = "pWordMsg"></div>									
								</p>
                                <p class="signin button"> 
									<input id = "signinBtn" type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
	</body>
</html>