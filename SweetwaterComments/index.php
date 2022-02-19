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
           
           if($db->needsToUpdateDates($CANDY_QUERY)){
               $db->updateRecords($CANDY_QUERY);
           }
           $candyTable = new CommentTable("Candy Comments", $db->performQuery($CANDY_QUERY));
           $candyTable->printTable();
 
           if($db->needsToUpdateDates($CALL_QUERY)){
               $db->updateRecords($CALL_QUERY);
           }
           $callTable = new CommentTable("Call Comments", $db->performQuery($CALL_QUERY));
           $callTable->printTable();

           if($db->needsToUpdateDates($REFFERED_QUERY)){
               $db->updateRecords($REFFERED_QUERY);
           }
           $referralTable = new CommentTable("Referral Comments", $db->performQuery($REFFERED_QUERY));
           $referralTable->printTable();

           if($db->needsToUpdateDates($SIGNATURE_QUERY)){
               $db->updateRecords($SIGNATURE_QUERY);
           }
           $signatureTable = new CommentTable("Signature Comments", $db->performQuery($SIGNATURE_QUERY));
           $signatureTable->printTable();
         
           if($db->needsToUpdateDates($MISC_QUERY)){
               $db->updateRecords($MISC_QUERY);
           }
           $miscTable = new CommentTable("Misc Comments", $db->performQuery($MISC_QUERY));
           $miscTable->printTable();
            
        ?>
    </body>
</html>
