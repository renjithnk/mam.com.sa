<?php
// Database connection or other configuration settings
global $clientPath;

if($_SERVER['HTTP_HOST'] == "localhost.alim")
{
	$clientPath='http://'.$_SERVER['HTTP_HOST'] . "/logistics";
	$mainImgPath='http://'.$_SERVER['HTTP_HOST'];
	$blogURL='http://'.$_SERVER['HTTP_HOST'] . "/logistics/blog/";
}
else if($_SERVER['HTTP_HOST'] == "localhost")
{
	$clientPath='http://'.$_SERVER['HTTP_HOST'] . "/alim/logistics";
	$mainImgPath='http://'.$_SERVER['HTTP_HOST'] . "/alim/";
	$blogURL='http://'.$_SERVER['HTTP_HOST'] . "/alim/logistics/blog/";
}
else
{
    $clientPath='https://'.$_SERVER['SERVER_NAME'] . "/logistics";
	$blogURL='https://'.$_SERVER['HTTP_HOST'] .  "/logistics/blog/";
}
?>