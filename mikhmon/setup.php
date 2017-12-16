<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}
?>
<?php
include('./config.php');
?>
<?php
	if(isset($_POST['ipmik'])){
		$siphost = ($_POST['ipmik']);
		$ssshport = ($_POST['portmik']);
		$suserhost = ($_POST['usermik']);
		$spasswdhost = ($_POST['passmik']);
		$sprofile1 = ($_POST['prof1']);
		$sprofile2 = ($_POST['prof2']);
		$sprofile3 = ($_POST['prof3']);
		$sprofile4 = ($_POST['prof4']);
		$sprofile5 = ($_POST['prof5']);
		$sprofile6 = ($_POST['prof6']);
		$sprofile7 = ($_POST['prof7']);
		$sprofile8 = ($_POST['prof8']);
		$sprofile9 = ($_POST['prof9']);
		$sprofile10 = ($_POST['prof10']);
		$sprice1 = ($_POST['harga1']);
		$sprice2 = ($_POST['harga2']);
		$sprice3 = ($_POST['harga3']);
		$sprice4 = ($_POST['harga4']);
		$sprice5 = ($_POST['harga5']);
		$sprice6 = ($_POST['harga6']);
		$sprice7 = ($_POST['harga7']);
		$sprice8 = ($_POST['harga8']);
		$sprice9 = ($_POST['harga9']);
		$sprice10 = ($_POST['harga10']);
		$sserv1 = ($_POST['serv1']);
		$sserv2 = ($_POST['serv2']);
		$sserv3 = ($_POST['serv3']);
		$sserv4 = ($_POST['serv4']);
		$sserv5 = ($_POST['serv5']);
		$sserv6 = ($_POST['serv6']);
		$sspeed1 = ($_POST['trtx1']);
		$sspeed2 = ($_POST['trtx2']);
		$sspeed3 = ($_POST['trtx3']);
		$sspeed4 = ($_POST['trtx4']);
		$sspeed5 = ($_POST['trtx5']);
		$sspeed6 = ($_POST['trtx6']);
		$sheaderv = ($_POST['namahotspot']);
		$snotev = ($_POST['notev']);
		$sreloadindex = ($_POST['reloadindex']);
		$h="Jam";
		$d="Hari";
// Title Masa Aktif
		$active1 = ($_POST['active1']);
			if (substr($active1, -1) == "h"){
				$uactiv = substr($active1, 0,-1);
				$suactive1t = $uactiv ."". $h;
			}elseif (substr($active1, -1) == "d"){
				$uactiv = substr($active1, 0,-1);
				$suactive1t = $uactiv ."". $d;
			}
		$active2 = ($_POST['active2']);
			if (substr($active2, -1) == "h"){
				$uactiv = substr($active2, 0,-1);
				$suactive2t = $uactiv ."". $h;
			}elseif (substr($active2, -1) == "d"){
				$uactiv = substr($active2, 0,-1);
				$suactive2t = $uactiv ."". $d;
			}
		$active3 = ($_POST['active3']);
			if (substr($active3, -1) == "h"){
				$uactiv = substr($active3, 0,-1);
				$suactive3t = $uactiv ."". $h;
			}elseif (substr($active3, -1) == "d"){
				$uactiv = substr($active3, 0,-1);
				$suactive3t = $uactiv ."". $d;
			}
		$active4 = ($_POST['active4']);
			if (substr($active4, -1) == "h"){
				$uactiv = substr($active4, 0,-1);
				$suactive4t = $uactiv ."". $h;
			}elseif (substr($active4, -1) == "d"){
				$uactiv = substr($active4, 0,-1);
				$suactive4t = $uactiv ."". $d;
			}
		$active5 = ($_POST['active5']);
			if (substr($active5, -1) == "h"){
				$uactiv = substr($active5, 0,-1);
				$suactive5t = $uactiv ."". $h;
			}elseif (substr($active5, -1) == "d"){
				$uactiv = substr($active5, 0,-1);
				$suactive5t = $uactiv ."". $d;
			}
		$active6 = ($_POST['active6']);
			if (substr($active6, -1) == "h"){
				$uactiv = substr($active6, 0,-1);
				$suactive6t = $uactiv ."". $h;
			}elseif (substr($active6, -1) == "d"){
				$uactiv = substr($active6, 0,-1);
				$suactive6t = $uactiv ."". $d;
			}
		$active7 = ($_POST['active7']);
			if (substr($active7, -1) == "h"){
				$uactiv = substr($active7, 0,-1);
				$suactive7t = $uactiv ."". $h;
			}elseif (substr($active7, -1) == "d"){
				$uactiv = substr($active7, 0,-1);
				$suactive7t = $uactiv ."". $d;
			}
		$active8 = ($_POST['active8']);
			if (substr($active8, -1) == "h"){
				$uactiv = substr($active8, 0,-1);
				$suactive8t = $uactiv ."". $h;
			}elseif (substr($active8, -1) == "d"){
				$uactiv = substr($active8, 0,-1);
				$suactive8t = $uactiv ."". $d;
			}
		$active9 = ($_POST['active9']);
			if (substr($active9, -1) == "h"){
				$uactiv = substr($active9, 0,-1);
				$suactive9t = $uactiv ."". $h;
			}elseif (substr($active9, -1) == "d"){
				$uactiv = substr($active9, 0,-1);
				$suactive9t = $uactiv ."". $d;
			}
		$active10 = ($_POST['active10']);
			if (substr($active10, -1) == "h"){
				$uactiv = substr($active10, 0,-1);
				$suactive10t = $uactiv ."". $h;
			}elseif (substr($active10, -1) == "d"){
				$uactiv = substr($active10, 0,-1);
				$suactive10t = $uactiv ."". $d;
			}
// Title Durasi
		$tlimit1 = ($_POST['durasi1']);
			if (substr($tlimit1, -1) == "h"){
				$timel = substr($tlimit1, 0,-1);
				$stimelimit1t = $timel ."". $h;
			}elseif (substr($tlimit1, -1) == "d"){
				$timel = substr($tlimit1, 0,-1);
				$stimelimit1t = $timel ."". $d;
			}
		$tlimit2 = ($_POST['durasi2']);
			if (substr($tlimit2, -1) == "h"){
				$timel = substr($tlimit2, 0,-1);
				$stimelimit2t = $timel ."". $h;
			}elseif (substr($tlimit2, -1) == "d"){
				$timel = substr($tlimit2, 0,-1);
				$stimelimit2 = $timel ."". $d;
			}
		$tlimit3 = ($_POST['durasi3']);
			if (substr($tlimit3, -1) == "h"){
				$timel = substr($tlimit3, 0,-1);
				$stimelimit3t = $timel ."". $h;
			}elseif (substr($tlimit3, -1) == "d"){
				$timel = substr($tlimit3, 0,-1);
				$stimelimit3t = $timel ."". $d;
			}
		$tlimit4 = ($_POST['durasi4']);
			if (substr($tlimit4, -1) == "h"){
				$timel = substr($tlimit4, 0,-1);
				$stimelimit4t = $timel ."". $h;
			}elseif (substr($tlimit4, -1) == "d"){
				$timel = substr($tlimit4, 0,-1);
				$stimelimit4t = $timel ."". $d;
			}
		$tlimit5 = ($_POST['durasi5']);
			if (substr($tlimit5, -1) == "h"){
				$timel = substr($tlimit5, 0,-1);
				$stimelimit5t = $timel ."". $h;
			}elseif (substr($tlimit5, -1) == "d"){
				$timel = substr($tlimit5, 0,-1);
				$stimelimit5t = $timel ."". $d;
			}
// Kuota
		$MB="000000";
		$GB="000000000";
		$blimit1 = ($_POST['kuota1']);
			if (substr($blimit1, -2) == "MB"){
				$bytel = substr($blimit1, 0,-2);
				$bytelimit1 = $bytel."". $MB;
			}elseif (substr($blimit1, -2) == "GB"){
				$bytel = substr($blimit1, 0,-2);
				$bytelimit1 = $bytel ."". $GB;
			}
		$blimit2 = ($_POST['kuota2']);
			if (substr($blimit2, -2) == "MB"){
				$bytel = substr($blimit2, 0,-2);
				$bytelimit2 = $bytel."". $MB;
			}elseif (substr($blimit2, -2) == "GB"){
				$bytel = substr($blimit2, 0,-2);
				$bytelimit2 = $bytel ."". $GB;
			}
		$blimit3 = ($_POST['kuota3']);
			if (substr($blimit3, -2) == "MB"){
				$bytel = substr($blimit3, 0,-2);
				$bytelimit3 = $bytel."". $MB;
			}elseif (substr($blimit3, -2) == "GB"){
				$bytel = substr($blimit3, 0,-2);
				$bytelimit3 = $bytel ."". $GB;
			}
		$blimit4 = ($_POST['kuota4']);
			if (substr($blimit4, -2) == "MB"){
				$bytel = substr($blimit4, 0,-2);
				$bytelimit4 = $bytel."". $MB;
			}elseif (substr($blimit4, -2) == "GB"){
				$bytel = substr($blimit4, 0,-2);
				$bytelimit4 = $bytel ."". $GB;
			}
		$blimit5 = ($_POST['kuota5']);
			if (substr($blimit5, -2) == "MB"){
				$bytel = substr($blimit5, 0,-2);
				$bytelimit5 = $bytel."". $MB;
			}elseif (substr($blimit5, -2) == "GB"){
				$bytel = substr($blimit5, 0,-2);
				$bytelimit5 = $bytel ."". $GB;
			}
		$my_file = 'config.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $reloadindex="'.$sreloadindex.'"; $iphost="'.$siphost.'"; $sshport="'.$ssshport.'"; $userhost="'.$suserhost.'"; $passwdhost="'.$spasswdhost.'"; $profile1="'.$sprofile1.'"; $profile2="'.$sprofile2.'"; $profile3="'.$sprofile3.'"; $profile4="'.$sprofile4.'"; $profile5="'.$sprofile5.'"; $profile6="'.$sprofile6.'"; $profile7="'.$sprofile7.'"; $profile8="'.$sprofile8.'"; $profile9="'.$sprofile9.'"; $profile10="'.$sprofile10.'"; $uactive1="'.$active1.'"; $uactive2="'.$active2.'"; $uactive3="'.$active3.'"; $uactive4="'.$active4.'"; $uactive5="'.$active5.'"; $uactive6="'.$active6.'"; $uactive7="'.$active7.'"; $uactive8="'.$active8.'"; $uactive9="'.$active9.'"; $uactive10="'.$active10.'"; $vname1="'.$suactive1t.'"; $vname2="'.$suactive2t.'"; $vname3="'.$suactive3t.'"; $vname4="'.$suactive4t.'"; $vname5="'.$suactive5t.'"; $vname6="'.$suactive6t.'"; $vname7="'.$suactive7t.'"; $vname8="'.$suactive8t.'"; $vname9="'.$suactive9t.'"; $vname10="'.$suactive10t.'"; $utimelimit1="'.$tlimit1.'"; $utimelimit2="'.$tlimit2.'"; $utimelimit3="'.$tlimit3.'"; $utimelimit4="'.$tlimit4.'"; $utimelimit5="'.$tlimit5.'"; $utimelimit1t="'.$stimelimit1t.'"; $utimelimit2t="'.$stimelimit2t.'"; $utimelimit3t="'.$stimelimit3t.'"; $utimelimit4t="'.$stimelimit4t.'"; $utimelimit5t="'.$stimelimit5t.'"; $ubytelimit1="'.$bytelimit1.'"; $ubytelimit2="'.$bytelimit2.'"; $ubytelimit3="'.$bytelimit3.'"; $ubytelimit4="'.$bytelimit4.'"; $ubytelimit5="'.$bytelimit5.'"; $ubytelimit1t="'.$blimit1.'"; $ubytelimit2t="'.$blimit2.'"; $ubytelimit3t="'.$blimit3.'"; $ubytelimit4t="'.$blimit4.'"; $ubytelimit5t="'.$blimit5.'"; $price1="'.$sprice1.'"; $price2="'.$sprice2.'"; $price3="'.$sprice3.'"; $price4="'.$sprice4.'"; $price5="'.$sprice5.'"; $price6="'.$sprice6.'"; $price7="'.$sprice7.'"; $price8="'.$sprice8.'"; $price9="'.$sprice9.'"; $price10="'.$sprice10.'"; $server1="'.$sserv1.'"; $server2="'.$sserv2.'"; $server3="'.$sserv3.'"; $server4="'.$sserv4.'"; $server5="'.$sserv5.'"; $server6="'.$sserv6.'"; $speed1="'.$sspeed1.'"; $speed2="'.$sspeed2.'"; $speed3="'.$sspeed3.'"; $speed4="'.$sspeed4.'"; $speed5="'.$sspeed5.'"; $speed6="'.$sspeed6.'"; $headerv="'.$sheaderv.'"; $notev="'.$snotev.'"; ?>';
		fwrite($handle, $data);
		header('Location: setup.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Setup Mikrotik Hotspot Monitor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="favicon.ico" />
		<link rel="stylesheet" href="css/style.css" media="screen">
		<style>
table.tsetup { 
  margin-left:auto; 
  margin-right:auto;
  width: 100%; 
  border-collapse: collapse; 
}
table.tsetup th { 
  background: #008CCA; 
  color: white; 
  font-weight: bold;
  text-align: center;
}
table.tsetup td { 
  padding: 2px; 
  border: 1px solid #ccc; 
  text-align: center; 
}
		</style>
		<script>
			function Reload() {
				location.reload();
			}
		</script>
		<script>
		function resetConfig() {
		var txt;
		var r = confirm("Yakin akan me-reset config?\nUsername Password default\nusername : admin | password : 1234");
		if (r == true) {
			window.open("./resetconfig.php", "_self");
		} else {
			
		}
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
					<td>Konfigurasi</td>
					<td>
						<button class="material-icons" onclick="Reload()"	title="Reload">autorenew</button>
						<button class="material-icons"	onclick="location.href='logout.php';" 	title="Logout">lock</button>
						<button class="material-icons" onclick="resetConfig()" title="Reset Config">history</button>
						<button class="material-icons" onclick="location.href='conntest.php';" title="Tes Koneksi ke Mikrotik">settings_ethernet</button>
						<button class="material-icons"	onclick="location.href='./uprofileadd.php';"	title="User Profile">local_library</button>
						<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
						<button class="material-icons"	onclick="window.open('https://github.com/laksa19/mikrotik-hotspot-monitor','_blank');" 	title="Check Update">system_update_alt</button>
					</td>
				</tr>
			</table>
			<form autocomplete="off" method="post" action="">
				<table class="tsetup" align="center"  >
					<tr>
						<th>IP MIKROTIK</th>
						<th>PORT SSH</th>
						<th>AUTO RELOAD</th>
					</tr>
					<tr>
						<td><input type="text" size="16" maxlength="100" name="ipmik" placeholder="IP Mikrotik" value="<?php print_r($iphost);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="4" name="portmik" placeholder="SSH" value="<?php print_r($sshport);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="4" name="reloadindex" placeholder="Auto Reload Page" title="Reload otomatis laman index, dengan satuan detik" value="<?php print_r($reloadindex);?>" required="1"/></td>
					</tr>
				</table>
				<br>
				<table class="tsetup" align="center"  >
					<tr>
						<th>USER ADMIN</th>
						<th>PASSWORD</th>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="usermik" placeholder="User Mikrotik" value="<?php print_r($userhost);?>" required="1"/></td>
						<td><input type="password" size="15" maxlength="100" name="passmik" placeholder="Password Mikrotik" value="<?php print_r($passwdhost);?>" required="1"/></td>
					</tr>
				</table>
				<br>
				<table class="tsetup" align="center"  >
					<tr>
						<th colspan=2>USER PROFILE</th>
					</tr>
					<tr>
						<th>NAMA PROFILE</th>
						<th>MASA AKTIF</th>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="prof1" placeholder="Profile1" value="<?php print_r($profile1);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="3" name="active1" placeholder="Masa Aktif1" value="<?php print_r($uactive1);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="prof2" placeholder="Profile2" value="<?php print_r($profile2);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="3" name="active2" placeholder="Masa Aktif2" value="<?php print_r($uactive2);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="prof3" placeholder="Profile3" value="<?php print_r($profile3);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="3" name="active3" placeholder="Masa Aktif3" value="<?php print_r($uactive3);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="prof4" placeholder="Profile4" value="<?php print_r($profile4);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="3" name="active4" placeholder="Masa Aktif4" value="<?php print_r($uactive4);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="prof5" placeholder="Profile5" value="<?php print_r($profile5);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="3" name="active5" placeholder="Masa Aktif5" value="<?php print_r($uactive5);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="prof6" placeholder="Profile6" value="<?php print_r($profile6);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="3" name="active6" placeholder="Masa Aktif6" value="<?php print_r($uactive6);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="prof7" placeholder="Profile7" value="<?php print_r($profile7);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="3" name="active7" placeholder="Masa Aktif7" value="<?php print_r($uactive7);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="prof8" placeholder="Profile8" value="<?php print_r($profile8);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="3" name="active8" placeholder="Masa Aktif8" value="<?php print_r($uactive8);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="prof9" placeholder="Profile9" value="<?php print_r($profile9);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="3" name="active9" placeholder="Masa Aktif9" value="<?php print_r($uactive9);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="15" maxlength="20" name="prof10" placeholder="Profile10" value="<?php print_r($profile10);?>" required="1"/></td>
						<td><input type="text" size="3" maxlength="3" name="active10" placeholder="Masa Aktif10" value="<?php print_r($uactive10);?>" required="1"/></td>
					</tr>
					<tr>
						<td colspan=2>*Nama Profile dan Masa Aktif dibuat linier. Contoh: Profile 3Jam, Masa Aktif 3h (h=jam d=hari)</td>
					</tr>
				</table>
				<br>
				<table class="tsetup" align="center"  >
					<tr>
						<th>SERVER HOTSPOT</th>
						<th>RATE LIMIT UP/DOWN</th>
					</tr>
					<tr><td><input type="text" size="15" maxlength="20" name="serv1" placeholder="Server Hotspot1" value="<?php print_r($server1);?>" required="1"/></td>
					<td><input type="text" size="15" maxlength="20" name="trtx1" placeholder="Upload/Download1" value="<?php print_r($speed1);?>" required="1"/></td></tr>
					<tr><td><input type="text" size="15" maxlength="20" name="serv2" placeholder="Server Hotspot2" value="<?php print_r($server2);?>" required="1"/></td>
					<td><input type="text" size="15" maxlength="20" name="trtx2" placeholder="Upload/Download2" value="<?php print_r($speed2);?>" required="1"/></td></tr>
					<tr><td><input type="text" size="15" maxlength="20" name="serv3" placeholder="Server Hotspot3" value="<?php print_r($server3);?>" required="1"/></td>
					<td><input type="text" size="15"  axlength="20" name="trtx3" placeholder="Upload/Download3" value="<?php print_r($speed3);?>" required="1"/></td></tr>
					<tr><td><input type="text" size="15" maxlength="20" name="serv4" placeholder="Server Hotspot4" value="<?php print_r($server4);?>" required="1"/></td>
					<td><input type="text" size="15" maxlength="20" name="trtx4" placeholder="Upload/Download4" value="<?php print_r($speed4);?>" required="1"/></td></tr>
					<tr><td><input type="text" size="15" maxlength="20" name="serv5" placeholder="Server Hotspot5" value="<?php print_r($server5);?>" required="1"/></td>
					<td><input type="text" size="15" maxlength="20" name="trtx5" placeholder="Upload/Download5" value="<?php print_r($speed5);?>" required="1"/></td></tr>
					<tr><td><input type="text" size="15" maxlength="20" name="serv6" placeholder="Server Hotspot6" value="<?php print_r($server6);?>" required="1"/></td>
					<td><input type="text" size="15" maxlength="20" name="trtx6" placeholder="Upload/Download5" value="<?php print_r($speed6);?>" required="1"/></td></tr>
					</tr>
				</table>
				<br>
				<table class="tsetup" align="center"  >
					<tr>
						<th colspan=2>OPSIONAL</th>
					</tr>
					<tr>
						<th>DURASI</th>
						<th>Kuota</th>
					</tr>
					<tr>
						<td><input type="text" size="3" maxlength="3" name="durasi1" placeholder="Durasi1" value="<?php print_r($utimelimit1);?>" required="1"/></td>
						<td><input type="text" size="5" maxlength="5" name="kuota1" placeholder="Kuota1" value="<?php print_r($ubytelimit1t);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="3" maxlength="3" name="durasi2" placeholder="Durasi2" value="<?php print_r($utimelimit2);?>" required="1"/></td>
						<td><input type="text" size="5" maxlength="5" name="kuota2" placeholder="Kuota2" value="<?php print_r($ubytelimit2t);?>" required="1"/></td>
						
					</tr>
					<tr>
						<td><input type="text" size="3" maxlength="3" name="durasi3" placeholder="Durasi3" value="<?php print_r($utimelimit3);?>" required="1"/></td>
						<td><input type="text" size="5" maxlength="5" name="kuota3" placeholder="Kuota3" value="<?php print_r($ubytelimit3t);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="3" maxlength="3" name="durasi4" placeholder="Durasi4" value="<?php print_r($utimelimit4);?>" required="1"/></td>
						<td><input type="text" size="5" maxlength="5" name="kuota4" placeholder="Kuota4" value="<?php print_r($ubytelimit4t);?>" required="1"/></td>
					</tr>
					<tr>
						<td><input type="text" size="3" maxlength="3" name="durasi5" placeholder="Durasi5" value="<?php print_r($utimelimit5);?>" required="1"/></td>
						<td><input type="text" size="5" maxlength="5" name="kuota5" placeholder="Kuota5" value="<?php print_r($ubytelimit5t);?>" required="1"/></td>
					</tr>
					<tr>
						<td colspan=2>*Durasi dan Kuota adalah adalah opsi tambahan pada saat generate voucher. Satuan Durasi (h atau d), Satuan Kuota (MB atau GB)</td>
					</tr>
				</table>
				<br>
				<table class="tsetup" align="center"  >
					<tr>
						<th colspan=2 >HARGA VOUCHER</th>
					</tr>
					<tr><td><input type="text" size="15" maxlength="20" name="harga1" placeholder="Harga Voucher1" value="<?php print_r($price1);?>" required="1"/></td>
					<td><input type="text" size="15" maxlength="20" name="harga2" placeholder="Harga Voucher2" value="<?php print_r($price2);?>" required="1"/></td></tr>
					<tr><td><input type="text" size="15" maxlength="20" name="harga3" placeholder="Harga Voucher3" value="<?php print_r($price3);?>" required="1"/></td>
					<td><input type="text" size="15" maxlength="20" name="harga4" placeholder="Harga Voucher4" value="<?php print_r($price4);?>" required="1"/></td></tr>
					<tr><td><input type="text" size="15" maxlength="20" name="harga5" placeholder="Harga Voucher5" value="<?php print_r($price5);?>" required="1"/></td>
					<td><input type="text" size="15" maxlength="20" name="harga6" placeholder="Harga Voucher6" value="<?php print_r($price6);?>" required="1"/></td></tr>
					<tr><td><input type="text" size="15" maxlength="20" name="harga7" placeholder="Harga Voucher7" value="<?php print_r($price7);?>" required="1"/></td>
					<td><input type="text" size="15" maxlength="20" name="harga8" placeholder="Harga Voucher8" value="<?php print_r($price8);?>" required="1"/></td></tr>
					<tr><td><input type="text" size="15" maxlength="20" name="harga9" placeholder="Harga Voucher9" value="<?php print_r($price9);?>" required="1"/></td>
					<td><input type="text" size="15" maxlength="20" name="harga10" placeholder="Harga Voucher10" value="<?php print_r($price10);?>" required="1"/></td></tr>
					</tr>
				</table>
				<br>
				<table class="tsetup" align="center"  >
					<tr>
						<th>NAMA HOTSPOT</th>
					</tr>
					<tr><td><input type="text" size="30" maxlength="50" name="namahotspot" placeholder="Nama Hotspot" value="<?php print_r($headerv);?>" required="1"/></td></tr>
					</tr>
				</table>
				<br>
				<table class="tsetup" align="center"  >
					<tr>
						<th>VOUCHER NOTE</th>
					</tr>
					<tr><td><input type="text" size="30" maxlength="500" name="notev" placeholder="Catatan Voucher" value="<?php print_r($notev);?>" required="1"/></td></tr>
					</tr>
				</table>
				<table class="tnav">
					<tr><td><input type="submit" class="btnsubmit" value="Simpan"/></td></tr>
				</table>
			</form>
	</body>
</html>
