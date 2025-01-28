<?php

namespace App\Http\Controllers;


class OrderController extends Controller
{
    public function show()
    {
        return view('users.orders.create');
    }

}
