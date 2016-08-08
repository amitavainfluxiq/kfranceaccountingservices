<?php

//remove_filter( 'the_content', 'wpautop' );
//remove_filter( 'the_excerpt', 'wpautop' );
//remove_filter( 'comment_text', 'wpautop', 30 );



add_filter('tiny_mce_before_init', 'myextensionTinyMCE' );

// tiny mc editer

function myextensionTinyMCE($init) {
    // Command separated string of extended elements
    $ext = 'span[class|style],h1[class|style],h2,h3,hr,ul[class],ol[class],li[class],div[class|id|style|link],meta';

    // Add to extended_valid_elements if it alreay exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    // Super important: return $init!
    return $init;
}



add_filter('tiny_mce_before_init', 'myextensionTinyMCE' );







// create a new contentype in wp
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'testimonial',
        array(
            'labels' => array(
                'name' => __( 'Testimonial' ),
                'singular_name' => __( 'testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}


add_action( 'init', 'create_post_blog' );
function create_post_blog() {
    register_post_type( 'blog',
        array(
            'labels' => array(
                'name' => __( 'Blog' ),
                'singular_name' => __( 'blog' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}














function wp_testimoniallist() {
// the query

    global $paged;
    $the_query = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => 3 ,'order'=>'DESC','orderby'=>'date', 'paged' => $paged ) );
    $string='';
    $i=0;
// The Loop
    if ( $the_query->have_posts() ) {
        $string .= ' <div class="testimonials_block_wrapper">';
        while ( $the_query->have_posts() ) {

            $the_query->the_post();
            //var_dump( get_the_ID()); //exit;

            /*$descval=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_2_numInSet_0']);
            $designation=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_1_numInSet_0']);
            $pic=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_3_numInSet_0']);
            $fb=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_4_numInSet_0']);
            $twitter=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_5_numInSet_0']);
            $instagram=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_6_numInSet_0']);*/

            //print_r($fb);


//            $postimg=(get_post_meta( intval($pic[0]) )['_wp_attached_file'][0]);
//            //print_r($pic);
//            //print_r($postimg);
//            if($postimg== NULL){
//                $postimg='/wp-content/themes/pearlhealth/images/team_demo_logo.png';
//
//            }
//            else $postimg="/wp-content/uploads/".$postimg;



            $testimonialdescription=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_4_fieldID_4_numInSet_0']);
            $pic=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_4_fieldID_1_numInSet_0']);
            //var_dump($pic);
            $postimg=(get_post_meta( intval($pic[0]) )['_wp_attached_file'][0]);
           //print_r($pic);
           //print_r($postimg);
           if($postimg== NULL){
               $postimg='/wp-content/themes/kfranceaccountingservices/images/testimonial_demo_logo.png';

           }
           else $postimg="/wp-content/uploads/".$postimg;


            $string.='<div class="row">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td align="center" valign="middle">
<div class="tblock_img"><img src="'.$postimg.'" /></div>
</td>

<td align="center" valign="middle">
<div class="tblock_name">'.get_the_title().'</div>
</td>

<td align="center" valign="middle">
<div class="tblock_des">'.$testimonialdescription[0].'</div>
</td>

</tr>

</table>

<div class="clearfix"></div>
</div> ';




            /* $string .= '<a href='. get_the_permalink() .' class="blogreadmore">Read More</a>
             <div class="bottomsharethis">
             <span class="st_sharethis_large" displayText="ShareThis"></span>
             <div class="mapost_link_sharethise" >
                                  <span class="st_facebook_large" displayText="Facebook"></span>
                                  <span class="st_twitter_large" displayText="Tweet"></span>
                                  <span class="st_linkedin_large" displayText="LinkedIn"></span>
                                  <span class="st_pinterest_large" displayText="Pinterest"></span>
                                  <span class="st_email_large" displayText="Email"></span>
                             </div>
             <div class="mapost_date">'.get_the_date().'</div>
             </div>

             ';*/
            //$string .= '</ul>';

        }

        $string .= '</div>';
        $string.= '<div class="blogpagination">';
        $big = 999999999; // need an unlikely integer
        $string.= paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $the_query->max_num_pages //$q is your custom query
        ) );
        $string.= '</div>';

    } else {
        // no posts found
    }

    $string .= '';

    return $string;

    /* Restore original Post Data */
    wp_reset_postdata();
}
// Add a shortcode
add_shortcode('testimoniallist', 'wp_testimoniallist');


function wp_hometestimoniallist() {
// the query
    $the_query = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => 50 ,'order'=>'DESC','orderby'=>'date' ) );
    $string='';
    // indicator manage
    $slideIndexStr='';
    $slideIndex=0;
    $i=0;
// The Loop
    if ( $the_query->have_posts() ) {
        $string .= '<div class="item active">';
        $slideIndexStr .= '<li data-target="#myhometestiCarousel" data-slide-to="'.$slideIndex.'" class="active"></li>';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            //var_dump( get_the_ID()); //exit;

            if($i%2 == 0 && $i >0){
                $string .= '</div><div class="item">';
                $slideIndexStr .= '<li data-target="#myhometestiCarousel" data-slide-to="'.++$slideIndex.'"></li>';
            }


            $testimonialdescription=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_4_fieldID_4_numInSet_0']);
            $pic=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_4_fieldID_1_numInSet_0']);
            //var_dump($pic);
            $postimg=(get_post_meta( intval($pic[0]) )['_wp_attached_file'][0]);
            //print_r($pic);
            //print_r($postimg);
            if($postimg== NULL){
                $postimg='/wp-content/themes/kfranceaccountingservices/images/defaultlogo.png';

            }
            else $postimg="/wp-content/uploads/".$postimg;


            $string.='<div class="hometestimonialblockcontent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6"><h4>Task</h4></div>
                                        <div class="col-md-6"><span><h4>'.get_the_title().'</h4></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><h4>Review</h4></div>
                                        <div class="col-md-6"><span>'.$testimonialdescription[0].'</span></div>
                                    </div>
                                </div>
                            </div>';






            $i++;

        }



    } else {
        // no posts found

    }

    $string .= '</div>';
//$string = 'koushik';


    $newString = '<ol class="carousel-indicators">'.$slideIndexStr.'</ol>';
    $newString .= '<div class="carousel-inner" role="listbox">'.$string.'</div>';


    return $newString;

    /* Restore original Post Data */
    wp_reset_postdata();
}
// Add a shortcode
add_shortcode('hometestimoniallist', 'wp_hometestimoniallist');


