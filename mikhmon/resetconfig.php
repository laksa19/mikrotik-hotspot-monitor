<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}else{
$my_file = 'config.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data ='<?php $reloadindex="15"; $iphost=""; $sshport="2219"; $userhost="admin"; $passwdhost="1234"; $profile1="Voucher3Jam"; $profile2="Voucher1Hari"; $profile3="Voucher2Hari"; $profile4="Voucher7Hari"; $profile5="Voucher30Hari"; $profile6="VIP1Hari"; $profile7="VIP2Hari"; $profile8="VIP3Hari"; $profile9="VIP4Hari"; $profile10="VIP5Hari"; $uactive1="3h"; $uactive2="1d"; $uactive3="2d"; $uactive4="7d"; $uactive5="30d"; $uactive6="1d"; $uactive7="2d"; $uactive8="3d"; $uactive9="4d"; $uactive10="5d"; $vname1="3Jam"; $vname2="1Hari"; $vname3="2Hari"; $vname4="7Hari"; $vname5="30Hari"; $vname6="1Hari"; $vname7="2Hari"; $vname8="3Hari"; $vname9="4Hari"; $vname10="5Hari"; $utimelimit1="1h"; $utimelimit2="2h"; $utimelimit3="5h"; $utimelimit4="10h"; $utimelimit5="12h"; $utimelimit1t="1Jam"; $utimelimit2t="2Jam"; $utimelimit3t="5Jam"; $utimelimit4t="10Jam"; $utimelimit5t="12Jam"; $ubytelimit1="500000000"; $ubytelimit2="1000000000"; $ubytelimit3="2000000000"; $ubytelimit4="5000000000"; $ubytelimit5="10000000000"; $ubytelimit1t="500MB"; $ubytelimit2t="1GB"; $ubytelimit3t="2GB"; $ubytelimit4t="5GB"; $ubytelimit5t="10GB"; $price1="Rp1.000"; $price2="Rp3.000"; $price3="Rp5.000"; $price4="Rp15.000"; $price5="Rp20.000"; $price6="Rp25.000"; $price7="Rp50.000"; $price8="Rp70.000"; $price9="Rp100.000"; $price10="Rp150.000"; $server1="hotspot1"; $server2="hotspot2"; $server3="hotspot3"; $server4="hotspot4"; $server5="hotspot5"; $server6="hotspot6"; $speed1="512k/680k"; $speed2="512k/720k"; $speed3="512k/1M"; $speed4="512k/2M"; $speed5="1M/1M"; $speed6="1M/2M"; $headerv="Kemangi 41"; $notev="Login dan Logout buka http://k41.net"; ?>';
		fwrite($handle, $data);
 	session_destroy(); 
 	header("Location: login.php");
}
?>
