<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 15.03.2016
 * Time: 15:00
 */

?>

<div id="content">
    <h1 id="RegisterTitle">Entdecken</h1>

    <form onsubmit="return loadMoreElements(true)" id="discoverForm">
        <label for="NameFilterString" class="RegisterLabel">Suchtext</label> <input type="text" id="NameFilterString"
                                                                                    name="NameFilterString"
                                                                                    class="RegisterInput">
        <br/>
        <input type="submit" name="Registrieren" class="RegisterButton" id="Submit" value="Registrieren">

    </form>

    <div id="infiniteScroll"></div>
</div>
