
<style>
* {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
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
    flex-wrap: wrap; /* Menambahkan flex-wrap untuk responsivitas */
}

.flex-leftcontent {
    flex: 1 1 30%; /* Mengatur lebar untuk responsivitas */
    padding: 10px;
    background-color: #f5f5f5;
    border-radius: 8px;
    margin-right: 20px;
}

.flex-leftcontent h2 {
    background-color: #bf1e2e;
    color: white;
    text-align: center;
    padding: 10px;
    border-radius: 8px 8px 0 0;
}

.listleft {
    padding: 10px;
}

.list-flexleft {
    list-style: none;
    padding: 0;
    margin: 0;
}

.list-flexleft > a > li {
    margin-bottom: 10px;
    padding: 10px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.list-flexleft > a > li:hover {
    background-color: #f0f0f0;
    border: 2px solid #a81826;
    border-style: dashed;
}

.flex-rightcontent {
    flex: 1 1 65%; /* Mengatur lebar untuk responsivitas */
    padding: 20px;
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
    width: 90%; /* Mengatur lebar untuk responsivitas */
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

/* Media Queries untuk Responsivitas */
@media only screen and (max-width: 768px) {
    .flex-main {
        flex-direction: column;
    }

    .flex-leftcontent, .flex-rightcontent {
        flex: 1 1 100%;
        margin-right: 0;
        margin-bottom: 20px;
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



</style>
<div class="container-content">
<div class="container-home">
    <div class="main-container">
        <h1><?php echo 'Level: ' . $level->name; ?></h1>

        <div class="flex-main">
            <div class="flex-leftcontent">
                <h2>Level <?php echo $level->id; ?></h2>
                <div class="listleft">
                    <ul class="list-flexleft">
                        <?php foreach ($lessons as $lesson): ?>
                            <a><li href="#"><?php echo $lesson->title; ?></li></a>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="flex-rightcontent">
    <?php foreach ($lessons as $lesson): ?>
        <div class="cardright">
            <div class="cardjudul">
                <h2><?php echo $lesson->title; ?></h2>
            </div>

            <div class="module-container">
                <div class="module-img">
                <img src="<?php echo base_url('assets/images/book.png') ?>" alt="book" height="109">

                </div>

                <div class="module-download">
                <h3><?php echo $level->name; ?></h3>
                <?php if ($lesson->module_url): ?>
                <a href="<?php echo $lesson->module_url; ?>" class="btn-download">Download Modul</a>
            <?php endif; ?>
                </div>

            </div>
         

            <p><?php echo $lesson->content; ?></p>

            <?php if ($lesson->video_url): ?>
                <div class="responsive-iframe-container"> 
                    <?php
                    // Ambil ID video dari URL YouTube
                    $video_id = '';
                    if (strpos($lesson->video_url, 'youtube.com') !== false) {
                        parse_str(parse_url($lesson->video_url, PHP_URL_QUERY), $query_params);
                        if (isset($query_params['v'])) {
                            $video_id = $query_params['v'];
                        }
                    } elseif (strpos($lesson->video_url, 'youtu.be') !== false) {
                        $video_id = basename(parse_url($lesson->video_url, PHP_URL_PATH));
                    }

                    // Gunakan URL embed jika ID video ditemukan
                    if ($video_id): ?>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

           <div class="footer-level">
                <div>
                <?php if ($lesson->quiz_link): ?>
                <a class="quiz" href="<?php echo $lesson->quiz_link; ?>"><img class="kerjakanquiz" src="<?php  echo base_url('assets/images/img_kerjakan_quiz.png') ?>" height="78"></a>
            <?php endif; ?>
                </div>

                <div>
                <a class="quiz" href="#"><img class="selesai" src="<?php  echo base_url('assets/images/img_selesai.png') ?>" height="78"></a>
                </div>
           </div>
        </div>
    <?php endforeach; ?>
</div>

        </div>
    </div>
</div>



        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <img src="<?php echo base_url("assets/images/selesai.png"); ?>" height="126" width="126"/>
               <h2>Kamu Telah Selesai</h2>
               <p>Di <?php echo $level->name;?>!</p>
           
            </div>
        </div>
</div>






<script>
/* Get the modal */
var modal = document.getElementById("myModal");

/* Get the button that opens the modal */
var btn = document.querySelector(".selesai");

/* Get the <span> element that closes the modal */
var span = document.getElementsByClassName("close")[0];

/* When the user clicks on the button, open the modal */
btn.onclick = function() {
    modal.style.display = "block";
}

/* When the user clicks on <span> (x), close the modal */
span.onclick = function() {
    modal.style.display = "none";
}

/* When the user clicks anywhere outside of the modal, close it */
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>