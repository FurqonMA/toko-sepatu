<!-- BANNER SLIDESHOW START -->
<section class="banner">
    <div class="container">
        <div class="imgslider"></div>
    </div>
</section>

<!-- BANNER SLIDESHOW END -->

<!-- SECTION 1 START-->

<div class="container-fluid mb-4">
    <div class="row">
        <div class="col-lg-4 col-sm-12 mt-3">
            <a href="<?php echo base_url() ?>Olahraga/basket"><div class="gambarsection1"><img src="<?= base_url(); ?>assets/img/Basket.png" alt=""></div></a>
        </div>
        <div class="col-lg-4 col-sm-12 mt-3">
            <a href="<?php echo base_url() ?>Olahraga/lari"><div class="gambarsection1"><img src="<?= base_url(); ?>assets/img/Running.png" alt=""></div></a>
        </div>
        <div class="col-lg-4 col-sm-12 mt-3">
            <a href="<?php echo base_url() ?>Olahraga/futbal"><div class="gambarsection1"><img src="<?= base_url(); ?>assets/img/Futsal.png" alt=""></div></a>
        </div>
    </div>
</div>

<section class="shopby">
    <div class="judulsection">       
        <p style="text-align: center; margin-top: 5em; color: #000; font-weight: 500;">Shop By Brand</p>
    </div>
    <div class="container mb-5">
        <div class="logobrand">
            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="<?php echo base_url() ?>Brands/adidas"><img class="logobrands" src="<?= base_url(); ?>assets/img/adidas.png" alt="" title="ADIDAS"></a>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="<?php echo base_url() ?>Brands/nike"><img class="logobrands" src="<?= base_url(); ?>assets/img/nike.png" alt="" title="NIKE"></a>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="<?php echo base_url() ?>Brands/ortuseight"><img class="logobrands" style="margin-top: 2em;" src="<?= base_url(); ?>assets/img/ortu.png" alt="" title="ORTUSEIGHT"></a>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="<?php echo base_url() ?>Brands/mizuno"><img class="logobrands" style="margin-top: 2em;" src="<?= base_url(); ?>assets/img/mizuno.png" alt="" title="MIZUNO"></a>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="<?php echo base_url() ?>Brands/airjordan"><img class="logobrands" src="<?= base_url(); ?>assets/img/airjordan.png" alt="" title="AIR JORDAN"></a>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="<?php echo base_url() ?>Brands/reebok"><img class="logobrands" style="margin-top: 2em;" src="<?= base_url(); ?>assets/img/reebok.png" alt="" title="REEBOK"></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 1 END -->

<!-- KARTU PRODUK START -->
<div class="judulsection">       
    <p style="text-align: center; margin-top: 5em; color: #000; font-weight: 500;">Produk-Produk Kami</p>
</div>
    <div class="container container-produk mb-4">        
        
        <div class="row">
            <?php foreach ($sepak_bola as $brg) : ?>
            <div class="col-lg-4 mb-4 col-md-6">
                <div class="card-produk" style="width: 24rem; height: auto; border-radius: 20px;">
                        <img src="<?= base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="container container-detail">                     
                                <h5 class="nama_barang"><?= $brg->nama_barang ?></h5>
                                <p class="keterangan"><?= $brg->keterangan?></p>
                                <span class="badge" style="background-color: rgb(231, 132, 20);">Rp. <?= number_format($brg->harga, 0,',','.')?></span>
                            </div>
                            <?= anchor('halaman_utama/tambah_keranjang/' .$brg->id_barang, '<div class="btn btn-success"><i class="bx bx-cart"></i> Add To Cart</div>') ?>
                            <?= anchor('welcome/detail/' .$brg->id_barang, '<div class="btn btn-danger">Detail</div>') ?>
                        </div>
                  </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

<!-- KARTU PRODUK END -->

