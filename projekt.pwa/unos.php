<?php
            include 'connect.php';

            $slika = $_FILES['pphoto']['name'];
            $naslov=$_POST['title'];
            $ks=$_POST['about'];
            $sadrzaj=$_POST['content'];
            $kategorija=$_POST['category'];
            $date=date('Y-m-D');
            $arhiva=isset($_POST['archive'])? 1:0;

            if(isset($_POST['arhiva'])){
             $archive=1;
            }else{
             $archive=0;
            }
            
            $target_dir = 'uploads/'.$slika;
            move_uploaded_file($slika=$_FILES["pphoto"]["name"], $target_dir);
            
            $query = "INSERT INTO unos (datum, naslov, sazetak, tekst, slika, kategorija,
            arhiva ) VALUES ('$date', '$naslov', '$ks', '$sadrzaj', '$slika',
            '$kategorija', '$arhiva')";
            $result = mysqli_query($dbc, $query) or die('Error querying databese.');
            mysqli_close($dbc);
            ?>