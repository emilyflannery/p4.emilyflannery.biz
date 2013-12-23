<section class="content posts profile">

        <section>

            <h2><?=$user->first_name;?>'s profile</h2>
                        
                <form id="edit-profile" method='POST' enctype="multipart/form-data" action='/users/p_profile_edit'> 
		                
				<input type='text' name='first_name' placeholder='<?=$user->first_name;?>' value='<?=$user->first_name;?>' data-validation="length" data-validation-length="min1" data-validation-error-msg="Please enter your first name"><br />
				<input type='text' name='last_name' placeholder='<?=$user->last_name;?>' value='<?=$user->last_name;?>' data-validation="length" data-validation-length="min1" data-validation-error-msg="Please enter your last name"><br />
				<input type='text' name='email' placeholder='<?=$user->email;?>' value='<?=$user->email;?>' data-validation="email" data-validation-error-msg="Please enter a valid email address"><br /> <!-- Query database to be sure email doesn't already exist -->
				<input type='password' name='password' placeholder='Password' value='<?=$user->last_name;?>' data-validation="required" data-validation-error-msg="You did not enter a password"><br />

				<?php if(isset($_GET['duplicate'])): ?>
			        <div class='message error'>
			            An account already exists with this email address.
			        </div>
			        <br>
			    <?php endif; ?>
                
                <div class="button"><input type='Submit' value='Save'></div>or <a href="/users/profile">Cancel</a>

        </form>

</section>