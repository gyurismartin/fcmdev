<?php
    unset($_SESSION["username"]);
	unset($_SESSION["accesstoken"]);
	session_destroy();
	exit();