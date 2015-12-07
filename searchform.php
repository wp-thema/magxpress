<form class="input-group input-group-lg" action="<?php bloginfo('wpurl'); ?>" role="search">
	<div class="input-group input-group-lg">
		<input type="text" class="form-control" placeholder="Search" name="s" value="<?php if( is_search() ){ $search_query = get_search_query(); echo $search_query; } ?>">
		<span class="input-group-btn input-group-lg"><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button></span>
	</div>
</form>