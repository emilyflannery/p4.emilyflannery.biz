<section class="content posts profile">

	<section>

	    <h2><?=$user->first_name;?>'s profile</h2>
		
		<div class="avatar" style="background: url('<?=$user->avatar;?>') center center no-repeat;"></div>
	
		<h3><?=$user->email;?></h3>
		<h5><a href="/users/profile_edit">Update Profile</a></h5>

	</section>

		<?php if($posts): ?>
			<h4>My Posts:</h4>
			<?php foreach($posts as $post): ?>

					<!-- Get an array of posts from posts table, pass it to the view, and 
					the view will loop through that and print out content for each post -->

				<article>

				    <p><?=$post['content']?></p>

				    <p class="meta left"><time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
				        <?=Time::display($post['created'])?>
				    </meta>
					</p>

					<p class="meta right"><a href="/posts/delete/<?=$post['post_id']?>">Delete</a></p>

				</article>

			<?php endforeach; ?>

		<?php else: ?>
			<h4><a href="/posts/add" title="Add a Post">You have no posts. Click here to add one!</a></h4>
		<?php endif; ?>


</section>





<!-- OR TO GET THE SAME RESULTS:
<?php if($user): ?>
	<section class="content">
		<p>This is <?=$user->first_name;?> <?=$user->last_name;?>'s profile.</p>
	</section>

<?php else: ?>
	<section class="content">
		<p>Please <a href="/users/login">log in</a> to view this page.</p>
	</section>
<?php endif; ?> -->