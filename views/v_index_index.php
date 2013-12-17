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

		<div class="prompt">
			<p>In this project you should be able to:</p>
			<h4>Sign up | Log In | Log Out | Add Posts | See a list of all other users | Follow and unfollow other users | View a stream of posts from the users followed
			<h5>+ Upload avatar | + See success message after signing up, when you are prompted to log in | + See error message when your password is incorrect | + Edit your first name, last name, and email | + Delete one of your posts
		</div>

</section>
<?php endif; ?>

