<?php

/**
 * Contains a Database connection and operartions related to it
 *
 * @author aaronsdills
 */
class Database {
    private $connection;
    
    /**
     * Constructor which reads from an XML to create a db connection
     * @param String $connectionInfoPath a path to an xml contatining connection information.
     */
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
    
    /**
     *  Checks if the results from a given query have dates in their comments
     * @param String $query
     * @return whether a record has a date that can be updated
     */
    public function needsToUpdateDates(String $query){
        $needsUpdateQuery = $query." AND comments like '%Expected Ship Date:%'";
        $results = $this->connection->query($needsUpdateQuery);
        return mysqli_num_rows($results) > 0;
    }
    
    /**
     * Updates the dates in all records from a supplied query that have a date available in their comments column. 
     * @param String $query
     */
    public function updateDateInRecords(String $query){
        $records = $this->performQuery($query);
        while ($row = $records->fetch_assoc()) {
            $date = strtotime(explode('Expected Ship Date: ', $row['comments'])[1]); 
            if(!empty($date) && $row['shipdate_expected'] == '0000-00-00 00:00:00'){
                $this->updateRecord(date('Y-m-d H:i:s', $date), $row['orderid']);
            } 
        }
        
    }
    
    /**
     * Update a single record by orderId with a new date
     * @param String $shipdate
     * @param int $orderid
     */
    private function updateRecord(String $shipdate, int $orderid){
        $sql = "UPDATE sweetwater_test SET shipdate_expected='".$shipdate."' WHERE orderid=".$orderid.";";
        $this->connection->query($sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($this->connection), E_USER_ERROR);
    }
    
    /**
     * Queries table from connection objects
     * @param String $queryStr
     * @return the results from the query
     */
    public function performQuery(String $queryStr){
        return $this->connection->query($queryStr);
    }
}
