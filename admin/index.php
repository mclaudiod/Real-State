<?php

    require "../includes/functions.php";
    $auth = isAuthenticated();

    if(!$auth) {
        header("Location: /");
    };

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // Import the conection

    require "../includes/config/database.php";
    $db = connectDB();

    // Write the Query

    $query = "SELECT * FROM properties";

    // Query the database

    $queryResult = mysqli_query($db, $query);

    // Shows conditional message

    // This means that if result is not defined then it's null, it doesn't exist, and so you can't get an error

    $result = $_GET["result"] ?? null;

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
            
            // Delete the archive

            $query = "SELECT img FROM properties WHERE id = ${id}";
            $result = mysqli_query($db, $query);
            $property = mysqli_fetch_assoc($result);
            unlink("../images/" . $property["img"]);
            
            // Delete the property

            $query = "DELETE FROM properties WHERE id = ${id}";
            $result = mysqli_query($db, $query);

            if($result) {
                header("location: /admin?result=3");
            };
        };
    };

    // Include a template
    
    includeTemplate("header");
?>

    <main class="container section">
        <h1>Real State Administrator</h1>
        
        <?php if(intval($result) === 1): ?>
            <p class="alert success">Advertisement Created Successfully</p>
        <?php elseif(intval($result) === 2): ?>
            <p class="alert success">Advertisement Updated Successfully</p>
        <?php elseif(intval($result) === 3): ?>
            <p class="alert success">Advertisement Deleted Successfully</p>
        <?php endif; ?>

        <a href="/admin/properties/create.php" class="button green-button">New Property</a>

        <table class="properties">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody> <!-- Show the results -->
                <?php while($property = mysqli_fetch_assoc($queryResult)): ?>
                    <tr>
                        <td><?php echo $property["id"]; ?></td>
                        <td><?php echo $property["title"]; ?></td>
                        <td><img src="/images/<?php echo $property["img"]; ?>" class="timg"></td>
                        <td>$ <?php echo $property["price"]; ?></td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $property["id"]; ?>">
                                <input type="submit" class="red-button-block" value="Delete">
                            </form>
                            <a href="/admin/properties/update.php?id=<?php echo $property["id"]; ?>" class="yellow-button-block">Update</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

    <?php 
        
        // Close the connection

        mysqli_close($db);
        
        includeTemplate("footer");
    ?>