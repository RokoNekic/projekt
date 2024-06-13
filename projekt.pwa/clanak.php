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


if (isset($_SESSION['username'])) {

    if (isset($_SESSION['level']) && $_SESSION['level'] == 1) {
      
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
            <div class="crta"><hr></div>
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
                    <li><a href="login.php">ODJAVA</a></li>
                </ul>
            </nav>
            <hr>
            <h1 class="imeportala">PORTAL</h1>
            <div class="crta"><hr></div>
        </header>
        <?php
    }
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
        <div class="crta"><hr></div>
    </header>
    <?php
}
?>

  
    

    <section class="clanak">

    <?php
    include 'connect.php';
    define('uploads', 'uploads/');
    ?>


    <?php

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($dbc, $_GET['id']);
    
        $query = "SELECT * FROM unos WHERE id = '$id'";
        $result = mysqli_query($dbc, $query);
    
        if ($row = mysqli_fetch_array($result)) {
            echo '<h1>' . htmlspecialchars($row['naslov']) . '</h1>';
            echo '<img src="uploads/' . htmlspecialchars($row['slika']) . '" alt="' . htmlspecialchars($row['naslov']) . '">';
            echo '<p>' . htmlspecialchars($row['sazetak']) . '</p>';
            echo '<p>' . htmlspecialchars($row['tekst']) . '</p>';
        } else {
            echo 'Članak nije pronađen.';
        }
    } else {
        echo 'ID nije postavljen.';
    }
    
    mysqli_close($dbc);
    
    $query = "SELECT * FROM unos WHERE kategorija='sport' LIMIT 1";
    

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $id = htmlspecialchars($id);

        
        $query = "SELECT * FROM unos WHERE id = ?";
        
   
        $i=0;
    }

    while($row = mysqli_fetch_array($result)) {
    echo '<article>';
    echo '<h2 class="title">';
    echo $row['naslov'];
    echo'</h2>';
    echo '<h4>';
    echo $row['datum'];
    echo '</h4>';
    echo '<img src="'.uploads.$row['slika'].'" alt="" width="100%"';
    echo'<h4>';
    echo $row['sazetak'];
    echo '</h4>';
    echo '</article>';
    }?>
        

    </section>

    <footer>
        <div>
            <h2> Roko Nekić, rnekic@tvz.hr, 2024.</h2>
        </div>


    </footer>









    
</body>
</html>