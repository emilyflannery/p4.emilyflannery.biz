<img id="logo" src="/images/foodshare.png" />

<?php if($user): ?>
<section class="content member">

	
	<h2>
		Welcome, <?=$user->first_name;?>!
	</h2>
	<p id="welcome">
		What will you bring to the table today?
	</p>

	<!--<pre>
	<?php
	print_r($user);
	?>
	</pre>-->

</section>

<?php else: ?>
<section class="content visitor">
	<h2>
		Welcome! 
	</h2>
	<p id="welcome">
		We are excited to see what you will bring to the table. 
		Share recipes or post photos of your favorite meals. 
		Create an account to get started.
	</p>
	<div class="button"><a href="/users/signup">Sign up!</a></div>


</section>
<?php endif; ?>

