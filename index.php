<?php
/**
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/custom2.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
	<body style="background-color: #222;" >
	<div class="container" style="width: 500px;">
	<form class="form-signin" action="includes/process_login.php" method="post" name="login_form">
	<br />

    <div>
	<img style="padding-right: 50px;transform: translate(-10%, 0%);" width="450px" src="../img/edms.png"></img>
    <?php
        if (isset($_GET['error'])) {
            echo '<br /><br /><p class="error" style="color: white">Error: Incorrect username or password!</p>';
        } else {
            echo '<p class="error" style="color: white">&nbsp;</p>';
        }
    ?>
        <div>
    	   <input type="email" style="text-align: center;" name="email" class="form-control centered" placeholder="Email address" required autofocus >
    	   <input type="password" style="text-align: center;" name="password" id="password" class="form-control centered" placeholder="Password" required>
    	   <input class="btn btn-lg btn-primary btn-block" type="button" class="btn btn-lg btn-primary btn-block" value="Login" onclick="formhash(this.form, this.form.password);" />
        </div>
        <p class="error" style="text-align: center; color: white"><br />Copyright &copy; 2014, all rights reserved.</p>
    </div>
	</form>
	</div>  
</html>

<?php require_once("includes/footer.php"); ?>

