<?php
// -----------------------------------------------------------------
/*
// Tree Custom Post Type
//
*/
// -----------------------------------------------------------------
function make_tree( $atts, $content = null ) {
	global $piecesof;
	
	add_action('wp_footer', 'print_script');
	
	//global $allparts;
	$piecesof = '';
	extract( shortcode_atts( array(
		'category' => ''
	), $atts ) );
						//global $post;
						//$allaffs = '';
						$custom_post_type = 'mootree';
						$taxonomy = 'tree-categories';
						//$taxonomy_terms = get_terms($taxonomy, "&number=1&include=$category");
						$taxonomy_term = get_term_by('slug', $category, $taxonomy);
						
			
			$thegiftouse = plugins_url( 'imgs/people.gif', __FILE__ );
			$defgif = plugins_url( 'imgs/mootree.gif', __FILE__ );
			
			$tgFields = get_option('mootree_catopts');
					
			$beginopen = $tgFields[$taxonomy_term->term_id]['beginopen'];
			if ($beginopen == null || $beginopen == ""){$beginopen = "true";}
			
			$wantgrid = $tgFields[$taxonomy_term->term_id]['wantgrid'];
			if ($wantgrid == null || $wantgrid == ""){$wantgrid = "true";}
			
			$treemode = $tgFields[$taxonomy_term->term_id]['treemode'];
			if ($treemode == null || $treemode == ""){$treemode = "folders";}
			
			$btnplace = $tgFields[$taxonomy_term->term_id]['btnplace'];
			if ($btnplace == null || $btnplace == ""){$btnplace = "bottom";}
			
			$tempscript = $tgFields[$taxonomy_term->term_id]['jscript'];
			if ($tempscript == null || $tempscript == ""){
			$custscript = 'onSelect: function(node, state) {if (state){if(typeof(node.data.url) ==  "string" && node.data.url != ""){milkbox.openWithFile({href:node.data.url,title:node.linkcaption + " : " + node.linkdesc,size:"width:600,height:350"},{overlayOpacity:1,resizeTransition:"bounce:out",centered:true});}}}';
			}else {$custscript = html_entity_decode($tempscript, ENT_QUOTES);}
			
			$themewant = $tgFields[$taxonomy_term->term_id]['themeurl'];
			if ($themewant == null || $themewant == ""){$themewant = $thegiftouse;}
			if ($themewant == "people") {$themewant = $thegiftouse;}
			if ($themewant == "folders") {$themewant = $defgif;}
				
			/*
			onExpand: function(node, state) {
			$('events').innerHTML += "<b>Tree Event:</b> " + node.text + " " + (state ? 'expanded' : 'collapsed') + "<br />";
			},
			onSelect: function(node, state) {
				$('events').innerHTML += "<b>Tree Event:</b> " + node.text + " " + (state ? 'selected' : 'deselected') + "<br />";
			},
			onClick: function(node) {
				$('events').innerHTML += "<b>Tree Event:</b> " + node.text + " clicked<br />";
			}
			
			theme:  Tells where to find the gif for tree to use
			
			select: 'sitemap',
                theme: '<?php bloginfo('template_url'); ?>/img/mootree.gif', 
			*/
			
			$javawhat = 'var tree; window.onload = function() {tree = new MooTreeControl({div: "thetree", mode: "' . $treemode . '",theme: "' . $themewant . '", grid: ' . $wantgrid . ',' . $custscript . '},{text: "' . $taxonomy_term->name . '",open: ' . $beginopen . ' }); tree.adopt("thefam"); return false }';
			
			$piecesof .= '<script type="text/javascript">';
			$piecesof .= $javawhat;
			$piecesof .= '</script>';
			if($btnplace == "top" || $btnplace == "both"){
			$piecesof .= '<div class="togglebuttons" style="padding-bottom: 20px;"><input type="button" value=" " class="expand_button" onclick="tree.expand()" />';
			$piecesof .= '<input type="button" value=" " class="collapse_button" onclick="tree.collapse()" /></div>';
			}
			$piecesof .= '<div id="thetree"></div>';
			if($btnplace == "bottom" || $btnplace == "both"){
			$piecesof .= '<div class="togglebuttons" style="padding-top: 20px;"><input type="button" value=" " class="expand_button" onclick="tree.expand()" />';
			$piecesof .= '<input type="button" value=" " class="collapse_button" onclick="tree.collapse()" /></div>';
			}
			$piecesof .= '<ul id="thefam" style="display:none">';
			
			
			
			$mootree_walker = new Mootree_walker();

			$argis = array(			
						'depth'        => 0,
						'title_li'     => '',
						'echo'         => 0,
						//'child_of'	   => $taxonomy_term->term_id,
						'sort_column'  => 'post_date',
						'post_type'    => 'mootree',
						'post_status'  => 'publish',
						'walker'       => $mootree_walker,
						'link_before'  => $taxonomy_term->term_id,
						'link_after'    => 'mootree'
						);
					$thelist = wp_list_pages( $argis );
					$piecesof .= $thelist;
					$piecesof .= '</ul>';
					$piecesof .= '<div style="clear:both;padding-top:20px"></div>';
					return $piecesof . "<br/><br/><br/><pre>" . $thelist . "</pre>";
}//funct

