<?php
    ob_start();
    session_start();

    function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}

	

	function confirm_session(){
		if (logged_in()) {
			redirect_to("index.php");
		}
	}

	function chkLvl(){
		if($_SESSION['user_lvl']==0){
			redirect_to("index.php");
		}
	}
?>