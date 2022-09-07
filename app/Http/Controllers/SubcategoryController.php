<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;

class SubcategoryController extends Controller{
// addSubCategory Mmethod============
    public function addSubCategory (){
      $categories = Category::all();
      $subcategories = Subcategory::all();
      return view ('subcategory/subcategory',compact('categories','subcategories'));
    }
// subcategorySubmit Mmethod============
    public function subcategorySubmit (Request $request){
      $this->validate($request,[
        'category_id' => 'required',
        'subcategory_name' => 'required|min:4|max:12',
      ],[
        'category_id.required' => 'Please Insert Input Fild!',
        'subcategory_name.required' => 'Please Insert Input Fild!',
        'subcategory_name.min' => 'Please Insert Minumum Carecter!',
        'subcategory_name.max' => 'Please Insert Maximum Carecter!',
      ]);
        Subcategory::insert($request->except('_token') + [
          'created_at' => Carbon::now()
        ]);
        return back()->with('subcategory',"Your sub Category Insert successfull");
    }
// subcategoryedit Mmethod============
    public function subcategoryedit ($subcateId){
      $subcategory = Subcategory::findOrFail($subcateId);
      return view('subcategory/subcatedit',compact('subcategory'));
    }
    // subcategoryupdate Mmethod============
    public function subcategoryupdate (Request $request , $subcateId){
      Subcategory::find($subcateId)->update([
       'subcategory_name' => $request->subcategory_name
     ]);
     return back();
    }
    // subcategorydelete Mmethod============
    public function subcategorydelete ($subcateId){
      Subcategory::find($subcateId)->delete();
   }
}
