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
		<td><?php echo 'A simple way to customize your WordPress login screen!' //$plugin_data[ 'Short Description' ]; ?></td>
	</tr>
	<tr>
		<th style="width:20%;">Version:</th>
		<td><strong><?php echo $plugin_data[ 'Version' ]; ?></strong></td>
	</tr>
	<tr style="display:none;">
		<th style="width:20%;">Support:</th>
		<td><a href="http://wpcult.com/forum" title="Get support for this plugin" class="external">WPCult support forums.</a></td>
	</tr>
	<tr>
		<th style="width:20%;">Support:</th>
		<td><a href="http://wordpress.org/tags/custom-login?forum_id=10" title="Get support for this plugin" class="external">WordPress support forums.</a></td>
	</tr>

	</table>
</div>
</div>

<div id="docktop"></div>
<div id="colordock" class="postbox open">

<h3>Quick Save <span><abbr title="Click here to hide the color box below">click to toggle</abbr></span></h3>

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
		<td><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7329157" title="Donate on PayPal" class="external">PayPal</a>.</td>
	</tr>
	<tr>
		<th style="width:20%;">Rate:</th>
		<td><a href="http://www.wordpress.org/extend/plugins/custom-login/" title="WordPress.org Rating" class="external">This plugin on WordPress.org</a>.</td>
	</tr>
	<tr>
		<th style="width:20%;">Share:</th>
		<td><a href="http://www.flickr.com/groups/custom-login/" title="Flick Group" class="external">Your design in the <span style="color:#0066DC;font-weight:bold;">Flick</span><span style="color:#ff0084;font-weight:bold;">r</span> group</a>. <sup style="color:#FF0000;font-weight:bold;text-decoration:blink;">new</sup></td>
	</tr>
    
	</table>
</div>
</div>

<div class="postbox open">

<h3>About The Author</h3>

<div class="inside">

	<ul>
    
		<li><?php echo $plugin_data[ 'Author' ]; ?>: Freelance web design / developer &amp; WordPress guru. Also head organizer of <a href="http://wordcamp.la">WordCamp.LA</a></li>
        
		<li><a href="http://twitter.com/TheFrosty" title="Austin Passy on Twitter" class="external">Follow me on twitter</a>.</li>
        
		<li>Need a WP expert? <a href="http://frostywebdesigns.com/" title="Frosty Web Designs" class="external">Hire me</a>.</li>
        
	</ul>
    
</div>
</div>

<div class="postbox open">

<h3><a href="http://thefrosty.net">TheFrosty Network</a> feeds</h3>

<div id="tab" class="inside">

	<ul class="tabs">
    
    	<li class="t1 t"><a>WordCampLA</a></li>
    	<li class="t2 t"><a>WPCult</a></li>
    	<li class="t3 t"><a>wpWorkShopLA</a></li>
        
	</ul>
    
		<?php if ( function_exists( 'wpcult_feed' ) ) wpcult_feed( 'http://wordcamp.la/feed', '1' ); ?>

		<?php if ( function_exists( 'wpcult_feed' ) ) wpcult_feed( 'http://wpcult.com/feed', '2' );	?>

		<?php if ( function_exists( 'wpcult_feed' ) ) wpcult_feed( 'http://wpworkshop.la/feed', '3' ); ?>
    
</div>
</div>

<div id="dockbottom"></div>

<div id="preview-box" class="postbox open">

<h3>Preview</h3>    
        
<div class="inside">
    <p style="font-weight:bold;"><a class="thickbox thickbox-preview" href="<?php echo wp_login_url(); ?>?TB_iframe=true" title="">Click here to see a live preview!</a></p>
    
</div>
</div>

<div id="uninstall" class="postbox open">

<h3>Uninstaller <span><abbr title="Click here to show the box below">Don't do it!</abbr></span><span class="watchingyou">:O You did it...</span></h3>  
        
<div class="inside">
    <p style="text-align:justify;">If you really have to, use this <a href="../wp-content/plugins/custom-login/uninstall.php" title="Uninstall the Custom Login plugin with this script">script</a> to uninstall the plugin and completly remove all options from your WordPress database.</p>
    
    <p><label for="<?php echo $data['cl_login_hide_ad']; ?>">Hide ad?</label>
    	&nbsp;<input id="<?php echo $data['cl_login_hide_ad']; ?>" name="<?php echo $data['cl_login_hide_ad']; ?>" type="checkbox" <?php if ( $val['cl_login_hide_ad'] ) echo 'checked="checked"'; ?> value="true" />	Please only hide the ad if you've <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7329157" title="Donate on PayPal" class="external">donated</a>.
    </p>
    
