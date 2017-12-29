<?php
error_reporting(0);
require('./api.php');
include('./config.php');
$API = new RouterosAPI();
$API->debug = false;

?>
<!DOCTYPE html>
<html>
<head>
<title>Cek Masa Aktif Voucher <?php print_r($headerv);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
<link rel="icon" href="../app/img/favicon.png" />
<script>
function goBack() {
    window.history.back();
}
</script>
<style>
table { 
  table-layout: fixed;
  width: 330; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
.button {
    background-color: #008CCA;
    border: none;
    padding: 5px 5px;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    cursor: pointer;
    border-radius: 5px;
}
table.tnav { 
  table-layout: fixed;
  white-space: nowrap;
  width: 200; 
  border-collapse: collapse; 
  
}
table.tnav td { 
  padding: 3px; 
  border: 0px; 
  text-align: left; 
}
textarea,input,select {
  padding: 2px;
  margin: 2px;
  font-size: 14px;
}
</style>
</head>
<body>
</div>
<h3>Cek Masa Aktif Voucher <?php print_r($headerv);?></h3>
<p align="left" id="date1"></p>
<form autocomplete="off" method="post" action="">
	<table class="tnav">
		<tr><td>User/Kode Voucher :</td><td><input type="text" size="15" name="nama" required="1"/></td></tr>
		<tr><td><?php echo "Tanggal " . date("d-m-Y") . "<br>";?></td><td><input type="submit" class="button" value="Cek Masa Aktif "/></td></tr>
	</table>
</form>
<?php
	if(isset($_POST['nama'])){
	$name = ($_POST['nama']);
	if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$API->write('/system/scheduler/print', false);
	$API->write('?=name='.$name.'');
	$ARRAY1 = $API->read();
    $API->disconnect();
}
}
?>
<div style="overflow-x:auto;">
<table>
<tr>
<td >User/Kode Voucher</td>
<td >Masa Aktif</td>
<td >Berakhir</td>
</tr>
<tr><td align=left>
<?php
$TotalReg = count($ARRAY1);

for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY1[$i];echo "" . $regtable['name'] . "<br />";}echo "</td><td>";
for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY1[$i];
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
				echo "" . $cekall . "<br />";}echo "</td><td>";
for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY1[$i];echo "" . $regtable['next-run'] . "<br />";}echo "</td>";

?>
</table>
</div>
</body>
</html>
