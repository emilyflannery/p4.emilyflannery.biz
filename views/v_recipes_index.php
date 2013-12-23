<!-- Stream of other uses on app and ability ot follow and unfollow them -->

<section class="content recipes">
	
	<h2>All Recipes</h2>

	<?php foreach($all_recipes as $each_recipe): ?>

	<br />
	
	<article>

		<span class="show">+</span>
		<span class="hide">-</span>
		<h3><?=$each_recipe['title']?></h3>
		
		<div class="item">
			
			<p><?=$each_recipe['description']?></p>
		    
		    <div class="details">
			    <?php foreach($each_recipe['ingredients'] as $ingredient): ?> 
					 <ul> 
						 <li><span><?=$ingredient['quantity']?> <?=$ingredient['unit']?> <?=$ingredient['title']?></span></li> 
					 </ul> 
				<?php endforeach ?>
			</div>
		  
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




