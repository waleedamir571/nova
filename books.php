<?php include 'partials/header.php' ?>
<link rel="stylesheet" href="css/books-scroll-slider.css?v=4">
<style>
    .books-opening {
        container-type: inline-size;
        position: relative;
        background: linear-gradient(to bottom, #161325 42.775%, #0f0d1a 100%);
    }

    .books-hero {
        position: relative;
        height: 48.854167cqw;
    }

    .books-hero-copy {
        position: absolute;
        inset: 0 auto auto 0;
        width: 38.020833%;
        height: 42.916667cqw;
        background: #0f0d1a;
        padding: 16.666667cqw 0 0 7.083333cqw;
    }

    .books-hero h1 {
        color: #e6b95c;
        font: 700 3.645833cqw/4.177083cqw 'Times New Roman', serif;
        letter-spacing: .06cqw;
        margin: 0;
        width: 26.979167cqw;
        height: 7.760417cqw;
    }

    .books-hero h1 img {
        display: block;
        width: 100%;
        height: 100%;
    }

    .books-hero p {
        width: 23.854167cqw;
        margin: .520833cqw 0 0;
        font: 400 .9375cqw/1.25cqw 'Times New Roman', serif;
    }

    .books-hero-art {
        position: absolute;
        top: 0;
        right: 0;
        width: 61.979167%;
        height: 100%;
        overflow: hidden;
    }

    .books-hero-art>img {
        position: absolute;
        width: 147.75%;
        max-width: none;
        height: 100%;
        left: -7%;
        top: 0;
    }

    .books-hero-art::after {
        content: '';
        position: absolute;
        inset: 0;
        background: rgb(0 0 0 / 20%);
    }

    .books-opening-ornament {
        position: absolute;
        z-index: 2;
        top: 28.229167cqw;
        right: 0;
        width: 61.979167cqw;
        height: 39.427083cqw;
        pointer-events: none;
        filter: grayscale(1) invert(1) sepia(1) saturate(2);
        mix-blend-mode: screen;
    }

    .books-catalog {
        height: 51.354167cqw;
        padding-top: 6.510417cqw;
        scroll-margin-top: 24px;
    }

    .books-catalog h2 {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #e6b95c;
        font: 700 3.125cqw/4.177083cqw 'Times New Roman', serif;
        letter-spacing: .08cqw;
        white-space: nowrap;
        width: 49.583333cqw;
        height: 5.208333cqw;
        margin: 0 auto 3.333333cqw;
    }

    .books-catalog h2 img {
        display: block;
        width: 100%;
        height: 100%;
    }

    .books-carousel {
        position: relative;
    }

   .catalog-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 3.28125cqw;
    width: 60.00625cqw;
    margin-left: 21.28125cqw;
}

    .catalog-card {
        min-width: 0;
        text-align: center;
    }

    .catalog-cover {
        display: block;
        width: 100%;
        aspect-ratio: 307.98 / 461.48;
    }

    .catalog-cover img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .catalog-logo {
        position: relative;
        width: 7.760417cqw;
        height: 2.65625cqw;
        overflow: hidden;
        margin: .9125cqw auto 0;
    }

    .catalog-logo img {
        position: absolute;
        top: 0;
        left: -2.72%;
        width: 102.72%;
        height: 100%;
    }

    .catalog-card h3 {
        color: #e6b95c;
        font: 700 .864583cqw/1.2 'Times New Roman', serif;
        letter-spacing: .097656cqw;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 1.979167cqw;
        margin: .15625cqw 0 0;
    }

    .catalog-card h3 img {
        width: calc(var(--title-width) / 19.2 * 1cqw);
        height: calc(var(--title-height) / 19.2 * 1cqw);
    }

    .catalog-details {
        display: inline-block;
        color: #e6b95c;
        font: 700 .645833cqw/1.041667cqw 'Times New Roman', serif;
        letter-spacing: .110052cqw;
        text-transform: uppercase;
        text-decoration: underline;
        text-underline-offset: .15em;
        margin-top: .520833cqw;
    }

    .catalog-details:hover {
        color: #fff1c4;
    }

    .catalog-arrow {
        position: absolute;
        top: 16.145833cqw;
        display: grid;
        place-items: center;
        padding: 0;
        width: 2.5cqw;
        height: 2.5cqw;
        border: 0;
        background: transparent;
        cursor: pointer;
    }

    .catalog-arrow img {
        width: 1.239583cqw;
        height: .833333cqw;
    }

    .catalog-prev {
        left: 7.96875cqw;
        transform: rotate(180deg);
    }

    .catalog-next {
        right: 7.96875cqw;
    }

    .catalog-arrow:disabled {
        opacity: .25;
        cursor: default;
    }

    .books-opening :is(a, button):focus-visible {
        outline: 2px solid #e6b95c;
        outline-offset: 5px;
    }

    @media (max-width: 767.98px) {
        .books-hero {
            height: auto;
            padding-top: 0;
        }

        .books-hero-copy {
            position: relative;
            width: 100%;
            height: auto;
            padding: 48px 24px 36px;
        }

        .books-hero h1 {
            font-size: 48px;
            line-height: 52px;
            width: 340px;
            max-width: 100%;
            height: auto;
            aspect-ratio: 518 / 149;
        }

        .books-hero p {
            width: 100%;
            max-width: 360px;
            margin-top: 16px;
            font-size: 16px;
            line-height: 23px;
        }

        .books-hero-art {
            position: relative;
            width: 100%;
            height: auto;
            aspect-ratio: 1190 / 938;
        }

        .books-opening-ornament {
            display: none;
        }

        .books-catalog {
            height: auto;
            padding: 48px 24px 56px;
        }

        .books-catalog h2 {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #e6b95c;
            font: 700 3.125cqw/4.177083cqw 'Times New Roman', serif;
            letter-spacing: .08cqw;
            white-space: nowrap;
            width: min(100%, 540px);
            height: auto;
            aspect-ratio: 952 / 100;
            margin: 0 auto 32px;
        }

        .catalog-grid {
            width: 100%;
            margin: 0;
            gap: 30px 20px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .catalog-logo {
            width: 48.38%;
            height: auto;
            aspect-ratio: 149 / 51;
            margin-top: 9px;
        }

        .catalog-card h3 {
            font-size: 10px;
            letter-spacing: .8px;
            height: 24px;
            margin-top: 2px;
        }

        .catalog-card h3 img {
            width: calc(var(--title-width) / 308 * 100%);
            height: auto;
        }

        .catalog-details {
            font-size: 10px;
            line-height: 20px;
            letter-spacing: 1.2px;
            margin-top: 4px;
            padding: 8px 0;
        }

        .books-carousel {
            padding-bottom: 48px;
        }

        .catalog-arrow {
            top: auto;
            bottom: -8px;
            width: 44px;
            height: 44px;
        }

        .catalog-arrow img {
            width: 24px;
            height: 16px;
        }

        .catalog-prev {
            left: calc(50% - 58px);
        }

        .catalog-next {
            right: calc(50% - 58px);
        }
    }
</style>

<main>
    <div class="books-opening">
        <section id="home" class="books-hero" aria-labelledby="series-heading">
            <div class="books-hero-copy" data-aos="fade-right">
                <h1 id="series-heading">BOOK<br>SERIES</h1>
                <p>Seth&rsquo;s written quite a range of LitRPG series, featuring everything from alien infestations to
                    outrageously powerful farmers.</p>
            </div>
            <div class="books-hero-art" data-aos="fade-left"><img src="images/books/hero.png"
                    alt="NOVA's fantasy heroes, a wolf and a blue warrior beneath a golden celestial gateway"
                    fetchpriority="high"></div>
        </section>
        <img class="books-opening-ornament" src="images/books/ornament.png" alt="" aria-hidden="true" width="1191"
            height="757">
        <section id="all-books" class="books-catalog" aria-labelledby="catalog-heading">
            <h2 id="catalog-heading" data-aos="fade-right">ALL BOOKS BY DP WOLF</h2>
            <div class="books-carousel" role="region" aria-label="NOVA books" aria-roledescription="carousel"
                data-aos="fade-left">
                <button class="catalog-arrow catalog-prev" type="button" aria-label="Previous books" disabled><img
                        src="images/books/arrow.svg" alt="" width="24" height="16"></button>
                <div class="catalog-grid">
                    <?php
                    $catalogBooks = [
                        ['spark', 'The Spark & The Shatter', 266, 31],
                        ['harmonic', 'The Harmonic Leaving', 246, 23],
                        ['quiet', 'Quiet & The Chord', 246, 30],
                        // ['silence', 'Before the First Silence', 266, 38],
                    ];
                    foreach ($catalogBooks as $index => [$slug, $title, $titleWidth, $titleHeight]): ?>
                        <article class="catalog-card">
                            <a class="catalog-cover" href="#books" data-book-index="<?= $index ?>"
                                aria-label="View <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?> details"><img
                                    src="images/books/<?= $slug ?>.png"
                                    alt="<?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?> book cover" width="308"
                                    height="462"></a>
                            <div class="catalog-logo"><img src="images/books/nova.png" alt="NOVA" width="149" height="51">
                            </div>
                            <h3><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h3>
                            <a class="catalog-details" href="#books" data-book-index="<?= $index ?>">View Details</a>
                        </article>
                    <?php endforeach; ?>
                </div>
                <button class="catalog-arrow catalog-next" type="button" aria-label="Next books"><img
                        src="images/books/arrow.svg" alt="" width="24" height="16"></button>
                <span class="visually-hidden catalog-status" aria-live="polite"></span>
            </div>
        </section>
    </div>
    <section id="books" class="nbs-scroll-slider" aria-label="NOVA book series">
        <div class="nbs-stage" tabindex="0" aria-roledescription="scroll-controlled carousel">
            <div class="nbs-slide is-active" data-title="THE SPARK AND THE SHATTER"
                data-description="THE SPARK AND THE SHATTER began with a question: What happens when an ancient cosmic being chooses to become human, only to discover that the universe never forgot who he was"
                data-buy-url="#a" style="background-image:url('images/slider-spark.png')" aria-hidden="false"></div>
            <div class="nbs-slide" data-title="THE HARMONIC LEAVING"
                data-description="THE HARMONIC LEAVING begins where the fragile peace of the first book starts to unravel. Dave, Nova, and MJ have built something they never expected to have: a home. On a quiet Florida farm, among tomatoes, family chaos, coffee, and the strange rhythms of their increasingly impossible lives, Nova has begun to understand something she never knew how to name."
                data-buy-url="#a" style="background-image:url('images/slider-harmonic.png')" aria-hidden="true"></div>
            <div class="nbs-slide" data-title="QUIET AND THE CHORD"
                data-description="THE QUIET AND THE CHORD begins where the awakening of the Chord leaves the family facing a truth far older than anything they have encountered before."
                data-buy-url="#a" style="background-image:url('images/s3.png')" aria-hidden="true"></div>
            <div class="nbs-slide" data-title="BEFORE THE FIRST SILENCE" data-description="" data-buy-url="#a"
                style="background-image:url('images/s4.png')" aria-hidden="true"></div>
            <div class="nbs-shade" aria-hidden="true"></div>
            <div class="nbs-content" aria-live="polite" aria-atomic="true">
                <img src="images/slider-nova-logo.png" class="nbs-logo" alt="NOVA">
                <h2 class="nbs-title">THE SPARK AND THE SHATTER</h2>
                <p class="nbs-description">THE SPARK AND THE SHATTER began with a question: What happens when an ancient
                    cosmic being chooses to become human, only to discover that the universe never forgot who he was</p>
                <a class="nbs-button" href="#a">BUY NOW</a>
            </div>
            <div class="nbs-progress" aria-label="Slide 1 of 4">
                <b class="nbs-current">01</b>
                <span class="nbs-track" aria-hidden="true"><i></i></span>
                <b class="nbs-total">04</b>
            </div>
            <span id="book-preview" class="nbs-anchor" aria-hidden="true"></span>
        </div>
    </section>

    <section id="newsletter" class="newsletter">
        <div class="container nova-container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2>JOIN THE INNER CIRCLE</h2>
                    <p>Be the first to hear about new book releases,<br> exclusive content, giveaways and more.</p>
                </div>
                <div class="col-lg-6">
                    <form><input type="email" required placeholder="Enter your email"
                            aria-label="Email"><button>SUBSCRIBE</button></form>
                    <div class="form-message" role="status"></div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>

<script>
    (() => {
        'use strict';
        const grid = document.querySelector('.catalog-grid');
        const previous = document.querySelector('.catalog-prev');
        const next = document.querySelector('.catalog-next');
        const status = document.querySelector('.catalog-status');
        function rotate(backward) {
            if (backward) grid.prepend(grid.lastElementChild);
            else grid.append(grid.firstElementChild);
            previous.disabled = false;
            status.textContent = 'First book: ' + grid.firstElementChild.querySelector('h3 img').alt;
        }
        previous.addEventListener('click', () => rotate(true));
        next.addEventListener('click', () => rotate(false));
    })();

</script>
<script src="js/books-scroll-slider.js?v=4"></script>
<?php include 'partials/footer.php' ?>
