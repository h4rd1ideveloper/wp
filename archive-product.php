<?php
/**
 * Template part for displaying Header Branding
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package verthos
 */
get_header();
$categorias = get_terms( array(
    'taxonomy' => 'categoria',
    'hide_empty' => false,
));
$title_product_all = get_theme_mod('title_all-product');
$title_product_all_cat = get_theme_mod('title_all-product-cat');
?>

<div class="section--main main-page">
    <div class="container-4 w-container">
        <div class="w-layout-grid grid-5">
            <h2 id="w-node-66c6e21abdf4-97f579ce" class="title--main"><?=$title_product_all;?></h2>
            <div data-duration-in="300" data-duration-out="100" id="w-node-beb16c328078-97f579ce" class="tabs-2 w-tabs">
                <div class="tabs-menu-2 w-tab-menu">
                    <a data-w-tab="Tab 0" class="tab__product--link w-inline-block w-tab-link w--current">
                        <div><?=$title_product_all_cat;?></div>
                    </a>
                    <?php
                      $i = 1;
                          foreach($categorias as $categoria):
                      ?>
                    <a data-w-tab="Tab <?=$i;?>" class="tab__product--link w-inline-block w-tab-link ">
                        <div><?=$categoria->name;?></div>
                    </a>
                    <?php $i = $i+1; endforeach;?>
                </div>

                <div class="tabs-content-2 w-tab-content">
                    <?php
                      $all_post = get_posts(
                        array(
                            'posts_per_page' => -1,
                            'post_type' => 'product',
                            )
                        );?>
                    <div data-w-tab="Tab 0" class="w-tab-pane">
                        <div class="flex__row--content">
                            <?php
                              foreach($all_post as $onde_post):
                                $one_sock_typeSeller = get_post_meta( $onde_post->ID, 'estado_da_venda', true );
                                $one_sock_type = get_post_meta( $onde_post->ID, 'tipo_da_meia', true );
                                $one_sock_gender = get_post_meta( $onde_post->ID, 'genero', true );
                                $one_sock_ref = get_post_meta( $onde_post->ID, 'ref', true );
                                $one_sock_photo = get_post_meta( $onde_post->ID, 'foto', true );
                                $one_sock_photo = get_post_meta( $onde_post->ID, 'foto', true );

                          ?>
                            <div class="card--product card">
                                <div class="card inside">
                                <a href="<?php echo esc_url( get_permalink($onde_post->ID) ); ?>">
                                    <div class="card--header" title="<?=$one_sock_type;?> - <?=$one_sock_gender;?>"
                                        style="background-image: url(<?=WPCG_Helper::fix_image_url($one_sock_photo, 'full');?>);">
                                        <?php 
                                          if( $one_sock_typeSeller == 'Promoção' ) { 
                                            $one_class = 'card__header--icon bg-purple';
                                          }
                                          elseif( $one_sock_typeSeller === 'Mais vendida' ) {
                                            $one_class = 'card__header--icon';
                                          }else {
                                            $one_class = 'card__header--icon bg-blue';
                                          }
                                        ?>
                                        <div class="<?=$one_class;?>">
                                            <p class="card__header__icon--text"><?=$one_sock_typeSeller?></p>
                                        </div>
                                    </div>
                                    </a>
                                    <div class="card--footer">
                                        <div class="text-block">
                                            <strong><?=$one_sock_type;?><br><?=$one_sock_gender;?></strong><span
                                                class="text-span"><strong
                                                    class="bold-text-2"><?=$one_sock_ref;?></strong></span></div>
                                        <div class="text-block-2"><strong><?=$onde_post->post_excerpt;?></strong></div>
                                        <a href="<?php echo esc_url( get_permalink($onde_post->ID) ); ?>"
                                            class="w-inline-block">
                                            <div class="btn--more">
                                                <div class="text-block-3">Saiba mais</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <?php
                      $i = 1;
                      foreach($categorias as $cat):
                        
                        $post_product = get_posts(
                          array(
                              'posts_per_page' => -1,
                              'post_type' => 'product',
                              'tax_query' => array(
                                  array(
                                      'taxonomy' => 'categoria',
                                      'terms' => $cat->term_id,
                                  )
                              )
                          )
                        );
                    ?>

                    <div data-w-tab="Tab <?=$i;?>" class="w-tab-pane">
                        <div class="flex__row--content">
                            <?php
                  
                              foreach($post_product as $product):
                                $sock_typeSeller = get_post_meta( $product->ID, 'estado_da_venda', true );
                                $sock_type = get_post_meta( $product->ID, 'tipo_da_meia', true );
                                $sock_gender = get_post_meta( $product->ID, 'genero', true );
                                $sock_ref = get_post_meta( $product->ID, 'ref', true );
                                $sock_photo = get_post_meta( $product->ID, 'foto', true );
                                $sock_photo = get_post_meta( $product->ID, 'foto', true );
                            ?>
                            <div class="card--product card">
                                <div class="card inside"><a href="<?php echo esc_url( get_permalink($product->ID) ); ?>">
                                        <div class="card--header" title="<?=$sock_type;?> - <?=$sock_gender;?>"
                                            style="background-image: url(<?=WPCG_Helper::fix_image_url($sock_photo, 'full');?>);">
                                            <?php 
                                              if( $sock_typeSeller == 'Promoção' ) { 
                                                $class = 'card__header--icon bg-purple';
                                              }
                                              elseif( $sock_typeSeller === 'Mais vendida' ) {
                                                $class = 'card__header--icon';
                                              }else {
                                                $class = 'card__header--icon bg-blue';
                                              }
                                            ?>
                                            <div class="<?=$class;?>">
                                                <p class="card__header__icon--text"><?=$sock_typeSeller?></p>
                                            </div>
                                        </div>
                                        </a>
                                    <div class="card--footer">
                                        <div class="text-block">
                                            <strong><?=$sock_type;?><br><?=$sock_gender;?></strong><span
                                                class="text-span"><strong
                                                    class="bold-text-2"><?=$sock_ref;?></strong></span></div>
                                        <div class="text-block-2"><strong><?=$product->post_excerpt;?></strong></div>
                                        <a href="<?php echo esc_url( get_permalink($product->ID) ); ?>"
                                            class="w-inline-block">
                                            <div class="btn--more">
                                                <div class="text-block-3">Saiba mais</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                           
                            <?php endforeach;?>
                        </div>
                    </div>
                    <?php $i = $i+1; endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$("document").ready(function() {
    console.log("inside")
    $(".card--product.card").each(function() {
        $(this).css("opacity", "1")
    })
})
</script>

<?php
get_footer();
?>