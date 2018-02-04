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

if($_SESSION['usermikhmon'] == ""){
		echo "<meta http-equiv='refresh' content='0;url=logout.php' />";
		exit();
	}


?>
<?php
error_reporting(0);
copy("http://laksa.mooo.com/ota-update/app/build.txt","build.txt");
copy("http://laksa.mooo.com/ota-update/app/otaupdate.dat","otaupdate.php");
$build = file_get_contents('build.txt');
				$getbuild = explode("\n",$build);
				$newbuild = $getbuild[0];
// server
$srcpath1 ="http://laksa.mooo.com/ota-update/app/";
$srcpath2 ="http://laksa.mooo.com/ota-update/status/";
// local
$dstpath2 ="./css/";
$dstpath3 ="./vouchers/";
$dstpath4 ="../status/";
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
$srcpath1."remuserl.dat",
$srcpath1."userlist.dat",
$srcpath1."otaupdate.dat",
$srcpath1."style.css",
$srcpath1."vcolors.dat",
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
"./remuserl.php",
"./userlist.php",
"./otaupdate.php",
// path2
$dstpath2."style.css",
$dstpath2."vcolors.php",
// path3
$dstpath3."printkvs.php",
$dstpath3."printkvsqr.php",
$dstpath3."printvs.php",
$dstpath3."printvsqr.php",
// final
"./index.php",
// path4
$dstpath4."index.php"
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
