<?php
add_shortcode( 'book-search', 'rmcc_post_listing_shortcode1' );
function rmcc_post_listing_shortcode1( $atts ) {
	ob_start();
	$query = new WP_Query( array(
		'post_type' => 'books',
		'posts_per_page' => -1,
		'order' => 'DESC',
		'orderby' => 'id',
	) );
	if ( $query->have_posts() ) { ?>
		<div class="book-listing">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<style>
					img.star{width:20px;height:20px;display:inline-block}
					.book-item{width:100%;margin:0 auto;clear:both;margin-bottom:20px;overflow:auto;border-bottom:#eee thin solid;padding:50px}
					.book-poster{width:160px;float:left;margin-right:25px}
					.book-poster img{width:100%;height:auto}
					.book-name{font-size:22px}
					.book-listing{width:100%;padding-right:12px;padding-left:12px;margin-right:auto;margin-left:auto;max-width:1164px;margin-top: 100px;}
					.book-desc{padding:0 50px;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;height:calc(2 * 30px);font-size:20px;line-height:30px;color:rgba(0,0,0,.54)!important}
					@media (min-width: 700px){.singular .entry-header {padding: 20px 0 !important;}}
				}
			</style>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<div class="book-item">
						<!-- Display featured image in right-aligned floating div -->
						
						<div class="header-thumbnail" style="float: right; margin: 10px">
							<a class="blog__img single_blog" href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ):?>
									<?php the_post_thumbnail(array(300, 300)); ?>
								<?php endif;?>
							</a>
						</div>

						<!-- Display Title and Author Name -->
						<div class="book-name"><strong>Title: </strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						<strong>Publisher: </strong>
						<?php echo esc_html( get_post_meta( get_the_ID(), 'book_publisher', true ) ); ?>
						<br />
						<strong>Author: </strong>
						<?php echo esc_html( get_post_meta( get_the_ID(), 'book_author', true ) ); ?>
						<br />
						<strong>Price: </strong>
						$<?php echo esc_html( get_post_meta( get_the_ID(), 'book_price', true ) ); ?>
						<br />

						<!-- Display yellow stars based on rating -->
						<strong>Rating: </strong>
						<?php
						$nb_stars = intval( get_post_meta( get_the_ID(), 'book_rating', true ) );
						for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
							if ( $star_counter <= $nb_stars ) {
								echo '<img src="' . plugins_url( 'Books-Search/images/icon.svg' ) . '" class="star"/>';
							} else {
								echo '<img src="' . plugins_url( 'Books-Search/images/grey.svg' ). '" class="star"/>';
							}
						}
						?>
					</div>
					<div class="book-desc"><?php the_excerpt(); ?></div>
				</header>
			</div>
		<?php endwhile;
		wp_reset_postdata(); ?>
	</div>
	<?php $myvariable = ob_get_clean();
	return $myvariable;
}
}
