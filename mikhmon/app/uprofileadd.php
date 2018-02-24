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
	$ARRAY = $API->comm("/ip/hotspot/user/profile/print");
	$API->disconnect();
}
// Remove Profile
  $id = $_GET['id'];
	if(isset($id)){
	if ($API->connect( $iphost, $userhost, $passwdhost )) {
	  $API->comm("/ip/hotspot/user/profile/remove", array(
	    ".id"=> "$id",));
	    $API->disconnect();
	    header("Location:uprofileadd.php");
	}
	}
	// Get Profile
  $name = $_GET['name'];
	if(isset($name)){
	if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/ip/hotspot/user/profile/print', false);
	$API->write('?=name='.$name.'');
	$ARRAY1 = $API->read();
	$regtable = $ARRAY1[0];
	  $profn = $regtable['name'];
	  $sharedu = $regtable['shared-users'];
	  $ratel = $regtable['rate-limit'];
	  $modeexpu = $regtable['on-login'];
	  if(substr($modeexpu,0,9) == ":put rem;"){
							  $mdexpv = "rem";
							  $mdexpt = "Hapus";
							}elseif(substr($modeexpu,0,9) == ":put ntf;"){
							  $mdexpv = "ntf";
							  $mdexpt = "Notifikasi";
							}else{
							  $mdexpv = "0";
							  $mdexpt = "No Expired";
							}
	  $API->disconnect();
	}
	}
	//Update Profile
  if(isset($_POST['profupdate'])){
  $nsharuser=($_POST['nsharedu']);
	$nrxtx = ($_POST['nupdown']);
	$mode = ($_POST['expmodeu']);
	$tenggangu = ($_POST['tengremu']);
	$id = $_GET['idp'];
	
	if ($profn == $profile1){
				$exptime = $uactive1;
			}elseif ($profn == $profile2){
				$exptime = $uactive2;
			}elseif ($profn == $profile3){
				$exptime = $uactive3;
			}elseif ($profn == $profile4){
				$exptime = $uactive4;
			}elseif ($profn == $profile5){
				$exptime = $uactive5;
			}elseif ($profn == $profile6){
				$exptime = $uactive6;
			}elseif ($profn == $profile7){
				$exptime = $uactive7;
			}elseif ($profn == $profile8){
				$exptime = $uactive8;
			}elseif ($profn == $profile9){
				$exptime = $uactive9;
			}elseif ($profn == $profile10){
				$exptime = $uactive10;
			}elseif ($profn == $profile11){
				$exptime = $uactive11;
			}elseif ($profn == $profile12){
				$exptime = $uactive12;
			}elseif ($profn == $profile13){
				$exptime = $uactive13;
			}elseif ($profn == $profile14){
				$exptime = $uactive14;
			}elseif ($profn == $profile15){
				$exptime = $uactive15;
			}else {
				$exptime= "x";
			}
	$onlogin1 = ':put rem; {:local date [/system clock get date ];:local time [/system clock get time ];:local uptime (';
	$onlogin2 = ');[/system scheduler add disabled=no interval=$uptime name=$user on-event="[/ip hotspot active remove [find where user=$user]];[/ip hotspot user set limit-uptime=1s [find where name=$user]];[/sys sch re [find where name=$user]];[/sys script run [find where name=$user]];[/sys script re [find where name=$user]]" start-date=$date start-time=$time];[/system script add name=$user source=":local date [/system clock get date ];:local time [/system clock get time ];:local uptime (';
	$onlogin2a = ');[/system scheduler add disabled=no interval=\$uptime name=$user on-event= \":local date [/system clock get date ];:local time [/system clock get time ];[/ip hotspot user remove [find where name=$user]];[/ip hotspot active remove [find where user=$user]];[/sys sch re [find where name=$user]] start-date=\$date start-time=\$time]\"]"] }}';
	
	$onlogin3 = ':put ntf; {:local date [/system clock get date ];:local time [/system clock get time ];:local uptime (';
	$onlogin4 = ');[/system scheduler add disabled=no interval=$uptime name=$user on-event= "[/ip hotspot user set limit-uptime=1s [find where name=$user]];[/ip hotspot active remove [find where user=$user]];[/sys sch re [find where name=$user]]" start-date=$date start-time=$time]; }}';
	
	if($mode == "rem"){
			$onlogin = "$onlogin1$exptime$onlogin2$tenggangu$onlogin2a";
			}elseif($mode == "ntf"){
			$onlogin = "$onlogin3$exptime$onlogin4";
			}
	if ($API->connect( $iphost, $userhost, $passwdhost )) {
	  if($exptime == "x"){
	$arrID=$API->comm("/ip/hotspot/user/profile/getall",
						  array(
				  ".proplist"=> ".id",
				  "?name" => "$profn",
				  ));

			$API->comm("/ip/hotspot/user/profile/set",
				  array(
						  ".id" => $arrID[0][".id"],
						  /*"add-mac-cookie" => "yes",*/
						  "rate-limit" => "$nrxtx",
						  "shared-users" => "$nsharuser",
						 ));
	}else{
	  $arrID=$API->comm("/ip/hotspot/user/profile/getall",
						  array(
				  ".proplist"=> ".id",
				  "?name" => "$profn",
				  ));

			$API->comm("/ip/hotspot/user/profile/set",
				  array(
						  ".id" => $arrID[0][".id"],
						  /*"add-mac-cookie" => "yes",*/
						  "rate-limit" => "$nrxtx",
						  "shared-users" => "$nsharuser",
						  "on-login" => "$onlogin",
						 ));
	}
	}
	header("Location:uprofileadd.php#x");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot User Profile</title>
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
					<td style="text-align: center;" colspan=2>User Profile</td>
				</tr>
				<tr>
					<td colspan=2>
						<button class="material-icons" onclick="location.href='uprofileadd.php';" title="Reload">autorenew</button>
						<button class="material-icons"	onclick="location.href='./setup.php';" 	title="Edit Config">settings</button>
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
					<tr><td>Profile | Masa Aktif</td><td>:</td><td>
					  <input type="text" placeholder="Pilih / Manual" name="nama" required="1" list="profilename">
					  <datalist id="profilename">
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
						</datalist>
					</td></tr>
					<tr><td>Shared Users</td><td>:</td><td><input type="text" size="3" maxlength="3" name="sharedu" value="1" required="1"/></td></tr>
					<tr><td>Upload/Download</td><td>:</td><td><input type="text" size="12"  name="updown" placeholder="contoh:512k/1M" required="1"/></td></tr>
					<tr><td>Mode Expired</td><td>:</td><td>
						<select name="expmode" required="1">
							<option value="">Pilih...</option>
							<option value="rem">Hapus</option>
							<option value="ntf">Notifikasi</option>
							<option value="nul">No Expired</option>
						</select>
						</td>
						</tr>
						<tr><td>Tenggang Penghapusan</td><td>:</td><td>
						<select name="tengrem" required="1">
						  <option value="5m">5Menit</option>
						  <option value="10m">10Menit</option>
							<option value="15m">15Menit</option>
							<option value="30m">30Menit</option>
							<option value="1h">1Jam</option>
							<option value="2Jam">2Jam</option>
						</select>
						</td>
						</tr>
					<tr><td></td><td></td><td><input type="submit" class="btnsubmit" value="Simpan"/></td></tr>
				</table>
			</form>
<?php
	if(isset($_POST['nama'])){
			$profname = ($_POST['nama']);
			$uprofile = $profname;
			if ($uprofile == $profile1){
				$exptime = $uactive1;
			}elseif ($uprofile == $profile2){
				$exptime = $uactive2;
			}elseif ($uprofile == $profile3){
				$exptime = $uactive3;
			}elseif ($uprofile == $profile4){
				$exptime = $uactive4;
			}elseif ($uprofile == $profile5){
				$exptime = $uactive5;
			}elseif ($uprofile == $profile6){
				$exptime = $uactive6;
			}elseif ($uprofile == $profile7){
				$exptime = $uactive7;
			}elseif ($uprofile == $profile8){
				$exptime = $uactive8;
			}elseif ($uprofile == $profile9){
				$exptime = $uactive9;
			}elseif ($uprofile == $profile10){
				$exptime = $uactive10;
			}elseif ($uprofile == $profile11){
				$exptime = $uactive11;
			}elseif ($uprofile == $profile12){
				$exptime = $uactive12;
			}elseif ($uprofile == $profile13){
				$exptime = $uactive13;
			}elseif ($uprofile == $profile14){
				$exptime = $uactive14;
			}elseif ($uprofile == $profile15){
				$exptime = $uactive15;
			}else {
				$exptime = "";
			}
			//$exptime = ($_POST['aktif']);
			$sharuser=($_POST['sharedu']);
			$rxtx = ($_POST['updown']);
			$mode = ($_POST['expmode']);
			$tenggang = ($_POST['tengrem']);
			$onlogin1 = ':put rem; {:local date [/system clock get date ];:local time [/system clock get time ];:local uptime (';
			$onlogin2 = ');[/system scheduler add disabled=no interval=$uptime name=$user on-event="[/ip hotspot active remove [find where user=$user]];[/ip hotspot user set limit-uptime=1s [find where name=$user]];[/sys sch re [find where name=$user]];[/sys script run [find where name=$user]];[/sys script re [find where name=$user]]" start-date=$date start-time=$time];[/system script add name=$user source=":local date [/system clock get date ];:local time [/system clock get time ];:local uptime (';
			$onlogin2a = ');[/system scheduler add disabled=no interval=\$uptime name=$user on-event= \":local date [/system clock get date ];:local time [/system clock get time ];[/ip hotspot user remove [find where name=$user]];[/ip hotspot active remove [find where user=$user]];[/sys sch re [find where name=$user]] start-date=\$date start-time=\$time]\"]"] }}';
			$onlogin3 = ':put ntf; {:local date [/system clock get date ];:local time [/system clock get time ];:local uptime (';
			$onlogin4 = ');[/system scheduler add disabled=no interval=$uptime name=$user on-event= "[/ip hotspot user set limit-uptime=1s [find where name=$user]];[/ip hotspot active remove [find where user=$user]];[/sys sch re [find where name=$user]]" start-date=$date start-time=$time]; }}';
			if($mode == "rem"){
			$onlogin = "$onlogin1$exptime$onlogin2$tenggang$onlogin2a";
			}elseif($mode == "ntf"){
			$onlogin = "$onlogin3$exptime$onlogin4";
			}
			if ($API->connect($iphost, $userhost, $passwdhost)) {
			  if($exptime == ""){
			$API->comm("/ip/hotspot/user/profile/add", array(
			  
					  /*"add-mac-cookie" => "yes",*/
					  "name" => "$profname",
					  "rate-limit" => "$rxtx",
					  "shared-users" => "$sharuser",
					  "status-autorefresh" => "15",
					  "transparent-proxy" => "yes",
			));
			}else{
			 $API->comm("/ip/hotspot/user/profile/add", array(
			  		  /*"add-mac-cookie" => "yes",*/
					  "name" => "$profname",
					  "rate-limit" => "$rxtx",
					  "shared-users" => "$sharuser",
					  "status-autorefresh" => "15",
					  "transparent-proxy" => "yes",
					  "on-login" => "$onlogin",
			));
			}
			}
			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");
			$API->disconnect();
			}
?>
			<div>
				<table class="zebra" align="center"  >
					<tr>
				    <th style='text-align:center;'>X</th>
						<th >Name</th>
						<th >Shared Users</th>
						<th >Rate Limit</th>
						<th >Mode Expired</th>
					</tr>
					<?php
					$TotalReg = count($ARRAY);

						for ($i=0; $i<$TotalReg; $i++){
						  echo "<tr>";
							$regtable = $ARRAY[$i];
							echo "<td style='text-align:center;'><a style='color:#000;' href=?id=".$regtable['.id'] . ">X</a></td>";
							echo "<td><a style='color:#000;' title='Klik untuk edit Profile' href=?idp=".$regtable['.id']."&name=" . $regtable['name'] . "#edit-profile>". $regtable['name']. "</a></td>";
							//$regtable = $ARRAY[$i];echo "<td>" . $regtable['name'];echo "</td>";
							echo "<td>" . $regtable['shared-users'];echo "</td>";
							echo "<td>" . $regtable['rate-limit'];echo "</td>";
							echo "<td>";
							$modeexp = $regtable['on-login'];
							if(substr($modeexp,0,9) == ":put rem;"){
							  echo "Hapus";
							}elseif(substr($modeexp,0,9) == ":put ntf;"){
							  echo "Notifikasi";
							}else{
							  
							}
							  echo "</td> </tr>";
							}
					?>
				</table>
				<div>
				  <tr>
				    <td>
				      <p>Catatan:</p>
							<ol>
							  <li>Mode Expired "Hapus" akan  menampilkan notifikasi expired di laman login hotspot untuk user yang sudah habis masa aktifnya, dan  menghapus data user sesuai dengan tenggang penghapusan.</li>
							  <li>Mode Expired "Notifikasi" tdak akan menghapus data user, namun akan menampilkan notifikasi expired di laman login hotspot untuk user yang sudah habis masa aktifnya.<br>(Gunakan template hotspot3 dari Mikhmon atau template hospot yang menggunakan meode yang sama).</li>
							  <li>Profile yang bisa mengubah mode expired menjadi "Hapus" atau "Notifikasi" adalah profile yang terdaftar di laman Setup.</li>
								<li>Profile yang dibuat manual silahkan pilih "No Expired" pada kolom Mode Expired.</li>
								<li>Profile yang dibuat manual tidak akan bisa mengubah mode expired menjadi "Hapus" atau "Notifikasi".</li>
							</ol>
				    </td>
				  </tr>
				</div>
			</div>
			<div id="edit-profile" class="modal-window">
		  <div>
			<a style="font-wight:bold;"href="uprofileadd.php#x" title="Close" class="modal-close">X</a>
			<h3>Edit Profile</h3>
	<?php
	echo "<div style='overflow-x:auto;'>";
	echo "<form autocomplete='off' method='post' action=''>";
	echo "<table>";
	echo "	<tr>";
	echo "		<td >Profile</td>";
	echo "		<td >:</td>";
	echo "		<td>$profn</td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "		<td >Shared User</td>";
	echo "		<td >:</td>";
	echo "		<td ><input type='text' size='3' maxlength='3' name='nsharedu' value=$sharedu></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "		<td >Upload/Download</td>";
	echo "		<td >:</td>";
	echo "		<td ><input type='text' size='12'  name='nupdown' placeholder='contoh:512k/1M' value=$ratel ></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "		<td >Mode Expired</td>";
	echo "		<td >:</td>";
	echo "		<td >";
	echo "	  <select name='expmodeu' required='1'>";
	echo "						<option value='$mdexpv'>$mdexpt</option>";
	echo "						<option value='rem'>Hapus</option>";
	echo "						<option value='ntf'>Notifikasi</option>";
	echo "						<option value='nul'>No Expired</option>";
	echo "		</select>";
	echo "		</td >";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<tr>";
	echo "		<td >Tenggang Penghapusan</td>";
	echo "		<td >:</td>";
	echo "		<td >";
	echo "	  <select name='tengremu' required='1'>";
	echo "						<option value='5m'>5Menit</option>";
	echo "						<option value='10m'>10Menit</option>";
	echo "						<option value='15m'>15Menit</option>";
	echo "						<option value='30m'>30Menit</option>";
	echo "						<option value='1h'>1Jam</option>";
	echo "						<option value='2h'>2Jam</option>";
	echo "		</select>";
	echo "		</td >";
	echo "	</tr>";
	echo "	<tr>";
	echo "		<td ></td>";
	echo "		<td ></td>";
	echo "		<td ><input type='submit' name='profupdate' class='btnsubmit' value='Update'/></td>";
	echo "	</tr>";
	echo "</table>";
	echo "</form>";
	echo "</div>";
  ?>
    </div>
    </div>
		</div>
	</body>
</html>

