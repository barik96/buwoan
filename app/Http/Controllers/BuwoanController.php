<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buwoan;

class BuwoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buwoans = Buwoan::where('user_id', auth()->user()->id)->get();

        return view('buwoans.index', compact('buwoans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buwoans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tamu' => 'required|min:3|alpha',
            'alamat_tamu' => 'required',
            'isi_buwoan' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Buwoan::create($validatedData);
        return redirect()->route('buwoans.index')
                        ->with('success','Buwoan created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buwoan = Buwoan::findOrFail($id);

        return view('buwoans.show', compact('buwoan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buwoan = Buwoan::findOrFail($id);

        return view('buwoans.edit', compact('buwoan'));
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
        $validatedData = $request->validate([
            'nama_tamu' => 'required|min:3|alpha',
            'alamat_tamu' => 'required',
            'isi_buwoan' => 'required',
        ]);

        $buwoan = Buwoan::findOrFail($id);

        $buwoan->update($validatedData);

        return redirect()->route('buwoans.index')
                        ->with('success','Buwoan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $buwoan = Buwoan::findOrFail($id);

        $buwoan->delete();
    }
}
