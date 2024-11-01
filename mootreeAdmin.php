<?php
function mootree_adminpage(){
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
?>
<script>
jQuery(document).ready(function() {	
	jQuery('#sectos').children().filter('div').not('#sectos-1').hide();
	var curdiv = "#sectos-1";
	jQuery("ul.tabos > li").click(function(event) {
	event.preventDefault();
	var toshow = jQuery(this).find('a').attr('href');
	jQuery(curdiv).hide("slow");
	curdiv = toshow;
	jQuery(toshow).show("slow");
	//event.stopPropagation();
	
	});
});
</script>
<div class="wrap" style="font-size: 15px;">

<div style="background:#A1E5F4; padding:10px 5px 0px 15px; height:150px;">
<h1><?php  _e('WP Moo Tree Instructions', 'mootree_admini'); ?></h1>

<h2 style="float:left"><?php _e('If you find this plugin useful, please donate', 'mootree_admini'); ?></h2>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="float:left; padding-left:20px;">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="cpp_header_image" value="http://aryanduntley.com/donatemy.png">
	<input type="hidden" name="page_style" value="paypal">
	<input type="hidden" name="cpp_logo_image" value="http://aryanduntley.com/donatemy.png">
	<input type="hidden" name="cpp_payflow_color" value="#FAFAFA">
	<input type="hidden" name="cn" value="Feel free to add any notes or comments about the plugin!">
	<input type="hidden" name="cpp_headerback_color" value="#F0F0F0" >
	<input type="hidden" name="hosted_button_id" value="ZXSGVRM9DWEUY">
	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<span style="font-weigh:900;font-size:18px;float:left;width:100%">created by: <a href="http://aryanduntley.com" target="_blank" title="Aryan Duntley Web Dev" >Aryan Duntley</a></span>
</div>
<hr/>
<div style="clear:both; width: 100%; border-bottom:1px solid #E4E4E4;height:30px;margin-bottom:20px;"></div>

<div style="background: #FCFDFF; padding: 10px;">
<h3>To use this plugin:</h3>
<ul style="list-style-type: disc;list-style-position: inside;">
<li>Create a new Branch Category.</li>
<li>Create some Branch posts.</li>
<li>Use the shortcode <code style='color:red'>[moo_tree category="{ASSIGNED_CATEGORY_SLUG}"]</code> wherever you want it to live.  To use multiple trees, simply create multiple categories and make sure you assign each Branch post to the correct category.</li>
</ul>
<br/>
<p>
In order to begin utilizing a tree, you must first create a category (if not you could always go back and assign any "Branch" posts you have created to a category).  Until you have a category to reference you cannot use the shortcode because it has a required parameter that must be set to the category slug.
</p>

<p>
The plugin syntax is as follows: <code style='color:red'>[moo_tree category="{ASSIGNED_CATEGORY_SLUG}"]</code> , where <code style='color:red'>{ASSIGNED_CATEGORY_SLUG}</code> is replaced with a category slug name.  This category slug can be found after you have created a category.  It will be displayed in the "Tree Categories" page.  That page will list 4 attributes of the category: Name, Description, <strong style="color:red;" >Slug</strong>, Branches.  The slug can also be edited when editing a category and created when creating a category.  Wordpress will automatically generate the slug based on the title of the category if one is not defined when creating the new category.
</p>
</div>
<hr/>
<br/>

<div id="sectos">
<p>
Inside of the category page, you will find a series of option that relate to the entire tree as opposed to a particular Branch post/element:
</p>
<ul class="tabos" style="display:block;padding-left:25px;padding-bottom:0px !important;margin-bottom: 0px !important;">
		<li class="sectos-1" style="float:left; margin-left:5px; background: #B6B6B6; height: 20px; padding: 5px 5px 10px 5px;-webkit-border-radius: 10px 10px 0px 0px;-moz-border-radius: 10px 10px 0px 0px; border-radius: 10px 10px 0px 0px;margin-bottom: 0px !important; padding-bottom: 0px !important;width:80px;text-align:center;" ><a href="#sectos-1" style="text-decoration:none; color: #000; font-weight: 300; font-size: 12px;" >Categories</a></li>
		<li class="sectos-2" style="float:left; margin-left:5px; background: #B6B6B6; height: 20px; padding: 5px 5px 10px 5px;-webkit-border-radius: 10px 10px 0px 0px;-moz-border-radius: 10px 10px 0px 0px; border-radius: 10px 10px 0px 0px;margin-bottom: 0px !important; padding-bottom: 0px !important;width:80px;text-align:center;" ><a href="#sectos-2" style="text-decoration:none;color: #000; font-weight: 300; font-size: 12px;" >"Branches"</a></li>
		<li class="sectos-3" style="float:left; margin-left:5px; background: #B6B6B6; height: 20px; padding: 5px 5px 10px 5px;-webkit-border-radius: 10px 10px 0px 0px;-moz-border-radius: 10px 10px 0px 0px; border-radius: 10px 10px 0px 0px;margin-bottom: 0px !important; padding-bottom: 0px !important;width:80px;text-align:center;" ><a href="#sectos-3" style="text-decoration:none;color: #000; font-weight: 300; font-size: 12px;" >Miscellaneous</a></li>
	</ul>

<div id="sectos-1" style="float:left; width:80%; background: #F9F9FF;border-radius: 15px;-moz-border-radius: 15px;-webkit-border-radius: 15px; -webkit-box-shadow: 2px 2px 2px 2px ;box-shadow: 2px 2px 2px 2px;-moz-box-shadow:2px 2px 2px 2px; padding-top:0px !important; margin-top:0px !important;">
<ul style="list-style-position: inside;list-style-image: url('<?php echo plugins_url( 'imgs/sqorange.gif', __FILE__ ); ?>'); padding: 10px; text-align:justify; text-justify: newspaper;" >
<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Name:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The name of the category.  This name <i>WILL</i> be displayed on the tree.  It will be the very beginning of the tree, the first element.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Slug:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The slug (what will be inside of the url bar), which you can leave alone and let wordpress do it's thing.  This will be used in your shortcode as well, to reference the tree branches associated with this category.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Display tree as initially open:</span>&nbsp;&nbsp; Set to true if you want the tree itself to begin open, false if you want it closed to start.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Display lined grid:</span>&nbsp;&nbsp; Decide whether or not you want the lines that connect the different elements of the tree.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Display... as folders, or ending... as files:</span>&nbsp;&nbsp; You can choose to set a different, unique icon for branches that have no children.  So, if you were using folders, you could set the files in the folders to have a file icon instead of a folder icon.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Place expand/contract buttons:</span>&nbsp;&nbsp; You may place the two buttons at the top or bottom of your tree, place them top and bottom or don't have them at all.  As of this release, I will not include the option to change the image of the buttons. (I ran out of pizza).</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Change icons/theme:</span>&nbsp;&nbsp; <a href="<?php echo plugins_url( 'imgs/mootree.gif', __FILE__ ); ?>">This</a> is the default folder icon set.  The easiest way to change the theme of your tree is to save this image, open it in your photo editor and change the various icons to whatever you want.  Then you can save the file, upload it into your wordpress media, copy the url and place that url in this section.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Customize javascript:</span>&nbsp;&nbsp; Here you can customize how the tree reacts.  Currently the default functionality is set to display the featured image in a lightbox (if it exists) with the caption and description below the image.  For the javascripters out there, I have placed an editable textarea where javascript can be place to adjust the actions.  The docs for the mootree.js are <a href="<?php echo plugins_url( 'docs/files/mootree-js.html', __FILE__ ); ?>">here.</a> The whole of the javascript is as follows: <br/>
<p style="background: #EAEAEA" ><code>
var tree; window.onload = function() {tree = new MooTreeControl({div: "thetree", mode: "' . $treemode . '",theme: "' . $themewant . '", grid: ' . $wantgrid . ',' . <span style="font-weight:600;color:red;">$custscript </span>. '},{text: "' . $taxonomy_term->name . '",open: ' . $beginopen . ' }); tree.adopt("thefam"); return false }
</code></p><br/>

The <code>$custscript</code> variable is where the javascript is placed.  The node actions most relevant to this part of the code are <a href="<?php echo plugins_url( 'docs/files/mootree-js.html#MooTreeNode', __FILE__ ); ?>">here</a>.  The current code:<br/>

<p style="background: #EAEAEA" ><code>
onSelect: function(node, state) {if (state){if( typeof(node.data.url) ==  "string" && node.data.url != "" ) {milkbox.openWithFile({ href:node.data.url,title:node.linkcaption + " : " + node.linkdesc, size:"width:600,height:350"}, {overlayOpacity:1, resizeTransition:"bounce:out", centered:true});}}}
</code></p>
</li>
</ul>
</div><!-- END 1 -->

<div id="sectos-2" style="float:left; width:80%; background: #F9F9FF;border-radius: 15px;-moz-border-radius: 15px;-webkit-border-radius: 15px; -webkit-box-shadow: 2px 2px 2px 2px ;box-shadow: 2px 2px 2px 2px ;-moz-box-shadow:2px 2px 2px 2px;padding-top:0px !important; margin-top:0px !important;">
<ul style="list-style-position: inside;list-style-image: url('<?php echo plugins_url( 'imgs/sqorange.gif', __FILE__ ); ?>'); padding: 10px; text-align:justify; text-justify: newspaper;" >
<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Name:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The name of the element.  A family member's name, a folder name, a file name with an extension, whatever.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Category:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Make sure you assign a category to each branch.  It will not be displayed otherwise.  The category was put there so you could have multiple trees.  Simply assign a new category for every tree you wish to have, then use the category slug in your short code to differentiate.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Featured Image:</span>&nbsp;&nbsp; If you wish the lightbox to display a featured image, set one here.  When you set a featured image, the Caption and the Description are both fields that will effect your post.  The Caption/Description will be displayed as below the image separated by a colon(my caption : my description).</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">The URL:</span>&nbsp;&nbsp; Here you can assign a separate url to the branch post.  This url will do nothing by default.  In order to access this option, you would need to change the javascript in the javascript editor, located in the Tree Category page.  Access the category you are editing, adjust the javascript to behave in whatever manner you wish and access the url with <code style="color:red">node.data.url</code>.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Branch ID:</span>&nbsp;&nbsp; This will specify a unique css identifier for that specific branch element.  Use this to style the div containing that element.  This option can be accessed in the javascript by way of <code style="color:red">node.id</code>.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Branch Color:</span>&nbsp;&nbsp; This is a quick way to control the color of the text for each node.  Enter a six digit html hexadecimal number.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Branch Open:</span>&nbsp;&nbsp; Decide whether you want this branch to be opened when the page first loads.  The default is false (or no), meaning that it will be closed.</li>

<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Branch Icon:</span>&nbsp;&nbsp; Here you can choose a unique icon, separate from the chosen style.  Create an <span style="color:red; font-weight: 700;">18 x 18</span> pixel image and specify the url here.  It would be easiest to upload the image through the wordpress media post type, then copy and paste the url.  Additionally, if you have an icon set as described in the category section/tab above, you may specify an icon within the set by placing the url followed by the pound the sign and the sequence number the icon is in.  For example, say you had an icon set of 7 icons in a row and you wanted to use the fourth icon in the row.  If the url was blablabla.com/img.gif, you would enter the url like so:  http://blablabla.com/img.gif#4.</li>
<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Branch OpenIcon:</span>&nbsp;&nbsp; Follow the same rules as above for this field.  It's purpose is to display a different icon if the branch is selected and open, displaying children.</li>
<li style="padding-top: 10px;" ><span style="font-weight:600;color:blue;">Branch Miscellaneous:</span>&nbsp;&nbsp; This field will be of no use to most people.  It will probably be best suited for developers who are using the plugin and want to customize it for their client.  My suggestion on how to use this field is to assing a name value pair sequence, probably in the form of (foo=bar;foo2=baz;foo3=wtf).  There is no need to use any quotation marks in this field.  The information is located in an html comment block and accessed through the javascript.  A good way of parsing this data is by first accessing it with <code style="color:red">node.misc</code> and then using a split method to expand the string into an array specifying the delimeter used when creating the string.  For the example above it was ";", so: <code style="color:red">var x = node.misc.split(';'); var first_pair = x[0].split('='); var name = first_pair[0]; var val = first_pair[1];</code>.</li>
</ul>
</div><!-- END 2 -->

<div id="sectos-3" style="float:left; width:80%; background: #F9F9FF;border-radius: 15px;-moz-border-radius: 15px;-webkit-border-radius: 15px; -webkit-box-shadow: 2px 2px 2px 2px ;box-shadow: 2px 2px 2px 2px ;-moz-box-shadow:2px 2px 2px 2px;padding-top:0px !important; margin-top:0px !important;">
<ul style="list-style-position: inside; padding: 10px; text-align:justify; text-justify: newspaper;" >
<li>
<p>
Attributes accessible via javascript and customizable via the post or category:  
<code style="color:red">node.data.url ____ node.id ____ node.misc ____ node.caption ____ node.description</code>
</p>
<p>
Please visit the plugin site, log in (or create an account), and rate me 5 stars if this plugin is just what you have been looking for. And if you think it works, give me a thumbs up click on the it works button so others who view will be able to better decide.
</p>
<br/>
Considering I have pizza, more to come.  Of course, without donations, I have no pizza... Enjoy the plugin!
</p>			
</li>	
</ul>
</div><!-- END 3 -->

</div><!-- END SECTOS -->

<div style="clear:both"></div>
</div><!-- END Wrap -->
<?php
}
?>