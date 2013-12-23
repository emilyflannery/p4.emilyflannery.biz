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

	    # Query 
	    $q = "SELECT *
	    		FROM        users, recipes, user_recipes
	        	WHERE 		users.id = user_id
	        	and 		recipes.id = recipe_id
	        	and 		users.id = ".$this->user->id;

	    # Run the query, store the results in the variable $posts
	    $my_recipes = DB::instance(DB_NAME)->select_rows($q);

	    foreach ($my_recipes as $key => $recipes) {
			$q = "SELECT recipes_ingredients.quantity, recipes_ingredients.unit, recipes_ingredients.title
				FROM recipes_ingredients
				JOIN ingredients
				ON recipes_ingredients.ingredient_id = ingredients.ingredient_id	
				WHERE recipes_ingredients.recipe_id =".$recipes["id"];
			$my_recipes[$key]["ingredients"] = DB::instance(DB_NAME)->select_rows($q);
		}

	    # Build the query to figure out what connections does this user already have? 
	    # I.e. who are they following
	    $q = "SELECT * 
	        FROM 	user_recipes
	        WHERE 	user_id = ".$this->user->id;

	    # Execute this query with the select_array method
	    # select_array will return our results in an array and use the "users_id_followed" field as the index.
	    # This will come in handy when we get to the view
	    # Store our results (an array) in the variable $connections
	    $connections = DB::instance(DB_NAME)->select_array($q, 'recipe_id');

	    # Pass data (users and connections) to the view
		$this->template->content->my_recipes = $my_recipes;
		$this->template->content->connections = $connections;

		# Render the view
	    echo $this->template;

	}

	
	public function index() {

		# Set up the View
	    $this->template->content = View::instance("v_recipes_index");
	    $this->template->title   = "All Recipes";





		// First get all the rows from the recipes table
		$q = "SELECT *	FROM recipes";
		$all_recipes = DB::instance(DB_NAME)->select_rows($q);

		// Then loop through the resulting array of recipes, and for each one, get the corresponding ingredients from the recipes_ingredients table, and join in the ingredient name from the ingredients table

		foreach ($all_recipes as $key => $recipes) {
			$q = "SELECT recipes_ingredients.quantity, recipes_ingredients.unit, recipes_ingredients.title
				FROM recipes_ingredients
				JOIN ingredients
				ON recipes_ingredients.ingredient_id = ingredients.ingredient_id	
				WHERE recipes_ingredients.recipe_id =".$recipes["id"];
			$all_recipes[$key]["ingredients"] = DB::instance(DB_NAME)->select_rows($q);
		}

	    /*# Query -- HELP --
	    $q = "SELECT *
	    		FROM recipes";

	    # Run the query, store the results in the variable $posts
	    $all_recipes = DB::instance(DB_NAME)->select_rows($q);
	    */

	    # Build the query to figure out what connections does this user already have? 
	    # I.e. who are they following
	    $q = "SELECT * 
	        FROM 	user_recipes
	        WHERE 	user_id = ".$this->user->id;

	    # Execute this query with the select_array method
	    # select_array will return our results in an array and use the "users_id_followed" field as the index.
	    # This will come in handy when we get to the view
	    # Store our results (an array) in the variable $connections
	    $connections = DB::instance(DB_NAME)->select_array($q, 'recipe_id');

	    # Pass data (users and connections) to the view
	    $this->template->content->all_recipes = $all_recipes;
		$this->template->content->connections = $connections;

	    # Render the view
	    echo $this->template;
	    #echo "<pre>";
		#echo print_r($all_recipes);
		#echo "</pre>";

	}

	public function add($recipe_id) {

		# Prepare the data array to be inserted
		$data = Array(
		    "user_id" => $this->user->id,
		    "recipe_id" => $recipe_id
		    );

		# Do the insert
		DB::instance(DB_NAME)->insert('user_recipes', $data);

		# Send them back
		Router::redirect("/recipes/my_recipes");

	}

	public function remove($recipe_id) {

	    # Delete this connection
	    $where_condition = 'WHERE user_id = '.$this->user->id.' AND recipe_id = '.$recipe_id;
	    DB::instance(DB_NAME)->delete('user_recipes', $where_condition);

	    # Send them back
	    Router::redirect("/recipes/my_recipes");

	}
}