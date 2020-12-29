<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\redirect;
use App\Tender;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminlogin()
    {
        return view('backend.admin.adminlogin');
    }
    public function userlogin()
    {
        return view('frontend.login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminregister()
    {
        return view('backend.admin.admin-sign-up');
    }
    public function usertegister()
    {
        return view('frontend.sign-up');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgotpassword()
    {
        return view('backend.admin.forgot-password');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admindashboard(Request $request)
    {
        // return view('admin.admin-dashboard');
        $email= $request->email;
        $password = $request->password;
        $result = DB::table('admins')
        ->where('email',$email)
        ->where('password',$password)
        ->first();
        if ($result) {
            return redirect::to('/admin_dashboard');

        } else {
           return redirect::to('/adminlogin');
        }

    }

    public function admin_dashboard()
    {
        $tenders = Tender::with('district','method')->orderBy('date', 'desc')->get();
        return view('backend.index', compact('tenders'));
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


      $request->validate( [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
          'password' => ['required', 'string', 'min:6'],
      ]);

        $admindata = new Admin();
        $admindata -> name   =   $request->  name;
        $admindata -> email  =   $request->  email;
        $admindata -> password=  $request->  password;
        // $admindata -> role   =   $request->  role;
        $admindata -> save();
        return redirect('/adminregister')->with('status', 'Registered Your Account! And Login Here');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
