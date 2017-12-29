<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}
?>
<?php
error_reporting(0); 
require('./lib/api.php');
include('./config.php');
$API = new RouterosAPI();
$API->debug = false;
if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/ip/dns/static/print', false);
	$API->write('?=address=127.0.0.1');
	$ARRAY = $API->read();

	$API->disconnect();
}
?>
<?php
	if(isset($_POST['name'])){

			$dnsname = ($_POST['name']);

			if ($API->connect($iphost, $userhost, $passwdhost)) {
			}
			
			$arrID=$API->comm("/ip/dns/static/getall", 
						  array(
				  ".proplist"=> ".id",
				  "?name" => "$dnsname",
				  ));

			$API->comm("/ip/dns/static/remove",
				  array(
						  ".id" => $arrID[0][".id"],
						 ));
				 
			$API->disconnect();	
			
			header('Location: dnsstaticrm.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Monitor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="./img/favicon.png" />
		<link rel="stylesheet" href="css/style.css" media="screen">
		<script>
			function Reload() {
				location.reload();
			}
			function goBack() {
				window.history.back();
			}
		</script>
	</head>
	<body>
	<div class="main">
	<table class="tnav">
		<tr>
			<td style="text-align: center;" colspan=2>Daftar DNS Static</td>
		</tr>
		<tr>
			<td>
				<button class="material-icons" onclick="Reload()" title="Reload">autorenew</button>
				<button class="material-icons" onclick="location.href='./dnsstaticadd.php';" title="Add DNS Static">cloud_queue</button>
				<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
				<button class="material-icons" onclick="goBack()" title="Back">arrow_back</button>
			</td>
		</tr>
	</table>
		<form autocomplete="off" method="post" action="">
				<table class="tnav" align="center"  >
				<!--<tr><td>ID</td><td><td>:</td><input type="text" size="20" maxlength="20" name="id" required="1"/></td></tr>-->
				<tr><td>DNS Name</td><td>:</td><td><input type="text" size="20"  name="name" placeholder="DNS name" required="1"/></td></tr>
				<tr><td></td><td></td><td><input type="submit" class="btnsubmit" value="Remove"/></td></tr>
			</table>
		</form>

		<div style="overflow-x:auto;">
			<table class="tprint" >
				<tr>
					<th >Name</th>
				</tr>
				<tr><td>
				<?php
					$TotalReg = count($ARRAY);

					for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY[$i];echo "" . $regtable['name'] . "<br />";}echo "</td>";

				?>
				</tr>
			</table>
		</div>
	</div>
	</body>
</html>
