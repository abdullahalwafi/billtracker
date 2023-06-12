<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Clients::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode' => 'required|unique:clients|min:3|max:15',
            'nama' => 'required|max:45',
            'phone' => 'required|max:45',
            'email' => 'required|email|unique:clients|max:45',
            'alamat' => 'required|max:45',
        ]);

        Clients::create($validate);
        session()->flash('success', 'Data added successfully!');
        return redirect('/admin/clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clients = Clients::where('id', $id)->first();
        return view('admin.clients.form', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'kode' => 'required|min:3|max:15|unique:clients,kode,' . $id,
            'nama' => 'required|max:45',
            'phone' => 'required|max:45',
            'email' => 'required|email|max:45|unique:clients,email,' . $id,
            'alamat' => 'required|max:45',
        ]);

        $clients = Clients::findOrFail($id);
        $clients->update($validate);

        session()->flash('success', 'Data updated successfully!');
        return redirect('/admin/clients');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Clients::destroy($id);
        session()->flash('success', 'Data deleted successfully!');
        return redirect('/admin/clients');
    }
}
