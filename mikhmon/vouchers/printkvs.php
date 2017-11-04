<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}
?>
<?php
include('../config.php');
include('./kvouchers.php');
include('../css/vcolors.php');

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

<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Monitor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<link rel="icon" href="../favicon.ico" />
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
		</style>
	</head>
	<body>
		<table class="tprint">
			<tr> <!--baris 1 -->
				<td>
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
									<tr><td>Kode Voucher : <?php print_r($user1);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [2]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user2);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [3]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user3);?></td></tr>
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
				</td>
			</tr>
			<tr> <!--baris 2 -->
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [4]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user4);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [5]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user5);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [6]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user6);?></td></tr>
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
				</td>
			</tr>
			<tr> <!--baris 3 -->
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [7]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user7);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [8]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user8);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [9]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user9);?></td></tr>
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
				</td>
			</tr>
			<tr> <!--baris 4 -->
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [10]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user10);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [11]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user11);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [12]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user12);?></td></tr>
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
				</td>
			</tr>
			<tr> <!--baris 5 -->
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [13]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user13);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [14]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user14);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [15]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user15);?></td></tr>
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
				</td>
			</tr>
			<tr> <!--baris 6 -->
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [16]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user16);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [17]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user17);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [18]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user18);?></td></tr>
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
				</td>
			</tr>
			<tr> <!--baris 7 -->
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [19]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user19);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [20]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user20);?></td></tr>
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
				</td>
				<td>
					<table class="tprinta">
						<tr>
							<td style="text-align: right; color:<?php print_r($font1);?>; background-color:<?php print_r($header);?>"><?php print_r($headerv);?>  [21]</td>
						</tr>
						<tr>
							<td style="font-size: 12px; color:<?php print_r($font2);?>; background-color:<?php print_r($note);?>"><?php print_r($notev);?> </td>
						</tr>
						<tr>
							<td style="color:<?php print_r($font3);?>; background-color:<?php print_r($userpass);?>">
								<table class="tprintb">
									<tr><td>Kode Voucher : <?php print_r($user21);?></td></tr>
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
				</td>
			</tr>
		</table>
	</body>
