<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
<header>
    <a href="#" class="logo">
            <div class="logo-pill">
                <img src="{{ asset('images/logo-penipu.png') }}" alt="Logo" class="logo-img">
            </div>
    </a>
    <ul class="navbar">
        <li><a href="#" class="active">Home</a></li>
        <li><a href="{{ url('/topup') }}">Cek ID</a></li>
        <li><a href="#">Kasus</a></li>
        <li><a href="{{ url('/report') }}">Lapor</a></li>
        <li><a href="#">Contacts</a></li>
    </ul>
    <div class="main">
        <a href="#" class="user"><i class="ri-user-fill"></i>Sign In</a>
        <a href="#">Register</a>
        <div class="bx bx-menu" id="menu-icon"></div>

    </div>
</header>

<body>
    <main>
        @yield('content')
    </main>
</body>

    <!-- <footer>
    <div class="footer-content">
        <div class="footer-section">
            <h3>About Us</h3>
            <p>Wenstein store adalah tempat top up games yang aman, murah dan terpercaya. Proses cepat 1-3 Detik. Open 24 jam. Payment terlengkap. Jika ada kendala silahkan klik logo CS di bagian kanan bawah di website ini.</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Contact Us</h3>
            <p>Email: info@example.com</p>
            <p>Phone: +123 456 7890</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2023 Company. All rights reserved.</p>
    </div>
</footer> -->
<style>

/* Navbar Styles */
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    text-decoration: none;
    list-style: none;
}
:root{
    --bg-color:rgb(255, 255, 255);
    --text-color: #F4B446;
    --main-color:#4E4E50
}
body{
    min-height: 100vh;
    background: var(--bg-color);
    color: var(--text-color);
}
header{
    /* position: fixed; */
    width: 100%;
    top: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: transparent;
    padding: 28px 12%;
    transition: all .50s ease;
}
.logo{
    display: flex;
    align-items: center;
}
.logo i{
    color: var(--main-color);
    font-size: 28px;
    margin-right: 3px;
}
.logo-pill {
    background: linear-gradient(135deg, #ffffff, #F4B446);
    padding: 8px;
    border-radius: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
    width: 100px;
    height: 80px;
}
.logo-img {
    width: 50px;
    height: 80px;
    object-fit: contain;
}

.logo span{
    color: var(--text-color);
    font-size: 1.7rem;
    font-weight: 600;

}
.navbar{
    display:flex;
}
.navbar a{
    color: var(--text-color);
    font-size: 1.1rem;
    font-weight: 500;
    padding: 5px 0;
    margin: 0px 30px;
    transition: all .50s ease;
}
.navbar a:hover{
    color:rgb(218, 157, 28);
    font-size: 1.5rem; 
}
.navbar a.active{
    color: #F4B446;   
    font-weight: 800;
}
.main{
    display: flex;
    align-items: center;
}
.main a{
    margin-right: 25px;
    margin-left: 10px;
    color: var(--text-color);
    font-size: 1.1rem;
    font-weight: 500;
    transition: all .50s ease;
}
.user{
    display: flex;
    align-items: center;
}
.user i{
    color: var(--main-color);
    font-size: 28px;
    margin-right: 7px;
}
.main a:hover{
    color: var(--main-color);
}
#menu-icon{
    font-size: 35px;
    color: var(--text-color);
    cursor: pointer;
    z-index: 10001;
    display: none;
}
@media (max-width: 1280px){
    header{
        padding: 14px 2%;
        transition: .2s;
    }
    .navbar a{
        padding: 5px 0px;
        margin: 0px 20px;
    }
}
@media (max-width: 1090px) {
    #menu-icon{
        display: block;
    }
    .navbar{
        position: absolute;
        top: 100%;
        right: -100%;
        width: 270px;
        height: 32vh;
        background: var(--main-color);
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        border-radius: 10px;
        transition: all .50s ease;
    }
    .navbar a{
        display: block;
        margin: 5px 0px;
        padding: 0px 25px;
        transition: all .50 ease;
    }
    .navbar a:hover{
        color: var(--text-color);
        transform: translateY(10px);
    }
    .navbar a.active{
        color: var(--text-color);
    }
    .navbar.open{
        right: 2%;
    }
}

/* Footer Styles
footer {
    background-color: #333;
    color: white;
    padding: 2rem 0;
    text-align: center;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    margin-bottom: 1rem;
}

.footer-section {
    max-width: 300px;
}

.footer-section h3 {
    margin-bottom: 1rem;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 0.5rem;
}

.footer-section ul li a {
    color: white;
    text-decoration: none;
}

.footer-bottom {
    border-top: 1px solid #444;
    padding-top: 1rem;
} */
</style>
    <script>
    let menu= document.querySelector('#menu-icon');
    let navbar= document.querySelector('.navbar');

    menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-QF0s0X0x3pbbR6Zb6+6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b" crossorigin="anonymous"></script>
</body>
</html>
