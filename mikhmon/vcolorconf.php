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
include('config.php');
include('css/vcolors.php');
include('vouchers/vouchers.php');

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
		header("Location:vcolorconf.php");
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
		<link rel="icon" href="favicon.ico" />
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
					<td style="text-align: center;" colspan=2>Mikrotik Hotspot Monitor</td>
				</tr>
				<tr>
					<td>Warna Voucher</td>
					<td>
						<button class="material-icons" onclick="Reload()"	title="Reload">autorenew</button>
						<button class="material-icons"	onclick="location.href='./setup.php';" 	title="Edit Config">settings</button>
						<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
					</td>
				</tr>
			</table>
			</table>
			<form autocomplete="off" method="post" action="">
				<table class="tclists" align="center"  >
					<tr><td>Header</td><td>
						<select name="headerc" >
							<option value="">Pilih...</option>
							<option style="color:#FFFFFF;" value=#FFFFFF	>WHITE</option>
							<option style="color:#C0C0C0;" value=#C0C0C0	>SILVER</option>
							<option style="color:#808080;" value=#808080	>GRAY</option>
							<option style="color:#000000;" value=#000000	>BLACK</option>
							<option style="color:#FF0000;" value=#FF0000	>RED</option>
							<option style="color:#800000;" value=#800000	>MAROON</option>
							<option style="color:#FFFF00;" value=#FFFF00	>YELLOW</option>
							<option style="color:#808000;" value=#808000	>OLIVE</option>
							<option style="color:#00FF00;" value=#00FF00	>LIME</option>
							<option style="color:#008000;" value=#008000	>GREEN</option>
							<option style="color:#00FFFF;" value=#00FFFF	>AQUA	</option>
							<option style="color: #008080;" value=#008080	>TEAL</option>
							<option style="color:#0000FF;" value=#0000FF	>BLUE	</option>
							<option style="color:#000080;" value=#000080	>NAVY</option>
							<option style="color:#FF00FF;" value=#FF00FF	>FUCHSIA</option>
							<option style="color:#800080;" value=#800080	>PURPLE</option>
						</select>
						</td>
						<td>Font</td><td>
						<select name="font1" >
							<option value="">Pilih...</option>
							<option style="color:#FFFFFF;" value=#FFFFFF	>WHITE</option>
							<option style="color:#C0C0C0;" value=#C0C0C0	>SILVER</option>
							<option style="color:#808080;" value=#808080	>GRAY</option>
							<option style="color:#000000;" value=#000000	>BLACK</option>
							<option style="color:#FF0000;" value=#FF0000	>RED</option>
							<option style="color:#800000;" value=#800000	>MAROON</option>
							<option style="color:#FFFF00;" value=#FFFF00	>YELLOW</option>
							<option style="color:#808000;" value=#808000	>OLIVE</option>
							<option style="color:#00FF00;" value=#00FF00	>LIME</option>
							<option style="color:#008000;" value=#008000	>GREEN</option>
							<option style="color:#00FFFF;" value=#00FFFF	>AQUA	</option>
							<option style="color: #008080;" value=#008080	>TEAL</option>
							<option style="color:#0000FF;" value=#0000FF	>BLUE	</option>
							<option style="color:#000080;" value=#000080	>NAVY</option>
							<option style="color:#FF00FF;" value=#FF00FF	>FUCHSIA</option>
							<option style="color:#800080;" value=#800080	>PURPLE</option>
						</select>
						</td>
					</tr>
					<tr><td>Catatan</td><td>
						<select name="notec" >
							<option value="">Pilih...</option>
							<option style="color:#FFFFFF;" value=#FFFFFF	>WHITE</option>
							<option style="color:#C0C0C0;" value=#C0C0C0	>SILVER</option>
							<option style="color:#808080;" value=#808080	>GRAY</option>
							<option style="color:#000000;" value=#000000	>BLACK</option>
							<option style="color:#FF0000;" value=#FF0000	>RED</option>
							<option style="color:#800000;" value=#800000	>MAROON</option>
							<option style="color:#FFFF00;" value=#FFFF00	>YELLOW</option>
							<option style="color:#808000;" value=#808000	>OLIVE</option>
							<option style="color:#00FF00;" value=#00FF00	>LIME</option>
							<option style="color:#008000;" value=#008000	>GREEN</option>
							<option style="color:#00FFFF;" value=#00FFFF	>AQUA	</option>
							<option style="color: #008080;" value=#008080	>TEAL</option>
							<option style="color:#0000FF;" value=#0000FF	>BLUE	</option>
							<option style="color:#000080;" value=#000080	>NAVY</option>
							<option style="color:#FF00FF;" value=#FF00FF	>FUCHSIA</option>
							<option style="color:#800080;" value=#800080	>PURPLE</option>
						</select>
						</td>
						<td>Font</td><td>
						<select name="font2" >
							<option value="">Pilih...</option>
							<option style="color:#FFFFFF;" value=#FFFFFF	>WHITE</option>
							<option style="color:#C0C0C0;" value=#C0C0C0	>SILVER</option>
							<option style="color:#808080;" value=#808080	>GRAY</option>
							<option style="color:#000000;" value=#000000	>BLACK</option>
							<option style="color:#FF0000;" value=#FF0000	>RED</option>
							<option style="color:#800000;" value=#800000	>MAROON</option>
							<option style="color:#FFFF00;" value=#FFFF00	>YELLOW</option>
							<option style="color:#808000;" value=#808000	>OLIVE</option>
							<option style="color:#00FF00;" value=#00FF00	>LIME</option>
							<option style="color:#008000;" value=#008000	>GREEN</option>
							<option style="color:#00FFFF;" value=#00FFFF	>AQUA	</option>
							<option style="color: #008080;" value=#008080	>TEAL</option>
							<option style="color:#0000FF;" value=#0000FF	>BLUE	</option>
							<option style="color:#000080;" value=#000080	>NAVY</option>
							<option style="color:#FF00FF;" value=#FF00FF	>FUCHSIA</option>
							<option style="color:#800080;" value=#800080	>PURPLE</option>
						</select>
						</td>
					</tr>
					<tr><td>User Pass</td><td>
						<select name="userpassc" >
							<option value="">Pilih...</option>
							<option style="color:#FFFFFF;" value=#FFFFFF	>WHITE</option>
							<option style="color:#C0C0C0;" value=#C0C0C0	>SILVER</option>
							<option style="color:#808080;" value=#808080	>GRAY</option>
							<option style="color:#000000;" value=#000000	>BLACK</option>
							<option style="color:#FF0000;" value=#FF0000	>RED</option>
							<option style="color:#800000;" value=#800000	>MAROON</option>
							<option style="color:#FFFF00;" value=#FFFF00	>YELLOW</option>
							<option style="color:#808000;" value=#808000	>OLIVE</option>
							<option style="color:#00FF00;" value=#00FF00	>LIME</option>
							<option style="color:#008000;" value=#008000	>GREEN</option>
							<option style="color:#00FFFF;" value=#00FFFF	>AQUA	</option>
							<option style="color: #008080;" value=#008080	>TEAL</option>
							<option style="color:#0000FF;" value=#0000FF	>BLUE	</option>
							<option style="color:#000080;" value=#000080	>NAVY</option>
							<option style="color:#FF00FF;" value=#FF00FF	>FUCHSIA</option>
							<option style="color:#800080;" value=#800080	>PURPLE</option>
						</select>
						</td>
						<td>Font</td><td>
						<select name="font3" >
							<option value="">Pilih...</option>
							<option style="color:#FFFFFF;" value=#FFFFFF	>WHITE</option>
							<option style="color:#C0C0C0;" value=#C0C0C0	>SILVER</option>
							<option style="color:#808080;" value=#808080	>GRAY</option>
							<option style="color:#000000;" value=#000000	>BLACK</option>
							<option style="color:#FF0000;" value=#FF0000	>RED</option>
							<option style="color:#800000;" value=#800000	>MAROON</option>
							<option style="color:#FFFF00;" value=#FFFF00	>YELLOW</option>
							<option style="color:#808000;" value=#808000	>OLIVE</option>
							<option style="color:#00FF00;" value=#00FF00	>LIME</option>
							<option style="color:#008000;" value=#008000	>GREEN</option>
							<option style="color:#00FFFF;" value=#00FFFF	>AQUA	</option>
							<option style="color: #008080;" value=#008080	>TEAL</option>
							<option style="color:#0000FF;" value=#0000FF	>BLUE	</option>
							<option style="color:#000080;" value=#000080	>NAVY</option>
							<option style="color:#FF00FF;" value=#FF00FF	>FUCHSIA</option>
							<option style="color:#800080;" value=#800080	>PURPLE</option>
						</select>
						</td>
					</tr>
					</tr>
					<tr><td>Keterangan</td><td>
						<select name="detc" >
							<option value="">Pilih...</option>
							<option style="color:#FFFFFF;" value=#FFFFFF	>WHITE</option>
							<option style="color:#C0C0C0;" value=#C0C0C0	>SILVER</option>
							<option style="color:#808080;" value=#808080	>GRAY</option>
							<option style="color:#000000;" value=#000000	>BLACK</option>
							<option style="color:#FF0000;" value=#FF0000	>RED</option>
							<option style="color:#800000;" value=#800000	>MAROON</option>
							<option style="color:#FFFF00;" value=#FFFF00	>YELLOW</option>
							<option style="color:#808000;" value=#808000	>OLIVE</option>
							<option style="color:#00FF00;" value=#00FF00	>LIME</option>
							<option style="color:#008000;" value=#008000	>GREEN</option>
							<option style="color:#00FFFF;" value=#00FFFF	>AQUA	</option>
							<option style="color: #008080;" value=#008080	>TEAL</option>
							<option style="color:#0000FF;" value=#0000FF	>BLUE	</option>
							<option style="color:#000080;" value=#000080	>NAVY</option>
							<option style="color:#FF00FF;" value=#FF00FF	>FUCHSIA</option>
							<option style="color:#800080;" value=#800080	>PURPLE</option>
						</select>
						</td>
						<td>Font</td><td>
						<select name="font4" >
							<option value="">Pilih...</option>
							<option style="color:#FFFFFF;" value=#FFFFFF	>WHITE</option>
							<option style="color:#C0C0C0;" value=#C0C0C0	>SILVER</option>
							<option style="color:#808080;" value=#808080	>GRAY</option>
							<option style="color:#000000;" value=#000000	>BLACK</option>
							<option style="color:#FF0000;" value=#FF0000	>RED</option>
							<option style="color:#800000;" value=#800000	>MAROON</option>
							<option style="color:#FFFF00;" value=#FFFF00	>YELLOW</option>
							<option style="color:#808000;" value=#808000	>OLIVE</option>
							<option style="color:#00FF00;" value=#00FF00	>LIME</option>
							<option style="color:#008000;" value=#008000	>GREEN</option>
							<option style="color:#00FFFF;" value=#00FFFF	>AQUA	</option>
							<option style="color: #008080;" value=#008080	>TEAL</option>
							<option style="color:#0000FF;" value=#0000FF	>BLUE	</option>
							<option style="color:#000080;" value=#000080	>NAVY</option>
							<option style="color:#FF00FF;" value=#FF00FF	>FUCHSIA</option>
							<option style="color:#800080;" value=#800080	>PURPLE</option>
						</select>
						</td>
					</tr>
					<tr><td>Harga</td><td>
						<select name="pricec" >
							<option value="">Pilih...</option>
							<option style="color:#FFFFFF;" value=#FFFFFF	>WHITE</option>
							<option style="color:#C0C0C0;" value=#C0C0C0	>SILVER</option>
							<option style="color:#808080;" value=#808080	>GRAY</option>
							<option style="color:#000000;" value=#000000	>BLACK</option>
							<option style="color:#FF0000;" value=#FF0000	>RED</option>
							<option style="color:#800000;" value=#800000	>MAROON</option>
							<option style="color:#FFFF00;" value=#FFFF00	>YELLOW</option>
							<option style="color:#808000;" value=#808000	>OLIVE</option>
							<option style="color:#00FF00;" value=#00FF00	>LIME</option>
							<option style="color:#008000;" value=#008000	>GREEN</option>
							<option style="color:#00FFFF;" value=#00FFFF	>AQUA	</option>
							<option style="color: #008080;" value=#008080	>TEAL</option>
							<option style="color:#0000FF;" value=#0000FF	>BLUE	</option>
							<option style="color:#000080;" value=#000080	>NAVY</option>
							<option style="color:#FF00FF;" value=#FF00FF	>FUCHSIA</option>
							<option style="color:#800080;" value=#800080	>PURPLE</option>
						</select>
						</td>
						<td>Font</td><td>
						<select name="font5" >
							<option value="">Pilih...</option>
							<option style="color:#FFFFFF;" value=#FFFFFF	>WHITE</option>
							<option style="color:#C0C0C0;" value=#C0C0C0	>SILVER</option>
							<option style="color:#808080;" value=#808080	>GRAY</option>
							<option style="color:#000000;" value=#000000	>BLACK</option>
							<option style="color:#FF0000;" value=#FF0000	>RED</option>
							<option style="color:#800000;" value=#800000	>MAROON</option>
							<option style="color:#FFFF00;" value=#FFFF00	>YELLOW</option>
							<option style="color:#808000;" value=#808000	>OLIVE</option>
							<option style="color:#00FF00;" value=#00FF00	>LIME</option>
							<option style="color:#008000;" value=#008000	>GREEN</option>
							<option style="color:#00FFFF;" value=#00FFFF	>AQUA	</option>
							<option style="color: #008080;" value=#008080	>TEAL</option>
							<option style="color:#0000FF;" value=#0000FF	>BLUE	</option>
							<option style="color:#000080;" value=#000080	>NAVY</option>
							<option style="color:#FF00FF;" value=#FF00FF	>FUCHSIA</option>
							<option style="color:#800080;" value=#800080	>PURPLE</option>
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
						<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [1]</td>
					</tr>
					<tr>
						<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
					</tr>
					<tr>
						<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
							<table class="tprintb">
								<tr><td>Username : <?php print_r($user1);?></td></tr>
								<tr><td>Password : <?php print_r($pass1);?></td></tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="text-align: center; color:<?php print_r($font4);?>; background-color:<?php print_r($details);?>">Aktif:<?php print_r($vprofname);?> <?php print_r($vtimelimit);?> <?php print_r($vbytelimit);?></td>
					</tr>
					<tr>
						<td style="text-align: center; color:<?php print_r($font5);?>; background-color:<?php print_r($price);?>">Harga : <?php print_r($vprice);?></td>
					</tr>
			</table>
			<br>
		</form>
			<table class="tnav">
				<tr>
					<td>
						<!--<button class="btnsubmit" onclick="window.open('./vouchers/printvs.php','_blank');">Cetak Vouchers</button>-->
					</td>
				</tr>
			</table>
</body>
</html>
