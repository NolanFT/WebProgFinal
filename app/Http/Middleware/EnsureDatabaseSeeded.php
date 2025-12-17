<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class EnsureDatabaseSeeded
{
    protected static $seeded = false;

    public function handle($request, Closure $next)
    {
        if (!self::$seeded) {
            try {
                if (DB::table('users')->count() === 0) {
                    Artisan::call('db:seed', ['--force' => true]);
                }
                self::$seeded = true; // only seed once per runtime
            } catch (\Throwable $e) {
                // ignore if DB not ready yet
            }
        }

        return $next($request);
    }
}
