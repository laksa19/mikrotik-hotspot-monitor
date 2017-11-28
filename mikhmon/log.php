<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}
?>
<?php
include('Net/SSH2.php');
include('./config.php');

$ssh = new Net_SSH2($iphost,$sshport);
		if (!$ssh->login($userhost, $passwdhost)) {
				exit('Login Failed');
		}

$cmd=$ssh->exec('/log print where topics~"hotspot"');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Log Hotspot Mikrotik Hotspot Monitor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="favicon.ico" />
		<style>
table.tprint { 
  margin-left:auto; 
  margin-right:auto;
  width: 100%; 
  border-collapse: collapse; 
}
table.tprint th { 
  background: #f2f2f2; 
  color: black; 
  font-weight: bold; 
  
}
table.tprint td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
		</style>
	</head>
	<body style="background: grey; color:white;">
		<div>
			<b>Log Hotspot by Mikrotik Hotspot Monitor</b><br>
			<textarea style="background: black; color:white;" rows="40" cols="150">
				<?php print_r($cmd);?>
			</textarea>
		</div>
	</body>
</html>
