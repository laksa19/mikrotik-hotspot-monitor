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
if($_SESSION['usermikhmon'] !== $userhost){
		echo "<meta http-equiv='refresh' content='0;url=logout.php' />";
		exit();
	}else if($_SESSION['usermikhmon'] == ''){
		echo "<meta http-equiv='refresh' content='0;url=logout.php' />";
		exit();
	}

include('vouchers/kvouchers.php');

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
<?php
	if(isset($_POST['headerc'])){
		$headerc=($_POST['headerc']);
		$notec=($_POST['notec']);
		$userpassc=($_POST['userpassc']);
		$detailsc=($_POST['detc']);
		$pricec=($_POST['pricec']);
		$fontc1=($_POST['font1']);
		$fontc2=($_POST['font2']);
		$fontc3=($_POST['font3']);
		$fontc4=($_POST['font4']);
		$fontc5=($_POST['font5']);
		$my_file = 'css/vcolors.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $header="' . $headerc . '"; $note="' . $notec . '"; $userpass="' . $userpassc . '"; $details="' . $detailsc . '"; $price="' . $pricec. '"; $font1="' . $fontc1. '"; $font2="' . $fontc2. '"; $font3="' . $fontc3. '"; $font4="' . $fontc4. '"; $font5="' . $fontc5. '"; ?>';
		fwrite($handle, $data);
		header('Location: vcolorconf.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Monitor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="refresh" content="" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="./img/favicon.png" />
		<link rel="stylesheet" href="css/style.css" media="screen">
		<style>
table.tclists {
  margin-left:auto;
  margin-right:auto;
  width: 300px;
  height: 180px;
  border-collapse: collapse;
}
table.tclists td {
  padding: 4px;
  font-size: 12px;
  text-align: left;
  font-weight: bold;
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
  border: 2px solid BLACK;
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
  border: 0px;
  font-size: 18px;
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
					<td style="text-align: center;" colspan=2>Pengaturan Warna Voucher</td>
				</tr>
				<tr>
					<td colspan=2>
						<button class="material-icons" onclick="Reload()"	title="Reload">autorenew</button>
						<button class="material-icons"	onclick="location.href='./setup.php';" 	title="Edit Config">settings</button>
						<button class="material-icons" onclick="location.href='resetcolor.php';" title="Reset Warna Voucher">history</button>
						<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
						<div class="dropdown" style="float:right;">
							<button class="material-icons dropbtn">local_play</button>
								<div class="dropdown-content">
									<a style="border-bottom: 1px solid #ccc;" href="#">Ganerate</a>
									<a href="genkv.php">1 Voucher</a>
									<a href="genkvs.php">1-99 Voucher</a>
									<a href="genupm.php">1 Custom User Pass</a>
								</div>
						</div>
					</td>
				</tr>
			</table>
			</table>
			<form autocomplete="off" method="post" action="">
				<table class="tclists" align="center"  >
					<tr><td>Header</td><td>
						<select name="headerc" >
							<option value="<?php print_r($header);?>"><?php print_r($header);?></option>
							<option style="color:WHITE;" value=WHITE	>WHITE</option>
							<option style="color:SILVER;" value=SILVER	>SILVER</option>
							<option style="color:GRAY;" value=GRAY	>GRAY</option>
							<option style="color:BLACK;" value=BLACK	>BLACK</option>
							<option style="color:RED;" value=RED	>RED</option>
							<option style="color:MAROON;" value=MAROON	>MAROON</option>
							<option style="color:YELLOW;" value=YELLOW	>YELLOW</option>
							<option style="color:OLIVE;" value=OLIVE	>OLIVE</option>
							<option style="color:LIME;" value=LIME	>LIME</option>
							<option style="color:GREEN;" value=GREEN	>GREEN</option>
							<option style="color:AQUA;" value=AQUA	>AQUA	</option>
							<option style="color: TEAL;" value=TEAL	>TEAL</option>
							<option style="color:BLUE;" value=BLUE	>BLUE	</option>
							<option style="color:NAVI;" value=NAVI	>NAVY</option>
							<option style="color:FUCHSIA;" value=FUCHSIA	>FUCHSIA</option>
							<option style="color:PURPLE;" value=PURPLE	>PURPLE</option>
						</select>
						</td>
						<td>Font</td><td>
						<select name="font1" >
							<option value="<?php print_r($font1);?>"><?php print_r($font1);?></option>
							<option style="color:WHITE;" value=WHITE	>WHITE</option>
							<option style="color:SILVER;" value=SILVER	>SILVER</option>
							<option style="color:GRAY;" value=GRAY	>GRAY</option>
							<option style="color:BLACK;" value=BLACK	>BLACK</option>
							<option style="color:RED;" value=RED	>RED</option>
							<option style="color:MAROON;" value=MAROON	>MAROON</option>
							<option style="color:YELLOW;" value=YELLOW	>YELLOW</option>
							<option style="color:OLIVE;" value=OLIVE	>OLIVE</option>
							<option style="color:LIME;" value=LIME	>LIME</option>
							<option style="color:GREEN;" value=GREEN	>GREEN</option>
							<option style="color:AQUA;" value=AQUA	>AQUA	</option>
							<option style="color: TEAL;" value=TEAL	>TEAL</option>
							<option style="color:BLUE;" value=BLUE	>BLUE	</option>
							<option style="color:NAVI;" value=NAVI	>NAVY</option>
							<option style="color:FUCHSIA;" value=FUCHSIA	>FUCHSIA</option>
							<option style="color:PURPLE;" value=PURPLE	>PURPLE</option>
						</select>
						</td>
					</tr>
					<tr><td>Catatan</td><td>
						<select name="notec" >
							<option value="<?php print_r($note);?>"><?php print_r($note);?></option>
							<option style="color:WHITE;" value=WHITE	>WHITE</option>
							<option style="color:SILVER;" value=SILVER	>SILVER</option>
							<option style="color:GRAY;" value=GRAY	>GRAY</option>
							<option style="color:BLACK;" value=BLACK	>BLACK</option>
							<option style="color:RED;" value=RED	>RED</option>
							<option style="color:MAROON;" value=MAROON	>MAROON</option>
							<option style="color:YELLOW;" value=YELLOW	>YELLOW</option>
							<option style="color:OLIVE;" value=OLIVE	>OLIVE</option>
							<option style="color:LIME;" value=LIME	>LIME</option>
							<option style="color:GREEN;" value=GREEN	>GREEN</option>
							<option style="color:AQUA;" value=AQUA	>AQUA	</option>
							<option style="color: TEAL;" value=TEAL	>TEAL</option>
							<option style="color:BLUE;" value=BLUE	>BLUE	</option>
							<option style="color:NAVI;" value=NAVI	>NAVY</option>
							<option style="color:FUCHSIA;" value=FUCHSIA	>FUCHSIA</option>
							<option style="color:PURPLE;" value=PURPLE	>PURPLE</option>
						</select>
						</td>
						<td>Font</td><td>
						<select name="font2" >
							<option value="<?php print_r($font2);?>"><?php print_r($font2);?></option>
							<option style="color:WHITE;" value=WHITE	>WHITE</option>
							<option style="color:SILVER;" value=SILVER	>SILVER</option>
							<option style="color:GRAY;" value=GRAY	>GRAY</option>
							<option style="color:BLACK;" value=BLACK	>BLACK</option>
							<option style="color:RED;" value=RED	>RED</option>
							<option style="color:MAROON;" value=MAROON	>MAROON</option>
							<option style="color:YELLOW;" value=YELLOW	>YELLOW</option>
							<option style="color:OLIVE;" value=OLIVE	>OLIVE</option>
							<option style="color:LIME;" value=LIME	>LIME</option>
							<option style="color:GREEN;" value=GREEN	>GREEN</option>
							<option style="color:AQUA;" value=AQUA	>AQUA	</option>
							<option style="color: TEAL;" value=TEAL	>TEAL</option>
							<option style="color:BLUE;" value=BLUE	>BLUE	</option>
							<option style="color:NAVI;" value=NAVI	>NAVY</option>
							<option style="color:FUCHSIA;" value=FUCHSIA	>FUCHSIA</option>
							<option style="color:PURPLE;" value=PURPLE	>PURPLE</option>
						</select>
						</td>
					</tr>
					<tr><td>User Pass</td><td>
						<select name="userpassc" >
							<option value="<?php print_r($userpass);?>"><?php print_r($userpass);?></option>
							<option style="color:WHITE;" value=WHITE	>WHITE</option>
							<option style="color:SILVER;" value=SILVER	>SILVER</option>
							<option style="color:GRAY;" value=GRAY	>GRAY</option>
							<option style="color:BLACK;" value=BLACK	>BLACK</option>
							<option style="color:RED;" value=RED	>RED</option>
							<option style="color:MAROON;" value=MAROON	>MAROON</option>
							<option style="color:YELLOW;" value=YELLOW	>YELLOW</option>
							<option style="color:OLIVE;" value=OLIVE	>OLIVE</option>
							<option style="color:LIME;" value=LIME	>LIME</option>
							<option style="color:GREEN;" value=GREEN	>GREEN</option>
							<option style="color:AQUA;" value=AQUA	>AQUA	</option>
							<option style="color: TEAL;" value=TEAL	>TEAL</option>
							<option style="color:BLUE;" value=BLUE	>BLUE	</option>
							<option style="color:NAVI;" value=NAVI	>NAVY</option>
							<option style="color:FUCHSIA;" value=FUCHSIA	>FUCHSIA</option>
							<option style="color:PURPLE;" value=PURPLE	>PURPLE</option>
						</select>
						</td>
						<td>Font</td><td>
						<select name="font3" >
							<option value="<?php print_r($font3);?>"><?php print_r($font3);?></option>
							<option style="color:WHITE;" value=WHITE	>WHITE</option>
							<option style="color:SILVER;" value=SILVER	>SILVER</option>
							<option style="color:GRAY;" value=GRAY	>GRAY</option>
							<option style="color:BLACK;" value=BLACK	>BLACK</option>
							<option style="color:RED;" value=RED	>RED</option>
							<option style="color:MAROON;" value=MAROON	>MAROON</option>
							<option style="color:YELLOW;" value=YELLOW	>YELLOW</option>
							<option style="color:OLIVE;" value=OLIVE	>OLIVE</option>
							<option style="color:LIME;" value=LIME	>LIME</option>
							<option style="color:GREEN;" value=GREEN	>GREEN</option>
							<option style="color:AQUA;" value=AQUA	>AQUA	</option>
							<option style="color: TEAL;" value=TEAL	>TEAL</option>
							<option style="color:BLUE;" value=BLUE	>BLUE	</option>
							<option style="color:NAVI;" value=NAVI	>NAVY</option>
							<option style="color:FUCHSIA;" value=FUCHSIA	>FUCHSIA</option>
							<option style="color:PURPLE;" value=PURPLE	>PURPLE</option>
						</select>
						</td>
					</tr>
					</tr>
					<tr><td>Keterangan</td><td>
						<select name="detc" >
							<option value="<?php print_r($details);?>"><?php print_r($details);?></option>
							<option style="color:WHITE;" value=WHITE	>WHITE</option>
							<option style="color:SILVER;" value=SILVER	>SILVER</option>
							<option style="color:GRAY;" value=GRAY	>GRAY</option>
							<option style="color:BLACK;" value=BLACK	>BLACK</option>
							<option style="color:RED;" value=RED	>RED</option>
							<option style="color:MAROON;" value=MAROON	>MAROON</option>
							<option style="color:YELLOW;" value=YELLOW	>YELLOW</option>
							<option style="color:OLIVE;" value=OLIVE	>OLIVE</option>
							<option style="color:LIME;" value=LIME	>LIME</option>
							<option style="color:GREEN;" value=GREEN	>GREEN</option>
							<option style="color:AQUA;" value=AQUA	>AQUA	</option>
							<option style="color: TEAL;" value=TEAL	>TEAL</option>
							<option style="color:BLUE;" value=BLUE	>BLUE	</option>
							<option style="color:NAVI;" value=NAVI	>NAVY</option>
							<option style="color:FUCHSIA;" value=FUCHSIA	>FUCHSIA</option>
							<option style="color:PURPLE;" value=PURPLE	>PURPLE</option>
						</select>
						</td>
						<td>Font</td><td>
						<select name="font4" >
							<option value="<?php print_r($font4);?>"><?php print_r($font4);?></option>
							<option style="color:WHITE;" value=WHITE	>WHITE</option>
							<option style="color:SILVER;" value=SILVER	>SILVER</option>
							<option style="color:GRAY;" value=GRAY	>GRAY</option>
							<option style="color:BLACK;" value=BLACK	>BLACK</option>
							<option style="color:RED;" value=RED	>RED</option>
							<option style="color:MAROON;" value=MAROON	>MAROON</option>
							<option style="color:YELLOW;" value=YELLOW	>YELLOW</option>
							<option style="color:OLIVE;" value=OLIVE	>OLIVE</option>
							<option style="color:LIME;" value=LIME	>LIME</option>
							<option style="color:GREEN;" value=GREEN	>GREEN</option>
							<option style="color:AQUA;" value=AQUA	>AQUA	</option>
							<option style="color: TEAL;" value=TEAL	>TEAL</option>
							<option style="color:BLUE;" value=BLUE	>BLUE	</option>
							<option style="color:NAVI;" value=NAVI	>NAVY</option>
							<option style="color:FUCHSIA;" value=FUCHSIA	>FUCHSIA</option>
							<option style="color:PURPLE;" value=PURPLE	>PURPLE</option>
						</select>
						</td>
					</tr>
					<tr><td>Harga</td><td>
						<select name="pricec" >
							<option value="<?php print_r($price);?>"><?php print_r($price);?></option>
							<option style="color:WHITE;" value=WHITE	>WHITE</option>
							<option style="color:SILVER;" value=SILVER	>SILVER</option>
							<option style="color:GRAY;" value=GRAY	>GRAY</option>
							<option style="color:BLACK;" value=BLACK	>BLACK</option>
							<option style="color:RED;" value=RED	>RED</option>
							<option style="color:MAROON;" value=MAROON	>MAROON</option>
							<option style="color:YELLOW;" value=YELLOW	>YELLOW</option>
							<option style="color:OLIVE;" value=OLIVE	>OLIVE</option>
							<option style="color:LIME;" value=LIME	>LIME</option>
							<option style="color:GREEN;" value=GREEN	>GREEN</option>
							<option style="color:AQUA;" value=AQUA	>AQUA	</option>
							<option style="color: TEAL;" value=TEAL	>TEAL</option>
							<option style="color:BLUE;" value=BLUE	>BLUE	</option>
							<option style="color:NAVI;" value=NAVI	>NAVY</option>
							<option style="color:FUCHSIA;" value=FUCHSIA	>FUCHSIA</option>
							<option style="color:PURPLE;" value=PURPLE	>PURPLE</option>
						</select>
						</td>
						<td>Font</td><td>
						<select name="font5" >
							<option value="<?php print_r($font5);?>"><?php print_r($font5);?></option>
							<option style="color:WHITE;" value=WHITE	>WHITE</option>
							<option style="color:SILVER;" value=SILVER	>SILVER</option>
							<option style="color:GRAY;" value=GRAY	>GRAY</option>
							<option style="color:BLACK;" value=BLACK	>BLACK</option>
							<option style="color:RED;" value=RED	>RED</option>
							<option style="color:MAROON;" value=MAROON	>MAROON</option>
							<option style="color:YELLOW;" value=YELLOW	>YELLOW</option>
							<option style="color:OLIVE;" value=OLIVE	>OLIVE</option>
							<option style="color:LIME;" value=LIME	>LIME</option>
							<option style="color:GREEN;" value=GREEN	>GREEN</option>
							<option style="color:AQUA;" value=AQUA	>AQUA	</option>
							<option style="color: TEAL;" value=TEAL	>TEAL</option>
							<option style="color:BLUE;" value=BLUE	>BLUE	</option>
							<option style="color:NAVI;" value=NAVI	>NAVY</option>
							<option style="color:FUCHSIA;" value=FUCHSIA	>FUCHSIA</option>
							<option style="color:PURPLE;" value=PURPLE	>PURPLE</option>
						</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" class="btnsubmit" value="Simpan"/>
						</td>
					</tr>
			</table>
			<br>
			<table class="tprinta">
					<tr>
						<td style="text-align: left; background-color:<?php print_r($header);?>"><img src="./img/logo.png" alt="logo" style="height:43px;border:0;"></td>
						<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [1]</td>
					</tr>
					<tr>
						<td colspan=2 style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>">Login dan Logout buka http://<?php print_r($notev);?> </td>
					</tr>
					<tr>
						<td colspan=2 style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
							<table class="tprintb">
								<tr><td>Username : MIKHMON</td></tr>
								<tr><td>Password : MIKHMON</td></tr>
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
			<br>
		</form>
			<table class="tnav">
				<tr>
					<td style="color:green;">
						Logo dapat diganti, diletakkan di folder img dalam folder app dengan format (logo.png).
						<!--<button class="btnsubmit" onclick="window.open('./vouchers/printvs.php','_blank');">Cetak Vouchers</button>-->
					</td>
				</tr>
			</table>
</body>
</html>
