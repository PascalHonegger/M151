<?php
/**
 * Created by PhpStorm.
 * User: Alain
 * Date: 22.03.2016
 * Time: 13:31
 */

require_once "../model/LocationModel.php";
?>

<div id="content">
        <?php
            $session = CustomSession::getInstance();

            echo "Hallo ".$session->getCurrentUser()['username'];
        ?>

    <select name="cars" style="height: 200px; width: 200px;">
        <?php
        $model = new LocationModel();
        $temp = $model->getLocations();
        while($locations = sqlsrv_fetch_array($temp))
        {
                $loc = $locations['name'];
                $locID = $locations['id'];
                echo "<option value='$locID'>$loc</option>";
        }
        ?>
    </select>
</div>