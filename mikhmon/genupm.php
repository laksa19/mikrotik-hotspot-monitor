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
		<title>Mikrotik Hotspot Generate 1 User Password</title>
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
					<td style="text-align: center;" colspan=2>Generate 1 User Password</td>
				</tr>
				<tr>
					<td colspan=2>
						<button class="material-icons" onclick="location.href='genupm.php';" title="Reload">autorenew</button>
						<div class="dropdown" style="float:right;">
							<button class="material-icons">local_play</button>
								<div class="dropdown-content">
									<a class="material-icons" href="#">local_play</a>
									<a href="genkv.php">1 Kode Voucher</a>
									<a href="genkvs.php">21 Kode Voucher</a>
									<a href="genvoucher.php">1 User Password</a>
									<a href="genvouchers.php">21 User Password</a>
									<a href="genupm.php">1 User Pass Manual</a>
								</div>
						</div>
						<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
						<button class="material-icons" onclick="goBack()" title="Back">arrow_back</button>
					</td>
				</tr>
			</table>
			<form autocomplete="off" method="post" action="">
				<table class="tnav" align="center"  >
					<tr><td>Server Hotspot</td><td>:</td><td>
						<select name="server" required="1">
							<option value="all">all</option>
							<option value=<?php print_r($server1);?>><?php print_r($server1);?></option>
							<option value=<?php print_r($server2);?>><?php print_r($server2);?></option>
							<option value=<?php print_r($server3);?>><?php print_r($server3);?></option>
							<option value=<?php print_r($server4);?>><?php print_r($server4);?></option>
							<option value=<?php print_r($server5);?>><?php print_r($server5);?></option>
							<option value=<?php print_r($server6);?>><?php print_r($server6);?></option>
						</select>
						</td>
					</tr>
					<tr><td>Profile | Masa Aktif</td><td>:</td><td>
						<select name="uprofile" required="1">
							<option value="">Pilih...</option>
							<option value=<?php print_r($profile1);?>><?php print_r($profile1);?></option>
							<option value=<?php print_r($profile2);?>><?php print_r($profile2);?></option>
							<option value=<?php print_r($profile3);?>><?php print_r($profile3);?></option>
							<option value=<?php print_r($profile4);?>><?php print_r($profile4);?></option>
							<option value=<?php print_r($profile5);?>><?php print_r($profile5);?></option>
							<option value=<?php print_r($profile6);?>><?php print_r($profile6);?></option>
							<option value=<?php print_r($profile7);?>><?php print_r($profile7);?></option>
							<option value=<?php print_r($profile8);?>><?php print_r($profile8);?></option>
							<option value=<?php print_r($profile9);?>><?php print_r($profile9);?></option>
							<option value=<?php print_r($profile10);?>><?php print_r($profile10);?></option>
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
					<tr><td>Username</td><td>:</td><td><input type="text" size="10" maxlength="10" name="uname" required="1"/></td></tr>
					<tr><td>Password</td><td>:</td><td><input type="text" size="10" maxlength="10" name="passwd" required="1"/></td></tr>
					<td></td>
						<td colspan=3>
							<input type="submit" class="btnsubmit" value="Generate"/>
							</td>
					</tr>
			</form>
			<table>
				<tr>
					<td colspan=3>
						<button class="btnsubmit" onclick="window.open('./vouchers/userpass.html','_blank');">Cetak</button>
						</td>
				</tr>
			<br>
			</table>

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
			}elseif ($uprofile == $profile6){
				$vprofile = $vname6;
			}elseif ($uprofile == $profile7){
				$vprofile = $vname7;
			}elseif ($uprofile == $profile8){
				$vprofile = $vname8;
			}elseif ($uprofile == $profile9){
				$vprofile = $vname9;
			}elseif ($uprofile == $profile10){
				$vprofile = $vname10;
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
		$serverh = ($_POST['server']);
		$u1 = ($_POST['uname']);
		$p1 = ($_POST['passwd']);
		$command = '/ip hotspot user add  server=' . $serverh . ' name='. $u1 . ' password=' . $p1 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '';
		echo $ssh->exec($command);
		
		$my_file = 'vouchers/voucher.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $user1="' . $u1. '";$pass1="' . $p1. '";$vprofname="' . $profname. '";$vptimelimit="' . $vtimelimit. '"; $vpbytelimit="' . $vbytelimit. '"; $vprice="' . $price. '"; ?>';
		fwrite($handle, $data);

		$my_file1 = 'vouchers/userpass.html';
		$handle1 = fopen($my_file1, 'w') or die('Cannot open file:  '.$my_file1);
		$data1 = '<!DOCTYPE html><html><head><title>Mikrotik Hotspot Generate 1 User</title><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta http-equiv="pragma" content="no-cache" /><meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/><link rel="icon" href="../favicon.ico" /><link rel="stylesheet" href="css/style.css" media="screen"><style> table.tusera {width: 300px; height: 180px; border-collapse: collapse;}table.tusera td { padding: 4px; border: 2px solid #000000; font-size: 14px; text-align: left; font-weight: bold;}table.tuserb { width: 300px; border-collapse: collapse; }table.tuserb td { padding-left: 20px; border: 0px; font-size: 18px; text-align: left; }</style></head><body><div style="width: 300px; height: 180px;"><table><table class="tusera" ><tr><tr><td style="text-align: right; font-size: 16px;">'.$headerv.'</td></tr><tr><td style="font-size: 12px;">'.$notev.'</td></tr><tr><td><table class="tuserb"><tr><td>Username : '.$u1.' </td></tr><tr><td>Password : '.$p1.' </td></tr></table></td></tr><tr><td style="text-align: center; ">Aktif:'.$vprofile.' '.$vtimelimit.' '.$vbytelimit.'</td></tr><tr><td style="text-align: center; ">'.$serverh.' '.$price.'</td></tr><tr></tr></table></table></div></body></html>';
		fwrite($handle1, $data1);
	
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
		echo						"<td style='text-align: center; '>Aktif:$vprofile $vtimelimit $vbytelimit</td></tr><tr><td style='text-align: center; '>$serverh $price</td>";
		echo					"</tr>";
		echo				"<tr>";
		echo			"</table>";
		echo	"</table>";
		echo	"<br>";

}
?>
	</body>
</html>
