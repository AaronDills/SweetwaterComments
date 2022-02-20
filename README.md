# SweetwaterComments

The src directory contains the files I have written for this project. The resources folder contains files I was provided and the mysql option I needed to set. 

When developing this application I ran mysql server verion 8, php version 7.3, and apache server version 2.4.

The apache server and mysql server were run locally on my computer to test and develop the project.  

In the src directory there is a file, src/private/connection.xml, which can be edited to connect to a given mysql server. The mysql server should contain a database matching what is specified in the connection.xml. This database will need to contain the table from resources/sweetwater_test.sql. On my install of mysql server I was not able to import the sql file until I overwrote an option in the mysql config. The option I overwrote can be found under resources/mysql/disable_strict_mode.cnf

The main page is index.php
