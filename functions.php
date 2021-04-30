<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'twentyseventeen-featured-image', 1920, 570, true );
	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'sidebar' => __( 'Sidebar Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'link',
		'gallery',
		'video',
		'status',
		'quote'
	) );

	function rename_post_formats( $safe_text ) {
    if ( $safe_text == 'Link' )
        return 'PDF';

    return $safe_text;
	}
	add_filter( 'esc_html', 'rename_post_formats' );

	function rename_post_formats3( $safe_text ) {
    if ( $safe_text == 'Status' )
        return 'Circulares';

    return $safe_text;
	}
	add_filter( 'esc_html', 'rename_post_formats3' );

	function rename_post_formats4( $safe_text ) {
    if ( $safe_text == 'Citação' )
        return 'Multi Conteúdos';

    return $safe_text;
	}
	add_filter( 'esc_html', 'rename_post_formats4' );



	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Banner Home 1', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Banner Home 2', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Banner Home 3', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
	
	// Theme stylesheet.
	wp_enqueue_style( 'sindicatos-style', get_stylesheet_uri() );
	wp_enqueue_style( 'sindicatos-theme', get_template_directory_uri().'/css/theme.css' );
	// wp_enqueue_script( 'sindicatos-swiper', get_template_directory_uri() . '/js/swiper.min.js', array( 'jquery' ), '20160816', true );
	// wp_enqueue_script( 'sindicatos-script', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '20160816', true );
	//wp_enqueue_scripts( 'jquery', get_template_directory_uri().'/js/jquery-3.1.1.min.js' );
	//wp_enqueue_script( 'sindicatos-jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js', array( 'jquery' ), '20160816', true );

}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );


/*------------------------------------------------------------------------------------------------------------------------------------

GM5 - REMOVE WP DEFAULT ACTIONS

------------------------------------------------------------------------------------------------------------------------------------*/

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action( 'wp_head', 'wp_resource_hints', 2 );

function change_default_jquery( ){
    wp_dequeue_script( 'jquery');
    wp_deregister_script( 'jquery');   
}
add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );

add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

function remove_json_api () {

    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

   // Remove all embeds rewrite rules.

}
add_action( 'after_setup_theme', 'remove_json_api' );


/*------------------------------------------------------------------------------------------------------------------------------------

GM5 - FUNÇÕES E CUSTOMIZAÇÔES

------------------------------------------------------------------------------------------------------------------------------------*/

//LIMITE TEXTO

function removeAspas($string) {
   $string = str_replace('"', "'", $string);
   return $string;
}

function removeHTMLtags($text)
{
	$conteudo = preg_replace("/<.*?>/", "", $text);
	return $conteudo;
}

function texto_limite($title,$maximo) {
	if ( strlen($title) > $maximo ) {
		$continua = '...';
	}
	$title = mb_substr( removeHTMLtags($title), 0, $maximo, 'UTF-8' );
	return $title.$continua;
}

//PÁGINAS ADICIONAIS NO MENU

if( function_exists('acf_add_options_page') ) {
 
	$page1 = acf_add_options_page(array(
	
		'page_title' => 'Customizações do Sindicato',
		'menu_title' => 'Customizações',
		'menu_slug' => 'customizacoes',
		
	));

	$page2 = acf_add_options_page(array(
	
		'page_title' => 'Customização do Header e Footer do tema',
		'menu_title' => 'Header e Footer',
		'menu_slug' => 'custom-header-footer',
		'parent_slug' => 'customizacoes',
		
	));

	$page3 = acf_add_options_page(array(
	
		'page_title' => 'Customização dos Boletins',
		'menu_title' => 'Customizar Boletins',
		'menu_slug' => 'custom-boletim',
		'parent_slug' => 'customizacoes',
		
	));

}

// BOLETÍNS