function print_script() {
		wp_print_scripts('mootools');   
		wp_print_scripts('mootree');
		wp_print_scripts('milkbox_lightbox');   
		wp_print_scripts('mootools_more');
		//wp_print_scripts('thsplugscript');
		wp_print_styles('mootree_style');
		wp_print_styles('plugin_sty');
		wp_print_styles('milkbox_sty');
}
		
class Mootree_walker extends Walker_page {

function start_el( &$output, $page, $depth, $args, $current_page = 0 ) {
		
		if ( $depth )
			$indent = str_repeat("\t", $depth);
		else
			$indent = '';

		extract($args, EXTR_SKIP);
		$css_class = array('page_item', 'page-item-'.$page->ID);
		if ( !empty($current_page) ) {
			$_current_page = get_page( $current_page );
			_get_post_ancestors($_current_page);
			if ( isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors) )
				$css_class[] = 'current_page_ancestor';
			if ( $page->ID == $current_page )
				$css_class[] = 'current_page_item';
			elseif ( $_current_page && $page->ID == $_current_page->post_parent )
				$css_class[] = 'current_page_parent';
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current_page_parent';
		}
		
		if($link_after == 'mootree'){
				$termID = (int)$link_before;
				$term_list = wp_get_post_terms($page->ID, 'tree-categories', array("fields" => "ids"));
				if(has_post_thumbnail($page->ID)) {
					$printlink = wp_get_attachment_url( get_post_thumbnail_id($page->ID) );
					$thumbid = get_post_thumbnail_id($page->ID);
					$thmbarg = array(
						'post_type' => 'attachment',
						'post_status' => null,
						'post_parent' => $page->ID,
						'include'  => $thumbid
						);
					$thumb_image = get_posts($thmbarg);
					$thcaption = $thumb_image[0]->post_excerpt;
					$thdescript = $thumb_image[0]->post_content;
				}else { $printlink = "";}
				
				$itslink = get_post_meta($page->ID, 'mt_branch_link', true);         
				$itsid = get_post_meta($page->ID, 'mt_branch_id', true);
				$itscolor = get_post_meta($page->ID, 'mt_branch_color', true);
				$itsopen = get_post_meta($page->ID, 'mt_branch_open', true);
				$itsicon = get_post_meta($page->ID, 'mt_branch_icon', true);
				$itsopenicon = get_post_meta($page->ID, 'mt_branch_openicon', true);
				$itsmisc = get_post_meta($page->ID, 'mt_branch_miscellaneous', true);
				if ($itslink && $itslink != "" && $printlink == ""){$printlink = $itslink;}
				
				$commentatts = '';
				if ($itsid != ""){$commentatts .= 'id:' . $itsid . ';';}
				if ($itscolor != ""){$commentatts .= 'color:' . $itscolor . ';';}
				if ($itsopen == "true"){$commentatts .= 'open:' . $itsopen . ';';}
				if ($itsicon != ""){$commentatts .= 'icon:' . $itsicon . ';';}
				if ($itsopenicon != ""){$commentatts .= 'openicon:' . $itsopenicon . ';';}
				if ($itsmisc != ""){$commentatts .= 'misc: ' . $itsmisc . ';';}
				if ($thcaption && $thcaption != ""){$commentatts .= 'caption: ' . $thcaption . ';';}
				if ($thdescript && $thdescript != ""){$commentatts .= 'description: ' . $thdescript . ';';}
				
				if(in_array($termID, $term_list)){
					$output .= $indent . '<li class="' . $page->post_name . '" ><a href="' . $printlink . '" name="' . $page->post_name . '" title="" ><!-- ' . $commentatts . ' -->' . apply_filters( 'the_title', $page->post_title, $page->ID ) . '</a>';
				}
					
									
		}//END If mootree			
		else{
		$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		$output .= $indent . '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>';

		if ( !empty($show_date) ) {
			if ( 'modified' == $show_date )
				$time = $page->post_modified;
			else
				$time = $page->post_date;

			$output .= " " . mysql2date($date_format, $time);
		}
	  }//END Else if not mootree
	}
	
	function end_el(&$output, $page, $depth = 0, $args = array()){
		$partOfCateg = false;
		if($link_after == 'mootree'){
			$termID = (int)$link_before;
			$term_list = wp_get_post_terms($page->ID, 'tree-categories', array("fields" => "ids"));
			if(in_array($termID, $term_list)){
				if(isset( $args['item_spacing']) && 'preserve' === $args['item_spacing']){
					$t = "\t";
					$n = "\n";
				}else{
					$t = '';
					$n = '';
				}
				$output .= "</li>{$n}";
			}
		}else{		
			if(isset( $args['item_spacing']) && 'preserve' === $args['item_spacing']){
				$t = "\t";
				$n = "\n";
			}else{
				$t = '';
				$n = '';
			}
			$output .= "</li>{$n}";
		}
	}
	
}
?>
