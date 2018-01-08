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
		<link rel="icon" href="./img/favicon.png" />
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
								$cek = ($ARRAY[0]['platform']);
								if ($cek == ""){
									 ?><meta http-equiv="refresh" content="0; url=setup.php"><?php
								}
										$regtable = $ARRAY[0];echo "Platform <td>:</td><td>" . $regtable['platform'] . "<br />";echo "</td><tr><td>"; 
										$regtable = $ARRAY[0];echo "Board Name <td>:</td><td>" . $regtable['board-name'] . "<br />";echo "</td></tr><td>";
										$regtable = $ARRAY[0];echo "Version <td>:</td><td>" . $regtable['version'] . "<br />";echo "</td></tr><td>";
										$regtable = $ARRAY[0];echo "CPU Load<td>:</td><td>" . $regtable['cpu-load'] . "%<br />";echo "</td></tr><td>";
										$regtable = $ARRAY[0];echo "Free Memory <td>:</td><td>" . formatBytes2($regtable['free-memory'],0) . "<br />";echo "</td></tr><td>";
										$regtable = $ARRAY[0];echo "Free HDD Space <td>:</td><td>" . formatBytes2($regtable['free-hdd-space'],0) . "<br />";echo "</td>";
							?>
				</tr>
			</table>
		</div>
	</body>
<?php

function formatBytes($bytes, $precision = 2) { 
$units = array('B', 'KB', 'MB', 'GB', 'TB'); 

$bytes = max($bytes, 0); 
$pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
$pow = min($pow, count($units) - 1); 

// Uncomment one of the following alternatives
// $bytes /= pow(1024, $pow);
// $bytes /= (1 << (10 * $pow)); 

return round($bytes, $precision) . ' ' . $units[$pow]; 
} 

function formatBytes2($size, $decimals = 0){
$unit = array(
'0' => 'Byte',
'1' => 'KiB',
'2' => 'MiB',
'3' => 'GiB',
'4' => 'TiB',
'5' => 'PiB',
'6' => 'EiB',
'7' => 'ZiB',
'8' => 'YiB'
);

for($i = 0; $size >= 1024 && $i <= count($unit); $i++){
$size = $size/1024;
}

return round($size, $decimals).' '.$unit[$i];
}

?>
</html>

