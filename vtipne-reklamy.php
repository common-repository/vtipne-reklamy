<?php
/**
 * Plugin Name: Melanger ads
 * Plugin URI: http://melanger.cz/aplikace/wordpress-pluginy/vtipne-reklamy/
 * Description: Plugin has been discontinued, please upgrade to Funny placeholder
 * Version: 1.5
 * Author: melangercz
 * Author URI: http://melanger.cz/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
/*  Copyright 2013  Mélanger.cz  (email : plugins@melanger.cz)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('init', 'melanger_ads_init', 1);
function melanger_ads_init(){
$locale = apply_filters('plugin_locale', get_locale(), 'vtipne-reklamy');
load_textdomain('vtipne-reklamy', WP_LANG_DIR.'/vtipne-reklamy/'.'vtipne-reklamy'.'-'.$locale.'.mo');
load_plugin_textdomain('vtipne-reklamy', FALSE, dirname(plugin_basename(__FILE__)).'/languages/');
}

class melanger_ads extends WP_Widget {
	function __construct() {
		parent::__construct(false, __('Mélanger ads', 'vtipne-reklamy'), array( 'description' => __( 'Funny ads by Mélanger.cz', 'vtipne-reklamy' )) );
	}
	function widget($args, $instance) {
		switch(get_locale())
			{
			case "cs_CZ":
				$locale = "cs";
				$ai = rand(0,33);
				if($ai < 10) $ad = array("reklama-letni-kurzy-agentura-festa.png"=>array("http://www.letni-kurzy.cz/"));
				elseif($ai < 15) $ad = array("reklama-ds-modrice.png"=>array("http://www.domov-senioru-brno.cz/"));
				elseif($ai < 20) $ad = array("reklama-tretky.gif"=>array("http://tretky.cz/"));
				elseif($ai < 22) $ad = array("alternativni-zdroje-elektriny.png"=>array(""));
				elseif($ai < 24) $ad = array("reklama-darujte-krev.png"=>array(""));
				elseif($ai < 26) $ad = array("reklama-rychlovarna-konvice.jpg"=>array(""));
				elseif($ai < 27) $ad = array("reklama-mc-haf.png"=>array(""));
				elseif($ai < 28) $ad = array("reklama-mc-haf-2.png"=>array(""));
				elseif($ai < 30) $ad = array("reklama-bezpecna-obuv-do-tanecnich.png"=>array(""));
				elseif($ai < 32) $ad = array("reklama-homeopatikum-vira.png"=>array(""));
				//elseif($ai < ) $ad = array();
				else $ad = array("reklama-van-der-graaf.png"=>array(""));
			break;
			default:
				$locale = "en";
				$ai = rand(0,7);
				if($ai < 2) $ad = array("ad-alternative-energy-sources.png"=>array("http://wordpress.org/plugins/vtipne-reklamy/"));
				elseif($ai < 4) $ad = array("ad-electric-kettle.jpg"=>array("http://wordpress.org/plugins/vtipne-reklamy/"));
				elseif($ai < 6) $ad = array("ad-mc-woof.png"=>array("http://wordpress.org/plugins/vtipne-reklamy/"));
				//elseif($ai < ) $ad = array();
				else $ad = array("ad-safe-dancing-shoes.png"=>array("http://wordpress.org/plugins/vtipne-reklamy/"));
			break;
			}
		list($img) = array_keys($ad);
		?>
		<div class="widget melanger_ads">
			<?php
			$file = 'img/'.$locale.'/'.$img;
			if(!$ad[$img][0]) $ad[$img][0] = "http://melanger.cz/";
			echo "<a href='".esc_html($ad[$img][0])."' class='melanger-ads-a'><img src='".esc_html(plugin_dir_url(__FILE__).$file)."' width='160' height='600' style='border:0' class='melanger-ads-img' alt='".__('Funny ad served by Mélanger.cz','vtipne-reklamy')."'></a>";
			?>
		</div>
		<?php
	}
}
function register_melanger_ads()
{
    register_widget( 'melanger_ads' );
}
add_action( 'widgets_init', 'register_melanger_ads');

?>