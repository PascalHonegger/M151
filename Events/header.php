<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 15.03.2016
 * Time: 15:00
 */
?>

<div id="header">
    <div id="accountNavigation">
        <div class="dropdown-content">
            <a href="">Mein Account</a>
            <a href="../EditSettings/EditSettingsView.php">Einstellungen</a>
            <a href="../Login/Logout.php">Logout</a>
        </div>
    </div>

    <div id="navigation">
        <ul id="navigationList">
            <li><a class="navigationButton" href="../Home/Home.php">Startseite</a></li>
            <li><a class="navigationButton" id="currentSite" href="../Discover/Discover.php">Entdecken</a></li>
            <li><a class="navigationButton" href="../Event/Event.php">Neuer Event</a></li>
        </ul>
    </div>

    <div id="search">
        <form id="searchForm">
            <input type="text" id="searchbox" name="searchbox" title="Suche">
            <input type="submit" id="searchButton" value="">
        </form>
    </div>


</div>
