@extends('layouts.app')

@section('content')

<!-- Contact Section-->
<section class="masthead page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Dodaj klienta</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                <form action="{{ route('customers.store') }}" method="POST" id="contactForm" name="sentMessage" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Nazwa klienta</label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="Nazwa" required="required" data-validation-required-message="Wpisz numer faktury" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Data wystawienia</label>
                            <input class="form-control" id="address" name="address" type="text" placeholder="Adres" required="required" data-validation-required-message="Proszę podać datę wystawienia faktury" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>kwota</label>
                            <input class="form-control" id="nip" name="nip" type="text" placeholder="Numer NIP" required="required" data-validation-required-message="Wprowadź kwotę faktury." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <br />
                    <div id="success"></div>
                    <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Dodaj Klienta</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection