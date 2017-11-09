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
	$ARRAY = $API->comm("/ip/hotspot/active/print");

	$ARRAY1 = $API->comm("/system/schedule/print");

	$API->write('/ip/hotspot/active/print', false);
	$API->write('=count-only=', false);
	$API->write('~active-address~"1.1."');
	$ARRAY2 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile1.'');
	$ARRAY3 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile2.'');
	$ARRAY4 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile3.'');
	$ARRAY5 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile4.'');
	$ARRAY6 = $API->read();
	
	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile5.'');
	$ARRAY7 = $API->read();

	$ARRAY8 = $API->comm("/system/clock/print");
	
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
					<td colspan=2>
						<button class="material-icons" onclick="Reload()"	title="Reload">autorenew</button>
						<button class="material-icons"	onclick="location.href='logout.php';" 	title="Logout">lock</button>
						<button class="material-icons"	onclick="location.href='./setup.php';" 	title="Edit Config">settings</button>
						<button class="material-icons"	onclick="location.href='./uprofileadd.php';"	title="User Profile">local_library</button>
						<div class="dropdown" style="float:right;">
							<button class="material-icons">local_play</button>
								<div class="dropdown-content">
									<a class="material-icons" href="#">local_play</a>
									<a href="genkv.php">1 Kode Voucher</a>
									<a href="genkvs.php">21 Kode Voucher</a>
									<a href="genvoucher.php">1 User Password</a>
									<a href="genvouchers.php">21 User Password</a>
								</div>
						</div>
						<!-- -->
					</td>
				</tr>
				<tr>
				<td colspan=2>Mikrotik System Clock : 
				
							<?php
								$TotalReg = count($ARRAY8);

										for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY8[$i];echo "" . $regtable['time'] . "<br />";}echo "</td>";
							?>
				</tr>
			</table>
			<table class="tnav">
				<tr>
					<td><p>Sisa Voucher Aktif : <?php	$a=array($ARRAY3,$ARRAY4,$ARRAY5,$ARRAY6,$ARRAY7);	echo array_sum($a);	?></p></td>
					<td style="text-align: right;"><?php print_r($_SESSION['usermikhmon']);?></td>
				</tr>
			</table>
			<table class="tprinta" >
				<tr>
					<th><a href="userlists1.php"><?php print_r($vname1);?></a></th>
					<th><a href="userlists2.php"><?php print_r($vname2);?></a></th>
					<th><a href="userlists3.php"><?php print_r($vname3);?></a></th>
					<th><a href="userlists4.php"><?php print_r($vname4);?></a></th>
					<th><a href="userlists5.php"><?php print_r($vname5);?></a></th>
				</tr>
				<tr>
					<td><?php print_r($ARRAY3); ?></td>
					<td><?php print_r($ARRAY4); ?></td>
					<td><?php print_r($ARRAY5); ?></td>
					<td><?php print_r($ARRAY6); ?></td>
					<td><?php print_r($ARRAY7); ?></td>
				</tr>
			</table>
			<table class="tnav">
				<tr>
			        <td><p>User Aktif : <?php print_r($ARRAY2);?></p></td>
				</tr>
			</table>
			<table class="tprint" >
				<tr>
					<th >User</th>
					<th >IP</th>
					<th >Uptime</th>
					</tr>
				<tr>
					<td>
							<?php
								$TotalReg = count($ARRAY);

										for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY[$i];echo "" . $regtable['user'] . "<br />";}echo "</td><td>";
										for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY[$i];echo "" . $regtable['address'] . "<br />";}echo "</td><td>";
										for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY[$i];echo "" . $regtable['uptime'] . "<br />";}echo "</td>";
							?>
				</tr>
			</table>
			<table class="tnav">
                <tr>
			        <td><p>Masa Aktif User</p></td>
				    <td><p style="text-align: right;" id="date1"></p>
						<script>
							var d = new Date();
								document.getElementById("date1").innerHTML = d.toDateString();
						</script>
				    </td>
				</tr>
			</table>
			<table class="tprint" >
				<tr>
					<th >User</th>
					<th >Aktif</th>
					<th >Berakhir</th>
				</tr>
				<tr>
					<td>
							<?php
								$TotalReg = count($ARRAY1);

										for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY1[$i];echo "" . $regtable['name'] . "<br />";}echo "</td><td>";
										for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY1[$i];echo "" . $regtable['interval'] . "<br />";}echo "</td><td>";
										for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY1[$i];echo "" . $regtable['next-run'] . "<br />";}echo "</td>";

							?>
				</tr>
			</table>
		</div>
	</body>
</html>
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
