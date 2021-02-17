<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();  // Pobieranie danych z bazy.
        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        // dd($request); podglad tego co przychodzi z zadaniem
        $invoice = new Invoice();

        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;

        $invoice->save();

        // Parametr ->with() - dodaje zmienna sesyjna message o podanej dalej tresci.
        return redirect()->route('invoices.index')->with('message', 'Faktura dodana poprawnie');
    }
}
