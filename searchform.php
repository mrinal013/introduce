<span class="search pull-right">
    <i class="fa fa-search"></i>
</span>
<form class="search-wrapper" action="<?php echo home_url( '/' ); ?>" method="get">
    <div class="btn-group">
      <input id="searchinput" type="text" name="s" class="form-control" value="<?php the_search_query(); ?>">
      <span id="searchclear" class="glyphicon glyphicon-remove-circle"></span>
    </div>
</form>
