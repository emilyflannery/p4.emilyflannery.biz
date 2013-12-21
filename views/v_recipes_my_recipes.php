
<section class="content recipes">
	
	<h2>My Recipes</h2>

	<?php foreach($my_recipes as $my_recipe): ?>

		<article>
			<!-- Print this user's name -->
	    <h3><?=$my_recipe['title']?></h3>
	    <p><?=$my_recipe['description']?></p>

	    <h4>
	     	<?php if(isset($connections[$my_recipe['id']])): ?>
	        	<a href='/recipes/remove/<? echo $my_recipe['id']?>'>Remove</a>
	    	<!-- Otherwise, show the follow link -->
	    	<?php else: ?>
	        	<a href='/recipes/add/<? echo $my_recipe['id']?>'>Add to My Recipes</a>
	    	<?php endif;  ?>
	    </h4> 

		</article>


	<?php endforeach ?>

</section>