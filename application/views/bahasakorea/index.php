<?php
$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->row_object();
$levels = $this->Levelkorea_model->get_all_levels();

                     
	  				
?>

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
    padding: 10px;
    margin-top: 2%; /* Reduced top margin for better alignment */
}

h1 {
    text-align: center;
    font-weight: 800;
    font-size: 60px;
    color: #751012;
    margin-top: 25px;
}

.flex-main {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
}

.flex-leftcontent {
    padding: 10px;
    margin-top: 1%;
    flex: 1;
    max-width: 50%;
    align-self: center;
}

.flex-rightcontent {
    padding: 10px;
    margin-top: 2%;
    flex: 1;
    max-width: 50%;
}

.korea-flag {
    width: 350px;
    height: auto;
    margin-left: 20%;
}

.listleft {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    padding: 10px;
    margin-left: 20%;
}

.list-flexleft {
    color: #751012;
    font-weight: 500;
    font-size: 18px;
}

.cardright {
    padding: 10px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 100%;
    height: auto;
    border-radius: 20px;
}

.cardjudul {
    padding: 10px;
    background-color: #BF1E2E;
    border-radius: 20px 20px 0 0;
}

.level-list {
    list-style: none;
    padding: 10px;
}

.level-list > a {
    text-decoration: none;
}

.level-list > a > li {
    padding: 10px;
    background-color: #F2F2F2;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    margin-top: 10px;
    color: #BF1E2E;
    font-size: 20px;
    font-weight: 600;
    text-align: center;
    transition: transform ease 0.2s;
}

.level-list > a > li:hover {
    transform: scale(1.1);
    border: 2px solid #BF1E2E;
    border-style: dashed;
}

.roadmap-container {
    margin-top: 10%;
}

.roadmap {
    padding: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.roadmap-img {
    width: 100%;
    height: auto;
}

@media only screen and (max-width: 768px) {
    .flex-main {
        flex-direction: column;
        align-items: center;
    }

    .flex-leftcontent, .flex-rightcontent {
        flex: 1 1 100%;
        max-width: 90%;
        margin-top: 5%;
    }

    .japan-flag {
        width: 80%;
        height: auto;
        margin-left: 0; /* Center on smaller screens */
    }

    .listleft {
        margin-left: 0; /* Center on smaller screens */
        padding: 0;
    }

    .level-list > a > li {
        font-size: 18px;
    }

    .cardright {
        width: 100%;
    }

    .roadmap-container {
        margin-bottom: 50px;
    }

    .container-home {
        margin-top: 10%;
    }

    h1 {
        font-size: 48px; /* Adjust font size for tablets */
        margin-top: 20px;
    }
}

@media only screen and (max-width: 480px) {
    .list-flexleft {
        font-size: 16px;
    }

    .cardright {
        width: 100%;
        padding: 20px;
    }

    .level-list > a > li {
        font-size: 16px;
        margin-top: 15px;
    }

    .roadmap-container {
        margin-bottom: 50px;
    }

    .container-home {
        margin-top: 10%;
    }

    h1 {
        font-size: 30px;
        margin-top: 20px;
    }

    .korea-flag {
        width: auto;
        height: 200px;
        margin-left: 0; /* Center on smaller screens */
    }
}



</style>

<div class="container-content">

<div class="container-home">
    <div class="main-container">
        <h1>BAHASA KOREA</h1>

        <div class="flex-main">
                <div class="flex-leftcontent">
                        <div>
                            <img class="korea-flag" src="assets/images/korea_flag.png" alt="korea-flag">
                        </div>

                        <div class="listleft">
                            <ul class="list-flexleft">
                                <li>Kelas Reguler / Group Class</li>
                                <li>Kelas Semi-Private</li>
                                <li>Kelas Intensif 1 on 1</li>
                                <li>Korea Online Class</li>
                            </ul>
                        </div>

                    </div>
                    <div class="flex-rightcontent">
                       <div class="cardright">
                            <div class="cardjudul">
                                <h2 style="color:white; text-align:center; font-weight: 800; font-size: 30px">Level : </h2>
                            </div>

                            <div class="listlevel-container">
                                <ul class="level-list">
                 
                    <?php foreach ($levels as $level): ?>
                                <a href="<?php echo site_url('bahasakorea/level/' . $level->id); ?>" class="level">
                                    <li><?php echo $level->name; ?></li>
                                </a>
                            <?php endforeach; ?>
                                </ul>
                            </div>
                       </div>
                    </div>
        </div>




        <div class="roadmap-container">
            <div class="roadmap">
                <img class="roadmap-img" src="assets/images/bahasakorea_roadmap.png" alt="roadmap-bahasajepang">
            </div>
        </div>
     
    </div>



 

</div>



</div>


<script>


</script>