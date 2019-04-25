<?php
/**
 * Template for displaying search forms
 */
?>
<form role="search" method="get" class="search-form my-4 mt-md-0" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-group">
    <input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search Outsiders Republic&hellip;', 'placeholder', 'bursa' ); ?>" value="" name="s" id="s" aria-label="<?php echo _x( 'Search for:', 'label', 'bursa' ); ?>" aria-describedby="search-submit">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" id="search-submit">
        Search
      </button>
    </div>
  </div>
</form><!-- search-form -->
