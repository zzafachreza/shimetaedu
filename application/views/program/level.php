



<style>
* {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
}

.container-home {
    padding: 20px;
    max-width: 1200px;
    margin: auto;
}

.main-container {
    margin-top: 5%;
}

h1 {
    text-align: center;
    font-weight: 800;
    font-size: 40px;
    color: #bf1e2e;
    margin-bottom: 20px;
}

h3 {
    font-weight: 600;
}

.flex-main {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap; /* Responsivitas */
}

.flex-leftcontent {
    flex: 1 1 337px; /* Set lebar dasar dan maksimum ke 337px */
    padding: 10px;
    background-color: #f5f5f5;
    border-radius: 8px;
    margin-right: 20px;
    position: fixed;
    height: calc(100vh - 100px); /* Full height minus any offset for margin/padding */
    border: 1px solid #c3c3c3;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan shadow untuk efek elevasi */
    max-width: 337px; /* Set lebar maksimal */
    overflow-y: auto; /* Tambahkan scroll untuk konten yang lebih panjang */
}

.flex-leftcontent h2 {
    background-color: #bf1e2e;
    color: white;
    text-align: center;
    padding: 10px;
    border-radius: 8px 8px 0 0;
    margin-bottom: 10px; /* Tambahkan margin bawah untuk memberi jarak dengan daftar */
    border-bottom: 2px solid #bf1e2e; /* Border bawah untuk header */
}

.listleft {
    padding: 0;
    margin: 0;
}

.list-flexleft {
    list-style: none;
    padding: 0;
    margin: 0;
}

.list-flexleft > a > li {
    margin-bottom: 10px;
    padding: 10px;
    background-color: #e6e6e6; /* Ubah warna background */
    border-radius: 8px;
    box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.1); /* Shadow untuk efek dalam */
    cursor: pointer;
    transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
}

.list-flexleft > a > li:hover {
    background-color: #f0f0f0;
    border: 2px solid #a81826;
}

.list-flexleft > a {
    text-decoration: none;
    color: inherit; /* Warna teks default, menggunakan warna inheritan */
}

.flex-rightcontent {
    flex: 1 1 calc(100% - 357px); /* Adjust width based on sidebar width and margin */
    padding: 20px;
    margin-left: calc(337px + 20px); /* Adjust margin-left based on sidebar width and margin */
    width: calc(100% - 357px); /* Adjust width based on sidebar width */
}

