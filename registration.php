<?php
	session_start();
	if(isset($_SESSION['hiba'])){
		$hiba = $_SESSION['hiba'];
		echo "<script type='text/javascript'>alert('$hiba');</script>";
		unset($_SESSION['hiba']);
	}
?>
<!DOCTYPE html>
    
<html lang="en">
    <head>
        <title>Regisztráció</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/stilus.css">
    </head>
    <body>
        <div class="container-login100" style="background-image: url('images/79017058_434476557428791_8724845592146083840_n.png');">
            <div class="wrap-login100 row">
                <form class="login100-form col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 justify-content-center" action="pdo_reg.php" method="POST">
                    <span class="login100-form-title text-center">
                        Regisztráció
                    </span>
                    <span class="txt1">
                        Felhasználónév:
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" id="user" name="user" required>
                        <span class="focus-input100"></span>
                    </div>
                  
                        <span class="txt2">
                            Jelszó:
                        </span>
                   
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" id="pass" name="pass" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="reg">
                            <button class="signin" id="reg" type="submit">Regisztráció</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>