<?php


session_start();
if (isset($_SESSION['LAST_REQUEST_TIME'])) {
    if (time() - $_SESSION['LAST_REQUEST_TIME'] > 10) {
       
        $_SESSION = array();
        session_destroy();
		header("Location:login.php");
    }
	else{
	echo "Hello.. , ".$_SESSION["username"]."<br><br>";	
}

}
$_SESSION['LAST_REQUEST_TIME'] = time();




?>