<img id="logo" src="/images/foodshare.png" />

<section class="content">
	<h2>Edit Profile</h2>
	<form method='POST' action='/users/p_profile_edit'>  <!-- Naming convention = /controller/post or method -->

		<?php if($avatar): ?>
			<div class="avatar" style="background: url('<?=$user->avatar;?>') center center no-repeat;"></div>
		<?php else: ?>
			<div class="avatar" style="background: url('/uploads/avatars/user_default.jpg') center center no-repeat;"></div>
		<?php endif; ?>

		<input type='text' name='first_name' placeholder='<?=$user->first_name;?>'><br />
		<input type='text' name='last_name' placeholder='<?=$user->last_name;?>'><br />
		<input type='text' name='email' placeholder='<?=$user->email;?>'><br /> <!-- Query database to be sure email doesn't already exist -->
		<input type='password' name='password' placeholder='Password'><br />
		
		<div class="button"><input type='Submit' value='Save'></div>or <a href="/users/profile">Cancel</a>

	</form>
</section>

