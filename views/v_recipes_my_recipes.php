
<section class="content recipes">
	
	<h2>My Recipes</h2>

	<?php foreach($my_recipes as $my_recipe): ?>

		<article>
			<!-- Print this user's name -->
	    <h3><?=$my_recipe['title']?></h3>
	    <p><?=$my_recipe['description']?></p>

		</article>


	<?php endforeach ?>

</section>