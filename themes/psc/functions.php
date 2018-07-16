<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
add_theme_support('woocommerce');
 
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfifteen
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'sidebar_menu'  => __( 'Sidebar Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Enable support for custom logo.
	 *
	 * @since Twenty Fifteen 1.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.

	/**
	 * Filter Twenty Fifteen custom-header support arguments.
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-color     		Default color of the header.
	 *     @type string $default-attachment     Default attachment of the header.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Fifteen 1.7
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function twentyfifteen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyfifteen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyfifteen_resource_hints', 10, 2 );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Fifteen 1.9
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyfifteen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 22;
	$args['smallest'] = 8;
	$args['unit']     = 'pt';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyfifteen_widget_tag_cloud_args' );


/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


/*
*  Change the Options Page menu to 'Theme Options'
*/
if( function_exists('acf_set_options_page_title') )
{
    acf_set_options_page_title( __('Site Editor') );
}
function my_acf_options_page_settings( $settings )
{
	//$settings['title'] = 'Site Editor';
	$settings['pages'] = array('Header','Home Page','Personality Types','Free Personality Test','Product Catalogue','Shopping Cart','Checkout','Order History', 'Footer');
	return $settings;
}
add_filter('acf/options_page/settings', 'my_acf_options_page_settings');

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<ul class="breadcrumb-list">',
            'wrap_after'  => '</ul>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

function custom_woocommerce_catalog_orderby( $orderby ) {
	unset($orderby["rating"]);
	//unset($orderby["menu_order"]);
	$sortby['default'] = 'Default Sorting';
	$orderby["popularity"] = __('Popular', 'woocommerce');
	$orderby["date"] = __('New', 'woocommerce');
	$orderby["price"] = __('Price: Low to High', 'woocommerce');
	$orderby["price-desc"] = __('Price: High to Low', 'woocommerce');
	return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "custom_woocommerce_catalog_orderby", 20 );


add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<div class="cart-right">
        <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
            <h4>Shopping Cart</h4>
            <h2><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></h2>
            <h4>Total: <?php echo WC()->cart->get_cart_total(); ?></h4>
        </a>
    </div> 
	<?php
	
	$fragments['.cart-right'] = ob_get_clean();
	
	return $fragments;
}


add_action( 'wp_ajax_pro_login', 'pro_process_login' );
add_action( 'wp_ajax_nopriv_pro_login', 'pro_process_login' );

function pro_process_login() {
	//echo $_POST['whatever'];
	$params = array();
	parse_str($_POST['whatever'], $params);
	//print_r($params);
	$nonce_value = isset( $params['_wpnonce'] ) ? $params['_wpnonce'] : '';
	$nonce_value = isset( $params['woocommerce-login-nonce'] ) ? $params['woocommerce-login-nonce'] : $nonce_value;

	if ( wp_verify_nonce( $nonce_value, 'woocommerce-login' ) ) {
		//echo 'sadas';

		$creds    = array();
		$username = trim( $params['username'] );

		$validation_error = new WP_Error();
		$validation_error = apply_filters( 'woocommerce_process_login_errors', $validation_error, $params['username'], $params['password'] );
		//echo 'asdad';
		//print_r($validation_error);
		if ( $validation_error->get_error_code() ) {
			echo '<strong>Error: </strong> ' . $validation_error->get_error_message();
		}

		if ( empty( $username ) ) {
			echo '<p>Username is required</p>';
		}

		if ( empty( $params['password'] ) ) {
			echo '<p>Password is required</p>';
		}

		if ( is_email( $username ) && apply_filters( 'woocommerce_get_username_from_email', true ) ) {
			$user = get_user_by( 'email', $username );

			if ( isset( $user->user_login ) ) {
				$creds['user_login'] = $user->user_login;
			} else {
				echo '<strong>Error: </strong> A user could not be found with this email address.';
			}

		} else {
			$creds['user_login'] = $username;
		}

		$creds['user_password'] = $params['password'];
		$creds['remember']      = isset( $params['rememberme'] );
		$secure_cookie          = is_ssl() ? true : false;
		$user                   = wp_signon( apply_filters( 'woocommerce_login_credentials', $creds ), $secure_cookie );

		if ( is_wp_error( $user ) ) {
			$message = $user->get_error_message();
			$message = str_replace( '<strong>' . esc_html( $creds['user_login'] ) . '</strong>', '<strong>' . esc_html( $username ) . '</strong>', $message );
			echo $message;
		} else {
			echo 'ok';
		}

	}
	die();
}