.cardright {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.cardjudul {
    padding: 10px;
    border-radius: 8px 8px 0 0;
    color: #bf1e2e;
    text-align: center;
}

.cardjudul > h2 {
    font-weight: 600;
    font-size: 45px;
}

.btn-download, .btn-quiz, .btn-selesai {
    display: block;
    background-color: #bf1e2e;
    color: white;
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    margin: 10px 0;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-selesai {
    background-color: #49AD19;
}

.btn-download:hover, .btn-quiz:hover {
    background-color: #a81826;
    color: white;
    transform: scale(1.1);
}

.btn-selesai:hover {
    background-color: #257200;
    color: white;
    transform: scale(1.1);
}

iframe {
    width: 100%;
    height: 315px;
    border-radius: 8px;
    margin-top: 20px;
}

p {
    margin: 20px 0;
}

.footer {
    text-align: center;
    padding: 20px;
    background-color: #f5f5f5;
    margin-top: 40px;
    border-radius: 8px;
}

.module-container {
    display: flex;
    padding: 10px;
    gap: 20px;
}

.footer-level {
    padding: 10px;
    display: flex;
    justify-content: space-between;
    margin-top: 10%;
}

.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgba(0,0,0,0.4); 
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto; 
    padding: 20px;
    border: 1px solid #888;
    width: 90%; /* Responsivitas */
    border-radius: 8px;
    max-width: 797px;
    height: auto;
}

.modal-content > h2 {
    text-align: center;
    font-size: 40px;
    font-weight: 600;
    margin-top: 20px;
    color: #49AD19;
} 

.modal-content > p {
    text-align: center;
    font-size: 40px;
    font-weight: 600;
    color: #49AD19;
} 

.modal-content > img {
    display: block;
    margin: 0 auto;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.lesson-content {
    text-align: justify;
    font-size: 18px;
    font-weight: 500;
    font-family: 'Poppins', sans-serif;
    color: #751012;
}

/* CSS untuk Tombol Hamburger dan Menu Pelajaran */
.hamburger-menu {
    display: none; /* Sembunyikan tombol secara default */
    background-color: #bf1e2e;
    color: white;
    border: none;
    padding: 10px;
    font-size: 18px;
    cursor: pointer;
    margin-bottom: 10px;
    border-radius: 5px;
    width: 100%; /* Tambahkan lebar penuh untuk tombol hamburger */
    text-align: left; /* Tambahkan untuk menyesuaikan posisi teks */
}

/* Media Queries untuk Responsivitas */
@media only screen and (max-width: 992px) {
    .flex-leftcontent {
        position: relative; /* Buat posisi relatif untuk layar sedang */
        height: auto; /* Biarkan tinggi otomatis */
        max-width: 100%; /* Lebar penuh pada layar sedang */
        margin-bottom: 20px; /* Tambahkan margin bawah */
    }

    .flex-rightcontent {
        margin-left: 0; /* Hilangkan margin kiri */
        width: 100%; /* Lebar penuh */
    }
}

@media only screen and (max-width: 768px) {
    .flex-main {
        flex-direction: column;
    }

    .flex-leftcontent, .flex-rightcontent {
        flex: 1 1 100%;
        margin-right: 0;
        margin-left: 0; /* Reset margin for mobile view */
        position: relative; /* Change position to relative */
        height: auto; /* Allow dynamic height */
        overflow: visible; /* Reset overflow */
        max-width: 100%; /* Full width for mobile view */
    }

    .flex-rightcontent {
        width: 100%; /* Full width for mobile view */
        padding: 10px; /* Tambahkan padding */
    }

    .module-container {
        flex-direction: column;
    }

    .footer-level {
        flex-direction: column;
        align-items: center;
    }

    .btn-download, .btn-quiz, .btn-selesai {
        width: 100%; /* Lebar penuh pada perangkat kecil */
    }

    .main-container {
        margin-top: 15%;
    }

    .hamburger-menu {
        display: block; /* Tampilkan tombol hamburger */
    }

    .listleft {
        display: none; /* Sembunyikan menu pelajaran secara default */
    }

    #lesson-menu {
        display: none; /* Sembunyikan menu pelajaran secara default */
    }

    .cardjudul > h2 {
        font-size: 30px; /* Sesuaikan ukuran font untuk perangkat kecil */
        text-align: center; /* Pusatkan teks */
    }

    .cardjudul > h2::after {
        content: ''; /* Hapus konten tambahan */
        display: block; /* Tampilkan teks di baris baru */
        white-space: pre-wrap; /* Membungkus teks dengan tepat */
        margin-bottom: 10px; /* Tambahkan margin bawah jika perlu */
    }
    
    .cardjudul > h2 {
        display: flex; /* Gunakan flex untuk mempermudah pemisahan */
        flex-direction: column; /* Atur teks dalam kolom */
    }
}

@media only screen and (max-width: 480px) {
    h1 {
        font-size: 28px; /* Sesuaikan ukuran font untuk perangkat mobile */
    }

    .cardjudul > h2 {
        font-size: 30px; /* Sesuaikan ukuran font untuk perangkat mobile */
    }

    .modal-content {
        width: 95%; /* Lebih kecil untuk perangkat mobile */
    }

    .footer {
        margin-top: 20px; /* Lebih kecil untuk perangkat mobile */
    }

    .responsive-iframe-container {
        padding-bottom: 75%; /* Menambah tinggi rasio aspek untuk perangkat mobile */
    }

    .main-container {
        margin-top: 15%;
    }

    .cardjudul > h2 {
        font-size: 18px; /* Sesuaikan ukuran font untuk perangkat kecil */
        text-align: center; /* Pusatkan teks */
    }

    .cardjudul > h2::after {
        content: ''; /* Hapus konten tambahan */
        display: block; /* Tampilkan teks di baris baru */
        white-space: pre-wrap; /* Membungkus teks dengan tepat */
        margin-bottom: 10px; /* Tambahkan margin bawah jika perlu */
    }
    
    .cardjudul > h2 {
        display: flex; /* Gunakan flex untuk mempermudah pemisahan */
        flex-direction: column; /* Atur teks dalam kolom */
    }
}

.responsive-iframe-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* Rasio aspek 16:9 */
    height: 0;
    overflow: hidden;
    border-radius: 8px;
    margin-top: 20px;
}

