<?php include 'partials/header.php' ?>
<style>
    /* About-author only. Figma 218:1136 uses a 1920px-wide desktop canvas. */
    .author-page {
        container-type: inline-size;
        background: #0f0d1a;
        color: #fff;
        overflow-x: clip;
    }

    .author-page *,
    .author-page *::before,
    .author-page *::after {
        box-sizing: border-box;
    }

    .author-page h1,
    .author-page h2,
    .author-page h3,
    .author-page p {
        margin: 0;
    }

    .author-opening {
        position: relative;
        isolation: isolate;
    }

    .author-portrait {
        position: relative;
        height: 44.270833vw;
    }

    .author-portrait-crop {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .author-portrait-crop img {
        /* position: absolute;
        top: -34.01%;
        left: 0; */
        width: 100%;
        /* height: 236.03%;
        max-width: none; */
    }




    .author-stats h2 {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 5.208333vw;
        color: #e6b95c;
        font: 700 3.125vw/4.177083vw 'Times New Roman', serif;
        letter-spacing: .17937vw;
        text-transform: uppercase;
    }

    .author-stat-list {
        max-width: 1660px;
        margin: 2.604167vw auto 0;
        padding: 0;
        list-style: none;
        --bs-gutter-x: 1.5rem;
    }

    .author-stat-icon {
        position: relative;
        display: grid;
        place-items: center;
        width: 2.604167vw;
        height: 2.604167vw;
        margin: 0 auto;
    }

    /* Rotating outer ring */


    /* Inner golden circle */
    /* .author-stat-icon::after {
        content: '';
        position: absolute;
        width: 2.604167vw;
        height: 2.604167vw;
        border: max(.052083vw, .5px) solid #e6b95c;
        border-radius: 50%;
        background: transparent;
        z-index: 2;
    } */

    @keyframes sigil-ring-turn {
        to {
            transform: rotate(360deg);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .author-stat-icon::before {
            animation: none;
        }
    }

    .author-stat-icon img {
        display: block;
        width: 1.145833vw;
        height: 1.5625vw;
        object-fit: contain;
        position: relative;
        z-index: 3;
    }

    /* Small decorative dots on the golden circle */
    /* .author-stat-icon .dot-top,
    .author-stat-icon .dot-bottom {
        position: absolute;
        width: .46875vw;
        height: .46875vw;
        border-radius: 50%;
        background: #e6b95c;
        z-index: 4;
    } */

    /* .author-stat-icon .dot-top {
        top: .052083vw;
        right: .3125vw;
    } */

    .author-stat-icon .dot-bottom {
        bottom: .052083vw;
        left: .3125vw;
    }

    .author-stat h3 {
        margin-top: 1.302083vw;
        color: #e6b95c;
        font: 700 1.25vw/1.822917vw 'Times New Roman', serif;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .author-stat p {
        margin-top: 2.083333vw;
        font: 400 1.041667vw/1.4 'Times New Roman', serif;
    }

    .author-world {
        position: relative;
        height: 55.9375vw;
        background: #161124;
    }

    .author-world-ring {
        position: absolute;
        z-index: 1;
        left: 17.34%;
        top: -9.95125vw;
        width: 68.86%;
        height: 68.7575vw;
        pointer-events: none;
        filter: drop-shadow(0 0 .3vw #b3915266);
    }

    .author-world-ring img {
        display: block;
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
    }

    .author-world-crop {
        position: absolute;
        inset: 0;
        overflow: hidden;
        z-index: 2;
    }

    .author-world-crop img {
        position: absolute;
        top: -1.78%;
        right: 0;
        width: 114.58%;
        height: 115.28%;
        max-width: none;
        transform: scaleX(-1);
        opacity: .8;
    }

    .author-biography {
        position: absolute;
        z-index: 3;
        left: 0;
        top: 4.0625vw;
        width: 29.947917vw;
        height: 47.083333vw;
        padding: 6.614583vw 4.361458vw 0 5.833333vw;
        background: black;
        color: #e6b95c;
    }

    .author-biography h2 {
        width: 18.644271vw;
        font: 700 1.354167vw/1.822917vw 'Times New Roman', serif;
    }

    .author-biography p {
        font: 400 .723958vw/1.822917vw 'Times New Roman', serif;
    }

    .author-biography p:first-of-type {
        margin-top: 2.5vw;
    }

    .author-biography p+p {
        margin-top: 1.614583vw;
        font-size: .739583vw;
    }

    .author-reflection {
        position: relative;
        height: 41.666667vw;
        padding-top: 7.520833vw;
    }

    .author-reflection-copy {
        position: relative;
        z-index: 2;
        width: 38.854167vw;
        margin-left: 30.46875vw;
    }

    .author-reflection h2 {
        width: 37.353125vw;
        /* min-height: 3.90625vw; */
        color: #e6b95c;
        font: 700 1.145833vw/normal 'Times New Roman', serif;
        text-transform: uppercase;
    }

    .author-reflection p {
        font: 400 1.041667vw/1.4 Inter, Arial, sans-serif;
    }

    .author-reflection p:first-of-type {
        width: 37.96875vw;
        margin-top: 2.604167vw;
    }

    .author-reflection p+p {
        margin-top: 1.302083vw;
    }

    /* The original Figma SVG layers, composed at their exported coordinates. */
    .author-line-art {
        position: absolute;
        z-index: 4;
        pointer-events: none;
    }

    .author-line-art img {
        position: absolute;
        display: block;
        max-width: none;
    }

    .author-hero-lines {
        right: 0;
        top: 9.270833vw;
        width: 58.925vw;
        height: 42.864583vw;
    }

    .author-hero-lines .line-h {
        left: .51%;
        top: 73.11%;
        width: 99.49%;
        height: .06875vw;
    }

    .author-hero-lines .line-v {
        left: 88.79%;
        top: 0;
        width: .06875vw;
        height: 99.69%;
    }

    .author-hero-lines .line-corner {
        left: 82.67%;
        top: 64.7%;
        width: 12.33%;
        height: 16.95%;
    }

    .author-hero-lines .corner-first {
        clip-path: inset(0 50% 50% 0);
    }

    .author-hero-lines .corner-second {
        clip-path: inset(50% 0 0 50%);
    }

    .author-hero-lines .line-start {
        left: 0;
        top: 72.58%;
        width: 3.22%;
        height: 1.05%;
    }

    .author-hero-lines .line-top {
        left: 88.41%;
        top: 0;
        width: .76%;
        height: 4.42%;
    }

    .author-hero-lines .line-bottom {
        left: 88.2%;
        top: 94.25%;
        width: 1.18%;
        height: 5.75%;
    }

    .author-bio-lines {
        left: -1.041667vw;
        top: 3.645833vw;
        width: 29.947917vw;
        height: 46.02125vw;
        overflow: hidden;
    }

    .author-bio-lines .line-v {
        left: 15.13%;
        top: .29%;
        width: .046875vw;
        height: 99.5%;
    }

    .author-bio-lines .line-h {
        position: absolute;
        left: 0;
        top: 82.74%;
        width: 99.43%;
        height: .046875vw;
        background: #a88f68;
    }

    .author-bio-lines .line-corner {
        left: 6.71%;
        top: 77.35%;
        width: 16.71%;
        height: 10.87%;
        clip-path: polygon(0 0, 50% 0, 50% 50%, 100% 50%, 100% 100%, 50% 100%, 50% 50%, 0 50%);
    }

    .author-bio-lines .line-top {
        left: 14.61%;
        top: .02%;
        width: 1.03%;
        height: 2.84%;
    }

    .author-bio-lines .line-bottom {
        left: 14.33%;
        top: 96.3%;
        width: 1.59%;
        height: 3.69%;
    }

    .author-bio-lines .line-start {
        left: 95.64%;
        top: 82.41%;
        width: 4.36%;
        height: .67%;
    }

    .author-bottom-lines {
        top: 32.729167vw;
        right: -213px;
        width: 55.290052vw;
        height: 23.854167vw;
    }

    .author-bottom-lines .line-h {
        left: .31%;
        top: 32.78%;
        width: 99.69%;
        height: .066667vw;
    }

    .author-bottom-lines .line-v {
        left: 95.02%;
        top: .95%;
        width: .066667vw;
        height: 99.05%;
    }

    .author-bottom-lines .line-corner {
        left: 88.65%;
        top: 18.01%;
        width: 12.64%;
        height: 29.32%;
        clip-path: inset(0 50% 50% 0);
    }

    .author-bottom-lines .line-start {
        left: 0;
        top: 31.74%;
        width: 3.3%;
        height: 1.82%;
    }

    .author-bottom-lines .line-top {
        left: 94.42%;
        top: 0;
        width: 1.2%;
        height: 9.95%;
    }

    @media (max-width: 767.98px) {
        .author-portrait {
            height: 68vw;
            min-height: 260px;
        }

        .author-portrait-crop img {
            top: -34.01%;
            left: -24%;
            width: 150%;
            height: auto;
        }

        .author-stats {
            height: auto;
            padding: 42px 20px 82px;
        }

        .author-stats h2 {
            height: auto;
            font-size: 30px;
            line-height: 1.3;
            letter-spacing: 1.4px;
        }

        .author-stat-list {
            margin-top: 32px;
            --bs-gutter-y: 32px;
        }

        .author-stat-icon {
            width: 44px;
            height: 44px;
        }

        .author-stat-icon::before {
            top: -5px;
            left: -5px;
            width: 54px;
            height: 54px;
        }

        .author-stat-icon::after {
            width: 44px;
            height: 44px;
            border-width: 1px;
        }

        .author-stat-icon img {
            width: 21px;
            height: 26px;
        }

        /* .author-stat-icon .dot-top,
        .author-stat-icon .dot-bottom {
            width: 7px;
            height: 7px;
        }

        .author-stat-icon .dot-top {
            top: 1px;
            right: 5px;
        } */

        .author-stat-icon .dot-bottom {
            bottom: 1px;
            left: 5px;
        }

        .author-stat h3 {
            margin-top: 14px;
            font-size: 14px;
            line-height: 20px;
            white-space: normal;
        }

        .author-stat p {
            margin-top: 10px;
            font-size: 15px;
        }

        .author-world {
            display: flex;
            flex-direction: column;
            height: auto;
        }

        .author-world-ring {
            top: -40px;
            height: 75vw;
        }

        .author-world-crop {
            position: relative;
            order: 0;
            width: 100%;
            height: 76vw;
        }

        .author-world-crop img {
            width: 135%;
            height: 115.28%;
            right: -4%;
        }

        .author-biography {
            position: relative;
            order: 1;
            top: auto;
            width: calc(100% - 40px);
            height: auto;
            margin: -20px 20px 0;
            padding: 38px 30px 48px;
        }

        .author-biography h2 {
            width: auto;
            font-size: 23px;
            line-height: 1.35;
        }

        .author-biography p,
        .author-biography p+p {
            font-size: 15px;
            line-height: 1.8;
        }

        .author-biography p:first-of-type,
        .author-biography p+p {
            margin-top: 24px;
        }

        .author-reflection {
            height: auto;
            padding: 58px 26px 88px;
        }

        .author-reflection-copy {
            width: 100%;
            max-width: 560px;
            margin: 0 auto;
        }

        .author-reflection h2 {
            width: auto;
            min-height: 0;
            font-size: 19px;
            line-height: 1.4;
        }

        .author-reflection p {
            font-size: 15px;
            line-height: 1.7;
        }

        .author-reflection p:first-of-type {
            width: auto;
            margin-top: 24px;
        }

        .author-reflection p+p {
            margin-top: 18px;
        }

        .author-hero-lines,
        .author-bio-lines {
            display: none;
        }

        .author-bottom-lines {
            top: auto;
            bottom: -45px;
            width: 85%;
            height: 130px;
        }
    }
</style>
<main>
    <div class="author-page">
        <div class="author-opening">
            <section id="home" class="author-portrait container-fluid p-0" aria-labelledby="author-page-title">
                <h1 id="author-page-title" class="visually-hidden">Meet the Author</h1>
                <div class="author-portrait-crop" data-aos="fade-left"><img src="images/author/portrait.png"
                        alt="Author Seth Ring wearing glasses and a brown shirt in his study" fetchpriority="high">
                </div>
            </section>
            <div class="author-line-art author-hero-lines" aria-hidden="true">
                <img class="line-h" src="images/author/hero-horizontal.svg" alt="">
                <img class="line-v" src="images/author/hero-vertical.svg" alt="">
                <img class="line-corner corner-first" src="images/author/hero-corner.svg" alt="">
                <img class="line-corner corner-second" src="images/author/hero-corner.svg" alt="">
                <img class="line-start" src="images/author/hero-start.svg" alt="">
                <img class="line-top" src="images/author/hero-top.svg" alt="">
                <img class="line-bottom" src="images/author/hero-bottom.svg" alt="">
            </div>
            <section class="author-stats container-fluid" aria-labelledby="author-stats-title">
                <h2 id="author-stats-title" data-aos="fade-right">About the Author </h2>
                <ul class="author-stat-list row row-cols-2 row-cols-md-5 justify-content-center gy-4"
                    data-aos="fade-left">
                    <li class="author-stat col text-center">
                        <span class="author-stat-icon">
                            <img src="images/author/books.svg" alt="" width="22" height="30">
                            <span class="dot-top"></span>
                            <span class="dot-bottom"></span>
                        </span>
                        <h3>Books</h3>
                        <p class="counter" data-target="3" data-suffix="+">0</p>
                    </li>
                    <li class="author-stat col text-center">
                        <span class="author-stat-icon">
                            <img src="images/author/reviews.svg" alt="" width="22" height="30">
                            <span class="dot-top"></span>
                            <span class="dot-bottom"></span>
                        </span>
                        <h3>Amazon Reviews</h3>
                        <p class="counter" data-target="135000" data-suffix="+" data-format="k">0</p>
                    </li>
                    <li class="author-stat col text-center">
                        <span class="author-stat-icon">
                            <img src="images/author/sold.svg" alt="" width="22" height="30">
                            <span class="dot-top"></span>
                            <span class="dot-bottom"></span>
                        </span>
                        <h3>Books Sold</h3>
                        <p class="counter" data-target="1000000" data-suffix="+" data-format="m">0</p>
                    </li>
                    <li class="author-stat col text-center">
                        <span class="author-stat-icon">
                            <img src="images/author/typing.svg" alt="" width="22" height="30">
                            <span class="dot-top"></span>
                            <span class="dot-bottom"></span>
                        </span>
                        <h3>Typing Speed</h3>
                        <p class="counter" data-target="85" data-suffix=" WPM">0</p>
                    </li>
                    <li class="author-stat col text-center">
                        <span class="author-stat-icon">
                            <img src="images/author/origin.svg" alt="" width="22" height="30">
                            <span class="dot-top"></span>
                            <span class="dot-bottom"></span>
                        </span>
                        <h3>Countries of Origin</h3>
                        <p class="counter" data-target="1">0</p>
                    </li>
                </ul>
            </section>
        </div>
        <section id="author" class="author-world container-fluid p-0" aria-labelledby="author-biography-title">
            <div class="author-world-ring" aria-hidden="true"><img src="images/author/ring.svg" alt=""><img
                    src="images/author/ring.svg" alt=""><img src="images/author/ring.svg" alt=""></div>
            <div class="row g-0">
                <div class="col-12 author-world-crop" data-aos="fade-right"><img src="images/author/world.png"
                        alt="NOVA heroines and a wolf in a mountain landscape beneath a glowing celestial figure"
                        loading="lazy"></div>
                <div class="col-12 col-md-4">
                    <div class="author-biography" data-aos="fade-left">
                        <h2 id="author-biography-title">About the Author</h2>
                        <p>DP Wolf is a writer, storyteller, and lifelong collector of the strange, funny, and
                            unexpectedly meaningful moments that make life worth writing about. Long before putting his
                            stories on the page, he spent years navigating the worlds of firehouses, kitchens,
                            warehouses, and life in Florida, gathering experiences that would eventually find their way
                            into his fiction. Those experiences shaped a storytelling style that is equal parts
                            imaginative, emotional, humorous, and deeply human.
                        </p>
                        <p>
                            His work blends cosmic adventure with comedy and genuine emotional depth, creating stories
                            where the extraordinary exists alongside the everyday. DP Wolf has a particular talent for
                            building characters who feel less like fictional creations and more like people you might
                            actually know. They make mistakes, form complicated relationships, find themselves in
                            ridiculous situations, and somehow manage to keep moving forward.
                        </p>

                        <div class="author-line-art author-bio-lines" aria-hidden="true">
                            <span class="line-h"></span><img class="line-v" src="images/author/bio-vertical.svg"
                                alt=""><img class="line-corner" src="images/author/bio-corner.svg" alt=""><img
                                class="line-start" src="images/author/bio-end.svg" alt=""><img class="line-top"
                                src="images/author/bio-top.svg" alt=""><img class="line-bottom"
                                src="images/author/bio-bottom.svg" alt="">
                        </div>
                    </div>
        </section>
        <section class="author-reflection container" aria-labelledby="author-reflection-title">

            <div class="row justify-content-center g-0">
                <div class="col-md-6">
                    <img class="w-80" src="images/author/author.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <div class="author-reflection-copy mx-auto" data-aos="fade-right">
                        <h2 id="author-reflection-title">About the Author</h2>
                        <p>DP Wolf is a writer, storyteller, and lifelong collector of the strange, funny, and
                            unexpectedly meaningful moments that make life worth writing about. Long before putting his
                            stories on the page, he spent years navigating the worlds of firehouses, kitchens,
                            warehouses, and life in Florida, gathering experiences that would eventually find their way
                            into his fiction.</p>
                        <p>For DP Wolf, humor is more than entertainment. It is a way of looking at difficult
                            situations, connecting with readers, and finding something human in even the most chaotic
                            circumstances. His stories can move from absurdity to sincerity without losing their sense
                            of fun, allowing readers to laugh one moment and become emotionally invested the next. His
                            fascination with cosmic ideas also gives his work a larger sense of possibility, opening the
                            door to worlds where the impossible can feel surprisingly familiar.</p>
                    </div>
                </div>
            </div>
            <div class="author-line-art author-bottom-lines" aria-hidden="true">
                <img class="line-h" src="images/author/bottom-horizontal.svg" alt=""><img class="line-v"
                    src="images/author/bottom-vertical.svg" alt=""><img class="line-corner"
                    src="images/author/bottom-corner.svg" alt=""><img class="line-start"
                    src="images/author/bottom-start.svg" alt=""><img class="line-top" src="images/author/bottom-top.svg"
                    alt="">
            </div>
        </section>
    </div>
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
    </section>
</main>

<script>
    // Counter Animation
    function animateCounters() {
        const counters = document.querySelectorAll('.author-stats .counter');

        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const suffix = counter.getAttribute('data-suffix') || '';
            const format = counter.getAttribute('data-format') || '';
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    // Show incrementing numbers during animation
                    if (format === 'm') {
                        counter.textContent = (current / 1000000).toFixed(1) + 'M' + suffix;
                    } else if (format === 'k') {
                        counter.textContent = (current / 1000).toFixed(0) + 'K' + suffix;
                    } else {
                        counter.textContent = Math.floor(current) + suffix;
                    }
                    requestAnimationFrame(updateCounter);
                } else {
                    // Final formatted value
                    if (format === 'm') {
                        counter.textContent = (target / 1000000).toFixed(0) + ',000,000' + suffix;
                    } else if (format === 'k') {
                        counter.textContent = (target / 1000).toLocaleString() + suffix;
                    } else {
                        counter.textContent = target + suffix;
                    }
                }
            };

            updateCounter();
        });
    }

    // Start counter animation after 4 second delay (after page loader)
    setTimeout(() => {
        animateCounters();
    }, 4000);
</script>

<?php include 'partials/footer.php' ?>