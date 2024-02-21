<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Advice;
use App\Models\Mission;
use App\Models\Plant;
use App\Models\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BenchmarkController extends Controller
{
    public function runTest($test)
    {
        $startTime      = microtime(true);
        $benchmark_size = 1;

        DB::beginTransaction();
        try {
            $results = [];

            switch ($test) {
                case 'test1':
                    $users   = User::factory()->count($benchmark_size)->create();
                    $results = $users->toArray();
                    User::whereIn('id', $users->pluck('id'))->delete();
                    break;

                case 'test2':
                    $plants  = Plant::factory()->count($benchmark_size)->create();
                    $results = $plants->toArray();
                    Plant::whereIn('id', $plants->pluck('id'))->delete();
                    break;

                case 'test3':
                    $missions = Mission::factory()->count($benchmark_size)->create();
                    $results  = $missions->toArray();
                    Mission::whereIn('id', $missions->pluck('id'))->delete();
                    break;

                case 'test4':
                    $advices = Advice::factory()->count($benchmark_size)->create();
                    $results = $advices->toArray();
                    Advice::whereIn('id', $advices->pluck('id'))->delete();
                    break;

                case 'test5':
                    $sessions = Session::factory()->count($benchmark_size)->create();
                    $results  = $sessions->toArray();
                    Session::whereIn('id', $sessions->pluck('id'))->delete();
                    break;

                case 'test6':
                    $addresses = Address::factory()->count($benchmark_size)->create();
                    $results   = $addresses->toArray();
                    Address::whereIn('id', $addresses->pluck('id'))->delete();
                    break;

                case 'test7':
                    $users   = User::factory()->count($benchmark_size)->create();
                    $results = $users->toArray();
                    User::whereIn('id', $users->pluck('id'))->delete();

                    $plants  = Plant::factory()->count($benchmark_size)->create();
                    $results = array_merge($results, $plants->toArray());
                    Plant::whereIn('id', $plants->pluck('id'))->delete();

                    $missions = Mission::factory()->count($benchmark_size)->create();
                    $results  = array_merge($results, $missions->toArray());
                    Mission::whereIn('id', $missions->pluck('id'))->delete();

                    $advices = Advice::factory()->count($benchmark_size)->create();
                    $results = array_merge($results, $advices->toArray());
                    Advice::whereIn('id', $advices->pluck('id'))->delete();

                    $sessions = Session::factory()->count($benchmark_size)->create();
                    $results  = array_merge($results, $sessions->toArray());
                    Session::whereIn('id', $sessions->pluck('id'))->delete();

                    $addresses = Address::factory()->count($benchmark_size)->create();
                    $results   = array_merge($results, $addresses->toArray());
                    Address::whereIn('id', $addresses->pluck('id'))->delete();
                    break;

                default:
                    return response()->json(['error' => 'Invalid test'], 400);
            }

            DB::commit();
            $endTime       = microtime(true);
            $executionTime = $endTime - $startTime;

            $response = [
                'test'          => $test,
                'executionTime' => $executionTime,
                'results'       => $results,
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