function wp_bloglist() {
// the query
    global $paged;
    $the_query = new WP_Query( array( 'post_type' => 'blog', 'posts_per_page' => 3 ,'order'=>'DESC','orderby'=>'date' , 'paged' => $paged ) );
    $string='';
    $i=0;
// The Loop
    if ( $the_query->have_posts() ) {
        $string .= '';
        while ( $the_query->have_posts() ) {

            $the_query->the_post();

            $testimonialdescription=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_6_fieldID_1_numInSet_0']);

            $pic=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_6_fieldID_2_numInSet_0']);
            //var_dump($pic);
            $postimg=(get_post_meta( intval($pic[0]) )['_wp_attached_file'][0]);
            //print_r($pic);
            //print_r($postimg);
            if($postimg== NULL){
                $postimg='/wp-content/themes/kfranceaccountingservices/images/defaultlogo.png';

            }
            else $postimg="/wp-content/uploads/".$postimg;


            $string.='<div class="container blog_box"><div class="blogWrapper"><img src="'.$postimg.'" /> </div>
 <div class="blogdate">
 <span>'.date('M j, Y',strtotime(get_the_date())).'</span>
 </div> 
 <div class="blogdes">
 
 <h2>'.get_the_title().'</h2>
 
 <h3>'. wp_trim_words(get_the_content(),100) .'</h3> 
 <a class="readmore" href="/blog-details?id='.get_the_ID().'&title='.get_the_title().'">Read More <span>&#8594;</span></a> 
 </div>
 
<div class="clearfix"></div>
</div>';


        }

        $string.= '<div class="blogpagination">';
        $big = 999999999; // need an unlikely integer
        $string.= paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $the_query->max_num_pages //$q is your custom query
        ) );
        $string.= '</div>';
    } else {
        // no posts found
    }

    $string .= '';

    return $string;

    /* Restore original Post Data */
    wp_reset_postdata();
}
// Add a shortcode
add_shortcode('bloglist', 'wp_bloglist');


function wp_blogdetail(){

    //var_dump($_REQUEST['id']);
    //echo 9878778;

   // $the_query = new WP_Query( array( 'post_id'=>@$_REQUEST['id'] ,'post_type' => 'blog', 'posts_per_page' => 300 ,'order'=>'DESC','orderby'=>'date') );
    //
    $the_query = get_post($_REQUEST['id']);
    $string='';
    $testimonialdescription=(get_post_meta($_REQUEST['id'] )['_simple_fields_fieldGroupID_6_fieldID_1_numInSet_0']);

            $pic=(get_post_meta($_REQUEST['id'] )['_simple_fields_fieldGroupID_6_fieldID_2_numInSet_0']);
            //var_dump($pic);
            $postimg=(get_post_meta( intval($pic[0]) )['_wp_attached_file'][0]);
            //print_r($pic);
            //print_r($postimg);
            if($postimg== NULL){
                $postimg='/wp-content/themes/kfranceaccountingservices/images/defaultlogo.png';

            }
            else $postimg="/wp-content/uploads/".$postimg;


            $string.='<div class="blogWrapper"><img src="'.$postimg.'" /> </div>
 <div class="blogdate">
 <span>'.@date('M j, Y',strtotime($the_query->post_date)).'</span>
 </div> 
 <div class="blogdes">
 
 <h2>'.@$the_query->post_title.'</h2>
 
 <h4>'. @$the_query->post_content .'</h4>

 </div>
 

';




            /* $string .= '<a href='. get_the_permalink() .' class="blogreadmore">Read More</a>
             <div class="bottomsharethis">
             <span class="st_sharethis_large" displayText="ShareThis"></span>
             <div class="mapost_link_sharethise" >
                                  <span class="st_facebook_large" displayText="Facebook"></span>
                                  <span class="st_twitter_large" displayText="Tweet"></span>
                                  <span class="st_linkedin_large" displayText="LinkedIn"></span>
                                  <span class="st_pinterest_large" displayText="Pinterest"></span>
                                  <span class="st_email_large" displayText="Email"></span>
                             </div>
             <div class="mapost_date">'.get_the_date().'</div>
             </div>

             ';*/
            //$string .= '</ul>';

      //  }
   // } else {
        // no posts found
   // }

    $string .= '';

    return $string;

    /* Restore original Post Data */
    wp_reset_postdata();
}

// Add a shortcode
add_shortcode('blogdetailpage', 'wp_blogdetail');


// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');



?>
