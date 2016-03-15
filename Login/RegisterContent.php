<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 15.03.2016
 * Time: 15:00
 */

?>

<div id="LoginContent">
    <h1 id="LoginTitle">Login</h1>

    <form action="RegisterController.php" method="post" id="loginform">
        <label for="Username" class="LoginLabel">Benutzername</label> <br />
            <input type="text" id="Username" name="Username" class="LoginInput"> <br />
        <label for="Name" class="LoginLabel">Name</label> <br />
            <input type="text" id="Name" name="Name" class="LoginInput"> <br />
        <label for="Surname" class="LoginLabel">Vorname</label> <br />
            <input type="text" id="Surname" name="Surname" class="LoginInput"> <br />
        <label for="Mail" class="LoginLabel">E-Mail</label> <br />
            <input type="email" id="Mail" name="Mail" class="LoginInput"> <br />
        <label for="Password" class="LoginLabel">Passwort</label> <br />
            <input type="password" id="Password" name="Password" class="LoginInput"> <br />
        <label for="RepPassword" class="LoginLabel">Passwort Wiederholen</label> <br />
            <input type="password" id="RepPassword" name="RepPassword" class="LoginInput"> <br />
        <input type="reset" name="Abbrechen" class="LoginButtom" id="Reset">
        <input type="submit" name="Registrieren" class="LoginButtom" id="Submit">

    </form>
</div>
