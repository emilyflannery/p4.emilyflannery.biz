<!-- Stream of other uses on app and ability ot follow and unfollow them -->

<section class="content follow">
	<h2>Follow others</h2>

	<?php foreach($recipes as $recipe): ?>
	<br />

		<article>
			<!-- Print this user's name -->
	    <div class="avatar"></div>
	    <h3><?=$recipe['title']?></h2>

	    <!-- If there exists a connection with this user, show a unfollow link -->
	     <h4>
	     	<?php if(isset($connections[$user['user_id']])): ?>
	        	<a href='/recipes/remove/<?=$user['user_id']?>'>Remove from My Recipes</a>

	    <!-- Otherwise, show the follow link -->
	    	<?php else: ?>
	        	<a href='/recipes/add/<?=$user['user_id']?>'>Add to My Recipes</a>
	    	<?php endif; ?>
	    </h4>
		</article>


	<?php endforeach ?>

</section>