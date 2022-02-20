<?php

/**
 * Statements used to query the database table
 *
 * @author aaronsdills
 */
class QueryStatements {
    const CANDY_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%candy%' or comments like '%smarties%' or comments like '%taffy%'";
    const CALL_QUERY="SELECT * FROM sweetwater_test WHERE (comments like '% call %' OR comments like '% call.%' OR comments like '% calls%' OR comments like '%comunicarse%' OR comments like '%llámame%') AND comments not like '% call your%'";
    const REFFERED_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%referred%'or comments like '%referral%'";
    const SIGNATURE_QUERY="SELECT * FROM sweetwater_test WHERE comments like '%signature%'";
    const MISC_QUERY="SELECT * FROM sweetwater_test WHERE comments not in (SELECT comments FROM sweetwater_test WHERE comments like '%candy%' OR comments like '% call %' OR comments like '% call.%' OR comments like '% calls%' OR comments like '%comunicarse%' OR comments like '%llámame%' OR comments like '%referred%' or comments like '%referral%' OR comments like '%signature%')";
}
