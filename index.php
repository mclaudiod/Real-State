<?php
    require "includes/functions.php";
    includeTemplate("header", true); 
?>

    <main class="container section">
        <h1>More About Us</h1>

        <div class="aboutus-icons">
            <div class="icon">
                <img src="build/img/icono1.svg" alt="Segurity Icon" loading="lazy">
                <h3>Segurity</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi fuga natus. Ratione laudantium consectetur suscipit provident illo tempore porro assumenda temporibus illum nisi deleniti, velit corrupti, facere sed quasi!</p>
            </div>

            <div class="icon">
                <img src="build/img/icono2.svg" alt="Price Icon" loading="lazy">
                <h3>Price</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi fuga natus. Ratione laudantium consectetur suscipit provident illo tempore porro assumenda temporibus illum nisi deleniti, velit corrupti, facere sed quasi!</p>
            </div>

            <div class="icon">
                <img src="build/img/icono3.svg" alt="Time Icon" loading="lazy">
                <h3>Time</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi fuga natus. Ratione laudantium consectetur suscipit provident illo tempore porro assumenda temporibus illum nisi deleniti, velit corrupti, facere sed quasi!</p>
            </div>
        </div>
    </main>

    <section class="section container">
        <h2>Houses and Apartments on Sale</h2>

        <?php 
            
            $limit = 3;
            include "includes/templates/ads.php"
            
        ?>

        <div class="align-right">
            <a href="ads.php" class="green-button">See All</a>
        </div>
    </section>

    <section class="contactus-img">
        <h2>Find the house of your dreams</h2>
        <p>Fill the form and an adviser will contact you shortly</p>
        <a href="contact.php" class="yellow-button">Contact Us</a>
    </section>

    <div class="container section inferior-section"> <!-- Use section when you have a title for a part of the website, except in the case of articles, when it's a bloc entrance, etc-->
        <section class="blog">
            <h3>Our Blog</h3>

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
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Text Blog Entry">
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
        </section>

        <section class="testimonials">
            <h3>Testimonials</h3>

            <div class="testimonial">
                <blockquote>
                    The staff behaviour was excelent, great care and the house that they offered me meets all my expectations.
                </blockquote>
                <p>— Claudio D. Morales</p>
            </div>
        </section>
    </div>

    <?php includeTemplate("footer"); ?>