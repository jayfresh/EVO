<?php

include 'widget.php';

/*
Plugin Name: Accessibility Access Keys
Plugin URI: http://accessiblefutures.org
Description: Allows a WordPress administrator to create and maintain site-wide access keys for easy navigation by website end users. 
Version: 1.0
Author: AccessibleFutures.org
Author URI: http://accessiblefutures.org
License: MIT Open Source License (http://www.opensource.org/licenses/mit-license.php)
*/


/* LICENSE OF THE ACCESS KEYS PLUGIN

Copyright (c) 2009-2011 BrailleSC.org, University of South - Upstate, The University of South Carolina and Cory Bohon

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

//Actions
add_action('wp_footer', 'footer_printer');
add_action('widgets_init', create_function('', 'return register_widget("AccessibilityWidget");'));

//Hooks
register_activation_hook (__FILE__,'access_keys_install');
register_deactivation_hook(__FILE__, 'access_keys_remove' );



//Runs when the plugin is activated
function access_keys_install() 
{
	//Add WP Built-In Functions Database Options
	add_option("home_page_key", 'Default', '', 'yes');	 
	add_option("home_page_url", 'Default', '', 'yes');	
	add_option("search_page_key", 'Default', '', 'yes'); 
	add_option("search_page_url", 'Default', '', 'yes');	
	add_option("top_of_page_key", 'Default', '', 'yes');	
	add_option("skip_to_content_key", 'Default', '', 'yes');
														 	
	//Add Custom Access Keys Database Options			 	
	add_option("custom_key_1", 'Default', '', 'yes');
	add_option("custom_key_shortname_1", 'Default', '', 'yes');
	add_option("custom_key_1_url", 'Default', '', 'yes');	
														 	
	add_option("custom_key_2", 'Default', '', 'yes');	 	
	add_option("custom_key_shortname_2", 'Default', '', 'yes');
	add_option("custom_key_2_url", 'Default', '', 'yes');	
	
	add_option("custom_key_3", 'Default', '', 'yes');
	add_option("custom_key_shortname_3", 'Default', '', 'yes');	 	
	add_option("custom_key_3_url", 'Default', '', 'yes');	
	
	add_option("custom_key_4", 'Default', '', 'yes');	 	
	add_option("custom_key_shortname_4", 'Default', '', 'yes');
	add_option("custom_key_4_url", 'Default', '', 'yes');	
	
	add_option("custom_key_5", 'Default', '', 'yes');	 	
	add_option("custom_key_shortname_5", 'Default', '', 'yes');
	add_option("custom_key_5_url", 'Default', '', 'yes');	

	add_option("custom_key_6", 'Default', '', 'yes');	 	
	add_option("custom_key_shortname_6", 'Default', '', 'yes');
	add_option("custom_key_6_url", 'Default', '', 'yes');	
	
	add_option("custom_key_7", 'Default', '', 'yes');	 	
	add_option("custom_key_shortname_7", 'Default', '', 'yes');
	add_option("custom_key_7_url", 'Default', '', 'yes');	

	add_option("custom_key_8", 'Default', '', 'yes');	 	
	add_option("custom_key_shortname_8", 'Default', '', 'yes');
	add_option("custom_key_8_url", 'Default', '', 'yes');	
	
	add_option("custom_key_9", 'Default', '', 'yes');	 	
	add_option("custom_key_shortname_9", 'Default', '', 'yes');
	add_option("custom_key_9_url", 'Default', '', 'yes');	
	
	add_option("custom_key_10", 'Default', '', 'yes');	 	
	add_option("custom_key_shortname_10", 'Default', '', 'yes');
	add_option("custom_key_10_url", 'Default', '', 'yes');	

}//end function hello_world_install()


//runs when the plugin is deactivated 
function access_keys_remove() 
{
	//Add WP Built-In Functions Database Options
	delete_option("home_page_key", 'Default', '', 'yes');	
	delete_option("home_page_url", 'Default', '', 'yes'); 	
	delete_option("search_page_key", 'Default', '', 'yes'); 	
	delete_option("search_page_url", 'Default', '', 'yes');
	delete_option("top_of_page_key", 'Default', '', 'yes');
	delete_option("skip_to_content_key", 'Default', '', 'yes');
														 	
	//Add Custom Access Keys Database Options			 	
	delete_option("custom_key_1", 'Default', '', 'yes');
	delete_option("custom_key_shortname_1", 'Default', '', 'yes');
	delete_option("custom_key_1_url", 'Default', '', 'yes');	
														 	
	delete_option("custom_key_2", 'Default', '', 'yes');	
	delete_option("custom_key_shortname_2", 'Default', '', 'yes'); 	
	delete_option("custom_key_2_url", 'Default', '', 'yes');	

	delete_option("custom_key_3", 'Default', '', 'yes');	 	
	delete_option("custom_key_shortname_3", 'Default', '', 'yes');
	delete_option("custom_key_3_url", 'Default', '', 'yes');	

	delete_option("custom_key_4", 'Default', '', 'yes');	 	
	delete_option("custom_key_shortname_4", 'Default', '', 'yes');
	delete_option("custom_key_4_url", 'Default', '', 'yes');	

	delete_option("custom_key_5", 'Default', '', 'yes');	 	
	delete_option("custom_key_shortname_5", 'Default', '', 'yes');
	delete_option("custom_key_5_url", 'Default', '', 'yes');	

	delete_option("custom_key_6", 'Default', '', 'yes');	 	
	delete_option("custom_key_shortname_6", 'Default', '', 'yes');
	delete_option("custom_key_6_url", 'Default', '', 'yes');	

	delete_option("custom_key_7", 'Default', '', 'yes');	 	
	delete_option("custom_key_shortname_7", 'Default', '', 'yes');
	delete_option("custom_key_7_url", 'Default', '', 'yes');	

	delete_option("custom_key_8", 'Default', '', 'yes');	 	
	delete_option("custom_key_shortname_8", 'Default', '', 'yes');
	delete_option("custom_key_8_url", 'Default', '', 'yes');	
	
	delete_option("custom_key_9", 'Default', '', 'yes');	 	
	delete_option("custom_key_shortname_9", 'Default', '', 'yes');
	delete_option("custom_key_9_url", 'Default', '', 'yes');	

	delete_option("custom_key_10", 'Default', '', 'yes');	 	
	delete_option("custom_key_shortname_10", 'Default', '', 'yes');
	delete_option("custom_key_10_url", 'Default', '', 'yes');	


}//end function hello_world_remove()


if(is_admin())
{

	/* Call the html code */
	add_action('admin_menu', 'hello_world_admin_menu');

	function hello_world_admin_menu() 
	{
		add_options_page('Configure Access Keys', 'Configure Access Keys', 'administrator',
		'hello-world', 'access_keys_admin_page');
	}//end hello_world_admin_menu() function

}//end if

