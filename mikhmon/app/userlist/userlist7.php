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
	$API->write('?=profile='.$profile7.'');
	$ARRAY = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile7.'');
	$ARRAY2 = $API->read();

	$API->disconnect();
}
$listphp = "userlist7.php";
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
			<td><?php print_r($profile7);?> Aktif  : <?php print_r($ARRAY2);?></td>
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
						  $regtable = $ARRAY[$i];echo "<td style='text-align:center;'><a style='color:#000;' href=remuserl.php?id=".$regtable['.id'] . "&list=".$listphp.">X</a></td>";
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
	</body>
</html>