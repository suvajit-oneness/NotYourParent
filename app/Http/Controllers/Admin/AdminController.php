<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request,DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function contactUs()
    {
        $contactUs = ContactUs::where('type',1)->first();
        return view('admin.contact.index',compact('contactUs'));
    }

    public function editContactUs($id)
    {
        $contactUs = ContactUs::find($id);
        return view('admin.contact.edit', compact('contactUs'));
    }
    public function updateContactUs(Request $request,$id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_number' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        if($request->hasFile('image')) {
            $oldImage = public_path(contactUs::find($id)->image);
            File::delete($oldImage);
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/'), $fileName);
            $image ='uploads/'.$fileName;
            ContactUs::where('id', $id)->update([
                'image' => $image,
            ]);
        }
        ContactUs::where('id', $id)->update([
            'type' => 1,
            'subject'=>'',
            'contactedBy'=>'',
            'remarks'=>'',
            'description'=>'',
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone_number,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube
        ]);
        return redirect()->route('admin.contactUs.index');
    }

    public function getCommission()
    {
        $commissions = DB::table('masters')->get();
        return view('admin.commission.index', compact('commissions'));
    }
    public function editCommission($id)
    {
        $commission = DB::table('masters')->where('id', $id)->first();
        // dd($commission);
        return view('admin.commission.edit', compact('commission'));
    }
    public function updateCommission(Request $request, $id)
    {
        $request->validate([
            'commission' => 'required | numeric',
        ]);
        DB::table('masters')->where('id', $id)->update([
            'commission' => $request->commission,
            ]);
        return redirect()->route('admin.commission.index');
    }
}
