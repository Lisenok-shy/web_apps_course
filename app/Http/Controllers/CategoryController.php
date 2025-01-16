<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\House;
use Throwable;

class CategoryController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories',[
            'categories'=>Category::all()->sortBy("id")
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $id)
    {
        try {
        $house = House::all()->where('id',$id)->first();
        $house->categories()->attach($request['category_id']);
        $house->save();
        return back();
        }catch(Throwable $th){
            return back()->withErrors(["common"=>"Ошибка при заведении категории"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category)
    {
        return view('category',[
            'category'=>Category::all()->where('category',$category)->first()
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
