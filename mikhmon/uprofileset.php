<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}
?>
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
					<td>Edit User Profile</td>
					<td>
						<button class="material-icons" onclick="location.href='uprofileset.php';" title="Reload">autorenew</button>
						<button class="material-icons" onclick="location.href='./uprofilerm.php';" title="Delete User Profile">delete</button>
						<button class="material-icons"	onclick="location.href='./uprofileadd.php';"	title="User Profile">local_library</button>
						<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
						<button class="material-icons" onclick="goBack()" title="Back">arrow_back</button>
					</td>
				</tr>
			</table>
			<form autocomplete="off" method="post" action="">
				<table class="tnav" align="center"  >
					<tr><td>Profile | Masa Aktif</td><td>:</td><td>
						<select name="nama" required="1">
							<option value="">Pilih...</option>
							<option value=<?php print_r($profile1);?>><?php print_r($profile1);?></option>
							<option value=<?php print_r($profile2);?>><?php print_r($profile2);?></option>
							<option value=<?php print_r($profile3);?>><?php print_r($profile3);?></option>
							<option value=<?php print_r($profile4);?>><?php print_r($profile4);?></option>
							<option value=<?php print_r($profile5);?>><?php print_r($profile5);?></option>
						</select>
					</td></tr>
					<!--<tr><td>Masa Aktif</td><td>:</td><td>
						<select name="aktif" required="1">
							<option value="">Pilih...</option>
							<option value=<?php print_r($uactive1);?>><?php print_r($vname1);?></option>
							<option value=<?php print_r($uactive2);?>><?php print_r($vname2);?></option>
							<option value=<?php print_r($uactive3);?>><?php print_r($vname3);?></option>
							<option value=<?php print_r($uactive4);?>><?php print_r($vname4);?></option>
							<option value=<?php print_r($uactive5);?>><?php print_r($vname5);?></option>
						</select>
					</td></tr>-->
					<tr><td>Shared Users</td><td>:</td><td><input type="text" size="3" maxlength="3" name="sharedu" value="1" required="1"/></td></tr>
					<tr><td>Upload/Download</td><td>:</td><td>
						<select name="updown" required="1">
							<option value="">Pilih...</option>
							<option value=<?php print_r($speed1);?>><?php print_r($speed1);?></option>
							<option value=<?php print_r($speed2);?>><?php print_r($speed2);?></option>
							<option value=<?php print_r($speed3);?>><?php print_r($speed3);?></option>
							<option value=<?php print_r($speed4);?>><?php print_r($speed4);?></option>
							<option value=<?php print_r($speed5);?>><?php print_r($speed5);?></option>
							<option value=<?php print_r($speed6);?>><?php print_r($speed6);?></option>
						</select>
					</td></tr>
					<tr><td></td><td></td><td><input type="submit" class="btnsubmit" value="Simpan"/></td></tr>
				</table>
			</form>
<?php
	if(isset($_POST['nama'])){
		$ssh = new Net_SSH2($iphost,$sshport);
			if (!$ssh->login($userhost, $passwdhost)) {
					exit('Login Failed');
			}
			$profname = ($_POST['nama']);
			$uprofile = $profname;
			if ($uprofile == $profile1){
				$exptime = $uactive1;
			}elseif ($uprofile == $profile2){
				$exptime = $uactive2;
			}elseif ($uprofile == $profile3){
				$exptime = $uactive3;
			}elseif ($uprofile == $profile4){
				$exptime = $uactive4;
			}elseif ($uprofile == $profile5){
				$exptime = $uactive5;
			}else {
				$exptime= "";
			}
			//$exptime = ($_POST['aktif']);
			$sharuser=($_POST['sharedu']);
			$rxtx = ($_POST['updown']);
			$command = '/ip hotspot user profile set [find  name=' . $profname. ' ]\    on-login="{:local date [/system clock get date ];:local time [/system cloc\    k get time ];:local uptime (' .$exptime. ');[/system scheduler add disabled=no interva\    l=\$uptime name=\$user on-event= \"[/ip hotspot user remove [find where na\    me=\$user]];[/ip hotspot active remove [find where user=\$user]];[/sys sch\    \_re [find where name=\$user]]\" start-date=\$date start-time=\$time]; }}" \    rate-limit=' .$rxtx. ' status-autorefresh=15s	transparent-proxy=yes	shared-users=' . $sharuser . '';
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

