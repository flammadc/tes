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
            'desc' => 'required',
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Some problem occurred, please try again');
        }

        $printer = new Printer();
        $printer->name = $request['name'];
        $printer->qty = $request['qty'];
        $printer->price = $request['price'];
        $printer->desc = $request['desc'];
        $printer->img = $request['img'];
        if ($request->hasFile('img')) {
            $request->file('img')->move('img/', $request->file('img')->getClientOriginalName());
            $printer->img = $request->file('img')->getClientOriginalName();
        }
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
            'desc' => 'required',
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Some problem occurred, please try again');
        }

        $printer = Printer::find($id);
        $printer->name = $request['name'];
        $printer->qty = $request['qty'];
        $printer->price = $request['price'];
        $printer->desc = $request['desc'];
        $printer->img = $request['img'];
        if ($request->hasFile('img')) {
            $request->file('img')->move('img/', $request->file('img')->getClientOriginalName());
            $printer->img = $request->file('img')->getClientOriginalName();
        }
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
