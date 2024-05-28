<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){

    return view('backend.category.add');
    }
   
    function store(Request $request)
    {
        // / dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
           
        ]);

        // Store data into variables
        $categoryname = $validatedData['name'];
        $categorydescription = $validatedData['description'] ?? null;
        $isactive = $validatedData['is_active'];

    
        // Create a new Category instance
        $category = new category();

        // Assign values to the model properties one by one
        $category->categoryname = $categoryname;
        $category->categorydescription = $categorydescription;
        $category->isactive = $isactive;
        $category->user_id = auth()->id();

        // Save the model to the database
        $category->save();

        return redirect()->route('view.category')->with('success', 'Category created successfully',5);
    }

    function show(){
        $auth_id=auth()->id();
        $category=category::where('user_id',$auth_id)->get();

        return view('backend.category.view',compact('category'));
    }

    function update($id){
         $category=category::where('id',$id)->first();
     
         return view('backend.category.edit',compact('category'));
    }

    function delete($id){
        category::find($id)->delete();
        return redirect()->route('view.category')->with('success', 'Category created successfully',5);
    }

    public function edit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'categoryname' => 'required|string|max:255',
            'categorydescription' => 'nullable|string',
            'isactive' => 'required|boolean',
        ]);

        $category = category::findOrFail($id);
        $category->categoryname = $validatedData['categoryname'];
        $category->categorydescription = $validatedData['categorydescription'];
        $category->isactive = $validatedData['isactive'];
        $category->save();

        return redirect()->route('view.category')->with('success', 'Category updated successfully');
    }

}
