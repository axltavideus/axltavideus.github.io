@extends('layouts.user')

@section('title', 'Wenstein Store')

@section('content')
    <section class="hero-section">
        <div class="content">
            <h1>Explore <br><span>Cek Keamanan akun kamu secara gratis</span></h1>
            <p>Explore the secrets of space. Wenstein helps you to check<br> digital galaxies of top-up and deals.</p>
            <div class="center-btn">
                <button class="btn-hero"><span>&gt;</span> Cek ID Akun</button>
                <button class="btn-secondary">Lapor</button>
            </div>
        </div>
    </section>

    <style>
        .hero-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* ubah ke kiri */
            justify-content: center;
            padding: 120px 12% 60px;
            background-image: url('{{ asset('images/bg-home2.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            text-align: left;
            position: relative;
            min-height: 100vh;
            padding-top: 100px;
        }

        .hero-section .content {
            max-width: 600px;
            text-align: left;
        }

        .hero-section .content h1 {
            font-size: 3rem;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            line-height: 1.2;
        }

        .hero-section .content h1 span {
            color: var(--text-color);
            font-family: 'Erica One', cursive;
        }

        .hero-section .content p {
            font-size: 1rem;
            color: #ffffff;
            margin-top: 1rem;
            font-family: 'Inter', sans-serif;
        }

        .center-btn {
            margin-top: 1.5rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-hero,
        .btn-secondary {
            background-color: var(--text-color);
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-hero span {
            margin-right: 8px;
            font-weight: bold;
        }

        .btn-hero:hover,
        .btn-secondary:hover {
            background-color: #d9992b;
        }
    </style>

@endsection