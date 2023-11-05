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
            <div class="gambarsection1"><img src="<?= base_url(); ?>assets/img/Basket.png" alt=""></div>
        </div>
        <div class="col-lg-4 col-sm-12 mt-3">
            <div class="gambarsection1"><img src="<?= base_url(); ?>assets/img/Running.png" alt=""></div>
        </div>
        <div class="col-lg-4 col-sm-12 mt-3">
            <div class="gambarsection1"><img src="<?= base_url(); ?>assets/img/Futsal.png" alt=""></div>
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
                    <a href="#"><img class="logobrands" src="<?= base_url(); ?>assets/img/adidas.png" alt="" title="ADIDAS"></a>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="#"><img class="logobrands" src="<?= base_url(); ?>assets/img/nike.png" alt="" title="NIKE"></a>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="#"><img class="logobrands" style="margin-top: 2em;" src="<?= base_url(); ?>assets/img/ortu.png" alt="" title="ORTUSEIGHT"></a>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="#"><img class="logobrands" style="margin-top: 2em;" src="<?= base_url(); ?>assets/img/mizuno.png" alt="" title="MIZUNO"></a>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="#"><img class="logobrands" src="<?= base_url(); ?>assets/img/airjordan.png" alt="" title="AIR JORDAN"></a>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="#"><img class="logobrands" style="margin-top: 2em;" src="<?= base_url(); ?>assets/img/reebok.png" alt="" title="REEBOK"></a>
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
            <?php foreach ($barang as $brg) : ?>
            <div class="col-lg-4 mb-4 col-md-6">
                <div class="card-produk" style="width: 24rem; height: auto; border-radius: 20px;">
                        <img src="<?= base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="container container-detail">                     
                                <h5 class="nama_barang"><?= $brg->nama_barang ?></h5>
                                <p class="keterangan"><?= $brg->keterangan?></p>
                                <span class="badge text-bg-success">Rp. <?= number_format($brg->harga, 0,',','.')?></span>
                            </div>
                            <?= anchor('halaman_utama/tambah_keranjang/' .$brg->id_barang, '<div class="btn btn-primary">Add To Cart</div>') ?>
                            <?= anchor('halaman_utama/detail/' .$brg->id_barang, '<div class="btn btn-danger">Detail</div>') ?>
                        </div>
                  </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

<!-- KARTU PRODUK END -->

