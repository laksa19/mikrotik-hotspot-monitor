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
include('./vouchers/kvouchers.php');

$API = new RouterosAPI();
$API->debug = false;
if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$ARRAY = $API->comm("/ip/hotspot/print");
	$API->disconnect();
	$server1 = ($ARRAY[0]['name']);
	$server2 = ($ARRAY[1]['name']);
	$server3 = ($ARRAY[2]['name']);
	$server4 = ($ARRAY[3]['name']);
	$server5 = ($ARRAY[4]['name']);
}

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
					<td style="text-align: center;" colspan=2>Generate Voucher</td>
				</tr>
				<tr>
					<td colspan=2>
						<button class="material-icons" onclick="location.href='genkvs.php';" title="Reload">autorenew</button>
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
					<tr><td>Jenis Voucher</td><td>:</td><td>
						<select name="genall" required="1">
							<option value="">Pilih...</option>
							<option value="kv">Kode Voucher</option>
							<option value="up">User Password</option>
						</select>
						</td>
					</tr>
					<tr><td>Server Hotspot</td><td>:</td><td>
						<select name="server" required="1">
							<option value="all">all</option>
							<?php if($server1 == ""){
								}elseif ($server2 == ""){
									echo "<option>$server1</option>";
								}elseif ($server3 == ""){
									echo "<option>$server1</option>";
									echo "<option>$server2</option>";
								}elseif ($server4 == ""){
									echo "<option>$server1</option>";
									echo "<option>$server2</option>";
									echo "<option>$server3</option>";
								}elseif ($server5 == ""){
									echo "<option>$server1</option>";
									echo "<option>$server2</option>";
									echo "<option>$server3</option>";
									echo "<option>$server4</option>";
								}else{
									echo "<option>$server1</option>";
									echo "<option>$server2</option>";
									echo "<option>$server3</option>";
									echo "<option>$server4</option>";
									echo "<option>$server5</option>";
									}
								?>
						</select>
						</td>
					</tr>
					<tr><td>Profile | Masa Aktif</td><td>:</td><td>
						<select name="uprofile" required="1">
							<option value="">Pilih...</option>
							<?php if($profile1 == ""){
								}elseif ($profile2 == ""){
									echo "<option>$profile1</option>";
								}elseif ($profile3 == ""){
									echo "<option>$profile1</option>";
									echo "<option>$profile2</option>";
								}elseif ($profile4 == ""){
									echo "<option>$profile1</option>";
									echo "<option>$profile2</option>";
									echo "<option>$profile3</option>";
								}elseif ($profile5 == ""){
									echo "<option>$profile1</option>";
									echo "<option>$profile2</option>";
									echo "<option>$profile3</option>";
									echo "<option>$profile4</option>";
								}elseif ($profile6 == ""){
									echo "<option>$profile1</option>";
									echo "<option>$profile2</option>";
									echo "<option>$profile3</option>";
									echo "<option>$profile4</option>";
									echo "<option>$profile5</option>";
								}elseif ($profile7 == ""){
									echo "<option>$profile1</option>";
									echo "<option>$profile2</option>";
									echo "<option>$profile3</option>";
									echo "<option>$profile4</option>";
									echo "<option>$profile5</option>";
									echo "<option>$profile6</option>";
								}elseif ($profile8 == ""){
									echo "<option>$profile1</option>";
									echo "<option>$profile2</option>";
									echo "<option>$profile3</option>";
									echo "<option>$profile4</option>";
									echo "<option>$profile5</option>";
									echo "<option>$profile6</option>";
									echo "<option>$profile7</option>";
								}elseif ($profile9 == ""){
									echo "<option>$profile1</option>";
									echo "<option>$profile2</option>";
									echo "<option>$profile3</option>";
									echo "<option>$profile4</option>";
									echo "<option>$profile5</option>";
									echo "<option>$profile6</option>";
									echo "<option>$profile7</option>";
									echo "<option>$profile8</option>";
								}elseif ($profile10 == ""){
									echo "<option>$profile1</option>";
									echo "<option>$profile2</option>";
									echo "<option>$profile3</option>";
									echo "<option>$profile4</option>";
									echo "<option>$profile5</option>";
									echo "<option>$profile6</option>";
									echo "<option>$profile7</option>";
									echo "<option>$profile8</option>";
									echo "<option>$profile9</option>";
								}else{
									echo "<option>$profile1</option>";
									echo "<option>$profile2</option>";
									echo "<option>$profile3</option>";
									echo "<option>$profile4</option>";
									echo "<option>$profile5</option>";
									echo "<option>$profile6</option>";
									echo "<option>$profile7</option>";
									echo "<option>$profile8</option>";
									echo "<option>$profile9</option>";
									echo "<option>$profile10</option>";
									}
								?>
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
							<option>Free</option>
							<?php if($price1 == ""){
								}elseif ($price2 == ""){
									echo "<option>$price1</option>";
								}elseif ($price3 == ""){
									echo "<option>$price1</option>";
									echo "<option>$price2</option>";
								}elseif ($price4 == ""){
									echo "<option>$price1</option>";
									echo "<option>$price2</option>";
									echo "<option>$price3</option>";
								}elseif ($price5 == ""){
									echo "<option>$price1</option>";
									echo "<option>$price2</option>";
									echo "<option>$price3</option>";
									echo "<option>$price4</option>";
								}elseif ($price6 == ""){
									echo "<option>$price1</option>";
									echo "<option>$price2</option>";
									echo "<option>$price3</option>";
									echo "<option>$price4</option>";
									echo "<option>$price5</option>";
								}elseif ($price7 == ""){
									echo "<option>$price1</option>";
									echo "<option>$price2</option>";
									echo "<option>$price3</option>";
									echo "<option>$price4</option>";
									echo "<option>$price5</option>";
									echo "<option>$price6</option>";
								}elseif ($price8 == ""){
									echo "<option>$price1</option>";
									echo "<option>$price2</option>";
									echo "<option>$price3</option>";
									echo "<option>$price4</option>";
									echo "<option>$price5</option>";
									echo "<option>$price6</option>";
									echo "<option>$price7</option>";
								}elseif ($price9 == ""){
									echo "<option>$price1</option>";
									echo "<option>$price2</option>";
									echo "<option>$price3</option>";
									echo "<option>$price4</option>";
									echo "<option>$price5</option>";
									echo "<option>$price6</option>";
									echo "<option>$price7</option>";
									echo "<option>$price8</option>";
								}elseif ($price10 == ""){
									echo "<option>$price1</option>";
									echo "<option>$price2</option>";
									echo "<option>$price3</option>";
									echo "<option>$price4</option>";
									echo "<option>$price5</option>";
									echo "<option>$price6</option>";
									echo "<option>$price7</option>";
									echo "<option>$price8</option>";
									echo "<option>$price9</option>";
								}else{
									echo "<option>$price1</option>";
									echo "<option>$price2</option>";
									echo "<option>$price3</option>";
									echo "<option>$price4</option>";
									echo "<option>$price5</option>";
									echo "<option>$price6</option>";
									echo "<option>$price7</option>";
									echo "<option>$price8</option>";
									echo "<option>$price9</option>";
									echo "<option>$price10</option>";
									}
								?>
						</select>
						</td>
					</tr>
					<tr>
						<td>Jumlah Voucher</td>
						<td>:</td>
						<td><input type="text" name="jumlahv" required="1" size="3" maxlength="2"></td>
					</tr>
					<tr>
						<td></td>
						<td colspan=3>
							<input type="submit" class="btnsubmit" value="Generate"/>
						</td>
					</tr>
					<tr><td colspan=3><p style="color:red;">Catatan: Maksimal jumlah voucher per lembar [A4=21 F4=24]</p></td></tr>
				</table>
			</form>
				<table class="tnav">
					<tr>
						<td>
							<button class="btnsubmit" onclick="location.href='./vcolorconf.php';">Ganti Warna</button>
							<button class="btnsubmit" onclick="window.open('./vouchers/printkvs.php','_blank');">Cetak Kode Voucher</button>
							<button class="btnsubmit" onclick="window.open('./vouchers/printvs.php','_blank');">Cetak User Password</button>
						</td>
					</tr>
				</table>
				<br>
				<table class="tprinta">
					<tr>
						<th>Generate Voucher Sebelumnya</th>
					</tr>
					<tr>
						<td style="text-align: center; ">Aktif:<?php print_r($vprofname);?> <?php print_r($vtimelimit);?> <?php print_r($vbytelimit);?></td></tr><tr><td style="text-align: center; "><?php print_r($vserver);?> <?php print_r($vprice);?></td>
					</tr>
				</table>
				<br>
