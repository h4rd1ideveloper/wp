<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package verthos
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <div class="container">
                <section class="main-section error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e( 'Página não encontrada.', 'verthos' ); ?></h1>
                    </header><!-- .page-header -->

                    <div class="page-content">
                        <p><?php esc_html_e( 'Parece que nada foi encontrado nesta localização. Experimente os links abaixo, ou a pesquisa.', 'verthos' ); ?></p>

						<?php
						get_search_form();

						the_widget( 'WP_Widget_Recent_Posts' );
						?>

                        <div class="widget widget_categories">
                            <h2 class="widget-title"><?php esc_html_e( 'Categorias mais usadas', 'verthos' ); ?></h2>
                            <ul>
								<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
								?>
                            </ul>
                        </div><!-- .widget -->

						<?php

						/* translators: %1$s: smiley */
						$archive_content = '<p>' . esc_html__( 'Tente olhar nos arquivos mensais. %1$s', 'verthos' ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

						the_widget( 'WP_Widget_Tag_Cloud' );
						?>

                    </div><!-- .page-content -->
                </section><!-- .error-404 -->
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
