<?php
require('./api.php');
include('./Net/SSH2.php');
include('./config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Generate 1 Voucher</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="favicon.ico" />
		<link rel="stylesheet" href="css/style.css" media="screen">
		<style>
table.tusera { 
  margin-left:auto; 
  margin-right:auto;
  width: 300px;
  height: 180px;
  border-collapse: collapse;
}
table.tusera td { 
  padding: 4px; 
  border: 2px solid #000000;
  font-size: 14px;
  text-align: left;
  font-weight: bold;
}
table.tuserb { 
  margin-left:auto; 
  margin-right:auto;
  width: 300px; 
  border-collapse: collapse; 
}
table.tuserb td { 
  padding-left: 20px; 
  border: 0px;
  font-size: 16px;
  text-align: left; 
}
		</style>
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
					<td>Generate 1 Voucher</td>
					<td>
						<button class="material-icons" onclick="location.href='genvoucher.php';" title="Reload">autorenew</button>
						<button class="material-icons"	onclick="location.href='./genvouchers.php';" title="Ganerate Vouchers">group_add</button>
						<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
						<button class="material-icons" onclick="goBack()" title="Back">arrow_back</button>
					</td>
				</tr>
			</table>
			<form autocomplete="off" method="post" action="">
				<table class="tnav" align="center"  >
					<tr><td>Voucher</td><td>:</td><td>
						<select name="uprofile" required="1">
							<option value="">Pilih...</option>
							<option value=<?php print_r($profile1);?>><?php print_r($vname1);?></option>
							<option value=<?php print_r($profile2);?>><?php print_r($vname2);?></option>
							<option value=<?php print_r($profile3);?>><?php print_r($vname3);?></option>
							<option value=<?php print_r($profile4);?>><?php print_r($vname4);?></option>
						</select>
					<tr><td></td><td></td><td><input type="submit" class="btnsubmit" value="Generate"/></td></tr>
			</form>

<?php
	if(isset($_POST['uprofile'])){
		$ssh = new Net_SSH2($iphost,$sshport);
		if (!$ssh->login($userhost, $passwdhost)) {
				exit('Login Failed');
		}
		$profname = ($_POST['uprofile']);
		$u1 = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$p1 = rand(100000,999999);
		$vn1= 
		$command = '/ip hotspot user add name='. $u1 . ' password=' . $p1 . ' profile=' . $profname . '';
		echo $ssh->exec($command);
		$my_file = 'vouchers/voucher.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $user1="' . $u1. '";$pass1="' . $p1. '";$profname1="' . $profname. '"; ?>';
		fwrite($handle, $data);
		echo	"<br>";
		echo	"</table>";
		echo			"<table class='tusera' id='preview-table'>";
		echo				"<tr>";
		echo					"<tr>";
		echo						"<td style='text-align: right; font-style:italic;'><?php print_r($headerv);? font-size: 16px;'>$headerv</td>";
		echo					"</tr>";
		echo					"<tr>";
		echo						"<td style='font-size: 12px;'>$notev</td>";
		echo					"</tr>";
		echo					"<tr>";
		echo						"<td>";
		echo							"<table class='tuserb'>";
		echo								"<tr><td>Username : $u1 </td></tr>";
		echo								"<tr><td>Password : $p1 </td></tr>";
		echo							"</table>";
		echo						"</td>";
		echo					"</tr>";
		echo					"<tr>";
		echo						"<td style='text-align: center; font-size: 16px;'>$profname</td>";
		echo					"</tr>";
		echo				"<tr>";
		echo			"</table>";
		echo	"</table>";
		echo	"<br>";
	}
?>
	</body>
</html>
