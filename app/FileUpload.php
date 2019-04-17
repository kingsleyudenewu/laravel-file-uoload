<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $fillable = [
        'reporting_region',
        'start_date',
        'end_date',
        'upc',
        'grid',
        'isrc',
        'custom_id_1',
        'custom_id_2',
        'custom_id_3',
        'custom_id_4',
        'google_id',
        'artist',
        'product_title',
        'container_title',
        'content_provider',
        'label',
        'consumer_country',
        'device_type',
        'product_type',
        'interaction_type',
        'total_play',
        'partner_revenue_paid',
        'partner_revenue_currency',
        'eur_amount'
    ];
}
