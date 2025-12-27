
<footer class="aegis-site-footer">
    <div class="container-fluid aegis-site-footer__container">
        <div class="aegis-site-footer__row1">
            <div class="aegis-site-footer__logo">
                <img src="<?php echo $logoImgPath; ?>" class=" aegis-site-footer__logo-img"
                    alt="<?php echo $aegisSettingsResultRow['logo_alt'];?>" width="300" height="118">
            </div>
            <div class="aegis-site-footer-social-media">
                <div class="aegis-site-footer-social-media__label">Follow Us On:</div>
                <div class="aegis-site-footer-social-media__box">
                    <a href="<?php echo $aegisSettingsResultRow['insta_link'];?>" target="_blank"
                        class="aegis-site-footer-social-media__link">
                        <img src="<?php echo $clientPath . "/assets/images/instagram-logo.svg";?>" alt="instagram-logo1"
                            class="aegis-site-footer-social-media__link-img" width="21" height="21">
                        <img src="<?php echo $clientPath . "/assets/images/instagram-logo-white.svg";?>"
                            alt="instagram-logo2" class="aegis-site-footer-social-media__link-img-white" width="21"
                            height="21">
                    </a>

                    <a href="<?php echo $aegisSettingsResultRow['fb_link'];?>" target="_blank"
                        class="aegis-site-footer-social-media__link">
                        <img src="<?php echo $clientPath . "/assets/images/facebook-logo.svg";?>" alt="facebook-logo1"
                            class="aegis-site-footer-social-media__link-img" width="11" height="21">
                        <img src="<?php echo $clientPath . "/assets/images/facebook-logo-white.svg";?>"
                            alt="facebook-logo2" class="aegis-site-footer-social-media__link-img-white" width="11"
                            height="21">
                    </a>
                    <a href="<?php echo $aegisSettingsResultRow['linkedin_link'];?>" target="_blank"
                        class="aegis-site-footer-social-media__link">
                        <img src="<?php echo $clientPath . "/assets/images/linkedin-logo.svg";?>" alt="linkedin-logo1"
                            class="aegis-site-footer-social-media__link-img" width="24" height="23">
                        <img src="<?php echo $clientPath . "/assets/images/linkedin-logo-white.svg";?>"
                            alt="linkedin-logo2" class="aegis-site-footer-social-media__link-img-white" width="24"
                            height="23">
                    </a>
                </div>
            </div>
        </div>

        <div class="aegis-site-footer__row2">
            <div class="aegis-site-footer__contact-box">
                <div class="aegis-site-footer__contact-box-items">
                    <h3 class="aegis-site-footer__contact-box-heading"><img
                            src="<?php echo $clientPath . "/assets/images/reach-us-icon.svg"; ?>" alt="contact-box"
                            class="aegis-site-footer__contact-box-icon" width="20" height="30">Reach Us</h3>
                    <p class="aegis-site-footer__contact-box-p"><?php echo $aegisSettingsResultRow['address1'];?><br>
                        <?php echo $aegisSettingsResultRow['address2'];?> <br>
                        <?php echo $aegisSettingsResultRow['address3'];?>
                        <?php echo $aegisSettingsResultRow['address4'];?>,
                        <?php echo $aegisSettingsResultRow['country'];?></p>
                </div>
                <div class="aegis-site-footer__contact-box-items">
                    <h3 class="aegis-site-footer__contact-box-heading"><img
                            src="<?php echo $clientPath . "/assets/images/contact-box-email-icon.svg"; ?>"
                            alt="contact-box-email" class="aegis-site-footer__contact-box-icon" width="29"
                            height="23">E-mail</h3>
                    <p class="aegis-site-footer__contact-box-p">
                        <a href="mailto:<?php echo $aegisSettingsResultRow['email1'];?>"
                            class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['email1'];?></a>
                    </p>
                    <!-- <p class="aegis-site-footer__contact-box-p">
                        <a href="mailto:<?php echo $aegisSettingsResultRow['email2'];?>"
                            class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['email2'];?>
                        </a>
                    </p> -->
                </div>

                <div class="aegis-site-footer__contact-box-items">
                    <h3 class="aegis-site-footer__contact-box-heading"><img
                            src="<?php echo $clientPath . "/assets/images/contact-box-branches-icon.svg"; ?>"
                            alt="branch-icon" class="aegis-site-footer__contact-box-icon" width="25"
                            height="25">Branches</h3>
                    <p class="aegis-site-footer__contact-box-p"><?php echo $aegisSettingsResultRow['branch1'];?></p>
                    <p class="aegis-site-footer__contact-box-p"><?php echo $aegisSettingsResultRow['branch2'];?></p>
                </div>

                <div class="aegis-site-footer__contact-box-items">
                    <h3 class="aegis-site-footer__contact-box-heading"><img
                            src="<?php echo $clientPath . "/assets/images/contact-box-tel-icon.svg"; ?>"
                            alt="contact-box-tel-icon" class="aegis-site-footer__contact-box-icon" width="27"
                            height="27">Contact:</h3>
                    <?php
					  $contactno1=str_replace(" ","",$aegisSettingsResultRow['contactno1']);
					  $contactno2=str_replace(" ","",$aegisSettingsResultRow['contactno2']);
					?>
                    <p class="aegis-site-footer__contact-box-p"><a href="tel:<?php echo $contactno1;?>"
                            class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['contactno1'];?></a>
                    </p>
                    <p class="aegis-site-footer__contact-box-p"><a href="tel:<?php echo $contactno2;?>"
                            class="aegis-site-footer__contact-box-links">
                            <?php echo $aegisSettingsResultRow['contactno2'];?></a></p>
                </div>
            </div>
        </div>
        <div class="aegis-site-footer__row3">
            <div class="aegis-site-footer-navbox">
                <ul class="aegis-site-footer-navbox-ul">
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/index.php';?>"
                            class="aegis-site-footer-navbox-links">Home</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/about-us.php';?>"
                            class="aegis-site-footer-navbox-links">About Us</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li"><a href="<?php echo $clientPath . '/our-services.php';?>"
                            class="aegis-site-footer-navbox-links">Services</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/gallery.php';?>"
                            class="aegis-site-footer-navbox-links">Gallery</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/contact-us.php';?>"
                            class="aegis-site-footer-navbox-links">Contact Us</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/moving-and-relocation.php';?>"
                            class="aegis-site-footer-navbox-links">Moving Relocation</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/warehousing.php';?>"
                            class="aegis-site-footer-navbox-links">Warehousing</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/logistics.php';?>"
                            class="aegis-site-footer-navbox-links">Logistics</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/customs-clearance.php';?>"
                            class="aegis-site-footer-navbox-links">Customs Clearance</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="office-and-industrial-moving.php" class="aegis-site-footer-navbox-links">Office &
                            Industrial Moving</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/furniture-fixtures-and-equipments-moving.php';?>"
                            class="aegis-site-footer-navbox-links">Furniture, Fixtures & Equipment</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/sea-freight.php';?>"
                            class="aegis-site-footer-navbox-links">Sea Freight </a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/air-freight.php';?>"
                            class="aegis-site-footer-navbox-links">Air Freight</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/gcc-transport.php';?>"
                            class="aegis-site-footer-navbox-links">GCC Transport</a>
                    </li>
                    <li class="aegis-site-footer-navbox-li">
                        <a href="<?php echo $clientPath . '/pet-relocation.php';?>"
                            class="aegis-site-footer-navbox-links">Pet Relocation</a>
                    </li>
                </ul>
            </div>
            <div class="copyright">Copyright @ <span id="copyright_year"></span>
                <?php echo $aegisSettingsResultRow['copyright'];?></div>
        </div>
    </div>

</footer>
<button class="move-to-top" title="Go to top"></button>
<?php 
    if($url === "localhost.mam.com.sa")
    {
		   $path=$clientPath . "/assets/js/scripts.js";
		   echo '<script src="' . $path . '"></script>';
    }
	else if($url === "localhost")
	{
			 $path=$clientPath . "/assets/js/scripts.js";
			 echo '<script src="' . $path . '"></script>';
    }
    else
	{
        if(($url === "mam.com.sa") || ($url === "www.mam.com.sa"))
	    {

		 	//  $path=$clientPath . "/assets/js/aegis.min.js";
			  $path=$clientPath . "/assets/js/scripts.js";
			  echo '<script async src="' . $path . '"></script>';
		}
	}
	$contactjsPath=$clientPath . "/assets/js/contactus.js";
?>
<script src="<?php echo $contactjsPath;?>" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Initialize Flatpickr -->
<script>
flatpickr("#estimated_date", {
    dateFormat: "m/d/Y", // MM/DD/YYYY format
    placeholder: "MM/DD/YYYY", // Optional: You can set the placeholder here too.
});
</script>
</body>

</html>