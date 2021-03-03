<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $oldCart = session()->has('cart') ? session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        session()->put('cart', $cart);

        return back()->with('success-message', 'Product Added to Cart');
    }

    public function show()
    {
        if (!session('cart')) {
            return view('customer.cart.view');
        }

        $cart = new Cart(session('cart'));

        return view('customer.cart.view', [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function checkout()
    {
        return view('customer.cart.checkout-b');
    }

    public function pay(Request $request)
    {      
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $payment = \Stripe\Charge::create([
            "amount" => session('cart')->totalPrice * 100,
            "currency" => "sgd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        $order = auth()->user()->orders()->create([
            'transaction_id' => $payment->id,
            'total' => $payment->amount
        ]);

        foreach (session('cart')->items as $id => $value) {
            $order->products()->attach($id, ['quantity' => $value['quantity']]);
        }

        session()->forget('cart');

        return redirect()->route('products.index')->with('success-message', 'Successfully purchased product');
    }
}