/**
 * Process the registration form.
 */
add_action( 'wp_ajax_pro_signup_2', 'pro_process_registration_2' );
add_action( 'wp_ajax_nopriv_pro_signup_2', 'pro_process_registration_2' );

function pro_process_registration_2() {
	$params = array();
	parse_str($_POST['whatever2'], $params);
	//echo 'asdas';
	//print_r($_POST['whatever2']);
	$nonce_value = isset( $params['_wpnonce'] ) ? $params['_wpnonce'] : '';
	$nonce_value = isset( $params['woocommerce-register-nonce'] ) ? $params['woocommerce-register-nonce'] : $nonce_value;
	//echo $nonce_value;
	if ( wp_verify_nonce( $nonce_value, 'woocommerce-register' ) ) {
		//echo 'aaa';
		$username = 'no' === get_option( 'woocommerce_registration_generate_username' ) ? $params['username'] : '';
		$password = $params['password'];
		$email    = $params['email'];

		$validation_error = new WP_Error();
		$validation_error = apply_filters( 'woocommerce_process_registration_errors', $validation_error, $username, $password, $email );
		$error = 0;
		
		if($params['fname'] == ''){
			echo 'Name Required.';
			$error = 1;
		}
		
		if ( $validation_error->get_error_code() ) {
			echo $validation_error->get_error_message();
			$error = 1;
		}

		if($error != 1){
			$new_customer = wc_create_new_customer( sanitize_email( $email ), wc_clean( $username ), $password );

			if ( is_wp_error( $new_customer ) ) {
				echo $new_customer->get_error_message();
			}else{
				echo 'ok';
			}

			if ( apply_filters( 'woocommerce_registration_auth_new_customer', true, $new_customer ) ) {
				wc_set_customer_auth_cookie( $new_customer );
			}
			//print_r($new_customer);
			update_user_meta( $new_customer, 'first_name', trim( $params['fname']  ));
			update_user_meta( $new_customer, 'billing_first_name', trim( $params['fname']  ));
			//echo 'ok';
		}
		//wp_safe_redirect( apply_filters( 'woocommerce_registration_redirect', wp_get_referer() ? wp_get_referer() : wc_get_page_permalink( 'myaccount' ) ) );
		//exit;
	}
	die();
}


