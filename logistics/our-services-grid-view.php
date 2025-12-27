<?php 
include("templates/header.php");
$sql = "SELECT * FROM aboutus where id=1 and status=0";
$db = new Database();
$result = $db->query($sql);
if(@$result->num_rows > 0) 
{
  $row = $result->fetch_array();
}
?>

<div class="site-content subpage-content about-us">
  
<div class="site-content__section subpage-banner">
  <img src="assets/images/services-banner.webp" alt="services-banner" class="subpage-banner__img">
  <h1 class="subpage-banner__heading">Services</h1>
</div>
<br>
    
<div class="site-content__section landing-page-services no-padding-bottom">
  <div class="landing-page-services__container container">
	
    <div class="landing-page-services__items-container">
	
	
	<?php
	$serviceSql = "SELECT * FROM service where status=0";
	$serviceResult = $db->query($serviceSql);

	if (@$serviceResult->num_rows > 0) 
	{
			 while (@$serviceRow = $serviceResult->fetch_array()) 
			 {
	?> 
						<div class="landing-page-services__items">
						  <h2 class="landing-page-services__items-heading"><?php echo $serviceRow["caption"]; ?></h2>
						  <img src="<?php echo $clientPath . "/admin/uploads/service/" . $serviceRow['image']; ?>" alt="<?php echo $serviceRow['alt'];?>" class="landing-page-services__image" width="350" height="130">
						  <p class="landing-page-services__description"><?php  echo $serviceRow["short_description"]; ?></p>
						</div>
	
    <?php
			 }
	}
	?>
    
    
    
    </div>
  </div>
  <?php
$whychooseusSql = "SELECT * FROM whychooseus where status=0";
$db = new Database();
$whychooseusResult = $db->query($whychooseusSql);
?>
<?php
	if (@$whychooseusResult->num_rows > 0) 
	{
	?> 

<?php
}
?>
</div>

<?php	
	$sql = "SELECT * FROM logisticssolutions where id=1 and status=0";
	$logisticssolutionsResult = $db->query($sql);
	$logisticssolutionsResultRow = $logisticssolutionsResult->fetch_array();
?>


<div class="site-content__section aegis-solution">
  <div class="aegis-solution__container container-fluid">
    <h2 class="aegis-solution__heading"><?php echo $logisticssolutionsResultRow["caption"]; ?></h2>
    <div class="aegis-solution__listbox">
      <div class="aegis-solution__listbox-items">
        <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image1']; ?>" alt="<?php echo $logisticssolutionsResultRow["icon_image1_alt"]; ?>" class="aegis-solution__listbox-items-icon">
        <span class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image1_description"]; ?></span>
      </div>
      <div class="aegis-solution__listbox-items">
        <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image2']; ?>" alt="<?php echo $logisticssolutionsResultRow["icon_image2_alt"]; ?>" class="aegis-solution__listbox-items-icon">
        <span class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image2_description"]; ?></span>
      </div>
      <div class="aegis-solution__listbox-items">
        <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image3']; ?>" alt="<?php echo $logisticssolutionsResultRow["icon_image3_alt"]; ?>" class="aegis-solution__listbox-items-icon">
        <span class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image3_description"]; ?></span>
      </div>
      <div class="aegis-solution__listbox-items">
        <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image4']; ?>" alt="<?php echo $logisticssolutionsResultRow["icon_image4_alt"]; ?>" class="aegis-solution__listbox-items-icon">
        <span class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image4_description"]; ?></span>
      </div>
    </div>
    <p class="aegis-solution__description">
   <?php echo $logisticssolutionsResultRow["description"]; ?>
    </p>
  </div>
</div>
<!-- <div class="site-content__section no-padding-top advertisement-horizontal">
  <div class="advertisement-horizontal__container container-fluid">
    <a href="http://alimarabia.com/tours-and-travels" target="_blank">
    <img src="../logistics/assets/images/ad-hotels.jpg" alt="">
    </a>
  </div>
</div> -->

<?php	
	$sql = "SELECT * FROM members_in where id=1 and status=0";
	$members_inResult = $db->query($sql);
	$members_inResultRow = $members_inResult->fetch_array();
?>
<div class="site-content__section aegis-member">
  <div class="aegis-member__container container-fluid">
    <div class="aegis-member__col1">
      <img src="<?php echo $clientPath . "/admin/uploads/members_in/" . $members_inResultRow['image1']; ?>" alt="<?php echo @$members_inResultRow['image1_alt']; ?>" class="aegis-member__col1-img">
    </div>
    <div class="aegis-member__col2">
      <div class="aegis-member-box">
        <div class="aegis-member-box__col1">
          <h3 class="aegis-member-box__heading"><?php echo $members_inResultRow['title']; ?></h3>
          <p class="aegis-member-box__p"><?php echo $members_inResultRow['description']; ?></p>
        </div>
        <div class="aegis-member-box__col2">
          <img src="<?php echo $clientPath . "/admin/uploads/members_in/" . $members_inResultRow['image2']; ?>" alt="<?php echo @$members_inResultRow['image2_alt']; ?>" class="aegis-member-box__logo">
        </div>
      </div>
    </div>
  </div>
</div>



</div>

<?php include("templates/footer.php") ?>