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
					<tr><td>Profile | Masa Aktif</td><td>:</td><td>
						<select name="uprofile" required="1">
							<option value="">Pilih...</option>
							<option value=<?php print_r($profile1);?>><?php print_r($profile1);?></option>
							<option value=<?php print_r($profile2);?>><?php print_r($profile2);?></option>
							<option value=<?php print_r($profile3);?>><?php print_r($profile3);?></option>
							<option value=<?php print_r($profile4);?>><?php print_r($profile4);?></option>
							<option value=<?php print_r($profile5);?>><?php print_r($profile5);?></option>
						</select>
						</td>
					</tr>
					<tr><td>Durasi</td><td>:</td><td>
						<select name="utimelimit" required="1">
							<option value="0">Pilih...</option>
							<option value=<?php print_r($utimelimit1);?>><?php print_r($utimelimit1t);?></option>
							<option value=<?php print_r($utimelimit2);?>><?php print_r($utimelimit2t);?></option>
							<option value=<?php print_r($utimelimit3);?>><?php print_r($utimelimit3t);?></option>
							<option value=<?php print_r($utimelimit4);?>><?php print_r($utimelimit4t);?></option>
							<option value=<?php print_r($utimelimit5);?>><?php print_r($utimelimit5t);?></option>
						</select>
						</td>
					</tr>
					<tr><td>Kuota</td><td>:</td><td>
						<select name="ubytelimit" required="1">
							<option value="0">Pilih...</option>
							<option value=<?php print_r($ubytelimit1);?>><?php print_r($ubytelimit1t);?></option>
							<option value=<?php print_r($ubytelimit2);?>><?php print_r($ubytelimit2t);?></option>
							<option value=<?php print_r($ubytelimit3);?>><?php print_r($ubytelimit3t);?></option>
							<option value=<?php print_r($ubytelimit4);?>><?php print_r($ubytelimit4t);?></option>
							<option value=<?php print_r($ubytelimit5);?>><?php print_r($ubytelimit5t);?></option>
						</select>
						</td>
					</tr>
					<tr><td>Harga</td><td>:</td><td>
						<select name="uprice" required="1">
							<option value="">Pilih...</option>
							<option value=<?php print_r($price1);?>><?php print_r($price1);?></option>
							<option value=<?php print_r($price2);?>><?php print_r($price2);?></option>
							<option value=<?php print_r($price3);?>><?php print_r($price3);?></option>
							<option value=<?php print_r($price4);?>><?php print_r($price4);?></option>
							<option value=<?php print_r($price5);?>><?php print_r($price5);?></option>
							<option value=<?php print_r($price6);?>><?php print_r($price6);?></option>
							<option value=<?php print_r($price7);?>><?php print_r($price7);?></option>
							<option value=<?php print_r($price8);?>><?php print_r($price8);?></option>
							<option value=<?php print_r($price9);?>><?php print_r($price9);?></option>
						</select>
						</td>
					</tr>
					<tr><td></td><td></td><td><input type="submit" class="btnsubmit" value="Generate"/></td></tr>
				<br>
			</form>

<?php
	if(isset($_POST['uprofile'])){
		$ssh = new Net_SSH2($iphost,$sshport);
		if (!$ssh->login($userhost, $passwdhost)) {
				exit('Login Failed');
		}
		$profname = ($_POST['uprofile']);
		$uprofile = $profname;
			if ($uprofile == $profile1){
				$vprofile = $vname1;
			}elseif ($uprofile == $profile2){
				$vprofile = $vname2;
			}elseif ($uprofile == $profile3){
				$vprofile = $vname3;
			}elseif ($uprofile == $profile4){
				$vprofile = $vname4;
			}elseif ($uprofile == $profile5){
				$vprofile = $vname5;
			}else {
				$vprofile= "";
			}
		$timelimit = ($_POST['utimelimit']);
		$tlimit = $timelimit;
			if ($tlimit == $utimelimit1){
				$vtimelimit = "Durasi:$utimelimit1t";
			}elseif ($tlimit == $utimelimit2){
				$vtimelimit = "Durasi:$utimelimit2t";
			}elseif ($tlimit == $utimelimit3){
				$vtimelimit = "Durasi:$utimelimit3t";
			}elseif ($tlimit == $utimelimit4){
				$vtimelimit = "Durasi:$utimelimit4t";
			}elseif ($tlimit == $utimelimit5){
				$vtimelimit = "Durasi:$utimelimit5t";
			}else {
				$vtimelimit= "";
		}
		$bytelimit = ($_POST['ubytelimit']);
		$blimit = $bytelimit;
			if ($blimit == $ubytelimit1){
				$vbytelimit = "Kuota:$ubytelimit1t";
			}elseif ($blimit == $ubytelimit2){
				$vbytelimit = "Kuota:$ubytelimit2t";
			}elseif ($blimit == $ubytelimit3){
				$vbytelimit = "Kuota:$ubytelimit3t";
			}elseif ($blimit == $ubytelimit4){
				$vbytelimit = "Kuota:$ubytelimit4t";
			}elseif ($blimit == $ubytelimit5){
				$vbytelimit = "Kuota:$ubytelimit5t";
			}elseif ($blimit == $ubytelimit5){
				$vbytelimit = "Kuota:$ubytelimit5t";
			}else {
				$vbytelimit= "";
			}
		$price = ($_POST['uprice']);
		$u1 = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$p1 = rand(100000,999999); 
		$command = '/ip hotspot user add name='. $u1 . ' password=' . $p1 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '';
		echo $ssh->exec($command);
		
		$my_file = 'vouchers/voucher.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $user1="' . $u1. '";$pass1="' . $p1. '";$vprofname="' . $profname. '";$vptimelimit="' . $vtimelimit. '"; $vpbytelimit="' . $vbytelimit. '"; $vprice="' . $price. '"; ?>';
		fwrite($handle, $data);
	
		echo	"<table>";
		echo			"<table class='tusera' id='preview-table'>";
		echo				"<tr>";
		echo					"<tr>";
		echo						"<td style='text-align: right;'><?php print_r($headerv);? font-size: 16px;'>$headerv</td>";
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
		echo						"<td style='text-align: center; '>Aktif:$vprofile $vtimelimit $vbytelimit</td></tr><tr><td style='text-align: center; '>Harga : $price</td>";
		echo					"</tr>";
		echo				"<tr>";
		echo			"</table>";
		echo	"</table>";
		echo	"<br>";

}
?>
	</body>
</html>
