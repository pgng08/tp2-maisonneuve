<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    static function categorySelect()
    {
        $lang = session("localeDB");

        return Category::select(
            "id",
            DB::raw("(CASE WHEN category$lang IS NULL THEN category ELSE category$lang END) AS category")
        )
            ->orderby("category")->get();
    }
}
