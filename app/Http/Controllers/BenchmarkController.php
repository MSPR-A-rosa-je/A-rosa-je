<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plant;
use App\Models\Mission;
use App\Models\Advice;
use App\Models\Address;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

class BenchmarkController extends Controller
{
    public function runTest($test)
    {
        $startTime = microtime(true);
        $BENCHMARK_SIZE = 1;

        DB::beginTransaction();
        try {
            $results = [];

            switch ($test) {
                case 'test1':
                    $users = User::factory()->count($BENCHMARK_SIZE)->create();
                    $results = $users->toArray();
                    User::whereIn('id', $users->pluck('id'))->delete();
                    break;

                case 'test2':
                    $plants = Plant::factory()->count($BENCHMARK_SIZE)->create();
                    $results = $plants->toArray();
                    Plant::whereIn('id', $plants->pluck('id'))->delete();
                    break;

                case 'test3':
                    $missions = Mission::factory()->count($BENCHMARK_SIZE)->create();
                    $results = $missions->toArray();
                    Mission::whereIn('id', $missions->pluck('id'))->delete();
                    break;

                case 'test4':
                    $advices = Advice::factory()->count($BENCHMARK_SIZE)->create();
                    $results = $advices->toArray();
                    Advice::whereIn('id', $advices->pluck('id'))->delete();
                    break;

                case 'test5':
                    $sessions = Session::factory()->count($BENCHMARK_SIZE)->create();
                    $results = $sessions->toArray();
                    Session::whereIn('id', $sessions->pluck('id'))->delete();
                    break;

                case 'test6':
                    $addresses = Address::factory()->count($BENCHMARK_SIZE)->create();
                    $results = $addresses->toArray();
                    Address::whereIn('id', $addresses->pluck('id'))->delete();
                    break;

                case 'test7':
                    $users = User::factory()->count($BENCHMARK_SIZE)->create();
                    $results = $users->toArray();
                    User::whereIn('id', $users->pluck('id'))->delete();

                    $plants = Plant::factory()->count($BENCHMARK_SIZE)->create();
                    $results = array_merge($results, $plants->toArray());
                    Plant::whereIn('id', $plants->pluck('id'))->delete();

                    $missions = Mission::factory()->count($BENCHMARK_SIZE)->create();
                    $results = array_merge($results, $missions->toArray());
                    Mission::whereIn('id', $missions->pluck('id'))->delete();

                    $advices = Advice::factory()->count($BENCHMARK_SIZE)->create();
                    $results = array_merge($results, $advices->toArray());
                    Advice::whereIn('id', $advices->pluck('id'))->delete();

                    $sessions = Session::factory()->count($BENCHMARK_SIZE)->create();
                    $results = array_merge($results, $sessions->toArray());
                    Session::whereIn('id', $sessions->pluck('id'))->delete();

                    $addresses = Address::factory()->count($BENCHMARK_SIZE)->create();
                    $results = array_merge($results, $addresses->toArray());
                    Address::whereIn('id', $addresses->pluck('id'))->delete();

                    break;
            }

            DB::commit();
            $endTime = microtime(true);
            $executionTime = $endTime - $startTime;

            $response = [
                'test' => $test,
                'executionTime' => $executionTime,
                'results' => $results,
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
