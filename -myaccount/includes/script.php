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
<script src="../nice-select/dist/js/nice-select2.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<!-- <script src="../assets/js/dashboards-analytics.js"></script> -->

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

    function success(self,msg = "Successfully Executed") {
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

 <script>
       document.addEventListener("DOMContentLoaded", function(e){
         var options = {searchable: true, placeholder:"Language"};
         NiceSelect.bind(document.getElementById("seachable-select"), options); 
       });
     </script>
 <script type="text/javascript">
    function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
    </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>    
<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>
<script src="//code.tidio.co/av1dsasze6pcyeqemgonlyhlq6guqyoj.js" async></script>
