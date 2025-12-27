<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{

	$caption = $_POST["caption"];
	$description= $_POST["description"];
	$uploadedFile='';
	$uploadDir =  "../uploads/servicesbrief/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$alt=$_POST["alt"];
	
	
	$uploadedFile1='';
	$uploadedFile1 = $_FILES["icon_image1"]["name"];
	$tempFile1 = $_FILES["icon_image1"]["tmp_name"];
	$targetFile1 = $uploadDir . $uploadedFile1;
	move_uploaded_file($tempFile1, $targetFile1);
	$icon_image1_alt=$_POST["icon_image1_alt"];
	$icon_image1_description=$_POST["icon_image1_description"];
	
	
	$uploadedFile2='';
	$uploadedFile2 = $_FILES["icon_image2"]["name"];
	$tempFile2 = $_FILES["icon_image2"]["tmp_name"];
	$targetFile2 = $uploadDir . $uploadedFile2;
	move_uploaded_file($tempFile2, $targetFile2);
	$icon_image2_alt=$_POST["icon_image2_alt"];
	$icon_image2_description=$_POST["icon_image2_description"];
	
	
	$uploadedFile3='';
	$uploadedFile3 = $_FILES["icon_image3"]["name"];
	$tempFile3 = $_FILES["icon_image3"]["tmp_name"];
	$targetFile3 = $uploadDir . $uploadedFile3;
	move_uploaded_file($tempFile3, $targetFile3);
	$icon_image3_alt=$_POST["icon_image3_alt"];
	$icon_image3_description=$_POST["icon_image3_description"];
	
	$sql = "INSERT INTO services_brief (caption, description, image,alt, icon_image1, icon_image1_alt,icon_image1_description,icon_image2,icon_image2_alt,icon_image2_description,icon_image3, icon_image3_alt,icon_image3_description) VALUES ('$caption', '$description', '$uploadedFile','$alt', '$uploadedFile1', '$icon_image1_alt','$icon_image1_description','$uploadedFile2','$icon_image2_alt','$icon_image2_description','$uploadedFile3', '$icon_image3_alt','$icon_image3_description')";
	
    
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
		$description= $_POST["description"];
		$uploadedFile='';
		$uploadDir =  "../uploads/servicesbrief/";  // Specify the directory where you want to store uploaded files
		$uploadedFile = $_FILES["image"]["name"];
		$tempFile = $_FILES["image"]["tmp_name"];
		$targetFile = $uploadDir . $uploadedFile;
		move_uploaded_file($tempFile, $targetFile);
		$alt=$_POST["alt"];
		
		
		$icon_image1='';
		$uploadedFile1 = $_FILES["icon_image1"]["name"];
		$tempFile1 = $_FILES["icon_image1"]["tmp_name"];
		$targetFile1 = $uploadDir . $uploadedFile1;
		move_uploaded_file($tempFile1, $targetFile1);
		$icon_image1_alt=$_POST["icon_image1_alt"];
		$icon_image1_description=$_POST["icon_image1_description"];
		
		
		$icon_image2='';
		$uploadedFile2 = $_FILES["icon_image2"]["name"];
		$tempFile2 = $_FILES["icon_image2"]["tmp_name"];
		$targetFile2 = $uploadDir . $uploadedFile2;
		move_uploaded_file($tempFile2, $targetFile2);
		$icon_image2_alt=$_POST["icon_image2_alt"];
		$icon_image2_description=$_POST["icon_image2_description"];
		
		
		$icon_image3='';
		$uploadedFile3 = $_FILES["icon_image3"]["name"];
		$tempFile3 = $_FILES["icon_image3"]["tmp_name"];
		$targetFile3 = $uploadDir . $uploadedFile3;
		move_uploaded_file($tempFile3, $targetFile3);
		$icon_image3_alt=$_POST["icon_image3_alt"];
		$icon_image3_description=$_POST["icon_image3_description"];
		
		$sql = "UPDATE 	services_brief set caption='$caption',description='$description', alt='$alt',icon_image1_alt='$icon_image1_alt',
		icon_image1_description='$icon_image1_description',icon_image2_alt='$icon_image2_alt',icon_image2_description='$icon_image2_description',
		icon_image3_alt='$icon_image3_alt',icon_image3_description='$icon_image3_description'";
		
		if(@$uploadedFile != "")
		{
			$sql = $sql . ",image='$uploadedFile'";
		}
		
		if(@$uploadedFile1 != "")
		{
			$sql = $sql . ",icon_image1='$uploadedFile1'";
		}
		if(@$uploadedFile2 != "")
		{
			$sql = $sql . ",icon_image2='$uploadedFile2'";
		}
		if(@$uploadedFile3 != "")
		{
			$sql = $sql . ",icon_image3='$uploadedFile3'";
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
		$sql = "UPDATE services_brief set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>