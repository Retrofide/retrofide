<?php
   include("includes/config.php");
   include("includes/classes/Account.php");
   include("includes/classes/Constants.php");

   $account = new Account($con);

   include("includes/handlers/register-handler.php");
   include("includes/handlers/login-handler.php");

   function getInputValue($name) {
   	if(isset($_POST[$name])) {
   		echo $_POST[$name];
   	}
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Retrofide!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
	<script src="assets/js/sweetalert2.js"></script>
</head>
<body>

	<?php
		if(isset($_POST['registerButton'])) {
			echo '<script>
			$(document).ready(function() {
				$("#loginForm").hide();
				$("#registerForm").show();
			});
			</script>';
		} else {
			echo '<script>
			$(document).ready(function() {
				$("#loginForm").show();
				$("#registerForm").hide();
			});
			</script>';
		}

	?>
	
	<div id="background">

	    <div id="loginContainer">
	   
			<div id="inputContainer">
			    <form id="loginForm" action="register.php" method="POST">
			    	<img src="assets/images/icons/ICON.png" id="logoRegisterIcon" alt="Retrofide Logo"/>
			    	<img src="assets/images/logoRegister.png" id="logoRegister" alt="Retrofide"/>
			    	<h4 id="beta">Beta</h4>
			        <h2>Login to your account</h2>
			        <p>
			         	<?php echo $account->getError(Constants::$loginFailed); ?>
			         	<label for="loginUsername">Username</label>
			         	<input id="loginUsername" name="loginUsername" type="text" placeholder="Username" value="<?php getInputValue('loginUsername') ?>" required>
			        </p>
			    	<p>
			         		<label for="loginPassword">Password</label>
			         		<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
			        </p>

						 <button type="submit" name="loginButton">LOGIN</button>
						 
						 <div class="hasAccountText">
							<span id="hideLogin">Don't have an account yet? Signup here</span> 
						</div>  
			            </form>

			         	<form id="registerForm" action="register.php" method="POST">
			         	<img src="assets/images/icons/ICON.png" id="logoRegisterIcon" alt="Retrofide Logo"/>
			    		<img src="assets/images/logoRegister.png" id="logoRegister" alt="Retrofide"/>
			    		<h4 id="beta">Beta</h4>
			         	<h2>Create your free account</h2>
			         	<p>
			         		<?php echo $account->getError(Constants::$usernameCharacters); ?>
			         		<?php echo $account->getError(Constants::$usernameTaken); ?>
			         		<label for="username">Username</label>
			         		<input id="username" name="username" type="text" placeholder="Username" value="<?php getInputValue('username') ?>"required>
			         	</p>

			         	<p>
			         		<?php echo $account->getError(Constants::$firstNameCharacters); ?>
			         		<label for="firstName">First Name</label>
			         		<input id="firstName" name="firstName" type="text" placeholder="First Name" value="<?php getInputValue('firstName') ?>" required>
			         	</p>

			         	<p>
			         		<?php echo $account->getError(Constants::$lastNameCharacters); ?>
			         		<label for="lastName">Last Name</label>
			         		<input id="lastName" name="lastName" type="text" placeholder="Last Name" value="<?php getInputValue('lastName') ?>" required>
			         	</p>

			         	<p>
			         		<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
			         		<?php echo $account->getError(Constants::$emailInvalid); ?>
			         		<?php echo $account->getError(Constants::$emailTaken); ?>
			         		<label for="email">Email</label>
			         		<input id="email"" name="email"" type="email" placeholder="Email"" value="<?php getInputValue('email') ?>" required>
			         	</p>

			         	<p>
			         		<label for="email2"">Confirm Email</label>
			         		<input id="email2" name="email2" type="email" placeholder="Email" value="<?php getInputValue('email2') ?>" required>
			         	</p>

			         	<p>
			         		<?php echo $account->getError(Constants::$passwordCharacters); ?>
			         		<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
			         		<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
			         		<label for="password">Password</label>
			         		<input id="password" name="password" type="password" placeholder="Your Password" required>
			         	</p>

			         	<p>
			         		<label for="password2">Confirm Password</label>
			         		<input id="password2" name="password2" type="password" placeholder="Your Password" required>
			         	</p>

						 <button type="submit" name="registerButton">SIGN UP</button>
						 
						 <div class="hasAccountText">
							<span id="hideRegister">Already have an account? Login here.</span> 
						</div>

					</form>
					
				</div>
				   
				<div id="loginText">
					<h1>A Beatiful <br/> Video Game <br /> Music Player</h1>
					<h2>Stream Video Game Remixes Now!</h2>
					<ul>
						<li>Create playlists of your favorites</li>
						<li>Search by game, console, artist, and genre style</li>
						<li>It's 100% FREE</li>
					</ul>
				</div>
		</div>
	</div>

</body>
</html>