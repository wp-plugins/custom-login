<?php
/**
 * Custom Login settings page
 * This file displays all of the available settings
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package CustomLogin
 */
?>
<div style="float:right; width:33%;">

<div class="postbox open">

<h3>About This Plugin</h3>

<div class="inside">
	<table class="form-table">

	<tr>
		<th style="width:20%;">Description:</th>
		<td><?php echo $plugin_data[ 'Description' ]; ?></td>
	</tr>
	<tr>
		<th style="width:20%;">Version:</th>
		<td><strong><?php echo $plugin_data[ 'Version' ]; ?></strong></td>
	</tr>
	<tr>
		<th style="width:20%;">Support:</th>
		<td><a href="http://wpcult.com/forum" title="Get support for this plugin">Visit the support forums.</a></td>
	</tr>

	</table>
</div>
</div>

<div id="docktop"></div>
<div id="dock" class="postbox open">

<h3>Color picker <span><abbr title="Click here to hide the color box below">click to toggle</abbr></span></h3>

<div class="inside">
	<div id="lets-get-this-color"></div>
    
    <p class="submit" style="text-align: center;">
        <input type="submit" name="Submit"  class="button-primary" value="Save Changes" />
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y" />
    </p>
    	
</div>
</div>

<div class="postbox open">

<h3>Support This Plugin</h3>

<div class="inside">
	<table class="form-table">

	<tr>
		<th style="width:20%;">Donate:</th>
		<td><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7329157" title="Donate on PayPal">PayPal</a>.</td>
	</tr>
	<tr>
		<th style="width:20%;">Rate:</th>
		<td><a href="http://www.wordpress.org/extend/plugins/custom-login/" title="WordPress.org Rating">This plugin on WordPress.org</a>.</td>
	</tr>
    
	</table>
</div>
</div>

<div class="postbox open">

<h3>About The Author</h3>

<div class="inside">

	<ul>
    
		<li><?php echo $plugin_data[ 'Author' ]; ?>: Freelance web design / developer &amp; WordPress guru. Also head orginizer of <a href="http://wordcamp.la">WordCamp.LA</a></li>
        
		<li><a href="http://twitter.com/TheFrosty" title="Austin Passy on Twitter">Follow me on twitter</a>.</li>
        
		<li>Need a WP expert? <a href="http://frostywebdesigns.com/" title="Frosty Web Designs">Hire me</a>.</li>
        
	</ul>
    
</div>
</div>

<div class="postbox open">

<h3><a href="http://thefrosty.net">TheFrosty Network</a> feeds</h3>

<div id="tab" class="inside">

	<ul class="tabs">
    
    	<li class="t1 t"><a>WPCult</a></li>
    	<li class="t2 t"><a>wpWorkShopLA</a></li>
    	<li class="t3 t"><a>WordCampLA</a></li>
        
	</ul>

		<?php if ( function_exists( 'wpcult_feed' ) ) wpcult_feed( 'http://wpcult.com/feed', '1' );	?>

		<?php if ( function_exists( 'wpcult_feed' ) ) wpcult_feed( 'http://wpworkshop.la/feed', '2' ); ?>
    
		<?php if ( function_exists( 'wpcult_feed' ) ) wpcult_feed( 'http://wordcamp.la/feed', '3' ); ?>
    
</div>
</div>

<div id="dockbottom"></div>

</div> <!-- /float:right -->

<div id="left" style="float:left; width:66%;">

<div class="postbox open">

<h3>Custom Login</h3>

<div class="inside">
	<table class="form-table">
    	<tr>
            <th>
            	<label for="<?php echo $data['use_custom']; ?>">Use your own CSS:</label> 
            </th>
            <td>
                <input id="<?php echo $data['use_custom']; ?>" name="<?php echo $data['use_custom']; ?>" type="checkbox" <?php if ( $val['use_custom'] ) echo 'checked="checked"'; ?> value="true" /><br />
                Check this box to use your own CSS, leave unchecked to leave the default style.
            </td>
   		</tr>
        
    </table>
    
</div>
</div>

<div class="postbox warning">
	<h3 style="background:#d9df2a!important">Click any header to expand/contract the box below!</h3>
</div>

<div class="postbox open">

<h3>Custom Login HTML &ndash; Your custom HTML code</h3>

