<?php

namespace App\Http\Controllers;

use App\Helpers\ParcelxHelper;
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

        $data = [
            'client_order_id' => $request->order_id ?? '',
            'consignee_emailid' => $request->consignee_emailid ?? '',
            'consignee_pincode' => $request->consignee_pincode ?? '',
            'consignee_mobile' => $request->consignee_mobile ?? '',
            'consignee_phone' => $request->consignee_phone ?? '',
            'consignee_address1' => $request->consignee_address1 ?? '',
            'consignee_address2' => $request->consignee_address2 ?? '',
            'consignee_name' => $request->consignee_name ?? '',
            'invoice_number' => $request->order_id ?? '',
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

            $url = 'https://app.parcelx.in/api/v3/order/create_order';
            $response = ParcelxHelper::sendRequest($url, $data);


            if ($response->successful()) {
                $responseData = $response->json();
                Log::info('API Response:', $responseData);

                if ($responseData['status'] == false) {
                    session()->flash('error', $responseData['responsemsg'][0]);
                    return redirect()->back();
                }
                session()->flash('success', $responseData['responsemsg'][0]);
                return redirect()->back();
            } else {
                $responseBody = $response->json();
                $errorMessage = $responseBody['responsemsg'] ?? 'Unknown error occurred';
                Log::error('API Error:', ['response' => $responseBody]);

                session()->flash('error', $errorMessage);
                return redirect()->back();
            }
        } catch (Exception $e) {
            Log::error('Exception:', ['message' => $e->getMessage()]);

            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
