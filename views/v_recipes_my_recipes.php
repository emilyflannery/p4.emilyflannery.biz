<!-- Stream of other uses on app and ability ot follow and unfollow them -->

<section class="content follow">
	
	<h2>My Recipes</h2>

	<?php foreach($my_recipes as $my_recipe): ?>
	<br />

		<article>
			<!-- Print this user's name -->
	    <h3><?=$my_recipe['title']?></h3>
	    <p><?=$my_recipe['description']?></p>

		</article>


	<?php endforeach ?>

</section>