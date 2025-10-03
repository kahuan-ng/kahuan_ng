<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hypermobility Syndromes Association</title>
    
    <!-- Font Awesome voor iconen (zoek & winkelwagen) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- ===== INTERNE CSS STYLESHEET ===== -->
    <style>
        /* ===== ALGEMENE STIJLEN & W3SCHOOLS CONCEPTEN ===== */
        /* CSS Variabelen: makkelijk om kleuren centraal te beheren */
        :root {
            --main-purple: #6a2c91;
            --light-purple-bg: #f2eef6;
            --donate-blue: #00bfff;
            --text-color: #333;
        }

        /* Basisinstellingen voor de pagina */
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text-color);
            background-color: #fff;
        }

        /* Container om de inhoud te centreren */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== HEADER ===== */
        /* Flexbox: voor het uitlijnen van de header-items */
        .header-top {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 10px 0;
            font-size: 14px;
        }

        .header-top a {
            margin-left: 20px;
            text-decoration: none;
            color: var(--text-color);
        }

        .btn-donate {
            background-color: var(--donate-blue);
            color: white !important;
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .header-main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo h1 {
            margin: 0;
            font-size: 28px;
            color: var(--main-purple);
            letter-spacing: 1px;
        }

        .logo span {
            font-size: 12px;
            color: var(--text-color);
        }

        .search-bar {
            display: flex;
            border: 1px solid #ccc;
        }

        .search-bar input {
            border: none;
            padding: 10px;
            font-size: 16px;
            width: 300px;
        }

        .search-bar button {
            border: none;
            background-color: var(--main-purple);
            color: white;
            padding: 0 15px;
            cursor: pointer;
        }

        .cart {
            font-size: 24px;
            color: var(--main-purple);
            position: relative; /* Nodig voor de positionering van de badge */
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: var(--main-purple);
            color: white;
            border-radius: 50%;
            font-size: 12px;
            width: 18px;
            height: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* ===== NAVIGATIEBALK ===== */
        .main-nav {
            background-color: var(--main-purple);
        }

        .main-nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
        }

        .main-nav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 18px 16px;
            text-decoration: none;
            font-weight: bold;
        }

        .main-nav li a:hover {
            background-color: #58217a; /* Iets donkerder paars voor hover-effect */
        }

        /* ===== HOOFDINHOUD ===== */
        .hero {
            position: relative;
            text-align: center;
            color: white;
        }

        .member-cta {
            position: absolute;
            top: 20px;
            right: 5%;
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            line-height: 1.2;
            /* Deze 'clip-path' creëert de speciale puntige vorm aan de onderkant */
            clip-path: polygon(0 0, 100% 0, 100% 85%, 50% 100%, 0 85%);
        }

        /* Info Blokken met CSS Grid voor layout */
        .info-block-light {
            background-color: var(--light-purple-bg);
            padding: 60px 0;
        }

        .info-block-white {
            background-color: #fff;
            padding: 60px 0;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 2fr; /* 1 deel voor de afbeelding, 2 delen voor de tekst */
            gap: 40px;
            align-items: center;
        }

        /* De 'reverse-grid' klasse wisselt de volgorde om */
        .reverse-grid {
            grid-template-columns: 2fr 1fr;
        }

        .content-grid img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .text-container h2 {
            color: var(--main-purple);
            font-size: 28px;
            margin-top: 0;
        }

        .text-container p {
            line-height: 1.6;
            font-size: 16px;
        }

        .text-container a {
            color: var(--main-purple);
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- ===== HEADER SECTIE ===== -->
    <header class="site-header">
        <div class="container">
            <div class="header-top">
                <a href="#">Log In</a>
                <a href="#" class="btn-donate">Donate</a>
            </div>
            <div class="header-main">
                <div class="logo">
                    <h1>HYPERMOBILITY</h1>
                    <span>SYNDROMES ASSOCIATION</span>
                </div>
                <div class="search-bar">
                    <input type="search" placeholder="Search...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
                <div class="cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </div>
            </div>
        </div>
    </header>

    <!-- ===== NAVIGATIEBALK ===== -->
    <nav class="main-nav">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">What is Hypermobility</a></li>
                <li><a href="#">For Professionals</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Latest</a></li>
                <li><a href="#">Get involved</a></li>
            </ul>
        </div>
    </nav>

    <!-- ===== HOOFDINHOUD ===== -->
    <main>
        <!-- Hero Sectie met grote afbeelding -->
        <section class="hero">
            <img src="hypermobiel_duim.png" alt="Een lachende familie" class="hero-image">
            <div class="member-cta">
                Become<br>a Member<br>Today
            </div>
        </section>

        <!-- Introductieblok (lichtpaars) -->
        <section class="info-block-light">
            <div class="container content-grid">
                <div class="image-container">
                    <img src="hypermobiel_duim.png" alt="Twee handen met vrolijk beschilderde vingers die een hart vormen.">
                </div>
                <div class="text-container">
                    <p>The Hypermobility Syndromes Association is here to support everyone with symptomatic hypermobility – whatever the cause, however mildly or severely they may be affected, and whether or not they are diagnosed.</p>
                    <p>With a holistic, solution-focused approach to living well with a hypermobility syndrome, our expert patients, volunteers, and medical advisory board provide management-focused patient support groups, and educational programs, information, and advice to hypermobile people and their wider support network, including health and social care professionals.</p>
                </div>
            </div>
        </section>

        <!-- "Wat is hypermobiliteit?" blok -->
        <section class="info-block-white">
            <div class="container content-grid reverse-grid">
                <div class="text-container">
                    <h2>What is hypermobility?</h2>
                    <p>Hypermobility is where joints bend further than average, and affects around 30% of the population. Around 10% of these people live with symptoms which can range from mild to disabling, can affect many of the body’s systems (not just the joints), and vary over time. Find out more about <a href="#">hypermobility</a>.</p>
                </div>
                <div class="image-container">
                    <img src="hypermobiel_duim.png" alt="Een lachende vrouw met zonnebril die een gele handdoek vasthoudt.">
                </div>
            </div>
        </section>
    </main>

</body>
</html>