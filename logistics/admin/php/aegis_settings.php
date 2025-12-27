<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$caption = $_POST["caption"];
	$address1 = $_POST["address1"];
	$address2 = $_POST["address2"];
	$address3 = $_POST["address3"];
	$address4 = $_POST["address4"];
	$country = $_POST["country"];
	$email1 = $_POST["email1"];
	$email2 = $_POST["email2"];
	$contactno1 = $_POST["contactno1"];
	$contactno2 = $_POST["contactno2"];
	$description = $_POST["description"];
	$branch1 = $_POST["branch1"];
	$branch2 = $_POST["branch2"];
	$insta_link = $_POST["insta_link"];
	$fb_link = $_POST["fb_link"];
	$linkedin_link = $_POST["linkedin_link"];
	$google_review_link=$_POST["google_review_link"];
	$location_map = $_POST["location_map"];
	$uploadedFile='';
	$uploadDir =  "../uploads/aegissettings/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["logo"]["name"];
	$tempFile = $_FILES["logo"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$logo_alt = $_POST["logo_alt"];
	$copyright = $_POST["copyright"];
	
	
	$sql = "INSERT INTO  aegis_settings (caption,address1,address2,address3,address4,country,email1,email2,contactno1,contactno2,description,branch1,branch2,insta_link,fb_link,linkedin_link,google_review_link,location_map,logo,logo_alt,copyright)  VALUES ('$caption', '$address1', '$address2','$address3','$address4', '$country','$email1', '$email2','$contactno1','$contactno2', '$description', '$branch1','$branch2', '$insta_link','$fb_link','$linkedin_link','$google_review_link','$location_map','$uploadedFile','$logo_alt','$copyright')";
    
    if($db->query($sql) === TRUE) 
	{
        echo "New Record Added Successfully.";
    }
	else
	{
       echo "Error: " . $sql . "<br>";
    }
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$caption = $_POST["caption"];
		$address1 = $_POST["address1"];
		$address2 = $_POST["address2"];
		$address3 = $_POST["address3"];
		$address4 = $_POST["address4"];
		$country = $_POST["country"];
		$email1 = $_POST["email1"];
		$email2 = $_POST["email2"];
		$contactno1 = $_POST["contactno1"];
		$contactno2 = $_POST["contactno2"];
		$description=$_POST["description"];
		$branch1 = $_POST["branch1"];
		$branch2 = $_POST["branch2"];
		$insta_link = $_POST["insta_link"];
		$fb_link = $_POST["fb_link"];
		$linkedin_link = $_POST["linkedin_link"];
		$google_review_link=$_POST["google_review_link"];
		$location_map = $_POST["location_map"];
		$uploadedFile='';
		$uploadDir =  "../uploads/aegissettings/";  // Specify the directory where you want to store uploaded files
		$uploadedFile = $_FILES["logo"]["name"];
		$tempFile = $_FILES["logo"]["tmp_name"];
		$targetFile = $uploadDir . $uploadedFile;
		move_uploaded_file($tempFile, $targetFile);
		$logo_alt = $_POST["logo_alt"];
		$copyright = $_POST["copyright"];
		
		
		$sql = "UPDATE aegis_settings set caption='$caption',address1='$address1',address2='$address2',address3='$address3',address4='$address4',
		country='$country',email1='$email1',email2='$email2',contactno1='$contactno1',contactno2='$contactno2',description='$description',branch1='$branch1',branch2='$branch2',
		insta_link='$insta_link',fb_link='$fb_link',linkedin_link='$linkedin_link',google_review_link='$google_review_link',location_map='$location_map',logo_alt='$logo_alt',copyright='$copyright'";
		
		if(@$uploadedFile != "")
		{
			$sql = $sql . ",logo='$uploadedFile'";
		}
		
		$sql = $sql . " where id=$id and status=0";
		
		$db->query($sql);
		if($db->query($sql) === TRUE) 
		{
			$msg="Updated successfully.";
		}
		else
		{
		   $msg="Error: " . $sql;
		}
		echo $msg;
	}
}

if(@$_POST["delete"] == 'delete')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$sql = "UPDATE  aegis_settings set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>