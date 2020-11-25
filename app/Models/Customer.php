<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin \Eloquent
 */
class Customer extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'email',
        'name',
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels customers
     *
     * @var array
     */
    public static $labels = [
        'id' => 'id',
        'email' => 'Email',
        'name' => 'Adı',
        'created_at' => 'Oluşturulma Tarihi',
        'updated_at' => 'Güncellenme Tarihi',
        'deleted_at' => 'Silinme Tarihi',
    ];


}
