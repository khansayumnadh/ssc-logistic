<?php

namespace App\Http\Controllers\Admin;

use App\Models\AuthenticateLog;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Count Data
        $total_users = count(User::all());
        $total_adminssc = count(User::where('role_id', 1)->get());
        $total_adminlog = count(User::where('role_id', 2)->get());
        $total_members = count(User::where('role_id', 3)->get());

        // Authenticate User Log
        $authenticate_logs = AuthenticateLog::latest()->take(5)->get();
        $login_logs = AuthenticateLog::latest()->get();

        return view('admin.dashboard.index', compact('total_users', 'total_adminssc', 'total_adminlog', 'total_members', 'authenticate_logs', 'login_logs'));
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
    public function update(Request $request, $id)
    {
        //
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
