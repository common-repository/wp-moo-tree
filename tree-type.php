<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// Custom Post Type - WP Mootree

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// Register Post Type
function create_tree() {
	register_post_type('mootree',
		array (
			'label' => __('Branches', 'mt'),
			'singular_label' => __('Branch', 'mt'),
			'labels' => array(
				'label' => __('Branches', 'mt'),
				'singular_label' => __('Branch', 'mt'),
				'all_items' => __('All Branches', 'mt'),
				'add_new' => __('Add New Branch', 'mt'),
				'add_new_item' => __('Add New Branch', 'mt'),
				'edit' => __('Edit Branches', 'mt'),
				'edit_item' => __('Edit Branch', 'mt'),
				'new_item' => __('New Branch', 'mt'),
				'view' => __('View Branches', 'mt'),
				'view_item' => __('View Branch', 'mt'),
				'search_items' => __('Search Branches', 'mt'),
				'not_found' => __('Branch Not Found', 'mt'),
				'not_found_in_trash' => __('Branch Not Found in Trash', 'mt'),
				'parent_item_colon' => __('Parent', 'mt'),
				'parent' => __( 'Branch', 'mt' ),
			),
			'public' => true,
			'show_in_nav_menus' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'rewrite' => true,
			'query_var' => true,
			'exclude_from_search' => true,
			'menu_position' => 23,
			'supports' => array('title', 'thumbnail', 'page-attributes')
			)
	);
}
add_action('init', 'create_tree');
// END // Register Post Type


// Register Taxonomy
function create_tree_taxonomy() {
	register_taxonomy(
		'tree-categories',
		'mootree',
		array(
			'labels' => array(
				'name' => __('Tree Categories', 'mt'),
				'singular_name' => __('Tree Category', 'mt'),
				'search_items' => __('Search Tree Category', 'mt'),
				'popular_items' => __('Popular Tree Categories', 'mt'),
				'all_items' => __('All Tree Categories', 'mt'),
				'parent_item' => __('Parent Tree Category', 'mt'),
				'parent_item_colon' => __('Parent Tree Category:', 'mt'),
				'edit_item' => __('Edit Tree Category', 'mt'),
				'update_item' => __('Update Tree Category', 'mt'),
				'add_new_item' => __('Add New Tree Category', 'mt'),
				'new_item_name' => __('New Tree Category Name', 'mt')
			),
		'hierarchical' => true,
		'rewrite' => true,
		'label' => __('Tree Categories', 'mt'),
		'has_archive' => true,
		)
	);
	//flush_rewrite_rules();
}
add_action('init', 'create_tree_taxonomy');
// END // Register Taxonomy


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// Meta Boxes

// - - - - - - - - - - - - - - - - - - - - - - -

