<div class="landing-page-form">
    <h3 class="landing-page-form__heading">Get Free Quote</h3>
    <form class="form landing-page-form__form-tag" method="post" name="frmgetfreequote" id="frmgetfreequote">

        <div class="form__row landing-page-form__row1">
            <div class="form__group">
                <div class="form__col">
                    <div class="form__field-container">
                        <!-- <label for="name" class="form__label">Name:</label> -->
                        <input type="text" class="form__input-text" placeholder="Name" id="name" name="name" required
                            oninput="validateInput(this)" pattern="[A-Za-z\s]+">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form__row landing-page-form__row3">
            <div class="form__group">
                <div class="form__col">
                    <div class="form__field-container">
                        <input type="text" class="form__input-text" placeholder="Phone" required id="phoneno"
                            onkeypress="return isNumberKey(event)" name="phoneno" maxlength="20">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form__row landing-page-form__row2">
            <div class="form__group">
                <div class="form__col">
                    <div class="form__field-container">
                        <input type="email" class="form__input-text" placeholder="E-mail" required id="email"
                            name="email">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
            </div>
        </div>



        <div class="form__row landing-page-form__row4">
            <div class="form__group">

                <div class="form__col">
                    <div class="form__field-container">
                        <input type="text" class="form__input-text" placeholder="Moving From Location"
                            name="moving_from_country" id="moving_from_country" pattern="[A-Za-z\s]+"
                            oninput="validateInput(this)" required>
                        <div class="form__validation">Validation</div>
                    </div>
                </div>

                <div class="form__col">
                    <div class="form__field-container">
                        <input type="text" class="form__input-text" placeholder="Moving To Location"
                            name="moving_to_country" id="moving_to_country" pattern="[A-Za-z\s]+"
                            oninput="validateInput(this)" required>
                        <div class="form__validation">Validation</div>
                    </div>
                </div>

            </div>
        </div>

        <div class="form__row landing-page-form__row5">
            <div class="form__group">
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">Preffered Moving Date:</label>
                        <input type="date" class="form__input-text" name="estimated_date" id="estimated_date">
                    </div>
                </div>
            </div>
        </div>

<!--    <div class="g-recaptcha" data-sitekey="6Ld9RLwqAAAAAJdtendBJXvo6WjFoV5GLIIfbScA"></div>   -->

        <div class="form__submit-wrapper">
            <button class="form__submit btn1" type="submit" name="btnsend" id="btnsend"
                onclick="submitRequest();">Submit</button>
        </div>

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