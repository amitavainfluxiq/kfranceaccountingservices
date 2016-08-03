<?php

//remove_filter( 'the_content', 'wpautop' );
//remove_filter( 'the_excerpt', 'wpautop' );
//remove_filter( 'comment_text', 'wpautop', 30 );



add_filter('tiny_mce_before_init', 'myextensionTinyMCE' );



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



function wpb_postsbycategory() {
// the query
    $the_query = new WP_Query( array( 'category_name' => 'blog', 'posts_per_page' => 300 ,'order'=>'DESC','orderby'=>'date' ) );
    $string='';
// The Loop
    if ( $the_query->have_posts() ) {
        $string .= '<div class="postblog1 postsbycategorymain">';
        while ( $the_query->have_posts() ) {

            $the_query->the_post();
            //var_dump( get_the_ID()); exit;

            $metaval=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_2_fieldID_1_numInSet_0']);
            $postimg=(get_post_meta( intval($metaval[0]) )['_wp_attached_file'][0]);
            if($postimg== NULL){
                $postimg='http://ast.influxiq.com/wp-content/themes/pearlhealth/images/logo.png';

            }
            else $postimg="/wp-content/uploads/".$postimg;
            //var_dump(get_post_meta( 424 ));

            /*echo '<pre>';
            print_r($postimg);
            echo '</pre>';*/
            $string .= '<ul class="postsbycategory widget_recent_entries">';
            //$the_query->the_post();

                // if no featured image is found
                $string .= '
                <li class="contentc"> <h2><div class="contentcimgwrapper"><img src='.$postimg.' /></div>
                <div class="titleb"><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a></div><div class="mapost_date">'.get_the_date().'</div>
                ' . wp_trim_words(get_the_content(),150) .'</h2><div class="clear"></div></li>';


            $string .= '<a href='. get_the_permalink() .' class="blogreadmore">Read More</a>
            <div class="bottomsharethis">
            <span class="st_sharethis_large" displayText="ShareThis"></span>
            <div class="mapost_link_sharethise" >
                                 <span class="st_facebook_large" displayText="Facebook"></span>
                                 <span class="st_twitter_large" displayText="Tweet"></span>
                                 <span class="st_linkedin_large" displayText="LinkedIn"></span>
                                 <span class="st_pinterest_large" displayText="Pinterest"></span>
                                 <span class="st_email_large" displayText="Email"></span>
                            </div>

            </div>

            ';
            $string .= '</ul>';

        }
    } else {
        // no posts found
    }

    $string .= '</div>';

    return $string;

    /* Restore original Post Data */
    wp_reset_postdata();
}
// Add a shortcode
add_shortcode('categoryposts', 'wpb_postsbycategory');

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');


function my_widget_content_wrap($content) {
    $content = '<div class="some-other-div">'.$content.'</div>';
    return $content;
}
add_filter('widget_text', 'my_widget_content_wrap');


