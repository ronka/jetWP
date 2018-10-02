  <footer id="mainFooter">
    <div class="container">
      <div class="row">
        <p></p>
        <?php printf(__('© %1$s All copyright reserved %2$s'), date('Y'), bloginfo('name')); ?>
      </div>
    </div>
  </footer>

</div><!-- #pageWrapper -->

<?php do_action('after_wrapper'); ?>

<?php wp_footer(); ?>
</body>
</html>