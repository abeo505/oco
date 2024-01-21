<?php
	ob_start();
	session_start();
    include "tpl.php";
    include "conn.php";

    if (isset($_POST['login'])) {

        $user = $_POST['username'];
        $pass = $_POST['password'];
        $hashedPass = sha1($pass);

        // Check If The User Exist In Database

        $stmt = $con->prepare("SELECT 
                                    id, uname, pass 
                                FROM 
                                    users 
                                WHERE 
                                    uname = ? 
                                AND 
                                    pass = ?");

        $stmt->execute(array($user, $pass));

        $get = $stmt->fetch();

        $count = $stmt->rowCount();

        // If Count > 0 This Mean The Database Contain Record About This Username

        if ($count > 0) {

            $_SESSION['user'] = $get['uname']; // Register Session Name

            $_SESSION['uid'] = $get['id']; // Register User ID in Session

            header('Location: user.php'); // Redirect To Dashboard Page

            exit();
        }else{
            echo '<div class="alert alert-danger" role="alert">User not exsit</div>';
        }

    }
    // Check If User Coming From HTTP Post Request

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
		<span class="selected" data-class="login">Login</span>
	</h1>
	<!-- Start Login Form -->
    <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="padding: 3%;">
		<div class="input-container" style="margin-bottom: 2%;">
			<input 
				class="form-control" 
				type="text" 
				name="username" 
				autocomplete="off"
				placeholder="Type your username" 
				required />
		</div>
		<div class="input-container" style="margin-bottom: 2%;">
			<input 
				class="form-control" 
				type="password" 
				name="password" 
				autocomplete="new-password"
				placeholder="Type your password" 
				required />
		</div>
		<input class="btn btn-primary btn-block" name="login" type="submit" value="Login" />
        <button class="btn btn-secondary btn-block" name="signup"><a href="signup.php" style="color:beige">Sign up</a> </button>
    </form>
	<!-- End Login Form -->
</div>