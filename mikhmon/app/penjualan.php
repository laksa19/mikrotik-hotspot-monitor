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

$idhr = $_GET['idhr'];
$idbl = $_GET['idbl'];
$remdata = ($_POST['remdata']);

if(isset($remdata)){
  if(strlen($idhr) > "0"){
	if ($API->connect( $iphost, $userhost, $passwdhost )) {
	  $API->write('/system/script/print', false);
	  $API->write('?source='.$idhr.'', false);
	  $API->write('=.proplist=.id');
	  $ARREMD = $API->read();
	  for ($i=0;$i<count($ARREMD);$i++) {
	  $API->write('/system/script/remove', false);
	  $API->write('=.id=' . $ARREMD[$i]['.id']);
	  $READ = $API->read();
	    header("Location:#");
	}
	}
  }elseif(strlen($idbl) > "0"){
  if ($API->connect( $iphost, $userhost, $passwdhost )) {
	  $API->write('/system/script/print', false);
	  $API->write('?owner='.$idbl.'', false);
	  $API->write('=.proplist=.id');
	  $ARREMD = $API->read();
	  for ($i=0;$i<count($ARREMD);$i++) {
	  $API->write('/system/script/remove', false);
	  $API->write('=.id=' . $ARREMD[$i]['.id']);
	  $READ = $API->read();
	    header("Location:#");
	}
	}
  
}}


if(strlen($idhr) > "0"){
  if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/system/script/print', false);
	$API->write('?=source='.$idhr.'');
	$ARRAY = $API->read();
	$API->disconnect();
  }
	$filedownload = $idhr;
	$shf = "hidden";
	$shd = "text";
}elseif(strlen($idbl) > "0"){
  if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/system/script/print', false);
	$API->write('?=owner='.$idbl.'');
	$ARRAY = $API->read();
	$API->disconnect();
  }
	$filedownload = $idbl;
	$shf = "hidden";
	$shd = "text";
}elseif($idhr == "" || $idbl == ""){
  if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/system/script/print', false);
	$API->write('?=comment=mikhmon');
	$ARRAY = $API->read();
	$API->disconnect();
}
$filedownload = "all";
$shf = "text";
$shd = "hidden";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Monitor</title>
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
			function downloadCSV(csv, filename) {
			  var csvFile;
			  var downloadLink;
			  // CSV file
			  csvFile = new Blob([csv], {type: "text/csv"});
			  // Download link
			  downloadLink = document.createElement("a");
			  // File name
			  downloadLink.download = filename;
			  // Create a link to the file
			  downloadLink.href = window.URL.createObjectURL(csvFile);
			  // Hide download link
			  downloadLink.style.display = "none";
			  // Add the link to DOM
			  document.body.appendChild(downloadLink);
			  // Click download link
			  downloadLink.click();
			  }
			  
			  function exportTableToCSV(filename) {
			    var csv = [];
			    var rows = document.querySelectorAll("#laporan tr");
			    
			   for (var i = 0; i < rows.length; i++) {
			      var row = [], cols = rows[i].querySelectorAll("td, th");
			   for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);
        csv.push(row.join(","));
        }
        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
        }
        
        window.onload=function() {
          var sum = 0;
          var dataTable = document.getElementById("laporan");
          
          // use querySelector to find all second table cells
          var cells = document.querySelectorAll("td + td + td + td");
          for (var i = 0; i < cells.length; i++)
          sum+=parseFloat(cells[i].firstChild.data);
          
          var th = document.getElementById('total');
          th.innerHTML = th.innerHTML + (sum) ;
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
			<td>Penjualan</td>
			<td>
				<button class="material-icons" onclick="Reload()" title="Reload">autorenew</button>
				
				<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
				<button class="material-icons" onclick="goBack()" title="Back">arrow_back</button>
			</td>
		</tr>
	</table>
		<div style="overflow-x:auto;">
		  <div>
		    <p>Bantuan
		      <ol>
		        <li>"CSV" berfungsi untuk mengunduh semua data penjualan.</li>
		        <li>Untuk mengunduh laporan penjualan per "Hari",<br> silahkan klik salah satu tanggal yang diinginkan (19/2018) kemudian klik "CSV".</li>
		        <li>Untuk mengunduh laporan penjualan per "Bulan",<br> silahkan klik salah satu tanggal yang diinginkan (jan/) kemudian klik "CSV".</li>
		      </lo>
		    </p>
		  </div>
		  <input style="float:left;" type="<?php echo $shf;?>" id="filterData" size="15" onkeyup="fTgl()" placeholder="Filter Tanggal" title="Filter tanggal penjualan">
		  <button class="btnsubmit" onclick="exportTableToCSV('laporan-mikhmon-<?php echo $filedownload;?>.csv')" title="Download laporan penjualan">CSV</button>
		  <button class="btnsubmit" onclick="location.href='./penjualan.php';" title="Reload semua data penjualan">ALL</button>
		  <input style="float:left;" type="<?php echo $shd;?>" name="remdata" class="btnsubmit" onclick="location.href='#remdata';" title="Hapus Data <?php echo $filedownload;?>" value="Hapus data <?php echo $filedownload;?>"><br>
			<table id="laporan" style="white-space: nowrap;" class="zebra" >
				<tr>
				  <th colspan=2 >Laporan Penjualan <?php echo $filedownload;?><b style="font-size:0;">,</b></th>
				  <th style="text-align:right;">Total</b></th>
				  <th style="text-align:right;" id="total"></th>
				</tr>
				<tr>
					<th >Tanggal</th>
					<th >Pukul</th>
					<th >User</th>
					<th style="text-align:right;">Harga</th>
				</tr>
				<?php
					$TotalReg = count($ARRAY);

						for ($i=0; $i<$TotalReg; $i++){
						  $regtable = $ARRAY[$i];
						  echo "<tr>";
							echo "<td>";
							$getname = explode("-|-",$regtable['name']);
							$getowner = $regtable['owner'];
							$tgl = $getname[0];
							$getdy = explode("/",$tgl);
							$m = $getdy[0];
							$dy = $getdy[1]."/".$getdy[2];
							echo "<a style='color:#000;' href=?idbl=".$getowner ." title='Filter penjualan bulan : ".$getowner."'>$m/</a><a style='color:#000;' href=?idhr=".$tgl ." title='Filter penjualan tangal : ".$tgl."'>$dy</a>";
							echo "</td>";
							echo "<td>";
							$ltime = $getname[1];
							echo $ltime;
							echo "</td>";
							echo "<td>";
							$username = $getname[2];
							echo $username;
							echo "</td>";
							echo "<td style='text-align:right;'>";
							$price = $getname[3];
							echo $price;
							echo "</td>";
							echo "</tr>";
							}
				?>
			</table>
		</div>
	</div>
	<div id="remdata" class="modal-window">
		  <div>
			<a style="font-wight:bold;"href="#" title="Close" class="modal-close">X</a>
			<h3>Peringatan</h3>
	<?php
	echo "<div style='overflow-x:auto;'>";
	echo "<p>Yakin akan menghapus data penjualan<br> $filedownload</p>";

	echo "<form autocomplete='off' method='post' action=''>";
	echo "<center>";
	echo "<input type='submit' name='remdata' title='Yes' class='btnsubmit' value='Yes'/>";
	echo "<a class='btnsubmit' href='#' title='No'>No</a>";
	echo "</center>";
	echo "</form>";
	
	echo "</div>";

  ?>
    </div>
	<script>
	function fTgl() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("filterData");
  filter = input.value.toUpperCase();
  table = document.getElementById("laporan");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
	</script>
	</body>
</html>
