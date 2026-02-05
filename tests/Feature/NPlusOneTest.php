<?php

namespace Tests\Feature;

use App\Http\Controllers\TestCicdController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class NPlusOneTest extends TestCase
{
    public function test_detect_n_plus_one_queries()
    {
        User::factory()->count(5)->create();

        DB::enableQueryLog();

        $controller = app(TestCicdController::class);
        $controller->index();

        $queries = DB::getQueryLog();

        $this->assertLessThan(
            3,
            count($queries),
            'Possible N+1 query detected'
        );
    }
}
