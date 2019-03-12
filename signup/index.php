<?php
	if(empty($_POST) === false)
	{
		$errors = array();

		$fullName = $_POST['fullName'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];

		//echo "Name: ", $name, " Email: ", $email, " Message: ", $message;

		if(empty($fullName) === true || empty($email) === true || empty($password) === true || empty($dob) === true || empty($gender) === true)
		{
			$errors[] = 'All Fields are Required!';
			//print_r($errors);
		}
		else
		{
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
			{
				$errors[] = "That's not a valid email address.";
			}
			if(ctype_alpha($fullName) === false)
			{
				$errors[] = "Name must contain only letters.";
			}
		}

 	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?php
                					if(isset($_GET['sent']) === true)
                					{
                						echo "<p> Thanks for contacting us. </p>";
                					}
                					else
                					{
                						if(empty($errors) === false)
                						{
                							echo "<ul>";
                							foreach ($errors as $error)
                							{
                								echo "<li>", $error, "</li>";
                							}
                							echo "</ul>";
                						}
                				?>
                        <form method="post" class="register-form" id="register-form" onsubmit="return checkDate()" action="submit.php">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fullName" id="name" placeholder="Your Full Name (only alphabets)" pattern="[A-Za-z]{5,}" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                            </div>
                            <div class="form-group">
                                <label for="dob"><i class="zmdi "></i></label>
                                <input type="date" name="dob" id="dob" placeholder="Your Date of Birth" required title="Enter Your Date of Birth" max="2012-01-01"/>
                            </div>
                            <div class="form-group">
                                <label for="gender"><i class="zmdi "></i></label>
                                <input name="gender" id="gender" list="genders" placeholder="Your Gender" required/>
                                <datalist id="genders">
                                  <option value="Male"></option>
                                  <option value="Female"></option>
                                  <option value="Other (Specify)"></option>
                                </datalist>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>

    </div>

		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-23581568-13');
		</script>
</body>
</html>
