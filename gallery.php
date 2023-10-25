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

                <div class="gallery sam-height" style="position: relative; height: 1380px;">

                    <div class="row  mb-40" id="imageShow">

                        <!-- <div class="col-lg-4 col-md-6 items info-shadow mb-40"
                            style="position: absolute; left: 0px; top: 0px;">
                            <div class="item-img">
                                <a href="https://www.instagram.com/_shoeslab/?hl=en" class="imago wow animated fadeInUp"
                                    style="visibility: visible;">
                                    <div class="inner wow animated fadeInUp" style="visibility: visible;">
                                        <img src="assets/img/gallery/1.jpg" alt="image" class="radius-5">
                                    </div>
                                </a>
                                <div class="info">
                                    <h6><a href="https://www.instagram.com/_shoeslab/?hl=en">Premium Treatment</a></h6>
                                    <span class="sub-title tag opacity-7 mb-0 mt-10"><a
                                            href="https://www.instagram.com/_shoeslab/?hl=en">View On
                                            Instagram</a></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-6 items info-shadow mb-40"
                            style="position: absolute; left: 459px; top: 0px;">
                            <div class="item-img">
                                <a href="https://www.instagram.com/_shoeslab/?hl=en" class="imago wow animated fadeInUp"
                                    style="visibility: visible;">
                                    <div class="inner wow animated fadeInUp" style="visibility: visible;">
                                        <img src="assets/img/gallery/3.jpg" alt="image" class="radius-5">
                                    </div>
                                </a>
                                <div class="info">
                                    <h6><a href="https://www.instagram.com/_shoeslab/?hl=en">Deep Cleaning</a></h6>
                                    <span class="sub-title tag opacity-7 mb-0 mt-10"><a
                                            href="https://www.instagram.com/_shoeslab/?hl=en">View On
                                            Instagram</a></span>
                                </div>
                            </div>
                        </div> -->

                    </div>

                </div>

            </div>
        </section>

        <!-- ==================== End Slider ==================== -->

    </main>

    <script>
    const container = document.getElementById("imageShow");

    fetch('https://shoeslab.id/v1/gallery')
    .then((response) => {
        if (!response.ok) {
        throw new Error('Gagal mengambil data dari API');
        }
        return response.json();
    })
    .then((data) => {
        data.data.forEach((item) => {
            const itemDiv = document.createElement("div");
            itemDiv.className = item.size === "big" ? "col-lg-8 col-md-6 items info-shadow mb-40" : "col-lg-4 col-md-6 items info-shadow mb-40";
            itemDiv.style.position = "absolute";
            itemDiv.style.left = "0px";
            itemDiv.style.top = "0px";

            const itemImgDiv = document.createElement("div");
            itemImgDiv.className = "item-img";

            const aLink = document.createElement("a");
            aLink.href = item.link;
            aLink.target = "_blank";
            aLink.className = "imago wow animated fadeInUp";
            aLink.style.visibility = "visible";

            const innerDiv = document.createElement("div");
            innerDiv.className = "inner wow animated fadeInUp";
            innerDiv.style.visibility = "visible";

            const img = document.createElement("img");
            img.src = `https://shoeslab.id${item.path}`;
            img.alt = "image";
            img.className = "radius-5";

            const infoDiv = document.createElement("div");
            infoDiv.className = "info";

            const h6 = document.createElement("h6");
            const h6Link = document.createElement("a");
            h6Link.href = item.link;
            h6Link.target = "_blank"
            h6Link.textContent = item.title;
            h6.appendChild(h6Link);

            const subTitle = document.createElement("span");
            subTitle.className = "sub-title tag opacity-7 mb-0 mt-10";
            const subTitleLink = document.createElement("a");
            subTitleLink.href = item.link;
            subTitleLink.target = "_blank"
            subTitleLink.textContent = "View On Instagram";
            subTitle.appendChild(subTitleLink);

            innerDiv.appendChild(img);
            aLink.appendChild(innerDiv);
            itemImgDiv.appendChild(aLink);
            infoDiv.appendChild(h6);
            infoDiv.appendChild(subTitle);
            itemImgDiv.appendChild(infoDiv);
            itemDiv.appendChild(itemImgDiv);

            container.appendChild(itemDiv);
        })
    })
    .catch((error) => {
        console.error('Kesalahan:', error);
    });
    </script>


    <?php
    include 'include/footer.php';
