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

    <form onsubmit="applySettings(); return false;" id="settingsForm">
        <div id="settingsLeft">
            <label for="Username" class="SettingsLabel">Benutzername</label> <br/>
            <input type="text" id="Username" name="Username" class="RegisterInput" required="required"
                   value="<?= $user['username'] ?>"> <br/>

            <label for="Name" class="SettingsLabel">Name</label> <br/>
            <input type="text" id="Name" name="Name" class="RegisterInput" required="required"
                   value="<?= $user['name'] ?>"> <br/>

            <label for="Surname" class="SettingsLabel">Vorname</label> <br/>
            <input type="text" id="Surname" name="Surname" class="RegisterInput" required="required"
                   value="<?= $user['surname'] ?>"> <br/>

            <label for="Mail" class="SettingsLabel">E-Mail</label> <br/>
            <input type="email" id="Mail" name="Mail" class="RegisterInput" required="required"
                   value="<?= $user['mail'] ?>"> <br/>
        </div>

        <div id="settingsRight">
            <label for="Password" class="SettingsLabel">Passwort (Leer => Passwort behalten)</label> <br/>
            <input type="password" id="Password" name="Password" class="RegisterInput"><br/>

            <label for="RepPassword" class="SettingsLabel">Passwort Wiederholen</label> <br/>
            <input type="password" id="RepPassword" name="RepPassword" class="RegisterInput"> <br/>

            <label for="GoogleAuthenticatorCode" class="SettingsLabel">Validierungscode (Leer => 2-Way-Authentication
                entfernen)</label> <br/>
            <input type="number" id="GoogleAuthenticatorCode" name="GoogleAuthenticatorCode" class="RegisterInput">
            <br/>

            <input id="GoogleAuthenticatorSecret" name="GoogleAuthenticatorSecret" value="<?= $secret ?>" type="hidden">

            <label for="GoogleAuthenticatorSecretDisplay" class="SettingsLabel">Secret</label> <a
                id="GoogleAuthenticatorHelp" href="https://www.google.com/landing/2step"
                title="Google 2 Step Verification">Hilfe</a> <br/>
            <figure>
                <figcaption id="GoogleAuthenticatorSecretDisplay"><?= $secret ?></figcaption>
                <img alt="QR-Code für <?= $secret ?>"
                     src="<?= $ga->getQRCodeGoogleUrl(trim($user['mail']), $secret) ?>"/>
            </figure>
        </div>
        <input type="submit" value="Übernehmen" id="Submit" class="RegisterButton">
    </form>
</div>