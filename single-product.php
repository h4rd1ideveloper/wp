<?php
/**
 * Template part for displaying Header Branding
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package verthos
 */
get_header();
//var_dump(the_ID());

//
//$taxonomi = get_object_taxonomies($currenct_post, 'objects');

$currenct_post = get_post();
$categoria = get_the_terms($currenct_post->ID, 'categoria');
$currenct_typeSeller = get_post_meta( $currenct_post->ID, 'estado_da_venda', true );
$currenct_type = get_post_meta( $currenct_post->ID, 'tipo_da_meia', true );
$currenct_gender = get_post_meta( $currenct_post->ID, 'genero', true );
$currenct_ref = get_post_meta( $currenct_post->ID, 'ref', true );
$currenct_photo = get_post_meta( $currenct_post->ID, 'foto', true );
$currenct_desc = get_post_meta( $currenct_post->ID, 'descricao', true );
$currenct_cuid = get_post_meta( $currenct_post->ID, 'cuidados', true );
$currenct_guid = get_post_meta( $currenct_post->ID, 'guia_de_medidas', true );
//var_dump($categoria[0]);
//var_dump(count($categoria));
$title_one_desc = get_theme_mod('title_one-desc');
$title_one_cuid = get_theme_mod('title_one-cuid');
$title_one_guia = get_theme_mod('title_one-guia');
$title_one_btn = get_theme_mod('title_one-btn');
$title_one_rela_title = get_theme_mod('title_one-rela-title');
?>


