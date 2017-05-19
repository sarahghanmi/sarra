<?php
/**
 * Created by PhpStorm.
 * User: mtbsoft
 * Date: 15/04/2017
 * Time: 10:44
 */
// Add scripts and stylesheets
function startwordpress_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() .
        '/css/blog.css', array(), '3.3.6' );
    wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css'
    );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() .
        '/js/jquery.min.js', array( 'jquery' ), '3.3.6', true );
}
add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );
// Add Google Fonts
function startwordpress_google_fonts() {
    wp_register_style('OpenSans',
        'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
    wp_enqueue_style( 'OpenSans');
}
add_action('wp_print_styles', 'startwordpress_google_fonts');
// WordPress Titles
add_theme_support( 'title-tag' );
// Custom settings
function custom_settings_add_menu() {
    add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options',
        'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );
// Create Custom Global Settings
function custom_settings_page() { ?>
    <div class="wrap">
        <h1>Custom Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'section' );
            do_settings_sections( 'theme-options' );
            submit_button(); ?>
        </form>
    </div>
<?php }
// Twitter
function setting_twitter() { ?>
    <input type="text" name="twitter" id="twitter" value="<?php echo
    get_option( 'twitter' ); ?>" />
<?php }
// Facebook
function setting_facebook() { ?>
    <input type="text" name="facebook" id="facebook" value="<?php echo
    get_option( 'facebook' ); ?>" />
<?php }
function custom_settings_page_setup() {
    add_settings_section( 'section', 'All Settings', null, 'theme-options' );
    add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options',
        'section' );
    add_settings_field( 'facebook', 'facebook URL', 'setting_facebook', 'theme-options',
        'section' );
    register_setting('section', 'twitter');
    register_setting('section', 'facebook');
}
add_action( 'admin_init', 'custom_settings_page_setup' );
// Support Featured Images
add_theme_support( 'post-thumbnails' );
// Custom Post Type
function create_my_custom_post() {
    register_post_type( 'my-custom-post',
        array(
            'labels' => array(
                'name' => __( 'My Custom Post' ),
                'singular_name' => __( 'My Custom Post' ),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'custom-fields'
            )
        ));
}
add_action( 'init', 'create_my_custom_post' );
function create_post_your_post() {
    register_post_type( 'your_post',
        array(
            'labels'       => array(
                'name'       => __( 'Your Post' ),
            ),
            'public'       => true,
            'hierarchical' => true,
            'has_archive'  => true,
            'supports'     => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            ),
            'taxonomies'   => array(
                'post_tag',
                'category',
            )
        )
    );
    register_taxonomy_for_object_type( 'category', 'your_post' );
    register_taxonomy_for_object_type( 'post_tag', 'your_post' );
}
add_action( 'init', 'create_post_your_post' );
function add_your_fields_meta_box() {
    add_meta_box(
        'your_fields_meta_box', // $id
        'Your Fields', // $title
        'show_your_fields_meta_box', // $callback
        'your_post', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );
function show_your_fields_meta_box() {
    global $post;
    $meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

    <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

    <!-- All fields will go here -->
    <p>
        <label for="your_fields[textarea]">Textarea</label>
        <br>
        <textarea name="your_fields[textarea]" id="your_fields[textarea]" rows="5" cols="30" style="width:500px;"><?php echo $meta['textarea']; ?></textarea>
    </p>

    <p>
        <label for="your_fields[checkbox]">Checkbox
            <input type="checkbox" name="your_fields[checkbox]" value="checkbox" <?php if ( $meta['checkbox'] === 'checkbox' ) echo 'checked'; ?>>
        </label>
    </p>

    <p>
        <label for="your_fields[select]">Select Menu</label>
        <br>
        <select name="your_fields[select]" id="your_fields[select]">
            <option value="option-one" <?php selected( $meta['select'], 'option-one' ); ?>>Option One</option>
            <option value="option-two" <?php selected( $meta['select'], 'option-two' ); ?>>Option Two</option>
        </select>
    </p>

    <p>
        <label for="your_fields[image]">Image Upload</label><br>
        <input type="text" name="your_fields[image]" id="your_fields[image]" class="meta-image regular-text" value="<?php echo $meta['image']; ?>">
        <input type="button" class="button image-upload" value="Browse">
    </p>
    <div class="image-preview"><img src="<?php echo $meta['image']; ?>" style="max-width: 250px;"></div>

    <script>
        jQuery(document).ready(function ($) {
            // Instantiates the variable that holds the media library frame.
            var meta_image_frame;
            // Runs when the image button is clicked.
            $('.image-upload').click(function (e) {
                e.preventDefault();
                var meta_image = $(this).parent().children('.meta-image');
                // If the frame already exists, re-open it.
                if (meta_image_frame) {
                    meta_image_frame.open();
                    return;
                }
                // Sets up the media library frame
                meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                    title: meta_image.title,
                    button: {
                        text: meta_image.button
                    }
                });
                // Runs when an image is selected.
                meta_image_frame.on('select', function () {
                    // Grabs the attachment selection and creates a JSON representation of the model.
                    var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
                    // Sends the attachment URL to our custom image input field.
                    meta_image.val(media_attachment.url);
                });
                // Opens the media library frame.
                meta_image_frame.open();
            });
        });
    </script>

<?php }
function save_your_fields_meta( $post_id ) {
    // verify nonce
    if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
        return $post_id;
    }
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    // check permissions
    if ( 'page' === $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    }
    $old = get_post_meta( $post_id, 'your_fields', true );
    $new = $_POST['your_fields'];
    if ( $new && $new !== $old ) {
        update_post_meta( $post_id, 'your_fields', $new );
    } elseif ( '' === $new && $old ) {
        delete_post_meta( $post_id, 'your_fields', $old );
    }
}
add_action( 'save_post', 'save_your_fields_meta' );
function prfx_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
	$prfx_stored_meta = get_post_meta( $post->ID );
	?>

	<p>
		<label for="meta-prof" class="prfx-row-title"><?php _e( 'Enseignant affecté', 'prfx-textdomain' )?></label>
		<input type="text" name="meta-prof" id="meta-prof" value="<?php if ( isset ( $prfx_stored_meta['meta-prof'] ) ) echo $prfx_stored_meta['meta-prof'][0]; ?>" />
			<br>
		<label for="meta-ch" class="prfx-row-title"><?php _e( 'ChargeHoraire', 'prfx-textdomain' )?></label>
		<input type="number" name="meta-ch" id="meta-ch" value="<?php if ( isset ( $prfx_stored_meta['meta-ch'] ) ) echo $prfx_stored_meta['meta-ch'][0]; ?>" />
	</p>

	<?php
}
function prfx_meta_save( $post_id ) {
	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}
	// Checks for input and sanitizes/saves if needed
	if( isset( $_POST[ 'meta-prof' ] )||isset( $_POST[ 'meta-ch' ] ) ) {
		update_post_meta( $post_id, 'meta-prof', sanitize_text_field( $_POST[ 'meta-prof' ] ) );
		update_post_meta( $post_id, 'meta-ch', sanitize_text_field( $_POST[ 'meta-ch' ] ) );
	}
}
add_action( 'save_post', 'prfx_meta_save' );
function prfx_custom_meta() {
	add_meta_box( 'prfx_meta', __( 'Enseignant et ChargeHoraire', 'prfx-textdomain' ), 'prfx_meta_callback', 'post' );
}
add_action( 'add_meta_boxes', 'prfx_custom_meta' );