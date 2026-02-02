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
            <div class="contact-us-page-contact-box__content"><?php echo $aegisSettingsResultRow['address1']; ?>,<br>
              <?php echo $aegisSettingsResultRow['address2']; ?><br> <?php echo $aegisSettingsResultRow['address3']; ?>
              <?php echo $aegisSettingsResultRow['address4']; ?> <br> <?php echo $aegisSettingsResultRow['country']; ?>
            </div>
          </div>
          <div class="contact-us-page-contact-box__items">
            <h4 class="contact-us-page-contact-box__heading">E-mail</h4>
            <div class="contact-us-page-contact-box__content">
              <p><a href="mailto:<?php echo $aegisSettingsResultRow['email1']; ?> class="
                  aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['email1']; ?></a></p>
              <!-- <p class="aegis-site-footer__contact-box-p">
                <a href="mailto:<?php echo $aegisSettingsResultRow['email2']; ?>" class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['email2']; ?>
                </a>
                </p> -->
            </div>
          </div>
          <div class="contact-us-page-contact-box__items">
            <h4 class="contact-us-page-contact-box__heading">Contact:</h4>
            <div class="contact-us-page-contact-box__content">
              <p class="aegis-site-footer__contact-box-p"><a
                  href="tel:<?php echo $aegisSettingsResultRow['contactno1']; ?>"
                  class="aegis-site-footer__contact-box-links"><?php echo $aegisSettingsResultRow['contactno1']; ?></a>
              </p>
              <p class="aegis-site-footer__contact-box-p"><a
                  href="tel:<?php echo $aegisSettingsResultRow['contactno2']; ?>"
                  class="aegis-site-footer__contact-box-links"> <?php echo $aegisSettingsResultRow['contactno2']; ?></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="site-content__section map no-padding-top">
    <div class="container-fluid map__container">
      <h3 class="map__heading">Locate Us:</h3>
      <iframe class="map__iframe" src="<?php echo $aegisSettingsResultRow['location_map']; ?>" width="100%" height="350"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>


  <div class="site-content__section contact-writeup no-padding-top">
    <div class="container contact-writeup__container">
      <div class="contact-writeup__box">
        <p><?php echo $aegisSettingsResultRow['description']; ?>.</p>
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
          <img
            src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image1']; ?>"
            alt="<?php echo $logisticssolutionsResultRow["icon_image1_alt"]; ?>"
            class="aegis-solution__listbox-items-icon">
          <span
            class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image1_description"]; ?></span>
        </div>
        <div class="aegis-solution__listbox-items">
          <img
            src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image2']; ?>"
            alt="<?php echo $logisticssolutionsResultRow["icon_image2_alt"]; ?>"
            class="aegis-solution__listbox-items-icon">
          <span
            class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image2_description"]; ?></span>
        </div>
        <div class="aegis-solution__listbox-items">
          <img
            src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image3']; ?>"
            alt="<?php echo $logisticssolutionsResultRow["icon_image3_alt"]; ?>"
            class="aegis-solution__listbox-items-icon">
          <span
            class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image3_description"]; ?></span>
        </div>
        <div class="aegis-solution__listbox-items">
          <img
            src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image4']; ?>"
            alt="<?php echo $logisticssolutionsResultRow["icon_image4_alt"]; ?>"
            class="aegis-solution__listbox-items-icon">
          <span
            class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image4_description"]; ?></span>
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
                alt="<?php echo @$members_inResultRow['image2_alt']; ?>" class="aegis-member-box__logo" width="224"
                height="74" loading="lazy">
            </div>
            <div class="aegis-member-box__col2">
              <img src="assets/images/iam-logo.svg" class="aegis-member-box__logo" width="224" height="74"
                loading="lazy">
            </div>
            <div class="aegis-member-box__col3">
              <img src="assets/images/global-logistics-alliance-logo.webp" class="aegis-member-box__logo" width="224"
                height="74" loading="lazy">
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include("templates/footer.php") ?>
</body>

</html>