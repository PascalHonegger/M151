<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 15.03.2016
 * Time: 15:00
 */

?>

<div id="LoginContent">
    <h1 id="RegisterTitle">Registrieren</h1>

    <form onsubmit="register(); return false;" id="registerform">
        <label for="RegisterUsername" class="RegisterLabel">Benutzername</label> <br />
        <input type="text" id="RegisterUsername" name="RegisterUsername" class="RegisterInput" required="required"> <br />

        <label for="Name" class="RegisterLabel">Name</label> <br />
        <input type="text" id="Name" name="Name" class="RegisterInput" required="required"> <br />

        <label for="Surname" class="RegisterLabel">Vorname</label> <br />
        <input type="text" id="Surname" name="Surname" class="RegisterInput" required="required"> <br />

        <label for="Mail" class="RegisterLabel">E-Mail</label> <br />
        <input type="email" id="Mail" name="Mail" class="RegisterInput" required="required"> <br />

        <label for="RegisterPassword" class="RegisterLabel">Passwort</label> <br />
        <input type="password" id="RegisterPassword" name="RegisterPassword" class="RegisterInput" required="required"> <br />

        <label for="RepPassword" class="RegisterLabel">Passwort Wiederholen</label> <br />
        <input type="password" id="RepPassword" name="RepPassword" class="RegisterInput" required="required"> <br />

        <input type="reset" name="Abbrechen" class="RegisterButton" id="Reset" value="Abbrechen">
        <input type="submit" name="Registrieren" class="RegisterButton" id="Submit" value="Registrieren">

    </form>
</div>
