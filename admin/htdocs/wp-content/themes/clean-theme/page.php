<?php get_header('page'); ?>

    <!-- Main Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">



      <?php
      the_post();
      the_content();
      ?>
      
        <?php get_sidebar(); ?>

      </div>
      <hr>
      <?php
      get_footer();
      ?>