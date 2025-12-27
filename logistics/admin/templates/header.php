<?php
global $adminPath;
global $db;
session_start();
if(@$_SESSION['adminPath'] == "")
{
  require_once '../includes/config.php';
}
if(@$_SESSION['admin_username'] == '')
{
	header("Location: ../index.php");
}
$adminPath=$_SESSION['adminPath'];
if(!$db)
{
	// require_once 'includes/database.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aegis Logistics and International Movers</title>
    <link href="<?php echo $adminPath; ?>assets/css/admin-style.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo $adminPath; ?>assets/css/custom.css" type="text/css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!--<script src="https://cdn.tiny.cloud/1/colxs8l7a75ue408ixpyxv0wn1d0566yurpgqo7okslz76pd/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>-->
	<!--<script type="text/javascript" src="<?php // echo $adminPath . "assets/ckeditor/ckeditor.js" ;?>"></script>-->
	<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/super-build/ckeditor.js"></script>
</head>