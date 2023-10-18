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
  <div class="vline"></div>

  <!-- ==================== Start Slider ==================== -->

  <header class="pg-header style2 bg-img parallaxie valign" data-background="assets/img/slider/d2.jpg" data-overlay-dark="6">
    <div class="container-xxl ontop">
      <div class="row">
        <div class="col-12">
          <div class="cont mb-80">
            <h6 class="sub-title">
              <span class="main-color">The Products</span>
            </h6>
            <h1 class="fw-700 fz-70">Our Products.</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="shadw"></div>
  </header>

  <!-- ==================== End Slider ==================== -->

  <!-- ==================== Start Products ==================== -->

  <section class="mblog section-padding">
    <div class="container-xxl">
      <div class="sec-head mb-80">
        <div class="row">
          <div class="col-md-12 text-center">
            <div>
              <h3 class="bord-thin-bottom pb-30">Produk yang Kami Jual.</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="row" id="productsContainer">

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

  <!-- ==================== End Products ==================== -->
</main>




<?php
include 'include/footer.php';
?>

<script>
      // Inisialisasi variabel global
      let currentIndex = 0
      const loadAmount = 3
      const products = document.getElementsByClassName("productContainer")
      const loadMoreButton = document.querySelector(".loadMore")

      // Sembunyikan semua elemen product
      // Array.from(products).forEach((product) => {
      //   product.style.display = "none"
      // })

      const base_url = 'http://localhost:3000'

      async function fetchProducts(startIndex, endIndex) {
        try {
          const limit = endIndex - startIndex;
          const response = await fetch(`${base_url}/v1/product?limit=${limit}&page=${startIndex}`);
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

      // Tampilkan elemen product sesuai dengan indeks yang ditentukan
      function showProducts(products) {
        const rupiah = (number)=>{
          return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0
          }).format(number);
        }
        products.data.forEach((product) => {
          const productElement = document.createElement("div");
          productElement.className = "product col-lg-4";
          productElement.innerHTML = `
            <div class="post-box bg-dark" style="height: 400px;">
              <div class="img">
                <img src="${base_url + product.productImage}" class="rounded" alt="variant products" style="max-width: 100%; height: 200px; max-height: 200px;" />
              </div>
              <div class="cont mt-30 flex">
                <div>
                  <h6>
                    <a href="">${product?.productName}</a><br />
                    <a href="" class="mt-15 fz-24" style="color: white">${rupiah(product.productPrice)}</a>
                  </h6>
                  <a href="${product.productLink}" target="_blank" class="mt-15 fz-13">Buy Now <i class="pe-7s-cart ml-5"></i></a>
                </div>
              </div>
            </div>
          `;

          productsContainer.appendChild(productElement);
        });
      }


      // Fungsi untuk menangani klik pada tombol "Load More"
      async function handleLoadMore() {
        const nextIndex = currentIndex + loadAmount;
        const products = await fetchProducts(currentIndex, nextIndex);
        showProducts(products);

        if (products.data.length < loadAmount) {
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