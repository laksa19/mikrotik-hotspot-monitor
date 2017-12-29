<?php session_start(); ?>
<?php
error_reporting(0);
include('./config.php');
if(isset($_SESSION['usermikhmon'])){
	header("Location: ./"); 
}

if(isset($_POST['login'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
		if($user == $userhost && $pass == $passwdhost){
			$_SESSION['usermikhmon']=$user;
				header("Location:./");
		}elseif ($user == $useradm && $pass == $passadm){
			$_SESSION['usermikhmon']="Admin";
			header("Location:setup.php");
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
		<link rel="icon" href="img/favicon.png" />
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
  width:95%;
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
			<div id="login">
				<form autocomplete="off" action="" method="post">
					<br>
					<table style="border:0px;" class="tlogin">
					<td><img src="./img/favicon.png" alt="mikhmon" /></td>
					</table>
					<table class="tlogin">
						<tr>
							<th>MIKHMON</th>
						</tr>
						<tr>
							<td><input type="text" name="user" placeholder="Username" required="1" autofocus></td>
						</tr>
						<tr>
							<td><input type="password" name="pass" placeholder="Password" required="1" ></td>
						</tr>
						<tr>
							<td style="font-size: 14px; color:red; " ><input class="btnlogin" type="submit" name="login" value="Login"><p><?php if(isset($_POST['login'])){ print_r($error);}?></p></td>
						</tr>
					</table>
				</form>
				<br>
			</div>
		</body>
</html>
