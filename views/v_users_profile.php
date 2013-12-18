<section class="content posts profile">

	<section>

	    <h2><?=$user->first_name;?>'s profile</h2>
			
		<form method='POST' action='/users/p_profile_edit'>  <!-- Naming convention = /controller/post or method -->

		<?php if($avatar): ?>
			<div class="avatar" style="background: url('<?=$user->avatar;?>') center center no-repeat;"></div>
		<?php else: ?>
			<div class="avatar" style="background: url('/uploads/avatars/user_default.jpg') center center no-repeat;"></div>
		<?php endif; ?>

		<a href="#" id="first_name" data-type="text" data-pk="1" data-url="/users/p_profile_edit" data-title="">
			<input type='text' name='first_name' placeholder='<?=$user->first_name;?>'><br />
		</a>
		<a href="#" id="last_name" data-type="text" data-pk="1" data-url="/users/p_profile_edit" data-title="">
			<input type='text' name='last_name' placeholder='<?=$user->last_name;?>'><br />
		</a>
		<a href="#" id="email" data-type="text" data-pk="1" data-url="/users/p_profile_edit" data-title="">
			<input type='text' name='email' placeholder='<?=$user->email;?>'><br /> <!-- Query database to be sure email doesn't already exist -->
		</a>

		<input type='password' name='password' placeholder='Password'><br />


		
		<div class="button"><input type='Submit' value='Save'></div>or <a href="/users/profile">Cancel</a>

	</form>

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