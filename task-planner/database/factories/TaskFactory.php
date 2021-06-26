<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => '1',
            'status' => rand(1, 4),
            'title' => substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm"),0,rand(4,10)),
            'message' => substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm"),0,rand(15,50)),
            'Priority' => rand(1, 10),
            'deadlinedate' => date('Y-m-d', strtotime( '+'.mt_rand(0,30).' days')),
            'deadlinetime' => mt_rand(0,23).":".str_pad(mt_rand(0,59), 2, "0", STR_PAD_LEFT)
        ];
    }
}
