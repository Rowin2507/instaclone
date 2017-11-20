<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inloggen | InstaClone</title>
    <link rel="shortcut icon" href="http://www.vektorelcizim.net/uploads/file/images/instagram_yeni_logo_app_2.png" type="image/x-icon">
    <meta name="theme-color" content="#c13584">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://use.fontawesome.com/0eb2251b78.js"></script>
</head>
<body>

<div class="body-background">
  <div class="login">
    <img style="width: 300px; margin-top: 25px;" src="instaclone-mail.png" />
    <form method="post" action="process_inloggen.php">
        <input type="text" name="username" placeholder="Gebruikersnaam" required/>
        <p><input style="margin-top: -10px;" type="password" name="password" placeholder="Wachtwoord" minlength=5 required/>
        <p><input type="submit" name="submit" value="Inloggen"/>
        <p><span style="line-height: 60px;">Nog geen account? <a href="registreren.php">Registreer je dan.</a></span>
    </form>
  </div>
</div>
</body>
</html>
