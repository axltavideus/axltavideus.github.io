@extends('layouts.user')

@section('title', 'Wenstein Store')

@section('content') <section class="hero-section">
        <div class="content">
            <h1>Cek dan Lapor!<br><span>Cek Keamanan akun kamu secara gratis!</span></h1>
            <p>Web wenstein store tempat kamu cek keamanan akun mu,<br> dan cek keamanan akun yang mau kamu beli </p>
            <div class="center-btn"> <button class="btn-hero"><span><i class="fas fa-search"></i></span> Cek ID
                    Akun</button> <button class="btn-secondary">Lapor</button> </div>
        </div>
    </section>

    <section class="report-steps">
        <div class="container-steps">
            <h2>Langkah-Langkah Melaporkan Akun Penipuan</h2>
            <div class="card" style="background-image: url({{ asset('images/Logo.png') }})">
                <h1 class="heading-card">Anne</h1>
                <p class="info">Perfect cinematic click posted by Anne on pintrest</p>
            </div>
            <div class="card" style="background-image: url({{ asset('images/Logo.png') }})">
                <h1 class="heading-card">Hebe</h1>
                <p class="info">Asthatic click posted by Hebe on pintrest</p>
            </div>
            <div class="card" style="background-image: url({{ asset('images/Logo.png') }})">
                <h1 class="heading-card">Dream</h1>
                <p class="info">Dreams concept click posted by Ana on pintrest</p>
            </div>
            <div class="card" style="background-image: url({{ asset('images/Logo.png') }})">
                <h1 class="heading-card">Dewi</h1>
                <p class="info">Portrait click posted by Dewi on pintrest .</p>
            </div>
        </div>
    </section>


    <style>
        .hero-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding: 120px 12% 60px;
            background-image: url('{{ asset('images/bg-home4.png') }}');
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

        .report-steps {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(244, 180, 70, 0.9));
            color: #333;
            padding: 80px 12%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .report-steps h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 40px;
            font-family: 'Poppins', sans-serif;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }

        .step-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 24px;
            transition: box-shadow 0.3s ease;
            font-family: 'Inter', sans-serif;
            text-align: center;
            /* center content */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .step-icon {
            font-size: 2rem;
            color: #F4B446;
            margin-bottom: 16px;
        }

        .step-card h3 {
            font-size: 1.25rem;
            margin-bottom: 12px;
        }

        .step-card p {
            font-size: 1rem;
            line-height: 1.5;
        }

        .step-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            /* gold shadow on hover */
        }
    </style>

@endsection