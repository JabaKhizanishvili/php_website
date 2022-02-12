<?php
include 'navbar.php';
$id = $_GET['id'];
$conn = new PDO("mysql:host=localhost;dbname=finalproject", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM products WHERE id = $id");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container-fluid row">
        <section style="height:100vh" class="col mt-5 pt-5 d-flex justify-content-center flex-column align-items-center">
            <form action="editprodaction.php" class="w-50 bg-white pt-5 p-5 d-flex flex-column justify-content-center" style="max-height:400px" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">აირჩიე სურათი</label>
                        <input class="form-control" type="file" id="formFile" name="fileToUpload" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">სახელი</label>
                        <input class="form-control" type="text" id="formFile" name="name" required placeholder='<?= $products[0]["name"] ?>'>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">ფასი</label>
                        <input class="form-control" type="number" step=any id="formFile" name="price" required placeholder='<?= $products[0]["price"] ?>'>
                    </div>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="cat" value=1>
                    <input type="submit" value="ჩასწორება" class="btn btn-primary">
                </div>
            </form>
        </section>

    </div>
</main>

<?php
include 'footer.php';
