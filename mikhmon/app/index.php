<?php
/*
 *  Copyright (C) 2017, 2018 Laksamadi Guko.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
session_start();
?>
<?php
error_reporting(0);
require('./lib/api.php');
include('./config.php');

if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}



$oldbuild = 2053;
$build = file_get_contents('build.txt');
				$getbuild = explode("\n",$build);
				$newbuild = $getbuild[0];

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

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile6.'');
	$ARRAY8 = $API->read();
	
	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile7.'');
	$ARRAY9 = $API->read();
	
	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile8.'');
	$ARRAY10 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile9.'');
	$ARRAY11 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile10.'');
	$ARRAY12 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile11.'');
	$ARRAY13 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile12.'');
	$ARRAY14 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile13.'');
	$ARRAY15 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile14.'');
	$ARRAY16 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile15.'');
	$ARRAY17 = $API->read();

	$ARRAY18 = $API->comm("/system/clock/print");
	$ARRAY19 = $API->comm("/system/resource/print");
	$ARRAY20 = $API->comm("/system/routerboard/print");
	
    $API->disconnect();
    
	$a=array($ARRAY3,$ARRAY4,$ARRAY5,$ARRAY6,$ARRAY7,$ARRAY8,$ARRAY9,$ARRAY10,$ARRAY11,$ARRAY12,$ARRAY13,$ARRAY14,$ARRAY15,$ARRAY16,$ARRAY17);
	$aa = array_sum($a);
}
?>
<?php
  if(isset($_POST['btnupdate'])){
   copy("http://laksa.mooo.com/ota-update/app/build.txt","build.txt");
   copy("http://laksa.mooo.com/ota-update/app/otaupdate.dat","otaupdate.php");
   echo "<script>location.href='';</script>";
  }

?>
<?php
if ($reloadindex == ""){
} else
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: $reloadindex ; url='$url1'");

// Kick User
$id = $_GET['id'];
if(isset($id)){
if ($API->connect( $iphost, $userhost, $passwdhost )) {
$API->comm("/ip/hotspot/active/remove", array(
".id"=> "$id",));
$API->disconnect();
header("Location:./");
}
}
// Get User
$name = $_GET['usr'];
	if(isset($name)){
	if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/system/scheduler/print', false);
	$API->write('?=name='.$name.'');
	$ARRAY1 = $API->read();
	$regtable = $ARRAY1[0];
	      $user = $regtable['name'];
				$exp = $regtable['next-run'];
				$strd = $regtable['start-date'];
				$strt = $regtable['start-time'];
				$cek = $regtable['interval'];
					$ceklen = strlen(substr($cek,0));
					$cekw = substr($cek, 0,2);
					$cekw1 = substr($cekw, 0,1) ."Minggu";
					$cekd = substr($cek, 2,2);
					$cekd1 = substr($cek, 2,1) ."Hari";
				if ($ceklen > 3){
					$cekall = $cekw1 ." ".$cekd1;
				}elseif (substr($cek, -1) == "h"){
					$cek1 = substr($cek, 0,-1);
					$cekall = $cek1 ."Jam";
				}elseif (substr($cek, -1) == "d"){
					$cek1 = substr($cek, 0,-1);
					$cekall = $cek1 ."Hari";
				}elseif (substr($cek, -1) == "w"){
					$cek1 = substr($cek, 0,-1);
					$cekall = $cek1 ."Minggu";
				}elseif($cekall == ""){
					}
				 $cekall;
				 $API->disconnect();
	}}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Monitor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="refresh" content="" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="img/favicon.png" />
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
						<button class="material-icons"	onclick="location.href='./setup.php';" 	title="Setup Edit Config">settings</button>
						<button class="material-icons"	onclick="location.href='./hotspotlog.php';" 	title="Log Hotspot">subject</button>
						<button class="material-icons" onclick="location.href='./dnsstaticadd.php';" title="Add DNS Static">cloud_queue</button>
						<button class="material-icons"	onclick="location.href='./uprofileadd.php';"	title="User Profile">local_library</button>
						<div class="dropdown" style="float:right;">
							<button class="material-icons dropbtn">local_play</button>
								<div class="dropdown-content">
									<a style="border-bottom: 1px solid #ccc;" href="#">Ganerate</a>
									<a href="genkv.php">1 Voucher</a>
									<a href="genkvs.php">1-99 Voucher</a>
									<a href="genupm.php">1 Custom User Pass</a>
								</div>
						</div>
						<button class="material-icons"	onclick="location.href='../status';"	title="Status User">account_box</button>
						<form  method="post"><input type="submit" name="btnupdate" class="material-icons"	title="Cek Update" value="system_update_alt"></form>
						<!-- -->
					</td>
				</tr>
				<tr>
				<td colspan=2>Mikrotik System Date :
				
							<?php
								$regtable = $ARRAY18[0]; echo " " . $regtable['date']; echo " " . $regtable['time'] . "<br />"; echo "</td>";
								$timemk = ($ARRAY18[0]['time']);
								if($timemk == ""){
								?><meta http-equiv="refresh" content="0; url=logout.php"><?php
								}
							?>
				</tr>
				<td>
							<?php
									$regtable = $ARRAY20[0];echo "" . $regtable['model'] . " ";
									$regtable = $ARRAY19[0];echo "" . $regtable['version'] . "<br>";
									$regtable = $ARRAY19[0];echo "Free Memory : " . formatBytes2($regtable['free-memory'], 0); echo "<br>";
									echo "</td>";
							?>
				<td style="text-align:right;"><?php if($newbuild > $oldbuild){echo "<a href='otaupdate.php' title='Download update, klik di sini!'><i style='color:red;'>New update! | Build : $newbuild</i></a>";}else{echo "Mikhmon Build : $oldbuild";} ?></td>
				</tr>
			</table>
			<table class="tnav">
				<tr>
					<td><p>Sisa Voucher Aktif : <?php	echo $aa;	?></p></td>
					<td style="text-align: right;"><?php print_r($_SESSION['usermikhmon']);?></td>
				</tr>
			</table>
              <?php
								$proflist = array ('1'=>$profile1,$profile2,$profile3,$profile4,$profile5,$profile6,$profile7,$profile8,$profile9,$profile10,$profile11,$profile12,$profile13,$profile14,$profile15);
								$sisa = array('1'=>$ARRAY3,$ARRAY4,$ARRAY5,$ARRAY6,$ARRAY7,$ARRAY8,$ARRAY9,$ARRAY10,$ARRAY11,$ARRAY12,$ARRAY13,$ARRAY14,$ARRAY15,$ARRAY16,$ARRAY17);
								
								echo "<div style='overflow-x:auto;'><table class='tprinta' ><tr>";
				            
									if($profile1 == ""){
									}elseif ($profile2 == ""){
									  ?>
									  <?php for ($i = 1; $i <= 1; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 1; $i <= 1; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									
									}elseif ($profile3 == ""){
									  ?>
										<?php for ($i = 1; $i <= 2; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 1; $i <= 2; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									}elseif ($profile4 == ""){
									  ?>
										<?php for ($i = 1; $i <= 3; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 1; $i <= 3; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									}elseif ($profile5 == ""){
									  ?>
										<?php for ($i = 1; $i <= 4; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 1; $i <= 4; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									}else{
									  ?>
									  <?php for ($i = 1; $i <= 5; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 1; $i <= 5; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";?>
				            <?php
									}
									  echo "</table></div><div style='overflow-x:auto;padding-top:5px;'><table class='tprinta' ><tr>";
									?>
									<?php if ($profile6 == ""){
									}elseif ($profile7 == ""){
										?>
									  <?php for ($i = 6; $i <= 6; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 6; $i <= 6; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									
									}elseif ($profile8 == ""){
									  ?>
										<?php for ($i = 6; $i <= 7; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 6; $i <= 7; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									}elseif ($profile9 == ""){
									  ?>
										<?php for ($i = 6; $i <= 8; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 6; $i <= 8; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									}elseif ($profile10 == ""){
									  ?>
										<?php for ($i = 6; $i <= 9; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 6; $i <= 9; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									}else{
									  ?>
									  <?php for ($i = 6; $i <= 10; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 6; $i <= 10; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";?>
				            <?php
									}
									  echo "</table></div><div style='overflow-x:auto;padding-top:5px;'><table class='tprinta' ><tr>";
									?>
									<?php if ($profile11 == ""){
									}elseif ($profile12 == ""){
										?>
									  <?php for ($i = 11; $i <= 11; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 11; $i <= 11; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									
									}elseif ($profile13 == ""){
									  ?>
										<?php for ($i = 11; $i <= 12; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 11; $i <= 12; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									}elseif ($profile14 == ""){
									  ?>
										<?php for ($i = 11; $i <= 13; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 11; $i <= 13; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									}elseif ($profile15 == ""){
									  ?>
										<?php for ($i = 11; $i <= 14; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 11; $i <= 14; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";
									}else{
									  ?>
									  <?php for ($i = 11; $i <= 15; $i++) {echo "	<th><a href='userlist.php?profile=$proflist[$i]'>$proflist[$i]</a></th>";}?>
				            <?php echo "</tr> <tr>";?>
				            <?php for ($i = 11; $i <= 15; $i++) {echo "	<td>$sisa[$i]</td>";}?>
				            <?php echo "</tr>";?>
				            <?php
									}
									  echo "</table></div>";
								?>
			<table class="tnav">
				<tr>
					<td>User Aktif : <?php print_r($ARRAY2);?></td>
				</tr>
			</table>

			<div style="overflow-x:auto;">
			<table style="white-space: nowrap;" class="zebra" >
				<tr>
					<th style='text-align:center;'>X</th>
					<th >User</th>
					<th >Server</th>
					<th >IP</th>
					<th >MAC Address</th>
					<th >Uptime</th>
					<th >Bytes Out</th>
					<th >Login By</th>
					</tr>
							<?php
								$TotalReg = count($ARRAY);

										for ($i=0; $i<$TotalReg; $i++){
										echo "<tr>";
										$regtable = $ARRAY[$i];echo "<td style='text-align:center;'><a style='color:#000;' title='Klik X untuk disconnect user' href=index.php?id=".$regtable['.id'] . "&name=" . $regtable['user']. ">X</a></td>";
										$regtable = $ARRAY[$i];echo "<td><a style='color:#000;' title='Klik user untuk melihat masa aktifnya' href=?usr=" . $regtable['user'] . "#cekuser>". $regtable['user']. "</a></td>";
										$regtable = $ARRAY[$i];echo "<td>" . $regtable['server'];echo "</td>";
										$regtable = $ARRAY[$i];echo "<td>" . $regtable['address'];echo "</td>";
										$regtable = $ARRAY[$i];echo "<td>" . $regtable['mac-address'];echo "</td>";
										$regtable = $ARRAY[$i];echo "<td>" . $regtable['uptime'];echo "</td>";
										$regtable = $ARRAY[$i];echo "<td style='text-align:right;'>" . formatBytes2($regtable['bytes-out'], 0) ;echo "</td>";
										$regtable = $ARRAY[$i];echo "<td>" . $regtable['login-by'];echo "</td>";
										echo "</tr>";
										}
							?>
			</table>
			</div>
			
	  <div id="cekuser" class="modal-window">
		<div>
			<a style="font-wight:bold;"href="#x" title="Close" class="modal-close">X</a>
			<h3>Masa Aktif Voucher</h3>
	<?php
	echo "<div style='overflow-x:auto;'>";
	echo "<table>";
	echo "	<tr>";
	echo "		<td >User/Kode Voucher</td>";
	echo "		<td >:</td>";
	echo "		<td > $user</td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "		<td >Masa Aktif</td>";
	echo "		<td >:</td>";
	echo "		<td >$cekall</td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "		<td >Dari</td>";
	echo "		<td >:</td>";
	echo "		<td >$strd $strt</td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "		<td >Sampai</td>";
	echo "		<td >:</td>";
	echo "		<td >$exp</td>";
	echo "	</tr>";
	echo "</table>";
	echo "</div>";
  ?>
    </div>
    </div>
	</div>
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

	</body>
</html>

