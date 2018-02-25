<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\WeightLog;

class WeightLogCRUDTest extends TestCase
{
	use DatabaseMigrations;

    public function testCRUD()
    {
    	$input1 = ['log_date' => '2017-05-06', 'max' => 70, 'min' => 65, 'variance' => 5];
    	$input2 = ['log_date' => '2018-07-12', 'max' => 50, 'min' => 49, 'variance' => 1];
        $weight_log = WeightLog::create($input1);
		$this->assertDatabaseHas('weightlog', $input1);
		WeightLog::find($weight_log->id)->update($input2);
		$this->assertDatabaseHas('weightlog', $input2);
		WeightLog::destroy($weight_log->id);
		$this->assertDatabaseMissing('weightlog', $input2);
    }
}
