<?php 
// require_once '../includes/database.php'; 
include("templates/moving-to-uk-header.php");
$db = new Database();
?>

<div class="site-content subpage-content landing-page">
  
  
<div class="site-content__section landing-page-banner">

<?php
  	$landingpagesliderSql = "SELECT * FROM landingpageslider where  page_id=2 and status=0";
	$landingpagesliderResult = $db->query($landingpagesliderSql);

if (@$landingpagesliderResult->num_rows > 0) 
{
			 while (@$landingpagesliderRow = $landingpagesliderResult->fetch_array()) 
			 {
			 ?>
					  <img src="<?php echo $clientPath . "/admin/uploads/landingpageslider/" . $landingpagesliderRow['image']; ?>" alt="<?php echo 				$landingpagesliderRow['alt'];?>" class="landing-page-banner__img">
					  <div class="landing-page-banner__col1">
						<h1 class="landing-page-banner__caption"><?php echo $landingpagesliderRow["caption"]; ?></h1>
						<p class="landing-page-banner__description"><?php  echo $landingpagesliderRow["description"]; ?></p>
					  </div>
  			<?php
			}
}
?>
  
  <div class="landing-page-banner__col2">
   <?php include('forms/moving-to-uk-form.php') ?>
  </div>
</div>

<div class="site-content__section landing-page-services no-padding-bottom">
  <div class="landing-page-services__container container">
    <h2 class="landing-page-services__heading">Our Services</h2>
	
    <div class="landing-page-services__items-container">
	
	
	<?php
	$serviceSql = "SELECT * FROM landingpagesservice where page_id=2 and status=0";
	$serviceResult = $db->query($serviceSql);

	if (@$serviceResult->num_rows > 0) 
	{
			 while (@$serviceRow = $serviceResult->fetch_array()) 
			 {
			/* echo "<pre>";
			 print_r($serviceRow);
			 exit;*/
	?> 
						<div class="landing-page-services__items">
						  <h2 class="landing-page-services__items-heading"><?php echo $serviceRow["caption"]; ?></h2>
						  <img src="<?php echo $clientPath . "/admin/uploads/service/" . $serviceRow['image']; ?>" alt="<?php echo $serviceRow['alt'];?>" class="landing-page-services__image" width="350" height="130">
						  <p class="landing-page-services__description"><?php echo $serviceRow["short_description"]; ?></p>
						</div>
	
    <?php
			 }
	}
	?>
    
    
    
    </div>
  </div>
  <?php
$whychooseusSql = "SELECT * FROM whychooseus where page_id=2 and status=0";
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


<div class="site-content__section why-choose-us">
  <div class="why-choose-us__container container">
    <h2 class="why-choose-us__heading">Why Choose Us</h2>
    <div class="why-choose-us__items-container">
	<?php
	 while (@$whychooseuseRow = $whychooseusResult->fetch_array()) 
	 {
	?> 
			  <div class="why-choose-us__items">
				<img src="<?php echo $clientPath . "/admin/uploads/whychooseus/" . $whychooseuseRow['image']; ?>" alt="<?php echo $whychooseuseRow['alt'];?>" class="why-choose-us__images" width="52" height="47">
				<h3 class="why-choose-us__label"><?php echo $whychooseuseRow['caption'];?></h3>
			  </div>
     <?php
	 }
	 ?>
    </div>
  </div>
</div>




<?php
$streefreemoveSql = "SELECT * FROM streefreemove where page_id=2 and status=0";
$db = new Database();
$streefreemoveResult = $db->query($streefreemoveSql);
?>
<?php
	if (@$streefreemoveResult->num_rows > 0) 
	{
	?> 
			<div class="site-content__section stress-free-move no-padding-top">
			  <div class="stress-free-move__container container">
				<h2 class="stress-free-move__heading">Stress Free move</h2>
				<div class="stress-free-move__items-container">
				<?php
						 while (@$streefreemoveRow = $streefreemoveResult->fetch_array()) 
						 {
				?> 
							  <div class="stress-free-move__items">
								<img src="<?php echo $clientPath . "/admin/uploads/streefreemove/" . $streefreemoveRow['image']; ?>" alt="<?php echo $streefreemoveRow['alt'];?>" class="stress-free-move__items-icon">
								<div class="stress-free-move__items-label"><?php echo $streefreemoveRow['caption'];?></div>
							  </div>
				<?php
				 		}
				 ?>
				</div>
			  </div>
			</div>
<?php
	}
?>


