<?php

namespace App\Http\Controllers;
use App\Http\Resources\CategoryResouce;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponseTrait;

use Exception;

class CategoryControllerApi extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    // my update for api
    
    public function index()
    {
        $category = Category::all();

        $categoryResouce = CategoryResouce::collection($category);

        return $this->apiResponse($categoryResouce, 'all category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
    
            $category = new Category([
                'name' => $request->name,
                'description' => $request->description,
            ]);
    
            $categoryResouce = CategoryResouce::make($category);
            return response($categoryResouce, 200);
        }
        catch(Exception $e){
            return response('not found', 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
            $category = Category::find($id);
            if(is_null($category)){
                return response('not found', 404);
            }
            return $this->apiResponse($category, 'this is category');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Category $category)
    {
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
    
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
    
            $categoryResouce = CategoryResouce::make($category);
            return response($categoryResouce, 200);
        }
        catch(Exception $e){
            return response('not found', 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->apiResponse($category, 'deleted category');

    }
}
