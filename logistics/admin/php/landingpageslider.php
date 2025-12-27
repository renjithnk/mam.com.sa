<?php
require_once '../includes/database.php';
$db = new Database();
// echo $_POST["update"];
if(@$_POST['add']=="add")
{
	$landingpage_id=$_POST["landingpage_id"];
	$caption = $_POST["caption"];
	$description = $_POST["description"];
	$alt=$_POST["alt"];
	$uploadedFile='';
	// File Upload Handling
	$uploadDir =  "../uploads/landingpageslider/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$sql = "INSERT INTO landingpageslider (caption,description,image,alt,page_id) VALUES ('$caption','$description','$uploadedFile','$alt','$landingpage_id')";
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
		$landingpage_id=$_POST["landingpage_id"];
		// echo "landing page id = " . $landingpage_id;
		$caption = $_POST["caption"];
		$description = $_POST["description"];
		$alt=$_POST["alt"];
		if(isset($_FILES["image"]["name"]))
		{
			$uploadDir = "../uploads/landingpageslider/";
			$uploadedFile = $_FILES["image"]["name"];
			$tempFile = $_FILES["image"]["tmp_name"];
			$targetFile = $uploadDir . $uploadedFile;
			move_uploaded_file($tempFile, $targetFile);
		}
		if(@$uploadedFile != "")
		{
			$sql = "UPDATE landingpageslider set page_id='$landingpage_id',caption='$caption',description='$description',image='$uploadedFile',alt='$alt' where id=$id";
		}
		else
		{
			$sql = "UPDATE landingpageslider set page_id='$landingpage_id',caption='$caption',description='$description',alt='$alt' where id=$id";
		}
		$db->query($sql);
		if($db->query($sql) === TRUE) 
		{
			$msg="Updated successfully.";
		}
		else
		{
		   $msg="Error: " . $sql . "<br>";
		}
		echo $msg;
	}
}

if(@$_POST["delete"] == 'delete')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$sql = "UPDATE landingpageslider set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>