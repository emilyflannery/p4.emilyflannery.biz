<!-- Naming convention: v_users_signup = views_controller_method */ -->
<img id="logo" src="/images/foodshare.png" />

<section class="content">
	<h2>Sign Up</h2>

	<form id="signup" method='POST' enctype="multipart/form-data" action='/users/p_signup'>  <!-- Naming convention = /controller/post or method -->

		<input type='file' name='avatar' value='file'><br />

		<input type='text' name='first_name' placeholder='First Name' data-validation="length" data-validation-length="min1" data-validation-error-msg="Please enter your first name"><br />
		<input type='text' name='last_name' placeholder='Last Name' data-validation="length" data-validation-length="min1" data-validation-error-msg="Please enter your last name"><br />
		<input type='text' name='email' placeholder="Email Address" data-validation="email" data-validation-error-msg="Please enter a valid email address"><br /> <!-- Query database to be sure email doesn't already exist -->
		<input type='password' name='password' placeholder='Password' data-validation="required" data-validation-error-msg="You did not enter a password"><br />

		<div class='button'><input type='Submit' value='Sign Up!'></div>

	</form>
</section>