<?php
include 'navbar.php';
$conn = new PDO("mysql:host=localhost;dbname=finalproject", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM products WHERE 1");
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container-fluid row row-cols-2">
        <section style="height:100vh" class="col mt-5 pt-5 d-flex justify-content-center flex-column align-items-center">
            <form action="addproductsaction.php" class="w-75 bg-white pt-5 p-5 d-flex flex-column justify-content-center" style="max-height:400px" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">აირჩიე სურათი</label>
                        <input class="form-control" type="file" id="formFile" name="fileToUpload" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">სახელი</label>
                        <input class="form-control" type="text" id="formFile" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">ფასი</label>
                        <input class="form-control" type="number" step=any id="formFile" name="price" required>
                    </div>
                    <input type="hidden" name="cat" value=1>
                    <input type="submit" value="დაამატე პროდუქტი" class="btn btn-primary">
                </div>
            </form>
        </section>
        <div class="col mt-5 pt-5 d-flex justify-content-center  align-items-center">
            <div class="container">
                <table class="table table-white">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">სახელი</th>
                            <th scope="col">ფასი</th>
                            <th scope="col">სურათი</th>
                            <th scope="col">წაშალე</th>
                            <th scope="col">ჩასწორება</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($orders as $val) {
                            $id = $val['id'];
                        ?>
                            <tr>
                                <td><?= $val['id'] ?></td>
                                <td class="product-name"><?= $val['name'] ?></td>
                                <td><?= $val['price'] ?></td>
                                <td><?= $val['img'] ?></td>
                                <td class="text-center"> <a href="delproduct.php?id=<?= $id ?>" class="text-center"><i class="fas fa-times-circle text-danger"></i></a> </td>
                                <td class="text-center"><a href="editproduct.php?id=<?= $id ?>"><i style="cursor:pointer" class="fas fa-edit productedit"></i></a></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>
<!-- <script>
    let name = document.getElementsByClassName("product-name");
    $(document).ready(function() {
        let edtbtn = document.querySelectorAll('.productedit');
        for (let i = 0; i < edtbtn.length; i++) {
            edtbtn[i].onclick = function(e) {
                console.log(name[i].innerHTML);
            };
        }
    })
</script> -->

<?php
include 'footer.php';
?>