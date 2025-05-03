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
        <div class="container">
            <h2>Langkah-Langkah Melaporkan Akun Penipuan</h2>
            <div class="step-cards">
                <div class="step-card" style="background-image: url({{ asset('images/cardimg1.png') }})">
                    <h1 class="heading-card">Cek ID </h1>
                    <p class="info-card">Klik cek id di navigation bar dan cek id mu</p>
                </div>
                <div class="step-card" style="background-image: url({{ asset('images/Cardimg2.png') }})">
                    <h1 class="heading-card">Klik Lapor</h1>
                    <p class="info-card">Apabila tidak ada, klik lapor di navigation bar</p>
                </div>
                <div class="step-card" style="background-image: url({{ asset('images/Cardimg3.png') }})">
                    <h1 class="heading-card">Isi Form</h1>
                    <p class="info-card">Isi form yang disediakan</p>
                </div>
                <div class="step-card" style="background-image: url({{ asset('images/Cardimg4.png') }})">
                    <h1 class="heading-card">Submit</h1>
                    <p class="info-card">dan klik kirim laporan, dan laporanmu terkirim</p>
                </div>
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
            background-image: url("{{ asset('images/bg-home4.png') }}");
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
            color: #F4B446;
        }

        .step-card {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            height: 270px;
            width: 90px;
            margin: 0 15px;
            text-align: center;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 5px -137px 60px -47px rgba(0, 0, 0, 0.75) inset, 2px 15px 20px -9px rgba(0, 0, 0, 0.75);
            transition: all 300ms ease;
        }

        .step-card:hover {
            width: 190px;
        }

        .step-cards {
            display: flex;
            /* height: 100vh; */
            align-items: center;
            justify-content: center;
        }

        .heading-card {
            color: #ffffff;
            font-size: 22px;
            position: relative;
            top: 58%;
            transform: rotate(90deg);
            transition: all 300ms ease;
        }

        .step-card:hover .heading-card {
            transform: rotate(0deg);
        }

        .info-card {
            color: #ffffff;
            font-size: 10px;
            position: relative;
            top: 100%;
            transition: all 300ms ease;
            margin: 0 10px;
        }

        .step-card:hover .info-card {
            top: 60%;
        }
    </style>

@endsection