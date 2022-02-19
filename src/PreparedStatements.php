<?php

/**
 * Description of PreparedStatements
 *
 * @author aaronsdills
 */
class PreparedStatements {
    const CANDY_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%candy%'";
    const CALL_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%call%'";
    const REFFERED_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%referred%'";
    const SIGNATURE_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%signature%'";
    const MISC_QUERY="SELECT * FROM sweetwater_test WHERE comments not in (SELECT comments FROM sweetwater_test WHERE comments like '%candy%' OR comments like '%call%' OR comments like '%referred%' OR comments like '%signature%')";
}