<div class="site-content__section landing-page-testimonials aegis-testimonials no-padding-top">
  <div class="aegis-testimonials__container container">
  <h2 class="aegis-testimonials__heading">Our Clients Say</h2>
  <div class="swiper2 aegis-testimonials__swiper2">
    <div class="swiper-wrapper aegis-testimonials__wrapper">
		<?php
				$sql = "SELECT * FROM landingpagestestimonial where page_id=2 and status=0 order by id desc";
				$result = $db->query($sql);
				if(@$result->num_rows > 0) 
				{
						$sliderPath="";
						while ($row = $result->fetch_array()) 
						{
			   ?>
								<div class="swiper-slide aegis-testimonials__slide">
								<img class="aegis-testimonials__quote" src="<?php echo $clientPath . "/assets/images/testimonials-quote.svg"; ?>" width="67" height="41" alt="testimonials-quote"  loading="lazy">
								 <?php echo $row['comment']; ?>
								<h4 class="aegis-testimonials__name"><?php echo $row['name']; ?></h4>
								<p class="aegis-testimonials__service"><?php echo $row['location']; ?></p>
							  </div>
			 <?php
						}
				}
			 ?>
    </div>
    <!-- Add Pagination -->
  <div class="swiper-pagination2 aegis-testimonials__pagination"></div>
</div>
  </div>
</div>



<?php	
	$aegis_settingsSql = "SELECT * FROM aegis_settings where id=1 and status=0";
	$aegis_settingsResult = $db->query($aegis_settingsSql);
	$aegis_settingsResultRow = $aegis_settingsResult->fetch_array();
?>

<div class="site-content__section leave-review no-padding-top">
<a href="<?php echo $aegis_settingsResultRow['google_review_link']; ?>" target='_blank' class="leave-review__link">
    <img src="<?php echo $clientPath . "/assets/images/leave-review-button.svg"; ?>" alt="" class="leave-review__image"></a>
</div>

<div class="site-content__section get-free-quote-button no-padding-top">
<a href="#top" class="get-free-quote-button__link">Get A Free Quote<img src="<?php echo $clientPath . "/assets/images/get-a-quote-icon.svg"; ?>" alt="Get a Quote" class="get-free-quote-button__icon"></a>
</div>

<?php
 	$landingpagevideoSql = "SELECT * FROM videos where service_id=0 and status=0";
	$landingpagevideoResult = $db->query($landingpagevideoSql);
	if($landingpagevideoResult)
	{
			$landingpagevideoResultRow = $landingpagevideoResult->fetch_array();
			if($landingpagevideoResultRow)
			{
		?>
					<div class="site-content__section video no-padding-top">
					<iframe width="" height="" src="<?php echo $landingpagevideoResultRow['video_url'];?>" frameborder="0" allowfullscreen></iframe>
					</div>
		<?php
			}
	}
?>

<?php	
	$sql = "SELECT * FROM members_in where id=1 and status=0";
	$members_inResult = $db->query($sql);
	$members_inResultRow = $members_inResult->fetch_array();
?>
<div class="site-content__section aegis-member">
  <div class="aegis-member__container container-fluid">
    <div class="aegis-member__col1">
      <img src="<?php echo $clientPath . "/admin/uploads/members_in/" . $members_inResultRow['image1']; ?>" alt="<?php echo @$members_inResultRow['image1_alt']; ?>" class="aegis-member__col1-img" width="630" height="320" loading="lazy" >
    </div>
    <div class="aegis-member__col2">
      <div class="aegis-member-box">
        <div class="aegis-member-box__row1">
        <h3 class="aegis-member-box__heading"><?php echo $members_inResultRow['title']; ?></h3>
          <p class="aegis-member-box__p"><?php echo $members_inResultRow['description']; ?></p>
        </div>
        <div class="aegis-member-box__row2">
        
        <div class="aegis-member-box__col1">
          <img src="<?php echo $clientPath . "/admin/uploads/members_in/" . $members_inResultRow['image2']; ?>" alt="<?php echo @$members_inResultRow['image2_alt']; ?>" class="aegis-member-box__logo" width="224" height="74" loading="lazy">
        </div>
        <div class="aegis-member-box__col2">
          <img src="assets/images/iam-logo.svg" class="aegis-member-box__logo" width="224" height="74" loading="lazy">
        </div>
        <div class="aegis-member-box__col3">
        <img src="assets/images/global-logistics-alliance-logo.webp" class="aegis-member-box__logo" width="224" height="74" loading="lazy">
        </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
<?php
 include("templates/moving-to-uk-footer.php");
?>