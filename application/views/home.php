 <?php
$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->row_object();


                     
	  				
?>

<style>

* {
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
}

.container-home {
  padding: 10px;
}

.slider-home {
  position: relative;
  max-width: 800px;
  margin: auto;
  overflow: hidden;
  margin-top: 8%;
  padding: 10px;
  width: 100%;
  max-width: 85%;
}

.slider img {
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  transition: opacity 1s ease-in-out;
}

.slider img:first-child {
  display: block;
  position: relative;
  opacity: 1;
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

.prev {
  left: 0;
  border-radius: 3px 0 0 3px;
}

.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

.program-belajar {
  padding: 10px;
  margin-top: 5%;
}

.contaier-card-programbelajar {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap; /* Responsive: move elements to the next line if they don't fit */
  gap: 20px; /* Space between cards */
}

.card-japan, .card-korea, .card-mandarin {
  padding: 10px;
  background-color: white;
  width: 100%;
  max-width: 365px;
  height: auto; /* Auto height to avoid cutting content */
  border-radius: 20px;
  border: 1px solid #878787;
  margin-top: 45px;
  transition: transform ease 0.3s;
  align-items: center;
  flex: 1 1 calc(33.33% - 40px); /* Responsive with three columns */
}

.flag {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 50px;
}

.card-japan:hover, .card-korea:hover, .card-mandarin:hover {
  transform: scale(1.1);
  cursor: pointer;
}

.list-card {
  padding: 20px;
  display: flex;
  justify-content: center;
}

.list-card > ul {
  font-size: 18px;
  font-weight: 500;
  color: #751012;
}

#artikel {
  margin-top: 10%;
}

.artikel-container {
  padding: 10px;
  margin-bottom: 80px;
}

.artikel-group {
  padding: 10px;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap; /* Responsive for articles */
  gap: 20px;
}

.artikel-list img {
  width: 100%;
  display: block;
  height: 343px; /* Allow height to adjust automatically */
}

