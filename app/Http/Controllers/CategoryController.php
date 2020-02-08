<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function category(){
    	return view('categories.category');
    }
    public function addCategory(Request $request){
    	//return $request->input('category'); transfer input to the be seen on the page
    	$this->validate($request, [
    		'category'=>'required']);
    	//return 'validation passed'; when you input something it would return pass 
    	$category = new Category;
    	$category->category=$request->input('category');
    	$category->save();
    	return redirect('/category')->with('response', 'category added successfully');//response will show on the blade
    	
    }
}
 