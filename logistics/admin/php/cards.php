<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$heading = $_POST["heading"];
	
	$title1 = $_POST["title1"];
	$description1 = $_POST["description1"];
	$uploadedFile1='';
	$uploadDir =  "../uploads/cards/";  // Specify the directory where you want to store uploaded files
	$uploadedFile1 = $_FILES["image1"]["name"];
	$tempFile1 = $_FILES["image1"]["tmp_name"];
	$targetFile1 = $uploadDir . $uploadedFile1;
	move_uploaded_file($tempFile1, $targetFile1);
	$alt1=$_POST['alt1'];
	
	$title2 = $_POST["title2"];
	$description2 = $_POST["description2"];
	$uploadedFile2='';
	$uploadedFile2 = $_FILES["image2"]["name"];
	$tempFile2 = $_FILES["image2"]["tmp_name"];
	$targetFile2 = $uploadDir . $uploadedFile2;
	move_uploaded_file($tempFile2, $targetFile2);
	$alt2=$_POST['alt2'];
	
	$title3 = $_POST["title3"];
	$description3 = $_POST["description3"];
	$uploadedFile3='';
	$uploadedFile3 = $_FILES["image3"]["name"];
	$tempFile3 = $_FILES["image3"]["tmp_name"];
	$targetFile3 = $uploadDir . $uploadedFile3;
	move_uploaded_file($tempFile3, $targetFile3);
	$alt2=$_POST['alt3'];
	
	
	
	$sql = "INSERT INTO  cards (heading,title1, description1, image1,alt1, title2, description2, image2,alt2, title3, description3, image3,alt3)  VALUES ('$heading','$title1', '$description1', '$uploadedFile1','$alt1','$title2', '$description2', '$uploadedFile2','$alt2','$title3', '$description3', '$uploadedFile3','$alt3')";
    
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
		$heading = $_POST["heading"];
	
		$title1 = $_POST["title1"];
		$description1 = $_POST["description1"];
		$uploadedFile1='';
		$uploadDir =  "../uploads/cards/";  // Specify the directory where you want to store uploaded files
		$uploadedFile1 = $_FILES["image1"]["name"];
		$tempFile1 = $_FILES["image1"]["tmp_name"];
		$targetFile1 = $uploadDir . $uploadedFile1;
		move_uploaded_file($tempFile1, $targetFile1);
		$alt1=$_POST['alt1'];
		
		$title2 = $_POST["title2"];
		$description2 = $_POST["description2"];
		$uploadedFile2='';
		$uploadedFile2 = $_FILES["image2"]["name"];
		$tempFile2 = $_FILES["image2"]["tmp_name"];
		$targetFile2 = $uploadDir . $uploadedFile2;
		move_uploaded_file($tempFile2, $targetFile2);
		$alt2=$_POST['alt2'];
		
		$title3 = $_POST["title3"];
		$description3 = $_POST["description3"];
		$uploadedFile3='';
		$uploadedFile3 = $_FILES["image3"]["name"];
		$tempFile3 = $_FILES["image3"]["tmp_name"];
		$targetFile3 = $uploadDir . $uploadedFile3;
		move_uploaded_file($tempFile3, $targetFile3);
		$alt3=$_POST['alt3'];
		
		
		$sql = "UPDATE cards set heading='$heading',title1='$title1',description1='$description1',alt1='$alt1',title2='$title2',description2='$description2',alt2='$alt2',title3='$title3',description3='$description3',alt3='$alt3'";
		
		if(@$uploadedFile1 != "")
		{
			$sql = $sql . ",image1='$uploadedFile1'";
		}
		
		if(@$uploadedFile2 != "")
		{
			$sql = $sql . ",image2='$uploadedFile2'";
		}
		
		if(@$uploadedFile3 != "")
		{
			$sql = $sql . ",image3='$uploadedFile3'";
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
		$sql = "UPDATE  cards set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>