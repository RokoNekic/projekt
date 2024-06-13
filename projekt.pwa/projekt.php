<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekt</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>



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
                <li><a href="odjava.php">ODJAVA</a></li>
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
    define('uploads', 'uploads/');
    ?>



<section class="prvi">

<?php

$query = "SELECT * FROM unos WHERE arhiva=0 AND kategorija='politika' LIMIT 3";
$result = mysqli_query($dbc, $query);

echo'<aside>  
<hr>
<h3 class="sastrane"> POLITIKA </h4> </aside>';
$i=0;

while($row = mysqli_fetch_array($result)) {
echo '<article class="artikl">';
echo '<a href="clanak.php?id='.$row['id'].'">';
echo'<img src="'.uploads.$row['slika'].'" alt="" width="100%" height="205px">';
echo '<h2 class="title">';
echo '</a>';


echo '<h2 class="title">';
echo '<a href="clanak.php?id='.$row['id'].'">';
echo $row['naslov'];
echo '</a>';
echo '<h4 class="">';
echo $row['sazetak'];
echo '</h4>';

echo '</article>';
}?>

</section>
    
    <section class="prvi">

    <?php
    $query = "SELECT * FROM unos WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
    $result = mysqli_query($dbc, $query);
    echo'<aside>  
    <hr>
    <h3 class="sastrane"> SPORT </h4> </aside>';
    $i=0;

    while($row = mysqli_fetch_array($result)) {
    echo '<article class="artikl">';
    echo '<a href="clanak.php?id='.$row['id'].'">';
    
    echo'
    <img src="'.uploads.$row['slika'].'" alt="" width="100%" height="205px">';
    echo '<h2 class="title">';
    echo '</a>';
    
    
    echo '<h2 class="title">';
    echo '<a href="clanak.php?id='.$row['id'].'">';
    echo $row['naslov'];
    echo '</a>';
    echo '<h4 class="">';
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