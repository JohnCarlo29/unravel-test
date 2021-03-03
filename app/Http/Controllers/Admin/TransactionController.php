<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Order::with([
            'user' => fn($query) => $query->select('id', 'name')->get()
        ])
        ->orderBy('created_at', 'desc')
        ->paginate();

        return view('admin.transaction.index', compact('transactions'));
    }

    public function show(Order $order)
    {
        $transaction = $order->load([
            'user' => fn($query) => $query->select('users.id', 'name')->get(),
            'products' => fn($query) => $query->select('products.id', 'name')->get()
        ]);

        return view('admin.transaction.show', compact('transaction'));
    }
}