?>




<!-- <div class="col-lg-4 col-md-6 items info-shadow mb-40"
    style="position: absolute; left: 0px; top: 460px;">
    <div class="item-img">
        <a href="https://www.instagram.com/_shoeslab/?hl=en" class="imago wow animated fadeInUp"
            style="visibility: visible;">
            <div class="inner wow animated fadeInUp" style="visibility: visible;">
                <img src="assets/img/gallery/2.jpg" alt="image" class="radius-5">
            </div>
        </a>
        <div class="info">
            <h6><a href="https://www.instagram.com/_shoeslab/?hl=en">Repair</a></h6>
            <span class="sub-title tag opacity-7 mb-0 mt-10"><a
                    href="https://www.instagram.com/_shoeslab/?hl=en">View On
                    Instagram</a></span>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 items info-shadow mb-40"
    style="position: absolute; left: 459px; top: 460px;">
    <div class="item-img">
        <a href="https://www.instagram.com/_shoeslab/?hl=en" class="imago wow animated fadeInUp"
            style="visibility: visible;">
            <div class="inner wow animated fadeInUp" style="visibility: visible;">
                <img src="assets/img/gallery/4.jpg" alt="image" class="radius-5">
            </div>
        </a>
        <div class="info">
            <h6><a href="https://www.instagram.com/_shoeslab/?hl=en">Repair</a></h6>
            <span class="sub-title tag opacity-7 mb-0 mt-10"><a
                    href="https://www.instagram.com/_shoeslab/?hl=en">View On
                    Instagram</a></span>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 items info-shadow mb-40"
    style="position: absolute; left: 918px; top: 460px;">
    <div class="item-img">
        <a href="https://www.instagram.com/_shoeslab/?hl=en" class="imago wow animated fadeInUp"
            style="visibility: visible;">
            <div class="inner wow animated fadeInUp" style="visibility: visible;">
                <img src="assets/img/gallery/6.jpg" alt="image" class="radius-5">
            </div>
        </a>
        <div class="info">
            <h6><a href="https://www.instagram.com/_shoeslab/?hl=en">Repaint</a></h6>
            <span class="sub-title tag opacity-7 mb-0 mt-10"><a
                    href="https://www.instagram.com/_shoeslab/?hl=en">View On
                    Instagram</a></span>
        </div>
    </div>
</div>

<div class="col-lg-8 col-md-6 items info-shadow mb-40"
    style="position: absolute; left: 0px; top: 920px;">
    <div class="item-img">
        <a href="https://www.instagram.com/_shoeslab/?hl=en" class="imago wow animated fadeInUp"
            style="visibility: visible;">
            <div class="inner wow animated fadeInUp" style="visibility: visible;">
                <img src="assets/img/gallery/5.jpg" alt="image" class="radius-5">
            </div>
        </a>
        <div class="info">
            <h6><a href="https://www.instagram.com/_shoeslab/?hl=en">Deep Cleaning</a></h6>
            <span class="sub-title tag opacity-7 mb-0 mt-10"><a
                    href="https://www.instagram.com/_shoeslab/?hl=en">View On
                    Instagram</a></span>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 items info-shadow mb-40"
    style="position: absolute; left: 918px; top: 920px;">
    <div class="item-img">
        <a href="https://www.instagram.com/_shoeslab/?hl=en" class="imago wow animated fadeInUp"
            style="visibility: visible;">
            <div class="inner wow animated fadeInUp" style="visibility: visible;">
                <img src="assets/img/gallery/7.jpg" alt="image" class="radius-5">
            </div>
        </a>
        <div class="info">
            <h6><a href="https://www.instagram.com/_shoeslab/?hl=en">Deep Cleaning</a></h6>
            <span class="sub-title tag opacity-7 mb-0 mt-10"><a
                    href="https://www.instagram.com/_shoeslab/?hl=en">View On
                    Instagram</a></span>
        </div>
    </div>
</div> -->