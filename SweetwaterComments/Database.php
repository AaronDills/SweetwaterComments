<?php

/**
 * Description of DatabaseConnection
 *
 * @author aaronsdills
 */
class Database {
    private $connection;
    
    public function __construct(String $connectionInfoPath) {
        if (file_exists($connectionInfoPath)) {
            $xmldata = simplexml_load_file($connectionInfoPath) or die("failed to read connection xml");
            $this->connection=$this->openConnection($xmldata->servername, $xmldata->username,$xmldata->password,$xmldata->database);
        } else {
            exit('Failed to open test.xml.');
        }
    }
    
    private function openConnection(String $servername, String $username, String $password, String $database){
        return mysqli_connect($servername, $username, $password, $database);
    }
    
    public function updateRecords(){
        
    }
    
    public function performQuery(String $queryStr){
        return $this->connection->query($queryStr);
    }
}