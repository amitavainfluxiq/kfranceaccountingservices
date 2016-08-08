<div class="container-fluid footerblock">
        <div class="footermenu">
            <ul>
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


                        if($page->ID!=144 && $page->ID!=246){

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
                            echo ' <li class="ssd dropdown lidiv'.$ic.'  '.$active.' " ><a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)"> ' . $page->post_title . ' </a>';

                            echo "<ul class=dropdown-menu>";


                            foreach($pages2 as $childpage){





                                echo ' <li class="ln lidiv'.$ic.'   "><a href="' . get_page_link($childpage->ID) . '"> ' . $childpage->post_title . ' </a></li>';

                            }
                            echo "</ul>";

                        }else{
                            echo ' <li class="ssd lidiv'.$ic.' '.$active.' " ><a  class="dropdown-toggle" href="' . get_page_link($page->ID) . '"> ' . $page->post_title . ' </a>';
                        }


                        echo "</li>";

                        $ic++;
                        }

                    endforeach;
                }
                ?>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="footercopyright">
            &copy; 2016 Real Accounting Solutions
        </div>
        <div class="footersociallink">
            <span>SOCIAL</span>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/fticon-twitter.png" alt="twitter"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/fticon-facebook.png" alt="facebook"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/fticon-googleplus.png" alt="linkedin"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/fticon-linkedin.png" alt="linkedin"></a>
        </div>
        <div class="clearfix"></div>
</div>