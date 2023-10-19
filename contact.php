<?php
    require "includes/functions.php";
    includeTemplate("header");
?>

    <main class="container section">
        <h1>Contact</h1>

        <picture>
            <source src="build/img/destacada3.avif" type="image/avif">
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Contact Image">
        </picture>

        <h2>Fill the Contact Form</h2>

        <form class="form"> <!-- To select the inpul by clicking the label you must put "for" in the label and the same you put there in "id" in the input -->
            <fieldset>
                <legend>Personal Information</legend>
                <label for="name">Name:</label>
                <input type="text" placeholder="Your Name" id="name">
                <label for="email">E-mail:</label>
                <input type="email" placeholder="Your E-mail" id="email">
                <label for="phone">Phone Number:</label>
                <input type="tel" placeholder="Your Phone Number" id="phone">
                <label for="message">Message:</label>
                <textarea id="message"></textarea>
            </fieldset>

            <fieldset>
                <legend>Information about the Property</legend>
                <label for="options">Buy or Sell:</label>

                <select id="options">
                    <option value="" disabled selected>-- Select --</option>
                    <option value="Buy">Buy</option>
                    <option value="Sell">Sell</option>
                </select>

                <label for="budget">Price or Budget:</label>
                <input type="number" placeholder="Your Price or Budget" id="budget">
            </fieldset>

            <fieldset>
                <legend>Information about the Property</legend>
                <p>How do you wish to be contacted?</p>

                <div class="contact-way">
                    <label for="contact-phone">Phone</label>
                    <input name="contact" type="radio" value="phone" id="contact-phone">
                    <label for="contact-email">E-mail</label>
                    <input name="contact" type="radio" value="email" id="contact-email">
                </div>

                <p>If phone was selected then please choose the date and time:</p>
                <label for="date">Date:</label>
                <input type="date" id="date">
                <label for="time">Time:</label>
                <input type="time" id="time" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Submit" class="green-button">
        </form>
    </main>

    <?php includeTemplate("footer"); ?>