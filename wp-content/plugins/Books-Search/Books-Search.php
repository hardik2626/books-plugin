<?php
/*
Plugin Name: Books Search
Plugin URI: https://www.google.com/
Description: Book search
Version: 1.0
Author: Hardik Devani
Author URI: https://www.google.com/
License: GPLv2
*/
?>

<?php
if( !defined( 'WPBW_VERSION' ) ) {
	define( 'WPBW_VERSION', '1.0.0' ); // Version of plugin
}

if( !defined( 'WPBAW_DIR' ) ) {
	define( 'WPBAW_DIR', dirname( __FILE__ ) ); // Plugin dir
}

if( !defined( 'WPBAW_URL' ) ) {
	define( 'WPBAW_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'WPBAW_PLUGIN_BASENAME' ) ) {
	define( 'WPBAW_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // Plugin base name
}

if( !defined( 'WPBAW_POST_TYPE' ) ) {
	define( 'WPBAW_POST_TYPE', 'books' ); // Plugin post type
}

add_action( 'admin_init', 'my_admin' );
function my_admin() {
    add_meta_box( 'book_meta_box',
        'Book Details',
        'display_book_meta_box',
        'books', 'normal', 'high'
    );
}
?>

<?php
function display_book_meta_box( $book_review ) {
    // Retrieve current name of the Publisher and Book Rating based on review ID
    $book_publisher = esc_html( get_post_meta( $book_review->ID, 'book_publisher', true ) );
    $book_author = esc_html( get_post_meta( $book_review->ID, 'book_author', true ) );
    $book_price = esc_html( get_post_meta( $book_review->ID, 'book_price', true ) );
    $book_rating = intval( get_post_meta( $book_review->ID, 'book_rating', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Book Publisher</td>
            <td><input type="text" size="80" name="book_review_publisher_name" value="<?php echo $book_publisher; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Movie Author</td>
            <td><input type="text" size="80" name="book_review_author_name" value="<?php echo $book_author; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Book Price</td>
            <td><input type="number" size="80" name="book_review_book_price" value="<?php echo $book_price; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Movie Rating</td>
            <td>
                <select style="width: 100px" name="book_review_rating">
                <?php
                // Generate all items of drop-down list
                for ( $rating = 5; $rating >= 1; $rating -- ) {
                ?>
                    <option value="<?php echo $rating; ?>" <?php echo selected( $rating, $book_rating ); ?>>
                    <?php echo $rating; ?> stars <?php } ?>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'save_post', 'add_book_review_fields', 10, 2 );




function add_book_review_fields( $book_review_id, $book_review ) {
    // Check post type for book reviews
    if ( $book_review->post_type == 'books' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['book_review_publisher_name'] ) && $_POST['book_review_publisher_name'] != '' ) {
            update_post_meta( $book_review_id, 'book_publisher', $_POST['book_review_publisher_name'] );
        }
        if ( isset( $_POST['book_review_author_name'] ) && $_POST['book_review_author_name'] != '' ) {
            update_post_meta( $book_review_id, 'book_author', $_POST['book_review_author_name'] );
        }
        if ( isset( $_POST['book_review_book_price'] ) && $_POST['book_review_book_price'] != '' ) {
            update_post_meta( $book_review_id, 'book_price', $_POST['book_review_book_price'] );
        }
        if ( isset( $_POST['book_review_rating'] ) && $_POST['book_review_rating'] != '' ) {
            update_post_meta( $book_review_id, 'book_rating', $_POST['book_review_rating'] );
        }
    }
}


/*=========================================================================================================================*/



// Template File
require_once( WPBAW_DIR . '/single-books.php' );

// Admin Class File
require_once( WPBAW_DIR . '/includes/admin/books_admin.php' );

// Admin Class File
require_once( WPBAW_DIR . '/includes/admin/shortcode.php' );
?>