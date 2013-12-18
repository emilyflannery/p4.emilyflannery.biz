<!-- Stream of other uses on app and ability ot follow and unfollow them -->

<section class="content follow">
	
	<h2>All Recipes</h2>

	<?php foreach($recipes as $recipe): ?>
	<br />

		<article>
			<!-- Print this user's name -->
	    <h3><?=$my_recipe['title']?></h3>
	    <p><?=$my_recipe['description']?></p>

	    <h4>
	     	<?php if(isset($connections[$user['user_id']])): ?>
	        	<a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>

	    <!-- Otherwise, show the follow link -->
	    	<?php else: ?>
	        	<a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
	    	<?php endif; ?>
	    </h4>

		</article>


	<?php endforeach ?>

</section>




