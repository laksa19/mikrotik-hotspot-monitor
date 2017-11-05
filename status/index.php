<?php
error_reporting(0);
require('./api.php');
$API = new RouterosAPI();
$API->debug = false;

?>
<html>
<head>
<title>Cek Masa Aktif Voucher Kemangi 41</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
<link rel="icon" href="favicon.ico" />
<script>
function goBack() {
    window.history.back();
}
</script>
<style>
table { 
  width: 100%; 
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
  margin-left:auto; 
  margin-right:auto;
  width: 100%; 
  border-collapse: collapse; 
  
}
table.tnav td { 
  padding: 3px; 
  border: 0px; 
  text-align: left; 
}
</style>
</head>
<body>
</div>
<h3>Cek Masa Aktif Voucher Kemangi 41</h3>
<p align="left" id="date1"></p>
<?php
echo "Tanggal " . date("d-m-Y") . "<br>";
echo "Keterangan Masa Aktif : h=jam,  d=hari,  w=minggu."."<br><br>";
?>
<button class="button" onclick="goBack()">Kembali</button>
<p></p>
<form autocomplete="off" method="post" action="">
	<table class="tnav" align="center"  >
		<tr><td>User/Kode Voucher</td><td>:</td><td><input type="text" size="15" maxlength="15" name="nama" placeholder="User/Kode Voucher" required="1"/></td></tr>
		<tr><td></td><td></td><td><input type="submit" class="button" value="Cek Masa Aktif "/></td></tr>
	</table>
</form>
<?php
	if(isset($_POST['nama'])){
	$name = ($_POST['nama']);
	if ($API->connect( 'IP Mikrotik', 'user', 'Password')) {
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
for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY1[$i];echo "" . $regtable['interval'] . "<br />";}echo "</td><td>";
for ($i=0; $i<$TotalReg; $i++){$regtable = $ARRAY1[$i];echo "" . $regtable['next-run'] . "<br />";}echo "</td>";

?>
</table>
</div>
</body>
</html>
