<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* overriding the original function
* @author budy k <budykusniadi@gmail.com>
*/
/**
 * Element
 *
 * Lets you determine whether an array index is set and whether it has a value.
 * If the element is empty it returns NULL (or whatever you specify as the default value.)
 *
 * @param   string
 * @param   array
 * @param   mixed
 * @return  mixed   depends on what the array contains
 */
function element($item, $array = [], $default = null)
{
    //adding trim - updated by budy
    if (!is_array($array)) {
		return null;
	}

    if (array_key_exists($item, $array)) {
        $return = $array[$item];
        //if not array, trim it
        if (!is_array($return)) {
            $return = trim($return);
        }
        return $return;
    }
    else {
        return (!is_array($default)) ? trim($default) : $default;
    }
}
