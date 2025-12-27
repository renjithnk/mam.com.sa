<?php include("templates/header.php") ?>

<div class="site-content subpage-content about-us">
  
<div class="site-content__section subpage-banner">
  <img src="../logistics/assets/images/contact-banner.webp" alt="" class="subpage-banner__img">
  <h1 class="subpage-banner__heading">Contact Us</h1>
</div>
    
<div class="site-content__section subpage-main-content">
  <div class="subpage-content__section subpage-main-content__double-column-container container-fluid">
    <div class="subpage-main-content__col1">
      
  <?php include('forms/contact-form.php') ?>
    
      
    </div>
    <div class="subpage-main-content__col2">
      <div class="contact-us-page-contact-box">
        <div class="contact-us-page-contact-box__items">
          <h4 class="contact-us-page-contact-box__heading">Address</h4>
          <div class="contact-us-page-contact-box__content"><?php echo $aegisSettingsResultRow['address1'];?>,<br>
          <?php echo $aegisSettingsResultRow['address2'];?><br> <?php echo $aegisSettingsResultRow['address3'];?>
<?php echo $aegisSettingsResultRow['address4'];?> <br> <?php echo $aegisSettingsResultRow['country'];?></div>
        </div>
        <div class="contact-us-page-contact-box__items">
          <h4 class="contact-us-page-contact-box__heading">E-mail</h4>
          <div class="contact-us-page-contact-box__content">
            <p><a href="mailto:<?php echo $aegisSettingsResultRow['email1'];?> class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['email1'];?></a></p>
            <p class="aegis-site-footer__contact-box-p">
                <a href="mailto:<?php echo $aegisSettingsResultRow['email2'];?>" class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['email2'];?>
                </a>
                </p>
          </div>
        </div>
        <div class="contact-us-page-contact-box__items">
          <h4 class="contact-us-page-contact-box__heading">Contact:</h4>
          <div class="contact-us-page-contact-box__content">
          <p class="aegis-site-footer__contact-box-p"><a href="tel:<?php echo $aegisSettingsResultRow['contactno1'];?>" class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['contactno1'];?></a></p>
          <p class="aegis-site-footer__contact-box-p"><a href="tel:<?php echo $aegisSettingsResultRow['contactno2'];?>" class="aegis-site-footer__contact-box-links"> <?php echo $aegisSettingsResultRow['contactno2'];?></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="site-content__section map no-padding-top">
  <div class="container-fluid map__container">
    <h3 class="map__heading">Locate Us:</h3>
  <iframe class="map__iframe" src="<?php echo $aegisSettingsResultRow['location_map'];?>" width="100%" height="350" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>


<div class="site-content__section contact-writeup no-padding-top">
  <div class="container contact-writeup__container">
    <div class="contact-writeup__box">
    <p><?php echo $aegisSettingsResultRow['description'];?>.</p>
    </div>
  </div>
</div>


<?php	
	$sql = "SELECT * FROM logisticssolutions where id=1 and status=0";
	$logisticssolutionsResult = $db->query($sql);
	$logisticssolutionsResultRow = $logisticssolutionsResult->fetch_array();
?>
<div class="site-content__section aegis-solution no-padding-top">
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

<?php //include("templates/footer.php") ?>

<footer class="aegis-site-footer">
    <div class="container-fluid aegis-site-footer__container">
        <div class="aegis-site-footer__row1">
            <div class="aegis-site-footer__logo">
                <img src="<?php echo $logoImgPath; ?>" class=" aegis-site-footer__logo-img" alt="<?php echo $aegisSettingsResultRow['logo_alt'];?>" width="300" height="118">
            </div>
            <div class="aegis-site-footer-social-media">
                <div class="aegis-site-footer-social-media__label">Follow Us On:</div>
                <div class="aegis-site-footer-social-media__box">
                <a href="<?php echo $aegisSettingsResultRow['insta_link'];?>" target="_blank" class="aegis-site-footer-social-media__link">
                <img src="../logistics/assets/images/instagram-logo.svg" alt="instagram-logo1" class="aegis-site-footer-social-media__link-img" width="21" height="21">
                    <img src="../logistics/assets/images/instagram-logo-white.svg" alt="instagram-logo2" class="aegis-site-footer-social-media__link-img-white" width="21" height="21">
                </a>
                
                <a href="<?php echo $aegisSettingsResultRow['fb_link'];?>" target="_blank" class="aegis-site-footer-social-media__link">
                    <img src="../logistics/assets/images/facebook-logo.svg" alt="facebook-logo1" class="aegis-site-footer-social-media__link-img"  width="11" height="21">
                    <img src="../logistics/assets/images/facebook-logo-white.svg" alt="facebook-logo2" class="aegis-site-footer-social-media__link-img-white"  width="11" height="21">
                </a>
                <a href="<?php echo $aegisSettingsResultRow['linkedin_link'];?>" target="_blank" class="aegis-site-footer-social-media__link">
                    <img src="../logistics/assets/images/linkedin-logo.svg" alt="linkedin-logo1" class="aegis-site-footer-social-media__link-img"  width="24" height="23">
                    <img src="../logistics/assets/images/linkedin-logo-white.svg" alt="linkedin-logo2" class="aegis-site-footer-social-media__link-img-white" width="24" height="23">
                </a>
                </div>
            </div>
        </div>

        <div class="aegis-site-footer__row2">
            <div class="aegis-site-footer__contact-box">
                <div class="aegis-site-footer__contact-box-items">
                    <h3 class="aegis-site-footer__contact-box-heading"><img src="../logistics/assets/images/reach-us-icon.svg" alt="contact-box" class="aegis-site-footer__contact-box-icon" width="20" height="30">Reach Us</h3>
                    <p class="aegis-site-footer__contact-box-p"><?php echo $aegisSettingsResultRow['address1'];?><br>
                    <?php echo $aegisSettingsResultRow['address2'];?> <br> <?php echo $aegisSettingsResultRow['address3'];?>
