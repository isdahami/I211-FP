<?php

namespace App\Controllers;

use App\Models\CartModel;

class CartController extends BaseController
{
    protected $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function index()
    {
        // Retrieve the authenticated user's ID
        $userId = auth()->id();
        
        // Get the cart items for the user
        $cartItems = $this->cartModel->getCartItems($userId);
        
        // Calculate the total price of the items in the cart
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['quantity'] * $item['vinyl_price'];
        }
        
        // Pass the cart items and total to the view
        $data['cartItems'] = $cartItems;
        $data['total'] = $total;

        return view('cart/cart', $data);
    }

    public function addItem()
    {
        // Retrieve the authenticated user's ID
        $userId = auth()->id();

        // Get the vinyl ID and quantity from the request
        $vinylId = $this->request->getPost('vinyl_id');
        $quantity = $this->request->getPost('quantity');

        // Add item to the cart
        $this->cartModel->addToCart($userId, $vinylId, $quantity);

        // Redirect back to cart page
        return redirect()->to('/cart');
    }

    public function updateItem()
    {
        // Get the cart item ID and new quantity from the request
        $itemId = $this->request->getPost('item_id');
        $newQuantity = $this->request->getPost('quantity');

        // Update item quantity in the cart
        $this->cartModel->updateCartItem($itemId, $newQuantity);

        // Redirect back to cart page
        return redirect()->to('/cart');
    }

    public function removeItem()
    {
        // Get the cart item ID from the request
        $itemId = $this->request->getPost('item_id');

        // Remove item from the cart
        $this->cartModel->removeCartItem($itemId);

        // Redirect back to cart page
        return redirect()->to('/cart');
    }

    public function checkout()
    {
        // Retrieve the authenticated user's ID
        $userId = auth()->id();
        
        // Clear the cart for the current user
        $this->cartModel->clearCart($userId);

        // Prepare success message
        $data['message'] = 'Checkout successful! Your cart has been cleared.';

        // Pass the message to the view
        return view('cart/cartSuccess', $data);
    }
}
