<!-- Stream of other uses on app and ability ot follow and unfollow them -->

<section class="content recipes">
	
	<h2>My Recipes</h2>

	<?php foreach($my_recipes as $my_recipe): ?>
	<h3 id="servings"><input type="text" value="4"></input>Servings</h3> 
	<button>Recalculate</button>

		<article>
			<!-- Print this user's name -->
	    <h3><?=$my_recipe['title']?></h3>
	    <p><?=$my_recipe['description']?></p>

		</article>


	<?php endforeach ?>

</section>