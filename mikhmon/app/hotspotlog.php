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

if($_SESSION['usermikhmon'] == ""){
		echo "<meta http-equiv='refresh' content='0;url=logout.php' />";
		exit();
	}


$API = new RouterosAPI();
$API->debug = false;
if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/log/print', false);
	$API->write('?=topics=hotspot,info,debug');
	$ARRAY = $API->read();
	$log = array_reverse($ARRAY);
	$API->disconnect();
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
			<td style="text-align: center;" colspan=2>Mikrotik Hotspot Monitor</td>
		</tr>
		<tr>
			<td>Hotspot Log</td>
			<td>
				<button class="material-icons" onclick="Reload()" title="Reload">autorenew</button>
				<button class="material-icons"	onclick="location.href='./history.php';" 	title="History">toc</button>
				<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
				<button class="material-icons" onclick="goBack()" title="Back">arrow_back</button>
			</td>
		</tr>
	</table>
		<div style="overflow-x:auto;">
			<table style="white-space: nowrap;" class="zebra" >
				<tr>
					<th >Time</th>
					<th >Message</th>
				</tr>
				<?php
					$TotalReg = count($log);

						for ($i=0; $i<$TotalReg; $i++){
							$regtable = $log[$i];echo "<tr><td>" . $regtable['time'];echo "</td>";
							$regtable = $log[$i];echo "<td>" . $regtable['message'];echo "</td> </tr>";
							}
				?>
			</table>
		</div>
	</div>
	</body>
</html>
