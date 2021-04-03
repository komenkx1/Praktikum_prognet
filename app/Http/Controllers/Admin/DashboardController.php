<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/dashboard');
    }

    public function userProfile()
    {
        $adminUser = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view('admin/admin_profile/index',compact('adminUser'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $admins = $request->all();
        if ($request->input('password')) {
            if (Hash::check($request->password, Auth::guard('admin')->user()->password)) {
                $admins['password'] = bcrypt($request->new_password);
        }else{
            return redirect()->back()->with('error','Password Lama Salah');
        }
    }
        if ($request->file('profile_image')) {
            Storage::delete($admin->profile_image);
            $gambar = $request->file('profile_image');
            $nama_image = md5(now() . "_") . $request->file('profile_image')->getClientOriginalName();
            $urlgambar = $gambar->storeAs("img/profile_image", $nama_image);
            $admins['profile_image'] = $urlgambar;
        }
        $result = array_filter($admins);
        // dd($result);
        $admin->update($result);
        return redirect()->back()->with('info','Profile Berhasil Di Update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
