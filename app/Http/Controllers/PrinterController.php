<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use App\Http\Requests\StorePrinterRequest;
use App\Http\Requests\UpdatePrinterRequest;
use Illuminate\Support\Facades\Validator;

class PrinterController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $printers = Printer::all();
        return view('dashboard', compact('printers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrinterRequest $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'desc' => 'required'
        ]);

        $printer = new Printer();
        $printer->name = $request['name'];
        $printer->qty = $request['qty'];
        $printer->price = $request['price'];
        $printer->desc = $request['desc'];
        // add other fields
        $printer->save();



        if ($printer) {
            return redirect()
                ->route('dashboard')
                ->with([
                    'success' => 'New item has been created successfully'
                ]);
        } else {
            return
                back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Printer $printer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $printer = Printer::find($id);
        return view('Admin.edit', compact('printer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrinterRequest $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'desc' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'gagal tolol');
        }

        $printer = Printer::find($id);
        $printer->name = $request['name'];
        $printer->qty = $request['qty'];
        $printer->price = $request['price'];
        $printer->desc = $request['desc'];
        // add other fields
        $printer->update();



        if ($printer) {
            return redirect()
                ->route('dashboard')
                ->with([
                    'updated' => 'New item has been updated successfully'
                ]);
        } else {
            return
                back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $printer = Printer::find($id);
        $printer->delete();

        if ($printer) {
            return redirect()
                ->route('dashboard')
                ->with([
                    'delete' => 'Item has been deleted successfully'
                ]);
        } else {
            return
                back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
}
