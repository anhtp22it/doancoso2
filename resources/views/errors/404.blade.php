@extends('layouts.app')

@section('content')
    <!-- content -->
    <section class="middle">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
                    <!-- Icon -->
                    <div class="p-4 d-inline-flex align-items-center justify-content-center rounded-circle text-danger mx-auto mb-4"
                        style="background-color: #ffeced">
                        <i class="ti-face-smile fs-4"></i>
                    </div>
                    <!-- Heading -->
                    <h2 class="mb-2 fw-bold text-black">404. Page not found.</h2>
                    <!-- Text -->
                    <p class="ft-regular fs-6 mb-5">
                        Sorry, we couldn't find the page you where looking for. We
                        suggest that you return to home page.
                    </p>
                    <!-- Button -->
                    <a class="btn btn-dark rounded-0 py-3 px-4" href="{{ route('home') }}">
                        Go To Home Page
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- content -->
@endsection
