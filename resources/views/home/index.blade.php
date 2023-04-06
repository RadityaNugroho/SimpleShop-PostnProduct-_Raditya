@extends('layouts.app')

@section('title', 'Home Page | Shop Beta')

@section('content')

    <div class="container">
        @include('components.main_carousel')

        <div class="row">
            <!-- ini bawaan bs5 untuk mengatur tata letak -->
            @for ($loop = 1; $loop < 4; $loop++)
                <div class="col-md-4 col-12 mb-3">
                    <div class="card">
                        <div class="row g-0 align-items-center">
                            <div class="col-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title {{ $loop }}</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                        the card's content.</p>
                                </div>
                            </div>
                            <div class="col-4 text-center px-2">
                                <img src="https://via.placeholder.com/100x100.png/CB997E/333333?text={{ $loop }}" class="img-fluid rounded-circle" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        @include('components.category_carousel')

        @include('includes.footer')
    </div>

@endsection