</div>
</div>

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
                <input id="<?php echo $data['use_custom']; ?>" name="<?php echo $data['use_custom']; ?>" type="checkbox" <?php if ( $val['use_custom'] ) echo 'checked="checked"'; ?> value="true" /> <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide"> Check this box to use your own CSS, leave unchecked to use the default style.</span>
            </td>
		</tr>        
    </table>
    
</div>
</div>



<div class="postbox ad" <?php if ( $val['cl_login_hide_ad'] ) echo 'style="display:none;"'; ?>>
	<h3><sup style="color:rgba(51,66,70,0.6); float:right; top:-15px; position:relative;">Powered by: 
    	<a href="http://bit.ly/wpadsnet" title="Inline plugin adversisment by &ldquo;http://wpads.net&rdquo;" style="color:rgba(51,66,70,0.6); cursor:help;">WP<em>Ads</em></a></sup>
			<script type="text/javascript" src="http://wpads.com/wp-content/plugins/oiopub-direct/js.php?type=link&align=center&zone=1"></script>
    </h3>
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
                Check this box to use the custom HTML box below. <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Checking this box will use <a href="http://jquery.com/" class="external">jQuery</a> and the <a href="http://api.jquery.com/append/" class="external">append</a> attribute. 
                </span>
            </td>
        </tr>
		<tr>
            <td colspan="2">
            	<label for="<?php echo $data['cl_login_custom_html_code']; ?>">Enter custom HTML:</label><br />
                
                <textarea id="<?php echo $data['cl_login_custom_html_code']; ?>" name="<?php echo $data['cl_login_custom_html_code']; ?>" cols="60" rows="2" style="width: 99%;"><?php echo wp_specialchars( stripslashes( $val['cl_login_custom_html_code'] ), 1, 0, 1 ); ?></textarea>
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Use this box to enter any custom HTML coded that you can add custom style to in the custom CSS box. Be sure to include a comma after each entry as show in the example<br />
                <strong>Example:</strong> <code>&lt;div id="snow"&gt;&lt;img src="../image.jpg" alt="" /&gt;&lt;/div&gt;, &lt;div id="snow-bird"&gt; &lt;/div&gt;</code>
                </span>
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
            <td>
                &lt;style typle="text/css"&gt;<br />
                <textarea id="<?php echo $data['cl_login_custom_code']; ?>" name="<?php echo $data['cl_login_custom_code']; ?>" cols="60" rows="5" style="width: 99%;"><?php echo wp_specialchars( stripslashes( $val['cl_login_custom_code'] ), 1, 0, 1 ); ?></textarea>
                &lt;/style&gt;<br />
                <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Use this box to enter any custom CSS coded that may not be shown below.<br />
                <strong>Example:</strong> <code>.login #backtoblog a { color:#990000; }</code>
                	<br />
                &sect; <strong>Example:</strong> <code>#snow { display:block; position:absolute; } #snow img { height:auto; width:100%; }</code><br />
                	&sect; example CSS code for custom html code example..
                </span>
            </td>
    	</tr>        
    </table>
    
</div>
</div>


<div class="postbox open">

<h3>Custom Login CSS - html</h3>

