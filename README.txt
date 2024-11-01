=== Plugin Name ===
Contributors: Aryan Duntley, dunar21
Plugin Name: WP Moo Tree
Donate link: http://aryanduntley.com/plugins/wp-moo-tree
Plugin URI: http://wordpress.org/extend/plugins/wp-moo-tree/
Author URI: http://aryanduntley.com/wp-moo-tree
Tags: genealogy, file tree, family tree, tree, hierarchy, hierarchy tree, files, family, families, folders, folder list, file list, list, family list, 
Requires at least: 3.0.1
Tested up to: 4.9
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Displays a hierarchial tree, similar to widows explorer folder tree.  Can be used as a geneological tree , a file tree, you decide. 

== Description ==

This plugin utilizes mootools, mootree and milkbox javascript libraries to transform a cutom hierarchical post type into a branched tree.  The tree is toggleable as a whole or by element considering the element has children.

The following are some of the configurable options: 

* Initially display the tree as open.
* Initially display any elements as open.
* Choose whether to display connecting lines.
* Choose to display a unique icon for elements with no children.
* Choose whether to display expand/contract buttons top, bottom, both, none.
* Change the "theme" of you icons.  There are two default themes, you can create your own.
* Change the behavior of the tree by editing the javascript (text editor with default script located in post category page). The default behavior is to display a lightbox containing the featured image if it exists.  
* Create as many different trees as you want by simply assinging them to a new category.
* If you would like the branch to link to a url, you have a field for that (note: the javascript would need to be changed).
* Create a css id for each specific element.  This can then be styled in any included .css file.
* Define the color of text for any specific element.
* Define a unique icon (both for the branch closed and branch open states) for any specific element.
* Assign miscellaneous text for each specific element.  This can be used for whatever purpose you choose, but was placed as an option in order for a user to define for each element a json, url or similar style name/value pair string to be accessed via the javascript methods available in the editor.
* Set a featured image for each individual element.  The default behavior is to display this image in a lightbox when the element is clicked.


Plugin site: [Aryan Duntley](http://aryanduntley.com/wp-moo-tree "Aryan Duntley Web Dev")
Example in use: [CGJJAcademy](http://clarkgracie.com/family-tree/ "Clark Gracie San Diego Jiu Jitsu Academy")

Tools used:

* [MooTools](http://mootools.net/ "Mootools") by [see them here](http://mootools.net/developers "mootools developers").
* [MooTree](https://sites.google.com/a/mindplay.dk/mootree/Home "Mootree mootools plugin") by Rasmus Schultz with contributions by Ian Ring.
* [MilkBox](http://reghellin.com/milkbox/ "Milkbox mootools plugin") by Luca Reghellin.

Donations welcome.  If you find this plugin useful and would maybe like to request more features or hope for future updates and optimizations, please help me eat!  I find it takes a lot of pizza to code, something about thinking and calories...

== Installation ==

1. Upload `wp-moo-tree.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use the shortcode [moo_tree category="{ASSIGNED_CATEGORY_SLUG}"] where {ASSIGNED_CATEGORY_SLUG} is replaced with a category slug name.  This category slug can be found after you have created a category.  It will be displayed in the "Tree Categories" page.  That page will list 4 attributes of the category: Name, Description, **Slug**, Branches.

== Frequently Asked Questions ==

Since this is the first release, there are no frequently asked questions.  Ask away and this page could be filled up!  Donations motivate responses...

One quirk...  
Q: The Caption and Description for my featured image does not display.

A: Go to your Media page, select the image and click "edit".  Put your Caption and Description in the sections there (you may notice that those fields are empty despite your having set them in the post).  Remember HTML is accepted in both of those sections.

== Screenshots ==

1. This is the default look and feel of the plugin (on the left).  Visit [CGJJAcademy](http://clarkgracie.com/family-tree/ "Clark Gracie San Diego Jiu Jitsu Academy") to see it in action.
2. Add new post page for custom post type Branch.
3. Edit Category page.  Each category will represent a new instance of the tree allowing for as many trees as you may need.

== Changelog ==
= 1.1.0 =
* Bug fix; Multiple categories were displayed when only one expected.
= 1.0.5 =
* minor bug fix; when creating new category, fields would not save, had to be edited after creation.
= 1.0.1 =
* added needed instruction regarding csv file requirements and encoding
= 1.0.0 =
* Initial version.

