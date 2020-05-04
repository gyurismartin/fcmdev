<?php
    session_start();
	if(isset($_SESSION['hiba'])){
		$hiba = $_SESSION['hiba'];
		echo "<script type='text/javascript'>alert('$hiba');</script>";
		unset($_SESSION['hiba']);
	}
    /*require_once 'config.php';*/
    require_once 'fbconfig.php';
    $redirectUrl = "https://fcmdev.hu/szakdoga/fb-callback.php";
    $permission = ['email'];
    $fbloginUrl = $helper->getLoginUrl($redirectUrl, $permission);
    if(isset($_SESSION["username"])){
        header('Location: fcm.php');
        exit();
    }
    /*else  if(isset($_SESSION['access_token'])){
        header('Location: menu.php');
        exit();
    }
    else if(isset ($_SESSION['accesstoken'])){
        header('Location: menu.php');
        exit();
    }*/

    /*$loginURL = $gClient->createAuthUrl();*/
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Bejelentkezés</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css_files/stilus.css">
    </head>
    <body>
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
				<!--<div class="login100-form col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex justify-content-center">
					<button class="btn-google" onclick="window.location ="*/>
						Google
					</button>
				</div>-->
			</div>
        </div>
        <script>
            function btnclick(){
                location.href="menu.php";
            }
        </script>
  </body>
</html>