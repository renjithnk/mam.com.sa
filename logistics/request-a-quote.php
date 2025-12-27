<?php include("templates/header.php") ?>

<div class="site-content subpage-content about-us">
  
<div class="site-content__section subpage-banner">
  <img src="../logistics/assets/images/request-quote-banner.webp" alt="" class="subpage-banner__img">
  <h1 class="subpage-banner__heading">Request A Quote</h1>
</div>
    
<div class="site-content__section subpage-main-content">
  <div class="subpage-content__section subpage-main-content__container container-fluid">
    <?php include('forms/request-quote-form.php') ?>
  </div>
</div>


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

<?php include("templates/footer.php") ?>