function wpb_homeblogposts() {
// the query
    $the_query = new WP_Query( array( 'category_name' => 'blog', 'posts_per_page' => 300 ,'order'=>'DESC','orderby'=>'date' ) );
    $string='';
// The Loop
    if ( $the_query->have_posts() ) {
        $string .= '<div class="homepostblog1">';
        while ( $the_query->have_posts() ) {

            $the_query->the_post();
            //var_dump( get_the_ID()); exit;

            $metaval=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_2_fieldID_1_numInSet_0']);
            $postimg=(get_post_meta( intval($metaval[0]) )['_wp_attached_file'][0]);
            if($postimg== NULL){
                $postimg='http://ast.influxiq.com/wp-content/themes/pearlhealth/images/logo.png';

            }
            else $postimg="/wp-content/uploads/".$postimg;
            //var_dump(get_post_meta( 424 ));

            /*echo '<pre>';
            print_r($postimg);
            echo '</pre>';*/
            //$string .= '<ul class="postsbycategory widget_recent_entries">';
            //$the_query->the_post();

            // if no featured image is found
           /* $string .= '
                <li class="contentc"> <h2><div class="contentcimgwrapper"><img src='.$postimg.' /></div>
                <div class="titleb"><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a></div>
                ' . wp_trim_words(get_the_content(),100) .'</h2><div class="clear"></div></li>';*/
            $string .='<div class="block2rightconbox">
            <div class="blogimghome">
<img class="block2rightcarimg" src="'.$postimg.'" /></div>
<h2>'.wp_trim_words(get_the_title(),50).'</h2>
<p><span class="homeblockdate">'.get_the_date().'</span></p>
<p>' . wp_trim_words(get_the_content(),80) .'</p>
<p><a class="homeblocklinksml" href="'.get_the_permalink().'">Read More</a></p>
</div>';


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
    } else {
        // no posts found
    }

    $string .= '</div>';

    return $string;

    /* Restore original Post Data */
    wp_reset_postdata();
}
// Add a shortcode
add_shortcode('categoryposts1', 'wpb_homeblogposts');

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');


add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'post',
        array(
            'labels' => array(
                'name' => __( 'team' ),
                'singular_name' => __( 'team' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}


// team page top slider


function wp_teamslider() {
// the query
    $the_query = new WP_Query( array( 'category_name' => 'team', 'posts_per_page' => 300 ,'order'=>'DESC','orderby'=>'date' ) );
    $string='';
    $i=0;
// The Loop
    if ( $the_query->have_posts() ) {
        $string .= '<div class="team1block_wrapper">  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
   <div class="carousel-inner" role="listbox">';
        while ( $the_query->have_posts() ) {

            $the_query->the_post();
            //var_dump( get_the_ID()); exit;

            $descval=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_2_numInSet_0']);
            $designation=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_1_numInSet_0']);
            $pic=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_3_numInSet_0']);
            $postimg=(get_post_meta( intval($pic[0]) )['_wp_attached_file'][0]);
            //print_r($pic);
            //print_r($postimg);
            if($postimg== NULL){
                $postimg='/wp-content/themes/pearlhealth/images/logo2.png';

            }
            else $postimg="/wp-content/uploads/".$postimg;
            //var_dump(get_post_meta( 424 ));

            /*echo '<pre>';
            print_r($postimg);
            echo '</pre>';*/
            //$string .= '<ul class="postsbycategory widget_recent_entries">';
            //$the_query->the_post();

            // if no featured image is found
            /* $string .= '
                 <li class="contentc"> <h2><div class="contentcimgwrapper"><img src='.$postimg.' /></div>
                 <div class="titleb"><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a></div>
                 ' . wp_trim_words(get_the_content(),100) .'</h2><div class="clear"></div></li>';*/
           /* $string .='<div class="block2rightconbox">
            <div class="blogimghome">
<img class="block2rightcarimg" src="'.$postimg.'" /></div>
<h2>'.wp_trim_words(get_the_title(),50).'</h2>
<p><span class="homeblockdate">'.get_the_date().'</span></p>
<p>' . wp_trim_words(get_the_content(),80) .'</p>
<p><a class="homeblocklinksml" href="'.get_the_permalink().'">Read More</a></p>
</div>';*/

            if($i==0){
            $string.=' <div class="item active">
     <div class="team_block1row">
       <div class="team_block1_left">
       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%; height:100%;">
     <tr>
    <td align="center" valign="middle">
       <img src="'.$postimg.'" alt="teamimg1">
       </td>
  </tr>
</table>

       </div>

         <div class="team_block1_right">
          <h2>'. get_the_title() .'</h2>
          <h3>'.$designation[0].'</h3>

          <h4>'.$descval[0].'</h4>



         		<a class="team_block1btn" href="/contact">Contact Now</a>

         	<div class="clearfix"></div>

         </div>



     	<div class="clearfix"></div>
     </div>
</div>';
            }
            else {

                $string.=' <div class="item ">
     <div class="team_block1row">
       <div class="team_block1_left">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%; height:100%;">
  <tr>
    <td align="center" valign="middle">

        <img src="'.$postimg.'" alt="teamimg1">
        </td>
  </tr>
</table>

        </div>

         <div class="team_block1_right">
          <h2>'. get_the_title() .'</h2>
          <h3>'.$designation[0].'</h3>

          <h4>'.$descval[0].'</h4>

         		<a class="team_block1btn" href="/contact">Contact Now</a>

         	<div class="clearfix"></div>

         </div>



     	<div class="clearfix"></div>
     </div>
</div>';

            }
            $i++;



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
    } else {
        // no posts found
    }

    $string .= '</div></div></div>';

    return $string;

    /* Restore original Post Data */
    wp_reset_postdata();
}
// Add a shortcode
add_shortcode('teamlistslider', 'wp_teamslider');

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');




// team page bottom contain



function wp_teamlist() {
// the query
    $the_query = new WP_Query( array( 'category_name' => 'team', 'posts_per_page' => 300 ,'order'=>'DESC','orderby'=>'date' ) );
    $string='';
    $i=0;
// The Loop
    if ( $the_query->have_posts() ) {
        $string .= '<div class="container-fluid team_block2">';
        while ( $the_query->have_posts() ) {

            $the_query->the_post();
            //var_dump( get_the_ID()); exit;

            $descval=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_2_numInSet_0']);
            $designation=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_1_numInSet_0']);
            $pic=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_3_numInSet_0']);
            $fb=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_4_numInSet_0']);
            $twitter=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_5_numInSet_0']);
            $instagram=(get_post_meta( get_the_ID() )['_simple_fields_fieldGroupID_3_fieldID_6_numInSet_0']);

            //print_r($fb);
            if($fb[0]==''){
                $fb[0]='#';
            }
            if($twitter[0]==''){
                $twitter[0]='#';
            }
            if($instagram[0]==''){
                $instagram[0]='#';
            }

            $postimg=(get_post_meta( intval($pic[0]) )['_wp_attached_file'][0]);
            //print_r($pic);
            //print_r($postimg);
            if($postimg== NULL){
                $postimg='/wp-content/themes/pearlhealth/images/team_demo_logo.png';

            }
            else $postimg="/wp-content/uploads/".$postimg;
            //var_dump(get_post_meta( 424 ));

            /*echo '<pre>';
            print_r($postimg);
            echo '</pre>';*/
            //$string .= '<ul class="postsbycategory widget_recent_entries">';
            //$the_query->the_post();

            // if no featured image is found
            /* $string .= '
                 <li class="contentc"> <h2><div class="contentcimgwrapper"><img src='.$postimg.' /></div>
                 <div class="titleb"><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a></div>
                 ' . wp_trim_words(get_the_content(),100) .'</h2><div class="clear"></div></li>';*/
            /* $string .='<div class="block2rightconbox">
             <div class="blogimghome">
 <img class="block2rightcarimg" src="'.$postimg.'" /></div>
 <h2>'.wp_trim_words(get_the_title(),50).'</h2>
 <p><span class="homeblockdate">'.get_the_date().'</span></p>
 <p>' . wp_trim_words(get_the_content(),80) .'</p>
 <p><a class="homeblocklinksml" href="'.get_the_permalink().'">Read More</a></p>
 </div>';*/


                /*$string.=' <div class="item active">
     <div class="team_block1row">
       <div class="team_block1_left">  <img src="'.$postimg.'" alt="teamimg1"></div>

         <div class="team_block1_right">
          <h2>'. get_the_title() .'</h2>
          <h3>'.$designation[0].'</h3>

          <h4>'.$descval[0].'</h4>



         		<a class="team_block1btn" href="/contact">Contact Now</a>

         	<div class="clearfix"></div>

         </div>



     	<div class="clearfix"></div>
     </div>
</div>';*/


            $string.=' <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 teamblock_con">
 <div class="teamblock_con_top"></div>

 <div class="teamblock_con_main">

 <h2>'. get_the_title() .'</h2>
 <div class="teamimg">
   <img src="'.$postimg.'">
 </div>
 <p>'.$designation[0].'</p>
  <!--<div class="sociallinks">

    	 <a target="_blank" href="'.$fb[0].'" >  <img src="../wp-content/themes/pearlhealth/images/icon_f.png"></a>
     <a target="_blank" href="'.$twitter[0].'">  <img src="../wp-content/themes/pearlhealth/images/icon_t.png"></a>
      	<a target="_blank" href="'.$instagram[0].'">   <img src="../wp-content/themes/pearlhealth/images/icon_i.png"></a>

 </div>-->

 <a class="btn btn-default btnmore btnblue">View Bio</a>
 </div>
 </div>';




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
    } else {
        // no posts found
    }

    $string .= '<div class="clearfix"></div></div>';

    return $string;

    /* Restore original Post Data */
    wp_reset_postdata();
}
// Add a shortcode
add_shortcode('teamlist', 'wp_teamlist');

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');



?>
