<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin \Eloquent
 */
class Integration extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'integration_type_id',
        'customer_id',
        'username',
        'passport',
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels integrations
     *
     * @var array
     */
    public static $labels = [
        'id' => 'id',
        'integration_type_id' => 'Entegrasyon Tipi',
        'customer_id' => 'Müşteri',
        'username' => 'Kullanıcı Adı',
        'passport' => 'Şifre',
        'created_at' => 'Oluşturulma Tarihi',
        'updated_at' => 'Güncellenme Tarihi',
        'deleted_at' => 'Silinme Tarihi',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function integrationType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IntegrationType::class);
    }


}
