@extends('layouts.app')

    @section('content')
    <!-- Portfolio Section-->
    <section class="masthead page-section portfolio" id="portfolio">
        <div class="container">

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                </div>
            @endif

            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Lista faktur</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Table-->
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numer Faktury</th>
                    <th scope="col">Data wystawienia</th>
                    <th scope="col">Kwota</th>
                    <th scope="col">Edycja</th>
                    <th scope="col">Usuń</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                    <tr>
                        <th scope="row">{{ $invoice->id }}</th>
                        <td>{{ $invoice->number }}</td>
                        <td>{{ $invoice->date }}</td>
                        <td>{{ $invoice->total }}</td>
                        <td><a href="{{ route('invoices.edit', ['id' => $invoice->id]) }}" class="btn btn-outline-primary">Edytuj</a></td>
                        <form method="POST" action="{{ route('invoices.delete', ['id' => $invoice->id]) }}">
                            @csrf
                            @method('delete')
                            <td><button type="submit" class="btn btn-danger">Usuń</button></td>
                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End of the table -->
           <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-lg btn-block">Dodaj nową fakturę</a>
        </div>
    </section>
    @endsection
