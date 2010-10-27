<?php
/*
Plugin Name: Silverlight for WordPress
Plugin URI: http://timheuer.com/silverlight-for-wordpress
Description: A plugin for WordPress to host a Silverlight application
Version: 1.0.9
Author: Tim Heuer
Author URI: http://timheuer.com/blog/
*/

//[silverlight: url.xap, width, height, initparams, minver]

define("SILVERLIGHT_META_START", "[silverlight:");
define("SILVERLIGHT_META_END", "]");
define("SILVERLIGHT_TARGET", "<div id=\"silverlightControlHost\"><object data=\"data:application/x-silverlight-2,\" type=\"application/x-silverlight-2\" width=\"###WIDTH###\" height=\"###HEIGHT###\"><param name=\"source\" value=\"###URL###\"/><param name=\"background\" value=\"white\" /><param name=\"minRuntimeVersion\" value=\"###MINVER###\" /><param name=\"autoupgrade\" value=\"true\" /><param name=\"enableHtmlAccess\" value=\"true\" />###PARAMHOLDER###<a href=\"http://go.microsoft.com/fwlink/?LinkID=149156\" style=\"text-decoration: none;\"><img src=\"http://storage.timheuer.com/sl4wp-ph.png\" alt=\"Install Microsoft Silverlight\" style=\"border-style: none; width:400px; height:200px\"/></a></object><iframe style=\"visibility:hidden;height:0;width:0;border:0px\" id=\"_sl_historyFrame\"></iframe></div>");
define("SILVERLIGHT_INITPARAMS", "<param name=\"initParams\" value=\"###INITPARAMS###\" />");

function silverlight_the_content($content)
{
	$found_pos = strpos($content, SILVERLIGHT_META_START);
	if(!$found_pos) return ($content);
	
	$embedded = substr($content, 0, $found_pos);
	$meta = explode(",", trim(substr($content, $found_pos+strlen(SILVERLIGHT_META_START), (strpos($content, SILVERLIGHT_META_END, $found_pos) - ($found_pos+strlen(SILVERLIGHT_META_START))))));

	$output = $embedded . SILVERLIGHT_TARGET;
	$paramHolder = SILVERLIGHT_INITPARAMS;
	$url = trim($meta[0]);
	$width = trim($meta[1]);
	$height = trim($meta[2]);
	$initparams = trim($meta[3]);
  $minver = trim($meta[4]);
	if(strpos($url, "http://") === false) $url = get_option('silverlight_standard_location') . $url;
	if(strlen($width) <= 0) $width = get_option('silverlight_standard_width');
	if(strlen($height) <= 0) $height = get_option('silverlight_standard_height');
  if(strlen($minver) <= 0) $minver = get_option('silverlight_standard_version');
	$output = str_replace("###URL###",  $url, $output);
	$output = str_replace("###WIDTH###", $width, $output);
	$output = str_replace("###HEIGHT###", $height, $output);
  $output = str_replace("###MINVER###", $minver, $output);
	if(strlen($initparams) > 0) {
    $initparams_parsed = str_replace("#", ",", $initparams);
    $paramHolder = str_replace("###INITPARAMS###", $initparams_parsed, $paramHolder);
    $output = str_replace("###PARAMHOLDER###", $paramHolder, $output);
  }
  else {
    $output = str_replace("###PARAMHOLDER###", "", $output);
  }
	$output .= "<br />" . substr($content, strpos($content, SILVERLIGHT_META_END, $found_pos)+1);
    return ($output);
}

function silverlight_wp_head()
{
	echo "<style type=\"text/css\">\n<!-- Silverlight WordPress Plugin -->\n#silverlightControlHost{height:100%;}\n</style>";
}

add_action('wp_head', 'silverlight_wp_head');
add_filter('the_content', 'silverlight_the_content');

/* ADMIN */



function silverlight_option_page()
{
	$standard_loc = 'silverlight_standard_location';
	$standard_width = 'silverlight_standard_width';
	$standard_height = 'silverlight_standard_height';
	$minver = 'silverlight_standard_version';

	$loc_val = get_option($standard_loc);
	$width_val = get_option($standard_width);
	$height_val = get_option($standard_height);
	$minver_val = get_option($minver);


  if ('insert' == $_POST['action'])
  {
          update_option($standard_loc, $_POST[$standard_loc]);
          update_option($standard_width, $_POST[$standard_width]);
          update_option($standard_height, $_POST[$standard_height]);
          update_option($minver, $_POST[$minver]);

	$loc_val = get_option($standard_loc);
	$width_val = get_option($standard_width);
	$height_val = get_option($standard_height);
	$minver_val = get_option($minver);
?>
<div class="updated"><p><strong><?php _e('Silverlight for WordPress default settings updated.', 'mt_trans_domain' ); ?></strong></p></div>
<?php
}
?>
<!-- Start Options -->
        <div class="wrap">
          <h2>Silverlight for WordPress Options</h2>
          <form name="form1" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
          		<table border="0" cellpadding="0" cellspacing="15"">
                	<tr>
                    	<td width="230px"><strong><label>Standard Root Location</label>: </strong></p></td>
                        <td><input name="<?php echo $standard_loc; ?>" value="<?php echo $loc_val; ?>" type="text" /></td>
                    </tr>
                    
                    <tr>
                    	<td width="200px"><strong><label>Standard Width</label>: </strong></p></td>
                        <td><input name="<?php echo $standard_width; ?>" value="<?php echo $width_val; ?>" type="text" /></td>
                    </tr>
                    
                    <tr>
                    	<td width="200px"><strong><label>Standard Height</label>: </strong></p></td>
                        <td><input name="<?php echo $standard_height; ?>" value="<?php echo $height_val; ?>" type="text" /></td>
                    </tr>

			<tr>
                    	<td width="200px"><strong><label>Minimum Version</label>: </strong></p></td>
                        <td><input name="<?php echo $minver; ?>" value="<?php echo $minver_val; ?>" type="text" /></td>
                    </tr>
                    
                    <tr>
                    	<td colspan="2"><input name="action" value="insert" type="hidden" /></td>
                    </tr>
                </table>
                <p><div class="submit"><input type="submit" name="Update" value="Update Silverlight Plugin"  style="font-weight:bold;" /></div></p>
          </form>
        </div>

<?php
}

function silverlight_admin_menu()
{
	add_option("silverlight_standard_location","./");
	add_option("silverlight_standard_width","400");
	add_option("silverlight_standard_height","300");
  add_option("silverlight_standard_version","3.0.40723.0");
	add_options_page('Silverlight for WordPress', 'Silverlight for WordPress', 9, __FILE__, 'silverlight_option_page'); 
}

add_action('admin_menu', 'silverlight_admin_menu');

?>