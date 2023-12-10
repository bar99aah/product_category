<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        Category::create([
            'name'=>'new category 1'.$product->id,
            'description'=>'**** 1',
        ]);
    }

    public function creating(Product $product): void
    {
        Category::create([
            'name'=>'new category 2',
            'description'=>'**** 2',
        ]);
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