<div class="inside">
	<table class="form-table">
		<tr>
            <th>
            	<label for="<?php echo $data['cl_html_border_top_color']; ?>">html border-top color:</label> 
            </th>
            <td>
                <input class="color {hash:true,required:false,adjust:false}" id="<?php echo $data['cl_html_border_top_color']; ?>" name="<?php echo $data['cl_html_border_top_color']; ?>" value="<?php echo $val['cl_html_border_top_color']; ?>" size="10" maxlength="21" /> <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Use HEX color <strong>with</strong> &ldquo;#&rdquo; or RGB/A format.<br />
				<strong>This is the top 30px border you see on the login page.</strong><br />
				Example: &sup1;<code>#121212</code> &sup2;<code>rgba(255,255,255,0.4)</code></span>
            </td>
   		</tr>
        
            <th>
            	<label for="<?php echo $data['cl_html_background_color']; ?>">html background color:</label> 
            </th>
            <td>
                <input class="color {hash:true,required:false,adjust:false}" id="<?php echo $data['cl_html_background_color']; ?>" name="<?php echo $data['cl_html_background_color']; ?>" value="<?php echo $val['cl_html_background_color']; ?>" size="10" maxlength="21" /> <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Use HEX color <strong>with</strong> &ldquo;#&rdquo; or RGB/A format.<br />
				Example: &sup1;<code>#121212</code> &sup2;<code>rgba(255,255,255,0.4)</code></span>
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_html_background_url']; ?>">html background url:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_html_background_url']; ?>" name="<?php echo $data['cl_html_background_url']; ?>" value="<?php echo $val['cl_html_background_url']; ?>" size="40" /> <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Upload an image and put the full path here.<br />
                Suggested size: <code>10px X 500px</code> (for a repeating background) or<br />
                Full size image with a 100% streched to fit window image.</span>
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_html_background_repeat']; ?>">html background repeat:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_html_background_repeat']; ?>" name="<?php echo $data['cl_html_background_repeat']; ?>" value="<?php echo $val['cl_html_background_repeat']; ?>" size="40" /> <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Use <code>no-repeat</code>, <code>repeat</code>, <code>repeat-x</code> or <code>repeat-y</code>.</span>
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
            	<label for="<?php echo $data['cl_login_form_background_color']; ?>">login form background color:</label> 
            </th>
            <td>
                <input class="color {hash:true,required:false,adjust:false}" id="<?php echo $data['cl_login_form_background_color']; ?>" name="<?php echo $data['cl_login_form_background_color']; ?>" value="<?php echo $val['cl_login_form_background_color']; ?>" size="10" maxlength="7" /> <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Use HEX color <strong>with</strong> &ldquo;#&rdquo; or RGB/A format.<br />
				Example: &sup1;<code>#121212</code> &sup2;<code>rgba(255,255,255,0.4)</code></span>
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_login_form_background']; ?>">login form background url:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_login_form_background']; ?>" name="<?php echo $data['cl_login_form_background']; ?>" value="<?php echo $val['cl_login_form_background']; ?>" size="40" /> <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Upload an image and put the full path here. Suggested size: <code>308px X 108px</code><br />
                My suggestion: use a transparent .png or .gif. <a href="<?php echo CUSTOM_LOGIN_URL . '/psd/custom-login.psd' ?>">Download included .psd file</a>).</span>
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_login_form_border_radius']; ?>">login form border radius:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_login_form_border_radius']; ?>" name="<?php echo $data['cl_login_form_border_radius']; ?>" value="<?php echo $val['cl_login_form_border_radius']; ?>" size="3" maxlength="2" />px <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Choose your border radius, ie <code>8</code> or <code>12</code>. Do not put &ldquo;<strong>px</strong>&rdquo;!</span>
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_login_form_border']; ?>">login form border thickness:</label> 
            </th>
            <td>
                <input id="<?php echo $data['cl_login_form_border']; ?>" name="<?php echo $data['cl_login_form_border']; ?>" value="<?php echo $val['cl_login_form_border']; ?>" size="2" maxlength="2" />px <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Choose your border thickness, i.e. <code>1</code> or <code>2</code>. Do not put &ldquo;<strong>px</strong>&rdquo;!</span>
            </td>
   		</tr>
        
        <tr>
            <th>
            	<label for="<?php echo $data['cl_login_form_border_color']; ?>">login form border color:</label> 
            </th>
            <td>
                <input class="color {hash:true,required:false,adjust:false}" id="<?php echo $data['cl_login_form_border_color']; ?>" name="<?php echo $data['cl_login_form_border_color']; ?>" value="<?php echo $val['cl_login_form_border_color']; ?>" size="10" maxlength="21" /> <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Use HEX color <strong>with</strong> &ldquo;#&rdquo; or RGB/A format.<br />
				Example: &sup1;<code>#121212</code> &sup2;<code>rgba(255,255,255,0.4)</code></span>
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
                <input class="color {hash:true,required:false,adjust:false}" id="<?php echo $data['cl_login_form_box_shadow_4']; ?>" name="<?php echo $data['cl_login_form_box_shadow_4']; ?>" value="<?php echo $val['cl_login_form_box_shadow_4']; ?>" size="10" maxlength="21" /> <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Choose your box shadow settings, i.e. <code>5px 5px 18px #464646</code> <em>example code - <code>offset, offset, blur, color</code></em></span>
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
                <input class="color {hash:true,required:false,adjust:false}" id="<?php echo $data['cl_label_color']; ?>" name="<?php echo $data['cl_label_color']; ?>" value="<?php echo $val['cl_label_color']; ?>" size="10" maxlength="21" /> <a class="question" title="Help &amp; Examples">[?]</a><br />
                <span class="hide">Use HEX color <strong>with</strong> &ldquo;#&rdquo; or RGB/A format.<br />
				Example: &sup1;<code>#121212</code> &sup2;<code>rgba(255,255,255,0.4)</code></span>
            </td>
   		</tr>
    </table>

</div>
</div>


</div> <!-- /float:left -->

<br style="clear:both;" />
