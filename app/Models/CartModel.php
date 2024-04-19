<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'vinyl_id', 'quantity', 'created_at', 'updated_at'];

    public function addToCart($userId, $vinylId, $quantity) {
        // Check if the item already exists in the cart for the user
        $existingCartItem = $this->where('user_id', $userId)
                                ->where('vinyl_id', $vinylId)
                                ->first();

        if ($existingCartItem) {
            // If the item already exists, update its quantity
            $newQuantity = $existingCartItem['quantity'] + $quantity;
            $this->update($existingCartItem['id'], ['quantity' => $newQuantity]);
        } else {
            // If the item doesn't exist, add it to the cart
            $this->insert([
                'user_id' => $userId,
                'vinyl_id' => $vinylId,
                'quantity' => $quantity,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }

    public function getCartItems($userId){
    // Join the cart items with the vinyl_info table to get the vinyl name and other details
    return $this->select('cart.*, vinyl_info.vinyl_name, vinyl_info.vinyl_price')
                ->where('cart.user_id', $userId)
                ->join('vinyl_info', 'vinyl_info.id = cart.vinyl_id')
                ->findAll();
    }

    public function updateCartItem($itemId, $newQuantity)
    {
        $this->update($itemId, ['quantity' => $newQuantity]);
    }

    public function removeCartItem($itemId)
    {
        return $this->delete($itemId);
    }

    public function clearCart($userId)
    {
        // Delete all items from the cart for the given user ID
        return $this->where('user_id', $userId)->delete();
    }


}
