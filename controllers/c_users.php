<?php
class users_controller extends base_controller {

    public function __construct() {
        # Call the base constructor
        parent::__construct();
    } 

    public function index() {
        $this->template->content = View::instance('v_index_index');
    }

    public function signup() {

        // Set up the view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Sign Up";

        // Render the view
        echo $this->template;

    }

    public function p_signup() {


        // Store time user was created to DB
        $_POST['created']   = Time::now();
        $_POST['modified']   = Time::now();
      

        // Encrypt the password  
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

        // Create an encrypted token via their email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 

        // Insert this user into the database
        $user_id = DB::instance(DB_NAME)->insert('users', $_POST);



        //Image Upload
        Upload::upload($_FILES, "/uploads/avatars/", array("JPG", "JPEG", "jpg", "jpeg", "gif", "GIF", "png", "PNG"), $user_id);
        
        $filename = $_FILES['avatar']['name']; // original filename (i.e. picture.jpg)
        $extension = substr($filename, strrpos($filename, '.')); // filename format extension (i.e. .jpg)
        $avatar = $user_id.$extension; // user id + .jpg or .png or .gif (i.e. 26.png)

        // Add Image to DB in "avatar" column
        $data = Array("avatar" => $avatar);
        DB::instance(DB_NAME)->update("users", $data, "WHERE user_id = '".$user_id."'"); 


        // Send them back to the login page with a success message
        Router::redirect("/users/login/?success=true"); 

        
    }

    public function login($error = NULL, $success = NULL) {
        
        # Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";

        # Pass data to the view
        $this->template->content->error = $error;
        $this->template->content->success = $success;

        # Render template
        echo $this->template;

    }

    public function p_login() {

        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Hash submitted password so we can compare it against one in the db
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email and password
        # Retrieve the token if it's available
        $q = "SELECT    token 
            FROM        users 
            WHERE       email = '".$_POST['email']."' 
            AND         password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);

        # If we didn't find a matching token in the database, it means login failed
        if(!$token) {

            # Send them back to the login page with an error message
            Router::redirect("/users/login/?error=true"); 

        # But if we did, login succeeded! 
        } 
        # Login passed
        else {

            /* 
            Store this token in a cookie using setcookie()
            Important Note: *Nothing* else can echo to the page before setcookie is called
            Not even one single white space.
            param 1 = name of the cookie
            param 2 = the value of the cookie
            param 3 = when to expire
            param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
            */
            setcookie("token", $token, strtotime('+2 weeks'), '/');

            # Send them to the main page - or whever you want them to go
            Router::redirect("/");

        }

    }

    public function logout() {

        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        # Send them back to the main index.
        Router::redirect("/");

    }


    public function profile($user_name = NULL) {

        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
            Router::redirect('/index/members_only');
        }

        # If they weren't redirected away, continue:


        # Setup view
        $this->template->content = View::instance('v_users_profile');

        # Set page title
        $this->template->title = "Profile";

            # Query
            $q = "SELECT *
                FROM         posts 
                WHERE        user_id = ".$this->user->user_id;

        # Run the query, store the results in the variable $posts
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->posts = $posts;

        # Use load_client_files to generate the links from the above array
        $this->template->client_files_head = Utils::load_client_files($client_files_head);  
        
        # Use load_client_files to generate the links from the above array
        #$this->template->client_files_body = Utils::load_client_files($client_files_body);  

        # Pass information to the view fragment
        $this->template->content->user_name = $user_name;

        # Render View
        echo $this->template;

    }


    public function profile_edit() {
        // Set up the view
        $this->template->content = View::instance('v_users_profile_edit');
        $this->template->title   = "Edit Profile";

        // Render the view
        echo $this->template;

    }


    public function p_profile_edit() {


        $q = "UPDATE    users
            SET         first_name = '".$_REQUEST['first_name']."',
                        last_name = '".$_REQUEST['last_name']."',
                        email = '".$_REQUEST['email']."'
            WHERE       email = '".$this->user->email."'";

        DB::instance(DB_NAME)->query($q);
        Router::redirect("/users/profile");

        
    }

} # end of the class