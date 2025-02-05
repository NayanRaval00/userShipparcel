<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'shiparcel_orders';

    protected $fillable = [
        'client_order_id',
        'consignee_emailid',
        'consignee_pincode',
        'consignee_mobile',
        'consignee_phone',
        'consignee_address1',
        'consignee_address2',
        'consignee_name',
        'invoice_number',
        'express_type',
        'pick_address_id',
        'return_address_id',
        'cod_amount',
        'tax_amount',
        'order_amount',
        'payment_mode',
        'courier_type',
        'shipment_width',
        'shipment_height',
        'shipment_length',
        'shipment_weight',
        'awb_number',
        'order_number',
        'job_id',
        'lrnum',
        'waybills_num_json',
        'lable_data',
        'routing_code',
        'partner_display_name',
        'courier_code',
        'pickup_id',
        'courier_name',
        'user_id'

    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'order_id');
    }
}
