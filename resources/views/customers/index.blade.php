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
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Lista klientow</h2>
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
                    <th scope="col">Nazwa klienta</th>
                    <th scope="col">Adres</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Edycja</th>
                    <th scope="col">Usuń</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->nip }}</td>
                        <td><a href="{{ route('customers.edit', ['customer' => $customer->id]) }}" class="btn btn-outline-primary">Edytuj</a></td>
                        <form method="POST" action="{{ route('customers.destroy', ['customer' => $customer->id]) }}">
                            @csrf
                            @method('delete')
                            <td><button type="submit" class="btn btn-danger">Usuń</button></td>
                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End of the table -->
           <a href="{{ route('customers.create') }}" class="btn btn-primary btn-lg btn-block">Dodaj nowego klienta</a>
        </div>
    </section>
    @endsection
