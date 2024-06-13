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
                <li><a href="administracija.php">LOGIN</a></li>
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
include 'connect.php'; 

$ime = isset($_POST['ime']) ? $_POST['ime'] : '';
$prezime = isset($_POST['prezime']) ? $_POST['prezime'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$lozinka = isset($_POST['pass']) ? $_POST['pass'] : '';
$hashed_password = password_hash($lozinka, PASSWORD_BCRYPT); 
$razina = 0;
$registriranKorisnik = '';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    if (mysqli_stmt_num_rows($stmt) > 0) {
        $msg = 'Korisničko ime već postoji!';
    } else {
        
        $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
            mysqli_stmt_execute($stmt);
            $registriranKorisnik = true;
        }
    }
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

   
    if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
        $uspjesnaPrijava = true;
        
        if ($levelKorisnika == 1) {
            $admin = true;
            echo '<p>Uspješno ste prijavljeni kao administrator.</p>';
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

    <?php if ($registriranKorisnik) : ?>
        <p>Korisnik je uspješno registriran!</p>
    <?php else : ?>
        <section role="main" class="main">
            <form enctype="multipart/form-data" action="" method="POST">
                <div class="form-item">
                    <span id="porukaIme" class="bojaPoruke"></span>
                    <label for="ime">Ime: </label>
                    <div class="form-field">
                        <input type="text" name="ime" id="ime" class="form-fieldtextual">
                    </div>
                </div>
                <div class="form-item">
                    <span id="porukaPrezime" class="bojaPoruke"></span>
                    <label for="prezime">Prezime: </label>
                    <div class="form-field">
                        <input type="text" name="prezime" id="prezime" class="formfield-textual">
                    </div>
                </div>
                <div class="form-item">
                    <span id="porukaUsername" class="bojaPoruke"></span>
                    <label for="username">Korisničko ime:</label>
                    <?php echo '<br><span class="bojaPoruke" style="color:red;">'.$msg.'</span>'; ?>
                    <div class="form-field">
                        <input type="text" name="username" id="username" class="formfield-textual">
                    </div>
                </div>
                <div class="form-item">
                    <span id="porukaPass" class="bojaPoruke"></span>
                    <label for="pass">Lozinka: </label>
                    <div class="form-field">
                        <input type="password" name="pass" id="pass" class="formfield-textual">
                    </div>
                </div>
                <div class="form-item">
                    <span id="porukaPassRep" class="bojaPoruke"></span>
                    <label for="passRep">Ponovite lozinku: </label>
                    <div class="form-field">
                        <input type="password" name="passRep" id="passRep" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <button type="submit" value="Prijava" id="slanje">Prijava</button>
                </div>
            </form>
        </section>

        <script type="text/javascript">
            document.getElementById("slanje").onclick = function(event) {
                var slanjeForme = true;

                
                var poljeIme = document.getElementById("ime");
                var ime = document.getElementById("ime").value;
                if (ime.length == 0) {
                    slanjeForme = false;
                    poljeIme.style.border = "1px dashed red";
                    document.getElementById("porukaIme").innerHTML = "<br>Unesite ime!<br>";
                    document.getElementById("porukaIme").style.color = "red"; // Promjena boje teksta
                } else {
                    poljeIme.style.border = "1px solid green";
                    document.getElementById("porukaIme").innerHTML = "";
                }

                
                var poljePrezime = document.getElementById("prezime");
                var prezime = document.getElementById("prezime").value;
                if (prezime.length == 0) {
                    slanjeForme = false;
                    poljePrezime.style.border = "1px dashed red";
                    document.getElementById("porukaPrezime").innerHTML = "<br>Unesite Prezime!<br>";
                    document.getElementById("porukaPrezime").style.color = "red"; // Promjena boje teksta
                } else {
                    poljePrezime.style.border = "1px solid green";
                    document.getElementById("porukaPrezime").innerHTML = "";
                }

                
                var poljeUsername = document.getElementById("username");
                var username = document.getElementById("username").value;
                if (username.length == 0) {
                    slanjeForme = false;
                    poljeUsername.style.border = "1px dashed red";
                    document.getElementById("porukaUsername").innerHTML = "<br>Unesite korisničko ime!<br>";
                    document.getElementById("porukaUsername").style.color = "red"; // Promjena boje teksta
                } else {
                    poljeUsername.style.border = "1px solid green";
                    document.getElementById("porukaUsername").innerHTML = "";
                }

                var poljePass = document.getElementById("pass");
                var pass = document.getElementById("pass").value;
                var poljePassRep = document.getElementById("passRep");
                var passRep = document.getElementById("passRep").value;
                if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
                    slanjeForme = false;
                    poljePass.style.border = "1px dashed red";
                    poljePassRep.style.border = "1px dashed red";
                    document.getElementById("porukaPass").innerHTML = "<br>Lozinke nisu iste!<br>";
                    document.getElementById("porukaPass").style.color = "red"; // Promjena boje teksta
                    document.getElementById("porukaPassRep").innerHTML = "<br>Lozinke nisu iste!<br>";
                    document.getElementById("porukaPassRep").style.color = "red"; // Promjena boje teksta
                } else {
                    poljePass.style.border = "1px solid green";
                    poljePassRep.style.border = "1px solid green";
                    document.getElementById("porukaPass").innerHTML = "";
                    document.getElementById("porukaPassRep").innerHTML = "";
                }

                if (slanjeForme != true) {
                    event.preventDefault();
                }
            };
        </script>
    <?php endif; ?>

    <footer>
        <div>
            <h2>Roko Nekić, rnekic@tvz.hr, 2024.</h2>
        </div>
    </footer>
</body>
</html>