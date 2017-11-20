<?php
session_start();
if(!isset($_SESSION['username'])){
 header("Location: index.php");
}
$username = $_SESSION['username'];
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InstaClone</title>
    <link rel="shortcut icon" href="http://www.vektorelcizim.net/uploads/file/images/instagram_yeni_logo_app_2.png" type="image/x-icon">
    <meta name="theme-color" content="#c13584">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://use.fontawesome.com/0eb2251b78.js"></script>
</head>
<body>
  <header>
    <div class="logo"><a href="feed.php"><img src="instaclone.png" /> &nbsp; </a></div>
    <div class="midden">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="searchterm" class="searchbar" placeholder="&#xf002; Typ hier je zoekopdracht..." required/>
        <input type="submit" name="submit_search" style="display: none">
      </form>

      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select name="sorteermenu" onchange="this.form.submit();" id="sorteermenu">
          <option value="">Sorteren</option>
          <option value="date_asc">Datum nieuw - oud</option>
          <option value="date_desc">Datum oud - nieuw</option>
          <option value="descr_desc">Beschrijving aflopend</option>
          <option value="descr_asc">Beschrijving oplopend</option>
          <option value="random">Willekeurige volgorde</option>
        </select>
      </form>
    </div>
    <ul>
      <li><a href="process_uitloggen.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a><span class="inloggen-icon">Uitloggen</span></li>
      <li><a href="account.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a><span class="registreren-icon">Account</span></li>
      <li><a href="uploaden.php"><i class="fa fa-upload" aria-hidden="true"></i></a><span class="uploaden-icon">Uploaden</span></li>
    </ul>
  </header>

<div class="body-wrap">
  <div class="upload-foto">
    <p><a href="uploaden.php"><img src="plus-button.png" /></a>
    <?php echo'<p>Hallo <strong>' . $username . ',</strong> klik hier om een foto te uploaden.'?>
  </div>

  <?php
  include "config.php";

  $column = 'id';
  $sortorder = 'DESC';

  $dbc = mysqli_connect(HOST,USER,PASS,DB) or die('Er is een fout opgetreden tijdens het verbinden met de Database!');

  if(isset($_POST['submit_search'])) {
    $searchterm = mysqli_real_escape_string($dbc, trim($_POST['searchterm']));
    $searchterm = '%' . $searchterm . '%';
  } else {
    $searchterm = '%';
  }

  if(isset($_POST['sorteermenu'])) {
    switch ($_POST['sorteermenu']) {
      case 'date_desc':
        $column = 'datum';
        $sortorder = 'ASC';
      break;

      case 'date_asc':
        $column = 'datum';
        $sortorder = 'DESC';
      break;

      case 'descr_desc':
        $column = 'beschrijving';
        $sortorder = 'DESC';
      break;

      case 'descr_asc':
        $column = 'beschrijving';
        $sortorder = 'ASC';
      break;

      case 'random':
        $column = 'rand()';
        $sortorder = '';
      break;

    }
  }



  $query = "SELECT * FROM feed WHERE beschrijving LIKE '$searchterm' ORDER BY $column $sortorder";
  $result = mysqli_query($dbc, $query);
  while($row = mysqli_fetch_array($result)) {
      $target = $row['img'];
      $date = $row['datum'];
      $username = $row['user'];
      $description = $row['beschrijving'];

      echo '<div class="posts">';
      echo '<div class="account-avatar">';
      echo '<img width="40px" height="40px" src="avatars/avatar.png"></div>';
      echo '<span class="username">' . $username . '</span>';
      echo '<span class="tijd">' . '<i class="fa fa-clock-o" aria-hidden="true"></i> ' . $date . '</span>
            <img src="' . $target . '" />

              <div class="beschrijving">
                <strong>' . $username . '</strong>' . ' | ' . $description . '
              </div>

            </div>';
      }
  ?>


</div>


<div class="page-end">
  EINDE VAN DE PAGINA
  <p><span>JE HEBT ZOJUIST HET EINDE VAN DE PAGINA BEREIKT</span>
</div>
<footer>
  <img src="instaclone.png" />
  <p>2017 © InstaClone | Rowin Schmidt | MediaCollege
</footer>
</body>
</html>
