=== bbPress Info Widgets ===
Contributors: MotleyFool
Tags: bbpress, info widget, stats widget, bbpress widget, motley fool, fool
Requires at least: 3.8.0
Tested up to: 3.9.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Three widgets to display info about your bbPress forums, recent topics, and topic user is viewing.

== Description ==

These three widgets grab basic information from your bbPress installation. The three widgets will:

* Display a list of forums
* Display recent topics (order by number of replies, most recent replies, and recently created topics)
* Display number of participants in a topic and the number of posts in a topic

These widgets come **without any CSS styling**, so you will need to adjust the styling yourself. You can find the HTML for the widgets in the /FoolWidgets/views/ folder. All widget files are titled *-widget.php. 

== Installation ==

= This plugin requires bbPress to be installed before activation! = 

Here is how to install bbPress Info Widgets

1. Unzip fool-wp-bbpress-widgets.zip
2. Upload entire fool-wp-bbpress-widgets folder into `/wp-content/plugins/` folder
3. Activate the plugin in the 'Plugins' menu
4. Widgets should now appear under 'Appearance' -> 'Widgets'

The widgets are now available!

== Frequently Asked Questions == 

= Can I customize the titles of the widgets? =
Yes. After placing the widgets, you will be able to edit titles for each of the widgets.

= Can I select which forums to display in the widgets? =
Yes. You will need to know the forum ID for the forums you want to display.

= Are the widget styles customizable? = 
Absolutely! You will find the HTML files for each widget in the `/FoolWidgets/views/` folder. Each widget file is named *-widget.php where * is the name of the widget. Simply add some CSS to the file (or attach CSS classes) and reupload the `/FoolWidgets/views/` folder. 

== Screenshots ==

1. Topic Info widget displaying information about the topic being viewed. Custom CSS has been applied.
2. Forums Info widget (top) showing all forums with the number of topics and posts. Recent Topics widget (bottom) displays the most recent topics or the most popular topics. Custom CSS has been applied.

== Changelog ==

= 1.0.0 = 
* Initial release

== Upgrade Notice ==
