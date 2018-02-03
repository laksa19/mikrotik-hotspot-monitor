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
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}
?>
<?php
error_reporting(0);
require('./lib/api.php');
include('./config.php');
$prof = $_GET['profile'];
$API = new RouterosAPI();
$API->debug = false;
if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/ip/hotspot/user/print', false);
	$API->write('?=profile='.$prof.'');
	$ARRAY = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$prof.'');
	$ARRAY2 = $API->read();

	$API->disconnect();
}
$listphp = "userlist.php";
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
			<td><?php print_r($prof);?> Aktif  : <?php print_r($ARRAY2);?></td>
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
		  <input type="text" id="Cari" onkeyup="fCari()" placeholder="Filter user hotspot" title="User Hotspot">
			<table id="tUser" style="white-space: nowrap;" class="zebra" >
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
						  $regtable = $ARRAY[$i];echo "<td style='text-align:center;'><a style='color:#000;' href=remuserl.php?profile=$prof&id=".$regtable['.id'] . ">X</a></td>";
							$regtable = $ARRAY[$i];echo "<td><a style='color:#000;' title='Klik user untuk melihat masa aktifnya' href=userlist.php?profile=$prof&usr=" . $regtable['name'] . "#cekuser>". $regtable['name']. "</a></td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['server'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['profile'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['uptime'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . substr($regtable['comment'],strlen($regtable['comment'],0) - 8,8);echo "</td>";
							echo"</tr>";
							}
					?>
			</table>
		</div>
		<div id="cekuser" class="modal-window">
		<div>
			<a style="font-wight:bold;"href="#x" title="Close" class="modal-close">X</a>
			<h3>Info User</h3>
	<?php
	$name = $_GET['usr'];
	if(isset($_GET['usr'])){
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

	$API->write('/ip/hotspot/user/print', false);
	$API->write('?=name='.$name.'');
	$ARRAY2 = $API->read();
	$regtable = $ARRAY2[0];
	  $uptime = $regtable['uptime'];
	  $uptimelimit = $regtable['limit-uptime'];
	  $byteo =  formatBytes2($regtable['bytes-out'],0);
	  $byteolimit = formatBytes2($regtable['limit-bytes-out'],0);

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
	echo "	<tr>";
	echo "		<td >Limit Uptime</td>";
	echo "		<td >:</td>";
	echo "		<td >$uptimelimit</td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "		<td >Uptime</td>";
	echo "		<td >:</td>";
	echo "		<td >$uptime</td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "		<td >Limit Bytes Out</td>";
	echo "		<td >:</td>";
	echo "		<td >$byteolimit</td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "		<td >Bytes Out</td>";
	echo "		<td >:</td>";
	echo "		<td >$byteo</td>";
	echo "	</tr>";
	echo "</table>";
	echo "</div>";
	
	$API->disconnect();
}
}
?>
    </div>
    </div>
	</div>
<script>
function fCari() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("Cari");
  filter = input.value.toUpperCase();
  table = document.getElementById("tUser");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
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
