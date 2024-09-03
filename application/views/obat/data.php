<?php


$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->row_object();

if(!empty($_GET['tanggal'])){
    $tanggal = $_GET['tanggal'];
}else{
    $tanggal = date('Y-m-d');
}

?>

    <!--header-->
    <div class="container-fluid">
        <div class="row" style="height:60px;margin-bottom:10px;padding-top:20px;padding-left:20px;background-color:<?php echo $comp->warna_utama ?>;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <div style="width:40%" onClick="window.location.href='./'">
            <span><i class="flaticon2-left-arrow-1 text-white"></i></span>
        </div>
          <div style="width:60%">

                <p class="text-white"><strong>Pengingat Obat</strong></p>
          
        </div>
    </div>
    </div>
<div class="container">
    
    <form id="dataForm">
        <input onChange="$('#dataForm').submit()" type="date" name="tanggal" value="<?php echo $tanggal ?>" class="form-eza"/>
    </form>
  
  <hr/>
  <div class="card">
      <div class="card-header bg-utama">
        <div class="row">
    <div style="width:70%;padding-left:10px">
                  <h5>Daftar Obat</h5>
              </div>
             <div onclick="window.location.href='obat/add'" style="width:30%;display:flex;justify-content:flex-end;font-size:15pt;padding-right:10px">
                  <i class="flaticon-plus"></i>
              </div>
          </div>
      </div>
      <div class="card-body">
           <ul class="list-group">
               <table class="table table-bordered">
                   <tr>
                         <?php
	                foreach($this->db->query("SELECT *,(SELECT COUNT(*) FROM data_minum WHERE fid_obat=a.id_obat AND tanggal='$tanggal') cek FROM data_obat a WHERE a.fid_user='".$_SESSION['id']."'")->result() as $r){
	                ?>
                        <tr>
                            <td><strong><?php echo $r->nama_obat ?></strong><br/><span class="badge badge-danger"><?php echo substr($r->jam,0,5) ?></span>
                            <br/><span class="badge badge-primary">Sampai : <?php echo $r->tanggal_selesai ?></span></td>
                           
                            <td>
                                                                <?php if( $r->cek == 0){ ?>
                                <a class="btn btn-light" href="<?php echo site_url('obat/cek/'.$r->id_obat.'/'.$tanggal) ?>" onclick="return confirm('Apakah kamu sudah minum obat ini ?')"><i class="flaticon2-checkmark"></i></a>
                                <?php } ?>
                                
                                <?php if( $r->cek > 0){ ?>
                                <a class="btn btn-success" onclick="alert('Kamu sudah minum obat ini')"><i class="flaticon2-correct text-white"></i></a>
                                <?php } ?>
                            </td>
                             <td>
                            <a class="btn btn-sm btn-primary" href="<?php echo site_url('obat/edit/'.$r->id_obat) ?>" onclick="return confirm('Apakah kamu akan edit ini ?')"><i class="flaticon-edit"></i></a>
                            <a class="btn btn-sm btn-danger" href="<?php echo site_url('obat/delete/'.$r->id_obat) ?>" onclick="return confirm('Apakah kamu akan hapus ini ?')"><i class="flaticon-delete"></i></a>
                            </td>
                        </tr>
	                <?php } ?>
                   </tr>
               </table>
             
           </ul>
      </div>
  </div>
  
 
</div>