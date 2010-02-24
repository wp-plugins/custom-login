=== Custom Login ===
Contributors: austyfrosty
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7431290
Tags: admin, branding, customization, custom login, login, logo, error, login error
Requires at least: 2.5
Tested up to: 3.0
Stable tag: trunk


== Description ==

A simple way to customize your WordPress login screen!
Use the built in and easy to use settings page to do the work for you. Theres no need to understand CSS at all!
And now featureing a HTML &amp; CSS box for advanced users (get crazy customized)!

1. Allow your login screen design to be visable if you change up your theme.
2. Works great for CMS installs and for clients.
3. Comes with a Photoshop template included in the library files.
3. Read more about the [Custom Login Plugin](http://austinpassy.com/wordpress-plugins/custom-login/).

See a few *live working* examples (from my sites):

1. [WordCampLA login](http://wordcamp.la/wp-login.php?action=login)

2. [WPCult login](http://wpcult.com/wp-login.php?action=login)

3. [Austin Passy login](http://austinpassy.com/wp-login.php?action=login)

**For those looking to showoff your login screen. Check out the newly created [Flickr group](http://flickr.com/groups/custom-login/)! Share you designs with the community!**

== Installation ==

Follow the steps below to install the plugin.

1. Upload the `custom-login` directory to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to Settings/custom-login to edit your settings.


== Frequently Asked Questions ==

= Why create this plugin? =
I created this plugin to allow for custom login of any WordPress login screen. See working example at: [WordCamp.LA](http://wordcamp.la/wp-login.php?action=login).

= Where can I upload and share my cool login screen? =
Check out the newly created [Flickr group](http://flickr.com/groups/custom-login/)! Upload and add it to our pool!

= I don't like the default login =
Well you should check the first box `Use your own CSS` and customize your login screen!

= I think i want to uninstall but... =
Be sure to click the uninstall script that you **manually** add a value to `define( 'UNINSTALL_CUSTOMLOGIN', '' )` on line 29. That means `1` or like this: `define( 'UNINSTALL_CUSTOMLOGIN', '1' )`. After that run the script and all options should be uninstalled.

== Screenshots ==

Screenshots of working example in our [Flickr group](http://flickr.com/groups/custom-login/)

1. Custom Login Settings page (as of v 0.4.7).

2. Example of a custom login page.

== Changelog ==

**Version 0.6.1**

* Turned off the animated Autoresizer for expanding textareas, as it was buggy.

**Version 0.6**

* Addded custom javascript error animation *turned on by default*
* Cleaned up settings page

**Version 0.5.2**

* Added dashboard widget.
* Moved preview link higher.
* Bug fix.

**Version 0.5.1**

* Changes a function name.
* Max character fix in `border-top-color`.

**Version 0.5**

* **NEW** Javascript color picker [jscolor](http://jscolor.com)
* **NEW** New field allows for colorization of the *body* `border-top` color
* More options added
* Cleaned up code
* Testing new inline ad feature from [wpAds](http://bit.ly/wpadsnet) *Please leave [feedback/comments](http://austinpassy.com/2010/02/custom-login-version-0-5/) on this feature*

**Version 0.4.8**

* Thickbox preview link :) *Let me know if you like the placement of it [in these comments](http://austinpassy.com/2010/02/custom-login-version-0-4-8/)*

**Version 0.4.7**

* Added ability to use RGB/A colors to all color selectors. Max characters is now `21` instead of `7`
* Cleaned up options page.
* Added expanding textarea's for better coding space.
* Allow for expanding help section per item basses.
* Added an uninstaller (remove options from the database) *use the uninstall.php script*
* **NEW** default style.

**Version 0.4.6.1**

* CSS Bug.

**Version 0.4.6**

* Added custom html coded box. Will only be in use if the box is checked.
* New html box used jQuery to write to the page.

**Version 0.4.5**

* Removed: #dock scroller (position fixed)
* Added collapsing/expanding boxes on left to allow for visibility of color wheel.

**Version 0.4.4.1**

* Error: Missed a period, caused fatal error.
* Noticed issue with color picker error, try to reload page while I troubleshoot.
* Fixed missing `div` tag on settings page.
* Added two screenshots, one of settings page, one example.

**Version 0.4.4**

* Added custom field box to add in your own CSS
* Added in new toggle (hide the color box when you click on the `h3` title so as not to interfere when it auto scrolls)  

**Version 0.4.3**

* Bug: When first installed, color fields need the `#` before the HEX numbers shows.

**Version 0.4.2**

* Added an additional save button under the scrolling window dock when the window height is causing the window to jump.

**Version 0.4.1.1**

* Bug fix: `Dock` is in the wrong div

**Version 0.4.1**

* Added a `position:fixed` style to the color picker if the window scrolls below the view of the *Color picker*

**Version 0.4**

* Added jQuery javascript color picker
* Remeber to use the new color selections with **#** before the six `hex` keys!

**Version 0.3.3**

* Added ability to have transparent background image for `html`
* Added `html > background-repeat`

**Version 0.3.2.1**

* Style: "Addded css style to `Delete/Reset` button"

**Version 0.3.2**

* Bug: "if login form background color was empty, image wouldn't show"

**Version 0.3.1**

* Bug: "login form backgound url" overwrote "login form backgound color"
* Auto install into double directory

**Version 0.3**

* Admin panel added
* Additional CSS / user options
* Custom login
* WordPress 2.9 ready

**Version 0.2**

* 2.7 CSS update.
* readme.txt link updated.

**Version 0.1**

* Initial release.

