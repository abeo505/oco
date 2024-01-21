<?php
	ob_start();
	session_start();
    include "tpl.php";
    include "conn.php";
    // Check If User Coming From HTTP Post Request
		
    if (isset($_POST['signup'])) {
        
        
        $stmt = $con->prepare("INSERT INTO users (name, uname, 
        skill ,email,pass) 
        VALUES (:name, :uname, :skill , :email, :pass)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':uname', $user);
        $stmt->bindParam(':skill', $skill);
        $stmt->bindParam(':email', $mail);
        $stmt->bindParam(':pass', $pass);

        $name = $_POST['name'];
        $user = $_POST['user'];
        $skill = $_POST['skill'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];

        $stmt->execute();

        echo '<div class="alert alert-info" role="alert">User added</div>';
        
    }
?>


<!--start header -->
<header class="masthead text-center">
<div class="container align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-4" src="assets/img/avataaars.svg" alt="..." />
            </div>
</header>
<!-- end header -->

<div class="container login-page text-center">
	<h1 class="text-center">
		<span class="selected" data-class="login">Sign Up</span>
	</h1>
	<!-- Start Login Form -->
	<form class="login" name="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="padding: 3%;">
		<div class="input-container" style="margin-bottom: 2%;">
			<input 
				class="form-control" 
				type="text" 
				name="name" 
				autocomplete="off"
				placeholder="Type your name" 
				required />
		</div>
		<div class="input-container" style="margin-bottom: 2%;">
			<input 
				class="form-control" 
				type="text" 
				name="user" 
				autocomplete="new-password"
				placeholder="Type your username" 
				required />
		</div>
        <div class="input-container" style="margin-bottom: 2%;">
			<input 
				class="form-control" 
				type="text" 
				name="skill" 
				placeholder="Type your skills" 
				required />
		</div>
        <div class="input-container" style="margin-bottom: 2%;">
			<input 
				class="form-control" 
				type="email" 
				name="mail" 
				placeholder="Type your Email" 
				required />
		</div>
        <div class="input-container" style="margin-bottom: 2%;">
			<input 
				class="form-control" 
				type="password" 
				name="pass" 
				placeholder="Type your password" 
				required />
		</div>
		<input class="btn btn-primary btn-block" name="signup" type="submit" value="Sign Up" />
        <button class="btn btn-secondary btn-block" name="login"><a href="login.php" style="color:beige">log in</a> </button>
	</form>
	<!-- End Login Form -->
</div>