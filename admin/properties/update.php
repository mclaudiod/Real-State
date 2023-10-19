<?php

    require "../../includes/functions.php";
    $auth = isAuthenticated();

    if(!$auth) {
        header("Location: /");
    };

    // Database

    require "../../includes/config/database.php";
    $db = connectDB();

    // Validate ID by valid ID

    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if(!$id) {
        header("Location: /admin");
    };
    
    // Obtain the data of the property
    
    $query = "SELECT * FROM properties WHERE id = ${id}";
    $result = mysqli_query($db, $query);
    $property = mysqli_fetch_assoc($result);
    
    // echo "<pre>";
    // var_dump($property);
    // echo "</pre>";

    // Query to look up the agents

    $query = "SELECT * FROM agents";
    $result = mysqli_query($db, $query);

    // To insert data into the database first we declare an if statement to require the use of POST (in this case at least), which we use to collect the variables of the inputs, to save them in an array which then is inserted into the database, basically the "name" property is used in conjuction with the $_POST to save the value in a variable, which is later used to insert it in the rest of the MySQL code and then send it to the database, which makes it to be saved there

    // Array with error messages

    $errors = [];

    $title = $property["title"];
    $price = $property["price"];
    $description = $property["description"];
    $rooms = $property["rooms"];
    $wc = $property["wc"];
    $parking = $property["parking"];
    $agentid = $property["idagent"];
    $propertyImage = $property["img"];

    // POST executes the code AFTER the user sends the form

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        $title = mysqli_real_escape_string($db, $_POST["title"]);
        $price = mysqli_real_escape_string($db, $_POST["price"]);
        $description = mysqli_real_escape_string($db, $_POST["description"]);
        $rooms = mysqli_real_escape_string($db, $_POST["rooms"]);
        $wc = mysqli_real_escape_string($db, $_POST["wc"]);
        $parking = mysqli_real_escape_string($db, $_POST["parking"]);
        $agentid = mysqli_real_escape_string($db, $_POST["agent"]);
        $created = date("Y/m/d");

        // Assign files to a variable using the name

        $image = $_FILES["image"];

        if(!$title) {
            $errors[] = "You have to add a title";
        };

        if(!$price) {
            $errors[] = "You have to add a price";
        };

        if(strlen($description) < 50) {
            $errors[] = "You have to add a description of a minimum of 50 characters";
        };

        if(!$rooms) {
            $errors[] = "You have to add the number of bedrooms";
        };

        if(!$wc) {
            $errors[] = "You have to add the number of bathrooms";
        };

        if(!$parking) {
            $errors[] = "You have to add the number of parking lots";
        };

        if(!$agentid) {
            $errors[] = "You have to add an agent";
        };

        // Validate by file size (10mb max)

        if($image["size"] > 10000000) {
            $errors[] = "The image is too big";
        };

        // echo "<pre>";
        // var_dump($errors);
        // echo "</pre>";

        // Check that the errors array is empty

        if(empty($errors)) {
            // Upload files

            $imageName = "";

            // Create folder with mkdir
            
            $imageFolder = "../../images/";

            if(!is_dir($imageFolder)) {
                mkdir($imageFolder);
            };

            // Delete the previous image

            if($image["name"]) {
                unlink($imageFolder . $propertyImage);

                // Define the extension of the image

                if ($image["type"] === "image/jpeg") {
                    $exten = ".jpg";
                } else {
                    $exten = ".png";
                };

                // Generate an unique name

                $imageName = md5(uniqid(rand(), true)) . $exten;

                // Upload the image

                move_uploaded_file($image["tmp_name"], $imageFolder . $imageName);
            } else {
                $imageName = $propertyImage;
            };

            // Insert into the database

            $query = "UPDATE properties SET title = '${title}', price = '${price}', description = '${description}', img = '${imageName}', rooms = ${rooms}, wc = ${wc}, parking = ${parking}, idagent = ${agentid} WHERE id = ${id}";

            // echo $query;

            $result = mysqli_query($db, $query);

            if($result) {
            
            // Redirect user

            header("Location: /admin?result=2");
            };
        };
    };

    includeTemplate("header");
?>

<!-- Here we are creating a form where it should have the same inputs as the database has, for example in this case it's a database about properties, so we have the title, price, image,description, etc, because those are the ones we already created in the database, it's also important to give every input the property "name" to be able to use it to make the array and then save it in the database

enctype="multipart/form-data" is used to permit the form to upload files, this applies to other techologies too-->

    <main class="container section">
        <h1>Update Property</h1>
        
        <a href="/admin" class="button green-button">Return</a>

        <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
        

        <form class="form" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>General Information</legend>

                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Property Title" value="<?php echo $title ?>">

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" placeholder="Property Price" value="<?php echo $price ?>">

                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/jpeg, image/png">

                <img src="/images/<?php echo $propertyImage ?>" class="small-image">

                <label for="description">Description:</label>
                <textarea id="description" name="description"><?php echo $description ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Property Information</legend>

                <label for="rooms">Bedrooms:</label>
                <input type="number" id="rooms" name="rooms" placeholder="Property Bedrooms" min="1" max="9" value="<?php echo $rooms ?>">

                <label for="wc">Bathrooms:</label>
                <input type="number" id="wc" name="wc" placeholder="Property Bathrooms" min="1" max="9" value="<?php echo $wc ?>">

                <label for="parking">Parking Lots:</label>
                <input type="number" id="parking" name="parking" placeholder="Property Parking Lots" min="1" max="9" value="<?php echo $parking ?>">
            </fieldset>

            <fieldset>
                <legend>Agent</legend>

                <!-- mysqli_fetch_assoc is used to use the result of the query and "save" it in an associative array, then we concatenate two values inside of that array to get the name and surname of each agent in one place, this also works for whatever number of agents we have, becahse it works WHILE there are agents left -->

                <select name="agent">
                    <option value="">-- Select --</option>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <option <?php echo $agentid === $row["id"] ? "selected" : ""; ?> value="<?php echo $row["id"]; ?>"><?php echo $row["name"] . " " . $row["surname"] ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Update Property" class="button green-button">
        </form>
        
    </main>

    <?php includeTemplate("footer"); ?>