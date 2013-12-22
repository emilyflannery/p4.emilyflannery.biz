<!-- Stream of other uses on app and ability ot follow and unfollow them -->

<section class="content recipes">
	
	<h2>All Recipes</h2>

	<?php foreach($all_recipes as $each_recipe): ?>

	<br />
	
	<article>

		<h3><?=$each_recipe['title']?></h3>
		<h3 id="servings"><input type="text" value="4"></input>Servings</h3> 
		<button>Recalculate</button>
	
		<div class="item">
			
			<p><?=$each_recipe['description']?></p>
		    
		    <?php foreach($ingredients as $ingredient): ?>
			    <span><?=$ingredient['quantity']?></span>
			    <span><?=$ingredient['unit']?></span>
			    <span><?=$ingredient['title']?></span>
		    <?php endforeach ?>
		  
		  </div>
		  	<h4>
		     	<?php if(isset($connections[$each_recipe['id']])): ?>
		        	<a href='/recipes/remove/<? echo $each_recipe['id']?>'>Remove</a>
		    	<?php else: ?>
		        	<a href='/recipes/add/<? echo $each_recipe['id']?>'>Add to My Recipes</a>
		    	<?php endif;  ?>
		    </h4>
		</article>


	<?php endforeach ?>

</section>




