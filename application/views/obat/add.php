<?php

$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->result();

$waktu = $this->uri->segment(3);
$tanggal = $this->uri->segment(4);

?>

    <!--header-->
    <div class="container-fluid">
        <div class="row" style="height:60px;margin-bottom:10px;padding-top:20px;padding-left:20px;background-color:<?php echo $comp[0]->warna_utama ?>;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <div style="width:30%" onClick="window.history.back()">
            <span><i class="flaticon2-left-arrow-1 text-white"></i></span>
        </div>
          <div style="width:70%">

                <p class="text-white"><strong>Tambah Daftar Obat</strong></p>
          
        </div>
    </div>
    </div>
<div class="container">
   

    <form action="<?php echo site_url('obat/insert') ?>" method="POST">
        <input type="hidden" name="fid_user" value="<?php echo $_SESSION['id'] ?>" />

        
        
            <div class="form-group">
                <label>Nama Obat</label>
                <input required name="nama_obat" class="form-eza" />
            </div>
            <div class="form-group">
                <label>Jam</label>
                <select class="form-eza" name="jam">
                    <?php for($i=0;$i<24;$i++){ ?>
                        
                        <option><?php echo strlen($i)>1?$i:'0'.$i ?>:00</option>
                    
                    <?php } ?>
                    
                </select>
            </div>
            
                  <div class="form-group">
                <label>Tanggal Selesai</label>
                <input required name="tanggal_selesai" type="date" class="form-eza" />
            </div>
           
           <button class="btn bg-utama col-sm-12" type="submit">Simpan</button>
    </form>
    
    
</div>