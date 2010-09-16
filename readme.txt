=== Custom Login ===
Contributors: austyfrosty
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7431290
Tags: admin, branding, customization, custom login, login, logo, error, login error
Requires at least: 2.5
Tested up to: 3.1
Stable tag: 0.7.2

Use this plugin to customize your login screen, great for client sites!

== Description ==

Visit the plugin page: [http://austinpassy.com//wordpress-plugins/custom-login](http://austinpassy.com//wordpress-plugins/custom-login)
Visit my portfolio: [http://austinpassy.com//wordpress-plugins/custom-login](http://austinpassy.com//wordpress-plugins/custom-login)

Activate this plugin and customize your WordPress login screen. Use the built-in and easy to use settings page to do the work for you. Theres no need to understand CSS at all!
Now featureing a HTML &amp; CSS box for advanced users to up the customization!

1. Works great for client site installs.
2. Comes with a Photoshop template included in the library files (default theme).
3. Read more about the [Custom Login Plugin](http://austinpassy.com/wordpress-plugins/custom-login/).

**For those looking to showoff your login screen, check out the [Flickr group](http://flickr.com/groups/custom-login/)! Share you designs with the community!**

== Installation ==

Follow the steps below to install the plugin.

1. Upload the `custom-login` directory to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to Settings/custom-login to edit your settings.
4. **Be sure to *check* active** to remove the *default* login screen.


== Frequently Asked Questions ==

= Why create this plugin? =
I created this plugin to allow for custom login of any WordPress login screen. See working example at: [WordCamp.LA](http://2010.wordcamp.la/wp-login.php?action=login).

= Where can I upload and share my cool login screen? =
Check out the newly created [Flickr group](http://flickr.com/groups/custom-login/)! Upload and add it to our pool!

= I don't like the default login =
Well you should check the first box `Use your own CSS` and customize **your** login screen!

= I think i want to uninstall but =
Just deactive.

== Screenshots ==

Screenshots of working example in our [Flickr group](http://flickr.com/groups/custom-login/)

1. Custom Login Settings page (as of v 0.8).

2. Example of a custom login page.

== Changelog ==

= Version 0.8 =

* Important! Users will have to re-save their settings after updating to version 0.8.
* Completely recoded the plugin from the ground up for a much needed code overhaul.
* Removed unistall script.
* Removed [wpads.net](http://wpads.net).
* Cleaned up options.
* Removed easing.js, farbtastic.js, dock.js
* Removed unused images.
* Added `license.txt`, `readme.html`.

= Version 0.7.2 =

* Fixed bug where plugin isn't allowed to be *deleted*(removed) when using WordPress 3.0+.

= Version 0.7.1 =

* Dashboard widget bug, upgrade mandatory.

= Version 0.7 =

* Updated `array_slice` error
* Added `wp_wb_version` check for WordPress 3+
* Added new option for WordPress 3+, *body background*.
* Added check for version in animated error.
** WP3 now includes the jQuery error
* Now 100% compatible with WordPress 3.x

= Version 0.6.1 =

* Turned off the animated Autoresizer for expanding textareas, as it was buggy.

= Version 0.6 =

* Addded custom javascript error animation *turned on by default*
* Cleaned up settings page

= Version 0.5.2 =

* Added dashboard widget.
* Moved preview link higher.
* Bug fix.

= Version 0.5.1 =

* Changes a function name.
* Max character fix in `border-top-color`.

= Version 0.5 =

* **NEW** Javascript color picker [jscolor](http://jscolor.com)
* **NEW** New field allows for colorization of the *body* `border-top` color
* More options added
* Cleaned up code
* Testing new inline ad feature from [wpAds](http://bit.ly/wpadsnet) *Please leave [feedback/comments](http://austinpassy.com/2010/02/custom-login-version-0-5/) on this feature*

= Version 0.4.8 =

* Thickbox preview link :) *Let me know if you like the placement of it [in these comments](http://austinpassy.com/2010/02/custom-login-version-0-4-8/)*

= Version 0.4.7 =

* Added ability to use RGB/A colors to all color selectors. Max characters is now `21` instead of `7`
* Cleaned up options page.
* Added expanding textarea's for better coding space.
* Allow for expanding help section per item basses.
* Added an uninstaller (remove options from the database) *use the uninstall.php script*
* **NEW** default style.

= Version 0.4.6.1 =

* CSS Bug.

= Version 0.4.6 =

* Added custom html coded box. Will only be in use if the box is checked.
* New html box used jQuery to write to the page.

= Version 0.4.5 =

* Removed: #dock scroller (position fixed)
* Added collapsing/expanding boxes on left to allow for visibility of color wheel.

= Version 0.4.4.1 =

* Error: Missed a period, caused fatal error.
* Noticed issue with color picker error, try to reload page while I troubleshoot.
* Fixed missing `div` tag on settings page.
* Added two screenshots, one of settings page, one example.

= Version 0.4.4 =

* Added custom field box to add in your own CSS
* Added in new toggle (hide the color box when you click on the `h3` title so as not to interfere when it auto scrolls)  

= Version 0.4.3 =

* Bug: When first installed, color fields need the `#` before the HEX numbers shows.

= Version 0.4.2 =

* Added an additional save button under the scrolling window dock when the window height is causing the window to jump.

= Version 0.4.1.1 =

* Bug fix: `Dock` is in the wrong div

= Version 0.4.1 =

* Added a `position:fixed` style to the color picker if the window scrolls below the view of the *Color picker*

= Version 0.4 =

* Added jQuery javascript color picker
* Remeber to use the new color selections with **#** before the six `hex` keys!

= Version 0.3.3 =

* Added ability to have transparent background image for `html`
* Added `html > background-repeat`

= Version 0.3.2.1 =

* Style: "Addded css style to `Delete/Reset` button"

= Version 0.3.2 =

* Bug: "if login form background color was empty, image wouldn't show"

= Version 0.3.1 =

* Bug: "login form backgound url" overwrote "login form backgound color"
* Auto install into double directory

= Version 0.3 =

* Admin panel added
* Additional CSS / user options
* Custom login
* WordPress 2.9 ready

= Version 0.2 =

* 2.7 CSS update.
* readme.txt link updated.

= Version 0.1 =

* Initial release.


== Upgrade Notice ==

= 0.8 =
Complete rewrite, you will have to re-save your settings!

= 0.7.2 =
Uninstall script no longer valid for WordPress 3.0+

= 0.7.1 =
Compatiblity issue with my other plugin [@Anywhere](http://austinpassy.com/anywhere-plugin) fixed.