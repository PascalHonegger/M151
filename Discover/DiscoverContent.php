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
    <label for="NameFilterString">Suchtext</label>
    <input type="text" id="NameFilterString"
           name="NameFilterString"
           class="RegisterInput"
           onkeyup="loadMoreElements(true)">
    <div id="infiniteScroll"></div>
</div>
