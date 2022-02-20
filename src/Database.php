<?php

/**
 * Contains a database connection and operations related to it
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
            $this->connection=mysqli_connect($xmldata->servername, $xmldata->username,$xmldata->password,$xmldata->database);
            $this->connection->set_charset("utf8mb4");
        } else {
            exit('Failed to open xml file');
        }
    }
    
    /**
     *  Checks if the results from a given query have dates in their comments
     * @param String $query
     * @return whether a record has a date that can be updated
     */
    public function needsToUpdateDates(String $query){
        $needsUpdateQuery = $query." AND comments like '%Expected Ship Date:%'";
        $results = $this->connection->query($query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($this->connection), E_USER_ERROR);
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
     * Updates a single record identified by an orderId with a new date
     * @param String $shipdate
     * @param int $orderid
     */
    private function updateRecord(String $shipdate, int $orderid){
        $query = "UPDATE sweetwater_test SET shipdate_expected='".$shipdate."' WHERE orderid=".$orderid.";";
        $this->connection->query($query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($this->connection), E_USER_ERROR);
    }
    
    /**
     * Queries table using the connection object
     * @param String $query
     * @return the results from the query
     */
    public function performQuery(String $query){
        $results = $this->connection->query($query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($this->connection), E_USER_ERROR);
        return $results;
    }
}
