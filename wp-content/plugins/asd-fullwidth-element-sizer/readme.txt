=== ASD Fullwidth Element Sizer ===
Contributors: michaelfahey
Tags: full-width, gutenberg, image, cover-image-block
Requires PHP: 5.6
Requires at least: 3.6
Tested up to: 5.0.3
Stable tag: 2.201902051
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Plugin URI:  https://artisansitedesigns.com/plugins/asd-fullwidth-element-sizer/
Author URI:  https://artisansitedesigns.com/staff/michael-h-fahey/
Donate link: https://paypal.me/artisanmichaelfahey

=== Description ===
The easy solution for making images or other HTML elements full window width!
Makes your Gutenberg Cover Image blocks ACTUALLY full window width!

Just apply the CSS class "fullwidth-element" to your existing HTML tags or Gutenberg Cover Image.
EXAMPLE:
<div class="my-class fullwidth-element">
or
<img src="my-image.jpg" class="fullwidth-element" />

Or, In your Gutenberg page, select the Cover Image block, and edit the Advanced settings, set Additional CSS Class to "fullwidth-element" and your Cover Image now does what you always expected it to.

How it works: In the browser, window width and element size are calculated, and CSS "width" and "margin" values are applied to cause them to occupy the full width of the broswer window, no matter the size of the parent container. This process is applied to any HTML element which has the class "fullwidth-element".

FullWidth Element Sizer also sets a timer in the browser to watch for the window width to change, and will recalculate and re-apply full width values if it does.

== Screenshots ==
1. Without ASD Fullwidth Element Sizer
2. With ASD Fullwidth Element Sizer

== Installation ==

= Manual installation =
At a command prompt or using a file manager, unzip the .ZIP file in the WordPress plugins directory, usually ~/public_html/wp-content/plugins . In the In the WordPress admin Dashboard (usually http://yoursite.foo/wp-admin ) click Plugins, scroll to ASD Fullwidth Element Sizer, and click "activate".

= Upload in Dashboard =
Download the ZIP file to your workstation.  In the WordPress admin Dashboard (usually http://yoursite.foo/wp-admin ) Select Plugins, Add New, click Upload Plugin, Choose File and navigate to the downloaded ZIP file. After that, click Install Now, and when the installer finishes, click Activate Plugin.

== Frequently Asked Questions ==

Q: Why is my element still not full width?
A: The usual reason is that the max-width attribute or an inline width attribute is being applied by existing CSS or inline HTML. These attributes can be readily found using the Inspector tools in Firefox and Chrome.

== Changelog ==
= 2.201902051 2019-02-05 =
bugfix: global $asd_fullwidth_element_sizer_version, for correct scope

= 2.201901281 2019-01-28 =
Submodule update, updated codesniffer audit.

= 2.201812101 2018-12-10 =
Now utilizing submodule framework.

= 2.201808261 2018-08-26 =
First release candidate.

== Upgrade Notice ==
= 2.201901281 2019-01-28 =

= 2.201808261 2018-08-26 =
Beta versions of ASD Fullwidth Element Sizer used the class "full-width", sites which used the beta will need to replace this class with "fullwidth-element" (which I will do personally - michaelfahey)
