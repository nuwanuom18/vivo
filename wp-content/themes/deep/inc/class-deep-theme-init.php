<?php
/**
 * Deep.
 *
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Deep_Theme_Init {

	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     Deep_Theme_Init
	 */
	public static $instance;
	
	/**
	 * Provides access to a single instance of a module using the singleton pattern.
	 *
	 * @since   1.0.0
	 * @return  object
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Define the core functionality of the theme.
	 *
	 * Load the dependencies.
	 *
	 * @since   1.0.0
	 */
	public function __construct() {
		add_action( 'deep_theme_index', [$this, 'deep_theme_index'] );
		add_action( 'deep_theme_header', [$this, 'deep_theme_header'] );
		add_action( 'deep_theme_footer', [$this, 'deep_theme_footer'] );
		add_action( 'deep_theme_single', [$this, 'deep_theme_single'] );
		add_action( 'deep_theme_sidebar', [$this, 'deep_theme_sidebar'] );
		add_action( 'deep_theme_search', [$this, 'deep_theme_search'] );
        add_action( 'deep_theme_page', [$this, 'deep_theme_page'] );  
        add_action( 'deep_theme_notfound_page', [$this, 'deep_theme_notfound_page'] );  
        add_action( 'wp_enqueue_scripts', [$this, 'deep_theme_fonts'] );
        add_action( 'wp_enqueue_scripts', [$this, 'deep_theme_scripts'] );
	}

	/**
	 * Index.
	 *
	 * @since   1.0.0
	 */
	public function deep_theme_index() {
        if ( defined( 'DEEPCORE' ) ) {
			do_action( 'index_content' );
		} else {
            ?>    
            <main id="primary" class="site-main">
                            
                <div class="deep-theme-index">                    
                    <?php
                    if ( have_posts() ) :

                        if ( is_home() && ! is_front_page() ) :
                            ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>
                            <?php
                        endif;

                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /*
                            * Include the Post-Type-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                            */
                            get_template_part( 'template-parts/content', get_post_type() );

                        endwhile;

                        the_posts_navigation();

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>
                </div>
                                    
            </main><!-- #main -->
                  
        <?php
        }		
    }

    /**
	 * 404.
	 *
	 * @since   1.0.4
	 */
	public function deep_theme_notfound_page() {
        if ( defined( 'DEEPCORE' ) ) {
			do_action( 'notfound_page' );
		} else {
            ?>
            <main id="primary" class="site-main">
                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'deep' ); ?></h1>
                    </header><!-- .page-header -->

                    <div class="page-content">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'deep' ); ?></p>

                            <?php
                            get_search_form();

                            the_widget( 'WP_Widget_Recent_Posts' );
                            ?>

                            <div class="widget widget_categories">
                                <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'deep' ); ?></h2>
                                <ul>
                                    <?php
                                    wp_list_categories(
                                        array(
                                            'orderby'    => 'count',
                                            'order'      => 'DESC',
                                            'show_count' => 1,
                                            'title_li'   => '',
                                            'number'     => 10,
                                        )
                                    );
                                    ?>
                                </ul>
                            </div><!-- .widget -->

                            <?php
                            /* translators: %1$s: smiley */
                            $deep_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'deep' ), convert_smilies( ':)' ) ) . '</p>';
                            the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$deep_archive_content" );

                            the_widget( 'WP_Widget_Tag_Cloud' );
                            ?>

                    </div><!-- .page-content -->
                </section><!-- .error-404 -->

                </main><!-- #main -->
            <?php
        }        
    }

    /**
	 * Header.
	 *
	 * @since   1.0.0
	 */
	public function deep_theme_header() {

        if ( defined( 'DEEPCORE' ) ) {
			do_action( 'header_content' );
		} else { 
            ?>
            <!doctype html>
            <html <?php language_attributes(); ?>>
            <head>
                <meta charset="<?php bloginfo( 'charset' ); ?>">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="profile" href="https://gmpg.org/xfn/11">

                <?php wp_head(); ?>
            </head>

            <body <?php body_class(); ?>>
            <?php wp_body_open(); ?>       
            <div id="page" class="site">
                <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'deep' ); ?></a>

                <header id="masthead" class="site-header">
                    <div class="header-display">
                        <div class="header-left-col">
                            <div class="site-branding">
                                <?php    
                                the_custom_logo();
                                if ( is_front_page() && is_home() ) :
                                    ?>
                                    <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                                    <?php
                                else :
                                    ?>
                                    <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                                    <?php
                                endif;
                                $deep_theme_description = get_bloginfo( 'description', 'display' );
                                if ( $deep_theme_description || is_customize_preview() ) :
                                    ?>
                                    <div class="site-description"><?php echo wp_kses_post( $deep_theme_description ); ?></div>
                                <?php endif; ?>
                            </div><!-- .site-branding -->
                        </div>

                        <div class="header-right-col">
                            <nav id="site-navigation" class="main-navigation">
                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15"><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/></svg></button>
                                <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'menu-1',
                                            'menu_id'=> 'primary-menu',                                 
                                        )
                                    );
                                ?>
                            </nav><!-- #site-navigation -->
                        </div>
                    </div>
                </header><!-- #masthead -->

                <?php if( is_home() ): ?>
                    <div class="deep-theme-headline">
                        <h2><?php esc_html_e( 'BLOG', 'deep' ); ?></h2>
                    </div>
                <?php endif;?>
            <?php        
        }
    }

    /**
	 * Footer.
	 *
	 * @since   1.0.0
	 */
	public function deep_theme_footer() {
        if ( defined( 'DEEPCORE' ) ) {
			do_action( 'footer_content' );
		} else {
            ?>
            </div><!-- #page -->
            <footer id="colophon" class="site-footer">
                <div class="site-info">
                    <?php                                                    
                    esc_html_e( 'Deep Theme Powered by WordPress ', 'deep' );                                
                    ?>
                </div><!-- .site-info -->
            </footer><!-- #colophon -->
            <?php wp_footer(); ?>

            </body>
            </html>
        <?php
        }        
    }
    
    /**
	 * Single.
	 *
	 * @since   1.0.0
	 */
	public function deep_theme_single() {

        if ( defined( 'DEEPCORE' ) ) {
			do_action( 'single_content' );
		} else {
            ?>
        
            <main id="primary" class="site-main">
        
                <div class="deep-theme-blog">
                    <?php
                    while ( have_posts() ) :
                        the_post();
            
                        get_template_part( 'template-parts/content', get_post_type() );
            
                        the_post_navigation(
                            array(
                                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'deep' ) . '</span> <span class="nav-title">%title</span>',
                                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'deep' ) . '</span> <span class="nav-title">%title</span>',
                            )
                        );
            
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
            
                    endwhile; // End of the loop.
                    ?>
                </div>
        
            </main><!-- #main -->
      
        <?php
        }        
    }

    /**
	 * Sidebar.
	 *
	 * @since   1.0.0
	 */
	public function deep_theme_sidebar() {

        if ( ! defined( 'DEEPCORE' ) ) {
			?>
        
            <aside id="secondary" class="widget-area">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </aside><!-- #secondary -->
      
            <?php
		} 
   
    }

    /**
	 * Search.
	 *
	 * @since   1.0.0
	 */
	public function deep_theme_search() {

        if ( defined( 'DEEPCORE' ) ) {
			do_action( 'search_content' );
		} else {
            ?>    
            <main id="primary" class="site-main">
                <div class="deep-theme-blog">        
                    <?php if ( have_posts() ) : ?>
            
                        <header class="page-header">
                            <h1 class="page-title">
                                <?php
                                /* translators: %s: search query. */
                                printf( esc_html__( 'Search Results for: %s', 'deep' ), '<span>' . get_search_query() . '</span>' );
                                ?>
                            </h1>
                        </header><!-- .page-header -->
            
                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();
            
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'search' );
            
                        endwhile;
            
                        the_posts_navigation();
            
                    else :
            
                        get_template_part( 'template-parts/content', 'none' );
            
                    endif;
                    ?>
                </div>
            </main><!-- #main -->
        <?php
        }        
    }

    /**
	 * Page.
	 *
	 * @since   1.0.0
	 */
	public function deep_theme_page() {

        if ( defined( 'DEEPCORE' ) ) {
            do_action( 'page_content' );
        } else {
            ?>

            <main id="primary" class="site-main">
                <div class="deep-theme-index">
                    <?php
                    while ( have_posts() ) :
                        the_post();
            
                        get_template_part( 'template-parts/content', 'page' );
            
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
            
                    endwhile; // End of the loop.
                    ?>
                </div>
            </main><!-- #main -->
        
        <?php
        }
        
    }

    /**
	 * Fonts.
	 *
	 * @since   1.0.0
	 */
	public function deep_theme_fonts() {
        wp_enqueue_style( 'deep-theme-rubik-font', get_template_directory_uri() . '/css/rubik-font.css', array(), DEEPTHEME );             
    }

    /**
	 * Scripts.
	 *
	 * @since   1.0.0
	 */
	public function deep_theme_scripts() {        
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'deep-theme-mobile-menu', get_template_directory_uri() .'/js/mobile-menu.js', array('jquery' ), DEEPTHEME, true );
    }
}
// Run
Deep_Theme_Init::get_instance();