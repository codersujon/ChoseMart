<?php

namespace App\Http\Controllers;

use App\Models\ProductCart;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductCartController extends Controller
{
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'product_id' => 'required|integer',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'color' => 'sometimes|string',
            'size' => 'sometimes|string',
        ]);
    }
    public function addToChart(Request $request)
    {
        try {
            $validatedData = $this->validateRequest($request);

            // Get or generate a unique token for the user's session
            $token = $this->getUserToken();

            // Check if the product with the same attributes already exists in the cart
            $existingCartItem = ProductCart::where('user_token', $token)
                ->where('product_id', $validatedData['product_id'])
                ->where('color', $validatedData['color'])
                ->where('size', $validatedData['size'])
                ->first();

            if ($existingCartItem) {
                // Update the quantity instead of creating a new entry
                $existingCartItem->increment('qty', $validatedData['qty']);
            } else {
                // Create a new cart item
                $cartItem = new ProductCart($validatedData);
                $cartItem->user_token = $token;
                $cartItem->save();
            }

            return redirect()->route('product.checkout')->with('success', 'Product added to cart successfully');
        } catch (\Exception $e) {
            // Handle errors
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    private function getUserToken()
    {
        // Check if the session has a user token
        $token = Session::get('user_token');

        // If no token exists, generate a new one and store it in the session
        if (!$token) {
            $token = md5(Session::getId() . $_SERVER['REMOTE_ADDR']);
            Session::put('user_token', $token);
        }

        return $token;
    }

    
    public function updateQuantity(Request $request)
    {
        $productId = $request->input('productId');
        $color = $request->input('price_color');
        $size = $request->input('price_size');
        $quantity = $request->input('quantity');

        // Check which button was clicked
        $updateType = $request->input('quantityUpdate');

        // Perform validation and update the quantity in the database
        $cartItem = ProductCart::where('product_id', $productId)
            ->where('user_token', Session::get('user_token'))
            ->where('color', $color)
            ->where('size', $size)
            ->first();

        if ($cartItem) {
            if ($updateType === 'increment') {
                $cartItem->qty += 1;
            } elseif ($updateType === 'decrement' && $cartItem->qty > 0) {
                $cartItem->qty -= 1;
            }

            $cartItem->save();

            return redirect()->back()->with('success', 'Quantity updated successfully');
        } else {
            return redirect()->back()->with('error', 'Cart item not found');
        }
    }
    
public function deleteItem(Request $request)
{
    try {
        // Validate the request data
        $request->validate([
            'user_token' => 'required',
            'color' => 'required',
            'size' => 'required',
        ]);

        // Extract the values from the request
        $userToken = $request->input('user_token');
        $color = $request->input('color');
        $size = $request->input('size');

        // Find the item based on the provided criteria
        $item = ProductCart::where([
            'user_token' => $userToken,
            'color' => $color,
            'size' => $size,
        ])->first();

        if ($item) {
            // Perform the deletion
            $item->delete();

            return redirect()->back()->with('success', 'Item deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Item not found');
        }
    } catch (\Exception $e) {
        // Log the exception or handle it in a way that suits your application
        return redirect()->back()->with('error', 'Error deleting item');
    }
}

  
}
