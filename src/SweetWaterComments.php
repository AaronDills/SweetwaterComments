<?php

require_once './CommentTable.php';
require_once './Database.php';
require_once './QueryStatements.php';
/**
 * Main class for the project, contains functions to display the comments stored in the database table
 *
 * @author aaronsdills
 */
class SweetWaterComments {
    private $db;
    
    public function __construct() {
        $this->db = new Database("private/connection.xml"); 
    }
    public function displayComments(){
        $this->displayCase("Candy Comments", QueryStatements::CANDY_QUERY);
        $this->displayCase("Call Comments", QueryStatements::CALL_QUERY);
        $this->displayCase("Referral Comments", QueryStatements::REFFERED_QUERY);
        $this->displayCase("Signature Comments", QueryStatements::SIGNATURE_QUERY);
        $this->displayCase("Misc. Comments", QueryStatements::MISC_QUERY);
    }
    
    private function displayCase(String $tableHeader, String $query){
        if($this->db->needsToUpdateDates($query)){
            $this->db->updateDateInRecords($query);
        }
        $table = new CommentTable($tableHeader, $this->db->performQuery($query));
        $table->printTable();
    }
}
