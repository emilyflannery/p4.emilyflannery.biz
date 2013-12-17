<!-- Stream of other uses on app and ability ot follow and unfollow them -->

<section class="content follow">
	<h2>My Recipes</h2>

	<?php foreach($recipes as $recipe): ?>
	<br />

		<article>
			<!-- Print this user's name -->
	    <h3><?=$recipe['title']?></h2>

	    <!-- If there exists a connection with this user, show a unfollow link -->
	     <h4>
	     	<?php if(isset($connections[$user['user_id']])): ?>
	        	<a href='/recipes/remove/<?=$recipe['recipe_id']?>'>Remove from My Recipes</a>

	    <!-- Otherwise, do nothing -->
	    	<?php else: ?>
	        	
	    	<?php endif; ?>
	    </h4>
		</article>


	<?php endforeach ?>

</section>