<html>

<head>
    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
</head>

<body>

    <div class="bg-dark text-white" id="footer">
        <div class="container-fluid page__container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="brand d-flex align-items-center mb-4">
                        <span class="mr-2">
                            <!-- LOGO -->
                            <img src="../logo.jpg" alt="" class="rounded-circle" width="54" height="54">

                        </span>
                        Web Based Exit Examination System For Arsi University
                    </a>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">

                            © <?php echo date("Y"); ?> All rights reserved

                        </div>
                        <div class="col-sm-6 col-md-3">

                            Designed by: Arsi university 2022 Graduates.

                        </div>

                        <div class="float-right col-4">
                            <button onclick="topFunction()" class="btn btn-info float-right" title="Go to top">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    </div>


    <!-- jQuery -->
    <script src="../assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/vendor/popper.min.js"></script>
    <script src="../assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="../assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="../assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="../assets/vendor/material-design-kit.js"></script>

    <!-- Range Slider -->
    <script src="../assets/vendor/ion.rangeSlider.min.js"></script>
    <script src="../assets/js/ion-rangeslider.js"></script>

    <!-- App -->
    <script src="../assets/js/toggle-check-all.js"></script>
    <script src="../assets/js/check-selected-row.js"></script>
    <script src="../assets/js/dropdown.js"></script>
    <script src="../assets/js/sidebar-mini.js"></script>
    <script src="../assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="../assets/js/app-settings.js"></script>




</body>


<!-- Mirrored from lema.frontted.com/fixed-student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Apr 2022 20:32:59 GMT -->

</html>