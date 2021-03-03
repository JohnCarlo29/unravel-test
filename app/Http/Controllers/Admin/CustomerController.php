<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::paginate();

        return view('admin.customer.index', compact('customers'));
    }

    public function show(User $user)
    {
        $customer = $user->load([
            'orders' => fn($query) => $query->orderBy('created_at', 'desc')->first()
        ]);

        return view('admin.customer.show', compact('customer'));
    }
}
