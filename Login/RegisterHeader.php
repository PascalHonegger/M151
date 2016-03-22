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
            <li ><a class="navigationButton" id="currentSite" href="#">Startseite</a></li>
            <li ><a class="navigationButton" href="#">Entdecken</a></li>
            <li ><a class="navigationButton" href="#">Neuer Event</a></li>
        </ul>

        <div id="loginDiv" class="Login-Div">
            <h1 id="LoginTitle">Login</h1>

            <form action="LoginController.php" method="post" id="loginform">

                <label for="Username" class="LoginLabel">Benutzername</label> <br />
                <input type="text" id="Username" name="Username" class="LoginInput"> <br />

                <label for="Password" class="LoginLabel">Passwort</label> <br />
                <input type="password" id="Password" name="Password" class="LoginInput"> <br />

                <input type="submit" name="Registrieren" class="LoginButton" id="SubmitLogin" value="Einloggen">
                <input type="reset" onclick="hideLogin()" id="ResetLogin" value="Abbrechen">

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

<script>
    var bla;
    function dropdown() {
     /*   if(document.getElementById("loginDiv").classList.contains('show'))
        {
            document.getElementById("loginDiv").classList.remove("show");
        }
        else
        {
            document.getElementById("loginDiv").classList.add("show");
        }*/
      //  if(bla != 1)
      //  {
            document.getElementById("loginDiv").classList.add("show");
      //  }
     //   alert ("fsfsdf");
    //    bla = 0;
    }
    function hideLogin() {
        document.getElementById("loginDiv").classList.remove("show");
    //    bla = 1;
    }
</script>
