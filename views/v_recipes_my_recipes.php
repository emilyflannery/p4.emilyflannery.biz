
<section class="content recipes">
	
	<h2>My Recipes</h2>

	<h5 id="servings"><input type="text" value="4"></input>Servings</h5> 

	<?php foreach($my_recipes as $my_recipe): ?>

		<article>

		<span class="show">+</span>
		<span class="hide">-</span>
		<h3><?=$my_recipe['title']?></h3>
	    
	    <div class="item">
			<p><?=$my_recipe['description']?></p>
		    
		    <div class="details">
			    <?php foreach($my_recipe['ingredients'] as $ingredient): ?> 
					 <ul> 
						 <li><span class="ingredient"><?=$ingredient['quantity']?></span> <?=$ingredient['unit']?> <?=$ingredient['title']?></li> 
					 </ul> 
				<?php endforeach ?>
			</div>
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