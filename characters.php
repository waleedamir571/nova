<?php include 'partials/header.php' ?>
<link rel="stylesheet" href="css/characters.css">

    <main class="characters-page">
        <section class="characters-hero" aria-labelledby="characters-title">
            <img class="characters-hero-image" src="images/character/head.png" alt="A cosmic landscape with a cloaked figure overlooking a fantasy kingdom" fetchpriority="high">
            <h1 id="characters-title">Meet the characters</h1>
        </section>
        <section class="characters-catalogue" aria-labelledby="characters-heading">
            <h2 id="characters-heading">All characters from the book</h2>
            <nav class="characters-books" aria-label="Character book selection">
                <span aria-current="page">BOOK 1</span><i aria-hidden="true"></i>
                <span>BOOK 2</span><i aria-hidden="true"></i><span>BOOK 3</span>
            </nav>
            <div class="characters-timeline">
                <img class="characters-timeline-line" src="images/character/timeline-line.svg" alt="">
                <img class="characters-timeline-start" src="images/character/timeline-start.svg" alt="">
                <article class="character-row">
                    <div class="character-art character-art-fade"><img src="images/character/dave.png" alt="Dave surrounded by golden cosmic energy" width="744" height="744"></div>
                    <div class="character-marker" aria-hidden="true"><img src="images/character/timeline-medallion.svg" alt=""><img class="character-number" src="images/character/number-1.svg" alt=""></div>
                    <div class="character-copy">
                        <h3>Dave</h3>
                        <p class="character-description">The human at the center of it all. In this book he's shown being yanked out of his own bed and body by a mysterious &ldquo;Remember&rdquo; command, flooded with memories/sensations of another life (labor, heat, stone dust) that aren't his &mdash; the first hint of who/what he really is. Skeptical, sarcastic, in over his head from page one.</p>
                        <div class="character-facts">
                            <p><span>Role:</span> Protagonist</p>
                            <p><span>Nature:</span> Human incarnation of an ancient cosmic being</p>
                            <p><span>Key Traits:</span> Compassionate, loyal, protective, emotionally driven</p>
                            <p><span>Connection:</span> Nova, MJ, Husk, Gizzy and Del Sol</p>
                        </div>
                    </div>
                </article>
                <article class="character-row character-row-reverse">
                    <div class="character-art"><img src="images/character/nova.png" alt="Nova holding a glowing staff beneath the stars" width="744" height="744" loading="lazy"></div>
                    <div class="character-marker" aria-hidden="true"><img src="images/character/timeline-medallion.svg" alt=""><img class="character-number" src="images/character/number-2.svg" alt=""></div>
                    <div class="character-copy">
                        <h3>Nova</h3>
                        <p class="character-description">The star-being, here at the point of first &ldquo;shattering&rdquo; and falling to Earth. Associated throughout with collapsing stars and cosmic fracture &mdash; heavily foreshadowed as &ldquo;the one who can collapse a star if they lose control.</p>
                        <div class="character-facts">
                            <p><span>Role:</span> Ancient cosmic being and Dave's deepest connection</p>
                            <p><span>Nature:</span> One of the Old Ones</p>
                            <p><span>Key Traits:</span> Fierce, powerful, emotional, protective</p>
                            <p><span>Abilities:</span> Vast cosmic and harmonic power</p>
                            <p><span>Connection:</span> Dave, MJ, Husk and the emerging harmonic family</p>
                        </div>
                    </div>
                </article>
                <article class="character-row">
                    <div class="character-art character-art-fade"><img src="images/character/mj.png" alt="MJ, a wolf guardian in a cosmic landscape" width="744" height="744" loading="lazy"></div>
                    <div class="character-marker" aria-hidden="true"><img src="images/character/timeline-medallion.svg" alt=""><img class="character-number" src="images/character/number-1.svg" alt=""></div>
                    <div class="character-copy">
                        <h3>MJ</h3>
                        <p class="character-description">Introduced here in a much bigger reveal than in later books: a wolf-dragon hybrid, with wings, dragon fangs, and a &ldquo;war-built intelligence&rdquo; &mdash; a shapeshifter whose full monstrous/beautiful form gets a dramatic unveiling.</p>
                        <div class="character-facts">
                            <p><span>Role:</span> Guardian and family companion</p>
                            <p><span>Nature:</span> Adaptive wolf, dragon and nanite hybrid</p>
                            <p><span>Key Traits:</span> Loyal, instinctive, protective, unpredictable</p>
                            <p><span>Abilities:</span> Adaptation, transformation, nanite manipulation and harmonic bonding</p>
                            <p><span>Connection:</span> Dave, Nova, Husk and Gizzy</p>
                        </div>
                    </div>
                </article>
                <article class="character-row character-row-reverse">
                    <div class="character-art character-art-empty" aria-hidden="true"></div>
                    <div class="character-marker" aria-hidden="true"><img src="images/character/timeline-medallion.svg" alt=""><img class="character-number" src="images/character/number-2.svg" alt=""></div>
                    <div class="character-copy">
                        <h3>Simon Husk</h3>
                        <p class="character-description">A cool, unbothered tech-billionaire type (Cybertruck included) who shows up already tracking Nova's landing &ldquo;down to the meter&rdquo; &mdash; clearly plugged into the cosmic goings-on before Dave is.</p>
                        <div class="character-facts">
                            <p><span>Role:</span> Hybrid experiment and member of the family</p>
                            <p><span>Nature:</span> Cosmic/human hybrid</p>
                            <p><span>Key Traits:</span> Curious, vulnerable, thoughtful, loyal</p>
                            <p><span>Abilities:</span> Hybrid resonance and harmonic connection</p>
                            <p><span>Connection:</span> Nova, Dave, MJ and Gizzy</p>
                        </div>
                    </div>
                </article>
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
        </section>
        </main>




<?php include 'partials/footer.php' ?>
