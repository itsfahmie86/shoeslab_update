<?php
include 'include/header.php';
include 'include/navigation.php';
?>



    <!-- ==================== Start progress-scroll-button ==================== -->

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

        <!-- ==================== Start Slider ==================== -->

        <header class="pg-header style2 bg-img parallaxie valign" data-background="assets/img/slider/7.jpg"
            data-overlay-dark="6">
            <div class="container-xxl ontop">
                <div class="row">
                    <div class="col-12">
                        <div class="cont mb-80">
                            <h6 class="sub-title"><a href="index">Home</a> <span class="ml-20 mr-20">/</span>
                                <span class="main-color">Blogs</span>
                            </h6>
                            <h1 class="fw-700 fz-70">Info Menarik Seputar Sneakers</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadw"></div>
        </header>

        <!-- ==================== End Slider ==================== -->



        <!-- ==================== Start Blog ==================== -->

        <section class="blog section-padding pb-50">
            <div class="container-xxl">

                <div class="main-posts grids">

                    <div class="row">
                        <div class="row" id="blogsContainer"></div>
                        <button
                            type="button"
                            class="butn butn-lg butn-bg radius-30 loadMore"
                            style="width: auto; margin: 0 auto">
                            Load More
                        </button>
                    </div>

                </div>

            </div>
        </section>

        <!-- ==================== End Blog ==================== -->


    </main>

<?php
    include 'include/footer.php';
?>

<script>
    let currentIndex = 0
    const loadAmount = 3
    const blogs = document.getElementsByClassName("blogsContainer")
    const loadMoreButton = document.querySelector(".loadMore")

    const base_url = 'https://shoeslab.id'

    async function fetchBlog(startIndex, endIndex) {
        try {
            const limit = endIndex - startIndex;
            const response = await fetch(`${base_url}/v1/blog?pageSize=${limit}&page=${startIndex}`);
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

    const momentJs = (value) => {
        return moment(value).locale('id').format('LL')
    }

    function showBlogs(blogs) {
        blogs.data.forEach((blog) => {
        const blogElement = document.createElement("div");
        blogElement.className = "col-lg-4 col-md-6";
        blogElement.innerHTML = `
            <div class="post-clas mb-80">
                <div class="img">
                    <img src="${base_url + blog.blogImage}" alt="">
                </div>
                <div class="cont mt-40">
                    <div class="date main-color fz-12 fw-500 text-u ls1 mb-15">
                        <a href="blog-post.html">${momentJs(blog.createdAt)}</a>
                    </div>
                    <h6 class="fz-20 fw-700">
                        <a href="blog-details.php?id=${blog.id}">${blog.blogTitle}</a>
                    </h6>
                    <a href="blog-details.php?id=${blog.id}" 
                       class="mt-20 fz-13 fw-500 text-u ls1 opacity-7">
                       Read More 
                       <i class="pe-7s-angle-right ml-5"></i>
                    </a>
                </div>
            </div>
        `;

        blogsContainer.appendChild(blogElement);
        });
    }

    // Fungsi untuk menangani klik pada tombol "Load More"
    async function handleLoadMore() {
    const nextIndex = currentIndex + loadAmount;
    const blogs = await fetchBlog(currentIndex, nextIndex);
    showBlogs(blogs);
    if (blogs.data.length < loadAmount) {
        loadMoreButton.style.display = "none";
    }

    currentIndex = nextIndex;
    }

    // Tampilkan 3 elemen pertama saat halaman dimuat
    document.addEventListener("DOMContentLoaded", () => {
    handleLoadMore()
    })

    // Tambahkan event listener ke tombol "Load More"
    loadMoreButton.addEventListener("click", handleLoadMore)
    
</script>