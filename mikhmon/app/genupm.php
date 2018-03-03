<?php
/*
 *  Copyright (C) 2017, 2018 Laksamadi Guko.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
session_start();
?>
<?php
error_reporting(0);
require('./lib/api.php');
include('./config.php');

if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}


$API = new RouterosAPI();
$API->debug = false;
if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$srvlist = $API->comm("/ip/hotspot/print");
	$API->disconnect();
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Generate Custom User Password</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="./img/favicon.png" />
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
					<td style="text-align: center;" colspan=2>Generate Custom User Password</td>
				</tr>
				<tr>
					<td colspan=2>
						<button class="material-icons" onclick="location.href='genupm.php';" title="Reload">autorenew</button>
						<button class="material-icons"	onclick="location.href='./uprofileadd.php';"	title="User Profile">local_library</button>
						<div class="dropdown" style="float:right;">
							<button class="material-icons dropbtn">local_play</button>
								<div class="dropdown-content">
									<a style="border-bottom: 1px solid #ccc;" href="#">Ganerate</a>
									<a href="genkv.php">1 Voucher</a>
									<a href="genkvs.php">1-99 Voucher</a>
									<a href="genupm.php">1 Custom User Pass</a>
								</div>
						</div>
						<div class="dropdown" style="float:right;">
							<button class="material-icons dropbtn">find_in_page</button>
								<div class="dropdown-content">
									<a style="border-bottom: 1px solid #ccc;" href="#">User by profile</a>
									<?php
								$proflist = array ('1'=>$profile1,$profile2,$profile3,$profile4,$profile5,$profile6,$profile7,$profile8,$profile9,$profile10,$profile11,$profile12,$profile13,$profile14,$profile15);
								
									if($profile1 == ""){
									}elseif ($profile2 == ""){
										for ($i = 1; $i <= 1; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile3 == ""){
										for ($i = 1; $i <= 2; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile4 == ""){
										for ($i = 1; $i <= 3; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile5 == ""){
										for ($i = 1; $i <= 4; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile6 == ""){
										for ($i = 1; $i <= 5; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile7 == ""){
										for ($i = 1; $i <= 6; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile8 == ""){
										for ($i = 1; $i <= 7; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile9 == ""){
										for ($i = 1; $i <= 8; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile10 == ""){
										for ($i = 1; $i <= 9; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile11 == ""){
										for ($i = 1; $i <= 10; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile12 == ""){
										for ($i = 1; $i <= 11; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile13 == ""){
										for ($i = 1; $i <= 12; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile14 == ""){
										for ($i = 1; $i <= 13; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}elseif ($profile15 == ""){
										for ($i = 1; $i <= 14; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}else{
										for ($i = 1; $i <= 15; $i++) {
										echo "<a href='./userlist.php?profile=$proflist[$i]'>$proflist[$i]</a>";
									}
									}
								?>
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
							
							<?php
							$TotalReg = count($srvlist);

							for ($i=0; $i<$TotalReg; $i++){
							$regtable = $srvlist[$i];echo "<option>" . $regtable['name'];echo "</option>";
							}
								?>
						</select>
						</td>
					</tr>
					<tr><td>Profile | Masa Aktif</td><td>:</td><td>
						<select name="uprofile" required="1">
							<option value="">Pilih...</option>
							<?php
								$proflist = array ('1'=>$profile1,$profile2,$profile3,$profile4,$profile5,$profile6,$profile7,$profile8,$profile9,$profile10,$profile11,$profile12,$profile13,$profile14,$profile15);
								
									if($profile1 == ""){
									}elseif ($profile2 == ""){
										for ($i = 1; $i <= 1; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile3 == ""){
										for ($i = 1; $i <= 2; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile4 == ""){
										for ($i = 1; $i <= 3; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile5 == ""){
										for ($i = 1; $i <= 4; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile6 == ""){
										for ($i = 1; $i <= 5; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile7 == ""){
										for ($i = 1; $i <= 6; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile8 == ""){
										for ($i = 1; $i <= 7; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile9 == ""){
										for ($i = 1; $i <= 8; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile10 == ""){
										for ($i = 1; $i <= 9; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile11 == ""){
										for ($i = 1; $i <= 10; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile12 == ""){
										for ($i = 1; $i <= 11; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile13 == ""){
										for ($i = 1; $i <= 12; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile14 == ""){
										for ($i = 1; $i <= 13; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile15 == ""){
										for ($i = 1; $i <= 14; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}else{
										for ($i = 1; $i <= 15; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}
								?>
						</select>
						</td>
					</tr>
					<tr><td>Durasi</td><td>:</td><td>
						<select name="utimelimit" required="1">
							<option value="0">Pilih...</option>
							<?php
								$timelist = array ('1'=>$utimelimit1,$utimelimit2,$utimelimit3,$utimelimit4,$utimelimit5,$utimelimit6,$utimelimit7,$utimelimit8,$utimelimit9,$utimelimit10);
								
								$timetlist = array ('1'=>$utimelimit1t,$utimelimit2t,$utimelimit3t,$utimelimit4t,$utimelimit5t,$utimelimit6t,$utimelimit7t,$utimelimit8t,$utimelimit9t,$utimelimit10t);
								
									if($utimelimit1 == ""){
									}elseif ($utimelimit2 == ""){
										for ($i = 1; $i <= 1; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit3 == ""){
										for ($i = 1; $i <= 2; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit4 == ""){
										for ($i = 1; $i <= 3; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit5 == ""){
										for ($i = 1; $i <= 4; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit6 == ""){
										for ($i = 1; $i <= 5; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit7 == ""){
										for ($i = 1; $i <= 6; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit8 == ""){
										for ($i = 1; $i <= 7; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit9 == ""){
										for ($i = 1; $i <= 8; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit10 == ""){
										for ($i = 1; $i <= 9; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}else{
										for ($i = 1; $i <= 10; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}
								?>
						</select>
						</td>
					</tr>
					<tr><td>Kuota</td><td>:</td><td>
						<select name="ubytelimit" required="1">
							<option value="0">Pilih...</option>
							<?php
								$bytelist = array ('1'=>$ubytelimit1,$ubytelimit2,$ubytelimit3,$ubytelimit4,$ubytelimit5,$ubytelimit6,$ubytelimit7,$ubytelimit8,$ubytelimit9,$ubytelimit10);
								
								$bytetlist = array ('1'=>$ubytelimit1t,$ubytelimit2t,$ubytelimit3t,$ubytelimit4t,$ubytelimit5t,$ubytelimit6t,$ubytelimit7t,$ubytelimit8t,$ubytelimit9t,$ubytelimit10t);
								
									if($ubytelimit1 == ""){
									}elseif ($ubytelimit2 == ""){
										for ($i = 1; $i <= 1; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit3 == ""){
										for ($i = 1; $i <= 2; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit4 == ""){
										for ($i = 1; $i <= 3; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit5 == ""){
										for ($i = 1; $i <= 4; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit6 == ""){
										for ($i = 1; $i <= 5; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit7 == ""){
										for ($i = 1; $i <= 6; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit8 == ""){
										for ($i = 1; $i <= 7; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit9 == ""){
										for ($i = 1; $i <= 8; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit10 == ""){
										for ($i = 1; $i <= 9; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}else{
										for ($i = 1; $i <= 10; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}
								?>
						</select>
						</td>
					</tr>
					<!--<tr><td>Harga</td><td>:</td><td>
						<select name="uprice" required="1">
							<option value="">Pilih...</option>
							<option>Free</option>
							<?php
								$pricelist = array ('1'=>$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11,$price12,$price13,$price14,$price15);
								
									if($price1 == ""){
									}elseif ($price2 == ""){
										for ($i = 1; $i <= 1; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price3 == ""){
										for ($i = 1; $i <= 2; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price4 == ""){
										for ($i = 1; $i <= 3; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price5 == ""){
										for ($i = 1; $i <= 4; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price6 == ""){
										for ($i = 1; $i <= 5; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price7 == ""){
										for ($i = 1; $i <= 6; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price8 == ""){
										for ($i = 1; $i <= 7; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price9 == ""){
										for ($i = 1; $i <= 8; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price10 == ""){
										for ($i = 1; $i <= 9; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price11 == ""){
										for ($i = 1; $i <= 10; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price12 == ""){
										for ($i = 1; $i <= 11; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price13 == ""){
										for ($i = 1; $i <= 12; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price14 == ""){
										for ($i = 1; $i <= 13; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price15 == ""){
										for ($i = 1; $i <= 14; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}else{
										for ($i = 1; $i <= 15; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}
								?>
						</select>
						</td>-->
					</tr>
					<tr><td>Username</td><td>:</td><td><input type="text" size="10" maxlength="10" name="uname" required="1"/></td></tr>
					<tr><td>Password</td><td>:</td><td><input type="text" size="10" maxlength="10" name="passwd" required="1"/></td></tr>
					<td></td>
						<td colspan=3>
							<input type="submit" class="btnsubmit" value="Generate"/>
							</td>
					</tr>
			</form>
			<br>
			<!--<table>
				<tr>
					<td colspan=3>
						<button class="btnsubmit" onclick="window.open('./vouchers/userpass.html','_blank');">Cetak</button>
						</td>
				</tr>
			<br>
			</table>-->

<?php
	if(isset($_POST['uprofile'])){
		$API = new RouterosAPI();
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
			}elseif ($uprofile == $profile11){
				$vprofile = $vname11;
			}elseif ($uprofile == $profile12){
				$vprofile = $vname12;
			}elseif ($uprofile == $profile13){
				$vprofile = $vname13;
			}elseif ($uprofile == $profile14){
				$vprofile = $vname14;
			}elseif ($uprofile == $profile15){
				$vprofile = $vname15;
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
		$price = ($_POST['uprice']);
		$serverh = ($_POST['server']);
		$u1 = ($_POST['uname']);
		$p1 = ($_POST['passwd']);
		$kkv = "--" . $serverh . "-" . $vprofile . "-" . $timelimit . "-" . $bytelimit . "-" . $price . "-" . date("d.m.y") . "-" . rand(100,999);
	$API->write('/ip/hotspot/user/profile/print', false);
	$API->write('?=name='.$uprofile.'');
	$cekprice = $API->read();

	$regtable = $cekprice[0];
	$getprice = explode(",",$regtable['on-login']);
	$price = $getprice[2];
	$cur = "Rp";
	if($price == "" ){
	  $vprice = "Free";
	}elseif(strlen($price) == 4){
	  $vprice = $cur.substr($price,0,1).".".substr($price,1,3);
	}elseif(strlen($price) == 5){
	  $vprice = $cur.substr($price,0,2).".".substr($price,2,3);
	}elseif(strlen($price) == 6){
	  $vprice = $cur.substr($price,0,3).".".substr($price,3,3);
	}elseif(strlen($price) == 7){
	  $vprice = $cur.substr($price,0,1).".".substr($price,1,3).".".substr($price,4,3);
	}elseif(strlen($price) == 8){
	  $vprice = $cur.substr($price,0,2).".".substr($price,2,3).".".substr($price,5,3);
	}elseif(strlen($price) == 9){
	  $vprice = $cur.substr($price,0,3).".".substr($price,3,3).".".substr($price,6,3);
	}else{
	  $vprice = $price;
	}
		
		$API->comm("/ip/hotspot/user/add", array(
		  "server" => "$serverh",
		  "name" => "$u1",
		  "password" => "$p1",
		  "profile" => "$profname",
		  "limit-uptime" => "$timelimit",
		  "limit-bytes-out" => "$bytelimit",
		  "comment" => "$kkv",
		));

		$API->disconnect();
		
		$my_file = 'vouchers/voucher.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $user1="' . $u1. '";$pass1="' . $p1. '";$vprofname="' . $profname. '";$vptimelimit="' . $vtimelimit. '"; $vpbytelimit="' . $vbytelimit. '"; $vprice="' . $price. '"; ?>';
		fwrite($handle, $data);

		$my_file1 = 'vouchers/userpass.html';
		fwrite($handle1, $data1);
	
		echo	"<table>";
		echo			"<table class='tusera' id='preview-table'>";
		echo				"<tr>";
		echo					"<tr>";
		echo						"<td style='text-align: right;'><?php print_r($headerv);? font-size: 16px;'>$headerv</td>";
		echo					"</tr>";
		echo					"<tr>";
		echo						"<td style='font-size: 12px;'>Login dan Logout buka http://$notev</td>";
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
		echo						"<td style='text-align: center; '>Aktif:$vprofile $vtimelimit $vbytelimit</td></tr><tr><td style='text-align: center; '>$serverh $vprice</td>";
		echo					"</tr>";
		echo				"<tr>";
		echo			"</table>";
		echo	"</table>";
		echo	"<br>";

}
?>
	</body>
</html>
