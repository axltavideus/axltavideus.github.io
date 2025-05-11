@extends('layouts.user')

@section('title', 'Contact Us')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 fw-bold">Contact Us</h1>
    
    <div class="row justify-content-center g-4">
        @foreach($contactUsCards as $card)
        <div class="col-12 col-md-6">
            <a href="{{ $card->link ?? '#' }}" target="_blank" class="card contact-card h-100 text-decoration-none text-dark shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    @if($card->image_path)
                    <img src="{{ asset('storage/' . $card->image_path) }}" alt="{{ $card->title }}" style="width: 70px; height: 40px;">
                    @else
                    <i class="fas fa-info-circle fa-2x text-primary"></i>
                    @endif
                    <div>
                        <h5 class="card-title mb-1">{{ $card->title }}</h5>
                        <p class="card-text text-muted">{{ $card->description }}</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <h2 class="text-center mt-5 mb-4 fw-bold">Grup Jual Beli</h2>
    <div class="row justify-content-center g-4">
        @foreach($grupJualBeliCards as $card)
        <div class="col-12 col-md-12">
            <a href="{{ $card->link ?? '#' }}" target="_blank" class="card contact-card h-100 text-decoration-none text-dark shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    @if($card->image_path)
                    <img src="{{ asset('storage/' . $card->image_path) }}" alt="{{ $card->title }}" style="width: 70px; height: 40px;">
                    @endif
                    <div>
                        <h5 class="card-title mb-1">{{ $card->title }}</h5>
                        <p class="card-text text-muted">{{ $card->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>





@endsection
<style>
    .container {
        margin-top: 100px;
    }

    .contact-card {
        transition: 0.3s ease;
    }

    .contact-card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        transform: translateY(-4px);
    }

    h1 {
        color: #F4B446 !important;
    }
</style>
