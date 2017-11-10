<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}

	$validasi = ($_SESSION['usermikhmon']);
		if ($validasi == "Operator"){
	header("Location:login.php");
}
?>
<?php
require('./api.php');
include('./Net/SSH2.php');
include('./config.php');
include('./vouchers/kvouchers.php');
$tlimit = $uptimelimit;
if ($tlimit == $utimelimit1){
	$vtimelimit = "Durasi:$utimelimit1t";
}elseif ($tlimit == $utimelimit2){
	$vtimelimit = "Durasi:$utimelimit2t";
}elseif ($tlimit == $utimelimit3){
	$vtimelimit = "Durasi:$utimelimit3t";
}elseif ($tlimit == $utimelimit4){
	$vtimelimit = "Durasi:$utimelimit4t";
}else {
	$vtimelimit= "";
}

$blimit = $upbytelimit;
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
}else {
	$vbytelimit= "";
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Generate Kode Vouchers</title>
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
					<td style="text-align: center;" colspan=2>Generate 21 Kode Voucher</td>
				</tr>
				<tr>
					<td colspan=2>
						<button class="material-icons" onclick="location.href='genkvs.php';" title="Reload">autorenew</button>
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
					<tr>
						<td></td>
						<td colspan=3>
							<input type="submit" class="btnsubmit" value="Generate"/>
							<button class="btnsubmit" onclick="window.open('./vouchers/printkvs.php','_blank');">Cetak</button>
						</td>
					</tr>
				</table>
				<br>
				<table class="tprinta">
					<tr>
						<th>Generate Voucher Sebelumnya</th>
					</tr>
					<tr>
						<td style="text-align: center; ">Aktif:<?php print_r($vprofname);?> <?php print_r($vtimelimit);?> <?php print_r($vbytelimit);?></td></tr><tr><td style="text-align: center; "><?php print_r($vprice);?></td>
					</tr>
				</table>
				<br>
			</form>
				<table class="tnav">
					<tr>
						<td>
							<button class="btnsubmit" onclick="location.href='./vcolorconf.php';">Ganti Warna Voucher</button>
						</td>
					</tr>
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
		$a1= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n1= rand(1000,9999);
		$u1 = "$a1$n1";
		$a2= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n2= rand(1000,9999);
		$u2 = "$a2$n2";
		$a3= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n3= rand(1000,9999);
		$u3 = "$a3$n3";
		$a4= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n4= rand(1000,9999);
		$u4 = "$a4$n4";
		$a5= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n5= rand(1000,9999);
		$u5 = "$a5$n5";
		$a6= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n6= rand(1000,9999);
		$u6 = "$a6$n6";
		$a7= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n7= rand(1000,9999);
		$u7 = "$a7$n7";
		$a8= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n8= rand(1000,9999);
		$u8 = "$a8$n8";
		$a9= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n9= rand(1000,9999);
		$u9 = "$a9$n9";
		$a10= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n10= rand(1000,9999);
		$u10 = "$a10$n10";
		$a11= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n11= rand(1000,9999);
		$u11 = "$a11$n11";
		$a12= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n12= rand(1000,9999);
		$u12 = "$a12$n12";
		$a13= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n13= rand(1000,9999);
		$u13 = "$a13$n13";
		$a14= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n14= rand(1000,9999);
		$u14 = "$a14$n14";
		$a15= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n15= rand(1000,9999);
		$u15 = "$a15$n15";
		$a16= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n16= rand(1000,9999);
		$u16 = "$a16$n16";
		$a17= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n17= rand(1000,9999);
		$u17 = "$a17$n17";
		$a18= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n18= rand(1000,9999);
		$u18 = "$a18$n18";
		$a19= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n19= rand(1000,9999);
		$u19 = "$a19$n19";
		$a20= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n20= rand(1000,9999);
		$u20 = "$a20$n20";
		$a21= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
		$n21= rand(1000,9999);
		$u21 = "$a21$n21";
		$p1= $u1;
		$p2= $u2;
		$p3= $u3;
		$p4= $u4;
		$p5= $u5;
		$p6= $u6;
		$p7= $u7;
		$p8= $u8;
		$p9= $u9;
		$p10= $u10;
		$p11= $u11;
		$p12= $u12;
		$p13= $u13;
		$p14= $u14;
		$p15= $u15;
		$p16= $u16;
		$p17= $u17;
		$p18= $u18;
		$p19= $u19;
		$p20= $u20;
		$p21= $u21;
		$command = '/ip hotspot user add name='. $u1 . ' password=' . $p1 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u2 . ' password=' . $p2 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u3 . ' password=' . $p3 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u4 . ' password=' . $p4 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u5 . ' password=' . $p5 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u6 . ' password=' . $p6 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u7 . ' password=' . $p7 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u8 . ' password=' . $p8 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u9 . ' password=' . $p9 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u10 . ' password=' . $p10 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u11 . ' password=' . $p11 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u12 . ' password=' . $p12 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u13 . ' password=' . $p13 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u14 . ' password=' . $p14 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u15 . ' password=' . $p15 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u16 . ' password=' . $p16 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u17 . ' password=' . $p17 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u18 . ' password=' . $p18 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u19 . ' password=' . $p19 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u20 . ' password=' . $p20 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '; /ip hotspot user add name='. $u21 . ' password=' . $p21 . ' profile=' . $profname . ' limit-uptime=' . $timelimit . ' limit-bytes-out=' . $bytelimit . '';
		echo $ssh->exec($command);
		$my_file = 'vouchers/kvouchers.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $vprofname="' . $vprofile . '"; $uptimelimit="' . $timelimit . '"; $upbytelimit="' . $bytelimit . '"; $vprice="' . $price . '"; $user1="' . $u1. '"; $pass1="' . $p1. '"; $user2="' . $u2. '";$pass2="' . $p2. '"; $user3="' . $u3. '";$pass3="' . $p3. '"; $user4="' . $u4. '";$pass4="' . $p4. '"; $user5="' . $u5. '";$pass5="' . $p5. '"; $user6="' . $u6. '";$pass6="' . $p6. '"; $user7="' . $u7. '";$pass7="' . $p7. '"; $user8="' . $u8. '";$pass8="' . $p8. '"; $user9="' . $u9. '";$pass9="' . $p9. '"; $user10="' . $u10. '";$pass10="' . $p10. '"; $user11="' . $u11. '";$pass11="' . $p11. '"; $user12="' . $u12. '";$pass12="' . $p12. '"; $user13="' . $u13. '";$pass13="' . $p13. '"; $user14="' . $u14. '";$pass14="' . $p14. '"; $user15="' . $u15. '";$pass15="' . $p15. '"; $user16="' . $u16. '";$pass16="' . $p16. '"; $user17="' . $u17. '";$pass17="' . $p17. '"; $user18="' . $u18. '";$pass18="' . $p18. '"; $user19="' . $u19. '";$pass19="' . $p19. '"; $user20="' . $u20. '";$pass20="' . $p20. '"; $user21="' . $u21. '";$pass21="' . $p21. '"; ?>';
		fwrite($handle, $data);
		
		echo	"<table class='tprinta'>";
		echo				"<tr>";
		echo					"<th>Generate Voucher Sekarang</th>";
		echo				"<tr>";
		echo					"<td style='text-align: center; '>Aktif:$vprofile $vtimelimit $vbytelimit</td></tr><tr><td style='text-align: center; '>$price</td>";
		echo				"</tr>";
		echo	"</table>";
		echo	"<br>";
	}
?>
	</body>
</html>
