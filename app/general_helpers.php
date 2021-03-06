<?php
use App\Models\User;
use App\Models\Option;

/*
| AHLOO Helpers.
|
| @author Roni Yusuf <roni.y@smooets.com>
*/

if (! function_exists('user_info')) {
    /**
     * Get logged user info.
     *
     * @param  string $column
     * @return mixed
     */
    function user_info($column = null)
    {
        if ($user = Sentinel::check()) {
            if (is_null($column)) {
                return $user;
            }

            if ('full_name' == $column) {
                return user_info('first_name').' '.user_info('last_name');
            }

            if ('role' == $column) {
                return user_info()->roles[0];
            }

            if ('avatar_path' == $column) {
                if(user_info('avatar') == null){
                    return asset('assets/general/images/default/avatar.png');
                }else{
                    return asset('storage/avatars').'/'.user_info('avatar');
                }
            }

            //images/!logged-user.jpg
            return $user->{$column};
        }

        return null;
    }
}

if (! function_exists('avatar_path')) {
    /**
     * Generates avatars path.
     *
     * @param  null|string $path
     * @return string
     */
    function avatar_path($path = null)
    {
        $link = public_path('storage/avatars');

        if (is_null($path)) {
            return $link;
        }

        return $link.'/'.trim($path, '/');
    }
}

if (! function_exists('datatables')) {
    /**
     * Shortcut for Datatables::of().
     *
     * @param  mixed $builder
     * @return mixed
     */
    function datatables($builder)
    {
        return Datatables::of($builder);
    }
}

if (! function_exists('eform_datetime')) {
    /**
     * Generate new datetime from configured format datetime.
     *
     * @param  string $datetime
     * @return string
     */
    function eform_datetime($datetime)
    {
        return date(env('APP_DATE_FORMAT', 'd M Y H:i:s'), strtotime($datetime));
    }
}

if (! function_exists('ahloo_form_title')) {
    /**
     * Generate title for form.
     *
     * @param  int    $id
     * @return string
     */
    function ahloo_form_title($id = 0)
    {
        return $id > 0 ? 'edit' : 'add';
    }
}

if (! function_exists('has_access')) {
    /**
     * Check if user has access.
     *
     * @param  array|string  $permissions
     * @param  bool          $any
     * @return bool
     */
    function has_access($permissions, $any = false)
    {
        $method = 'hasAccess';
        if ($any) {
            $method = 'hasAnyAccess';
        }

        if ((bool) user_info('role')->is_super_admin) {
            return true;
        }

        return Sentinel::check()->{$method}($permissions);
    }
}

if (! function_exists('sentinel_check_role_admin')) {

    function sentinel_check_role_admin()
    {
        if(strtolower(Sentinel::check()->roles[0]->slug) != 'member')
        {
            return true;
        }else{
            return false;
        }

    }
}

if (! function_exists('getClientIps')) {
    function getClientIps()
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }
        return $ipAddress;
    }
}

if (! function_exists('getFullUrl')) {
    function getFullUrl()
    {
        $getFullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $getFullUrl;
    }
}

if (! function_exists('getUser')) {
    function getUser($id="",$field="")
    {
        return User::getUser($id,$field);
    }
}

if (! function_exists('createdirYmd')) {
    function createdirYmd($path="")
    {
            if(!file_exists($path."/".date("Y"))) {
                mkdir($path."/".date("Y"), 0777,true);
                chmod($path."/".date("Y"), 0777);
            }
            if(!file_exists($path."/".date("Y")."/".date("m"))) {
                mkdir($path."/".date("Y")."/".date("m"), 0777,true);
                chmod($path."/".date("Y")."/".date("m"), 0777);
            }
            if(!file_exists($path."/".date("Y")."/".date("m")."/".date("d"))) {
                mkdir($path."/".date("Y")."/".date("m")."/".date("d"), 0777,TRUE);
                chmod($path."/".date("Y")."/".date("m")."/".date("d"), 0777);
            }
    }
}

if (! function_exists('slug')) {
    function slug($title,$to="")
    {
        $symbol_space = array(" ");
        $symbols = array(";","-",",","*","@","!","(",")",".","#","/","|","[","]",'"',"'","&","?","$","%","^","&","+","=","{","}",":",">","<",'\\');
        $output = str_replace($symbols, '', $title);
        $output = str_replace($symbol_space, '-', $output);
        return strtolower($output);
    }
}

if (! function_exists('getOptionValue')) {
    function getOptionValue($name="")
    {
        return Option::getValue($name);
    }
}

function idr_format($value=0,$type="rp"){
    $decimals ="2";
    $decimal_point =",";
    $thousand_seperator =".";
    if($type == "rp"){
        $first_string = 'Rp ';
    }else if($type == "null"){
        $first_string = '';
        $decimals ="0";
    }
    return $first_string.number_format($value, $decimals, $decimal_point, $thousand_seperator);
}

function form_input_file_img($type = "", $name = "" , $url = "", $width = "", $height = "", $class = "", $id = "", $style = "", $alt = "", $title = "", $other = "")
    {
        if($url == ""){
            $url = asset('assets/backend/porto-admin/images/!logged-user.jpg');
        }
                    if ($width != "") {
                        $width_img = "width: $width;";
                        $max_width_img = "max-width: $width;";
                    } else {
                        $width_img = "";
                        $max_width_img = "";
                    }
                    if ($height != "") {
                        $height_img = "height: $height;";
                        $max_height_img = "max-height: $height;";
                    } else {
                        $height_img = "";
                        $max_height_img = "";
                    }
        $var_css_1 = $width_img.$height_img;
        $var_css_2 = $max_width_img.$height_img;
        // $type file , image , video
        $output = '';
        $output .= '
        <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-right:10px">
          <div class="fileinput-new thumbnail '.$name.'" style="'.$var_css_1.'">';
        $output .= '<img src="'.$url.'" class="img-responsive">';
        $output .= '</div>
          <div class="fileinput-preview fileinput-exists thumbnail" style="'.$var_css_2.'"></div>
          <div>
            <span class="btn btn-primary btn-file"><span class="fileinput-new"><i class="fa fa-camera"></i> Select Image</span><span class="fileinput-exists"><i class="fa fa-refresh"></i> Change</span><input type="file" name="'.$name.'" class="'.$class.'" accept="image/*"></span>
            <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash-o"></i> Remove</a>
          </div>
        </div>
        ';
        return $output;
    }
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return "#".random_color_part() . random_color_part() . random_color_part();
}
function rmdirr($dirname)
{
    // Sanity check
    if (!file_exists($dirname)) {
        return false;
    }

    // Simple delete for a file
    if (is_file($dirname) || is_link($dirname)) {
        return unlink($dirname);
    }

    // Create and iterate stack
    $stack = array($dirname);
    while ($entry = array_pop($stack)) {
        // Watch for symlinks
        if (is_link($entry)) {
            unlink($entry);
            continue;
        }

        // Attempt to remove the directory
        if (@rmdir($entry)) {
            continue;
        }

        // Otherwise add it to the stack
        $stack[] = $entry;
        $dh = opendir($entry);
        while (false !== $child = readdir($dh)) {
            // Ignore pointers
            if ($child === '.' || $child === '..') {
                continue;
            }

            // Unlink files and add directories to stack
            $child = $entry . DIRECTORY_SEPARATOR . $child;
            if (is_dir($child) && !is_link($child)) {
                $stack[] = $child;
            } else {
                unlink($child);
            }
        }
        closedir($dh);
        print_r($stack);
    }

    return true;
}

define('folder_builder','scoido-builder');
define('quotes',"'");
