<?php
    require "includes/functions.php";
    includeTemplate("header");

    // Import the connection

    require "includes/config/database.php";
    $db = connectDB();

    // Validate ID by valid ID

    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: /");
    };

    // Obtain the data of the property

    $query = "SELECT * FROM properties WHERE id = ${id}";
    $result = mysqli_query($db, $query);

    if($result->num_rows === 0) {
        header("Location: /");
    };

    $property = mysqli_fetch_assoc($result);

?>

    <main class="container section centered-content">
        <h1><?php echo $property["title"] ?></h1>

        <img loading="lazy" src="/images/<?php echo $property["img"] ?>" alt="Image of the Property">

        <div class="property-summary">
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

            <p><?php echo $property["description"] ?></p>
        </div>
    </main>

<?php 
    
    includeTemplate("footer");

    // Close the connection

    mysqli_close($db);

?>