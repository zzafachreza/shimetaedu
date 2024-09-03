
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
    flex-wrap: wrap; /* Ensures items wrap on smaller screens */
}

.flex-leftcontent {
    flex: 1;
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
    flex: 2;
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

.btn-download, .btn-quiz {
    display: block;
    background-color: #bf1e2e;
    color: white;
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    margin: 10px 0;
    transition: background-color 0.3s ease, transform ease 0.3s;
}

.btn-selesai {
    display: block;
    background-color: #49AD19;
    color: white;
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    margin: 10px 0;
    transition: background-color 0.3s ease, transform ease 0.3s;
}

.btn-download:hover, .btn-quiz:hover {
    background-color: #a81826;
    text-decoration: none;
    color: white;
    transform: scale(1.1);
}

.btn-selesai:hover {
    background-color: #257200;
    text-decoration: none;
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
    flex-wrap: wrap; /* Ensures items wrap on smaller screens */
}

.footer-level {
    padding: 10px;
    display: flex;
    justify-content: space-between;
    margin-top: 10%;
    flex-wrap: wrap; /* Ensures items wrap on smaller screens */
}

/* Media Queries for Smaller Screens */
@media (max-width: 768px) {
    .flex-main {
        flex-direction: column; /* Stack the flex items vertically */
    }

    .flex-leftcontent, .flex-rightcontent {
        margin-right: 0;
        flex: none; /* Remove flex properties for stacking */
        width: 100%; /* Ensure full width */
        margin-bottom: 20px; /* Add spacing between sections */
    }

    .cardright {
        margin-bottom: 30px; /* More space between cards on smaller screens */
    }

    .footer-level {
        flex-direction: column; /* Stack buttons vertically */
        align-items: center;
    }

    .main-container {
    margin-top: 15%;

}

}

@media (max-width: 480px) {
    .cardjudul > h2 {
        font-size: 30px; /* Smaller font for very small screens */
    }

    .btn-download, .btn-quiz, .btn-selesai {
        font-size: 14px; /* Adjust button text size */
        padding: 8px; /* Smaller padding */
    }

    .iframe {
        height: 200px; /* Adjust iframe height for smaller screens */
    }

    .main-container {
    margin-top: 15%;

}

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
                <div>
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
                <a class="quiz" href="<?php echo $lesson->quiz_link; ?>"><img class="selesai" src="<?php  echo base_url('assets/images/img_selesai.png') ?>" height="78"></a>
                </div>
           </div>
        </div>
    <?php endforeach; ?>
</div>

        </div>
    </div>
</div>

</div>
