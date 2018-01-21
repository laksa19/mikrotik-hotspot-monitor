<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:../login.php");
}
?>
<?php
error_reporting(0);
require('../lib/api.php');

include('../config.php');
$API = new RouterosAPI();
$API->debug = false;

$id = $_GET['id'];
$listphp = $_GET['list'];

if ($API->connect( $iphost, $userhost, $passwdhost )) {

$API->comm("/ip/hotspot/user/remove", array(
".id"=> "$id",));

$API->disconnect();

header("Location:$listphp");

}
?>