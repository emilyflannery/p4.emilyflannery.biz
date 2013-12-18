<?php

class recipes_controller extends base_controller {

	public function __construct() {
		// Without this, the parent construct is not loaded; IE p_add would fail
		parent::__construct();

		// Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            Router::redirect("/index/members_only");
        }

    } 

	public function my_recipes() {

	    # Set up the View
	    $this->template->content = View::instance("v_recipes_my_recipes");
	    $this->template->title   = "My Recipes";

	    # Query -- HELP --
	    $q = "SELECT *
	    		FROM        users, recipes, user_recipes
	        	WHERE 		users.id = ".$this->user->id; 

	    # Run the query, store the results in the variable $posts
	    $my_recipes = DB::instance(DB_NAME)->select_rows($q);

	    # Pass data (users and connections) to the view
	    $this->template->content->my_recipes = $my_recipes;

	    # Render the view
	    echo $this->template;

	}

	
	public function index() {

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
	    $this->template->content->recipes = $recipes;

	    # Render the view
	    echo $this->template;

	}


	/*// CHANGE TO RECIPE_ID_ADDED / RECIPE_ID_REMOVED
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
	*/
}