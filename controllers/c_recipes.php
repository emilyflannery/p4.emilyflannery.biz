<?php

class posts_controller extends base_controller {

	public function __construct() {
		// Without this, the parent construct is not loaded; IE p_add would fail
		parent::__construct();

		// Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            Router::redirect("/index/members_only");
        }

    } 

	public function add() {

        # Setup view
        $this->template->content = View::instance('v_posts_add');
        $this->template->title   = "New Post";

        # Render template
        echo $this->template;

    }

	public function p_add() {

        # Associate this post with this user
        $_POST['user_id']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('posts', $_POST);

        # Quick and dirty feedback
        Router::redirect("/users/profile");

    }

	public function delete($post_id) {

        # Setup view
        $this->template->content = View::instance('v_posts_delete');
        $this->template->title   = "Delete Post Confirmation";
        $this->template->content->post_id = $post_id;

        # Render template
        echo $this->template;

    }

	public function p_delete($post_id) {

        $where_condition = 'WHERE post_id = '.$post_id;
        DB::instance(DB_NAME)->delete('posts', $where_condition);

    	# Send them back
		Router::redirect("/users/profile");

    }

	public function my_recipes() {

	    # Set up the View
	    $this->template->content = View::instance('v_recipes_my_recipes');
	    $this->template->title   = "My Recipes";

	    # Query -- HELP --
	    $q = "SELECT 
	    				# Emily Flannery's Recipes
	            		users.first_name,
	            		users.last_name,
	            		# Recipe Title
	            		recipes.title,
	            		user_recipes.user_id
	        FROM        recipes
	        INNER JOIN  user_recipes 
	            ON 		recipes.recipe_id = user_recipes.recipe_id
	        INNER JOIN 	users 
	            ON 		recipes.recipe_id = user_recipes.recipe_id
	        WHERE 		user_recipes.recipe_id = ".$this->recipe->recipe_id;

	    # Run the query, store the results in the variable $posts
	    $recipes = DB::instance(DB_NAME)->select_rows($q);

	    # Build the query to figure out what recipes did the user already save? 
	    $q = "SELECT * 
	        FROM user_recipes
	        WHERE recipe_id = ".$this->recipes->recipe_id;

	    # Execute this query with the select_array method
	    # select_array will return our results in an array and use the "users_id_followed" field as the index.
	    # This will come in handy when we get to the view
	    # Store our results (an array) in the variable $connections
	    $connections = DB::instance(DB_NAME)->select_array($q, 'recipe_id');

	    # Pass data (users and connections) to the view
	    $this->template->content->users       = $users;
	    $this->template->content->connections = $connections;

	    # Render the view
	    echo $this->template;

	}

	
	public function recipes() {

		# Set up the View
	    $this->template->content = View::instance("v_recipes_index");
	    $this->template->title   = "All Recipes";

	    # Build the query to get all the recipes
	    $q = "SELECT *
	        FROM recipes";

	    # Execute the query to get all the users. 
	    # Store the result array in the variable $recipes
	    $recipes = DB::instance(DB_NAME)->select_rows($q);

	    # Pass data (recipes) to the view
	    $this->template->content->recipes       = $recipes;

	    # Render the view
	    echo $this->template;

	}


	// CHANGE TO RECIPE_ID_ADDED / RECIPE_ID_REMOVED
	public function added($recipe_id) {

		# Prepare the data array to be inserted
		$data = Array(
		    "created" => Time::now(),
		    "user_id" => $this->user->user_id,
		    "recipe_id" => $recipe_id
		    );

		# Do the insert
		DB::instance(DB_NAME)->insert('user_recipes', $data);

		# Send them back
		Router::redirect("/recipes/index");

	}

	public function removed($recipe_id) {

	    # Delete this connection
	    $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND recipe_id = '.$recipe_id;
	    DB::instance(DB_NAME)->delete('user_recipes', $where_condition);

	    # Send them back
	    Router::redirect("/recipes/index");

	}

}