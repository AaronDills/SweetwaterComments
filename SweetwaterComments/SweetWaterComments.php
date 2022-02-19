<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once './CommentTable.php';
require_once './Database.php';
require_once './PreparedStatements.php';
/**
 * Description of SweetWaterComments
 *
 * @author aaronsdills
 */
class SweetWaterComments {
    private $db;
    
    public function __construct() {
        $this->db = new Database("private/connection.xml"); 
    }
    public function displayComments(){
        $this->displayCase("Candy Comments", PreparedStatements::CANDY_QUERY);
        $this->displayCase("Call Comments", PreparedStatements::CALL_QUERY);
        $this->displayCase("Referral Comments", PreparedStatements::REFFERED_QUERY);
        $this->displayCase("Signature Comments", PreparedStatements::SIGNATURE_QUERY);
        $this->displayCase("Misc. Comments", PreparedStatements::MISC_QUERY);
    }
    
    private function displayCase(String $tableHeader, String $query){
        if($this->db->needsToUpdateDates($query)){
            $this->db->updateDateInRecords($query);
        }
        $table = new CommentTable($tableHeader, $this->db->performQuery($query));
        $table->printTable();
    }
}
