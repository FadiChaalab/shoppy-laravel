<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function create()
    {
        return view('product.create');
    }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('product.detail', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->save();

        return redirect('/products')->with('success', 'Product updated!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:3000',
            'image' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|max:255',
            'quantity' => 'required|numeric',
        ]);

        $image_64 = $request->image;
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];

        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.' . $extension;

        Storage::disk('products')->put($imageName, base64_decode($image));;
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $imageName;
        $product->user_id = auth()->user()->id;
        $product->save();

        return redirect('/add_product')->with('success', 'Product created successfully!');
    }

    public function add_to_cart(Request $request, $id)
    {
        $product = Product::find($id);
        $product->quantity -= $request->quantity;
        $product->save();
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $product->id;
        $cart->quantity = $request->quantity;
        $cart->name = $product->name;
        $cart->price = $product->price;
        $cart->image = $product->image;
        $cart->total = $product->price * $request->quantity;
        $cart->save();

        $request->session()->put('cart', $cart);
        return redirect('/users/home')->with('success', 'Product added to cart!');
    }

    public function delete_cart_item($id)
    {
        $cart = Cart::find($id);
        $product = Product::find($cart->product_id);
        $product->quantity += $cart->quantity;
        $product->save();
        $cart->delete();
        return redirect('/users/home')->with('success', 'Product deleted from cart!');
    }

    public function checkout(Request $request)
    {

        $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'method' => 'required',
        ]);

        $carts = Cart::where('user_id', auth()->user()->id)->get();
        if (count($carts) == 0) {
            return redirect('/users/home')->with('error', 'Cart is empty!');
        } else {
            $total = 0;
            $quantity = 0;
            foreach ($carts as $cart) {
                $total += $cart->total;
                $quantity += $cart->quantity;
            }

            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->name = auth()->user()->name;
            $order->email = auth()->user()->email;
            $order->image = auth()->user()->image ?? 'default.png';
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->method = $request->method;
            $order->total = $total;
            $order->quantity = $quantity;
            $order->save();

            Cart::where('user_id', auth()->user()->id)->delete();

            return redirect('/users/home')->with('success', 'Order created successfully!');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::disk('products')->delete($product->image);
        $product->delete();
        return redirect('/products')->with('success', 'Product deleted!');
    }
}