<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function show()
    {
        $data['warehouses'] = Warehouse::where('status', 1)->get();
        return view('users.orders.create', $data);
    }

    public function create(Request $request)
    {
        $access_key = env('PARCELX_ACCESS_KEY');
        $secret_key = env('PARCELX_SECRET_KEY');
        $auth_token = base64_encode($access_key . ':' . $secret_key);
        dd($auth_token);
        $data = [
            'client_order_id' => $request->invoice_number ?? '',
            'consignee_emailid' => $request->consignee_emailid ?? '',
            'consignee_pincode' => $request->consignee_pincode ?? '',
            'consignee_mobile' => $request->consignee_mobile ?? '',
            'consignee_phone' => $request->consignee_phone ?? '',
            'consignee_address1' => $request->consignee_address1 ?? '',
            'consignee_address2' => $request->consignee_address2 ?? '',
            'consignee_name' => $request->consignee_name ?? '',
            'invoice_number' => $request->invoice_number ?? '',
            'express_type' => 'surface',
            'pick_address_id' => $request->pickup_address ?? '',
            'return_address_id' => $request->is_return_address === 'true' ? $request->return_address : '',
            'cod_amount' => $request->cod_amount ?? '0',
            'tax_amount' => $request->tax_amount ?? '0',
            'mps' => $request->mps ?? '0',
            'courier_type' => 0,
            'courier_code' => '',
            'products' => [],
            'address_type' => $request->address_type ?? 'Home',
            'payment_mode' => $request->payment_mode ?? 'Prepaid',
            'order_amount' => $request->order_amount ?? '0.00',
            'extra_charges' => $request->extra_charges ?? '0',
            'shipment_width' => $request->shipment_width ?? ['1'],
            'shipment_height' => $request->shipment_height ?? ['1'],
            'shipment_length' => $request->shipment_length ?? ['1'],
            'shipment_weight' => $request->shipment_weight ?? ['1'],
        ];
        
        Log::info('data',$data);
        // Map product details
        if (!empty($request->product_sku)) {
            foreach ($request->product_sku as $index => $sku) {
                $data['products'][] = [
                    'product_sku' => $sku,
                    'product_name' => $request->product_name[$index] ?? '',
                    'product_value' => $request->product_value[$index] ?? '0',
                    'product_hsnsac' => '',
                    'product_taxper' => 0,
                    'product_category' => $request->product_category[$index] ?? '',
                    'product_quantity' => $request->product_quantity[$index] ?? '1',
                    'product_description' => '',
                ];
            }
        }
        try {
            $response = Http::withHeaders([
                'access-token' => $auth_token,
            ])->withOptions(['verify' => false])
                ->post('https://app.parcelx.in/api/v1/order/create_order', $data);
                Log::info('sss',[$response]);
                
            if ($response->successful()) {
                $responseData = $response->json();
                Log::info('API Response:', $responseData);
                return response()->json(['success' => true, 'data' => $responseData]);
            } else {
                $responseBody = $response->json();
                $errorMessage = $responseBody['responsemsg'] ?? 'Unknown error occurred';
                Log::error('API Error:', ['response' => $responseBody]);
                return response()->json(['success' => false, 'error' => $errorMessage], 400);
            }
        } catch (Exception $e) {
            Log::error('Exception:', ['message' => $e->getMessage()]);
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
