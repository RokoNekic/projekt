<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="clanakbody">
    
 <?php
session_start();
include 'connect.php';


if (isset($_SESSION['username']) && $_SESSION['level'] == 1) {

    ?>
    <header>
        <nav class="navigacija">
            <ul>
                <li><a href="projekt.php">HOME</a></li>
                <li><a href="kategorija.php?kategorija=politika">POLITIKA</a></li>
                <li><a href="kategorija.php?kategorija=sport">SPORT</a></li>
                <li><a href="unos.html">UNOS</a></li>
                <li><a href="administracija.php">ADMINISTRACIJA</a></li>
                <li><a href="login.php">ODJAVA</a></li>
            </ul>
        </nav>
        <hr>
        <h1 class="imeportala">PORTAL</h1>
        <div class="crta">
            <hr>
        </div>
    </header>
    <?php
} else {

    ?>
    <header>
        <nav class="navigacija">
            <ul>
                <li><a href="projekt.php">HOME</a></li>
                <li><a href="kategorija.php?kategorija=politika">POLITIKA</a></li>
                <li><a href="kategorija.php?kategorija=sport">SPORT</a></li>
                <li><a href="login.php">LOGIN</a></li>
            </ul>
        </nav>
        <hr>
        <h1 class="imeportala">PORTAL</h1>
        <div class="crta">
            <hr>
        </div>
    </header>
    <?php
}
?>

<?php

if (isset($_POST['prijava'])) {
    $prijavaImeKorisnika = $_POST['username'];
    $prijavaLozinkaKorisnika = $_POST['lozinka'];

    
    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }

    
    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
    mysqli_stmt_fetch($stmt);

   
    if (mysqli_stmt_num_rows($stmt) > 0 && password_verify($prijavaLozinkaKorisnika, $lozinkaKorisnika)) {
        $_SESSION['username'] = $imeKorisnika;
        $_SESSION['level'] = $levelKorisnika;

       
        if ($levelKorisnika == 1) {
            
            header("Location: administracija.php");
        } else {
            
            header("Location: projekt.php");
        }
        exit(); 
    } else {
       
        echo '<p>Pogrešno korisničko ime ili lozinka.</p>';
    }
}
?>


<section role="main" class="main">
    <form action="" method="POST">
        <div class="form-item">
            <label for="username">Korisničko ime:</label>
            <div class="form-field">
                <input type="text" name="username" class="form-field-textual">
            </div>
        </div>
        <div class="form-item">
            <label for="lozinka">Lozinka:</label>
            <div class="form-field">
                <input type="password" name="lozinka" class="form-field-textual">
            </div>
        </div>
        <div class="form-item">
            <button href="projekt.php" type="submit" name="prijava" value="Prijava">Prijava</button>
            <p> Nemate račun? <a href="registracija.php"> Registrirajte se</a></p>
        </div>
    </form>
</section>

    <footer>
        <div>
            <h2>Roko Nekić, rnekic@tvz.hr, 2024.</h2>
        </div>
    </footer>
</body>
</html>