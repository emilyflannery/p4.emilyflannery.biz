<?php  
  
class MyClass
{  
    public $prop1 = "I'm a class property!";  

    public static $count = 0;

    public function __construct()
    {
    	echo 'The class "', __CLASS__, '" was initiated!<br />';
    }

    public function __destruct()
    {
    	echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }

    public function __toString()
    {
    	echo "Using the toString method: ";
    	return $this->getProperty();
    }

    public function setProperty($newval)
    {
    	$this->prop1 = $newval;
    }

    private function getProperty()  // PROTECTED can only be accessed within class or child class; 
    								  // PRIVATE can only be accessed within class that defines it, not from within child class
    {
    	return $this->prop1 . "<br />";
    }

    public static function plusOne()  
    {  
        return "The count is " . ++self::$count . ".<br />";  
    } 
}  

class MyOtherClass extends MyClass
{
	public function __construct()
	{
		parent::__construct(); // Call the parent class's constructor
		echo "A new constructor in " . __CLASS__ . ".<br />";
	}

	public function newMethod()
	{
		echo "From a new method in " . __CLASS__ . ".<br />";
	}

	public function callProtected()
	{
		return $this->getProperty();
	}
}
  
// Create a new object
// $obj = new MyClass; 

// Get the value of $prop1
// echo $obj->getProperty();

// Output object as a string
// echo $obj;

// Destroy the object
// unset($obj); 

// Output a message at the end of the file
// echo "End of file.<br />";




// Create another new object
// $newobj = new MyOtherClass;

// Output the object as a string
// echo $newobj->newMethod();

// Use a method from the parent class
// echo $newobj->getProperty();

// Call protected method from within a public method
// echo $newobj->callProtected();


do  
{  
    // Call plusOne without instantiating MyClass  
    echo MyClass::plusOne();  
} while ( MyClass::$count < 10 );  
  
?>  