.responsive-iframe-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
    border-radius: 8px;
}

.list-flexleft > a > li.active {
    color: #bf1e2e; /* Warna teks merah untuk item aktif */
    border: 1px solid #c3c3c3; /* Border merah untuk item aktif */
    background-color: #fff; /* Background putih untuk item aktif */
}

/* Pastikan menu pelajaran terlihat saat dibuka */
#lesson-menu.open {
    display: block; /* Tampilkan menu saat terbuka */
}


</style>

<?php
$id_level = $this->uri->segment(3);
	$sql="SELECT * FROM data_level a JOIN data_program b ON a.fid_program = b.id_program WHERE a.id_level='$id_level' ";

	$lvl = $this->db->query($sql)->row_object();
?>
<div class="container-content">
    <div class="container-home">
        <div class="main-container">
            <div class="flex-main">
                <div class="flex-leftcontent">
                    <h2 style="font-size: 20px;">Level <?php echo $lvl->level; ?></h2>
                    <!-- Tambahkan tombol hamburger -->
                    <button class="hamburger-menu" onclick="toggleLessonMenu()">☰ Menu Pelajaran</button>
                    <div class="listleft" id="lesson-menu">
                        <ul class="list-flexleft">
                  
                           <?php 

                           	foreach($this->db->query("SELECT * FROM data_materi WHERE fid_level='$id_level'")->result() as $mtr){
                           ?>

                            <a href="<?php echo site_url('program/level/'.$lvl->id_level.'/'.$mtr->id_materi); ?>"> <!-- Sesuaikan URL -->
                                <li class="<?php echo $this->uri->segment(4)==$mtr->id_materi?'active':'' ?>">
                                    <?php echo $mtr->judul_materi ?>
                                </li>
                            </a>

                        <?php } ?>

                        </ul>
                    </div>
                </div>
                <div class="flex-rightcontent">
                    <?php 
                    // Tampilkan pelajaran pertama jika currentLessonId tidak ada
                    if(empty($this->uri->segment(4))){

                    	$sqlMtr = "SELECT * FROM data_materi WHERE fid_level='$id_level' ORDER BY judul_materi ASC limit 1";

                    	$dataMtr = $this->db->query($sqlMtr)->row_object();
                       $id_materi = $dataMtr->id_materi;
                    ?>
                                <div class="cardright">
                                <div class="cardjudul">
						    <h2 class="judul-pembelajaran"> <?php echo $dataMtr->judul_materi; ?></h2>
						</div>

                                    <div class="module-container">
                                        <div class="module-img">
                                            <img src="<?php echo base_url('assets/images/book.png') ?>" alt="book" height="109">
                                        </div>
                                        <div class="module-download">
                                            <h3>Modul Level <?php echo $lvl->level; ?></h3>
                                            <?php foreach ($this->db->query("SELECT * FROM data_modul WHERE fid_materi='$id_materi'")->result() as $modul) { ?>
                                                <a target="_BLANK" href="<?php echo url_admin().$modul->file_modul; ?>" class="btn-sm btn-download"><i class="flaticon-download"></i> Download <?php echo $modul->nama_modul ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <p class="lesson-content">

                                    	<?php echo $dataMtr->isi_materi; ?>
                                    	

                                    </p>
                                  
                                    <div class="footer-level">
                                        <div>
                                          
                                                <a class="quiz" href="<?php echo $lesson->quiz_link; ?>"><img class="kerjakanquiz" src="<?php echo base_url('assets/images/img_kerjakan_quiz.png') ?>" height="78"></a>

 										 <?php foreach ($this->db->query("SELECT * FROM data_quiz WHERE fid_materi='$id_materi'")->result() as $quiz) { ?>
                                                <a target="_BLANK" href="<?php echo $quiz->link_quiz; ?>" class="btn-sm btn-download"><i class="flaticon-notes"></i> Kerjakan <?php echo $quiz->nama_quiz ?></a>
                                            <?php } ?>
                                     
                                        </div>

                                        <div>
                                            <a class="quiz" href="#"><img class="selesai" src="<?php echo base_url('assets/images/img_selesai.png') ?>" height="78"></a>
                                        </div>
                                    </div>
                                </div>
                    <?php 
                      }else{

                      	$id_materi = $this->uri->segment(4);
                   
                        $sqlMtr = "SELECT * FROM data_materi WHERE id_materi='$id_materi' AND fid_level='$id_level' ORDER BY judul_materi ASC limit 1";

                    	$dataMtr = $this->db->query($sqlMtr)->row_object();
                       $id_materi = $dataMtr->id_materi;
                    ?>
                                <div class="cardright">
                                <div class="cardjudul">
						    <h2 class="judul-pembelajaran"> <?php echo $dataMtr->judul_materi; ?></h2>
						</div>

                                    <div class="module-container">
                                        <div class="module-img">
                                            <img src="<?php echo base_url('assets/images/book.png') ?>" alt="book" height="109">
                                        </div>
                                        <div class="module-download">
                                            <h3>Modul Level <?php echo $lvl->level; ?></h3>
                                            <?php foreach ($this->db->query("SELECT * FROM data_modul WHERE fid_materi='$id_materi'")->result() as $modul) { ?>
                                                <a target="_BLANK" href="<?php echo url_admin().$modul->file_modul; ?>" class="btn-sm btn-download"><i class="flaticon-download"></i> Download <?php echo $modul->nama_modul ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <p class="lesson-content">

                                    	<?php echo $dataMtr->isi_materi; ?>
                                    	

                                    </p>
                                  
                                     
                                   
                                    <div class="footer-level">
                                        <div>
                                          
                                                <a class="quiz" href="<?php echo $lesson->quiz_link; ?>"><img class="kerjakanquiz" src="<?php echo base_url('assets/images/img_kerjakan_quiz.png') ?>" height="78"></a>

 										 <?php foreach ($this->db->query("SELECT * FROM data_quiz WHERE fid_materi='$id_materi'")->result() as $quiz) { ?>
                                                <a target="_BLANK" href="<?php echo $quiz->link_quiz; ?>" class="btn-sm btn-download"><i class="flaticon-notes"></i> Kerjakan <?php echo $quiz->nama_quiz ?></a>
                                            <?php } ?>
                                     
                                        </div>

                                        <div>
                                            <a class="quiz" href="#"><img class="selesai" src="<?php echo base_url('assets/images/img_selesai.png') ?>" height="78"></a>
                                        </div>
                                    </div>
                                </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
function toggleLessonMenu() {
    var menu = document.getElementById("lesson-menu");
    if (menu.classList.contains("open")) {
        menu.classList.remove("open");
    } else {
        menu.classList.add("open");
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const lessonItems = document.querySelectorAll('.list-flexleft > a > li');
    lessonItems.forEach(item => {
        const lessonId = item.getAttribute('data-lesson-id');
        if (lessonId == '<?php echo $currentLessonId; ?>') {
            item.classList.add('active');
        }
    });
});


</script>