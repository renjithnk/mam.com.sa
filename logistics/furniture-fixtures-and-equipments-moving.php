<?php 
include("templates/header.php");
$sql = "SELECT * FROM service where id=6 and status=0";
$db = new Database();
$result = $db->query($sql);
if(@$result->num_rows > 0) 
{
  $row = $result->fetch_array();
}
$faqSql="select * from faq where service_id=6 and status=0";
$faqResult = $db->query($faqSql);
?>


<div class="site-content subpage-content about-us">

    <div class="site-content__section subpage-banner">
        <img src="<?php echo $clientPath . "/admin/uploads/service/" . $row['image']; ?>"
            alt="<?php echo $row['alt'];?>" class="subpage-banner__img">
        <h1 class="subpage-banner__heading"><?php echo $row['caption'];?></h1>
    </div>

    <div class="aegis-header-static-box">
        <div class="aegis-header-static-box__col1">
            <div class="aegis-header-static-box__col1-box">
                <img src="../logistics/assets/images/safe-and-affordable-icon.svg" alt="safe-and-affordable"
                    class="aegis-header-static-box__col1-box-icon" loading="lazy" width="65" height="57">
                <div class="aegis-header-static-box__col1-box-text"><?php echo $aegisSettingsResultRow['caption'];?>
                </div>
            </div>
        </div>
        <div class="aegis-header-static-box__col2">
            <div class="aegis-header-static-box__col2-emails">
                <div class="aegis-header-static-box__col2-emails-label">
                    <img src="../logistics/assets/images/email-icon-white.svg" alt="email-icon"
                        class="aegis-header-static-box__col2-emails-label-icon" width="22" height="18" loading="lazy">
                    E-mail Us at
                </div>
                <div class="aegis-header-static-box__col2-emails-container">
                    <a href="mailto:<?php echo $aegisSettingsResultRow['email1'];?>"
                        class="aegis-header-static-box__col2-emails-links"><?php echo $aegisSettingsResultRow['email1'];?></a>
                    <span class="aegis-header-static-box__col2-emails-splitter"></span>
                    <a href="mailto:<?php echo $aegisSettingsResultRow['email2'];?>"
                        class="aegis-header-static-box__col2-emails-links"><?php echo $aegisSettingsResultRow['email2'];?></a>
                </div>
            </div>
            <div class="aegis-header-static-box__col2-telno">
                <div class="aegis-header-static-box__col2-telno-label">
                    <img src="../logistics/assets/images/tel-icon-white.svg" alt="tel-icon"
                        class="aegis-header-static-box__col2-emails-label-icon" loading="lazy" width="16" height="16">
                    For Enquiries Call
                </div>
                <?php
				$contactno1=str_replace(" ","",$aegisSettingsResultRow['contactno1']);
			?>
                <a href="tel:<?php echo $contactno1;?>"
                    class="aegis-header-static-box__col2-telno-link"><?php echo $aegisSettingsResultRow['contactno2'];?></a>
            </div>
        </div>
    </div>

    <div class="site-content__section subpage-main-content">
        <div class="subpage-content__section subpage-main-content__double-column-container">
            <div class="subpage-main-content__col1">
                <div class="subpage-main-content__col1-section">
                    <?php 
	  	 if(($_SERVER['HTTP_HOST'] == "localhost") || ($_SERVER['HTTP_HOST'] == "localhost.alim"))
		 {
			 $row['description']=str_replace("/uploads/images",$mainImgPath . "uploads/images",$row['description']);
		 }
		 $row['description']=str_replace("../uploads/",$clientPath . "/admin/uploads/",$row['description']);
	     echo $row['description'];?>

                    <div class="contact-us-subpage-box">
                        <div class="contact-us-subpage-box__label">Call for Enquiries: </div><a
                            href="tel:<?php echo $aegisSettingsResultRow['contactno2'];?>"
                            class="contact-us-subpage-box__number"><?php echo $aegisSettingsResultRow['contactno2'];?></a>
                        <div class="contact-us-subpage-box__or">Or</div>
                        <a href="request-a-quote.php" class="btn2 contact-us-subpage-box__link">Request Quote</a>
                    </div>
                </div>
                <?php
		$landingpagevideoSql = "SELECT * FROM videos where service_id=6 and status=0";
		$landingpagevideoResult = $db->query($landingpagevideoSql);
		$landingpagevideoResultRow = $landingpagevideoResult->fetch_array();
		if($landingpagevideoResultRow)
		{
	?>
                <div class="site-content__section no-padding-top video-services-page">
                    <iframe width="800" height="400" src="<?php echo $landingpagevideoResultRow['video_url'];?>"
                        frameborder="0" allowfullscreen></iframe>
                </div>
                <?php
		}
	?>
            </div>
            <div class="subpage-main-content__col2">
                <?php include('templates/sidebar-services.php') ?>
                <?php
						$conn = new mysqli($blogHost, $blogDBUsername, $blogDBPassword, $blogDBName);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						// Query WordPress database for blog posts
						$sql = "SELECT * FROM wp_posts inner join wp_term_relationships on wp_posts.ID=wp_term_relationships.object_id where wp_term_relationships.term_taxonomy_id=7 and wp_posts.post_status = 'publish' and wp_posts.wp_posts_dispay=1 LIMIT 4";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
						{
						
				?>
                <div class="related-blog-listing">
                    <h2 class="related-blog-listing__heading">Related Articles</h2>
                    <div class="related-blog-listing__content">
                        <ul class="related-blog-listing__ul">
                            <?php
														
																while($row = $result->fetch_assoc())
																{
																		$postTitle=str_replace(" ","-",$row["post_title"]);
																		$blogPath=$blogURL . $postTitle;
																	?>
                            <li class="related-blog-listing__li"><a href="<?php echo $blogPath; ?>"
                                    class="related-blog-listing__link"><?php echo $row["post_title"]; ?></a></li>
                            <?php
																}
														
													 ?>
                        </ul>
                    </div>
                </div>
                <?php
					    }
				    ?>
            </div>
        </div>

        <div class="site-content__section aegis-testimonials no-padding-top">
            <div class="aegis-testimonials__container container-fluid">
                <h3 class="aegis-testimonials__heading">Testimonials</h3>
                <div class="swiper2 aegis-testimonials__swiper2">
                    <div class="swiper-wrapper aegis-testimonials__wrapper">
                        <?php
				$sql = "SELECT * FROM service_pages_testimonial where service_id=6 and status=0 order by id desc";
				$result = $db->query($sql);
				if(@$result->num_rows > 0) 
				{
						$sliderPath="";
						while ($row = $result->fetch_array()) 
						{
			   ?>
                        <div class="swiper-slide aegis-testimonials__slide">
                            <img class="aegis-testimonials__quote"
                                src="../logistics/assets/images/testimonials-quote.svg" width="67" height="41"
                                alt="testimonials-quote" loading="lazy">
                            <?php 
								 $row['comment']=str_replace("../uploads/",$clientPath . "/admin/uploads/",$row['comment']);
								 echo $row['comment']; ?>
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
                    <div class="leave-review no-padding-top">
                        <a href="https://g.page/r/Cd_MIk29TWozEBM/review" target='_blank' class="leave-review__link">
                            <img src="assets/images/leave-review-button.svg" alt="" class="leave-review__image"></a>
                    </div>
                </div>
            </div>
        </div>




        <div class="subpage-content__section">
            <?php
if (@$faqResult->num_rows > 0) 
{
	?>
            <div class="faq">
                <h2 class="faq__heading">FAQ</h2>
                <div class="faq__container">
                    <?php
							 while (@$faqRow = $faqResult->fetch_array()) 
							 {
							 			 $faqRow['description']=str_replace("../uploads/",$clientPath . "/admin/uploads/",$faqRow['description']);
					  ?>
                    <div class="faq__item">
                        <h2 class="faq__item-header">
                            <?php echo $faqRow["caption"]; ?>
                            <span class="faq__item-header-icon"></span>
                        </h2>
                        <div class="faq__item-body">
                            <div class="faq__item-body-content"><?php echo $faqRow["description"]; ?> </div>
                        </div>
                    </div>
                    <?php
							 }
					?>
                </div>
            </div>
            <?php
	}
?>


        </div>
    </div>

    <div>

    </div>


    <?php	
	$sql = "SELECT * FROM members_in where id=1 and status=0";
	$members_inResult = $db->query($sql);
	$members_inResultRow = $members_inResult->fetch_array();
?>
    <div class="site-content__section aegis-member">
        <div class="aegis-member__container container-fluid">
            <div class="aegis-member__col1">
                <img src="<?php echo $clientPath . "/admin/uploads/members_in/" . $members_inResultRow['image1']; ?>"
                    alt="<?php echo @$members_inResultRow['image1_alt']; ?>" class="aegis-member__col1-img" width="630"
                    height="320" loading="lazy">
            </div>
            <div class="aegis-member__col2">
                <div class="aegis-member-box">
                    <div class="aegis-member-box__row1">
                        <h3 class="aegis-member-box__heading"><?php echo $members_inResultRow['title']; ?></h3>
                        <p class="aegis-member-box__p"><?php echo $members_inResultRow['description']; ?></p>
                    </div>
                    <div class="aegis-member-box__row2">

                        <div class="aegis-member-box__col1">
                            <img src="<?php echo $clientPath . "/admin/uploads/members_in/" . $members_inResultRow['image2']; ?>"
                                alt="<?php echo @$members_inResultRow['image2_alt']; ?>" class="aegis-member-box__logo"
                                width="224" height="74" loading="lazy">
                        </div>
                        <div class="aegis-member-box__col2">
                            <img src="assets/images/iam-logo.svg" class="aegis-member-box__logo" width="224" height="74"
                                loading="lazy">
                        </div>
                        <div class="aegis-member-box__col3">
                            <img src="assets/images/global-logistics-alliance-logo.webp" class="aegis-member-box__logo"
                                width="224" height="74" loading="lazy">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

<?php include("templates/footer.php") ?>