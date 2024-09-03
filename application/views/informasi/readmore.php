<?php
// Mengambil ID artikel dari URL
$article_id = $this->uri->segment(3); // Asumsi ID artikel ada di segmen ke-3 URL

// Query untuk mengambil artikel berdasarkan ID
$article = $this->db->get_where('artikel', array('id' => $article_id))->row(); // Mengambil artikel berdasarkan ID

// Memeriksa apakah artikel ditemukan
if ($article):
    // Ambil semua artikel lain untuk bagian "Informasi lainnya"
    $this->db->where('id !=', $article_id);
    $other_articles = $this->db->get('artikel')->result();

 
?>

<style>
 .container {
    padding: 10px;
    max-width: 1200px; /* Set max-width untuk container utama */
    margin: auto;
}

.informasireadmore-container {
    padding: 20px;
    margin-top: 8%;
    width: 65%; /* Sesuaikan dengan kebutuhan */
    height: auto;
    border-radius: 10px; /* Menambahkan border-radius */
}

.judul-informasi {
    text-align: center;
    color: #BF1E2E;
    font-weight: 500;
    font-size: 35px;
}

.img-informasi {
    width: 100%; /* Sesuaikan ukuran agar responsif */
    height: auto;
    border-radius: 10px; /* Menambahkan border-radius */
}

.imginformasi-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10%;
}

.content-container {
    margin-top: 10%;
}

.deksripsi {
    color: #751012;
    font-size: 18px;
    font-weight: 500;
    text-align: justify;
    margin-bottom: 70px;
    margin-top: 20px;
}

.flex-informasi {
    display: flex;
    justify-content: space-between;
    gap: 20px; /* Menambahkan gap untuk memberi jarak antar konten */
    flex-wrap: wrap; /* Make sure items wrap to next line */
}

.allinformasi-container {
    padding: 10px;
    background-color: #fff; /* Mengubah background agar lebih enak dilihat */
    width: 30%; /* Sesuaikan dengan kebutuhan */
    height: auto;
    margin-top: 8%;
    border-radius: 10px; /* Menambahkan border-radius */
}

.strip {
    width: 2px;
    background-color: #BF1E2E;
    margin-top: 8%;
    height: auto;
    border-radius: 20px;
}

h3 {
    color: #751012;
    font-weight: 600;
    font-size: 20px;
}

.artikel-card {
    position: relative;
    width: 100%; /* Sesuaikan ukuran agar responsif */
    margin-bottom: 10px;
    overflow: hidden;
    border-radius: 15px;
    object-fit: cover;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Menambahkan shadow */
}

.artikel-img {
    width: 100%; /* Sesuaikan ukuran agar responsif */
    height: auto;
    display: block;
}

.artikel-konten {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.3);
    color: white;
    padding: 10px;
    height: 100px;
}

.artikel-judul {
    font-size: 15px;
    font-weight: 800;
}

.artikel-deksripsi {
    font-size: 10px;
}

.read-more {
    font-size: 10px;
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-top: 0;
}

.read-more::after {
    content: '→';
    margin-left: 5px;
}

.read-more:hover {
    color: white;
    text-decoration: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .flex-informasi {
        flex-direction: column; /* Stack elements vertically on smaller screens */
        align-items: center; /* Center items */
        margin-top: 20%;
    }

    .informasireadmore-container {
        width: 100%; /* Make it full width on smaller screens */
        margin-top: 20px; /* Add some margin for spacing */
    }

    .allinformasi-container {
        width: 100%; /* Make it full width on smaller screens */
        margin-top: 20px; /* Add some margin for spacing */
        margin-bottom: 200px;
    }

    .strip {
        display: none; /* Hide the strip on smaller screens */
    }

    .judul-informasi {
        font-size: 28px; /* Adjust font size */
    }

    .deksripsi {
        font-size: 16px; /* Adjust font size */
    }

    .artikel-judul {
        font-size: 13px; /* Adjust font size */
    }

    .artikel-deksripsi {
        font-size: 9px; /* Adjust font size */
    }

    .read-more {
        font-size: 9px; /* Adjust font size */
    }

    .informasilainnya {
        margin-bottom: 20px;
    }
}

@media (max-width: 480px) {
    .judul-informasi {
        font-size: 24px; /* Further adjust font size */
    }

    .deksripsi {
        font-size: 14px; /* Further adjust font size */
    }

    .artikel-judul {
        font-size: 12px; /* Further adjust font size */
    }

    .artikel-deksripsi {
        font-size: 8px; /* Further adjust font size */
    }

    .read-more {
        font-size: 8px; /* Further adjust font size */
    }

    .content-container {
        margin-top: 5%; /* Reduce top margin */
    }

    .informasilainnya {
        margin-bottom: 20px;
    }

    .allinformasi-container {
        width: 100%; /* Make it full width on smaller screens */
        margin-top: 20px; /* Add some margin for spacing */
        margin-bottom: 200px;
    }

}

</style>

<div class="container-content">

<div class="container">
    <div class="flex-informasi">
        <div class="informasireadmore-container">
            <h1 class="judul-informasi"><?php echo $article->title; ?></h1>

            <div class="imginformasi-container">
                <!-- Tampilkan gambar dari artikel -->
                <img class="img-informasi" src="<?php echo base_url('assets/images/' . $article->image_url); ?>" alt="img informasi">
            </div>

            <div class="content-container">
                <div class="time-content"><?php echo date('d F Y | H:i', strtotime($article->publish_date)) . ' WIB'; ?></div>

                <div class="deksripsi-content">
                    <p class="deksripsi"><?php echo $article->deksripsi; ?></p>
                </div>
            </div>
        </div>

        <div class="strip"></div>

        <div class="allinformasi-container">
            <h3 class="informasilainnya">Informasi lainnya</h3>

            <div>
                <?php
                date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke Jakarta

                // Ambil data artikel lainnya dari database
                if (!empty($other_articles)) {
                    foreach ($other_articles as $other_article) {
                        // Format tanggal dan waktu
                        $publish_date = date('d F Y | H:i', strtotime($other_article->publish_date));
                        echo '<div class="artikel-card">';
                        echo '<img class="artikel-img" src="' . base_url('assets/images/' . $other_article->image_url) . '">';
                        echo '<div class="artikel-konten">';
                        echo '<div class="artikel-judul">' . $other_article->title . '</div>';
                        echo '<div class="artikel-deksripsi">' . $publish_date . ' WIB</div>';
                        echo '<a href="' . site_url('informasi/readmore/' . $other_article->id) . '" class="read-more">Selengkapnya</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Tidak ada artikel lain untuk ditampilkan.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

</div>

<?php
// Jika artikel tidak ditemukan, tampilkan pesan error
else:
    echo "<p>Artikel tidak ditemukan.</p>";
endif;
?>
