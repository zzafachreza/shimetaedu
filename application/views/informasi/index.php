<?php
// Mengambil data artikel dari database
$query = $this->db->query("SELECT * FROM artikel");
$articles = $query->result();



?>



<style>
  .container {
    padding: 1px;
}

.artikel-container {
    padding: 1px;
    margin-top: 10%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
}

.artikel-card {
    position: relative;
    width: 100%; /* Make it 100% width for responsive */
    max-width: 450px; /* Restrict maximum width */
    margin-bottom: 20px; /* Add some space at the bottom */
    overflow: hidden;
    border-radius: 15px;
    object-fit: cover;
    transition: transform 0.3s ease; /* Add a smooth transform effect */
}

.artikel-img {
    width: 100%; /* Make it responsive */
    height: auto;
    display: block;
    object-fit: cover; /* Ensure the image covers the entire area */
}

.artikel-konten {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.5); /* Make it a bit darker for better text visibility */
    color: white;
    padding: 10px;
    height: 100px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.artikel-judul {
    font-size: 15px;
    font-weight: 800;
    margin-bottom: 5px; /* Add some space below the title */
}

.artikel-deksripsi {
    font-size: 10px;
    margin-bottom: 5px; /* Add some space below the description */
}

.read-more {
    font-size: 10px;
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.read-more::after {
    content: '→';
    margin-left: 5px;
}

.read-more:hover {
    color: white;
    text-decoration: none;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    .artikel-container {
        flex-direction: column; /* Stack articles vertically on smaller screens */
        align-items: center; /* Center the articles */
        margin-top: 10%;
    }

    .artikel-card {
        width: 90%; /* Make cards almost full width */
        max-width: 350px; /* Adjust max width for smaller screens */
    }

    .artikel-judul {
        font-size: 14px; /* Adjust font size for smaller screens */
    }

    .artikel-deksripsi {
        font-size: 9px; /* Adjust font size for smaller screens */
    }

    .read-more {
        font-size: 9px; /* Adjust font size for smaller screens */
    }
}

@media (max-width: 480px) {
   
    .artikel-container {
        margin-top: 25%;
    }
    .artikel-card {
        width: 100%; /* Full width on extra small screens */
        max-width: none; /* Remove max width constraint */
    }

    .artikel-judul {
        font-size: 13px; /* Further reduce font size */
    }

    .artikel-deksripsi {
        font-size: 8px; /* Further reduce font size */
    }

    .read-more {
        font-size: 8px; /* Further reduce font size */
    }

    .artikel-konten {
        height: auto; /* Allow content height to adjust dynamically */
        padding: 8px; /* Reduce padding */
    }
}

</style>

<div class="container-content">

<div class="container">
        <div class="artikel-container">
        <?php
date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke Jakarta

// Ambil data artikel dari database
foreach ($articles as $article) {
    // Format tanggal dan waktu
    $publish_date = date('d F Y | H:i', strtotime($article->publish_date));
    echo '<div class="artikel-card">';
    echo '<img class="artikel-img" src="' . base_url('assets/images/' . $article->image_url) . '">';
    echo '<div class="artikel-konten">';
    echo '<div class="artikel-judul">' . $article->title . '</div>';
    echo '<div class="artikel-deksripsi">' . $publish_date . ' WIB</div>';
    echo '<a href="' . site_url('informasi/readmore/' . $article->id) . '" class="read-more">Selengkapnya</a>';
    echo '</div>';
    echo '</div>';
}
?>

        </div>
</div>
</div>

