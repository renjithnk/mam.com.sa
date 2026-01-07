<?php include("templates/header.php") ?>

<div class="site-content subpage-content about-us">
  
<div class="site-content__section subpage-banner">
  <img src="../tours-and-travels/assets/images/contact-banner.webp" alt="" class="subpage-banner__img">
  <div class="subpage-banner__heading">Contact Us</div>
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
          <div class="contact-us-page-contact-box__content">Awidah street, Malaz, Riyadh - 12836, Kingdom of Saudi Arabia 
</div>
        </div>
        <div class="contact-us-page-contact-box__items">
          <h4 class="contact-us-page-contact-box__heading">E-mail</h4>
          <div class="contact-us-page-contact-box__content">
            <p><a href="mailto:reservations@mam.com.sa" class="aegis-site-footer__contact-box-links">reservations@mam.com.sa</a></p>
            
          </div>
        </div>
        <div class="contact-us-page-contact-box__items">
          <h4 class="contact-us-page-contact-box__heading">Contact:</h4>
          <div class="contact-us-page-contact-box__content">
          <p class="aegis-site-footer__contact-box-p"><a href="tel:+966114995813" class="aegis-site-footer__contact-box-links">+966 11 499 5813</a></p>
          <p class="aegis-site-footer__contact-box-p"><a href="tel:+966555881748" class="aegis-site-footer__contact-box-links"> +966 555 881 748</a></p>
          <p class="aegis-site-footer__contact-box-p"><a href="tel:++966565847543" class="aegis-site-footer__contact-box-links"> +966 565 847 543</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="site-content__section map no-padding-top">
  <div class="container-fluid map__container">
    <h3 class="map__heading">Locate Us:</h3>
  <iframe class="map__iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3625.683284626025!2d46.731897399999994!3d24.669027699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f0527c1215df7%3A0x336a4dbd4d22ccdf!2sAegis%20Logistics%20and%20International%20Movers!5e0!3m2!1sen!2ssa!4v1695557617527!5m2!1sen!2ssa" width="100%" height="350" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>


<div class="alim-service-points site-content__section">
  <div class="alim-service-points__container container-fluid">
    <div class="alim-service-points__box">
      <a href="flights.php" class="alim-service-points__items">
        <img src="../tours-and-travels/assets/images/airplane-icon.svg" alt="" class="alim-service-points__icon">
        <span class="alim-service-points__name">Easy Flight Booking</span>
      </a>
      <a href="hotels.php" class="alim-service-points__items">
        <img src="../tours-and-travels/assets/images/hotel-booking-icon.svg" alt="" class="alim-service-points__icon">
        <span class="alim-service-points__name">Hassle Free Hotel Reservation</span>
      </a>
      <a href="visa.php" class="alim-service-points__items">
        <img src="../tours-and-travels/assets/images/visa-icon.svg" alt="" class="alim-service-points__icon">
        <span class="alim-service-points__name">Full-fledged Visa Procurement</span>
      </a>
      <a href="holidays.php" class="alim-service-points__items">
        <img src="../tours-and-travels/assets/images/tailormade-icon.svg" alt="" class="alim-service-points__icon">
        <span class="alim-service-points__name">Tailor Made Tour Packages</span>
      </a>
    </div>
  </div>
</div>


</div>

<?php include("templates/footer.php") ?>