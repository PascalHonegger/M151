<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 22.03.2016
 * Time: 13:31
 */

require_once "../controller/CustomSession.php";
require_once "../external/GoogleAuthenticator.php";

$user = CustomSession::getInstance()->getCurrentUser();

$ga = new PHPGangsta_GoogleAuthenticator();


//Secret already exists => Use it. Else => Create one
$secret = $user['secret'] ? $user['secret'] : $ga->createSecret();

?>

<div id="content">

    <h1>Einstellungen</h1>

    <form action="EditSettingsController.php" method="post" >
        <label for="Username" class="SettingsLabel">Benutzername</label> <br />
        <input type="text" id="Username" name="Username" class="SettingsInput" required="required" value="<?=$user['username']?>"> <br />

        <label for="Name" class="SettingsLabel">Name</label> <br />
        <input type="text" id="Name" name="Name" class="SettingsInput" required="required" value="<?=$user['name']?>"> <br />

        <label for="Surname" class="SettingsLabel">Vorname</label> <br />
        <input type="text" id="Surname" name="Surname" class="SettingsInput" required="required" value="<?=$user['surname']?>"> <br />

        <label for="Mail" class="SettingsLabel">E-Mail</label> <br />
        <input type="email" id="Mail" name="Mail" class="SettingsInput" required="required" value="<?=$user['mail']?>"> <br />

        <label for="Password" class="SettingsLabel">Passwort</label> <br />
        <input type="password" id="Password" name="Password" class="SettingsInput" required="required" > <br />

        <label for="RepPassword" class="SettingsLabel">Passwort Wiederholen</label> <br />
        <input type="password" id="RepPassword" name="RepPassword" class="SettingsInput" required="required"> <br />

        <label for="GoogleAuthenticatorCode" class="SettingsLabel">Validierungscode (Leer => 2-Way-Authentication entfernen)</label> <br />
        <input type="number" id="GoogleAuthenticatorCode" name="GoogleAuthenticatorCode" class="SettingsInput"> <br />

        <label for="GoogleAuthenticatorSecret" class="SettingsLabel">Secret</label> <br />
        <input id="GoogleAuthenticatorSecret" name="GoogleAuthenticatorSecret" value="<?=$secret?>" readonly>

        <img alt="QR-Code" height="100" width="100" src="<?=$ga->getQRCodeGoogleUrl('Shareloc', $secret)?>" />

        <input type="submit" value="Änderungen übernehmen">
    </form>
</div>