function access_keys_admin_page() 
{
?>
	<div>
	<h2>Configure Access Keys</h2>
	Configure the access keys for the following WordPress functions by typing in a one character (ex. a-0) in the space provided. You can optionally create additional access keys by using the Custom Access Keys section below. This feature lets you specify a URL and an access key to go along with it.
	<br /><br />
	To learn more about access keys, visit <a href="http://wikipedia.org/wiki/Access_keys" target="_blank">this page</a>.
	
	<br /><br /><br />

	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>

	<h3>Assign Built-in WordPress Access Keys</h3>
	<table width="600" border="0" cellpadding="0" cellspacing="2">
		<tr>
			<td><strong>Home Page</strong></td>
			<td><input name="home_page_key" maxlength="1" size="2" type="text" id="home_page_key" value="<?php echo get_option('home_page_key'); ?>" /></td>
			<td><strong>URL to Home Page: </strong></td>
			<td><input name="home_page_url" type="text" id="home_page_url" value="<?php echo get_option('home_page_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Search Page</strong></td>
			<td><input name="search_page_key" maxlength="1" size="2" type="text" id="search_page_key" value="<?php echo get_option('search_page_key'); ?>" /></td>
			<td><strong>URL to Search Page: </strong></td>
			<td><input name="search_page_url" type="text" id="search_page_url" value="<?php echo get_option('search_page_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Jump to Top of Page</strong></td>
			<td><input name="top_of_page_key" maxlength="1" size="2" type="text" id="top_of_page_key" value="<?php echo get_option('top_of_page_key'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Skip to Main Content</strong></td>
			<td><input name="skip_to_content_key" maxlength="1" size="2" type="text" id="skip_to_content_key" value="<?php echo get_option('skip_to_content_key'); ?>" /></td>
		</tr>
	</table>
	
	<br />
	<br />
	
	<h3>Assign Custom Access Keys</h3>
	<table width="700" border="0" cellpadding="0" cellspacing="2">
		<tr>
			<td><strong>Custom Key #1</strong></td>
			<td><strong>URL Shortname: </strong></td>
			<td><input name="custom_key_shortname_1" type="text" id="custom_key_shortname_1" value="<?php echo get_option('custom_key_shortname_1'); ?>" /></td>
			<td><strong>Access Key: </strong></td>
			<td><input name="custom_key_1" maxlength="1" size="2" type="text" id="custom_key_1" value="<?php echo get_option('custom_key_1'); ?>" /></td>
			<td><strong>URL: </strong></td>
			<td><input name="custom_key_1_url" type="text" id="custom_key_1_url" value="<?php echo get_option('custom_key_1_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Custom Key #2</strong></td>
			<td><strong>URL Shortname: </strong></td>
			<td><input name="custom_key_shortname_2" type="text" id="custom_key_shortname_2" value="<?php echo get_option('custom_key_shortname_2'); ?>" /></td>
			<td><strong>Access Key: </strong></td>
			<td><input name="custom_key_2" maxlength="1" size="2" type="text" id="custom_key_2" value="<?php echo get_option('custom_key_2'); ?>" /></td>
			<td><strong>URL: </strong></td>
			<td><input name="custom_key_2_url" type="text" id="custom_key_2_url" value="<?php echo get_option('custom_key_2_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Custom Key #3</strong></td>
			<td><strong>URL Shortname: </strong></td>
			<td><input name="custom_key_shortname_3" type="text" id="custom_key_shortname_3" value="<?php echo get_option('custom_key_shortname_3'); ?>" /></td>
			<td><strong>Access Key: </strong></td>
			<td><input name="custom_key_3" maxlength="1" size="2" type="text" id="custom_key_3" value="<?php echo get_option('custom_key_3'); ?>" /></td>
			<td><strong>URL: </strong></td>
			<td><input name="custom_key_3_url" type="text" id="custom_key_3_url" value="<?php echo get_option('custom_key_3_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Custom Key #4</strong></td>
			<td><strong>URL Shortname: </strong></td>
			<td><input name="custom_key_shortname_4" type="text" id="custom_key_shortname_4" value="<?php echo get_option('custom_key_shortname_4'); ?>" /></td>
			<td><strong>Access Key: </strong></td>
			<td><input name="custom_key_4" maxlength="1" size="2" type="text" id="custom_key_4" value="<?php echo get_option('custom_key_4'); ?>" /></td>
			<td><strong>URL: </strong></td>
			<td><input name="custom_key_4_url" type="text" id="custom_key_4_url" value="<?php echo get_option('custom_key_4_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Custom Key #5</strong></td>
			<td><strong>URL Shortname: </strong></td>
			<td><input name="custom_key_shortname_5" type="text" id="custom_key_shortname_5" value="<?php echo get_option('custom_key_shortname_5'); ?>" /></td>
			<td><strong>Access Key: </strong></td>
			<td><input name="custom_key_5" maxlength="1" size="2" type="text" id="custom_key_5" value="<?php echo get_option('custom_key_5'); ?>" /></td>
			<td><strong>URL: </strong></td>
			<td><input name="custom_key_5_url" type="text" id="custom_key_5_url" value="<?php echo get_option('custom_key_5_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Custom Key #6</strong></td>
			<td><strong>URL Shortname: </strong></td>
			<td><input name="custom_key_shortname_6" type="text" id="custom_key_shortname_6" value="<?php echo get_option('custom_key_shortname_6'); ?>" /></td>
			<td><strong>Access Key: </strong></td>
			<td><input name="custom_key_6" maxlength="1" size="2" type="text" id="custom_key_6" value="<?php echo get_option('custom_key_6'); ?>" /></td>
			<td><strong>URL: </strong></td>
			<td><input name="custom_key_6_url" type="text" id="custom_key_6_url" value="<?php echo get_option('custom_key_6_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Custom Key #7</strong></td>
			<td><strong>URL Shortname: </strong></td>
			<td><input name="custom_key_shortname_7" type="text" id="custom_key_shortname_7" value="<?php echo get_option('custom_key_shortname_7'); ?>" /></td>
			<td><strong>Access Key: </strong></td>
			<td><input name="custom_key_7" maxlength="1" size="2" type="text" id="custom_key_7" value="<?php echo get_option('custom_key_7'); ?>" /></td>
			<td><strong>URL: </strong></td>
			<td><input name="custom_key_7_url" type="text" id="custom_key_7_url" value="<?php echo get_option('custom_key_7_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Custom Key #8</strong></td>
			<td><strong>URL Shortname: </strong></td>
			<td><input name="custom_key_shortname_8" type="text" id="custom_key_shortname_8" value="<?php echo get_option('custom_key_shortname_8'); ?>" /></td>
			<td><strong>Access Key: </strong></td>
			<td><input name="custom_key_8" maxlength="1" size="2" type="text" id="custom_key_8" value="<?php echo get_option('custom_key_8'); ?>" /></td>
			<td><strong>URL: </strong></td>
			<td><input name="custom_key_8_url" type="text" id="custom_key_8_url" value="<?php echo get_option('custom_key_8_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Custom Key #9</strong></td>
			<td><strong>URL Shortname: </strong></td>
			<td><input name="custom_key_shortname_9" type="text" id="custom_key_shortname_9" value="<?php echo get_option('custom_key_shortname_9'); ?>" /></td>
			<td><strong>Access Key: </strong></td>
			<td><input name="custom_key_9" maxlength="1" size="2" type="text" id="custom_key_9" value="<?php echo get_option('custom_key_9'); ?>" /></td>
			<td><strong>URL: </strong></td>
			<td><input name="custom_key_9_url" type="text" id="custom_key_9_url" value="<?php echo get_option('custom_key_9_url'); ?>" /></td>
		</tr>
		<tr>
			<td><strong>Custom Key #10</strong></td>
			<td><strong>URL Shortname: </strong></td>
			<td><input name="custom_key_shortname_10" type="text" id="custom_key_shortname_10" value="<?php echo get_option('custom_key_shortname_10'); ?>" /></td>
			<td><strong>Access Key: </strong></td>
			<td><input name="custom_key_10" maxlength="1" size="2" type="text" id="custom_key_10" value="<?php echo get_option('custom_key_10'); ?>" /></td>
			<td><strong>URL: </strong></td>
			<td><input name="custom_key_10_url" type="text" id="custom_key_10_url" value="<?php echo get_option('custom_key_10_url'); ?>" /></td>
		</tr>
	
	</table>
	
	
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="home_page_key, home_page_url, search_page_key, search_page_url, top_of_page_key, skip_to_content_key, custom_key_1, custom_key_1_url, custom_key_2, custom_key_2_url, custom_key_3, custom_key_3_url, custom_key_4, custom_key_4_url, custom_key_5, custom_key_5_url, custom_key_6, custom_key_6_url, custom_key_7, custom_key_7_url, custom_key_8, custom_key_8_url, custom_key_9, custom_key_9_url, custom_key_10, custom_key_10_url, custom_key_shortname_1, custom_key_shortname_2, custom_key_shortname_3, custom_key_shortname_4, custom_key_shortname_5, custom_key_shortname_6, custom_key_shortname_7, custom_key_shortname_8, custom_key_shortname_9, custom_key_shortname_10" />
	
	<p>
	<input type="submit" value="<?php _e('Save Changes') ?>" />
	</p>
	
	</form>
	</div>
<?php
}//end function access_keys_admin_page()

