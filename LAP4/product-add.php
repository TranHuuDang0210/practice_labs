/* This PHP code snippet is for adding a new product to a website. Here's a breakdown of what the code
does: */
<?php
require_once("entities/product.class.php"); // Including the product class file
require_once('entities/category.class.php'); // Including the category class file

if (isset($_POST["btnsubmit"])) {
    // Getting values from the form
    $productName = $_POST["txtname"];
    $cateID = $_POST["txtcateid"];
    $price = $_POST["txtprice"];
    $quantity = $_POST["txtquantity"];
    $description = $_POST["txtdesc"];
    $picture = $_FILES["txtpic"];

    // Initializing the product object
    $newProduct = new Product(
        $productName,
        $cateID,
        $price,
        $quantity,
        $description,
        $picture
    );

    $loi = array(); // Array to store errors
    $loi_str = ""; // String to store error messages

    // Saving to the database
    $result = $newProduct->save($loi);

    if (!$result) {
        // Error in query, redirecting to product-add page with failure status
        header("Location: product-add.php?status=failure");
    } else {
        // Product added successfully, redirecting to product-add page with inserted status
        header("Location: product-add.php?status=inserted");
    }
}
?>

<?php if ($loi_str != "") { ?>
    <!-- Displaying error messages if any -->
    <div class="alert alert-danger"><?php echo $loi_str ?></div>
<?php } ?>

<?php require 'header.php'; // Including the header file ?>

<?php
if (isset($_GET["status"])) {
    // Displaying status message based on URL parameter
    if ($_GET["status"] == 'inserted') {
        echo "<h2>Add successful product.</h2>";
    } else {
        echo "<h2>Add failed product.</h2>";
    }
}
?>

<!-- Form to add products -->
<form method="post" enctype="multipart/form-data">
    <!-- Product's name -->
    <div class="row">
        <div class="lbltitle">
            <label> Product's name </label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtname" value="<?php echo isset($_POST["txtname"]) ? $_POST["txtname"] : "" ?>">
        </div>
    </div>
    <!-- Product Description -->
    <div class="row">
        <div class="lbltitle">
            <label> Product Description </label>
        </div>
        <div class="lblinput">
            <textarea type="text" name="txtdesc" cols="21" rows="10"><?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ?></textarea>
        </div>
    </div>
    <!-- The number of products -->
    <div class="row">
        <div class="lbltitle">
            <label> The number of products </label>
        </div>
        <div class="lblinput">
            <input type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "" ?>">
        </div>
    </div>
    <!-- Product price -->
    <div class="row">
        <div class="lbltitle">
            <label> Product price </label>
        </div>
        <div class="lblinput">
            <input type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ?>">
        </div>
    </div>
    <!-- Product Type -->
    <div class="row">
        <div class="lbltitle">
            <label> Product Type </label>
        </div>
        <div class="lblinput">
            <select name="txtcateid">
                <option value="" selected>-- Select type --</option>
                <?php $cates = Category::list_category() ?>
                <?php foreach ($cates as $item) { ?>
                    <!-- Generating options for categories -->
                    <option value="<?php echo $item['CateID'] ?>"><?php echo $item['CategoryName'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <!-- Product Image -->
    <div class="row">
        <div class="lbltitle">
            <label>URL Image</label>
        </div>
        <div class="lblinput">
            <input type="file" name="txtpic" accept=".png,.gif,.jpg,.jpeg">
        </div>
    </div>
    <!-- Button to submit the form -->
    <div class="row">
        <div class="lbltitle">
            <!-- Placeholder -->
        </div>
        <div class="submit">
            <button type="submit" name="btnsubmit">Add More Products</button>
        </div>
    </div>
</form>

<?php require 'footer.php'; // Including the footer file ?>
