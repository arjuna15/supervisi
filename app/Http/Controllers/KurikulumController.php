<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = User::where('name', '!=', 'kurikulum')->get(); 
        return view('kurikulum.home', compact('data'));
    }

    public function add()
    {
        $data = User::All();
        return view('kurikulum.add', compact('data'));
    }
    public function view()
    {
        $data = User::All();
        return view('kurikulum.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::All();
        return view('kurikulum.add', compact('data'));
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
        
        User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
            'supervisor' => $request->supervisor
        ]);

        
        return redirect()->route('kurikulum.home');
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
        DB::table('supervisi')->where('data',$id)->delete();
        return redirect()->route('kurikulum.home');
        //
    }
}