function footer_printer() 
{
?>
	<?php //Built-in Function Access Keys ?>
	<?php if(get_option('home_page_url') != "" && get_option('home_page_key') != ""){?>
	<a href="<?php echo get_option('home_page_url'); ?>" accesskey="<?php echo get_option('home_page_key'); ?>"></a>
	<?php }if(get_option(search_page_url) != "" && get_option('search_page_key') != ""){?>
	<a href="<?php echo get_option('search_page_url'); ?>" accesskey="<?php echo get_option('search_page_key'); ?>"></a>
	<?php }if(get_option('skip_to_content_key') != ""){?>
	<a href="#content" accesskey="<?php echo get_option('skip_to_content_key'); ?>"></a>
	<?php }if(get_option('top_of_page_key') != ""){?>
	<a href="#TOP" accesskey="<?php echo get_option('top_of_page_key'); ?>"></a>
	<?php //Custom Access Keys ?>
	<?php }if(get_option('custom_key_1_url') != "" && get_option('custom_key_1') != ""){ ?>
	<a href="<?php echo get_option('custom_key_1_url'); ?>" accesskey="<?php echo get_option('custom_key_1'); ?>"></a>
	<?php }if(get_option('custom_key_2_url') != "" && get_option('custom_key_2') != ""){ ?>	
	<a href="<?php echo get_option('custom_key_2_url'); ?>" accesskey="<?php echo get_option('custom_key_2'); ?>"></a>
	<?php }if(get_option('custom_key_3_url') != "" && get_option('custom_key_3') != ""){ ?>
	<a href="<?php echo get_option('custom_key_3_url'); ?>" accesskey="<?php echo get_option('custom_key_3'); ?>"></a>
	<?php }if(get_option('custom_key_4_url') != "" && get_option('custom_key_4') != ""){ ?>
	<a href="<?php echo get_option('custom_key_4_url'); ?>" accesskey="<?php echo get_option('custom_key_4'); ?>"></a>
	<?php }if(get_option('custom_key_5_url') != "" && get_option('custom_key_5') != ""){ ?>
	<a href="<?php echo get_option('custom_key_5_url'); ?>" accesskey="<?php echo get_option('custom_key_5'); ?>"></a>
	<?php }if(get_option('custom_key_6_url') != "" && get_option('custom_key_6') != ""){ ?>
	<a href="<?php echo get_option('custom_key_6_url'); ?>" accesskey="<?php echo get_option('custom_key_6'); ?>"></a>
	<?php }if(get_option('custom_key_7_url') != "" && get_option('custom_key_7') != ""){ ?>
	<a href="<?php echo get_option('custom_key_7_url'); ?>" accesskey="<?php echo get_option('custom_key_7'); ?>"></a>
	<?php }if(get_option('custom_key_8_url') != "" && get_option('custom_key_8') != ""){ ?>
	<a href="<?php echo get_option('custom_key_8_url'); ?>" accesskey="<?php echo get_option('custom_key_8'); ?>"></a> 
	<?php }if(get_option('custom_key_9_url') != "" && get_option('custom_key_9') != ""){ ?>
	<a href="<?php echo get_option('custom_key_9_url'); ?>" accesskey="<?php echo get_option('custom_key_9'); ?>"></a>
	<?php }if(get_option('custom_key_10_url') != "" && get_option('custom_key_10') != ""){ ?>
	<a href="<?php echo get_option('custom_key_10_url'); ?>" accesskey="<?php echo get_option('custom_key_10'); ?>"></a>  
	<?php } ?>
<?php   
}//end function footer_printer()

?>