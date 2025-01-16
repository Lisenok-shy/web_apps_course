<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HouseImg;
use Illuminate\Http\Request;
use App\Models\House;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 1;
        return view('houses', [
            'houses' => House::orderBy("id")->paginate($perpage)->withQueryString(),
        ]);
        /*  $houses = House::all();
        return view('houses', compact('houses'));
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('house_create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
            'area' => 'required',
            'price' => 'required'
        ]);
        $error = array();
        $extension = array("jpeg", "jpg", "png", "gif");
        $house = new House($validated);
        $house->save();
        foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
            $file_name = $_FILES["files"]["name"][$key];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {
                if (!file_exists("storage/" . $file_name)) {
                    if (!file_exists("storage/" . $house->id)) {
                        mkdir('storage/' . $house->id, 0777, true);
                    }
                    move_uploaded_file($_FILES["files"]["tmp_name"][$key], "storage/" . $house->id . "/" . $file_name);
                    $house_img_data = ['house_id' => $house->id, 'img' => $house->id . "/" . $file_name];
                    $house_img = new HouseImg($house_img_data);
                    $house_img->save();
                }
            } else {
                array_push($error, "$file_name, ");
            }
        }
        return redirect("/house");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('house', [
            'house' => House::all()->where('id', $id)->first(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('house_edit', [
            'house' => House::all()->where("id", $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $house = House::all()->where("id", $id)->first();
        $house->area = $request['area'];
        $house->price = $request['price'];
        $house->address = $request['address'];
        $house->save();
        $error = array();
        $extension = array("jpeg", "jpg", "png", "gif");
        if (count($_FILES["files"]["tmp_name"]) > 0) {
            foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                $file_name = $_FILES["files"]["name"][$key];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                if (in_array($ext, $extension)) {
                    if (!file_exists("storage/" . $file_name)) {
                        if (!file_exists("storage/" . $house->id)) {
                            mkdir('storage/' . $house->id, 0777, true);
                        }
                        move_uploaded_file($_FILES["files"]["tmp_name"][$key], "storage/" . $house->id . "/" . $file_name);
                        $house_img_data = ['house_id' => $house->id, 'img' => $house->id . "/" . $file_name];
                        $house_img = new HouseImg($house_img_data);
                        $house_img->save();
                    }
                } else {
                    array_push($error, "$file_name, ");
                }
            }
        }
        return redirect("/house");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
