<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registreren | InstaClone</title>
    <link rel="shortcut icon" href="http://www.vektorelcizim.net/uploads/file/images/instagram_yeni_logo_app_2.png" type="image/x-icon">
    <meta name="theme-color" content="#c13584">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://use.fontawesome.com/0eb2251b78.js"></script>
</head>
<body>
<div class="body-background">
  <div class="registreren">
    <img style="width: 300px; margin-top: 25px;" src="instaclone-mail.png" />
    <form method="post" action="process_registreren.php">
        <input type="text" name="username" placeholder="Gebruikersnaam" required/>
        <p><input style="margin-top: -10px;" type="email" name="mailadres" placeholder="E-mailadres" required/>
        <p><input style="margin-top: -10px;" type="password" name="password" id="password" placeholder="Wachtwoord" minlength=5 required/>
        <p><input style="margin-top: -10px;" type="password" name="password_repeat" id="password_repeat" placeholder="Wachtwoord herhalen" minlength=5 required/>
        <p><label><span style="font-size: 15px; margin-bottom: 12px;"><input type="checkbox" required>Ik ga akkoord met de voorwaarden</span></label>
        <p><input type="submit" name="submit" value="Registreren"/>
        <p><span style="line-height: 35px;">Heb je al een account? <a href="index.php">Log hier in.</a></span>
    </form>
  </div>
</div>

<script src="SCRIPT/script.js"></script>
</body>
</html>
