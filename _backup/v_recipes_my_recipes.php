
<section class="content recipes">
	
	<h2>My Recipes</h2>

	<h5 id="servings"><input type="text" value="4"></input>Servings</h5> 

	<?php foreach($my_recipes as $my_recipe): ?>

		<article>
		<h3><?=$my_recipe['title']?></h3>
	    
	    <div class="item">
			<p><?=$my_recipe['description']?></p>
		    <ul>
		    	<li><span class="ingredient"><?=$my_recipe['quantity1']?></span> <?=$my_recipe['unit1']?> <?=$my_recipe['ingredient1']?></li>
		    	<li><span class="ingredient"><?=$my_recipe['quantity2']?></span> <?=$my_recipe['unit2']?> <?=$my_recipe['ingredient2']?></li>
		    	<li><span class="ingredient"><?=$my_recipe['quantity3']?></span> <?=$my_recipe['unit3']?> <?=$my_recipe['ingredient3']?></li>
		    </ul>
		  </div>

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