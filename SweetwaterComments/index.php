<?php include 'Database.php';?>
<?php include 'CommentTable.php';?>
<?php include 'prepared_queries.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comments From Website Report</title>
    </head>
    <body>
        <?php
           $db = new Database("private/connection.xml");
           
           $candyTable = new CommentTable("Candy Comments", $db->performQuery($CANDY_QUERY));
           $candyTable->printTable();
 
           $callTable = new CommentTable("Call Comments", $db->performQuery($CALL_QUERY));
           $callTable->printTable();

           $referralTable = new CommentTable("Referral Comments", $db->performQuery($REFFERED_QUERY));
           $referralTable->printTable();

           $signatureTable = new CommentTable("Signature Comments", $db->performQuery($SIGNATURE_QUERY));
           $signatureTable->printTable();
         
           $miscTable = new CommentTable("Misc Comments", $db->performQuery($MISC_QUERY));
           $miscTable->printTable();
         
//                           $date = strtotime(explode('Expected Ship Date: ', $row['comments'])[1]); 
//                if(!empty($date) && $row['shipdate_expected'] == '0000-00-00 00:00:00'){
//                } 
            
        ?>
    </body>
</html>
