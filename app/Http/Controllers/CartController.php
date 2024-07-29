<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Producto agregado al carrito exitosamente.');
    }

    public function index()
    {
        $cartItems = CartItem::where('user_id', auth()->id())->with('product')->get();
        $subtotal = $cartItems->sum(function($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });

        return view('cart.index', compact('cartItems', 'subtotal'));
    }

    public function checkout(Request $request)
    {
        $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $receipt = "Recibo de tu compra:\n";
        foreach ($cartItems as $item) {
            $receipt .= "{$item->product->name} x {$item->quantity} = $" . ($item->product->price * $item->quantity) . "\n";
        }
        $receipt .= "Total: $$total\n";

        // Guardar el recibo en un archivo de texto
        $fileName = 'receipt_' . now()->format('Ymd_His') . '.txt';
        $receiptPath = storage_path('app/public/' . $fileName);
        file_put_contents($receiptPath, $receipt);

        // Enviar el recibo por correo electrónico
        Mail::raw($receipt, function ($message) use ($request) {
            $message->to($request->user()->email)
                ->subject('Recibo de tu compra');
        });

        // Vaciar el carrito
        CartItem::where('user_id', Auth::id())->delete();

        // Redirigir a la vista del carrito con el mensaje de éxito y el recibo
        return redirect()->route('cart.index')->with('success', 'Compra realizada con éxito.')->with('receipt', $receipt);

    }
}
