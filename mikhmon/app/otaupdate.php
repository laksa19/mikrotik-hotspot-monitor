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
$srcpath1 ="http://laksa.mooo.com/ota-update/app/";
$srcpath2 ="http://laksa.mooo.com/ota-update/status/";
// local
$dstpath2 ="./css/";
$dstpath3 ="./userlist/";
$dstpath4 ="./vouchers/";
$dstpath5 ="../status/";
//array server
$src = array ('1'=>
// path1
$srcpath1."conntest.dat",
$srcpath1."dnsstaticadd.dat",
$srcpath1."dnsstaticrm.dat",
$srcpath1."genkv.dat",
$srcpath1."genkvs.dat",
$srcpath1."genupm.dat",
$srcpath1."history.dat",
$srcpath1."hotspotlog.dat",
$srcpath1."login.dat",
$srcpath1."logout.dat",
$srcpath1."reboot.dat",
$srcpath1."remuser.dat",
$srcpath1."resetcolor.dat",
$srcpath1."resetconfig.dat",
$srcpath1."setup.dat",
$srcpath1."uprofileadd.dat",
$srcpath1."uprofilerm.dat",
$srcpath1."uprofileset.dat",
$srcpath1."vcolorconf.dat",
$srcpath1."otaupdate.dat",
$srcpath1."style.css",
$srcpath1."vcolors.dat",
$srcpath1."remuserl.dat",
$srcpath1."userlist1.dat",
$srcpath1."userlist2.dat",
$srcpath1."userlist3.dat",
$srcpath1."userlist4.dat",
$srcpath1."userlist5.dat",
$srcpath1."userlist6.dat",
$srcpath1."userlist7.dat",
$srcpath1."userlist8.dat",
$srcpath1."userlist9.dat",
$srcpath1."userlist10.dat",
$srcpath1."userlist11.dat",
$srcpath1."userlist12.dat",
$srcpath1."userlist13.dat",
$srcpath1."userlist14.dat",
$srcpath1."userlist15.dat",
$srcpath1."printkvs.dat",
$srcpath1."printkvsqr.dat",
$srcpath1."printvs.dat",
$srcpath1."printvsqr.dat",
$srcpath1."index.dat",
// path2
$srcpath2."index.dat"
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
"./otaupdate.php",
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
"./index.php",
// path5
$dstpath5."index.php"
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
					echo "<p><b style='font-size:16px;'>Changelog | Build : $newbuild</b></p>";
				for ($i=1;$i<count($getbuild);$i++) {
					echo  $getbuild[$i].'<br> ';
					}
			?>
    </div>
    <div style='padding:10px;'>
				<h3>Update Manual</h3>
				<ol>
				<li>Download <a style="color:#000;" title="Download update.zip" href="https://laksa19.github.io/download/update.zip" target="_blank">update.zip</a></li>
				<li>Extract update.zip.</li>
				<li>Copy folder mikhmon.</li>
				<li>Paste folder root webserver, timpa folder mikhmon yang lama.</li>
				</ol>
			</div>
    </div>
  </body>
</html>
