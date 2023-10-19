<?php
    require "includes/functions.php";
    includeTemplate("header");
?>

    <main class="container section centered-content">
        <h1>Our Blog</h1>
        <article class="blog-entry">
            <div class="img">
                <picture>
                    <source src="build/img/blog1.avif" type="image/avif">
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Text Blog Entry">
                </picture>
            </div>

            <div class="entry-text">
                <a href="entry.php">
                    <h4>Terrace on the Roof of your House</h4>
                    <p class="meta-information">Written on: <span>20/10/2021</span> By: <span>Admin</span></p>
                    <p>Advice to build a terrace on the roof of your house with the best materials while saving money</p>
                    </a>
            </div>
        </article>

        <article class="blog-entry">
            <div class="img">
                <picture>
                    <source src="build/img/blog2.avif" type="image/avif">
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Text Blog Entry">
                </picture>
            </div>

            <div class="entry-text">
                <a href="entry.php">
                    <h4>House Decoration Guide</h4>
                    <p class="meta-information">Written on: <span>20/10/2021</span> By: <span>Admin</span></p>
                    <p>Maximice the space of your house with this guide, learn to combine furniture and colours to give your space life</p>
                </a>
            </div>
        </article>

        <article class="blog-entry">
            <div class="img">
                <picture>
                    <source src="build/img/blog3.avif" type="image/avif">
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog3.jpg" alt="Text Blog Entry">
                </picture>
            </div>

            <div class="entry-text">
                <a href="entry.php">
                    <h4>House Decoration Guide</h4>
                    <p class="meta-information">Written on: <span>20/10/2021</span> By: <span>Admin</span></p>
                    <p>Maximice the space of your house with this guide, learn to combine furniture and colours to give your space life</p>
                </a>
            </div>
        </article>

        <article class="blog-entry">
            <div class="img">
                <picture>
                    <source src="build/img/blog4.avif" type="image/avif">
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog4.jpg" alt="Text Blog Entry">
                </picture>
            </div>

            <div class="entry-text">
                <a href="entry.php">
                    <h4>House Decoration Guide</h4>
                    <p class="meta-information">Written on: <span>20/10/2021</span> By: <span>Admin</span></p>
                    <p>Maximice the space of your house with this guide, learn to combine furniture and colours to give your space life</p>
                </a>
            </div>
        </article>
    </main>

    <?php includeTemplate("footer"); ?>