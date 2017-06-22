<?php get_header(); ?>

  <main id="mainContent">

    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

              <?php the_content(); ?>

            </div>

          <?php endwhile; ?>

          <?php else: ?>

              <h2>לא נמצא תוכן</h2>

          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <?php get_sidebar(); ?>
        </div>
      </div><!-- .row -->
    </div><!-- .container -->

  </main><!-- #main-content -->
  
<?php get_footer(); ?>