add_filter("woocommerce_checkout_fields", "order_fields");
function order_fields($fields) {
	//unset($fields["billing"]['billing_address_1']);
	unset($fields["billing"]['billing_address_2']);
	//unset($fields["billing"]['billing_country']);
	//unset($fields["billing"]['billing_last_name']);
	//unset($fields["billing"]['billing_postcode']);
	unset($fields["billing"]['billing_state']);
	unset($fields["billing"]['billing_phone_alt']);
	//unset($fields["billing"]['billing_city']);
	unset($fields["billing"]['billing_company']);
	//unset($fields["billing"]['billing_email']);
	unset($fields["order"]['order_comments']);
	unset($fields["account"]['account_password']);

	$fields["billing"]['billing_first_name'] = array(
		'label'       => '',
		'placeholder' => 'First Name',
		'type'		  => 'text',		
		'required'    => true,
		'class'       => array('form-group', 'form-row-first'),
		'input_class' => array('form-control'),
		'label_class' => array(''),
	);

	$fields["billing"]['billing_last_name'] = array(
		'label'       => '',
		'placeholder' => 'Last Name',
		'type'		  => 'text',		
		'required'    => true,
		'class'       => array('form-group', 'form-row-last'),
		'input_class' => array('form-control'),
		'label_class' => array(''),
	);

	$fields["billing"]['billing_address_1'] = array(
		'label'       => '',
		'placeholder' => 'Address',
		'type'		  => 'text',		
		'required'    => true,
		'class'       => array('form-group', 'form-row-wide'),
		'input_class' => array('form-control'),
		'label_class' => array(''),
	);
	$fields["billing"]['billing_postcode'] = array(
		'label'       => '',
		'placeholder' => 'Postcode',
		'type'		  => 'text',		
		'required'    => true,
		'class'       => array('form-group', 'form-row-first'),
		'input_class' => array('form-control'),
		'label_class' => array(''),
	);
	
	$fields["billing"]['billing_country'] = array(
		'label'       => '',
		'placeholder' => 'Country',
		'type'		  => 'country',		
		'required'    => true,
		'class'       => array('form-group', 'form-row-last','country'),
		'input_class' => array('option-select'),
		'label_class' => array(''),
	);

	$fields["billing"]['billing_phone'] = array(
		'label'       => '',
		'placeholder' => 'Contact no.',
		'type'		  => 'text',		
		'required'    => true,
		'class'       => array('form-row-wide', 'form-group'),
		'input_class' => array('form-control'),
		'label_class' => array(''),
	);
	
	$fields["billing"]['billing_email'] = array(
		'label'       => '',
		'placeholder' => 'Email',
		'type'		  => 'text',		
		'required'    => true,
		'class'       => array('form-row-wide', 'form-group'),
		'input_class' => array('form-control'),
		'label_class' => array(''),
	);
	
	/*$fields["account"]['account_password'] = array(
		'label'       => 'Account Password',
		'placeholder' => 'Account Password',
		'type'		  => 'password',		
		'required'    => true,
		'class'       => array('form-group', 'form-row-wide'),
		'input_class' => array('form-control'),
		'label_class' => array(''),
	);
*/

    $order = array(
        "billing_first_name",
        "billing_last_name",
        "billing_address_1",
        //"billing_company",
       
        //"billing_phone_alt",
		"billing_postcode",
		"billing_country",
        //"billing_address_2",
        //"billing_state",
       // "billing_city",
         "billing_phone",
		 "billing_email",
		 //"account_password",
        
    );
	
    foreach($order as $field)
    {
        $ordered_fields[$field] = $fields["billing"][$field];
    }

    $fields["billing"] = $ordered_fields;
    return $fields;
}

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'SGD': $currency_symbol = 'US$'; break;
     }
     return $currency_symbol;
}



function pawelprotas_wc_default_address_fields($fields){
    $fields['address_1']['placeholder'] = __('Address', 'twentyfifteen');

    return $fields;
}

add_filter('woocommerce_default_address_fields', 'pawelprotas_wc_default_address_fields');



add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty' ); 
 
function bbloomer_cart_refresh_update_qty() { 
    if (is_cart()) { 
        ?> 
        <script type="text/javascript"> 
            jQuery('div.woocommerce').on('click', '.quantity-wrap a', function(){ 
                jQuery("[name='update_cart']").trigger("click"); 
            }); 
        </script> 
        <?php 
    } 
}


add_filter('gettext', 'change_save_to_account_text', 100, 3 );
function change_save_to_account_text( $translated_text, $text, $domain ) {
    if( $text === 'Save to account' && $domain == 'woocommerce' && is_checkout() )
    {
        $translated_text =  __( 'Save my Credit Card', $domain );
    }
    return $translated_text;
}


/*
 * Auto Complete all WooCommerce orders.
 */
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) { 
    if ( ! $order_id ) {
        return;
    }

    $order = wc_get_order( $order_id );
    $order->update_status( 'completed' );
}