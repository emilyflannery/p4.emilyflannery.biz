<section class="content posts">
	<h2>Blogroll</h2>
	<h4 class="prompt"><a href="/posts/users" title="Follow Users">Click here to see what other users are up to!</a></h4>

		<?php foreach($recipes as $recipe): ?>

				<!-- Get an array of posts from posts table, pass it to the view, and 
				the view will loop through that and print out content for each post -->

			<article>

			    <h3><span class="name"><?=$recipes['title']?></span>:</h3>

			    <p><?=$recipes['description']?></p>

			</article>
			<br />

		<?php endforeach; ?>

</section>