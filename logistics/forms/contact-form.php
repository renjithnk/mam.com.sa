<div class="contact-us-form">
    <h3 class="contact-us-form__heading">Post Your Enquiries here, we'll get back to you</h3>
    <form class="form aegis-question-form" method="post" name="frmcontactus" id="frmcontactus">

        <div class="form__row aegis-question-form__row1">
            <div class="form__col aegis-question-form__row1-col1">
                <div class="form__field-container">
                    <input type="text" class="form__input-text" placeholder="Name" id="name" name="name"
                        oninput="validateInput(this)" pattern="[A-Za-z\s]+" required>
                    <div class="form__validation">Validation</div>
                </div>
            </div>
        </div>

        <div class="form__row aegis-question-form__row2">
            <div class="form__col aegis-question-form__row2-col1">
                <div class="form__field-container">
                    <input type="email" class="form__input-text" placeholder="E-mail" required id="email" name="email">
                    <div class="form__validation">Validation</div>
                </div>
            </div>

            <div class="form__col aegis-question-form__row2-col1">
                <div class="form__field-container">
                    <input type="text" class="form__input-text" placeholder="Mobile No"
                        onkeypress="return isNumberKey(event)" required id="mobileno" name="mobileno" maxlength="20">
                    <div class="form__validation">Validation</div>
                </div>
            </div>
        </div>

        <div class="form__row aegis-question-form__row3">
            <div class="form__col aegis-question-form__row3-col">
                <textarea class="form__input-textarea" name="message" id="message" cols="30" rows="5"
                    placeholder="Message" pattern="[A-Za-z\s]+" oninput="validateInput(this)"></textarea>
            </div>
        </div>


    

        <div class="form__submit-wrapper">
            <button class="form__submit btn1" type="submit" name="btnsend" id="btnsend"
                onclick="submitEnquiry();">Submit</button>
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

        <input type="hidden" name="token" id="recaptcha_token">
        <div class="form-success" id="msgstatus" style="display:none;"></div>

    </form>

     <script>
        grecaptcha.ready(function() {
        grecaptcha.execute('6LcgQEMsAAAAAGTrpuQS6dPmcXD4clDGnVnoVojG', {action: 'login'}).then(function(token) {
            document.getElementById('recaptcha_token').value = token;
        });
    });
  </script>
</div>