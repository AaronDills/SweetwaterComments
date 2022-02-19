<?php include 'db_connection.php';?>
<?php include 'CommentTable.php';?>
<?php include 'prepared_queries.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comments From Website Report</title>
    </head>
    <body>
        <?php
           $mysqli=openConn();
           
           $candyResults=$mysqli->query("SELECT * FROM sweetwater_test WHERE comments like '%candy%'");
           $candyTable = new CommentTable("Candy Comments", $candyResults);
           $candyTable->printTable();
 
           $callResults=$mysqli->query($CALL_QUERY);
           $callTable = new CommentTable("Call Comments", $callResults);
           $callTable->printTable();

           $referredResults=$mysqli->query($REFFERED_QUERY);
           $referralTable = new CommentTable("Referral Comments", $referredResults);
           $referralTable->printTable();

           $signatureResults=$mysqli->query($SIGNATURE_QUERY);
           $signatureTable = new CommentTable("Signature Comments", $signatureResults);
           $signatureTable->printTable();
         
           $miscResults=$mysqli->query($MISC_QUERY);
           $miscTable = new CommentTable("Signature Comments", $miscResults);
           $miscTable->printTable();
         
//                           $date = strtotime(explode('Expected Ship Date: ', $row['comments'])[1]); 
//                if(!empty($date) && $row['shipdate_expected'] == '0000-00-00 00:00:00'){
//                } 
            
        ?>
    </body>
</html>
