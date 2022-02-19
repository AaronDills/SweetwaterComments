<?php

$CANDY_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%candy%'";
$CALL_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%call%'";
$REFFERED_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%referred%'";
$SIGNATURE_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%signature%'";
$MISC_QUERY="SELECT * FROM sweetwater_test WHERE comments not in (SELECT comments FROM sweetwater_test WHERE comments like '%candy%' OR comments like '%call%' OR comments like '%referred%' OR comments like '%signature%')";
