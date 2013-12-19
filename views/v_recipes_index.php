<!-- Stream of other uses on app and ability ot follow and unfollow them -->

<section class="content follow">
	
	<h2>All Recipes</h2>

	<?php foreach($all_recipes as $each_recipe): ?>
	<br />

		<article>
			<!-- Print this user's name -->
	    <h3><?=$each_recipe['title']?></h3>
	    <p><?=$each_recipe['description']?></p>

	    <h4>
	     	<?php if(isset($connections[$each_recipe['id']])): ?>
	        	<a href='/recipes/remove/<?=$recipes['id']?>'>Remove</a>

	    <!-- Otherwise, show the follow link -->
	    	<?php else: ?>
	        	<a href='/recipes/add/<?=$each_recipes['id']?>'>Add</a>
	    	<?php endif;  ?>
	    </h4> 

		</article>


	<?php endforeach ?>

</section>




