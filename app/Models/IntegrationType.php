<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class IntegrationType extends Model
{
    use Sushi;

    public const N11 = 1;
    public const TRENDYOL = 2;

    protected $rows = [
        ['id' => self::N11, 'name' => 'N11', 'slug' => 'n11'],
        ['id' => self::TRENDYOL, 'name' => 'Trendyol', 'slug' => 'trendyol']
    ];
}
