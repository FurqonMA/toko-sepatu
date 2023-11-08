
<nav>
  <div class="navbar">
    <i class='bx bx-menu'></i>
    <div class="logo">
    <a href="<?=base_url();?>welcome/index"> <img src="<?=base_url();?>/assets/img/logotoko.png" alt="AthleticXpress logo"></a>
    </div>
    <div class="nav-links">
      <div class="sidebar-logo">
        <span class="logo_name" style="font-style: italic;">Ath<span style="color: rgb(255, 159, 80);">X</span></span>
        <i class='bx bx-x'></i>
      </div>
      <ul class="links">
         <li>
          <a href="<?=base_url();?>welcome/index">Home</a>
          <div class="bunder"></div>
        </li>
         <li>
          <a href="#">Olahraga</a>
          <i class='bx bxs-chevron-down arrow olahraga-arrow'></i>
          <ul class="olahraga-sub-menu sub-menu">
              <li><a href="<?php echo base_url() ?>Olahraga/sepak_bola">Sepak Bola</a></li>
              <li><a href="<?php echo base_url() ?>Olahraga/futsal">Futsal</a></li>
              <li><a href="<?php echo base_url() ?>Olahraga/basket">Basket</a></li>
              <li><a href="<?php echo base_url() ?>Olahraga/lari">Running</a></li>
          </ul>
         </li>
         <li>
          <a href="#">Brands</a>
          <i class='bx bxs-chevron-down arrow brands-arrow'></i>
          <ul class="brands-sub-menu sub-menu">
            <li><a href="<?php echo base_url() ?>Brands/adidas">Adidas</a></li>
            <li><a href="<?php echo base_url() ?>Brands/nike">Nike</a></li>
            <li><a href="<?php echo base_url() ?>Brands/ortuseight">Ortuseight</a></li>
            <li><a href="<?php echo base_url() ?>Brands/reebok">Reebok</a></li>
            <li><a href="<?php echo base_url() ?>Brands/mizuno">Mizuno</a></li>
            <li><a href="<?php echo base_url() ?>Brands/airjordan">Air Jordan</a></li>
        </ul>
         </li>
         <!-- <li>
          <a class="sale" style="color: white; background-color: red; width: 60px; height: 63px; margin-bottom: 3px; display: flex; align-items: center; padding-left: 12px; border-radius: 10px;" href="#">Sale</a>
         </li> -->
         <li>
          <?php
          $keranjang = '<span style="color: white;">Keranjang : '. $this->cart->total_items().'</span>';
          ?>
          <?= anchor('halaman_utama/detail_keranjang', $keranjang)?>
         </li>
         <li>
          <?php if($this->session->userdata('username')) { ?>
            <li><div style="color: #fff; font-weight: bold;">Welcome <?php echo $this->session->userdata('username')?></div></li>
            <li><?php echo anchor('auth/logout','| Logout')?></li>
            <?php } else {?>
              <li><?php echo anchor('auth/login','Login | Register') ?></li>
              <?php } ?>
         </li>
         <li>
          <div class="search-box">
            <i class='bx bx-search'></i>
            <div class="input-box">  
              <?php echo form_open('Halaman_utama/search') ?>            
              <button type="submit"><i class='bx bx-search' style="color: #000;"></i></button>
              <input type="text" name="keyword" placeholder="Cari apa brosist?...">
              <?php echo form_close() ?>
            </div>
          </div>
         </li>
      </ul>
    </div>
  </div>
</nav>

