<?php


namespace App\Http\Controllers;


use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function cart()
    {
        $products = session()->get('cart', []);
        return view('cart.cart', compact('products'));
    }

    public function addSubtractToCart(Request $request, $productId){

        $cart = session()->get('cart');
        if (!isset($cart[$productId])) {
            return response()->json(['success' => false, 'cart_items' => count(Session::get('cart')), 'message' => 'Product not found']);
        }

        $productAvailableQty = Products::find($productId)->getAttributeValue('quantity');

        if ($productAvailableQty >= $request->productQty){
            $cart[$productId]['quantity'] = $request->productQty;
            Session::put('cart', $cart);

            return response()->json(['success' => true, 'cart_items' => count(Session::get('cart')), 'message' => 'The quantity was changed successfully!']);
        }

        return response()->json(['success' => false, 'cart_items' => count(Session::get('cart')), 'message' => 'Requested amount for product is not available']);
    }

    public function addToCart($productId)
    {
        $product = Products::find($productId);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $productId => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->images
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' => 'Product added to cart successfully!',
                'productCount' => count($cart)]);
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' => 'Product added to cart successfully!',
                'productCount' => count($cart)]);
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$productId] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->images
        ];
        session()->put('cart', $cart);
        return response()->json(['success' => true, 'message' => 'Product added to cart successfully!',
            'productCount' => count($cart)]);
    }
}
https://www.scratchcode.io/increase-quantity-if-product-already-exists-in-cart/
