<?php
require('./api.php');
include('./Net/SSH2.php');
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
		<link rel="icon" href="favicon.ico" />
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
					<td>Hapus User Profile</td>
					<td>
						<button class="material-icons" onclick="location.href='uprofilerm.php';" title="Reload">autorenew</button>
						<button class="material-icons" onclick="location.href='./uprofileset.php';" title="Edit User Profile">mode_edit</button>
						<button class="material-icons"	onclick="location.href='./uprofileadd.php';"	title="User Profile">local_library</button>
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
		$ssh = new Net_SSH2($iphost,$sshport);
			if (!$ssh->login($userhost, $passwdhost)) {
					exit('Login Failed');
			}
			$profname = ($_POST['nama']);
			$command = '/ip hotspot user profile remove [find name=' . $profname. ']';
			echo $ssh->exec($command);
			}
	if ($API->connect( $iphost, $userhost, $passwdhost )) {
			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");
			$API->disconnect();
			}
?>
			<div>
				<table class="tprint" align="center"  >
					<tr>
						<th >Name</th>
						<th >Shared Users</th>
						<th >Rate Limit</th>
					</tr>
					<tr><td>
						<?php
							$TotalReg = count($ARRAY);
					
							for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY[$i];echo "" . $regtable['name'] . "<br />";}echo "</td><td>";
							for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY[$i];echo "" . $regtable['shared-users'] . "<br />";}echo "</td><td>";
							for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY[$i];echo "" . $regtable['rate-limit'] . "<br />";}echo "</td>";

						?>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>