<?php echo $aegisSettingsResultRow['address4'];?>, <?php echo $aegisSettingsResultRow['country'];?></p>
                </div>
            <div class="aegis-site-footer__contact-box-items">
                <h3 class="aegis-site-footer__contact-box-heading"><img src="../logistics/assets/images/contact-box-email-icon.svg" alt="contact-box-email" class="aegis-site-footer__contact-box-icon" width="29" height="23">E-mail</h3>
                <p class="aegis-site-footer__contact-box-p">
                <a href="mailto:<?php echo $aegisSettingsResultRow['email1'];?>" class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['email1'];?></a>
                </p>
                <p class="aegis-site-footer__contact-box-p">
                <a href="mailto:<?php echo $aegisSettingsResultRow['email2'];?>" class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['email2'];?>
                </a>
                </p>
                </div>

                <div class="aegis-site-footer__contact-box-items">
                    <h3 class="aegis-site-footer__contact-box-heading"><img src="../logistics/assets/images/contact-box-branches-icon.svg" alt="branch-icon" class="aegis-site-footer__contact-box-icon" width="25" height="25">Branches</h3>
                    <p class="aegis-site-footer__contact-box-p"><?php echo $aegisSettingsResultRow['branch1'];?></p>
                    <p class="aegis-site-footer__contact-box-p"><?php echo $aegisSettingsResultRow['branch2'];?></p>
                </div>

                <div class="aegis-site-footer__contact-box-items">
                    <h3 class="aegis-site-footer__contact-box-heading"><img src="../logistics/assets/images/contact-box-tel-icon.svg" alt="contact-box-tel-icon" class="aegis-site-footer__contact-box-icon" width="27" height="27">Contact:</h3>
					<?php
					  $contactno1=str_replace(" ","",$aegisSettingsResultRow['contactno1']);
					  $contactno2=str_replace(" ","",$aegisSettingsResultRow['contactno2']);
					?>
                    <p class="aegis-site-footer__contact-box-p"><a href="tel:<?php echo $contactno1;?>" class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['contactno1'];?></a></p>
                    <p class="aegis-site-footer__contact-box-p"><a href="tel:<?php echo $contactno2;?>" class="aegis-site-footer__contact-box-links"> <?php echo $aegisSettingsResultRow['contactno2'];?></a></p>
                </div>
            </div>
        </div>
        <div class="aegis-site-footer__row3">
            <div class="aegis-site-footer-navbox">
            <ul class="aegis-site-footer-navbox-ul">
            <li class="aegis-site-footer-navbox-li">
                <a href="index.php" class="aegis-site-footer-navbox-links">Home</a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                <a href="about-us.php" class="aegis-site-footer-navbox-links">About Us</a>
            </li>
                <li class="aegis-site-footer-navbox-li"><a href="our-services.php" class="aegis-site-footer-navbox-links">Services</a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                <a href="gallery.php" class="aegis-site-footer-navbox-links">Gallery</a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                    <a href="contact-us.php" class="aegis-site-footer-navbox-links">Contact Us</a>
            </li> 
            <li class="aegis-site-footer-navbox-li">
                <a href="moving-and-relocation.php" class="aegis-site-footer-navbox-links">Moving Relocation</a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                    <a href="warehousing.php" class="aegis-site-footer-navbox-links">Warehousing</a></li>
            <li class="aegis-site-footer-navbox-li">
                    <a href="logistics.php" class="aegis-site-footer-navbox-links">Logistics</a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                    <a href="customs-clearance.php" class="aegis-site-footer-navbox-links">Customs Clearance</a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                    <a href="office-and-industrial-moving.php" class="aegis-site-footer-navbox-links">Office & Industrial Moving</a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                    <a href="furniture-fixtures-and-equipments-moving.php" class="aegis-site-footer-navbox-links">Furniture, Fixtures & Equipment</a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                    <a href="sea-freight.php" class="aegis-site-footer-navbox-links">Sea Freight </a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                    <a href="air-freight.php" class="aegis-site-footer-navbox-links">Air Freight</a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                    <a href="gcc-transport.php" class="aegis-site-footer-navbox-links">GCC Transport</a>
            </li>
            <li class="aegis-site-footer-navbox-li">
                    <a href="pet-relocation.php" class="aegis-site-footer-navbox-links">Pet Relocation</a>
            </li>
            </ul> 
            </div>
            <div class="copyright">Copyright @ <span id="copyright_year"></span>. <?php echo $aegisSettingsResultRow['copyright'];?></div>	
        </div>
    </div>
    
</footer>
<button class="move-to-top" title="Go to top"></button>
<?php 
    if(($url === "localhost.alim") || ($url === "localhost")){
    echo '<script src="assets/js/aegis.js"></script>';
    }
    else
	{
        if(($url === "alimarabia.com") || ($url === "www.alimarabia.com"))
	    {
  			  /* echo '<script async src="assets/js/aegis.min.js"></script>';*/
			   $path=$clientPath . "/assets/js/aegis.js";
			   echo '<script async src="' . $path . '"></script>';
		}
    }
	$contactjsPath=$clientPath . "/assets/js/contactus.js";
?>
	<script src="<?php echo $contactjsPath;?>" type="text/javascript"></script>
</body>
</html>


