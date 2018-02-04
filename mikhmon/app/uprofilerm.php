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


$API = new RouterosAPI();
$API->debug = false;

$id = $_GET['id'];

if ($API->connect( $iphost, $userhost, $passwdhost )) {

$API->comm("/ip/hotspot/user/profile/remove", array(
".id"=> "$id",));

$API->disconnect();

header("Location:./uprofileadd.php");

}
?>