// Metabox Fields
$name_short =  "mt";
$branch_metabox = array(
	'id' => 'mt_branch_metabox',
	'title' => __('Branch Options', 'mt'),
	'page' => 'mootree',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(  
			"name" => __('The URL', 'mt'),
			"desc" => __('Insert the URL you wish to link to if you do not want this to open the featured image.  If there is no featured image and no url, this field will do nothing.', 'mt'),
			"id" => $name_short."_branch_link",
			"std" => "",
			"type" => "text"
		),
		array(  
			"name" => __('Branch ID', 'mt'),
			"desc" => __('If specified, must be a unique branch/node identifier. This ID can be used to style the resulting div associated with this particular branch element.  This ID can be accessed by way of javascript to control this specific branch element.  Use: node.control.index[{THIS_ID}] to access a specific element via ID, or node.id to access the ID value. Gennarally, unless you plan to customize the actions utilizing the javascript field in the category page for this post-type, you will not alter this field.', 'mt'),
			"id" => $name_short."_branch_id",
			"std" => "",
			"type" => "text"
		),
		array(  
			"name" => __('Branch Color', 'mt'),
			"desc" => __('If specified, must be a six-digit hexadecimal RGB color code.  This will change the color of the text for this branch.', 'mt'),
			"id" => $name_short."_branch_color",
			"std" => "",
			"type" => "text"
		),
		array(  
			"name" => __('Branch Open', 'mt'),
			"desc" => __('This is set to No by default.  This defines whether you want the branch to be open(Yes) or closed(No) when the page opens.  Set to Yes or No.', 'mt'),
			"id" => $name_short."_branch_open",
			"std" => "",
			"type" => "radio"
		),
		array(  
			"name" => __('Branch Icon', 'mt'),
			"desc" => __('Use this to customize the icon of the branch/node. The following predefined values may be used: _open, _closed and _doc. Alternatively, specify the URL of a GIF or PNG image to use - this should be exactly 18x18 pixels in size. If you have a strip of images, you can specify an image number (e.g. my_icons.gif#4 for icon number 4).', 'mt'),
			"id" => $name_short."_branch_icon",
			"std" => "",
			"type" => "text"
		),
		array(  
			"name" => __('Branch OpenIcon', 'mt'),
			"desc" => __('Use this to change/switch the icon of the branch/node when it is open.', 'mt'),
			"id" => $name_short."_branch_openicon",
			"std" => "",
			"type" => "text"
		),
		array(  
			"name" => __('Branch Miscellaneous', 'mt'),
			"desc" => __('This area is for miscellanous data or text.  It is accessed by use of node.misc in the custom javascript located in the Branch Category section. Utilizing json style or name-value style structuring of this section could provide you with any excess information you may want to have access to.', 'mt'),
			"id" => $name_short."_branch_miscellaneous",
			"std" => "",
			"type" => "textarea"
		)
	)
);
// END // Metabox Fields
// - - - - - - - - - - - - - - - - - - - - - - -

// Add Metabox
function add_branch_metabox(){
	global $post, $branch_metabox;
	add_meta_box($branch_metabox['id'], $branch_metabox['title'], "init_branch_metabox", $branch_metabox['page'], $branch_metabox['context'], $branch_metabox['priority']);
}
add_action("admin_menu", "add_branch_metabox");
// END // Add Metabox

// - - - - - - - - - - - - - - - - - - - - - - -

// Init Metabox
function init_branch_metabox(){
	global $post, $branch_metabox;
	
	foreach ($branch_metabox['fields'] as $value) {
		$metabox = get_post_meta($post->ID, $value['id'], true);
		switch ($value['type']) {
		
		
			//Radio
			case 'radio':
			if ($metabox == ""){$metabox='false';}
			?>
			<div class="metabox" style="display:block;width:100%;padding:10px;">
            	<div class="radio" style="float:left;width:70%;">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <p class="description"><?php echo $value['desc']; ?></p>
                </div>
                <div style="float:left;width:75%;">
					<div style="float:left;">
					<input type="radio" id="<?php echo $value['id']; ?>" class="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="true" <?php if ($metabox == 'true') echo "checked=1";?>  style="float:left;" /> Yes</div>
					<div style="float:left;padding-left: 10px;">
					<input type="radio" id="<?php echo $value['id']; ?>" class="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="false" <?php if ($metabox == 'false') echo "checked=1";?> style="float:left;" /> No</div><br/>
				</div>
                <br class="clear" />
			</div>
			<?php
			break;
			// Text
			case 'text':	
			?>

			<div class="metabox" style="display:block;width:100%;padding:10px;">
            	<div class="text" style="float:left;width:70%;">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <p class="description"><?php echo $value['desc']; ?></p>
                </div>
                <div style="float:left;width:75%;">
					<input id="<?php echo $value['id']; ?>" class="<?php echo $value['id']; ?>" type="text" size="120" name="<?php echo $value['id']; ?>" value="<?php if ( stripslashes(get_post_meta($post->ID, $value['id'] , true)) != "") { echo stripslashes(get_post_meta($post->ID, $value['id'] , true)); } else { echo $value['std']; } ?>" />
				</div>
                <br class="clear" />
			</div>
            
			<?php
			break;
			
			// Text
			case 'textarea':
			?>

			<div class="metabox" style="display:block;width:100%;padding:10px;">
            	<div class="text" style="float:left;width:70%;">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <p class="description"><?php echo $value['desc']; ?></p>
                </div>
                <div style="float:left;width:75%;">
					<textarea id="<?php echo $value['id']; ?>" class="<?php echo $value['id']; ?>" type="text" name="<?php echo $value['id']; ?>"><?php if ( stripslashes(htmlspecialchars(get_post_meta($post->ID, $value['id'] , true))) != "") { echo stripslashes(htmlspecialchars(get_post_meta($post->ID, $value['id'] , true))); } else { echo $value['std']; } ?></textarea>
				</div>
                <br class="clear" />
			</div>
            
      		<?php
			break;
		
		}
	}
}
// END // Init Metabox

