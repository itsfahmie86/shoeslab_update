<?php
    include 'include/header.php';
    include 'include/navigation.php';

    $base_url = 'https://shoeslab.id';
    $limit = 3; // Ganti dengan jumlah item yang Anda inginkan
    $startIndex = 0; // Ganti dengan halaman awal yang Anda inginkan

    $response = file_get_contents("{$base_url}/v1/gallery?pageSize={$limit}&page={$startIndex}");

    $data = json_decode($response, true);
?>
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


    <main>
        <header class="pg-header style2 bg-img parallaxie valign" data-background="assets/img/slider/1.jpg"
            data-overlay-dark="6">
            <div class="container-xxl ontop">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <div class="cont mb-80">
                            <div class="cont mb-80">
                                <div class="qout-icon mb-30">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="82" height="79" viewBox="0 0 82 79"
                                        fill="none">
                                        <path
                                            d="M20.6258 36.5H1V1H36.7301V37.3128L20.9472 78H5.98811L21.5581 37.8617L22.0863 36.5H20.6258Z"
                                            stroke="#fff" stroke-width="1"></path>
                                        <path
                                            d="M64.8957 36.5H45.2699V1H81V37.3128L65.2172 78H50.2581L65.828 37.8617L66.3562 36.5H64.8957Z"
                                            stroke="#fff" stroke-width="1"></path>
                                    </svg>
                                </div>
                                <h3 class="fw-700">"Art is not what you see, but what you make others see."</h3>
                                <h6 class="sub-title main-color">- Edgar Degas</h6>
                            </div>
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


        <!-- ==================== Start Slider ==================== -->
        <section class="portfolio section-padding pb-90" data-scroll-index="0">
            <div class="container-xxl">

                <div class="row">
                    <div class="col-lg-7">
                        <div class="sec-head mb-80">
                            <h3 class="fw-800">
                                <span class="stroke">Our</span> Works .
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="gallery sam-height" style="height: 1380px;">

                    <div class="row mb-40" id="template-images">
                        <!-- Looping component start -->
                        <?php
                        // Loop melalui data yang telah diambil dari API
                        foreach ($data['data'] as $item) {
                            echo '<div class="col-lg-4 col-md-6 items info-shadow mb-40" style="position: absolute; left: 0px; top: 460px;">';
                            echo '<div class="item-img">';
                            echo '<a href="' . $item['link'] . '" class="imago wow animated fadeInUp" style="visibility: visible;">';
                            echo '<div class="inner wow animated fadeInUp" style="visibility: visible;">';
                            echo '<img src="' . $base_url . $item['path'] . '" alt="image" class="radius-5 skeleton">';
                            echo '</div></a>';
                            echo '<div class="info">';
                            echo '<h6><a href="' . $item['link'] . '">' . $item['title'] . '</a></h6>';
                            echo '<span class="sub-title tag opacity-7 mb-0 mt-10"><a href="' . $item['link'] . '">View On Instagram</a></span>';
                            echo '</div></div></div>';
                        }
                        ?>
                        <!-- <div class="col-lg-4 col-md-6 items info-shadow mb-40"
                            style="position: absolute; left: 0px; top: 0px;">
                            <div class="item-img">
                                <a href="" class="imago wow animated fadeInUp"
                                    style="visibility: visible;">
                                    <div class="inner wow animated fadeInUp" style="visibility: visible;">
                                        <img id="images" src="assets/img/gallery/1.jpg" alt="image" class="radius-5 skeleton">
                                    </div>
                                </a>
                                <div class="info">
                                    <h6>
                                        <a id="link1" href="https://www.instagram.com/_shoeslab/?hl=en">
                                            Premium Treatment
                                        </a>
                                    </h6>
                                    <span class="sub-title tag opacity-7 mb-0 mt-10">
                                        <a
                                            id="link2"
                                            href="https://www.instagram.com/_shoeslab/?hl=en">View On
                                            Instagram
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div> -->
                        <!-- Looping component end -->
                    </div>

                </div>

            </div>
        </section>

        <!-- ==================== End Slider ==================== -->

    </main>

    <div class="gallery sam-height">
    <div class="row" id="imageShow"></div>
</div>

<!-- <script>
    let currentIndex = 0
    const loadAmount = 3
    const base_url = 'https://shoeslab.id'    
    const limit = 10; // Ganti dengan jumlah item yang Anda inginkan
    const startIndex = 0; // Ganti dengan halaman awal yang Anda inginkan
    const blogs = document.getElementById("showImages")
    const link = await fetch(`${base_url}/v1/gallery`);

    function populateData() {
        // Panggil API untuk mendapatkan data
        // Misalnya, menggunakan fetch() untuk mengambil data JSON dari API
        fetch(link)
            .then(response => response.json())
            .then(data => {
                data.data.forEach(image=> {
                    document.getElementById('images').src = image.path;
                    document.getElementById('link1').href = image.link;
                    document.getElementById('link1').innerText = image.title;
                    document.getElementById('link2').href = image.link;
                    document.getElementById('link2').innerText = 'show';
                    
                });
            })
            .catch(error => {
                console.error('Terjadi kesalahan saat mengambil data dari API:', error);
            });
    }

    // Panggil fungsi populateData() untuk mengisi elemen-elemen
    populateData();

</script> -->

<style>
    .skeleton {
        animation: skeleton-loading 1s linear infinite alternate;
    }

    @keyframes skeleton-loading {
        0% {
            background-color: hsl(200, 20%, 80%);
        }
        100% {
            background-color: hsl(200, 20%, 95%);
        }
    }

</style>


    <?php
    include 'include/footer.php';
?>