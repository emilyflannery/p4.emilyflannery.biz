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
			    <ul>
			    	<li><span class="ingredient"><?=$each_recipe['quantity1']?></span> <?=$each_recipe['unit1']?> <?=$each_recipe['ingredient1']?></li>
			    	<li><span class="ingredient"><?=$each_recipe['quantity2']?></span> <?=$each_recipe['unit2']?> <?=$each_recipe['ingredient2']?></li>
			    	<li><span class="ingredient"><?=$each_recipe['quantity3']?></span> <?=$each_recipe['unit3']?> <?=$each_recipe['ingredient3']?></li>
			    </ul>
			  </div>
			  	<h4>
			     	<?php if(isset($connections[$each_recipe['id']])): ?>
			        	<a href='/recipes/remove/<? echo $each_recipe['id']?>'>Remove</a>
			    	<!-- Otherwise, show the follow link -->
			    	<?php else: ?>
			        	<a href='/recipes/add/<? echo $each_recipe['id']?>'>Add to My Recipes</a>
			    	<?php endif;  ?>
			    </h4> 
		</article>


	<?php endforeach ?>

</section>