<div class="section--main produto">
    <div class="w-container">
      <div class="flex--c">
        <div class="div-block-14">
          <div class="w-layout-grid grid__produto--content">
            <h2 id="w-node-f6a89ab28650-a275b6ee" class="title--main"><?php single_post_title(); ?> </h2>
            <div id="w-node-5a5c1947902a-a275b6ee" class="card--header single--produto" title="<?= $currenct_type; ?> - <?=$currenct_gender;?>"  style="background-image: url(<?=WPCG_Helper::fix_image_url($currenct_photo, 'full'); ?>);">
            <?php 
              if( $currenct_typeSeller == 'Promoção' ) { 
                $class = 'card__header--icon bg-purple';
              }
              elseif( $currenct_typeSeller === 'Mais vendida' ) {
                $class = 'card__header--icon';
              }else {
                $class = 'card__header--icon bg-blue';
              }
            ?>
              <div class="<?= $class; ?>">
                <p class="card__header__icon--text"><?= $currenct_typeSeller?></p>
              </div>
              <!--<div class="row--cart">
                <input class="add_cart apple-switch" type="checkbox" name="add_cart" id="add_cart-<?//$currenct_post->ID;?>">
              </div>-->
              
            </div>
            <div data-duration-in="300" data-duration-out="100" id="w-node-9c5e61212bc2-a275b6ee" class="tabs-3 w-tabs">
              <div class="tabs-menu-3 shadown w-tab-menu">
                <a data-w-tab="Tab 1" class="tab--produto w-inline-block w-tab-link w--current">
                  <div><?= $title_one_desc; ?></div>
                </a>
                <a data-w-tab="Tab 2" class="tab--produto w-inline-block w-tab-link">
                  <div class="text-block-7"><?= $title_one_cuid; ?></div>
                </a>
                <a data-w-tab="Tab 3" class="tab--produto w-inline-block w-tab-link">
                  <div class="text-block-8"><?= $title_one_guia; ?></div>
                </a>
              </div>
              <div class="tabs-content-3 w-tab-content">
                <div data-w-tab="Tab 1" class="tab-pane-tab-1-2 w-tab-pane w--tab-active">
                  <div class="produto__tab--content">
                    <p class="tab__content__text--center"><?= $currenct_desc; ?></p>
                  </div>
                </div>
                <div data-w-tab="Tab 2" class="w-tab-pane">
                  <div class="produto__tab--content">
                    <p class="tab__content__text--center"><?= $currenct_cuid; ?></p>
                  </div>
                </div>
                <div data-w-tab="Tab 3" class="w-tab-pane">
                  <div class="produto__tab--content">
                    <p class="tab__content__text--center"><?= $currenct_guid; ?></p>
                  </div>
                </div>
              </div>
            </div><a id="w-node-af6e71507088-a275b6ee" href="#" class="btn--att btn--efect right reusebtn w-button"><?= $title_one_btn; ?></a></div>
        </div>
        <div class="div-block-16">
          <div class="w-layout-grid grid__produtos--content">
            <h2 id="w-node-0d8663eacc9e-a275b6ee" class="title--main"><?= $title_one_rela_title  ?></h2>
            <div id="w-node-44d582f5e738-a275b6ee" class="flex__row--content">

            <?php 
              $white_list = array();
              foreach($categoria as $cat):
              $currenct_post_product = get_posts(
                  array(
                      'posts_per_page' => -1,
                      'post_type' => 'product',
                      'exclude'          => $currenct_post->ID,
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'categoria',
                              'terms' => $cat->term_id,
                          )
                      )
                  )
                );
                foreach($currenct_post_product  as $related_post):
                  $related_typeSeller = get_post_meta( $related_post->ID, 'estado_da_venda', true );
                  $related_type = get_post_meta( $related_post->ID, 'tipo_da_meia', true );
                  $related_gender = get_post_meta( $related_post->ID, 'genero', true );
                  $related_ref = get_post_meta( $related_post->ID, 'ref', true );
                  $related_photo = get_post_meta( $related_post->ID, 'foto', true );
                  $categoria = get_the_terms($related_post->ID, 'categoria');
                  if(!in_array($related_post->ID, $white_list)):
                    array_push($white_list, $related_post->ID )
              ?>
              <div class="card--product card" >
                <div class="card inside">
                  <a href="<?php echo esc_url( get_permalink($related_post->ID) ); ?>">
                  <div class="card--header" title="<?= $related_typeSeller; ?> - <?= $related_gender; ?>" style="background-image: url(<?=WPCG_Helper::fix_image_url($related_photo, 'full'); ?>);">
                  <?php 
                    if( $related_typeSeller == 'Promoção' ) { 
                      $class = 'card__header--icon bg-purple';
                    }
                    elseif( $related_typeSeller === 'Mais vendida' ) {
                      $class = 'card__header--icon';
                    }else {
                      $class = 'card__header--icon bg-blue';
                    }
                  
                  ?>
                    <div class="<?= $class; ?>">
                      <p class="card__header__icon--text"><?= $related_typeSeller?></p>
                    </div>
                  </div>
                  </a>
                  <div class="card--footer">
                    <div class="text-block"><strong><?= $related_typeSeller; ?><br><?= $related_gender; ?> </strong><span class="text-span"><strong class="bold-text-2"><?= $related_ref; ?></strong></span></div>
                    <div class="text-block-2"><strong><?= $related_post->post_excerpt; ?></strong></div>
                    <a href="<?php echo esc_url( get_permalink($related_post->ID) ); ?>" class="w-inline-block w--current">
                      <div class="btn--more">
                        <div class="text-block-3">SAIBA MAIS</div>
                      </div>
                    </a>
                  </div>
                  
                </div>
              </div>
                  <?php endif; ?>
                <?php endforeach; endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
$('document').ready(()=>{
  //console.log("ok")
  //const id = `<?//$currenct_post->ID;?>`;
  //const title = `<?//$currenct_post->post_title;?>`;
  //const ref = `<?//$currenct_ref;?>`;
  //const post_id = `add_cart-<?//$currenct_post->ID;?>`;
  //const ok = Lockr.get("state_lock")?Lockr.get("state_lock").filter(i=>i._id == id )[0]:false;
  //
  //$(""+'#'+post_id+"").prop("checked", ok?true:false)
  //$('.add_cart').change(function(){
  //    if($(this).is(':checked')) {
  //        console.log("true")
  //    Lockr.sadd("state_lock", {_id: id,title: title,ref: ref, checked: true})
  //    console.log(Lockr.get("state_lock"))
  //    } else {
  //        console.log("false")
  //    Lockr.set("state_lock", Lockr.get("state_lock").filter(i=>i._id!=id))
  //    console.log(Lockr.get("state_lock"))
  //    }
  //  });
})
</script>

<?php
get_footer();
?>