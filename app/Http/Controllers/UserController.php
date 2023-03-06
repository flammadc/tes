<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $printers = Printer::all();
        return view('User.index', compact('printers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $printer = Printer::find($id);
        return view('User.edit', compact('printer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $printer = Printer::find($id);
        if ($printer->qty < $request->qty) {
            return back()->with('error', 'error bang');
        }
        if (0 > $request->qty) {
            return back()->with('min', 'error bang');
        }
        $checkout = $printer->qty - $request['qty'];
        $printer->qty = $checkout;
        if ($printer->qty == 0) {
            $printer->delete();
        }
        $printer->update();
        if ($printer) {
            return redirect()
                ->route('user.index')
                ->with([
                    'updated' => 'Success'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
