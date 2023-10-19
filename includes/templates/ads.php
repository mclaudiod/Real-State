<?php

    // Import the connection

    require "includes/config/database.php";
    $db = connectDB();

    // Query

    $query = "SELECT * FROM properties LIMIT ${limit}";

    // Obtain Result

    $result = mysqli_query($db, $query);

?>

<div class="ads-container">
    <?php while($property = mysqli_fetch_assoc($result)): ?>
    <div class="ad">
        <img loading="lazy" src="/images/<?php echo $property["img"] ?>" alt="Ad">

        <div class="ad-content">
            <h3><?php echo $property["title"] ?></h3>
            <p><?php echo $property["description"] ?></p>
            <p class="price">$<?php echo $property["price"] ?></p>
            <ul class="icons-characteristics">

                <li>
                    <img class="icon" src="build/img/icono_dormitorio.svg" alt="Bedrooms Icon" loading="lazy">
                    <p><?php echo $property["rooms"] ?></p>
                </li>

                <li>
                    <img class="icon" src="build/img/icono_wc.svg" alt="Bathrooms Icon" loading="lazy">
                    <p><?php echo $property["wc"] ?></p>
                </li>

                <li>
                    <img class="icon" src="build/img/icono_estacionamiento.svg" alt="Parking Lots Icon" loading="lazy">
                    <p><?php echo $property["parking"] ?></p>
                </li>
            </ul>

            <a href="ad.php?id=<?php echo $property["id"] ?>" class="yellow-button-block">View Property</a>
        </div> <!-- .ad-content -->
    </div> <!-- ad -->
    <?php endwhile; ?>
</div> <!-- .ads-container -->

<?php 

    // Close the connection

    mysqli_close($db);

?>