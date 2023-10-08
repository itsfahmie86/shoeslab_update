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




    <!-- ==================== Start wrapper ==================== -->

    <main>





        <!-- ==================== Start Intro ==================== -->

        <section class="section-padding">
            <div class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-lg-5 valign">
                        <img src="assets/img/intro/5.jpg" class="rounded-3" alt="">
                    </div>

                    <div class="col-lg-6">
                        <div class="htit">
                            <h3>Periksa Order kamu semakin gampang!</h3>
                            <p class="fz-18 mt-15 bord-thin-bottom pb-30">Dengan menggunakan nomor resi yang diberikan
                                oleh store keeper kami, Kamu dapat melakukan cek resi untuk mendapatkan informasi
                                terkini tentang status order kamu.</p>
                        </div>
                        <form>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    <p>Masukan nomor Resi</p>
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Contoh: 225-215">
                                <br>
                            </div>
                            <label for="exampleInputEmail1">
                                <p>Pilih lokasi</p>
                            </label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Shoeslab Jl. Ciheulang</option>
                                <option value="1">Shoeslab 2</option>
                                <option value="2">Shoeslab 3</option>
                                <option value="3">Shoeslab 4</option>
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary rounded-0">Generate</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding">

            <div class="container">
                <div class="row justify-content-center order-status">
                       <h3>Status Order Anda</h3>
                       <div class="row box-status">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Nomor PO</th>
                                <th scope="col">Jenis Order</th>
                                <th scope="col">Store Location</th>
                                <th scope="col">Status Order</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Alfian Fajri</th>
                                <td>081256585621</td>
                                <td>2512548</td>
                                <td>Deep Clean</td>
                                <td>Shoeslab Ciheulang</td>
                                <th scope="row" style="color:rgb(39, 144, 81);">Done</th>
                              </tr>
                            </tbody>
                          </table>
                       </div>
                </div>
            </div>

        </section>

        <!-- ==================== End Intro ==================== -->

            <section class="section-padding">
                <div class="container-xl">
                    <div class="row">
                        <table id="myTable">
                            <thead>
                              <tr>
                                <th data-sortable="true">Name</th>
                                <th data-sortable="true">Age</th>
                                <th data-sortable="true">City</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>John Doe</td>
                                <td>25</td>
                                <td>New York</td>
                              </tr>
                              <tr>
                                <td>Jane Smith</td>
                                <td>30</td>
                                <td>Los Angeles</td>
                              </tr>
                              <tr>
                                <td>Tom Cruise</td>
                                <td>50</td>
                                <td>Miami</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
                
            </section>


    </main>