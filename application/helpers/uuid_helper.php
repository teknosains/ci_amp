<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* adding function for uuid
* @author budy k <budykusniadi@gmail.com>
*/
if ( ! function_exists('get_uuid'))
{

    /**
    * generate uuid
    */
    function get_uuid() {

       return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
}
