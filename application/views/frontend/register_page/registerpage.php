<section class="loginpage" style="  background: url('../assets/img/background1.jpg') no-repeat; background-size: cover; background-position: center;">
    <div class="wrapper">
        <form action="<?php echo base_url('Register_page/index') ?>" method="POST">
            <h1>FORM REGISTER</h1>
            <div class="input-boxx">
                <input type="text" name="nama" placeholder="Masukkan Nama Lengkap Anda">
                <?php echo form_error('nama','<div class=" text-sm ms-3 mt-2" style="color: red; font-size: 12px;">','</div>')?>
            </div>
            <div class="input-boxx">
                <input type="text" name="username" placeholder="Masukkan Username Anda">
                <?php echo form_error('username','<div class=" text-sm ms-3 mt-2" style="color: red; font-size: 12px;">','</div>')?>
            </div>
            <div class="input-boxx">
                <input type="password" name="password_1" placeholder="Masukkan Password Anda">
                <?php echo form_error('password_1','<div class=" text-sm ms-3 mt-2" style="color: red; font-size: 12px;">','</div>')?>
            </div>   
            <div class="input-boxx">
                <input type="password" name="password_2" placeholder="Ulangi Password">
            </div>   
            <button class="btn" type="submit">Daftar</button>
            <div class="back">
                <a href="<?=base_url();?>welcome/index">Back to Home</a>
            </div>
        </form>
    </div>
</section>
