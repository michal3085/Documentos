<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer')->get();  // Pobieranie danych z bazy.
        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function edit($id)
    {
        $invoice = Invoice::find($id);

        return view('invoices.edit', ['invoice' => $invoice]);
    }

    public function store(Request $request)
    {
        // dd($request); podglad tego co przychodzi z zadaniem
        $invoice = new Invoice();

        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;
        $invoice->customer_id = $request->customer;

        $invoice->save();

        // Parametr ->with() - dodaje zmienna sesyjna message o podanej dalej tresci.
        return redirect()->route('invoices.index')->with('message', 'Faktura dodana poprawnie');
    }

    public function update($id, Request $request)
    {

        $invoice = Invoice::find($id);

        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;

        $invoice->save();

        return redirect()->route('invoices.index')->with('message', 'Faktura została poprawnie zmieniona');
    }

    public function delete($id)
    {
        $invoice = Invoice::destroy($id);

        return redirect()->route('invoices.index')->with('message', 'Faktura została usunieta');
    }
}
