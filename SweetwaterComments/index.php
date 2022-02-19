<?php include 'db_connection.php';?>
<?php include 'prepared_queries.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comments From Website Report</title>
    </head>
    <body>
        <?php
           $mysqli=OpenCon();
           $candy_results=$mysqli->query("SELECT * FROM sweetwater_test WHERE comments like '%candy%'");
           $call_results=$mysqli->query($CALL_QUERY);
           $referred_results=$mysqli->query($REFFERED_QUERY);
           $signature_results=$mysqli->query($SIGNATURE_QUERY);
           $misc_results=$mysqli->query($MISC_QUERY);
           
           echo "<table border='1'>";
           echo "<caption>Candy Comments</caption>";
           while ($row = $row = $candy_results->fetch_assoc()) {
                echo "<tr><td>".($row['orderid'])."</td><td>".($row['comments'])."</td><td>".($row['shipdate_expected'])."</td></tr>";
            }
            echo "</table>";
            echo "</br>";

           echo "<table border='1'>";
           echo "<caption>Call Me/Don't Call Me Comments</caption>";
           while ($row = $row = $call_results->fetch_assoc()) {
                echo "<tr><td>".($row['orderid'])."</td><td>".($row['comments'])."</td><td>".($row['shipdate_expected'])."</td></tr>";
            }
            echo "</table>";
            echo "</br>";

           echo "<table border='1'>";
           echo "<caption>Referral Comments</caption>";           
           while ($row = $row = $referred_results->fetch_assoc()) {
                echo "<tr><td>".($row['orderid'])."</td><td>".($row['comments'])."</td><td>".($row['shipdate_expected'])."</td></tr>";
            }
            echo "</table>";
            echo "</br>";

          echo "<table border='1'>";
           echo "<caption>Signature Comments</caption>";
            while ($row = $row = $signature_results->fetch_assoc()) {
                echo "<tr><td>".($row['orderid'])."</td><td>".($row['comments'])."</td><td>".($row['shipdate_expected'])."</td></tr>";
            }
                        echo "</br>";

            echo "</table>";
            
              echo "<table border='1'>";
           echo "<caption>Miscellaneous Comments</caption>";
            while ($row = $row = $misc_results->fetch_assoc()) {
                echo "<tr><td>".($row['orderid'])."</td><td>".($row['comments'])."</td><td>".($row['shipdate_expected'])."</td></tr>";
            }
                        echo "</br>";

            echo "</table>";
            
        ?>
    </body>
</html>
