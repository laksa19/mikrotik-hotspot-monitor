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
	$ARRAY = $API->comm("/ip/hotspot/user/profile/print");
	$API->disconnect();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot User Profile</title>
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
					<td style="text-align: center;" colspan=2>Hapus User Profile</td>
				</tr>
				<tr>
					<td colspan=2>
						<button class="material-icons" onclick="location.href='uprofilerm.php';" title="Reload">autorenew</button>
						<button class="material-icons"	onclick="location.href='./setup.php';" 	title="Edit Config">settings</button>
						<button class="material-icons" onclick="location.href='./uprofileset.php';" title="Edit User Profile">mode_edit</button>
						<button class="material-icons"	onclick="location.href='./uprofileadd.php';"	title="User Profile">local_library</button>
						<div class="dropdown" style="float:right;">
							<button class="material-icons">local_play</button>
								<div class="dropdown-content">
									<a class="material-icons" href="#">local_play</a>
									<a href="genkv.php">1 Voucher</a>
									<a href="genkvs.php">1-99 Voucher</a>
									<a href="genupm.php">1 Custom User Pass</a>
								</div>
						</div>
						<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
						<button class="material-icons" onclick="goBack()" title="Back">arrow_back</button>
					</td>
				</tr>
			</table>
			<form autocomplete="off" method="post" action="">
				<table class="tnav" align="center"  >
					<!--<tr><td>ID</td><td><td>:</td><input type="text" size="20" maxlength="20" name="id" required="1"/></td></tr>-->
					<tr><td>Nama Profile</td><td>:</td><td><input type="text" size="15" maxlength="15" name="nama" placeholder="Nama Profile" required="1"/></td></tr>
					<tr><td></td><td></td><td><input type="submit" class="btnsubmit" value="Hapus"/></td></tr>
				</table>
			</form>
<?php
	if(isset($_POST['nama'])){
		$API = new RouterosAPI();
		if ($API->connect($iphost, $userhost, $passwdhost)) {
			}
			$profname = ($_POST['nama']);
			
			$arrID=$API->comm("/ip/hotspot/user/profile/getall", 
						  array(
				  ".proplist"=> ".id",
				  "?name" => "$profname",
				  ));

			$API->comm("/ip/hotspot/user/profile/remove",
				  array(
						  ".id" => $arrID[0][".id"],
						 ));

			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");
			$API->disconnect();
			}
?>
			<div>
				<table class="zebra" align="center"  >
					<tr>
						<th >Name</th>
						<th >Shared Users</th>
						<th >Rate Limit</th>
					</tr>
					<?php
					$TotalReg = count($ARRAY);

						for ($i=0; $i<$TotalReg; $i++){
							$regtable = $ARRAY[$i];echo "<tr><td>" . $regtable['name'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['shared-users'];echo "</td>";
							$regtable = $ARRAY[$i];echo "<td>" . $regtable['rate-limit'];echo "</td> </tr>";
							}
					?>
				</table>
			</div>
		</div>
	</body>
</html>

