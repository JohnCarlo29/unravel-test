<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $itemStored = [
            'quantity' => 0,
            'price' => $item->price,
            'item' => $item
        ];

        if ($this->items && array_key_exists($id, $this->items)) {
            $itemStored = $this->items[$id];
        }

        $itemStored['quantity']++;
        $itemStored['price'] = $item->price * $itemStored['quantity'];
        $this->totalQuantity++;
        $this->totalPrice += $item->price;
        $this->items[$id] = $itemStored;
    }
}