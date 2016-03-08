
<!DOCTYPE html>

<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 01.03.2016
 * Time: 16:08
 */
?>

<html>
    <head>
        <title>Blablubla</title>
        <link rel="stylesheet" href="../css/Style.css">
    </head>
    <body>
    <div id="mainDiv">
        <div id="header">
            <div id="accountNavigation">
                <div class="dropdown-content">
                    <a href="#">Mein Account</a>
                    <a href="#">Einstellungen</a>
                    <a href="#">Logout</a>
                </div>
            </div>

            <div id="navigation">
                <ul id="navigationList">
                    <li ><a class="navigationButton" id="currentSite" href="#">Startseite</a></li>
                    <li ><a class="navigationButton" href="#">Entdecken</a></li>
                    <li ><a class="navigationButton" href="#">Neuer Event</a></li>
                </ul>
            </div>

            <div id="search">
                <form type="submit" id="searchForm">
                    <input type="text" id="searchbox" name="searchbox">
                    <input type="submit" id="searchButton" value="">
                </form>
            </div>


        </div>

        <div id="content">

        </div>

        <div id="contentNavigation">

        </div>

        <div id="footer">

        </div>
    </div>
    </body>
</html>
