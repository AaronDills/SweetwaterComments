<?php include 'db_connection.php';?>
<?php include 'prepared_queries.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
           $mysqli=OpenCon();
           $candy_results=$mysqli->query("SELECT * FROM sweetwater_test WHERE comments like '%candy%'");
           $call_results=$mysqli->query($CALL_QUERY);
           $referred_results=$mysqli->query($REFFERED_QUERY);
           $signature_results=$mysqli->query($SIGNATURE_QUERY);
           $misc_results=$mysqli->query($MISC_QUERY);
        ?>
    </body>
</html>
