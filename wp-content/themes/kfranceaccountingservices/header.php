<div class="container-fluid topheader">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 location">
                       <img src="<?php echo get_template_directory_uri(); ?>/images/icon-location.png" alt="location">
                        <p>26151A VIA CALIFORNIA, CAPISTRANO BEACH, CA  92624</p>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 call">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-call.png" alt="call">
                        <p><a href="tel:949.259.3939">949.259.3939</a></p>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 email">
                        <a href="mailto:kfrance.acctg@gmail.com" target="_top">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icon-email.png" alt="email">
                            <p>kfrance.acctg@gmail.com</p>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 sociallinks">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" alt="twitter"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt="facebook"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-googleplus.png" alt="linkedin"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-linkedin.png" alt="linkedin"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid topblock">

<div class="topmenu">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <nav class="navbar navbar-default">


    <div class="navbar-header">
    
    <span class="responsivemenu">MENU</span>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">



          <?php
          $args = array(
              'sort_column' => 'post_date',
              'sort_order' => 'asc',
              'child_of' => '0',
              'post_type' => 'page',
              'post_status' => 'publish',
              'parent' => 0,

          );
          $pages = get_pages($args);

          if ($pages) {
              $ic=0;
              foreach ($pages as $page) :

                  if($page->ID!=147){


                  $args2 = array(
                      'sort_column' => 'post_date',
                      'sort_order' => 'asc',
                      'child_of' => '0',
                      'post_type' => 'page',
                      'post_status' => 'publish',
                      'parent' => $page->ID,

                  );
                  $pages2 = get_pages($args2);


                  if ( is_page( $page->ID ) || $post->post_parent == $page->ID ) {
                      $active = 'active';
                  } else {
                      $active = '';
                  }


                      if(count($pages2)>0) {
                         // echo ' <li class="ssd dropdown lidiv'.$ic.' " ><a data-toggle="dropdown" class="dropdown-toggle" href="' . get_page_link($page->ID) . '"> ' . $page->post_title . ' </a>';
                          echo ' <li class="ssd dropdown lidiv'.$ic.' '.$active.' " ><a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)"> ' . $page->post_title . ' </a>';

                          echo "<ul class=dropdown-menu>";


                          foreach($pages2 as $childpage){

                              if ( is_page( $childpage->ID ) ) {
                                  $active = 'activechild';
                              } else {
                                  $active = '';
                              }


                              echo ' <li class="ln lidiv'.$ic.' '.$active.' "><a href="' . get_page_link($childpage->ID) . '"> ' . $childpage->post_title . ' </a></li>';

                          }
                          echo "</ul>";

                      }else{
                          echo ' <li class="ssd lidiv'.$ic.' '.$active.'" ><a  class="dropdown-toggle" href="' . get_page_link($page->ID) . '"> ' . $page->post_title . ' </a>';
                      }


                  echo "</li>";

                  $ic++;

                  }
              endforeach;

          }
          ?>







      </ul>
      
 
 
    </div>

</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>


</div>

