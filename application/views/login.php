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
    border: 1px solid #D01818;
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
    border-radius: 10px;
    border: 1px solid black;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

body {
    padding: 10px;
    background-image: url("assets/images/bglogin.png");
    background-size: cover;
    background-repeat: no-repeat;
    font-family: 'Poppins', sans-serif;
}

.container {
    padding: 20px;
}

.container-card {
    padding: 10px;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card {
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    width: 366px; /* Updated width */
    height: 458px; /* Updated height */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adding some shadow for a subtle depth effect */
}

.login-logo {
    padding: 10px;
    display: flex;
    justify-content: center;
}

.login-logo > img {
    width: 262px;
    height: 75px;
}

.form-group {
    padding: 10px;
    margin-top: 10px;
}

label {
    font-size: 14px; /* Adjusted font size */
    color: #BF1E2E;
  
}

input {
    margin-top: 10px;
}

.password {
    margin-top: 10px;
}

.btn-login {
    background-color: #BF1E2E;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    color: white;
    border: 0px;
    width: 100%;
    border-radius: 10px;
    height: 40px;
    transition: transform 0.3s;
    cursor: pointer;

}

.btn-login:hover {
    transform: scale(1.05);
}

.button-form {
    padding: 10px;

    display: flex;
    flex-direction: column;
    align-items: center;
    bottom: 0;
}

a {
    font-size: 12px;
    margin-top: 10px;
    color: #BF1E2E;
    text-decoration: none;
}

a:hover {
    text-decoration: none;

}

.btn-register {
    margin-top: 20px;
}

.forgot-password {
    display: flex;
    justify-content: flex-end;
}

.lupa-password {
    color: #878787;
}

.lupa-password:hover {
    color: #878787;
    cursor:  pointer;
}

/* Media Queries for Responsive Design */
@media (max-width: 768px) {
    .card {
        width: 90%; /* Wider card for mobile devices */
        padding: 20px; /* Increase padding for better spacing */
    }

    .form-group {
        padding: 10px; /* Adjust padding on mobile */
    }

    .btn-login {
        height: 55px; /* Larger button for mobile */
        font-size: 20px; /* Increase font size for better readability */
    }

    label {
        font-size: 16px; /* Adjust font size for better readability */
    }

    a {
        font-size: 16px; /* Adjust link font size for mobile */
        color: #BF1E2E;
        text-decoration: none;
        margin-top: 15px;
    }
}

@media (max-width: 480px) {
    .card {
        width: 95%; /* Full width card for smaller devices */
        padding: 25px; /* More compact padding */
    }

    .btn-login {
        height: 60px; /* Even larger button for better touch target */
        font-size: 22px; /* Further increase font size for readability */
    }

    label {
        font-size: 18px; /* Larger font for better readability */
    }

    a {
        font-size: 18px; /* Adjust link font size for better readability */
        color: #BF1E2E;
        text-decoration: none;
        margin-top: 10%;
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

            <!-- Display error message if any -->
            <?php if (isset($_SESSION['error'])): ?>
                <div style="color: red; text-align: center; margin-bottom: 20px;">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); // Clear error message after displaying
                    ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo "login/validasi" ?>" method="post">
                <div class="form-group">
                    <div class="username-email">
                        <label>Username/Email</label>
                        <input class="form-eza" type="text" name="login" required>
                    </div>

                    <div class="password">
                        <label>Password</label>
                        <input class="form-eza" type="password" name="password" required>
                    </div>

                    <div class="forgot-password">
                        <a class="lupa-password"><p>Lupa Password?</p></a>
                    </div>

                    <div class="button-form">
                        <button type="submit" class="btn-login" name="submit">Masuk</button>
                        <div class="btn-register">
                            <a href="<?php echo "register" ?>">Belum memiliki akun? Silakan <span style="font-weight: bold;">registrasi</span></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
