<?php

use Illuminate\Database\Seeder;
use App\Task;

class taskseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    protected $taskCount = 3;

    public function run()
    {
        $faker   = Faker\Factory::create();
        $taskObj = new Task();

        for($i=0; $i<$this->taskCount; $i++){
        	
        	$task 			   = array();
        	$task['title']     = $faker->name;
        	$task['completed'] = $faker->boolean;

        	$taskObj->insertTask($task);
        }
        
    }
}
