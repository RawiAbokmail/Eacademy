<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckouteRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Dom\Attr;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function store(Request $request)
    {
        // التحقق من البيانات
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email',
            'address'    => 'required|string',
            'city'       => 'required|string',
            'postcode'   => 'required|string',
            'country'    => 'required|string',
            'payment_method' => 'required|string'
        ]);

        // إنشاء الطلب
        $order = Order::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'city'       => $request->city,
            'postcode'   => $request->postcode,
            'country'    => $request->country,
            'payment_method' => $request->payment_method,
            'order_note' => $request->order_note,
            'total'      => Cart::getTotal(),
        ]);

        // حفظ المنتجات المرتبطة بالطلب
        foreach (Cart::getContent() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price
            ]);
        }

        // تفريغ السلة
        Cart::clear();

        return redirect()->route('eacademy.index')->with('success', 'Your order has been placed successfully!');
    }

    public function process(CheckouteRequest $request)
{
    $cart = session('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart')->with('error', 'السلة فارغة');
    }

    $subTotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
    $shipping = $subTotal > 0 ? 70 : 0;
    $total = $subTotal + $shipping;

    $order = Order::create([
        'user_id' => auth()->id(),
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'company_name' => $request->company_name,
        'country' => $request->country,
        'street_address1' => $request->street_address1,
        'street_address2' => $request->street_address2,
        'town' => $request->town,
        'state' => $request->state,
        'postcode' => $request->postcode,
        'phone' => $request->phone,
        'order_note' => $request->order_note,
        'total_price' => $total,
    ]);

    foreach ($cart as $slug => $item) {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
    }

    session()->forget('cart');

    return redirect()->route('eacademy.shop');
}

}
