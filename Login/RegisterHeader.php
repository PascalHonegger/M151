<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 15.03.2016
 * Time: 15:00
 */
?>

<div id="header">
    <div id="login" onclick="dropdown()">

    </div>

    <div id="navigation">
        <ul id="navigationList">
            <li ><a class="navigationButton" id="currentSite" href="#" onclick="dropdown()">Startseite</a></li>
            <li ><a class="navigationButton" href="#">Entdecken</a></li>
            <li ><a class="navigationButton" href="#">Neuer Event</a></li>
        </ul>

        <div id="loginDiv" class="Login-Div">
            <h1 id="LoginTitle">Login</h1>

            <form id="loginform" onsubmit="login(); return false;">

                <label for="Username" class="LoginLabel">Benutzername</label> <br />
                <input type="text" id="Username" name="Username" class="LoginInput" required="required"> <br />

                <label for="Password" class="LoginLabel">Passwort</label> <br />
                <input type="password" id="Password" name="Password" class="LoginInput" required="required"> <br />

                <label for="GoogleAuthenticatorCode" class="LoginLabel">Google Autentifizerungscode (Freiwillig)</label> <br />
                <input type="number" id="GoogleAuthenticatorCode" name="GoogleAuthenticatorCode" class="LoginInput"> <br />

                <input type="reset" onclick="hideLogin()" class="LoginButton" id="ResetLogin" value="Abbrechen">
                <input type="submit" name="Registrieren" class="LoginButton" id="SubmitLogin" value="Einloggen">

            </form>
        </div>
    </div>

    <div id="search">
        <form id="searchForm">
            <input type="text" id="searchbox" name="searchbox" title="Suche">
            <input type="submit" id="searchButton" value="">
        </form>
    </div>


</div>