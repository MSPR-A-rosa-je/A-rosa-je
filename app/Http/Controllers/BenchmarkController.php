<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;

class BenchmarkController extends Controller
{
    public function runTest($test)
    {
        $startTime = microtime(true);
        $BENCHMARK_SIZE = 10;

        switch ($test) {
            case 'test1':
                $results = [];
                foreach (range(1, $BENCHMARK_SIZE) as $i) {
                    $user = User::factory()->create();
                    $results[] = $user;
                }
                foreach ($results as $user) {
                    $user->delete();
                }
                break;
            case 'test2':
                $results = [];
                break;
            default:
                $results = ['error' => 'Test no reconized'];
                break;
        }

        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;
        $response = [
            'test' => $test,
            'executionTime' => $executionTime,
            'results' => $results,
        ];

        return response()->json($response);
    }
}
