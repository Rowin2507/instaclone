<?php
session_start();
if(!isset($_SESSION['username'])){
 header("Location: index.php");
}
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account | InstaClone</title>
    <link rel="shortcut icon" href="http://www.vektorelcizim.net/uploads/file/images/instagram_yeni_logo_app_2.png" type="image/x-icon">
    <meta name="theme-color" content="#c13584">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/0eb2251b78.js"></script>
</head>
<body>
  <header>
    <div class="logo"><a href="feed.php"><img src="instaclone.png" /> &nbsp; </a></div>
    <div class="midden"></div>
    <ul>
      <li><a href="process_uitloggen.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a><span class="inloggen-icon">Uitloggen</span></li>
      <li><a href="account.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a><span class="registreren-icon">Account</span></li>
      <li><a href="uploaden.php"><i class="fa fa-upload" aria-hidden="true"></i></a><span class="uploaden-icon">Uploaden</span></li>
    </ul>
  </header>

<div class="body-wrap">
  <div class="uploaden" id="uploaden">
    <h2><span style="letter-spacing: 3px;">UPLOADEN</span></h2>
    <p><img src="account.png" id="preview" alt="PreviewImage" />
      <p><form enctype="multipart/form-data" method="post" action="#" id="upload-form">
          <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
          <label class="upload">
            <input type="file" accept=".png, .jpg, .jpeg" name="image" onchange="readURL(this);" />
          <span class="upload-button"><i class="fa fa-picture-o" aria-hidden="true"></i> Profielfoto wijzigen</span>
          </label><p>
          <hr>
            <p><textarea class="gebruikersnaam" disabled="disabled"><?php $username = $_SESSION['username']; echo $username ?></textarea>
            <input type="submit" name="delete" id="verwijderen" value="&#xf014; Account verwijderen" />
            <input type="submit" name="submit" value="&#xf046; Wijzigingen toepassen" />
      </form>


    <?php
    include "config.php";

    $username = $_SESSION['username'];

    if(isset($_POST['submit'])) {
        $dbc = mysqli_connect(HOST,USER,PASS,DB) or die('Er is een fout opgetreden tijdens het verbinden met de Database!');

        $target = 'Images/' . time() . $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        if (!empty($description)) {
            if (move_uploaded_file($temp,$target)) {
                echo '<div class="goed"><i class="fa fa-check-square-o" aria-hidden="true"></i> Afbeelding geupload!</div>
                      <script>document.getElementById("uploaden").style.border="3px solid #00CC00";</script>';

                $query = "INSERT INTO feed VALUES(0, '$username', '$target', NOW(), '$description')";
                $result = mysqli_query($dbc, $query) or die("Er iets fout gegaan!");
            } else {
              echo '<div class="fout"><i class="fa fa-times" aria-hidden="true"></i> Bestand is te groot!</div>
                    <script>document.getElementById("uploaden").style.border="3px solid #FF0000";</script>';
            }
        }
    }

    if(isset($_POST['delete'])) {
      $dbc = mysqli_connect(HOST,USER,PASS,DB) or die('Er is een fout opgetreden tijdens het verbinden met de Database!');

        $delete = "DELETE FROM users WHERE username='$username'" or die("error");
        if(mysqli_query($dbc, $delete)) {
            echo "Account is succesvol verwijderd.
                  <script>window.open('index.php','_self')</script>";
        } else{
            echo "Er is een fout opgetreden tijdens het verwijderen van je account. $delete.";
        }

        mysqli_close($dbc);
    }

    ?>


  </div>
</div>

<div class="page-end">
  EINDE VAN DE PAGINA
  <p><span>JE HEBT ZOJUIST HET EINDE VAN DE PAGINA BEREIKT</span>
</div>
<footer>
  <img src="instaclone.png" />
  <p>2017 © InstaClone | Rowin Schmidt | MediaCollege
</footer>
<script src="SCRIPT/script.js"></script>
</body>
</html>
