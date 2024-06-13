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

define('UPLPATH', 'img/');


$uspjesnaPrijava = false;
$admin = false;


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

    
    if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
        $uspjesnaPrijava = true;
        
        if ($levelKorisnika == 1) {
            $admin = true;
        } else {
            $admin = false;
        }
        
        $_SESSION['username'] = $imeKorisnika;
        $_SESSION['level'] = $levelKorisnika;
    } else {
        $uspjesnaPrijava = false;
    }
}

?>

<?php

if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['username']) && $_SESSION['level'] == 1)) {
    $query = "SELECT * FROM korisnik";
    $result = mysqli_query($dbc, $query);
    while ($row = mysqli_fetch_array($result)) {
       
    }
    
} else if ($uspjesnaPrijava == true && $admin == false) {
    echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
} else if (isset($_SESSION['username']) && $_SESSION['level'] == 0) {
    echo '<p>Bok ' . $_SESSION['username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
} else if ($uspjesnaPrijava == false) {
    
    ?>

    <?php
}
?>

<header>
    <nav class="navigacija">
        <ul>
            <li><a href="projekt.php">HOME</a></li>
            <li><a href="kategorija.php?kategorija=politika">POLITIKA</a></li>
            <li><a href="kategorija.php?kategorija=sport">SPORT</a></li>
            <li><a href="unos.html">UNOS</a></li>
            <li><a href="administracija.php">ADMINISTRACIJA</a></li>
            <li> <a href="odjava.php"> ODJAVA </a></li>
        </ul>
    </nav>
    <hr>
    <h1 class="imeportala">PORTAL</h1>
    <div class="crta"><hr></div>
</header>

<section class="clanak">

<?php
include 'connect.php';
define('uploads', 'uploads/');
$query = "SELECT * FROM unos";
$result = mysqli_query($dbc, $query);

while ($row = mysqli_fetch_array($result)) {
    echo '<form enctype="multipart/form-data" action="" method="POST">
    <div class="form-item">
    <label for="title">Naslov vjesti:</label>
    <div class="form-field">
    <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
    </div>
    </div>
    <div class="form-item">
    <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
    <div class="form-field">
    <textarea name="about" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
    </div>
    </div>
    <div class="form-item">
    <label for="content">Sadržaj vijesti:</label>
    <div class="form-field">
    <textarea name="content" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
    </div>
    </div>
    <div class="form-item">
    <label for="pphoto">Slika:</label>
    <div class="form-field">
    <input type="file" class="input-text" id="pphoto" name="pphoto"/> <br><img src="' . uploads . $row['slika'] . '" width=100px>
    </div>
    </div>
    <div class="form-item">
    <label for="category">Kategorija vijesti:</label>
    <div class="form-field">
    <select name="category" class="form-field-textual" value="'.$row['kategorija'].'">
    <option value="sport">Sport</option>
    <option value="politika">Politika</option>
    </select>
    </div>
    </div>
    <div class="form-item">
    <label>
    <div class="form-field">';
    if ($row['arhiva'] == 0) {
        echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
    } else {
        echo '<input type="checkbox" class="check" name="archive" id="archive" checked/> Arhiviraj?';
    }
    echo '</div>
    </label>
    </div>
    <div class="form-item">
    <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
    <button type="reset" value="Poništi">Poništi</button>
    <button type="submit" name="update" value="Prihvati">Izmjeni</button>
    <button type="submit" name="delete" value="Izbriši">Izbriši</button>
    </div>
    <br>
    </form>';
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM unos WHERE id=$id";
    $result = mysqli_query($dbc, $query);
}

if (isset($_POST['update'])) {
    $picture = $_FILES['pphoto']['name'];
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $archive = isset($_POST['archive']) ? 1 : 0;
    $target_dir = 'uploads/' . $picture;
    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir); 
    $id = $_POST['id'];
    $query = "UPDATE unos SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id";
    $result = mysqli_query($dbc, $query);
}
?>

</section>

<footer>
    <div>
        <h2>Roko Nekić, rnekic@tvz.hr, 2024.</h2>
    </div>
</footer>

</body>
</html>
