<?php

namespace App\Http\Controllers;

use App\Repair;
use App\RepairImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repair = Repair::all();
        return view('admin.repair', compact('repair'));
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
        // dd($request);
        $request->validate([
            'equipment_id' => 'required',
            'repair_detail' => 'required',
            'repair_etc	' => '',
            'filenames' => '',
            'filenames.*' => 'mimes:png,jpeg'
        ]);


        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $imageName = time() . '.' . $file->extension();
                $file->move(public_path() . '/images/repair/', $imageName);
                $data[] = $imageName;
            }
        }

        $repair = new Repair([
            'equipment_id' => $request->equipment_id,
            'repair_detail' => $request->repair_detail,
            'repair_etc' => $request->repair_etc,
            'user_id' => Auth::user()->id,
            'filenames' => json_encode($data)
        ]);
        // dd($repair);
        $repair->save();

        return redirect('/repair')->with('success', 'ทำการแจ้งซ่อมครุภัณฑ์ สำเร็จ!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function show(Repair $repair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function edit(Repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repair $repair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        //
    }
}
