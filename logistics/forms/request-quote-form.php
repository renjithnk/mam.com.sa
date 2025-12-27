<div class="request-quote-form">
    <h3 class="request-quote-form__heading">Post Your Quote Details here, we'll get back to you</h3>
    <form class="form request-quote-form__form-tag" method="post" name="frmrequestquote" id="frmrequestquote">

        <div class="form__row request-quote-form__row1">
            <h3 class="form__row-heading request-quote-form__row-heading">Contact Details:</h3>
            <div class="form__group">
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">Name:</label>
                        <input type="text" class="form__input-text" placeholder="Name" required id="name" name="name"
                            oninput="validateInput(this)" pattern="[A-Za-z\s]+">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form__row request-quote-form__row2">
            <div class="form__group">
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">E-mail:</label>
                        <input type="email" class="form__input-text" placeholder="E-mail" required id="email"
                            name="email">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">Confirm E-mail:</label>
                        <input type="email" class="form__input-text" placeholder="Confirm E-mail" id="confirm_email"
                            name="confirm_email">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form__row request-quote-form__row3">
            <div class="form__group">
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">Phone:</label>
                        <input type="text" class="form__input-text" placeholder="Phone" required id="phoneno"
                            name="phoneno" onkeypress="return isNumberKey(event)" maxlength="20">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form__row request-quote-form__row4">
            <h3 class="form__row-heading">Shipping Details:</h3>
            <div class="form__group">
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">Moving From: City</label>
                        <input type="text" class="form__input-text" placeholder="City" name="moving_from_city"
                            id="moving_from_city" pattern="[A-Za-z\s]+" oninput="validateInput(this)" required>
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">Moving From: Country</label>
                        <input type="text" class="form__input-text" placeholder="Country" name="moving_from_country"
                            id="moving_from_country" pattern="[A-Za-z\s]+" oninput="validateInput(this)">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">Moving To: City</label>
                        <input type="text" class="form__input-text" placeholder="City" name="moving_to_city"
                            id="moving_to_city" required pattern="[A-Za-z\s]+" oninput="validateInput(this)">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">Moving To: Country</label>
                        <input type="text" class="form__input-text" placeholder="Country" name="moving_to_country"
                            id="moving_to_country" pattern="[A-Za-z\s]+" oninput="validateInput(this)">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>



            </div>
        </div>

        <div class="form__row request-quote-form__row5">
            <div class="form__group">
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">Estimated Date:</label>
                        <input type="date" class="form__input-text" name="estimated_date" id="estimated_date">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
                <div class="form__col">
                    <div class="form__field-container">
                        <label for="name" class="form__label">Delivery Date:</label>
                        <input type="date" class="form__input-text" name="delivery_date" id="delivery_date">
                        <div class="form__validation">Validation</div>
                    </div>
                </div>
            </div>
        </div>


<!--    <div class="g-recaptcha" data-sitekey="6Ld9RLwqAAAAAJdtendBJXvo6WjFoV5GLIIfbScA"></div>   -->


        <div class="form__submit-wrapper">
            <button class="form__submit btn1" type="submit" name="btnsend" id="btnsend"
                onclick="submitRequestQuote();">Submit</button>
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