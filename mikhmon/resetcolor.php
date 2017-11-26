<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}else{
$my_file = 'css/vcolors.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $header=""; $note=""; $userpass=""; $details=""; $price=""; $font1=""; $font2=""; $font3=""; $font4=""; $font5=""; ?>';
		fwrite($handle, $data);
		header("Location:vcolorconf.php");
}
?>
