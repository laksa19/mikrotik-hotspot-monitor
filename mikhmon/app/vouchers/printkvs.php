<?php session_start(); ?>
<?php
error_reporting(0);
if(!isset($_SESSION['usermikhmon'])){
	header("Location:../login.php");
}
?>
<?php
error_reporting(0);
require('../lib/api.php');
include('../config.php');
include('./kvouchers.php');
include('../css/vcolors.php');
include('..lib/phpqrcode/qrlib.php');
$API = new RouterosAPI();
$API->debug = false;
if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/ip/hotspot/user/print', false);
	$API->write('?=comment='.$vkkv.'');
	$ARRAY = $API->read();
	$API->disconnect();
}
$TotalReg = count($ARRAY);

$tlimit = $uptimelimit;
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
}elseif ($tlimit == $utimelimit6){
	$vtimelimit = "Durasi:$utimelimit6t";
}elseif ($tlimit == $utimelimit7){
	$vtimelimit = "Durasi:$utimelimit7t";
}elseif ($tlimit == $utimelimit8){
	$vtimelimit = "Durasi:$utimelimit8t";
}elseif ($tlimit == $utimelimit9){
	$vtimelimit = "Durasi:$utimelimit9t";
}elseif ($tlimit == $utimelimit10){
	$vtimelimit = "Durasi:$utimelimit10t";
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
}elseif ($blimit == $ubytelimit6){
	$vbytelimit = "Kuota:$ubytelimit6t";
}elseif ($blimit == $ubytelimit7){
	$vbytelimit = "Kuota:$ubytelimit7t";
}elseif ($blimit == $ubytelimit8){
	$vbytelimit = "Kuota:$ubytelimit8t";
}elseif ($blimit == $ubytelimit9){
	$vbytelimit = "Kuota:$ubytelimit9t";
}elseif ($blimit == $ubytelimit10){
	$vbytelimit = "Kuota:$ubytelimit10t";
}else {
	$vbytelimit= "";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Monitor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<link rel="icon" href="../img/favicon.png" />
		<style>
@font-face {
  font-family: Roboto;
  src: url('../css/fonts/Roboto-Regular.woff');
  font-weight: normal;
  font-style: normal;
}
body {
  color: #000000; 
  background-color: #FFFFFF; 
  font-size: 14px; 
  font-family: Roboto;
}
table.tprint { 
  margin-left:auto; 
  margin-right:auto;
  width: 300px;
  height: 180px;
  border-collapse: collapse;
}
table.tprint td { 
  padding: 10px; 
  border: 1px solid #000000;
  font-size: 14px;
  text-align: left; 
}
table.tprinta { 
  margin-left:auto; 
  margin-right:auto;
  width: 300px;
  height: 180px;
  border-collapse: collapse;
}
table.tprinta td { 
  padding: 4px; 
  border: 2px solid #000000;
  font-size: 16px;
  text-align: left;
  font-weight: bold;
}
table.tprintb { 
  margin-left:auto; 
  margin-right:auto;
  width: 300px; 
  border-collapse: collapse; 
}
table.tprintb td { 
  padding-left: 20px;
  padding-top: 17px;
  padding-bottom: 20px;
  border: 0px;
  font-size: 18px;
  text-align: left; 
}
#qrcode {
  width:32px;
  height:32px;
}
		</style>
	</head>
	<body>

<table class="tprint">
	<?php $jml = $TotalReg / 3; for($bar=0;$bar<$jml;$bar++){ if($bar==0) $indx = 0; else $indx = 3 * $bar;?>
			<tr> <!--baris 1 -->
					<?php for($kol=0;$kol<3;$kol++){ ?>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: left; background-color:<?php print_r($header);?>"><img src="../img/logo.png" alt="logo" style="height:43px;border:0;"></td>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv); $no = $indx+1; echo "  [$no]";?></td>
						</tr>
						<tr>
							<td colspan=2 style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>">Login dan Logout buka http://<?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td colspan=2 style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php $regtable = $ARRAY[$indx];echo "" . $regtable['name'];?></td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan=2 style="text-align: center; color:<?php print_r($font4);?>; background-color:<?php print_r($details);?>">Aktif:<?php print_r($vprofname);?> <?php print_r($vtimelimit);?> <?php print_r($vbytelimit);?></td>
						</tr>
						<tr>
							<td colspan=2 style="text-align: center; color:<?php print_r($font5);?>; background-color:<?php print_r($price);?>"><?php print_r($vserver);?> <?php print_r($vprice);?></td>
						</tr>
					</table>
				</td>
					<?php $indx++; } ?>
			</tr>
	<?php } ?>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 100,
	height : 100
});

function makeCode () {		
	var elText = document.getElementById("text");
	
	if (!elText.value) {
		alert("Input a text");
		elText.focus();
		return;
	}
	
	qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>
</body>
</html>
