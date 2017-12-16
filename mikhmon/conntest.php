<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}
?>
<?php
require('./api.php');
include('./config.php');
if ($reloadindex == "0"){ 
} else
header("Refresh: $reloadindex ; url='./'");
$API = new RouterosAPI();
$API->debug = false;
if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$ARRAY = $API->comm("/system/resource/print");
    $API->disconnect();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Monitor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="refresh" content="" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="favicon.ico" />
		<link rel="stylesheet" href="css/style.css" media="screen">
		<script>
			function Reload() {
				location.reload();
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
					<td>Tes Koneksi ke Mikrotik</td>
					<td>
						<button class="material-icons" onclick="Reload()"	title="Reload">autorenew</button>
						<button class="material-icons"	onclick="location.href='./setup.php';" 	title="Edit Config">settings</button>
						<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
					</td>
				</tr>
			</table>
			<table class="tnav" >
				<tr>
					<td>
							<?php
								$TotalReg = count($ARRAY);

										for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY[$i];echo "Platform : " . $regtable['platform'] . "<br />";}echo "</td><tr><td>";
										for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY[$i];echo "Board Name : " . $regtable['board-name'] . "<br />";}echo "</td></tr><td>";
										for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY[$i];echo "Version : " . $regtable['version'] . "<br />";}echo "</td>";
							?>
				</tr>
			</table>
		</div>
	</body>
</html>

