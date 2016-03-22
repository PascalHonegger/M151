<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 22.03.2016
 * Time: 13:31
 */
?>

<div id="content">
        <?php
            $session = CustomSession::getInstance();

            echo "Hallo ".$session->getCurrentUser()['username'];
        ?>
</div>