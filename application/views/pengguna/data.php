<?php

$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->result();


?>

    <!--header-->
    <div class="container-fluid">
        <div class="row" style="height:60px;margin-bottom:10px;padding-top:20px;padding-left:20px;background-color:<?php echo $comp[0]->warna_utama ?>;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <div style="width:40%" onClick="window.history.back()">
            <span><i class="flaticon2-left-arrow-1 text-white"></i></span>
        </div>
          <div style="width:60%">

                <p class="text-white"><strong>Akun</strong></p>
          
        </div>
    </div>
    </div>
<div class="container">
    
     
    <form method="POST" action="<?php echo site_url('pengguna/update') ?>"  >
      
      <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>" />
   
    <?php
    
    if(empty($_GET['edit'])){
    
    ?>
            <div class="form-group">
        <label for="email" class="text-black"><strong>Email</strong></label>
          <input id="email" required="required" value="<?php echo $_SESSION['email'] ?>" type="text" name="email" autocomplete="off" class="form-eza">
      </div>
      
         
      <div class="form-group">
        <label for="nama_lengkap" class="text-black"><strong>Nama Lengkap</strong></label>
          <input id="nama_lengkap" required="required"  value="<?php echo $_SESSION['nama_lengkap'] ?>" type="text" name="nama_lengkap" autocomplete="off" class="form-eza">
      </div>
      
         <div class="form-group">
        <label for="usia" class="text-black"><strong>Usia</strong></label>
          <input id="usia" required="required" type="text" name="usia" value="<?php echo $_SESSION['usia'] ?>" autocomplete="off" class="form-eza">
      </div>
      
        <div class="form-group">
            <label for="jenis_kelamin" class="text-black"><strong>Jenis Kelamin</strong></label>
            <select name="jenis_kelamin" class="form-eza">
                <option <?php echo $_SESSION['jenis_kelamin']=='Laki-laki'?'selected':'' ?> >Laki-laki</option>
                <option <?php echo $_SESSION['jenis_kelamin']=='Perempuan'?'selected':'' ?> >Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="penyakit" class="text-black"><strong>Riwayat Penyakit</strong></label>
            <input id="penyakit" value="<?php echo $_SESSION['penyakit'] ?>" name="penyakit" type="text" autocomplete="off" class="form-eza" />
        </div>
        <div class="form-group">
            <label for="berat_badang" class="text-black"><strong>Berat Badang (Kg)</strong></label>
            <input id="berat_badang" value="<?php echo $_SESSION['berat_badang'] ?>" required="required" name="berat_badang" type="text" autocomplete="off" class="form-eza" />
        </div>
        <div class="form-group">
            <label for="tinggi_badan" class="text-black"><strong>Tinggi Badang (cm)</strong></label>
            <input id="tinggi_badan" value="<?php echo $_SESSION['tinggi_badan'] ?>" required="required" name="tinggi_badan" type="text" autocomplete="off" class="form-eza" />
        </div>
        
         <div class="form-group">
            <label for="golongan_darah" class="text-black"><strong>Golongan Darah</strong></label>
            <input id="golongan_darah" value="<?php echo $_SESSION['golongan_darah'] ?>" required="required" name="golongan_darah" type="text" autocomplete="off" class="form-eza" />
        </div>
        
        <div class="form-group">
            <label for="obat" class="text-black"><strong>Obat yang pernah dikonsumsi (saat ini dipakai)</strong></label>
            <input id="obat" value="<?php echo $_SESSION['obat'] ?>" name="obat" type="text" autocomplete="off" class="form-eza" />
        </div>
        <div class="form-group">
            <label for="alergi" class="text-black"><strong>Riwayat Alergi</strong></label>
            <input id="alergi" value="<?php echo $_SESSION['alergi'] ?>" name="alergi" type="text" autocomplete="off" class="form-eza" />
        </div>
        <div class="form-group">
            <label for="keluhan" class="text-black"><strong>Riwayat Keluhan</strong></label>
            <input id="keluhan" value="<?php echo $_SESSION['keluhan'] ?>" name="keluhan" type="text" autocomplete="off" class="form-eza" />
        </div>
        <div class="form-group">
            <label for="alamat" class="text-black"><strong>Alamat</strong></label>
            <input id="alamat" value="<?php echo $_SESSION['alamat'] ?>" name="alamat" type="text" autocomplete="off" class="form-eza" />
        </div>
        <div class="form-group">
            <label for="telepon" class="text-black"><strong>Telepon</strong></label>
            <input id="telepon" value="<?php echo $_SESSION['telepon'] ?>" name="telepon" type="text" autocomplete="off" class="form-eza" />
        </div> 
           <input type="hidden" name="makan_pagi" value="<?php echo $_SESSION['makan_pagi'] ?>" />
    <input type="hidden" name="makan_siang" value="<?php echo $_SESSION['makan_siang'] ?>" />
    <input type="hidden" name="makan_malam" value="<?php echo $_SESSION['makan_malam'] ?>" />
<?php    } ?>

  <?php
    
    if(!empty($_GET['edit'])){
    
    ?>
    
    <input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>" />
    <input type="hidden" name="nama_lengkap" value="<?php echo $_SESSION['nama_lengkap'] ?>" />
    <input type="hidden" name="usia" value="<?php echo $_SESSION['usia'] ?>" />
    <input type="hidden" name="jenis_kelamin" value="<?php echo $_SESSION['jenis_kelamin'] ?>" />
    <input type="hidden" name="penyakit" value="<?php echo $_SESSION['penyakit'] ?>" />
    <input type="hidden" name="berat_badang" value="<?php echo $_SESSION['berat_badang'] ?>" />
    <input type="hidden" name="tinggi_badan" value="<?php echo $_SESSION['tinggi_badan'] ?>" />
    <input type="hidden" name="golongan_darah" value="<?php echo $_SESSION['golongan_darah'] ?>" />
    <input type="hidden" name="obat" value="<?php echo $_SESSION['obat'] ?>" />
    <input type="hidden" name="alergi" value="<?php echo $_SESSION['alergi'] ?>" />
    <input type="hidden" name="keluhan" value="<?php echo $_SESSION['keluhan'] ?>" />
    <input type="hidden" name="alamat" value="<?php echo $_SESSION['alamat'] ?>" />
    <input type="hidden" name="telepon" value="<?php echo $_SESSION['telepon'] ?>" />
    <? } ?>
    
    <?php
    
    if(!empty($_GET['edit'])){
    
    ?>



       <div class="form-group">
            <label for="makan_pagi" class="text-black"><strong>Makan Pagi</strong></label>
            <input id="makan_pagi" value="<?php echo $_SESSION['makan_pagi'] ?>" name="makan_pagi"  min="00:00" max="23:00"  type="time" step="3600" autocomplete="off" class="form-eza" />
        </div>
               <div class="form-group">
            <label for="makan_siang" class="text-black"><strong>Makan Siang</strong></label>
            <input id="makan_siang" value="<?php echo $_SESSION['makan_siang'] ?>" name="makan_siang" type="time" min="00:00" max="23:00"  step="3600" autocomplete="off" class="form-eza" />
        </div>
             <div class="form-group">
            <label for="makan_malam" class="text-black"><strong>Makan Malam</strong></label>
            <input id="makan_malam" value="<?php echo $_SESSION['makan_malam'] ?>" name="makan_malam" type="time" min="00:00" max="23:00"  step="3600" autocomplete="off" class="form-eza" />
        </div>
        
        <?php } ?>
        
          <?php
    
    if(empty($_GET['edit'])){
    ?>
      
       <div class="form-group">
        <label for="username" class="text-black"><strong>Password</strong></label>
          <input  placeholder="Kosongkan apabila tidak diubah" type="password" name="password" autocomplete="off" class="form-eza">
      </div>
      
      <?php } ?>
    <div class="form-group">
        <button type="SUBMIT" class="btn bg-utama col-sm-12">Simpan</button>
    </div>
    </form>
          
          <?php
    
    if(empty($_GET['edit'])){
    ?>
   
       
    <a onclick="retrun confirm('Apakah kamu akan logout ?')" href="<?php echo site_url('login/logout') ?>" class="btn btn-danger col-sm-12">Keluar</a>
<?php } ?>

 
</div>
    
