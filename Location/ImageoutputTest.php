
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
    <body>
    <?php
    /**
     * Created by PhpStorm.
     * User: Serafin
     * Date: 29.03.2016
     * Time: 14:17
     */
    require_once "FileManager.php";

    $filemanager = new FileManager();

    $images = $filemanager->getImage(58);

    while($image = sqlsrv_fetch_array($images)['id_image'])
    {
        echo"<img src='../images/$image.jpg' alt=\"Mountain View\" style=\"width:304px;height:228px;\">";
    }

    ?>
    </body>