.artikel-list {
  position: relative;
  max-width: 100%; /* Responsive */
  margin: 20px auto;
  overflow: hidden;
  border-radius: 15px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.overlay {
  position: absolute;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #fff;
  width: 100%;
  padding: 20px;
  box-sizing: border-box;
}

.text-container {
  display: flex;
  flex-direction: column;
}

.tittle {
  font-size: 24px;
  margin: 0;
  padding-bottom: 10px;
  font-weight: bold;
}

.subtitle {
  font-size: 16px;
  margin: 0;
  padding-bottom: 10px;
}

.link {
  align-self: flex-start;
  font-size: 16px;
  color: #fff;
  text-decoration: none;
  background-color: rgba(0, 0, 0, 0.7);
  padding: 8px 12px;
  border-radius: 5px;
  transition: background-color 0.3s, transform ease 0.3s;
}

.link:hover {
  background-color: rgba(0, 0, 0, 0.9);
  color: white;
  text-decoration: none;
  transform: scale(1.1);
}

/* Media Queries for Smaller Screens */
@media (max-width: 768px) {
  .slider-home {
    max-width: 100%;
    margin-top: 20%;
  }

  .program-belajar {
    margin-top: 10%;
  }

  .contaier-card-programbelajar {
    flex-direction: column; /* Column direction on small screens */
  }

  .card-japan, .card-korea, .card-mandarin {
    max-width: 100%; /* Cards take full width */
    margin-top: 30px;
    border: 0.5px solid black;
  }

  .artikel-group {
    flex-direction: column; /* One column on small screens */
  }

  .artikel-list {
    max-width: 100%;
  }

  .artikel-list img {
    height: auto; /* Make sure images scale */
  }
}

@media (max-width: 400px) {
  .prev, .next {
    font-size: 12px;
    padding: 8px;
  }

  .tittle {
    font-size: 20px;
  }

  .subtitle {
    font-size: 14px;
  }

  .link {
    font-size: 14px;
    padding: 6px 10px;
  }

  .slider-home {
    margin-top: 10%;
  }

  .artikel-list {
    margin: 10px auto; /* Less margin for smaller screens */
  }

  .overlay {
    padding: 10px; /* Smaller padding for better fit */
  }
}

</style>

<div class="container-content">
<div class="container-home">
    <div class="main-container">


        <!-- slider -->
            <div class="slider-home">
            <div class="slider">
            <img src="assets/images/slider_1.png" alt="Image 1" class="slide">
            <img src="assets/images/slider_2.png" alt="Image 2" class="slide">
            <img src="assets/images/slider_3.png" alt="Image 3" class="slide">
            </div>

             <!-- Navigation buttons -->
     
            </div>
    </div>


    <section id="program-belajar">
    <div class="program-belajar">
            <h2 style="text-align: center; font-size: 50px; font-weight: 800; color: #751012;">PROGRAM BELAJAR</h2>

            <div class="contaier-card-programbelajar">
                    <div class="card-japan">

                    <h3 style="text-align: center; font-weight: 800; font-size: 30px; margin-top:20px; color: #751012;">BAHASA JEPANG</h3>
                   <div class="flag">
                   <img src="assets/images/japan_flag.png" alt="japan" height="150">
                   </div>

                   <div class="list-card">
                        <ul>
                            <li>Kelas Reguler / Group Class</li>
                            <li>Kelas Semi-Private</li>
                            <li>Kelas Intensif 1 on 1</li>
                            <li>Japanese Online Class</li>
                            <li>Japanese for Kids (SD)</li>
                        </ul>
                   </div>
                    </div>


                    <div class="card-korea">
                    <h3 style="text-align: center; font-weight: 800; font-size: 30px; margin-top:20px; color: #751012;">BAHASA KOREA</h3>
                   <div class="flag">
                   <img src="assets/images/korea_flag.png" alt="japan" height="150">
                   </div>

                   <div class="list-card">
                        <ul>
                            <li>Kelas Reguler / Group Class</li>
                            <li>Kelas Semi-Private</li>
                            <li>Kelas Intensif 1 on 1</li>
                            <li>Korean Online Class</li>
                        </ul>
                   </div>
                    </div>



                    <div class="card-mandarin">
                    <h3 style="text-align: center; font-weight: 800; font-size: 30px; margin-top:20px; color: #751012;">BAHASA MANDARIN</h3>
                   <div class="flag">
                   <img src="assets/images/mandarin_flag.png" alt="japan" height="150">
                   </div>

                   <div class="list-card">
                        <ul>
                            <li>Kelas Reguler / Group Class</li>
                            <li>Kelas Semi-Private</li>
                            <li>Kelas Intensif 1 on 1</li>
                            <li>Mandarin Online Class</li>
                        </ul>
                   </div>
                    </div>
            </div>
    </div>
    </section>

    <section id="artikel">
        <div class="artikel-container">
        <h2 style="text-align: center; font-size: 50px; font-weight: 800; color: #751012;">Artikel</h2>

            <div class="artikel-group"> 
                 <div class="artikel-list">
                        <img class="atikel-img" src="assets/images/artikeldump.png" alt="atikel-img">
                        <div class="overlay">
                            <div class="text-container">
                                <h2 class="tittle">Cara Bilang “Hai” dalam Bahasa Jepang – Ada Banyak Loh!</h2>
                                <p class="subtitle">22 Agustus 2024 | 10.00 WIB</p>
                                  <div style="display: flex; justify-content: flex-end;">
                                  <a href="#" class="link">Selengkapnya &#10132;</a>
                                  </div>
                            </div>
                        </div>
                 </div>



                 <div class="artikel-list">
                        <img class="atikel-img" src="assets/images/artikeldump.2.png" alt="atikel-img">
                        <div class="overlay">
                            <div class="text-container">
                                <h2 class="tittle">Cara Minta Maaf dalam Bahasa Korea, Lengkap dengan Contohnya!</h2>
                                <p class="subtitle">22 Agustus 2024 | 10.00 WIB</p>
                                <div style="display: flex; justify-content: flex-end;">
                                  <a href="#" class="link">Selengkapnya &#10132;</a>
                                  </div>
                            </div>
                        </div>
                 </div>
            </div>

        </div>


    </section>

</div>


</div>



<script>
    // slider.js

let slideIndex = 0; // Index slide saat ini
showSlides(); // Panggil fungsi untuk menampilkan slide

// Fungsi untuk menampilkan slide dan mengatur timer untuk pergerakan otomatis
function showSlides() {
    let slides = document.getElementsByClassName("slide");

    // Sembunyikan semua slide dan set opacity ke 0 untuk animasi fade-out
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.opacity = "0"; 
    }

    // Tingkatkan slideIndex, jika lebih besar dari jumlah slide, kembali ke slide pertama
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    // Set display untuk gambar berikutnya agar terlihat
    slides[slideIndex - 1].style.display = "block";

    // Tampilkan slide saat ini dengan fade-in
    setTimeout(() => {
        slides[slideIndex - 1].style.opacity = "1"; 
    }, 50); // Delay singkat untuk memastikan opacity transisi bekerja dengan benar

    // Ulangi fungsi ini setiap 3 detik untuk slide otomatis
    setTimeout(showSlides, 3000); // Ubah angka 3000 untuk mengubah waktu delay (ms)
}

// Fungsi untuk mengubah slide secara manual dengan tombol navigasi
function plusSlides(n) {
    slideIndex += n;

    let slides = document.getElementsByClassName("slide");
    if (slideIndex > slides.length) {
        slideIndex = 1;
    } else if (slideIndex < 1) {
        slideIndex = slides.length;
    }

    // Sembunyikan semua slide
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        slides[i].style.opacity = "0"; // Set opacity ke 0 untuk animasi fade-out
    }

    // Tampilkan slide saat ini
    slides[slideIndex - 1].style.display = "block";
    setTimeout(() => {
        slides[slideIndex - 1].style.opacity = "1"; // Set opacity ke 1 untuk animasi fade-in
    }, 50);
}


function clickPembelajaran() {
    document.querySelector('.card-japan').addEventListener('click', function(e) {
        console.log("card japan di click");
        window.location.href = `<?php echo "bahasajepang" ?>`
    })

    document.querySelector('.card-korea').addEventListener('click', function(e) {
        console.log("card korea di click");
        window.location.href = `<?php echo "bahasakorea" ?>`
    })

    document.querySelector('.card-mandarin').addEventListener('click', function(e) {
        console.log("card japan di click");
        window.location.href = `<?php echo "bahasamandarin" ?>`
    })
}

clickPembelajaran();

</script>