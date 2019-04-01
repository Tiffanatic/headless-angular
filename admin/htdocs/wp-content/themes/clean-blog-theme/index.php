<html>
<head>
    <title>The Loop</title>
</head>
<body>
<?php get_header(); ?>
    <?php
        //post loop
        if (have_posts()) {
            while (have_posts()){
                the_post();
            
            the_title();
            
            echo '<hr>';
            } //end while
            the_content();

        } //end if loop

    ?>  
</body>
<?php get_footer(); ?>
</html>