// - - - - - - - - - - - - - - - - - - - - - - -

// Save Metabox
function save_branch_metabox($post_id) {
    global $post;
	$tmst = strip_tags($_POST['mt_branch_miscellaneous']);
	$tmst = preg_replace("'\s+'", ' ', $tmst);
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	if (isset($_POST['mt_branch_link'])) { update_post_meta($post->ID, 'mt_branch_link', trim(strip_tags($_POST['mt_branch_link'])));}
	if (isset($_POST['mt_branch_id'])) { update_post_meta($post->ID, 'mt_branch_id', trim(strip_tags($_POST['mt_branch_id'])));}
	if (isset($_POST['mt_branch_color'])) { update_post_meta($post->ID, 'mt_branch_color', trim(strip_tags($_POST['mt_branch_color'])));}
	if (isset($_POST['mt_branch_open'])) { update_post_meta($post->ID, 'mt_branch_open', trim(strip_tags($_POST['mt_branch_open'])));}
	if (isset($_POST['mt_branch_icon'])) { update_post_meta($post->ID, 'mt_branch_icon', trim(strip_tags($_POST['mt_branch_icon'])));}
	if (isset($_POST['mt_branch_openicon'])) { update_post_meta($post->ID, 'mt_branch_openicon', trim(strip_tags($_POST['mt_branch_openicon'])));}
	if (isset($_POST['mt_branch_miscellaneous'])) { update_post_meta($post->ID, 'mt_branch_miscellaneous', $tmst);}
	//if (isset($_POST['mt_branch_button'])) { update_post_meta($post->ID, 'mt_branch_button', $_POST['mt_branch_button']);}
}
add_action('save_post', 'save_branch_metabox');
// END // Save Metabox

// - - - - - - - - - - - - - - - - - - - - - - -

// END // Meta Boxes

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
/*
// Custom Columns
function edit_columns_branch($columns){
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => __('Branch Title', 'mt'),
		"link" => __('Branch Link', 'mt_branch_link'),
		"author" => __('Author', 'mt'),
		"date" => __('Date', 'mt'),
	);
	return $columns;
}
function inside_branch_columns($column, $post_id){
	$darel = get_post_meta($post_id, 'mt_branch_link', true);
	$torel = '<a href="' . $darel . '" target="_blank">' . $darel . '</a>';
	echo $torel;
}
add_filter("manage_edit-mootree_columns", "edit_columns_branch");
add_action( "manage_mootree_posts_custom_column" , "inside_branch_columns", 10, 2 );
// END // Custom Columns
*/

// - - - - - - -  - - - - - -  - - - - -  - - - - - - - - - - -  - -- -  - - - - - --  -  - --
// Custom Category Taxonomy: tree-categories 



// the option name

add_action('tree-categories_add_form_fields', 'wpmoot_add_meta_stuff');
add_action('tree-categories_edit_form', 'wpmoot_add_meta_stuff');

