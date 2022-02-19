<?php

/**
 * This class encapsulates the table name and records. It has one functions to print the table
 *
 * @author aaronsdills
 */
class CommentTable {
    
    private $tableName;
    private $records;
    
    public function __construct(String $tableName, Object $records) {
        $this->tableName = $tableName;
        $this->records = $records;
    }
    
    public function printTable(){
        $this->printHeader();
        $this->printRecords();
        $this->printFooter();
    }
    
    private function printHeader(){
        echo "<table border='1'>";
        echo "<h1>".$this->tableName."</h1>";
        echo "<tr><th>Order ID</th><th>Comments</th><th>Expected Ship Date</th></tr>";

    }
    
    private function printRecords(){
        while ($row = $row = $this->records->fetch_assoc()) {
            echo "<tr><td>".($row['orderid'])."</td><td>".($row['comments'])."</td><td>".($row['shipdate_expected'])."</td></tr>";
        }
    }
    
    private function printFooter(){
        echo "</table>";
        echo "</br>";
    }
}

