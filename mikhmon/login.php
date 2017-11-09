<?php session_start(); ?>
<?php
include('./config.php');
?>
<?php

if(isset($_SESSION['usermikhmon'])){
	header("Location: ./"); 
}

if(isset($_POST['login'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
		if($user == $userhost && $pass == $passwdhost){
			$_SESSION['usermikhmon']="Administrator";
			if ($iphost == ""){
				header("Location:setup.php");
			}	else
				header("Location:./");
			//echo '<script type="text/javascript"> window.open("./","_self");</script>';
		}elseif ($user == $userop && $pass == $passwdop){
			$_SESSION['usermikhmon']="Operator";
			echo '<script type="text/javascript"> window.open("./","_self");</script>';
		}else{
			$error = "Username atau Password tidak sesuai.";
	}
}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Monitor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="favicon.ico" />
		<link rel="stylesheet" href="css/style.css" media="screen">
		<style>
table.tlogin { 
  margin-left:auto; 
  margin-right:auto;
  width: 200px;
  border: 1px solid #ccc; 
}
table.tlogin th { 
  background: #008CCA; 
  color: white; 
  font-weight: bold;
  text-align: center;
}
table.tlogin td { 
  padding: 6px; 
  text-align: center; 
}
table.tsub { 
  margin-left:auto; 
  margin-right:auto;
  width: 200px;
  border: 1px solid #ccc; 
}
table.tsub th { 
  background: #008CCA; 
  color: white; 
  font-weight: bold;
  text-align: center;
}
table.tsub td { 
  padding: 6px; 
  text-align: center; 
}
.btnlogin {
  background-color: #008CCA;
  border: none;
  padding: 5px 5px;
  color: white;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  cursor: pointer;
  margin-left:auto; 
  margin-right:auto;
  border-radius: 5px;
}

textarea,input,select {
  background-color: #FDFBFB;
  border: 1px solid #008CCA;
  padding: 2px;
  margin: 2px;
  font-size: 14px;
  color: #808080;
  outline: none;
}
		</style>
	</head>
		<body>
			<div class="login">
				<table class="tnav">
				<tr>
					<td style="text-align: center;" >Mikrotik Hotspot Monitor</td>
				</tr>
				</table>
				<br>
				<form action="" method="post">
					<table class="tlogin">
						<tr>
							<th>Login Aplikasi</th>
						</tr>
						<tr>
							<td><input type="text" name="user" placeholder="Username" autofocus></td>
						</tr>
						<tr>
							<td><input type="password" name="pass" placeholder="Password" ></td>
						</tr>
						<tr>
							<td style="font-size: 12px;" ><input class="btnlogin" type="submit" name="login" value="Login"><p><?php if(isset($_POST['login'])){ print_r($error);}?></p></td>
						</tr>
					</table>
				</form>
				<br>
			</div>
		</body>
</html>
