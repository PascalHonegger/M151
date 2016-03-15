<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 15.03.2016
 * Time: 15:00
 */

?>

<div id="logincontent">
    <h1 id="LoginTitle">Login</h1>

    <form action="../controller/Login.php" method="post" id="loginform">
        <label for="Username" class="LoginLabel">Benutzername</label> <br />
            <input type="text" id="Username" name="Username" class="LoginInput"> <br />
        <label for="Name" class="LoginLabel">Name</label> <br />
            <input type="text" id="Name" name="Name" class="LoginInput"> <br />
        <label for="Vorname" class="LoginLabel">Vorname</label> <br />
            <input type="text" id="Vorname" name="Surname" class="LoginInput"> <br />
        <label for="Mail" class="LoginLabel">E-Mail</label> <br />
            <input type="text" id="Mail" name="Mail" class="LoginInput"> <br />
        <label for="Passwort" class="LoginLabel">Passwort</label> <br />
            <input type="password" id="Passwort" name="Password" class="LoginInput"> <br />
        <label for="WPasswort" class="LoginLabel">Passwort Wiederholen</label> <br />
            <input type="password" id="WPasswort" name="RepPassword" class="LoginInput"> <br />
        <input type="reset" name="Abbrechen" class="LoginButtom" id="reset">
        <input type="submit" name="Registrieren" class="LoginButtom" id="submit">

    </form>
</div>
