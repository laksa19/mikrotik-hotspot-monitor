<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}
?>
<?php
error_reporting(0);
require('./lib/api.php');
include('./config.php');

$oldbuild = 2024;
$build = file_get_contents('https://laksa19.github.io/download/build.txt');
				$getbuild = explode("\n",$build);
				$newbuild = $getbuild[0];
				
if ($reloadindex == ""){ 
} else
header("Refresh: $reloadindex ; url='./'");
$API = new RouterosAPI();
$API->debug = false;
if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$ARRAY = $API->comm("/ip/hotspot/active/print");

	$ARRAY1 = $API->comm("/system/schedule/print");

	$API->write('/ip/hotspot/active/print', false);
	$API->write('=count-only=', false);
	$API->write('~active-address~"1.1."');
	$ARRAY2 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile1.'');
	$ARRAY3 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile2.'');
	$ARRAY4 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile3.'');
	$ARRAY5 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile4.'');
	$ARRAY6 = $API->read();
	
	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile5.'');
	$ARRAY7 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile6.'');
	$ARRAY8 = $API->read();
	
	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile7.'');
	$ARRAY9 = $API->read();
	
	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile8.'');
	$ARRAY10 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile9.'');
	$ARRAY11 = $API->read();

	$API->write('/ip/hotspot/user/print', false);
	$API->write('=count-only=', false);
	$API->write('?=profile='.$profile10.'');
	$ARRAY12 = $API->read();

	$ARRAY13 = $API->comm("/system/clock/print");
	$ARRAY14 = $API->comm("/system/resource/print");
	
    $API->disconnect();
    
	$a=array($ARRAY3,$ARRAY4,$ARRAY5,$ARRAY6,$ARRAY7,$ARRAY8,$ARRAY9,$ARRAY10,$ARRAY11,$ARRAY12);
	$aa = array_sum($a);
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
						<button class="material-icons"	onclick="location.href='logout.php';" 	title="Logout">lock</button>
						<button class="material-icons"	onclick="location.href='./setup.php';" 	title="Edit Config">settings</button>
						<button class="material-icons"	onclick="location.href='./hotspotlog.php';" 	title="Log Hotspot">subject</button>
						<button class="material-icons" onclick="location.href='./dnsstaticadd.php';" title="Add DNS Static">cloud_queue</button>
						<button class="material-icons"	onclick="location.href='./uprofileadd.php';"	title="User Profile">local_library</button>
						<div class="dropdown" style="float:right;">
							<button class="material-icons">local_play</button>
								<div class="dropdown-content">
									<a class="material-icons" href="#">local_play</a>
									<a href="genkv.php">1 Voucher</a>
									<a href="genkvs.php">1-99 Voucher</a>
									<a href="genupm.php">1 Custom User Pass</a>
								</div>
						</div>
						<button class="material-icons"	onclick="location.href='../status';"	title="Status User">account_box</button>
						<button class="material-icons"	onclick="location.href='#cek-update';"	title="Cek Update">system_update_alt</button>
						<!-- -->
					</td>
				</tr>
				<tr>
				<td colspan=2>Mikrotik System Date : 
				
							<?php
								$regtable = $ARRAY13[0]; echo " " . $regtable['date']; echo " " . $regtable['time'] . "<br />"; echo "</td>";
								$timemk = ($ARRAY13[0]['time']);
								if($timemk == ""){
								?><meta http-equiv="refresh" content="0; url=logout.php"><?php
								}
							?>
				</tr>
				<td>
							<?php
									$regtable = $ARRAY14[0];echo "" . $regtable['board-name'] . " ";
									$regtable = $ARRAY14[0];echo "" . $regtable['version'] . "";
									echo "</td>";
							?>
				<td style="text-align:right;"><?php if($newbuild > $oldbuild){echo "<i style='color:red;'>New update! | Build : $newbuild</i><br>";}else{echo "Mikhmon Build : $oldbuild";} ?></td>
				</tr>
			</table>
			<table class="tnav">
				<tr>
					<td><p>Sisa Voucher Aktif : <?php	echo $aa;	?></p></td>
					<td style="text-align: right;"><?php print_r($_SESSION['usermikhmon']);?></td>
				</tr>
			</table>
			
			<?php if ($profile1 == ""){
			}elseif ($profile2 == ""){
				echo "<div style='overflow-x:auto;'>";
				echo "<table class='tprinta' >";
				echo "	<tr>";
				echo "	<th><a href='userlist/userlist1.php'>$profile1</a></th>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>$ARRAY3</td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";
				echo"<br>";
			}elseif ($profile3 == ""){
				echo "<div style='overflow-x:auto;'>";
				echo "<table class='tprinta' >";
				echo "	<tr>";
				echo "	<th><a href='userlist/userlist1.php'>$profile1</a></th>";
				echo "	<th><a href='userlist/userlist2.php'>$profile2</a></th>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>$ARRAY3</td>";
				echo "	<td>$ARRAY4</td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";
				echo"<br>";
			}elseif ($profile4 == ""){
				echo "<div style='overflow-x:auto;'>";
				echo "<table class='tprinta' >";
				echo "	<tr>";
				echo "	<th><a href='userlist/userlist1.php'>$profile1</a></th>";
				echo "	<th><a href='userlist/userlist2.php'>$profile2</a></th>";
				echo "	<th><a href='userlist/userlist3.php'>$profile3</a></th>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>$ARRAY3</td>";
				echo "	<td>$ARRAY4</td>";
				echo "	<td>$ARRAY5</td>";
				echo "</tr>";
				echo "</table>";
			echo "</div>";
			echo"<br>";
			}elseif ($profile5 == ""){
				echo "<div style='overflow-x:auto;'>";
				echo "<table class='tprinta' >";
				echo "	<tr>";
				echo "	<th><a href='userlist/userlist1.php'>$profile1</a></th>";
				echo "	<th><a href='userlist/userlist2.php'>$profile2</a></th>";
				echo "	<th><a href='userlist/userlist3.php'>$profile3</a></th>";
				echo "	<th><a href='userlist/userlist4.php'>$profile4</a></th>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>$ARRAY3</td>";
				echo "	<td>$ARRAY4</td>";
				echo "	<td>$ARRAY5</td>";
				echo "	<td>$ARRAY6</td>";
				echo "</tr>";
				echo "</table>";
			echo "</div>";
			echo"<br>";
		}else{
			echo "<div style='overflow-x:auto;'>";
			echo "<table class='tprinta' >";
				echo "	<tr>";
				echo "	<th><a href='userlist/userlist1.php'>$profile1</a></th>";
				echo "	<th><a href='userlist/userlist2.php'>$profile2</a></th>";
				echo "	<th><a href='userlist/userlist3.php'>$profile3</a></th>";
				echo "	<th><a href='userlist/userlist4.php'>$profile4</a></th>";
				echo "	<th><a href='userlist/userlist5.php'>$profile5</a></th>";
				echo "</tr>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>$ARRAY3</td>";
				echo "	<td>$ARRAY4</td>";
				echo "	<td>$ARRAY5</td>";
				echo "	<td>$ARRAY6</td>";
				echo "	<td>$ARRAY7</td>";
				echo "</tr>";
			echo "</table>";
			echo "</div>";
			echo"<br>";
				}
			?>
			
			<?php if ($profile6 == ""){
			}elseif ($profile7 == ""){
				echo "<div style='overflow-x:auto;'>";
				echo "<table class='tprinta' >";
				echo "	<tr>";
				echo "	<th><a href='userlist/userlist6.php'>$profile6</a></th>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>$ARRAY8</td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";
			}elseif ($profile8 == ""){
				echo "<div style='overflow-x:auto;'>";
				echo "<table class='tprinta' >";
				echo "	<tr>";
				echo "	<th><a href='userlist/userlist6.php'>$profile6</a></th>";
				echo "	<th><a href='userlist/userlist7.php'>$profile7</a></th>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>$ARRAY8</td>";
				echo "	<td>$ARRAY9</td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";
			}elseif ($profile9 == ""){
				echo "<div style='overflow-x:auto;'>";
				echo "<table class='tprinta' >";
				echo "	<tr>";
				echo "	<th><a href='userlist/userlist6.php'>$profile6</a></th>";
				echo "	<th><a href='userlist/userlist7.php'>$profile7</a></th>";
				echo "	<th><a href='userlist/userlist8.php'>$profile8</a></th>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>$ARRAY8</td>";
				echo "	<td>$ARRAY9</td>";
				echo "	<td>$ARRAY10</td>";
				echo "</tr>";
				echo "</table>";
			echo "</div>";
			}elseif ($profile10 == ""){
				echo "<div style='overflow-x:auto;'>";
				echo "<table class='tprinta' >";
				echo "	<tr>";
				echo "	<th><a href='userlist/userlist6.php'>$profile6</a></th>";
				echo "	<th><a href='userlist/userlist7.php'>$profile7</a></th>";
				echo "	<th><a href='userlist/userlist8.php'>$profile8</a></th>";
				echo "	<th><a href='userlist/userlist9.php'>$profile9</a></th>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>$ARRAY8</td>";
				echo "	<td>$ARRAY9</td>";
				echo "	<td>$ARRAY10</td>";
				echo "	<td>$ARRAY11</td>";
				echo "</tr>";
				echo "</table>";
			echo "</div>";
		}else{
			echo "<div style='overflow-x:auto;'>";
			echo "<table class='tprinta' >";
				echo "	<tr>";
				echo "	<th><a href='userlist/userlist6.php'>$profile6</a></th>";
				echo "	<th><a href='userlist/userlist7.php'>$profile7</a></th>";
				echo "	<th><a href='userlist/userlist8.php'>$profile8</a></th>";
				echo "	<th><a href='userlist/userlist9.php'>$profile9</a></th>";
				echo "	<th><a href='userlist/userlist10.php'>$profile10</a></th>";
				echo "</tr>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>$ARRAY8</td>";
				echo "	<td>$ARRAY9</td>";
				echo "	<td>$ARRAY10</td>";
				echo "	<td>$ARRAY11</td>";
				echo "	<td>$ARRAY12</td>";
				echo "</tr>";
			echo "</table>";
			echo "</div>";
				}
			?>
			<div class="tab">
				<button class="tablinks" onclick="openTab(event, 'UA')" id="defaultOpen">User Aktif</button>
				<button class="tablinks" onclick="openTab(event, 'MA')">Masa Aktif</button>
			</div>
			<div id="UA" class="tabcontent">
			<table class="tnav">
				<tr>
					<td><p>User Aktif : <?php print_r($ARRAY2);?></p></td>
				</tr>
			</table>
			<div style="overflow-x:auto;">
			<table style="white-space: nowrap;" class="zebra" >
				<tr>
					<th >User</th>
					<th >Server</th>
					<th >IP</th>
					<th >Uptime</th>
					</tr>
							<?php
								$TotalReg = count($ARRAY);

										for ($i=0; $i<$TotalReg; $i++){
										$regtable = $ARRAY[$i];echo "<tr><td>" . $regtable['user'];echo "</td>";
										$regtable = $ARRAY[$i];echo "<td>" . $regtable['server'];echo "</td>";
										$regtable = $ARRAY[$i];echo "<td>" . $regtable['address'];echo "</td>";
										$regtable = $ARRAY[$i];echo "<td>" . $regtable['uptime'];echo "</td></tr>";
										}
							?>
			</table>
			</div>
		</div>
		<div id="MA" class="tabcontent">
			<table class="tnav">
				<tr>
					<td colspan=2><p>Masa Aktif User</p></td>
					<td><button style="background-color: #008CCA;  border: none;  padding: 5px 5px;  color: white;  font-weight: bold;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 14px;  cursor: pointer;  margin: 2px 2px;  border-radius: 5px;  float: right;"	onclick="location.href='./history.php';" 	title="History Remove User">History</button></td>
				</tr>
			</table>
			<div style="overflow-x:auto;">
			<table class="zebra" >
				<tr>
					<th >User</th>
					<th >Aktif</th>
					<th >Berakhir</th>
				</tr>
							<?php
								$TotalReg = count($ARRAY1);

										for ($i=0; $i<$TotalReg; $i++){
										$regtable = $ARRAY1[$i];echo "<tr><td>" . $regtable['name'];echo "</td>";
										$regtable = $ARRAY1[$i];
										$cek = $regtable['interval'];
													$ceklen = strlen(substr($cek,0));
													$cekw = substr($cek, 0,2);
													$cekw1 = substr($cekw, 0,1) ."Minggu";
													$cekd = substr($cek, 2,2);
													$cekd1 = substr($cek, 2,1) ."Hari";
												if ($ceklen > 2){
													$cekall = $cekw1 ." ".$cekd1; 
												}elseif (substr($cek, -1) == "h"){
													$cek1 = substr($cek, 0,-1);
													$cekall = $cek1 ." Jam";
												}elseif (substr($cek, -1) == "d"){
													$cek1 = substr($cek, 0,-1);
													$cekall = $cek1 ."Hari";
												}elseif (substr($cek, -1) == "w"){
													$cek1 = substr($cek, 0,-1);
													$cekall = $cek1 ."Minggu";
												}

										echo "<td>" . $cekall;echo "</td>";
										$regtable = $ARRAY1[$i];echo "<td>" . $regtable['next-run'];echo "</td> </tr>";
										}
							?>
			</table>
			</div>
		</div>
	</div>
	<div id="cek-update" class="modal-window">
		<div>
			<a href="#close" title="Close" class="modal-close">Close</a>
			<h1>Mikhmon Update</h1>
			<?php
				if($newbuild > $oldbuild){
					echo "New update! | Build : $newbuild<br>";
				for ($i=1;$i<count($getbuild);$i++) {
					echo $getbuild[$i].'<br> ';
					}
					}else{
					echo "Build : $oldbuild | no update yet.<br>";
				for ($i=1;$i<count($getbuild);$i++) {
					echo $getbuild[$i].'<br> ';
					}
				}
			?>
			<div>
				+++++++++++++++++++<br>
				Cara update :
				<ol>
				<li><a href="https://laksa19.github.io/download/update.zip" target="_blank">Download update.zip.</a></li>
				<li>Extract update.zip.</li>
				<li>Copy folder app dan status.</li>
				<li>Paste di folder mikhmon,timpa saja folder yang lama.</li>
				</ol>
			</div>
    </div>
	</div>
	<script>
	function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<?php

function formatBytes($bytes, $precision = 2) { 
$units = array('B', 'KB', 'MB', 'GB', 'TB'); 

$bytes = max($bytes, 0); 
$pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
$pow = min($pow, count($units) - 1); 

// Uncomment one of the following alternatives
// $bytes /= pow(1024, $pow);
// $bytes /= (1 << (10 * $pow)); 

return round($bytes, $precision) . ' ' . $units[$pow]; 
} 

function formatBytes2($size, $decimals = 0){
$unit = array(
'0' => 'Byte',
'1' => 'KiB',
'2' => 'MiB',
'3' => 'GiB',
'4' => 'TiB',
'5' => 'PiB',
'6' => 'EiB',
'7' => 'ZiB',
'8' => 'YiB'
);

for($i = 0; $size >= 1024 && $i <= count($unit); $i++){
$size = $size/1024;
}

return round($size, $decimals).' '.$unit[$i];
}

?>

	</body>
</html>

