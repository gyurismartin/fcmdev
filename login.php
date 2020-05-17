<?php
    session_start();
	if(isset($_SESSION['hiba'])){
		$hiba = $_SESSION['hiba'];
		echo "<script type='text/javascript'>alert('$hiba');</script>";
		unset($_SESSION['hiba']);
	}
    
    require_once 'fbconfig.php';
    $redirectUrl = "https://fcmdev.hu/fb-callback.php";
    $permission = ['email'];
    $fbloginUrl = $helper->getLoginUrl($redirectUrl, $permission);
    if(isset($_SESSION["username"])){
		echo "van session";
		sleep(5);
        header('Location: szimulacio.php');
        exit();
    }						
    else if(isset($_SESSION['accesstoken'])){
        header('Location: szimulacio.php');
        exit();
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Bejelentkezés</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/stilus.css">
		<link rel="stylesheet" type="text/css" href="css/kezdolap.css">
    </head>
    <body>
		<div id="Container">
			<header>
				<div>
					<a id="title" href="kezdolap.php" style="text-decoration:none">FCMDev.hu</a>
				</div>
				<nav>
					<a class="nav-link" id="kezdolap" href="kezdolap.php">Kezdőlap</a>
					<a class="nav-link" id="fcm" href="fcm.php">FCM bemutatása</a>
					<a class="nav-link" id="linkek" href="linkek.php">Linkek</a>
					<a class="nav-link" id="login" href="login.php" style="text-decoration: underline;">Bejelentkezés</a>
				</nav>
			</header>
		</div>
        <div class="container-login100" style="background-image: url('images/79017058_434476557428791_8724845592146083840_n.png');">
            <div class="wrap-login100 row" style="margin: 0px">
                <form class="login100-form col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 justify-content-center" action="pdo_process.php" method="POST">
                    <span class="login100-form-title text-center">
                        Bejelentkezés
                    </span>
                    <span class="txt1">
                        Felhasználónév:
                    </span>
                    <div class="wrap-input100 validate-input d-flex justify-content-center">
                        <input class="input100" type="text" id="user" name="user" >
                        <span class="focus-input100"></span>
                    </div>
                  
                        <span class="txt2">
                            Jelszó:
                        </span>
                   
                    <div class="wrap-input100 validate-input d-flex justify-content-center">
                        <input class="input100" type="password" id="pass" name="pass" >
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-signin d-flex justify-content-center" style="margin-bottom: 10px">
                        <button class="signin" name="signin" id="btn" type="submit">Bejelentkezés</button>
                    </div>
				</form>
				<form class="login100-form col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 justify-content-center" action="registration.php" style="margin-bottom: 10px">
                        <button class="signin" id="reg" type="submit">Regisztráció</button>
                </form>
				<div class="login100-form col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
					<button class="btn-face" onclick="window.location = '<?php echo $fbloginUrl ?>';">
						Facebook
					</button>
				</div>
			</div>
        </div>
        <script>
            function btnclick(){
                location.href="menu.php";
            }
        </script>
  </body>
</html>