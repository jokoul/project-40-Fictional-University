<?php
get_header();
while(have_posts()){
    the_post();//checks whether the loop has started and then sets the current post by moving, each time, to the next post in the queue ?>
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg');//provide the beginning part of the URL that we look in wp content ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title();//Displays or retrieves the current post title with optional markup. ?></h1>
        <div class="page-banner__intro">
          <p>DONT FORGET TO REPLACE ME LATER</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">
      <?php 
      // echo get_the_ID();//Retrieves the ID of the current item
      //echo wp_get_post_parent_id(get_the_ID());// Returns the ID of the post's parent. return 0 if the page doesn't have a parent
      $theParent = wp_get_post_parent_id(get_the_ID());
      if($theParent){ ?>
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p>
            <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent) ?></a> <span class="metabox__main"><?php the_title(); ?></span>
          </p>
        </div>
      <?php 
      }
      ?>
      <!--We display this menu if we are currently on a child page or if current page is a parent-->
      <?php 
      $testArray = get_pages(array(
        'child_of'=>get_the_ID()
      ));
      
      if($theParent or $testArray){ ?>
      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
        <ul class="min-list">
          <?php
          if($theParent){
            //if the current page has a parent do...
            $findChildrenOf = $theParent;
          }else{
            $findChildrenOf = get_the_ID();
          }
            wp_list_pages(array(
              'title_li' => NULL,//to remove "page"
              "child_of" => $findChildrenOf,//parent page id to retrieve child page or id of current
              'sor_column' => "menu_order"
            ))
          ?>
        </ul>
      </div>
          <?php  } ?>
 

      <div class="generic-content">
       <?php the_content();//show corresponding content ?>
      </div>
    </div>

<?php
}
get_footer();
?>
