<?php defined('BASEPATH') OR exit('No direct script access allowed');


/**
* Adding helper function for Resource/static files
* @author budy k <budykusniadi@gmail.com>
*/



if ( ! function_exists('resource_url'))
{
    /**
     * Resource Url
     * @author budy k
     * remove http or https from the resouce url
     * example : http://domain.com/assets/lib.js
     * will become : //domain.com/assets/lib.js
     * its based on Google recommendation for Embedding resources
     * https://google.github.io/styleguide/htmlcssguide.xml
     * @param   string
     * @param   array
     * @param   mixed
     * @return  mixed   depends on what the array contains
     */
    function resource_url($file = '')
    {
        if (!$file) {
            return '';
        }

        $file = str_replace($_SERVER['SERVER_NAME'], '', $file);
        $full_file = $_SERVER['DOCUMENT_ROOT'] . $file;
        if (strpos($file, '/') !== 0 || !file_exists($full_file)) {
            $full_file = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
            $full_file .= $file;
            if (!file_exists($full_file)) {
                return str_replace(
                    array('http:', 'https:'),
                    array('', ''),
                    base_url($file)
                );
            }
        }
        $mtime = filemtime($full_file);

        //will produce like : my_file.js?122345465
        $new_file = preg_replace('{\\.([^./]+)$}', ".\$1?$mtime", $file);

        //will produce like : my_file.122345465.js
        //but with this one, you should configure your Web server correctly
        //$new_file = preg_replace('{\\.([^./]+)$}', "_$mtime.\$1", $file);

        return str_replace(
            array('http:', 'https:'),
            array('', ''),
            base_url($new_file)
        );
    }
}
