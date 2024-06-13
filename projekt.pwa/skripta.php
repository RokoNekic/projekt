<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekt</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="clanakbody">

    <header>
        <nav class="navigacija">
            <ul>
                <li > <a href="projekt.php"> HOME </a> </li>
                <li > <a href="kategorija.php?id=politika"> POLITIKA </a></li>
                <li> <a href="kategorija.php?id=sport"> SPORT </a></li>
                <li> <a href="unos.html"> UNOS</a></li>
                <li> <a href="administracija.php"> ADMINISTRACIJA </a></li>
            </ul>
        </nav>

        <hr>
        <h1 class="imeportala"> PORTAL</h1>

        <div class="crta">
            <hr >
        </div>
    
        
    </header>

    <?php
    include'unos.php';
    

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $about = isset($_POST['about']) ? $_POST['about'] : '';
            $content = isset($_POST['content']) ? $_POST['content'] : '';
            $category = isset($_POST['category']) ? $_POST['category'] : '';
            $datetime = isset($_POST['datetime']) ? $_POST['datetime'] : '';
            $archive = isset($_POST['archive']) ? "Da" : "Ne";

            if ($datetime) {
                $datetimeObj = new DateTime($datetime);
                $formattedDatetime = $datetimeObj->format('d.m.Y H:i');
            } else {
                $formattedDatetime = '';
            }

    
    if (isset($_FILES['pphoto']) && $_FILES['pphoto']['error'] === UPLOAD_ERR_OK) {
        $photoTmpName = $_FILES['pphoto']['tmp_name'];
        $photoDestination = 'uploads/' . $_FILES['pphoto']['name'];


        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        if (move_uploaded_file($photoTmpName, $photoDestination)) {

        } else {
            echo "Došlo je do greške prilikom uploada vaše slike!";
        }
    } else {
        echo "Niste izabrali sliku ili je došlo do greške prilikom uploada!";
    }
} else {
    echo "Forma nije ispravno poslana!";
}
?>

    <section class="clanak">
    
        <article>
            
            <div>
                
                <h2> <?php 
                echo "$title";
                
                ?>  
                </h2>
                <h5><?php 
                echo "$datetime";
                
                ?> </h5>
                <?php
                echo "<img src='" . htmlspecialchars($photoDestination) . "' alt='Uplodana slika'>";

                ?>
                
                <h4> <?php 
                echo "$about";
                
                ?>  </h4>
                    
                    <h4> <?php 
                echo "$content";
                
                ?>  </h4>

            </div>
    
        </article>
    </section>

    <footer>
        <div>
            <h2> Roko Nekić, rnekic@tvz.hr, 2024.</h2>
        </div>


    </footer>









    
</body>
</html>

