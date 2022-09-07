<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller{
// addCategory Mmethod============
    public function addCategory(){
      $categories = Category::latest()->get();
      return view('category/category',compact('categories'));
    }

// categorySubmit Mmethod============
    public function categorySubmit(Request $request){
      $this->validate($request,[
        'catename' => 'required',
        'catename' => 'min:3|max:30|unique:categories,catename',
      ],[
        'catename.required' => 'Please Insert Input Fild!',
        'catename.min' => 'Please Insert Minumum Carecter!',
      ]);
        Category::insert($request->except('_token') + [
          'created_at' => Carbon::now()
        ]);
        return back()->with('cateinsert',"Category Insert succesfull");
    }
// categorydelete Mmethod============
    public function categoryEdit ($cateId){
      $categoryedit = Category::find($cateId);
      return view('category/categoryedit',compact('categoryedit'));
    }
// categorydelete Mmethod============
    public function categoryUpdate (Request $request , $cateId){
      Category::find($cateId)->update([
       'catename' => $request->catename
     ]);
     return back();
    }

    // categorydelete Mmethod============
    public function categorydelete ($cateId){
      Category::find($cateId)->delete();
      return back();
   }

}