<?php
	if(isset($_POST['uprofile'])){
		$API = new RouterosAPI();
		$API->debug = false;
		if ($API->connect($iphost, $userhost, $passwdhost)) {
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
		$jmlv = ($_POST['jumlahv']);
		$kkv = "$profname-". rand(100,999) . "-" . date("d.m.y");
		$genall = ($_POST['genall']);
	if($genall=="kv"){
		for($i=1;$i<=$jmlv;$i++){
			$a[$i]= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
			$n[$i]= rand(1000,9999);
			$u[$i] = "$a[$i]$n[$i]";
		}
		for($i=1;$i<=$jmlv;$i++){
			$API->comm("/ip/hotspot/user/add", array(
				"server" => "$serverh",
				"name" => "$u[$i]",
				"password" => "$u[$i]",
				"profile" => "$profname",
				"limit-uptime" => "$timelimit",
				"limit-bytes-out" => "$bytelimit",
				"comment" => "$kkv",
			));
		}
		$my_file = 'vouchers/kvouchers.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $vkkv="' . $kkv . '"; $vserver="' . $serverh . '"; $vprofname="' . $vprofile . '"; $uptimelimit="' . $timelimit . '"; $upbytelimit="' . $bytelimit . '"; $vprice="' . $price . '"; ?>';
	}
	if($genall=="up"){
		for($i=1;$i<=$jmlv;$i++){
			$a[$i]= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
			$n[$i]= rand(100000,999999);
		}
		for($i=1;$i<=$jmlv;$i++){
			$API->comm("/ip/hotspot/user/add", array(
			"server" => "$serverh",
			"name" => "$a[$i]",
			"password" => "$n[$i]",
			"profile" => "$profname",
			"limit-uptime" => "$timelimit",
			"limit-bytes-out" => "$bytelimit",
			"comment" => "$kkv",
			));
		}
		
		$my_file = 'vouchers/vouchers.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $vkkv="' . $kkv . '"; $vserver="' . $serverh . '"; $vprofname="' . $vprofile . '"; $uptimelimit="' . $timelimit . '"; $upbytelimit="' . $bytelimit . '"; $vprice="' . $price . '"; ?>';
	}
		
		$API->disconnect();
		
		
		
		fwrite($handle, $data);
		
		echo	"<table class='tprinta'>";
		echo				"<tr>";
		echo					"<th>Generate Voucher Sekarang</th>";
		echo				"<tr>";
		echo					"<td style='text-align: center; '>Aktif:$vprofile $vtimelimit $vbytelimit</td></tr><tr><td style='text-align: center; '>$serverh $price</td>";
		echo				"</tr>";
		echo	"</table>";
		echo	"<br>";
	}
?>
	</body>
</html>
