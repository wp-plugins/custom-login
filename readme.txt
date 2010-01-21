=== Custom Login ===
Contributors: austyfrosty
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7431290
Tags: login, custom login, logo, admin
Requires at least: 2.5
Tested up to: 2.9
Stable tag: trunk


== Description ==

A simple way to customize your login screen (located at `wp-login.php?action=login`). 
Use the built in settings to do the work for you, no need to understand CSS at all!

* Find out more about the [Custom Login Plugin](http://wpcult.com/custom-login-plugin/).

See some working examples:

1.[Austin Passy login](http://austinpassy.com/wp-login.php?action=login)

2.[WordCampLA login](http://wordcamp.la/wp-login.php?action=login)

3.[WPCult login](http://wpcult.com/wp-login.php?action=login)


== Installation ==

Follow the steps below to install the plugin.

1. Upload the `custom-login` directory to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to Settings/custom-login to edit your settings.


== Frequently Asked Questions ==

= Why create this plugin? =
I created this plugin to allow for custom login of any WordPress login screen. See working example at: [WPCult.com](http://wpcult.com/wp-login.php?action=login).


== Screenshots ==

1. Custom Login Settings page.

2. Example of custom login page.

== Changelog ==

**Version 0.4.4.1**

* Error: Missed a period, caused fatal error.
* Noticed issue with color picker error, try to reload page while I troubleshoot.
* Fixed missing `div` tag on settings page.

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

