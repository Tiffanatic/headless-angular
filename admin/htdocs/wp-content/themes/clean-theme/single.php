<?php get_header('post'); ?>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">



      <!-- Post Content -->
      <article>
          <div class="container">
              <div class="row">
                  <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">


                <?php the_content(); ?>


          </div></div>
      </div>
    </article>
      <hr>

      <?php
      get_footer();
      ?>