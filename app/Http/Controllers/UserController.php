<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting-user');
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
        $user = User::find($id);
        return view('admin.setting-user', compact('user'));
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
        $request->validate([
            'form' => 'required'
        ]);

        if ($request->form == 'username') {
            $request->validate([
                'user_id' => 'required'
            ]);

            $user = User::find($id);
            $user->user_id = $request->user_id;

            $user->save();

            return redirect()->back()->with('success', 'แก้ไข Username สำเร็จ');
        } elseif ($request->form == 'password') {
            $request->validate([
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'passwordconfirm' => 'required',
            ]);
            // dd($request);
            if ($request->newpassword == $request->passwordconfirm) {
                $user = User::find($id);
                if (Hash::check($request->oldpassword, auth()->user()->password)) {
                    $user->password = Hash::make($request->newpassword);
                    $user->save();

                    return redirect()->back()->with('success', 'แก้ไข Password สำเร็จ');
                }
            } else {
                return redirect()->back()->withErrors('กรุณากรอกรหัสผ่านให้ถูกต้อง');
            }
        }
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
