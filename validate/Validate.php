<?php 
// This class belong to validate namespace. 
namespace validate;

class Validate
{
    function __construct() {
        // empty  constructor for this class.
    }

    # IP whitelist check.
    # Ex:- $ip = '127.0.0.1' and $allow_ip_array = array("192.168.0.1","127.0.0.1")
    function isWhitelist($ip, $allow_ip_array) {
        return in_array($ip, $allow_ip_array);
    }

    # check if it is JSON.
    # Ex:- {"testing":"sample"} 
    function isJson($string)
    {
        return ((is_string($string) &&
            (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }

    # Both Are Array variables
    # $a is payload and $b is payload names. 
    # Ex:- $a = array('status'=> 1, 'name' => 'Naveenkumar') , $b = ['status', 'name'];
    function checkAllField($a, $b)
    {
        for ($i = 0; $i < count($b); $i++) {
            if (array_key_exists($b[$i], $a)) {
                // echo $a[$b[$i]];
                if (is_null($a[$b[$i]]) || empty($a[$b[$i]])) {
                    echo json_encode(array("error" => $b[$i] . " Not Be NULL"));
                    return false;
                }
            } else {
                echo json_encode(array("error" => $b[$i] . " Is Missing"));
                return false;
            }
        }
        return true;
    }

    function Stash() {
        echo "statsh";
    }
}

