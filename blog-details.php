<?php
include 'include/header.php';
include 'include/navigation.php';
?>

<main>

        <!-- ==================== Start Slider ==================== -->

        <header class="pg-header tpost bg-img parallaxie valign" data-background=""
            data-overlay-dark="3">
            <div class="container ontop">
                <div class="row">
                    <div class="col-12">
                        <div class="cont text-center mb-80">
                            <h1 class="fw-700 mb-50" id="blogTitle"></h1>
                            <div class="d-flex justify-content-center">
                                <div class="d-flex align-items-center">
                                    <div class="item mr-30">
                                        <div class="d-flex align-items-center">
                                            <div class="f-img">
                                                <div class="img circle-60 mr-20">
                                                    <img src="" id="imageB" alt="" class="circle-img">
                                                </div>
                                            </div>
                                            <!-- <div>
                                                <span><a href="blog-masonry-3col.html">By : Alex Martin</a></span>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="item mr-30">
                                        <span><a id="blogDate"></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadw"></div>
        </header>

        <!-- ==================== End Slider ==================== -->



        <!-- ==================== Start Blog ==================== -->

        <section class="blog section-padding pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="main-post">
                            <div class="item pb-60" id="blogDetailContainer"></div>
                            <div class="info-area flex mt-20 pb-20">
                                <!-- <div>
                                    <div class="tags flex">
                                        <div class="valign">
                                            <span>Tags :</span>
                                        </div>
                                        <div>
                                            <a href="blog-grid-clean.html">Tech</a>
                                            <a href="blog-grid-clean.html">Ravo</a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="ml-auto">
                                    <div class="share-icon flex">
                                        <div class="valign">
                                            <span>Share :</span>
                                        </div>
                                        <div>
                                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- <div class="next-prv-post flex mt-50">
                                <div class="thumb-post bg-img" data-background="assets/img/blog/b/b4.jpg">
                                    <a href="blog-post.html">
                                        <span class="fz-12 text-u ls1 main-color mb-15"><i class="pe-7s-angle-left"></i>
                                            Prev Post</span>
                                        <h6 class="fw-600 fz-16">Ways to quickly traffic to <br> your website.</h6>
                                    </a>
                                </div>
                                <div id="nextButton" class="thumb-post ml-auto text-right bg-img"
                                    data-background="assets/img/blog/b/b5.jpg">
                                    <a href="blog-post.html">
                                        <span class="fz-12 text-u ls1 main-color mb-15">Next Post <i
                                                class="pe-7s-angle-right"></i></span>
                                        <h6 class="fw-600 fz-16">How to Handle Your Good Employee.</h6>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent-posts blog-overlay sub-bg section-padding mt-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-60">
                                <h4>Recent Posts</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="recentBlog">
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================== End Blog ==================== -->


    </main>

    <script>
    const urlParams = new URLSearchParams(window.location.search);
    const paramId = urlParams.get('id');
    const momentJs = (value) => {
        return moment(value).locale('id').format('LL')
    }

    // Ganti URL dengan URL API atau sumber data Anda
    const apiUrl = 'https://shoeslab.id';
    // const apiUrl = 'http://127.0.0.1:3000';

    // Fungsi untuk mengambil dan menampilkan detail blog
    async function fetchAndDisplayBlogDetail() {
        try {
            const response = await fetch(`${apiUrl}/v1/blog/${paramId}`);

            if (!response.ok) {
                throw new Error("Gagal mengambil data blog");
            }
            const blogDetail = await response.json();

            const blogTitle = document.getElementById("blogTitle");
            const blogDate = document.getElementById("blogDate");
            const bgImage = document.querySelector('[data-background=""]');
            const imageB = document.getElementById('imageB');
            const blogDetailContainer = document.getElementById("blogDetailContainer");

            bgImage.setAttribute('data-background', `${apiUrl}${blogDetail.blogImage}`);
            imageB.src = `${apiUrl}${blogDetail.blogImage}`
            blogTitle.textContent = blogDetail.blogTitle
            blogDate.textContent = momentJs(blogDetail.createdAt)

            // Tampilkan detail blog dalam elemen HTML
            blogDetailContainer.innerHTML = `
                <div class="text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="text mt-20">
                                ${blogDetail.blogDesc}
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan gambar, tanggal, dan detail lainnya sesuai kebutuhan -->
                </div>
            `;
        } catch (error) {
            console.error(error);
        }
    }
    

    // Fungsi untuk mengambil data dari API
    async function getDataFromAPI() {
        const recentBlog = document.getElementById('recentBlog');

        try {
            const response = await fetch(`${apiUrl}/v1/recent-blog`);
            
            if (!response.ok) {
            throw new Error("Gagal mengambil data dari API");
            }

            const data = await response.json();

            // Loop melalui data blog dan tampilkan dalam elemen HTML
            data.forEach((blog) => {
                const blogItem = document.createElement("div");
                blogItem.className = "col-lg-4";
                blogItem.innerHTML = `
                    <div class="item md-mb50">
                        <div class="img">
                            <img src="${apiUrl}${blog.blogImage}" alt="${apiUrl}${blog.blogImage}">
                            <div class="cont">
                                <div class="cont">
                                    <div class="date sub-title fw-500 opacity-8">
                                        <a href="blog-masonry-3col.html">${momentJs(blog.createdAt)}</a>
                                    </div>
                                    <h6 class="fz-20 fw-700">
                                        <a href="blog-details.php?id=${blog.id}">${blog.blogTitle}</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                recentBlog.appendChild(blogItem);
            });
        } catch (error) {
            console.error("Kesalahan:", error);
        }
    }

    async function nextPrev() {
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');

        try {
            const response = await fetch(`${apiUrl}/v1/blog`);
            
            if (!response.ok) {
            throw new Error("Gagal mengambil data dari API");
            }

            const blog = await response.json();
            console.log(blog.data.findIndex((item) => {
                return item.id === paramId
            }))
            // const currentIndex = blog.data.findIndex(paramId);
            const totalData = blog.meta.totalData

            blog.data.foreach((blog) => {
                if (currentIndex === 0) {
                    prevButton.style.display = "none";
                }
        
                if (currentIndex === totalData - 1) {
                    nextButton.style.display = "none";
                }
            })
        } catch (error) {
            console.error("Kesalahan:", error);
        }
    }

    nextPrev();
    fetchAndDisplayBlogDetail();
    getDataFromAPI();
    </script>

    <?php
    include 'include/footer.php';
?>