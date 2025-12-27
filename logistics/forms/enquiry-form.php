<form class="form aegis-question-form" method="post" name="frmcontactus" id="frmcontactus">
    <div class="form__row aegis-question-form__row1">
        <div class="form__col aegis-question-form__row1-col1">
            <div class="form__field-container">
                <input type="text" class="form__input-text" id="name" name="name" required placeholder="Name"
                    pattern="[A-Za-z\s]+" oninput="validateInput(this)">
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
                <input type="text" class="form__input-text" placeholder="Mobile No" required id="mobileno"
                    name="mobileno" onkeypress="return isNumberKey(event)">
                <div class="form__validation">Validation</div>
            </div>
        </div>
    </div>

    <div class="form__row aegis-question-form__row3">
        <div class="form__col aegis-question-form__row3-col">
            <textarea class="form__input-textarea" name="message" id="message" cols="30" rows="5" placeholder="Message"
                pattern="[A-Za-z\s]+" oninput="validateInput(this)"></textarea>
        </div>
    </div>
	
<!--	<div class="g-recaptcha" data-sitekey="6Ld9RLwqAAAAAJdtendBJXvo6WjFoV5GLIIfbScA"></div>  -->

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
    <div class="form-success" id="msgstatus" style="display:none;"></div>

</form>