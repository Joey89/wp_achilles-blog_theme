<form role="search" method="get" id="searchform"
    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label', 'achilles' ); ?></label>
        <div class="input-group">
        	<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control"placeholder="Search"/>
        	<div class="input-group-btn">
        	<button type="submit" id="searchsubmit" class="btn btn-default" ><span class="glyphicon glyphicon-search"></span></button>
        	</div>
    	</div>
    </div>
</form>