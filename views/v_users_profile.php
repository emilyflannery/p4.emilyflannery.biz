<section class="content posts profile">

        <section>

            <h2><?=$user->first_name;?>'s profile</h2>
                        
                <form method='POST' enctype="multipart/form-data" action='/users/p_profile_edit'> 

                <?php if($avatar): ?>
                        <div class="avatar" style="background: url('<?=$user->avatar;?>') center center no-repeat;"></div>
                <?php else: ?>
                        <div class="avatar" style="background: url('/uploads/avatars/user_default.jpg') center center no-repeat;"></div>
                <?php endif; ?>

		                
				<input type='text' name='first_name' placeholder='<?=$user->first_name;?>' value='<?=$user->first_name;?>'><br />
				<input type='text' name='last_name' placeholder='<?=$user->last_name;?>' value='<?=$user->last_name;?>'><br />
				<input type='text' name='email' placeholder='<?=$user->email;?>' value='<?=$user->email;?>'><br /> <!-- Query database to be sure email doesn't already exist -->
				<input type='password' name='password' placeholder='Password'><br />

				<?php if(isset($_GET['duplicate'])): ?>
			        <div class='message error'>
			            An account already exists with this email address.
			        </div>
			        <br>
			    <?php endif; ?>
                
                <div class="button"><input type='Submit' value='Save'></div>or <a href="/users/profile">Cancel</a>

        </form>

</section>