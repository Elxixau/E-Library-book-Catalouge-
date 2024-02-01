<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['ip_address', 'user_agent'];

    public static function monthlyVisitors()
    {
    return self::selectRaw('COUNT(*) as total')
        ->groupByRaw('YEAR(created_at), MONTH(created_at)')
        ->get()
        ->pluck('total') // Mengambil hanya kolom "total"
        ->first();
    }

public static function yearlyVisitors()
{
    return self::selectRaw('COUNT(*) as count')
        ->groupByRaw('YEAR(created_at)')
        ->get()
        ->pluck('count') // Mengambil hanya kolom "count"
        ->first();
    }

    public static function logVisitor()
    {
        return self::create([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
