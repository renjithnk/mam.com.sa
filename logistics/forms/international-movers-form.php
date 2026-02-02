<div class="landing-page-form">
    <h3 class="landing-page-form__heading">Get Free Quote</h3>

    <form class="form landing-page-form__form-tag" method="post" name="frminternationalmovers"
        id="frminternationalmovers" action="functions/international-movers-form.php"
        onsubmit="return submitInternationalmovers();">

        <!-- NAME -->
        <div class="form__row">
            <div class="form__field-container">
                <input type="text" class="form__input-text" placeholder="Name" id="name" name="name" required>
            </div>
        </div>

        <!-- PHONE (intl-tel-input visible field) -->
        <div class="form__row">
            <div class="form__field-container">
                <input type="tel" class="form__input-text" id="phone" placeholder="Phone Number">
            </div>
        </div>

        <!-- 🔥 REQUIRED HIDDEN FIELDS (VERY IMPORTANT) -->
        <input type="hidden" name="phoneno" id="phoneno">
        <input type="hidden" name="country_code" id="country_code">

        <!-- EMAIL -->
        <div class="form__row">
            <div class="form__field-container">
                <input type="email" class="form__input-text" placeholder="E-mail" id="email" name="email" required>
            </div>
        </div>

        <!-- MOVING FROM -->
        <div class="form__row">
            <div class="form__field-container">
                <input type="text" class="form__input-text" placeholder="Moving From Country" id="moving_from_country"
                    name="moving_from_country" required>
            </div>
        </div>

        <!-- MOVING TO -->
        <div class="form__row">
            <div class="form__field-container">
                <input type="text" class="form__input-text" placeholder="Moving To Country" id="moving_to_country"
                    name="moving_to_country" required>
            </div>
        </div>

        <!-- ESTIMATED DATE -->
        <div class="form__row">
            <div class="form__field-container">
                <label class="form__label">Preferred Moving Date</label>
                <input type="text" class="form__input-text" id="estimated_date" name="estimated_date"
                    placeholder="MM/DD/YYYY">
            </div>
        </div>
        <div class="g-recaptcha" data-sitekey="6Lc74lIsAAAAAGehDtc9u4j_rOKRn8ERT9jwdZiQ"></div>
        <!-- SUBMIT -->
        <div class="form__submit-wrapper">
            <button class="form__submit btn1" type="submit">
                Submit
            </button>
        </div>

        <!-- ERRORS / LOADING -->
        <div class="form-validation" id="errmsg"></div>

        <div class="form-loading" id="loading" style="display:none;">
            <div class="form-loader enable-form-loader">
                <div class="form-loader-wrapper">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

        </div>

        <div class="form-success" id="msgstatus" style="display:none;"></div>

    </form>
</div>