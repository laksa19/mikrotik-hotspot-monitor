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
			$API->comm("/ip/dns/static/add", array(
					  "name" => "$dnsname",
					  "address" => "127.0.0.1",
			));
			
			header('Location: dnsstaticadd.php');
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
				<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
				<button class="material-icons" onclick="goBack()" title="Back">arrow_back</button>
			</td>
		</tr>
	</table>
		<form autocomplete="off" method="post" action="">
				<table class="tnav" align="center"  >
				<!--<tr><td>ID</td><td><td>:</td><input type="text" size="20" maxlength="20" name="id" required="1"/></td></tr>-->
				<tr><td>DNS Name</td><td>:</td><td><input type="text" size="20"  name="name" placeholder="DNS name" required="1"/></td></tr>
				<tr><td></td><td></td><td><input type="submit" class="btnsubmit" value="Add"/></td></tr>
			</table>
		</form>

		<div style="overflow-x:auto;">
			<table style="white-space: nowrap;" class="zebra" >
				<tr>
				  <th style='text-align:center;'>X</th>
					<th >Name</th>
				</tr>
				<?php
					$TotalReg = count($ARRAY);

						for ($i=0; $i<$TotalReg; $i++){
						  echo "<tr>";
						  $regtable = $ARRAY[$i];echo "<td style='text-align:center;'><a style='color:#000;' href=dnsstaticrm.php?id=".$regtable['.id'] . ">X</a></td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['name'];echo "</td>";
							echo"</tr>";
							}
					?>
			</table>
		</div>
	</div>
	</body>
</html>