<div class="inside">
	<table class="form-table">
    	<tr>
        	<th>
            	<label for="<?php echo $data['cl_USE_custom_html_code']; ?>">Use custom HTML:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_USE_custom_html_code']; ?>" name="<?php echo $data['cl_USE_custom_html_code']; ?>" type="checkbox" <?php if ( $val['cl_USE_custom_html_code'] ) echo 'checked="checked"'; ?> value="true" />
                Check this box to use the custom HTML box below.
            </td>
        </tr>
		<tr>           
            <th>
            	<label for="<?php echo $data['cl_login_custom_html_code']; ?>">Enter custom HTML:</label>  
            </th>
            <td>
                <textarea id="<?php echo $data['cl_login_custom_html_code']; ?>" name="<?php echo $data['cl_login_custom_html_code']; ?>" cols="60" rows="2" style="width: 98%;"><?php echo wp_specialchars( stripslashes( $val['cl_login_custom_html_code'] ), 1, 0, 1 ); ?></textarea><br />
                Use this box to enter any custom HTML coded that you can add custom style to in the custom CSS box. Be sure to include a comma after each entry as show in the example<br />
                <strong>Example:</strong> <code>&lt;div id="snow"&gt;&lt;img src="../image.jpg" alt="" /&gt;&lt;/div&gt;, &lt;div id="snow-bird"&gt; &lt;/div&gt;</code>
            </td>
   		</tr>
        
    </table>
    
</div>
</div>

<div class="postbox open">

<h3>Custom Login CSS &ndash; Your custom CSS code</h3>

<div class="inside">
	<table class="form-table">
    	<tr>
            <th>
            	<label for="<?php echo $data['cl_login_custom_code']; ?>">Enter custom CSS:</label>  
            </th>
            <td>
                &lt;style typle="text/css"&gt;<br />
                <textarea id="<?php echo $data['cl_login_custom_code']; ?>" name="<?php echo $data['cl_login_custom_code']; ?>" cols="60" rows="5" style="width: 98%;"><?php echo wp_specialchars( stripslashes( $val['cl_login_custom_code'] ), 1, 0, 1 ); ?></textarea><br />
                &lt;/style&gt;<br />
                Use this box to enter any custom CSS coded that may not be shown below.<br />
                <strong>Example:</strong> <code>.login #backtoblog a { color:#990000; }</code>
                	<br />
                <strong>Example:</strong> <code>.#snow { display:block; posistion:absolute; } #snow img { height:auto; width:100%; }</code> *example for custom html code..
            </td>
   		</tr>
        
    </table>
    
</div>
</div>

<div class="postbox warning">
	<h3 style="background:#d9df2a!important">You may need to maunally add the <strong>#</strong> into the color input sections</h3>
</div>

<div class="postbox open">

<h3>Custom Login CSS - html</h3>

<div class="inside">
	<table class="form-table">
		<tr>
            <th>
            	<label for="<?php echo $data['cl_html_background_color']; ?>">html backgound color:</label> 
            </th>
            <td>
                <input class="colorwell" id="<?php echo $data['cl_html_background_color']; ?>" name="<?php echo $data['cl_html_background_color']; ?>" value="<?php echo $val['cl_html_background_color']; ?>" size="10" maxlength="7" />
                Use HEX color <strong>WITH</strong> &prime;#&prime; !
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_html_background_url']; ?>">html backgound url:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_html_background_url']; ?>" name="<?php echo $data['cl_html_background_url']; ?>" value="<?php echo $val['cl_html_background_url']; ?>" size="40" /><br />
                Upload an image and put the full path here.<br />
                Suggeted size: <code>10px X 500px</code><br />
                <small>(faded color, where bottom color matches html background color).</small>
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_html_background_repeat']; ?>">html backgound repeat:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_html_background_repeat']; ?>" name="<?php echo $data['cl_html_background_repeat']; ?>" value="<?php echo $val['cl_html_background_repeat']; ?>" size="40" /><br />
                <small>use <code>no-repeat, repeat, repeat-x or repeat-y</code>.</small>
            </td>
   		</tr>
    </table>

</div>
</div>

<div class="postbox open">

<h3>Custom Login CSS - #login form</h3>

