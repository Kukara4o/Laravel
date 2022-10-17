<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $categories = Category::all();

        return response()->json([
            'status' => true,
            'report' => 'Categories right here!',
            'data' => $categories,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($data);

        return response()->json([
            'status' => true,
            'report' => 'Category created!',
            'data' => $category,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $category = Category::find($id);

        return response()->json([
            'status' => true,
            'report' => 'Categories found!',
            'data' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if($category) {
            $category->update($data);

            return response()->json([
                'status' => true,
                'report' => 'Category update!',
                'data' => $category,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'report' => 'Category not exists!',
                'data' => null,
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $category = Category::find($id);

        if($category) {
            $category->delete();

            return response()->json([
                'status' => true,
                'report' => 'Category deleted!',
                'data' => null,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'report' => 'Category not exists!',
                'data' => null,
            ], 404);
        }
    }
}
