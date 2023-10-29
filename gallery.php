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
                <div class="row" style="position: relative;">

                    <div class="row mb-40" id="showImages">
                    </div>
                    <button
                        type="button"
                        class="butn butn-lg butn-bg radius-30 loadMore"
                        style="width: auto; margin: 0 auto">
                        Load More
                    </button>
                </div>


            </div>
        </section>

        <!-- ==================== End Slider ==================== -->

    </main>
</div>

<script>
    let currentIndex = 1
    const loadAmount = 6
    const base_url = 'https://shoeslab.id'    
    const galleryContainer = document.getElementById("showImages")
    const loadMoreButton = document.querySelector(".loadMore")

    async function fetchData(startIndex, endIndex) {
        try {
            const limit = endIndex - startIndex;
            const response = await fetch(`${base_url}/v1/gallery?limit=${limit}&page=${startIndex}`);
            if (!response.ok) {
            throw new Error("Gagal mengambil produk");
            }
            const data = await response.json();
            return data;
        } catch (error) {
            console.error(error);
            return [];
        }
    }
    
    async function showGallery(galleries) {
        galleries.data.forEach((gallery) => {
        const galleryElement = document.createElement("div");
        galleryElement.className = "col-lg-4 col-md-6 items info-shadow mb-40";
        galleryElement.innerHTML = `
            <div class="item-img" style="height: 350px!important;">
                <a href="${gallery.link}" target="_blank" class="imago wow animated fadeInUp"
                    style="visibility: visible;">
                    <div class="inner wow animated fadeInUp" style="height: 350px!important; style="visibility: visible;">
                        <img id="images" src="${base_url + gallery.path}" alt="image" class="radius-5">
                    </div>
                </a>
                <div class="info">
                    <h6>
                        <a id="link1" href="${gallery.link}" target="_blank">
                            ${gallery.title}
                        </a>
                    </h6>
                    <span class="sub-title tag opacity-7 mb-0 mt-10">
                        <a
                            id="link2"
                            href="${gallery.link}" target="_blank">View Details
                        </a>
                    </span>
                </div>
            </div>
        `;

        galleryContainer.appendChild(galleryElement);
        });
    }

    async function handleLoadMore() {
        const nextIndex = currentIndex + loadAmount;
        const gallery = await fetchData(currentIndex, nextIndex);
        showGallery(gallery);
        if (gallery.data.length < loadAmount) {
            loadMoreButton.style.display = "none";
        }

        currentIndex++;
    }

    // Tampilkan 3 elemen pertama saat halaman dimuat
    document.addEventListener("DOMContentLoaded", () => {
        handleLoadMore()
    })

    // Tambahkan event listener ke tombol "Load More"
    loadMoreButton.addEventListener("click", handleLoadMore)

</script>

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