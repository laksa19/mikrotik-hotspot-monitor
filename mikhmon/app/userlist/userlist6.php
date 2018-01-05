<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:../login.php");
}
?>
<?php
error_reporting(0);
require('../lib/api.php');

include('../config.php');
$API = new RouterosAPI();
$API->debug = false;
if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/ip/hotspot/user/print', false);
	$API->write('?=profile='.$profile6.'');
	$ARRAY = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile6.'');
	$ARRAY2 = $API->read();

	$API->disconnect();
}
?>
<?php
	if(isset($_POST['nama'])){
		
			$uname = ($_POST['nama']);
			if ($API->connect($iphost, $userhost, $passwdhost)) {
			}
			
			$arrID=$API->comm("/ip/hotspot/user/getall", 
							  array(
								  ".proplist"=> ".id",
								  "?name" => "$uname",
								  ));

			$API->comm("/ip/hotspot/user/remove",
				  array(
			      ".id" => $arrID[0][".id"],
			     ));
				 
			$API->disconnect();	
			
			header('Location: userlist6.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Monitor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="../img/favicon.png" />
		<link rel="stylesheet" href="../css/style.css" media="screen">
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
			<td style="text-align: center;" colspan=2>Mikrotik Hotspot Monitor</td>
		</tr>
		<tr>
			<td><?php print_r($profile6);?> Aktif  : <?php print_r($ARRAY2);?></td>
			<td>
				<button class="material-icons" onclick="Reload()" title="Reload">autorenew</button>
				<button class="material-icons" onclick="location.href='../';" title="Dashboard">dashboard</button>
				<div class="dropdown" style="float:right;">
							<button class="material-icons">local_play</button>
								<div class="dropdown-content">
									<a class="material-icons" href="#">local_play</a>
									<a href="../genkv.php">1 Voucher</a>
									<a href="../genkvs.php">1-99 Voucher</a>
									<a href="../genupm.php">1 Custom User Pass</a>
								</div>
						</div>
				<button class="material-icons" onclick="goBack()" title="Back">arrow_back</button>
			</td>
		</tr>
	</table>
		<form autocomplete="off" method="post" action="">
				<table class="tnav" align="center"  >
				<!--<tr><td>ID</td><td><td>:</td><input type="text" size="20" maxlength="20" name="id" required="1"/></td></tr>-->
				<tr><td>Hapus User</td><td>:</td><td><input type="text" size="15" maxlength="15" name="nama" placeholder="Nama User" required="1"/></td></tr>
				<tr><td></td><td></td><td><input type="submit" class="btnsubmit" value="Hapus"></td></tr>
			</table>
		</form>

		<div style="overflow-x:auto;">
			<table style="white-space: nowrap;" class="zebra" >
				<tr>
					<th >User</th>
					<th >Server</th>
					<th >Profile</th>
					<th >Uptime</th>
					<th >Generated</th>
				</tr>
				<?php
					$TotalReg = count($ARRAY);

						for ($i=0; $i<$TotalReg; $i++){
							$regtable = $ARRAY[$i];echo "<tr><td>" . $regtable['name'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['server'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['profile'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['uptime'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . substr($regtable['comment'],strlen($regtable['comment'],0) - 8,8);echo "</td> </tr>";
							}
					?>
			</table>
		</div>
	</div>
	</body>
</html>
