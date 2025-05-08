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
                <div class="step-card" style="background-image: url({{ asset('images/bg-rp-cr1.jpg') }})">
                    <h1 class="heading-card">Cek ID </h1>
                    <p class="info-card">Klik cek id di navigation bar dan cek id mu</p>
                </div>
                <div class="step-card" style="background-image: url({{ asset('images/bg-rp-cr2.jpg') }})">
                    <h1 class="heading-card">Klik Lapor</h1>
                    <p class="info-card">Apabila tidak ada, klik lapor di navigation bar</p>
                </div>
                <div class="step-card" style="background-image: url({{ asset('images/bg-rp-cr3.jpg') }})">
                    <h1 class="heading-card">Isi Form</h1>
                    <p class="info-card">Isi form yang disediakan</p>
                </div>
                <div class="step-card" style="background-image: url({{ asset('images/bg-rp-cr4.jpg') }})">
                    <h1 class="heading-card">Submit</h1>
                    <p class="info-card">dan klik kirim laporan, dan laporanmu terkirim</p>
                </div>
            </div>
        </div>

        <div class="container-carousel">
            <h2 class="carousel-h2">KASUS TERBARU</h2>
            <div class="slider-wrapper-custom">
                <div class="card-list-custom">
                @foreach($kasus as $item)
                <div class="card-item">
                    <img src="{{ $item->header_picture_path ? asset($item->header_picture_path) : asset('images/temp_img.png') }}" alt="logo" class="logo-image">
                    <div class="card-content">
                        <h2 class="id-kasus">{{ $item->id }}</h2>
                        <p class="tanggal-kasus">{{ $item->created_at->format('d M Y') }}</p>
                        <button class="btn-hero">Lihat Kasus</button>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>

    </section>

    <section class="search-section">
        <div class="content">
            <h1>Cari Akun yang Aman!<br><span>Cek keamanan akun yang ingin kamu beli!</span></h1>
            <p>Masukkan ID akun di bawah ini untuk memulai pencarian.</p>
            <div class="search-input">
                <form method="POST" action="{{ route('search.ml_id') }}">
                    @csrf
                    <input type="text" name="ml_id" placeholder="Masukkan ID Akun" required />
                    <button type="submit" class="btn-hero"><span><i class="fas fa-search"></i></span> Cari</button>
                </form>
            </div>
        </div>
        <div class="search-image">
            <img src="{{ asset('images/bg-sr2.png') }}" alt="Search Side Image">
        </div>
    </section>


    <style>
        .hero-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding: 120px 12% 60px;
            background-image: url("{{ asset('images/bg-home5.png') }}");
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
            padding: 180px 12%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }


        .report-steps h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 40px;
            font-family: 'Poppins', sans-serif;
            color: #F4B446;
            font-weight: 700;
        }

        .step-card {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            height: 270px;
            width: 150px;
            margin: 0 15px;
            text-align: center;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 5px -137px 60px -47px rgba(0, 0, 0, 0.75) inset, 2px 15px 20px -9px rgba(0, 0, 0, 0.75);
            transition: all 300ms ease;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .step-card:hover {
            width: 250px;
            box-shadow: 0 4px 20px rgba(255, 215, 0, 0.8);
        }

        .step-cards {
            display: flex;
            /* height: 100vh; */
            align-items: center;
            justify-content: center;
        }

        .step-card h1.heading-card {
            margin-top: auto;
            margin-bottom: 5px;
        }

        .step-card p.info-card {
            margin-bottom: auto;
            font-size: 0.9rem;
            padding: 0 10px;
            color: white;
            text-shadow: 1px 1px 2px black;
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

        .container-carousel {
            margin: 0;
            box-sizing: border-box;
            overflow: hidden;
            padding: 0;
        }

        .slider-wrapper-custom {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 40px 0;
        }

        .card-list-custom {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: max-content;
        }

.card-list-custom .card-item {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    padding: 20px;
    gap: 20px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    border: 2px solid rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(30px);
    min-width: 320px;
    box-sizing: border-box;
    margin-right: 20px;
}

        .card-item .logo-image {
            width: 90px;
            height: 90px;
            border-radius: 10%;
            margin-right: 30px;
            flex-shrink: 0;
        }

        .card-item .card-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .card-item .tanggal-kasus {
            font-size: 1.15rem;
            color: #ffffff;
        }

        .card-item .id-kasus {
            font-size: 1.1rem;
            margin: 0;
        }

        .card-item .tanggal-kasus {
            font-size: 0.9rem;
            margin: 4px 0 10px;
        }

        .card-item .btn-hero {
            padding: 6px 14px;
            font-size: 0.85rem;
            cursor: pointer;
            border-radius: 10%;
            transition: 0.2s ease;
            background-color: var(--text-color);
            color: white;
            border: none;
        }

        .card-item .btn-hero:hover {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid #ffffff;
        }

        .carousel-h2 {
            margin-top: 10%;
            color: #ffffff;
            /* Warna teks putih */
            text-shadow:
                2px 2px 4px rgba(255, 255, 255, 0.5);
            /* bayangan hitam samar */

        }

        .search-section {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 120px 12%;
            background: linear-gradient(to top, rgba(255, 255, 255, 0.8), rgba(244, 180, 70, 0.9));
            text-align: left;
            gap: 4rem;
        }

        .search-section .content {
            max-width: 600px;
            text-align: left;
        }

        .search-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-image img {
            max-width: 100%;
            height: auto;
            border-radius: 16px;

            object-fit: contain;
        }

        .search-input {
            margin-top: 1.5rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .search-input input:hover {
            box-shadow: 0 4px 20px rgba(255, 215, 0, 0.8);
        }

        .search-input input {
            padding: 12px;
            font-size: 1rem;
            border: 1px solid #F4B446;
            border-radius: 8px;
            flex: 1;
        }

        .search-input .btn-hero {
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

        .search-input .btn-hero:hover {
            background-color: #d9992b;
        }
    </style>

<script>
    const cardList = document.querySelector('.card-list-custom');
    const cards = cardList.children;
    const itemWidth = 320;
    const visibleCount = 3;
    let currentIndex = 0;

    // Clone first visibleCount cards and append to the end for smooth looping
    for (let i = 0; i < visibleCount; i++) {
        const clone = cards[i].cloneNode(true);
        cardList.appendChild(clone);
    }

    function slideNext() {
        currentIndex++;
        cardList.style.transition = 'transform 0.5s ease-in-out';
        cardList.style.transform = `translateX(-${currentIndex * itemWidth}px)`;

        if (currentIndex === cards.length - visibleCount) {
            setTimeout(() => {
                cardList.style.transition = 'none';
                currentIndex = 0;
                cardList.style.transform = `translateX(0px)`;
            }, 500); // match transition duration
        }
    }

    let autoSlide = setInterval(slideNext, 3000);

    const carouselContainer = document.querySelector('.slider-wrapper-custom');
    carouselContainer.addEventListener('mouseover', () => {
        if (autoSlide) {
            clearInterval(autoSlide);
            autoSlide = null;
        }
    });

    carouselContainer.addEventListener('mouseout', () => {
        if (!autoSlide) {
            autoSlide = setInterval(slideNext, 3000);
        }
    });
</script>

@endsection
<!-- </content>
</create_file>

<attempt_completion>
    Perbaikan sudah saya lakukan pada kode JavaScript bagian pause/resume interval carousel:

    - Saat hover, interval slider dihentikan dengan memeriksa apakah interval aktif, baru clearInterval dijalankan dan
    variabel interval diset null.
    - Saat mouse keluar, interval hanya dibuat kembali jika tidak ada interval aktif (autoSlide null).
    - Ini menghindari pembuatan interval ganda sehingga carousel tidak menjadi rusak saat hover.

    Silakan coba kode ini, carousel sekarang harus berjalan otomatis dengan stabil dan pause saat hover tanpa
    menyebabkan masalah bergeser berantakan.

    Beritahu saya jika butuh bantu lanjut!
</attempt_completion> -->