function custom_post_boletins() {

	$labels = array(
		'name'                  => _x( 'Boletins', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Boletim', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Boletins', 'text_domain' ),
		'name_admin_bar'        => __( 'Boletins', 'text_domain' ),
		'archives'              => __( 'Itens Arquivados', 'text_domain' ),
		'attributes'            => __( 'Atributos de Itens', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Itens:', 'text_domain' ),
		'all_items'             => __( 'Todos os Itens', 'text_domain' ),
		'add_new_item'          => __( 'Novo Boletim', 'text_domain' ),
		'add_new'               => __( 'Novo Boletim', 'text_domain' ),
		'new_item'              => __( 'Novo Item', 'text_domain' ),
		'edit_item'             => __( 'Editar Item', 'text_domain' ),
		'update_item'           => __( 'Atualizar Item', 'text_domain' ),
		'view_item'             => __( 'Visualizar Item', 'text_domain' ),
		'view_items'            => __( 'Ver Itens', 'text_domain' ),
		'search_items'          => __( 'Buscar Item', 'text_domain' ),
		'not_found'             => __( 'Não Encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Não Encontrado na Lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagem destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Carregar para este item', 'text_domain' ),
		'items_list'            => __( 'Lista de Itens', 'text_domain' ),
		'items_list_navigation' => __( 'Navegação de Lista de Itens', 'text_domain' ),
		'filter_items_list'     => __( 'Filtro de Lista de Itens', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'boletim',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Evento', 'text_domain' ),
		'description'           => __( 'Eventos realizados pelo sindicato', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'category_boletins' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'post_boletins', $args );

}
add_action( 'init', 'custom_post_boletins', 0 );

// CATEGORIA DE CIRCULARES

function custom_taxonomy_boletins() {

	$labels = array(
		'name'                       => _x( 'Categorias de Boletins', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Categoria de Boletim', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Categorias', 'text_domain' ),
		'all_items'                  => __( 'Todos os Itens', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'Nome do Novo Item', 'text_domain' ),
		'add_new_item'               => __( 'Adicionar Novo Item', 'text_domain' ),
		'edit_item'                  => __( 'Editar Item', 'text_domain' ),
		'update_item'                => __( 'Atualizar Item', 'text_domain' ),
		'view_item'                  => __( 'Ver Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separar itens por vírgula', 'text_domain' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover itens', 'text_domain' ),
		'choose_from_most_used'      => __( 'Escolher dos mais usados', 'text_domain' ),
		'popular_items'              => __( 'Itens populares', 'text_domain' ),
		'search_items'               => __( 'Procurar itens', 'text_domain' ),
		'not_found'                  => __( 'Não encontrado', 'text_domain' ),
		'no_terms'                   => __( 'Sem itens', 'text_domain' ),
		'items_list'                 => __( 'Lista de itens', 'text_domain' ),
		'items_list_navigation'      => __( 'Lista de navegação de itens', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'category_boletins', array( 'post_boletins' ), $args );

}
add_action( 'init', 'custom_taxonomy_boletins', 0 );

// CUSTOM FIELDS

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_599b1f82a4e7a',
	'title' => 'Montar Boletim',
	'fields' => array (
		array (
			'key' => 'field_599b206e90a3d',
			'label' => 'Número',
			'name' => 'numero',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '15',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_599b1fa239577',
			'label' => 'Selecionar Notícias',
			'name' => 'selecionar_noticias',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '100',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Adicionar Notícia',
			'sub_fields' => array (
				array (
					'key' => 'field_599b1feb39578',
					'label' => 'Notícias',
					'name' => 'noticias',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
						0 => 'post',
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'multiple' => 0,
					'return_format' => 'object',
					'ui' => 1,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post_boletins',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_599b42c190dab',
	'title' => 'Customizar Boletins',
	'fields' => array (
		array (
			'key' => 'field_599b44011f6d5',
			'label' => 'Imagem Destaque',
			'name' => 'imagem_destaque_boletim',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_599b47eab00b4',
			'label' => 'Logos',
			'name' => 'logos_boletins',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array (
				array (
					'key' => 'field_599b43bd1f6d4',
					'label' => 'Logo do Topo',
					'name' => 'logo_do_topo_boletim',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'full',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array (
					'key' => 'field_599b482bb00b6',
					'label' => 'Logo da Firjan',
					'name' => 'logo_da_firjan_boletim',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array (
					'key' => 'field_599b4841b00b7',
					'label' => 'Logo CNI',
					'name' => 'logo_cni_boletim',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
		array (
			'key' => 'field_599b489486833',
			'label' => 'Cores',
			'name' => 'cores_boletim',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array (
				array (
					'key' => 'field_599b44531f6d6',
					'label' => 'Cor Principal',
					'name' => 'cor_principal_boletim',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array (
					'key' => 'field_599b4544e9f3c',
					'label' => 'Cor Texto',
					'name' => 'cor_texto_boletim',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
			),
		),
		array (
			'key' => 'field_599b44b51f6d7',
			'label' => 'Endereço',
			'name' => 'endereco_boletim',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 2,
			'new_lines' => 'br',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'custom-boletim',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

// DISPOSITIVOS

function devices(){
	$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
	$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
	$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
	$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
	
	//if ($iphone || $android || $palmpre || $ipod || $berry == true) { 
	
	if ($iphone || $ipod || $ipad == true) { 
		return "ios";
	} else if ($android == true) { 
		return "android";
	} else {
		return "default";
	}	
}

function androidTablet($ua){ //Find out if it is a tablet 
	if(strstr(strtolower($ua), 'android') ){//Search for android in user-agent 
		if(!strstr(strtolower($ua), 'mobile')){ //If there is no ''mobile' in user-agent (Android have that on their phones, but not tablets) 
			return true; 
		} 
	} 
} 

function userAgent($ua){ 

	$iphone = strstr(strtolower($ua), 'mobile'); //Search for 'mobile' in user-agent (iPhone have that) 
	$android = strstr(strtolower($ua), 'android'); //Search for 'android' in user-agent 
	$windowsPhone = strstr(strtolower($ua), 'phone'); //Search for 'phone' in user-agent (Windows Phone uses that) 
	
	$androidTablet = androidTablet($ua); //Do androidTablet function 
	$ipad = strstr(strtolower($ua), 'ipad'); //Search for iPad in user-agent 
	 
	if($androidTablet || $ipad){
		return 'tablet'; 
	} 
	elseif($iphone && !$ipad || $android && !$androidTablet || $windowsPhone){
		return 'mobile'; 
	} 
	else{
		return 'desktop'; 
	}     

}

//TIPOS DE CONTEÚDOS

//EVENTOS

function custom_post_eventos() {

	$labels = array(
		'name'                  => _x( 'Eventos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Evento', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Eventos', 'text_domain' ),
		'name_admin_bar'        => __( 'Eventos', 'text_domain' ),
		'archives'              => __( 'Itens Arquivados', 'text_domain' ),
		'attributes'            => __( 'Atributos de Itens', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Itens:', 'text_domain' ),
		'all_items'             => __( 'Todos os Itens', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar Novo Item', 'text_domain' ),
		'add_new'               => __( 'Adicionar Novo', 'text_domain' ),
		'new_item'              => __( 'Novo Item', 'text_domain' ),
		'edit_item'             => __( 'Editar Item', 'text_domain' ),
		'update_item'           => __( 'Atualizar Item', 'text_domain' ),
		'view_item'             => __( 'Visualizar Item', 'text_domain' ),
		'view_items'            => __( 'Visualizar Itens', 'text_domain' ),
		'search_items'          => __( 'Buscar Item', 'text_domain' ),
		'not_found'             => __( 'Não Encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Não Encontrado na Lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagem destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Carregar para este item', 'text_domain' ),
		'items_list'            => __( 'Lista de Itens', 'text_domain' ),
		'items_list_navigation' => __( 'Navegação de Lista de Itens', 'text_domain' ),
		'filter_items_list'     => __( 'Filtro de Lista de Itens', 'text_domain' ),
	);	
	$rewrite = array(
		'slug'                  => 'evento',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Evento', 'text_domain' ),
		'description'           => __( 'Listagem de Eventos', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'post-formats', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'post_eventos', $args );

}
add_action( 'init', 'custom_post_eventos', 0 );

// INFORMAÇÕES PRÉVIAS

function custom_post_informacoes_previas() {

	$labels = array(
		'name'                  => _x( 'Informações Prévias', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Informação Prévia', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Informações Prévias', 'text_domain' ),
		'name_admin_bar'        => __( 'Informações Prévias', 'text_domain' ),
		'archives'              => __( 'Itens Arquivados', 'text_domain' ),
		'attributes'            => __( 'Atributos de Itens', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Itens:', 'text_domain' ),
		'all_items'             => __( 'Todos os Itens', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar Novo Item', 'text_domain' ),
		'add_new'               => __( 'Adicionar Novo', 'text_domain' ),
		'new_item'              => __( 'Novo Item', 'text_domain' ),
		'edit_item'             => __( 'Editar Item', 'text_domain' ),
		'update_item'           => __( 'Atualizar Item', 'text_domain' ),
		'view_item'             => __( 'Visualizar Item', 'text_domain' ),
		'view_items'            => __( 'Ver Itens', 'text_domain' ),
		'search_items'          => __( 'Buscar Item', 'text_domain' ),
		'not_found'             => __( 'Não Encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Não Encontrado na Lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagem destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Carregar para este item', 'text_domain' ),
		'items_list'            => __( 'Lista de Itens', 'text_domain' ),
		'items_list_navigation' => __( 'Navegação de Lista de Itens', 'text_domain' ),
		'filter_items_list'     => __( 'Filtro de Lista de Itens', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'informacao_previa',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Informações Prévias', 'text_domain' ),
		'description'           => __( 'Informações Prévias', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'post_previa', $args );

}
add_action( 'init', 'custom_post_informacoes_previas', 0 );

// BOLETIM ESTATÍSTICO

function custom_post_boletim_estatistico() {

	$labels = array(
		'name'                  => _x( 'Boletins', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Boletim', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Boletim Estatístico', 'text_domain' ),
		'name_admin_bar'        => __( 'Boletim Estatístico', 'text_domain' ),
		'archives'              => __( 'Itens Arquivados', 'text_domain' ),
		'attributes'            => __( 'Atributos de Itens', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Itens:', 'text_domain' ),
		'all_items'             => __( 'Todos os Itens', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar Novo Item', 'text_domain' ),
		'add_new'               => __( 'Adicionar Novo', 'text_domain' ),
		'new_item'              => __( 'Novo Item', 'text_domain' ),
		'edit_item'             => __( 'Editar Item', 'text_domain' ),
		'update_item'           => __( 'Atualizar Item', 'text_domain' ),
		'view_item'             => __( 'Visualizar Item', 'text_domain' ),
		'view_items'            => __( 'Ver Itens', 'text_domain' ),
		'search_items'          => __( 'Buscar Item', 'text_domain' ),
		'not_found'             => __( 'Não Encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Não Encontrado na Lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagem destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Carregar para este item', 'text_domain' ),
		'items_list'            => __( 'Lista de Itens', 'text_domain' ),
		'items_list_navigation' => __( 'Navegação de Lista de Itens', 'text_domain' ),
		'filter_items_list'     => __( 'Filtro de Lista de Itens', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'boletim_estatistico',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Boletim Estatístico', 'text_domain' ),
		'description'           => __( 'Boletim Estatístico', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'post_estatistico', $args );

}
add_action( 'init', 'custom_post_boletim_estatistico', 0 );

// RECAPTCHA - WPFORM

add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyAMHastGZ4CPd7OW00uoczbRe5QHmG9nag';
});

function wpforms_custom_capability( $cap ) {
	return 'unfiltered_html';
}
add_filter( 'wpforms_manage_cap', 'wpforms_custom_capability' );

// REMOVE LABEL DE CATEGORIAS E TAGS DO TÍTULO

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});