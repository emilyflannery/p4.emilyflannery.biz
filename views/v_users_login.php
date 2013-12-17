<!-- Naming convention: v_users_signup = views_controller_method */ -->

<img id="logo" src="/images/foodshare.png" />

<section class="content login">
	<h2>Log In</h2>


	    <form method='POST' action='/users/p_login'>

		<input type='text' name='email' placeholder='Email Address'><br />
		<input type='password' name='password' placeholder='Password'><br />

		 <?php if(isset($_GET['error'])): ?>
	        <div class='message error'>
	            Login failed. Please double check your email and password.
	        </div>
	        <br>
	    <?php endif; ?>
	    <?php if(isset($_GET['success'])): ?>
	        <div class='message success'>
	            Thanks for signing up! Please log in to get started.
	        </div>
	        <br>
	    <?php endif; ?>

	    <div class="button"><input type='submit' value='Log In'></div>

	</form>
</section>