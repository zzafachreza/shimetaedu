<?php

$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->result();


?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&family=Poppins:wght@300;400;600&display=swap');

a, h1, h6, i, p, span, label {
    font-family: 'Poppins', sans-serif;
}

.form-eza:focus {
    outline: none; 
    color: #000;
    border-bottom: 1px solid #D01818;
}

.form-eza {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: transparent;
    background-clip: padding-box;
    border-bottom: 1.8px solid #000;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

body {
    padding: 10px;
    background-image: url("assets/images/bglogin.png");
    background-size: cover;
    background-repeat: no-repeat;
    font-family: 'Poppins', sans-serif;
    margin: 0;
}

.container {
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* Ensures full height for centering */
}

.container-card {
    width: 100%;
    max-width: 500px; /* Set a max width for card */
    display: flex;
    justify-content: center;
    align-items: center;
}

.card {
    padding: 20px;
    background: white;
    backdrop-filter: blur(10px);
    border-radius: 10px;
    width: 100%;
    max-width: 500px; /* Make the card wider */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    border: 2px solid white;
}

.login-logo {
    padding: 10px;
    display: flex;
    justify-content: center;
}

.login-logo > img {
    max-width: 100%;
    height: auto; /* Responsive image */
}

.form-group {
    padding: 10px;
    margin-top: 20px; /* Adjusted margin for better spacing */
}

label {
    font-size: 15px;
    color: black;
}

.input-group {
    margin-top: 10px;
}

.btn-register {
    background-color: #BF1E2E;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    color: white;
    border: 0px;
    width: 100%; /* Make button width full */
    border-radius: 10px;
    height: 45px; /* Increase button height for better usability */
    transition: transform 0.3s;
    cursor: pointer;
}

.btn-register:hover {
    transform: scale(1.1);
}

.button-form {
    padding: 10px;
    margin-top: 20px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

a {
    font-size: 12px;
    margin-top: 10px;
    transition: transform 0.3s;
    text-decoration: none;
    color: black;
}

a:hover {
    text-decoration: none;
    color: black;
}

.btn-login {
    margin-top: 20px;
    text-align: center; /* Center the text */
}

.border-text {
    padding: 10px;
    text-align: center;
}

.border-text > h2 {
    font-size: 20px;
    font-weight: bold;
    color: #751012;
}

.nama-lengkap, .username, .email, .nomor-telepon, .password, .konfirmasi-password {
    margin-top: 20px;
}

/* Responsive Design */
@media only screen and (max-width: 768px) {
    .container {
        padding: 10px;
    }

    .card {
        max-width: 90%; /* Make card almost full width on smaller screens */
        padding: 20px;
    }

    .form-group {
        margin-top: 15px; /* Adjust spacing */
    }

    .btn-register {
        font-size: 16px; /* Larger font size for better touch target */
        height: 50px; /* Larger button height for easier tapping */
    }

    label {
        font-size: 16px; /* Slightly larger labels */
    }

    a {
        font-size: 14px; /* Adjust font size */
        text-decoration: none;
        color: black;
    }
}

@media only screen and (max-width: 480px) {
    .card {
        max-width: 95%; /* Make card almost full width on very small screens */
        padding: 20px;
    }

    .form-group {
        margin-top: 10px; /* Adjust spacing */
    }

    .btn-register {
        font-size: 16px; /* Adjust font size for mobile */
        height: 50px; /* Increase button height for better usability */
    }

    label {
        font-size: 16px; /* Slightly larger labels for mobile */
    }
}

</style> 

<body>
<div class="container">

    <div class="container-card">

            <div class="card"> 

            
                <div class="login-logo">
                <img src="assets/images/logo.png" alt="logo">
                </div>

                
    <div class="border-text">
            <h2>Registrasi</h2>
    </div>

    <form action="<?php echo "register/insert"; ?>" method="post"> <!-- Ubah 'submit.php' sesuai dengan skrip PHP yang menangani data form -->

<div class="form-group">
    <div class="nama-lengkap">
        <label for="nama-lengkap">Nama Lengkap</label>
        <input id="nama-lengkap" name="nama_lengkap" class="form-eza" type="text" required> <!-- Perbaikan 'required' -->
    </div>

    <div class="username">
        <label for="username">Username</label>
        <input id="username" name="username" class="form-eza" type="text" required>
    </div>

    <div class="email">
        <label for="email">Email</label>
        <input id="email" name="email" class="form-eza" type="email" required>
    </div>

    <div class="nomor-telepon">
        <label for="nomor-telepon">Nomor Telepon</label>
        <input id="nomor-telepon" name="nomor_telepon" class="form-eza" type="number" required>
    </div>

    <div class="password">
        <label for="password">Buat Password</label>
        <input name="password" id="password" class="form-eza" type="password" required>
    </div>

    <div class="konfirmasi-password">
        <label for="konfirmasi-password">Konfirmasi Password</label>
        <input name="konfirmasi-password" id="konfirmasi-password" class="form-eza" type="password" required>
    </div>

    <div class="button-form">
        <input type="submit" class="btn-register" name="submit" value="Register">
        <div class="btn-login">
            <a href="<?php echo "login" ?>">Belum memiliki akun? Silakan <span style="font-weight: bold;">login</span></a> <!-- Ubah href sesuai kebutuhan -->
        </div>
    </div>
</div>
</form>




                </div>
            </div>
    </div>

</div>
    
</body>