function wpmoot_add_meta_stuff($tag) {

	if(get_option('mootree_catopts')){
	
    $tag_extra_fields = get_option('mootree_catopts');
	
	$beginopen = $tag_extra_fields[$tag->term_id]['beginopen'];
	if ($beginopen == null || $beginopen == ""){$beginopen = "true";}
	
	$wantgrid = $tag_extra_fields[$tag->term_id]['wantgrid'];
	if ($wantgrid == null || $wantgrid == ""){$wantgrid = "true";}
	
	$treemode = $tag_extra_fields[$tag->term_id]['treemode'];
	if ($treemode == null || $treemode == ""){$treemode = "folders";}
	
	$placebtn = $tag_extra_fields[$tag->term_id]['btnplace'];
	if ($placebtn == null || $placebtn == ""){$placebtn = "bottom";}
	
	$custscript = $tag_extra_fields[$tag->term_id]['jscript'];
	$custscript = html_entity_decode($custscript, ENT_QUOTES);
	
	if ($custscript == null || $custscript == ""){$custscript = 'onSelect: function(node, state) {if (state){if(typeof(node.data.url) ==  "string" && node.data.url != "" ){milkbox.openWithFile({href:node.data.url,title:node.linkcaption + " : ;" + node.linkdesc,size:"width:600,height:350"},{overlayOpacity:1,resizeTransition:"bounce:out",centered:true});}}}';}
	
	$themewant = $tag_extra_fields[$tag->term_id]['themeurl'];
	if ($themewant == null || $themewant == ""){$themewant = "people";}
	}else{
		$beginopen = "true";
		$wantgrid = "true";
		$treemode = "folders";
		$themewant = "people";
		$custscript = 'onSelect: function(node, state) {if (state){if(typeof(node.data.url) ==  "string" && node.data.url != "" ){milkbox.openWithFile({href:node.data.url,title:node.linkcaption + " : " + node.linkdesc,size:"width:600,height:350"},{overlayOpacity:1,resizeTransition:"bounce:out",centered:true});}}}';
		$placebtn = "bottom";
	}
?>
<table class="form-table" style="background: #E4E4E4;">

		<th style="background: #EFEDE7; text-align:center;font-weight: 600;color:#C5C1AA;">MOOTREE OPTIONS FOR CATEGORY</th>
        <tr>		
			<td style="padding: 0px 5px 0px 5px;">Display Tree as Initially Open?</td>
		</tr>
		<tr>
			<td style="padding: 0px 5px 0px 5px;">
			<p class="description" style="width: 95% !important;" >Please indicate Yes or No.</p>
			</td>
		</tr>
		<tr>
			<td>
			<input type="radio" name="dispopen" value="true" <?php if ($beginopen == 'true') echo "checked=1";?> /> Yes
			<input type="radio" name="dispopen" value="false" <?php if ($beginopen == 'false') echo "checked=1";?> /> No
			</td>
		</tr>
		<tr style="border-top:1px dotted #727272;"></tr>
		<tr>		
			<td style="padding: 0px 5px 0px 5px;">Display The Lined Grid?</td>
		</tr>
		<tr>
			<td style="padding: 0px 5px 0px 5px;">
			<p class="description" style="width: 95% !important;" >The dotted lines connecting elements.</p>
			</td>
		</tr>
		<tr>
			<td>
			<input type="radio" name="dispgrid" value="true" <?php if ($wantgrid == 'true') echo "checked=1";?> /> Yes
			<input type="radio" name="dispgrid" value="false" <?php if ($wantgrid == 'false') echo "checked=1";?> /> No
			</td>
		</tr>
		<tr style="border-top:1px dotted #727272;"></tr>
		<tr>		
			<td style="padding: 0px 5px 0px 5px;">Display All Elements As Folders, or Ending Elements as Files?</td>
		</tr>
		<tr>
			<td style="padding: 0px 5px 0px 5px;">
			<p class="description" style="width: 95% !important;" >Please indicate folders (ending elements will be iconified with closed folder icon) or files (ending elements will iconified with file icon).  If using "People" theme.</p>
			</td>
		</tr>
		<tr>
			<td>
			<input type="radio" name="treemode" value="folders" <?php if ($treemode == 'folders') echo "checked=1";?> /> Folders
			<input type="radio" name="treemode" value="files" <?php if ($treemode == 'files') echo "checked=1";?> /> Files
			</td>
		</tr>
		<tr style="border-top:1px dotted #727272;"></tr>
		<tr>		
			<td style="padding: 0px 5px 0px 5px;">Place Expand/Contract Buttons.</td>
		</tr>
		<tr>
			<td style="padding: 0px 5px 0px 5px;">
			<p class="description" style="width: 95% !important;" >Please indicate whether you want them on top, bottom or both.</p>
			</td>
		</tr>
		<tr>
			<td>
			<input type="radio" name="placebtn" value="top" <?php if ($placebtn == 'top') echo "checked=1";?> /> Top
			<input type="radio" name="placebtn" value="bottom" <?php if ($placebtn == 'bottom') echo "checked=1";?> /> Bottom
			<input type="radio" name="placebtn" value="both" <?php if ($placebtn == 'both') echo "checked=1";?> /> Both
			<input type="radio" name="placebtn" value="none" <?php if ($placebtn == 'none') echo "checked=1";?> /> None
			</td>
		</tr>
		<tr style="border-top:1px dotted #727272;"></tr>
		<tr>		
			<td style="padding: 0px 5px 0px 5px;">Change The Icons/Theme of Your Tree.</td>
		</tr>
		<tr>
			<td style="padding: 0px 5px 0px 5px;">
			<p class="description" style="width: 95% !important;">There are two image files included.  To use the folder icon set, enter <span style="color:red;font-weight: 600;">"folders"</span> into the text box.  To use the people icon set, enter <span style="color:red;font-weight: 600;">"people"</span>.  You may create your own custom themed icons and reference the url by entering it in the text box below.  If you would like to copy the image used and simply edit the individual icons, go <a href="<?php echo plugins_url( 'imgs/mootree.gif', __FILE__ ); ?>" target="_blank" >here</a> and save the image for editing.  Upload it into wordpress media and reference the url below.</p>
			</td>
		</tr>
        <tr>
			<td>
			<input class="themewant" type="text" name="themewant" value="<?php echo $themewant; ?>" style="width: 80%" />
			</td>
		</tr>
		<tr style="border-top:1px dotted #727272;"></tr>
		<tr>		
			<td style="padding: 0px 5px 0px 5px;">Customize Javascript for Personalized Functionality.</td>
		</tr>
		<tr>
			<td style="padding: 0px 5px 0px 5px;">
			<p class="description" style="width: 95% !important; text-align:justify; text-justify:newspaper;">If you edit this field, please use double quotes only and no carriage returns. The general user will want to leave this alone.  Reference for MooTree API can be found in documentation after downloading files.  Download link is <a href="https://sites.google.com/a/mindplay.dk/mootree/Home" target="_blank" >here</a> and documentation is <a href="<?php echo plugins_url( 'docs/files/mootree-js.html', __FILE__ ); ?>" target="_blank" >here</a>.  Customizations to the script include the following: <span style="color:blue">node.linkdesc</span> will give you the description of the featured image;  <span style="color:blue">node.linkcaption</span> will give you the caption of the featured image; <span style="color:blue">node.misc</span> will give you the text you entered in the "Branch Miscellaneous" section of the specific branch element post (with this data if you have created name/value pairs, you will have to parse it via javascript on your own; <span style="color:blue">node.data.url</span> will give you the featured image url; the default code that allows the lightbox for the images is as follows: <br/><br/><p style="margin:auto; width: 80% !important;color:red; background:#EAEAEA;"> <code>/*<br/> onSelect: function(node, state) {if (state){if(typeof(node.data.url) ==  "string" && node.data.url != "" ){milkbox.openWithFile({ href:node.data.url, title:node.linkcaption + " : " + node.linkdesc, size:"width:600,height:350"}, {overlayOpacity:1, resizeTransition:"bounce:out", centered:true});}}} <br/>*/</code></p><br/><br/> The javascript library for the lightbox is called "Milkbox" by Luca Reghellin at <a href="http://reghellin.com/milkbox/" target="_blank">http://reghellin.com/milkbox/</a>.</p>
			</td>
		</tr>
        <tr>
			<td>
			<textarea id="letno" class="custscript" type="text" name="custscript" style="width: 80%; max-width: 80%" ><?php echo $custscript; ?></textarea>
			</td>
		</tr>
		<tr style="border-top:1px dotted #727272;"></tr>        
</table>

    <?php
}
// when category is saved/updated
add_action('edited_tree-categories', 'update_tree_category_fields');
add_action('create_tree-categories', 'update_tree_category_fields');
function update_tree_category_fields($term_id) {
	if($_POST['taxonomy'] == 'tree-categories'){
		
	$tmpst = esc_js($_POST['custscript']);
	$tmpst = str_replace("\\n", ' ', $tmpst);
	$tmpst = str_replace("\'", '"', $tmpst);
	$strjs = trim($tmpst);
	
	if(!get_option('mootree_catopts')){
	$newCatMade = array($term_id => array(
				'beginopen' => trim(strip_tags($_POST['dispopen'])),
				'jscript' => trim(esc_js($_POST['custscript'])),
				'treemode' => trim(strip_tags($_POST['treemode'])),
				'wantgrid' => trim(strip_tags($_POST['dispgrid'])),
				'themeurl' => trim(strip_tags($_POST['themewant'])),
				'btnplace' => trim(strip_tags($_POST['placebtn']))
				)
			);
	add_option( 'mootree_catopts', $newCatMade );
	}else{
		$treopts = get_option('mootree_catopts');
		$treopts[$term_id] = array(
				'beginopen' => trim(strip_tags($_POST['dispopen'])),
				'jscript' => $strjs,
				'treemode' => trim(strip_tags($_POST['treemode'])),
				'wantgrid' => trim(strip_tags($_POST['dispgrid'])),
				'themeurl' => trim(strip_tags($_POST['themewant'])),
				'btnplace' => trim(strip_tags($_POST['placebtn']))
				);
		update_option('mootree_catopts', $treopts);
	
	}// END ELSE
			
  }//endif;
}


// when category is removed
add_filter('deleted_term_taxonomy', 'remove_tree_category_fields');
function remove_tree_category_fields($term_id) {
  if($_POST['taxonomy'] == 'tree-categories'){
    $treefields = get_option('mootree_catopts');
    unset($treefields[$term_id]);
    update_option('mootree_catopts', $treefields);
  }//endif;
}

// - - - - - -  - - - -  - - - -  - - - - -  - - - - -  - - - - -  - - - - - - -  - - - - -  -
   //   ADD POST TYPE ICONS
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function wp_mootree_icons() {
	?>
<style type="text/css" media="screen">
	#menu-posts-mootree .wp-menu-image {background: url(<?php echo plugins_url( 'imgs/treeicon16.png', __FILE__ ); ?>) no-repeat 8px 8px !important;}
	#icon-edit.icon32-posts-mootree {background: url(<?php echo plugins_url( 'imgs/treeicon32.png', __FILE__ ); ?>) no-repeat 0px 0px;}
</style>	 
	<?php }
add_action( 'admin_head', 'wp_mootree_icons' );


// - - - - - -  - - - -  - - - -  - - - - -  - - - - -  - - - - -  - - - - - - -  - - - - -  -

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// END // Custom Post Type - WP MooTree

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
?>