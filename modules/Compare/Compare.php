<?php

namespace Modules\Compare;

use JsonSerializable;
use Modules\Product\Entities\Product;
use Darryldecode\Cart\Cart as DarryldecodeCart;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class Compare extends DarryldecodeCart implements JsonSerializable
{
    /**
     * @throws InvalidItemException
     */
    public function store($productId)
    {
        $product = Product::with('files', 'attributes.attribute')
            ->with('reviews')
            ->withCount('options')
            ->findOrFail($productId);



        return $this->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->variant?->price->amount() ?? $product->price->amount(),
            'quantity' => 1,
            'attributes' => compact('product'),
        ]);
    }


    public function hasAnyProduct()
    {
        return $this->products()->isNotEmpty();
    }


    public function products()
    {
        return $this->getContent()->map(function ($item) {
            return $item->attributes->product;
        });
    }


    public function getContent()
    {
        return new EloquentCollection($this->session->get($this->sessionKeyCartItems));
    }


    public function count()
    {
        return $this->products()->count();
    }

    
    public function relatedProducts()
    {
        return $this->products()->load(['relatedProducts' => function ($query) {
            $query->forCard();
        }])->pluck('relatedProducts')->flatten();
    }


    public function list()
    {
        return $this->products()->pluck('id');
    }


    public function __toString()
    {
        return json_encode($this->jsonSerialize());
    }


    public function jsonSerialize(): mixed
    {
        return [
            'products' => $this->products(),
            'attributes' => $this->attributes(),
        ];
    }


    public function attributes()
    {
        return $this->products()->flatMap->attributes->unique('name');
    }
}
