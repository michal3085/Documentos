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
}