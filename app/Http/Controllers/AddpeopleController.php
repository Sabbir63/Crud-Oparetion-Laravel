<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addpeople;
use Carbon\Carbon;

class AddpeopleController extends Controller{
// addPeople Mmethod
    public function addPeople(Request $request){
      $this->validate($request,[
        'depertment_id' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'designation' => 'required',
      ],[
        'depertment_id.required' => 'Please Insert Depertment Filds',
        'name.required' => 'Please Insert Name Filds',
        'phone.required' => 'Please Insert Phone Filds',
        'email.required' => 'Please Insert Email Filds',
        'designation.required' => 'Please Insert Degignation Filds',
      ]);
      Addpeople::insert($request->except('_token') + [
        'created_at' => Carbon::now()
      ]);

      return redirect('all/people')->with('addpeople',"People Insert Successfull");
    }
// allPeople Mmethod============
    public function allPeople(){
      $allpeoples = Addpeople::latest()->get();
      return view('people/allpeople',compact('allpeoples'));
    }
    // allPeopleEdit Mmethod============
    public function allPeopleEdit($allpeopleId){
      $editPeople = Addpeople::findOrFail($allpeopleId);
     return view('people/peopleedit',compact('editPeople'));
    }
// allPeopleUpdate Mmethod============
    public function allPeopleUpdate(Request $request,$peopleId){
      Addpeople::find($peopleId)->update([
       'name' => $request->name,
       'phone' => $request->phone,
       'email' => $request->email,
       'designation' => $request->designation,
     ]);
     return back()->with('update_people',"Your Update Successfull");
    }
// allPeopleDelete Mmethod============
    public function allPeopleDelete($allpeopleId){
      Addpeople::find($allpeopleId)->delete();
      return back()->with('delete_people',"Your Delete Successfull");
    }
}
