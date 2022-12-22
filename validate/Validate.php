<?php 
// This class belong to validate. 
namespace validate;

class Validate
{
    function __construct() {
        // empty  constructor for this class.
    }

    # check if it is JSON.
    function isJson($string)
    {
        return ((is_string($string) &&
            (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }

    # Both Are Array variables
    # $a is payload and $b is payload names. 
    function checkAllField($a, $b)
    {
        for ($i = 0; $i < count($b); $i++) {
            if (array_key_exists($b[$i], $a)) {
                // echo $a[$b[$i]];
                if (is_null($a[$b[$i]]) || empty($a[$b[$i]])) {
                    return json_encode(array("error" => $b[$i] . " Not Be NULL"));
                    // return false;
                }
            } else {
                return json_encode(array("error" => $b[$i] . " Is Missing"));
                // return false;
            }
        }
        return true;
    }
}