<div class="inside">
	<table class="form-table">
        <tr>
            <th>
            	<label for="<?php echo $data['cl_login_form_background_color']; ?>">login form backgound color:</label> 
            </th>
            <td>
                <input class="colorwell" id="<?php echo $data['cl_login_form_background_color']; ?>" name="<?php echo $data['cl_login_form_background_color']; ?>" value="<?php echo $val['cl_login_form_background_color']; ?>" size="10" maxlength="7" /><br />
                Use HEX color <strong>WITH</strong> &prime;#&prime; !
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_login_form_background']; ?>">login form backgound url:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_login_form_background']; ?>" name="<?php echo $data['cl_login_form_background']; ?>" value="<?php echo $val['cl_login_form_background']; ?>" size="40" /><br />
                Upload an image and put the full path here.
                Suggeted size: <code>308px X 108px</code><br />
                <small>(Suggested: Use a transparent .png or .gif. <a href="<?php echo CUSTOM_LOGIN_URL . '/psd/custom-login.psd' ?>">Download included .psd file</a>).</small>
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_login_form_border_radius']; ?>">login form border radius:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_login_form_border_radius']; ?>" name="<?php echo $data['cl_login_form_border_radius']; ?>" value="<?php echo $val['cl_login_form_border_radius']; ?>" size="3" maxlength="2" />px<br />
                Choose your border radius, ie <code>8</code> or <code>12</code>. Do not put &prime;<strong>px</strong>&prime;!
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_login_form_border']; ?>">login form border thickness:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_login_form_border']; ?>" name="<?php echo $data['cl_login_form_border']; ?>" value="<?php echo $val['cl_login_form_border']; ?>" size="2" maxlength="1" />px<br />
                Choose your border thickness, ie <code>1</code> or <code>2</code>. Do not put &prime;<strong>px</strong>&prime;!
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_login_form_border_color']; ?>">login form border color:</label> 
            </th>
            <td>
                <input class="colorwell" id="<?php echo $data['cl_login_form_border_color']; ?>" name="<?php echo $data['cl_login_form_border_color']; ?>" value="<?php echo $val['cl_login_form_border_color']; ?>" size="10" maxlength="7" /><br />
                Use HEX color <strong>WITH</strong> &prime;#&prime; !
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_login_form_box_shadow_1']; ?>">login form box shadow:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_login_form_box_shadow_1']; ?>" name="<?php echo $data['cl_login_form_box_shadow_1']; ?>" value="<?php echo $val['cl_login_form_box_shadow_1']; ?>" size="2" maxlength="2" />px
                <input id="<?php echo $data['cl_login_form_box_shadow_2']; ?>" name="<?php echo $data['cl_login_form_box_shadow_2']; ?>" value="<?php echo $val['cl_login_form_box_shadow_2']; ?>" size="2" maxlength="2" />px
                <input id="<?php echo $data['cl_login_form_box_shadow_3']; ?>" name="<?php echo $data['cl_login_form_box_shadow_3']; ?>" value="<?php echo $val['cl_login_form_box_shadow_3']; ?>" size="2" maxlength="2" />px
                <input class="colorwell" id="<?php echo $data['cl_login_form_box_shadow_4']; ?>" name="<?php echo $data['cl_login_form_box_shadow_4']; ?>" value="<?php echo $val['cl_login_form_box_shadow_4']; ?>" size="10" maxlength="7" /><br />
                Choose your box shadow settings, ie <code>5px 5px 18px #464646</code> <em>example code - <code>offset, offset, blur, color</code></em>
            </td>
   		</tr>
    </table>

</div>
</div>

<div class="postbox open">

<h3>Custom Login CSS - label</h3>

<div class="inside">
	<table class="form-table">
		<tr>
            <th>
            	<label for="<?php echo $data['cl_label_color']; ?>">label font color:</label> 
            </th>
            <td>
                <input class="colorwell" id="<?php echo $data['cl_label_color']; ?>" name="<?php echo $data['cl_label_color']; ?>" value="<?php echo $val['cl_label_color']; ?>" size="10" maxlength="7" />
                Use HEX color <strong>WITH</strong> &prime;#&prime; !
            </td>
   		</tr>
    </table>

</div>
</div>


</div> <!-- /float:left -->

<br style="clear:both;" />
