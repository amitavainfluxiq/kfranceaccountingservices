 <!DOCTYPE html>
<html>
<head lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php echo simple_fields_value('seometa'); ?>


    <title><?php echo simple_fields_value('titleseo') ?> </title>

    <link href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" rel="icon">
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/ionicons.min.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/style1.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/media.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/media1.css" type="text/css" rel="stylesheet" />


    <script type='text/javascript' src='/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.40.0-2013.08.13'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var _wpcf7 = {"loaderUrl":"\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ..."};
        /* ]]> */
    </script>
    <script type='text/javascript' src='/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=3.5.2'></script>


</head>
<body>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

if (get_the_category()[0]->slug=='blog'){

?>
<div class='postsbycategorymain' >
<ul class='postsbycategory widget_recent_entries'>
<li class='titleb'>
<?php echo get_the_title(); ?>
</li>
    <li class="contentc">
    <h2>
    <?php
}
    the_content();


if (get_the_category()[0]->slug=='blog'){

    ?>
    </h2>
    </li>
    </ul>
    </div>
    <?php
}
endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.0.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>

</body>
</html>
