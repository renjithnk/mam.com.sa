<?php
// 	include "includes/database.php"; 
// 	$db = new Database();
    $service_sql="SELECT caption,page_url FROM service";
    $service_result = $db->query($service_sql);
	$sql = "SELECT * FROM services_brief where id=1 and status=0";
	$servicesResult = $db->query($sql);
	$servicesResultRow = $servicesResult->fetch_array();
?>

<div class="sidebar-services-listbox">
        <img src="<?php echo $clientPath . "/admin/uploads/servicesbrief/" . $servicesResultRow['image']; ?>" class="sidebar-services-listbox__img" alt="">
        <div class="sidebar-services-listbox__container">
		<?php
		   if(@$service_result->num_rows > 0) 
			{
		?>
        <ul class="sidebar-services-listbox__ul">
		 <?php  
				while($row = $service_result->fetch_array()) 
				{
		 ?>
					 <li class="sidebar-services-listbox__li"><a href="<?php echo $row['page_url'];?>" class="sidebar-services-listbox__link"><?php echo $row['caption'];?></a></li>
		 <?php
		 		}
			}
		 ?>		  
        </ul>
       </div>
</div>

<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aegis_alimblog";*/

/*$conn = new mysqli($blogHost, $blogDBUsername, $blogDBPassword, $blogDBName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query WordPress database for blog posts
$sql = "SELECT * FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT 4";
$result = $conn->query($sql);

// Display blog posts
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["post_title"] . "</h2>";
        echo "<p>" . $row["post_content"] . "</p>";
    }
} else {
    echo "No blog posts found.";
}
*/
?>