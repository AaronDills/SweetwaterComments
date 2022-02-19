<?php include 'SweetWaterComments.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comments From Website Report</title>
    </head>
    <body>
        <?php
           $app = new SweetWaterComments();
           $app->displayComments();
        ?>
    </body>
</html>