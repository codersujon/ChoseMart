<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Summary of productService
     * @var 
     */
    protected $productService; // Correctly declared property

    /**
     * Summary of __construct
     * @param \App\Services\ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Summary of index
     * @return mixed
     */
    public function index(){
         $products = Product::orderBy('created_at', 'desc')->get();
        return view('AdminSite.Pages.ProductPage',['data'=>$products]);
    }



    /**
     * Summary of create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('AdminSite.Pages.AddProduct');
    }
    /**
     * Summary of store
     * @param \App\Http\Requests\ProductRequest $request
     * @param \App\Services\ProductService $productService
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    // public function store(ProductRequest $request, ProductService $productService)
    // {
    //     try {
    //         $validatedData = $request->validated();
    //         if ($request->hasFile('image')) {
    //             $image = $request->file('image');
    //             $imageName = time() . '.' . $image->getClientOriginalExtension();
    //             Storage::disk('public')->put($imageName, file_get_contents($image));
    //         }
    //         $productService->createProduct($validatedData, $imageName);

    //         return redirect()->route('products.index')->with('success', 'Product uploaded successfully');

    //     } catch (\Exception $e) {
    //         return back()->with('error', $e->getMessage());
    //     }
    // }
    
     public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
            'title' => 'required',
            'short_des' => 'required',
            'price' => 'required|numeric',
            'old_price' => 'numeric|nullable',
            'discount_price' => 'numeric|nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantity' => 'required|numeric',
            'color' => 'nullable',
            'size' => 'nullable',
        ]);
    
        $imageFile = $request->file('image');
    
        // Check if a file is uploaded
        if ($imageFile) {
            // Generate a unique filename
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
    
            // Move the uploaded file to the 'product_images' directory within the public folder
            $imageFile->move(public_path('images'), $imageName);
    
            // Set the image path for database storage
            $imagePath = $imageName;
        } else {
            // If no file is uploaded, you may want to handle this case according to your requirements
            return back()->with('error', 'Image not provided');
        }
    
        $result = Product::create([
            'product_code' => $request->input('product_code'),
            'title' => $request->input('title'),
            'short_des' => $request->input('short_des'),
            'price' => $request->input('price'),
            'old_price' => $request->input('old_price'),
            'discount_price' => $request->input('discount_price'),
            'image' => $imagePath,
            'quantity' => $request->input('quantity'),
            'color' => $request->input('color'),
            'size' => $request->input('size'),
        ]);
    
        if ($result) {
            return redirect()->route('products.index')->with('message', 'Product inserted successfully done');
        } else {
            return back()->with('error', 'Product not inserted successfully');
        }
    }
    
    /**
     * Summary of edit
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('AdminSite.Pages.EditProduct',['data'=>$product]);

    }

    // public function update(Request $request, $id)
    // {
    //     try {
    //         $product = Product::find($id);
    
    //         if (!$product) {
    //             return redirect()->route('products.index')->with('error', 'Product not found');
    //         }
    
    //         // Check if a new image is provided in the update form
    //         if ($request->hasFile('image')) {
    //             $image = $request->file('image');
    //             $imageName = time() . '.' . $image->getClientOriginalExtension();
    //             Storage::disk('public')->put($imageName, file_get_contents($image));
    
    //             // Delete the old image file and update the database with the new image name
    //             Storage::disk('public')->delete($product->image);
    //             $product->image = $imageName;
    //         }
    
    //         // Check if other specific columns are included in the request and update them
    //         if ($request->has('title')) {
    //             $product->title = $request->input('title');
    //         }
    
    //         if ($request->has('short_des')) {
    //             $product->short_des = $request->input('short_des');
    //         }
    //         if ($request->has('price')) {
    //             $product->price = $request->input('price');
    //         }
    //         if ($request->has('old_price')) {
    //             $product->old_price = $request->input('old_price');
    //         }
    //         if ($request->has('discount_price')) {
    //             $product->discount_price = $request->input('discount_price');
    //         }
    //         if ($request->has('quantity')) {
    //             $product->quantity = $request->input('quantity');
    //         }
    //         $product->save();
    //         return redirect()->route('products.index')->with('success', 'Product updated successfully');
    //     } catch (\Exception $e) {
    //         return back()->with('error', $e->getMessage());
    //     }
    // }
    
    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
    
            if (!$product) {
                return redirect()->route('products.index')->with('error', 'Product not found');
            }
    
            // Check if a new image is provided in the update form
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
    
                // Move the uploaded file to the public directory
                $image->move(public_path('images'), $imageName);
    
                // Delete the old image file and update the database with the new image name
                if ($product->image) {
                    $oldImagePath = public_path('images') . '/' . $product->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
    
                $product->image = $imageName;
            }
    
            // Update other specific columns
            $product->fill($request->only([
                            'product_code', 'title', 'short_des', 'price', 'old_price', 'discount_price', 'quantity', 'color', 'size'
                        ]));
    
            $product->save();
    
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function destroy($id, ProductService $productService)
        {
            if ($productService->deleteProductById($id)) {
                return redirect()->route('products.index')->with('success', 'Product deleted successfully');
            } else {
                return redirect()->route('products.index')->with('error', 'Product not found');
            }
        }
}
