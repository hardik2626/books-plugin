<?php
/**
 * Shortcode
 *
 * @package Books
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'wpbook_shortcode');

/**
 * Register plugin design page in admin menu
 * 
 * @package Books Search
 * @since 1.0.0
 */
function wpbook_shortcode() {
	add_submenu_page( 'edit.php?post_type='.WPBAW_POST_TYPE, __('How it works, shortcode name', 'books'), __('Instructions', 'books-search'), 'manage_options', 'book-shortcode', 'book_shortcode_page' );	
}


/**
 * Function to get 'How It Works' HTML
 *
 * @package Books Search
 * @since 1.0.0
 */
function book_shortcode_page() {

	$wpos_feed_tabs = wpbawh_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'book_shortcode_page';
	?>

	<div>
		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpos_feed_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				/*$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : 'active';
				$tab_link 	= add_query_arg( array( 'post_type' => WPBAW_POST_TYPE, 'page' => 'book-shortcode', 'tab' => $tab_key), admin_url('edit.php') );*/
				?>

				<a class="nav-tab <?php echo $active_cls; ?>" href="<?php //echo $tab_link; ?>"><?php echo $tab_name; ?></a>

			<?php } ?>
		</h2>
		
		<div class="wpbawh-tab-cnt-wrp">
			<div class="post-box-container">
				<div id="poststuff">
					<div id="post-body" class="">
						<style type="text/css">
							.wpbawh-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
						</style>
						<!--How it workd HTML -->
						<div id="post-body-content">
							<div class="postbox">

								<h3 class="hndle">
									<span><?php _e( 'How It Works - Display and shortcode', 'books-search' ); ?></span>
								</h3>

								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('Geeting Started with Blog and widget', 'books-search'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1: This plugin create a Books Listing with Searching Functionality', 'books-search'); ?></li>

														<li><?php _e('Step-2: Go to "Blog --> Add blog tab".', 'books-search'); ?></li>
														<li><?php _e('Step-3: Add blog title, description, category, and images as featured image.', 'books-search'); ?></li>
														<li><?php _e('Step-4: <b>NOTE</b> :- If you want to create a blog page with WordPress existing POST section then try our other plugin --', 'books-search'); ?> <a href="http://localhost/books/wp-admin/post-new.php?post_type=page" target="_blank">Books Search – Books Review</a></li>														
													</ul>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('How Shortcode Works', 'books-search'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1. Create a page like Books OR Blog.', 'books-search'); ?></li>
														<li><?php _e('Step-2. Put below shortcode as per your need.', 'books-search'); ?></li>
													</ul>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('Shortcodes', 'books-search'); ?>:</label>
												</th>
												<td>
													<span class="wpbawh-shortcode-preview">[book-search]</span> – <?php _e('Blog in List View', 'books-search'); ?> <br />
												</td>
											</tr>						

										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<?php
			/*if( isset($active_tab) && $active_tab == 'how-it-work' ) {
				wpbawh_howitwork_page();
			}*/
			?>
		</div><!-- end .wpbawh-tab-cnt-wrp -->

	</div><!-- end .wpbawh-wrap -->

	<?php
}	


function wpbawh_help_tabs() {
	$wpos_feed_tabs = array(
		'how-it-work' 	=> array(
			'name' => __('How It Works'),
		)
	);
	return $wpos_feed_tabs;
}
?>



<?php
function wpbawh_howitwork_page() { ?>

<?php }