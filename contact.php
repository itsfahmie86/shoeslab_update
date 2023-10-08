

<?php
include 'include/header.php';
include 'include/navigation.php';
?>


    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- ==================== End progress-scroll-button ==================== -->



    <!-- ==================== Start cursor ==================== -->

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- ==================== End cursor ==================== -->



    <!-- ==================== Start Navbar ==================== -->
    

    <!-- ==================== End Navbar ==================== -->



    <main>


        <!-- ==================== Start Jumbotron ==================== -->

        <header class="pg-header style2 bg-img parallaxie valign" data-background="assets/img/slider/3.jpg"
            data-overlay-dark="6">
            <div class="container-xxl ontop">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <div class="cont mb-80">
                            <h6 class="sub-title">
                                <span class="main-color">Contact</span>
                            </h6>
                            <h1 class="fw-800 fz-70">Contact Us .</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="curve">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100%" viewBox="0 0 100 100"
                    preserveAspectRatio="none">
                    <path d="M0 100 0 0 C15 120 35 120 100 0 L 100 100 Z" fill="#191b1d"></path>
                </svg>
            </div>
        </header>

        <!-- ==================== End Jumbotron ==================== -->



        <!-- ==================== Start Contact ==================== -->

        <section class="contact section-padding">
            <div class="container-xxl">

                <div class="row">

                    <div class="col-lg-8">
                        <div class="form md-mb50">
                            <h3 class="fw-700 mb-50">Get In Touch.</h3>
                            <form id="contact-form" method="POST">
                                <div class="controls">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="sm-mb30">
                                                    <input id="form_name" type="text" name="name" placeholder="Name"
                                                        required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <input id="form-email" type="email" name="email" placeholder="Email" onkeyup="validateEmail()"
                                                        required="required" spellcheck="false">
                                                        <span id="email-error" style="color: tomato; font-size: smaller;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input id="form_subject" type="text" name="subject" placeholder="Subject">
                                    </div>

                                    <div class="form-group">
                                        <textarea id="form_message" name="message" placeholder="Message" rows="4"
                                            required="required"></textarea>
                                    </div>

                                    <button class="sub-title mb-0 mt-30" type="submit" onclick="sendMail()">
                                        <span>Send Message</span></button>

                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col align-self-start">
                        <div class="form md-mb50">
                            <h3 class="fw-700 mb-50">Head Office:</h3>
                            <div class="item pb-30 mb-40">
                                <p>Shoeslab, Jl. Ciheulang No.27 RT.04/RW.11, Sekeloa, Kecamatan Coblong Kota Bandung,
                                    Jawa Barat 40134</p>
                                <a href="" class="mt-20 fz-13 fw-700 text-u ls1 main-color"><i
                                        class="pe-7s-paper-plane ml-5"></i> shoeslab27@gmail.com</a>
                                <br>
                                <a href="" class="mt-20 fz-13 fw-700 text-u ls1 main-color"><i
                                        class="pe-7s-call ml-5"></i> +62 855-2454-4731</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================== End Contact ==================== -->



    </main>


    <!-- ==================== Start Footer ==================== -->

    <?php
include 'include/footer.php';
?>

    <!-- ==================== End Footer ==================== -->


   
    <!-- jQuery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery-migrate-3.4.0.min.js"></script>

    <!-- plugins -->
    <script src="assets/js/plugins.js"></script>

    <!-- custom scripts -->
    <script src="assets/js/scripts.js"></script>


</body>

</html>