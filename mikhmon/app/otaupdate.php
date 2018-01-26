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
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}
?>
<?php
error_reporting(0);

$build = file_get_contents('build.txt');
				$getbuild = explode("\n",$build);
				$newbuild = $getbuild[0];
// server
$srcpath ="http://laksa.mooo.com/ota-update/app/";
// local
$dstpath2 ="./css/";
$dstpath3 ="./userlist/";
$dstpath4 ="./vouchers/";
//array server
$src = array ('1'=>
$srcpath."conntest.dat",
$srcpath."dnsstaticadd.dat",
$srcpath."dnsstaticrm.dat",
$srcpath."genkv.dat",
$srcpath."genkvs.dat",
$srcpath."genupm.dat",
$srcpath."history.dat",
$srcpath."hotspotlog.dat",
$srcpath."login.dat",
$srcpath."logout.dat",
$srcpath."reboot.dat",
$srcpath."remuser.dat",
$srcpath."resetcolor.dat",
$srcpath."resetconfig.dat",
$srcpath."setup.dat",
$srcpath."uprofileadd.dat",
$srcpath."uprofilerm.dat",
$srcpath."uprofileset.dat",
$srcpath."vcolorconf.dat",
$srcpath."ota.dat",
$srcpath."style.css",
$srcpath."vcolors.dat",
$srcpath."remuserl.dat",
$srcpath."userlist1.dat",
$srcpath."userlist2.dat",
$srcpath."userlist3.dat",
$srcpath."userlist4.dat",
$srcpath."userlist5.dat",
$srcpath."userlist6.dat",
$srcpath."userlist7.dat",
$srcpath."userlist8.dat",
$srcpath."userlist9.dat",
$srcpath."userlist10.dat",
$srcpath."userlist11.dat",
$srcpath."userlist12.dat",
$srcpath."userlist13.dat",
$srcpath."userlist14.dat",
$srcpath."userlist15.dat",
$srcpath."printkvs.dat",
$srcpath."printkvsqr.dat",
$srcpath."printvs.dat",
$srcpath."printvsqr.dat",
$srcpath."index.dat"
);
// array local
$dst = array ('1'=>
"./conntest.php",
"./dnsstaticadd.php",
"./dnsstaticrm.php",
"./genkv.php",
"./genkvs.php",
"./genupm.php",
"./history.php",
"./hotspotlog.php",
"./login.php",
"./logout.php",
"./reboot.php",
"./remuser.php",
"./resetcolor.php",
"./resetconfig.php",
"./setup.php",
"./uprofileadd.php",
"./uprofilerm.php",
"./uprofileset.php",
"./vcolorconf.php",
"./ota.php",
// path2
$dstpath2."style.css",
$dstpath2."vcolors.php",
// path3
$dstpath3."remuserl.php",
$dstpath3."userlist1.php",
$dstpath3."userlist2.php",
$dstpath3."userlist3.php",
$dstpath3."userlist4.php",
$dstpath3."userlist5.php",
$dstpath3."userlist6.php",
$dstpath3."userlist7.php",
$dstpath3."userlist8.php",
$dstpath3."userlist9.php",
$dstpath3."userlist10.php",
$dstpath3."userlist11.php",
$dstpath3."userlist12.php",
$dstpath3."userlist13.php",
$dstpath3."userlist14.php",
$dstpath3."userlist15.php",
// path4
$dstpath4."printkvs.php",
$dstpath4."printkvsqr.php",
$dstpath4."printvs.php",
$dstpath4."printvsqr.php",
// final
"./index.php"
);
if(isset($_POST['btnupdate'])){
  for ($i = 1; $i <= count($src); $i++) {
	copy($src[$i],$dst[$i]);
    }
  /*for ($i = 1; $i <= count($src); $i++) {
  if(!file_exists($src[$i])) {
  die("OTA Update gagal, file tidak ditemukan!");
  }
  }*/
  header("Location:./");
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
		<link rel="icon" href="img/favicon.png" />
		<link rel="stylesheet" href="css/style.css" media="screen">
		<script>
			function Reload() {
				location.reload();
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
					<td colspan=2>
						<button class="material-icons" onclick="Reload()"	title="Reload">autorenew</button>
						<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
					</td>
				</tr>
      </table>
      <div style='padding:10px;'>
        <h3 style="text-align:center;">Mikhmon OTA Update<br>
        <form  method="post"><input type="submit" name="btnupdate" class="btnsubmit"	title="OTA Update" value="Update Mikhmon"></form>
        </h3>
        <br>
			<?php
					echo "<b style='font-size:16px;'>Changelog | Build : $newbuild</b><br>";
				for ($i=1;$i<count($getbuild);$i++) {
					echo  $getbuild[$i].'<br> ';
					}
			?>
    </div>
    </div>
  </body>
</html>
