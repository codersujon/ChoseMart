<?php

namespace App\Services;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    /**
     * Summary of createProduct
     * @param array $data
     * @param mixed $imageName
     * @return mixed
     */
    // public function createProduct(array $data, $imageName)
    // {
    //     return Product::create(array_merge($data, ['image' => $imageName]));
    // }


    public function createProduct(array $data, $image)
        {
            // Use the store method directly on the uploaded file
            $path = $image->store('images', 'public');

            // Save the product with the stored image path
            return Product::create(array_merge($data, ['image' => $path]));
        }


    public function updateProduct(Product $product, array $data, $image = null)
    {
        try {
            if ($image !== null) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->put($imageName, file_get_contents($image));
                // Delete the old image file and update the database with the new image name
                Storage::disk('public')->delete($product->image);
                $product->image = $imageName;
            }

            $product->update($data);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    
    public function deleteProductById($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
   
}
