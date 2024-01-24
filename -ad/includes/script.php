<div>
    <div class="bs-toast toast toast-placement-ex success m-2 fade bg-success top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000">
        <div class="toast-header">
            <i class='bx bx-bell me-2'></i>
            <div class="me-auto fw-semibold">Operations</div>
            <small><i class="devicons devicons-onedrive"></i></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body s_msg">

        </div>
    </div>
    <div class="bs-toast toast toast-placement-ex error toast-e m-2 fade bg-danger top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000">
        <div class="toast-header">
            <i class='bx bx-bell me-2'></i>
            <div class="me-auto fw-semibold">Operations</div>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body e_msg">

        </div>
    </div>
</div>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>



<!-- Place this tag in your head or just before your close body tag. -->
<script async="" defer="" src="../buttons.js"></script>
<script>
    function off(self) {
        val = self.html();
        self.prop("disabled", true);
        self.html("please wait");

    }

    function error(self, msg = "Network Error") {
        const t = document.querySelector(".error");
        document.querySelector(".e_msg").innerHTML = msg;
        (c = new bootstrap.Toast(t)).show();
        self.removeAttr("disabled");
        self.html(val);
    }

    function success(self, msg = "Successfully Executed") {

        const t = document.querySelector(".success");
        document.querySelector(".s_msg").innerHTML = msg;
        (c = new bootstrap.Toast(t)).show();
        self.removeAttr("disabled");
        self.html(val);
    }
</script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    
    <script>
    const phoneInputField = document.querySelector("#Account_Tel_No");

    function getIp(callback) {
        fetch('https://ipinfo.io/json?token=601febcc36fe20', {
                headers: {
                    'Accept': 'application/json'
                }
            })

            .then((resp) => resp.json())
            .catch(() => {
                return {
                    country: 'us',
                };
            })
            .then((resp) => callback(resp.country));
    }

    const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "auto",
        geoIpLookup: getIp,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>