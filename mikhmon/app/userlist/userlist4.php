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
	$API->write('?=profile='.$profile4.'');
	$ARRAY = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile4.'');
	$ARRAY2 = $API->read();

	$API->disconnect();
}
$listphp = "userlist4.php";
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
			<td><?php print_r($profile4);?> Aktif  : <?php print_r($ARRAY2);?></td>
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
		<div style="overflow-x:auto;">
			<table style="white-space: nowrap;" class="zebra" >
				<tr>
				  <th style='text-align:center;'>X</th>
					<th >User</th>
					<th >Server</th>
					<th >Profile</th>
					<th >Uptime</th>
					<th >Generated</th>
				</tr>
				<?php
					$TotalReg = count($ARRAY);

						for ($i=0; $i<$TotalReg; $i++){
						  echo "<tr>";
						  $regtable = $ARRAY[$i];echo "<td style='text-align:center;'><a style='color:#000;' href=remuser.php?id=".$regtable['.id'] . "&list=".$listphp.">X</a></td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['name'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['server'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['profile'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['uptime'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . substr($regtable['comment'],strlen($regtable['comment'],0) - 8,8);echo "</td>";
							echo"</tr>";
							}
					?>
			</table>
		</div>
	</div>
	</body>
</html>
