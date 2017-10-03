<?php
require('./api.php');
include('./Net/SSH2.php');
include('./config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Generate Vouchers</title>
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
					<td>Generate Vouchers</td>
					<td>
						<button class="material-icons" onclick="location.href='genvouchers.php';" title="Reload">autorenew</button>
						<button class="material-icons"	onclick="location.href='./genvoucher.php';" title="Generate 1 User">person_add</button>
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
				</table>
				<br>
				<table class="tprinta">
					<tr>
						<th>Print Voucher</th>
					</tr>
					<tr>
						<td>
							<button class="btnprint" onclick="window.open('./vouchers/printv1.php','_blank');"><?php print_r($vname1);?></button>
							<button class="btnprint" onclick="window.open('./vouchers/printv2.php','_blank');"><?php print_r($vname2);?></button>
							<button class="btnprint" onclick="window.open('./vouchers/printv3.php','_blank');"><?php print_r($vname3);?></button>
							<button class="btnprint" onclick="window.open('./vouchers/printv4.php','_blank');"><?php print_r($vname4);?></button>
						</td>
					</tr>
				</table>
			</form>

<?php
	if(isset($_POST['uprofile'])){
		$ssh = new Net_SSH2($iphost,$sshport);
		if (!$ssh->login($userhost, $passwdhost)) {
				exit('Login Failed');
		}
		$profname = ($_POST['uprofile']);
		$u1 = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u2= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u3= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u4= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u5= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u6= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u7= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u8= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u9= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u10= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u11= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u12= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u13= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u14= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u15= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u16= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u17= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u18= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u19= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u20= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$u21= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
		$p1 = rand(100000,999999);
		$p2= rand(100000,999999);
		$p3= rand(100000,999999);
		$p4= rand(100000,999999);
		$p5= rand(100000,999999);
		$p6= rand(100000,999999);
		$p7= rand(100000,999999);
		$p8= rand(100000,999999);
		$p9= rand(100000,999999);
		$p10= rand(100000,999999);
		$p11= rand(100000,999999);
		$p12= rand(100000,999999);
		$p13= rand(100000,999999);
		$p14= rand(100000,999999);
		$p15= rand(100000,999999);
		$p16= rand(100000,999999);
		$p17= rand(100000,999999);
		$p18= rand(100000,999999);
		$p19= rand(100000,999999);
		$p20= rand(100000,999999);
		$p21= rand(100000,999999);
		$command = '/ip hotspot user add name='. $u1 . ' password=' . $p1 . ' profile=' . $profname . '; /ip hotspot user add name='. $u2 . ' password=' . $p2 . ' profile=' . $profname . '; /ip hotspot user add name='. $u3 . ' password=' . $p3 . ' profile=' . $profname . '; /ip hotspot user add name='. $u4 . ' password=' . $p4 . ' profile=' . $profname . '; /ip hotspot user add name='. $u5 . ' password=' . $p5 . ' profile=' . $profname . '; /ip hotspot user add name='. $u6 . ' password=' . $p6 . ' profile=' . $profname . '; /ip hotspot user add name='. $u7 . ' password=' . $p7 . ' profile=' . $profname . '; /ip hotspot user add name='. $u8 . ' password=' . $p8 . ' profile=' . $profname . '; /ip hotspot user add name='. $u9 . ' password=' . $p9 . ' profile=' . $profname . '; /ip hotspot user add name='. $u10 . ' password=' . $p10 . ' profile=' . $profname . '; /ip hotspot user add name='. $u11 . ' password=' . $p11 . ' profile=' . $profname . '; /ip hotspot user add name='. $u12 . ' password=' . $p12 . ' profile=' . $profname . '; /ip hotspot user add name='. $u13 . ' password=' . $p13 . ' profile=' . $profname . '; /ip hotspot user add name='. $u14 . ' password=' . $p14 . ' profile=' . $profname . '; /ip hotspot user add name='. $u15 . ' password=' . $p15 . ' profile=' . $profname . '; /ip hotspot user add name='. $u16 . ' password=' . $p16 . ' profile=' . $profname . '; /ip hotspot user add name='. $u17 . ' password=' . $p17 . ' profile=' . $profname . '; /ip hotspot user add name='. $u18 . ' password=' . $p18 . ' profile=' . $profname . '; /ip hotspot user add name='. $u19 . ' password=' . $p19 . ' profile=' . $profname . '; /ip hotspot user add name='. $u20 . ' password=' . $p20 . ' profile=' . $profname . '; /ip hotspot user add name='. $u21 . ' password=' . $p21 . ' profile=' . $profname . '';
		echo $ssh->exec($command);
		$my_file = 'vouchers/'.$profname.'.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $user1="' . $u1. '";$pass1="' . $p1. '"; $user2="' . $u2. '";$pass2="' . $p2. '"; $user3="' . $u3. '";$pass3="' . $p3. '"; $user4="' . $u4. '";$pass4="' . $p4. '"; $user5="' . $u5. '";$pass5="' . $p5. '"; $user6="' . $u6. '";$pass6="' . $p6. '"; $user7="' . $u7. '";$pass7="' . $p7. '"; $user8="' . $u8. '";$pass8="' . $p8. '"; $user9="' . $u9. '";$pass9="' . $p9. '"; $user10="' . $u10. '";$pass10="' . $p10. '"; $user11="' . $u11. '";$pass11="' . $p11. '"; $user12="' . $u12. '";$pass12="' . $p12. '"; $user13="' . $u13. '";$pass13="' . $p13. '"; $user14="' . $u14. '";$pass14="' . $p14. '"; $user15="' . $u15. '";$pass15="' . $p15. '"; $user16="' . $u16. '";$pass16="' . $p16. '"; $user17="' . $u17. '";$pass17="' . $p17. '"; $user18="' . $u18. '";$pass18="' . $p18. '"; $user19="' . $u19. '";$pass19="' . $p19. '"; $user20="' . $u20. '";$pass20="' . $p20. '"; $user21="' . $u21. '";$pass21="' . $p21. '"; ?>';
		fwrite($handle, $data);
		
	}
?>
	</body>
</html>
