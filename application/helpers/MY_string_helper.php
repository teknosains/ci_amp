<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* overriding the original function
* @author budy k <budykusniadi@gmail.com>
*/

/**
 * Create a Random String
 *
 * Useful for generating passwords or hashes.
 *
 * @param   string  type of random string.  basic, alpha, alnum, numeric, nozero, unique, md5, encrypt and sha1
 * @param   int number of characters
 * @return  string
 */
function random_string($type = 'alnum', $len = 8)
{
    switch ($type)
    {
        case 'basic':
            return mt_rand();
        case 'alnum':
        case 'numeric':
        case 'nozero':
        case 'alpha':
            switch ($type)
            {
                case 'alpha':
                    $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    break;
                case 'alnum':
                    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    break;
                case 'numeric':
                    $pool = '0123456789';
                    break;
                case 'nozero':
                    $custom = (string)uniqid(mt_rand()); //added by budy
                    $custom = ltrim($custom, '0') ; //remove zero at first char
                    $pool = '123456789' . $custom;
                    break;
            }
            return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
        case 'unique': // todo: remove in 3.1+
        case 'md5':
            return md5(uniqid(mt_rand()));
        case 'encrypt': // todo: remove in 3.1+
        case 'sha1':
            return sha1(uniqid(mt_rand(), TRUE));
    }
}
