<?php
include "navbar.php";
?>
<main>
    <!-- ავტორიზაცია -->
    <div class="login-wrap mt-5" style="z-index:100000000">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"><?= $language[$lang]['loginform']["signin"]  ?> </label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"><?= $language[$lang]['loginform']["signup"]  ?></label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="login.php" method="post">
                        <div class="group">
                            <label for="user" class="label"><?= $language[$lang]['loginform']["email"]  ?></label>
                            <input type="email" class="input" name="mail" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label"><?= $language[$lang]['loginform']["password"]  ?></label>
                            <input type="password" class="input" data-type="password" name="password" required>
                        </div>

                        <div class="group">
                            <input type="submit" class="button" value="<?= $language[$lang]['loginform']["signin"]  ?>">
                        </div>
                    </form>
                    <div class="hr"></div>
                    <!-- <p class="text-danger">მომხმარებელი ან პაროლი არასწორია</p> -->

                    <div class="foot-lnk">
                        <!-- <a href="#forgot"><?= $language[$lang]['loginform']["forgetpass"] ?></a> -->
                    </div>
                </div>
                <div class="sign-up-htm">
                    <form action="functions.php" method="post">
                        <div class="group">
                            <label for="user" class="label"><?= $language[$lang]['loginform']["username"]  ?></label>
                            <input type="text" class="input" name="username" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label"><?= $language[$lang]['loginform']["password"]  ?></label>
                            <input type="password" class="input" data-type="password" name="password" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label"><?= $language[$lang]['loginform']["rpassword"]  ?></label>
                            <input type="password" class="input" data-type="password" name="rpassword" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label"><?= $language[$lang]['loginform']["email"] ?></label>
                            <input type="email" class="input" name="mail" required>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value=" <?= $language[$lang]['loginform']["signup"]  ?> ">
                        </div>
                    </form>

                    <!-- errors -->
                    <?php
                    if (isset($_GET['errors']['user'])) { ?>
                        <p id="error1" style="color:red;" class="mb-1"><?= $_GET["errors"]['user']; ?></p>
                    <?php
                    } ?>


                    <?php
                    if (isset($_GET['errors']['pass'])) { ?>
                        <p id="error" style="color:red;" class="mb-1"><?= $_GET["errors"]['pass']; ?></p>
                    <?php
                    } ?>

                    <?php
                    if (isset($_GET['errors']['match'])) { ?>
                        <p id="error2" style="color:red;" class="mb-1"><?= $_GET["errors"]['match']; ?></p>
                    <?php
                    } ?>


                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <!-- <label for="tab-1"><?= $language[$lang]['loginform']["member"]  ?></a> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ავტორიზაცია დასასრული -->
    <div>
        <div class="container-fluid" style="padding:0; padding-top:50px" id="home">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height:70vh;  background-color: black;">
                        <img src="./assets/images/rick.jpg" alt="..." style="object-fit:cover; opacity: 0.6;">
                        <div class="carousel-caption">
                            <h2>Rick and Morty</h2>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="height:70vh;background-color: black;">
                        <img src="./assets/images/baby.jpg" class="d-block w-100" alt="..." style="object-fit: cover; opacity: 0.6;">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>baby driver</h2>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="height:70vh;background-color: black;">
                        <img src="https://static.adjaranet.com/movies/covers/1920/678/878546678-07f2b57231cd18fb8d074880be2d787f.jpg" class="d-block w-100" alt="..." style="object-fit: contain; opacity: 0.6;">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>PeeceMaker</h2>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- products -->
        <section id="products" class="mt-5 pt-5">


            <div class="container pt-5 mt-5 d-flex justify-content-center" data-aos="flip-up">
                <div class="d-flex flex-row flex-sm-wrap justify-content-around">


                    <?php
                    $conn = new PDO("mysql:host=localhost;dbname=finalproject", 'root', '');
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM products");
                    $stmt->execute();
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    // print_r($products);

                    foreach ($products as $val) {
                        $id = $val['id'] ?>
                        <div class="d-flex justify-content-center mb-3">
                            <div class="card" style="max-width: 18rem;">
                                <img class="card-img-top h-75" src="./assets/images/<?= $val['img'] ?> " alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $val['name'] ?></h5>
                                    <p class="card-text"> <?= $val['price'] ?> ლარი</p>
                                    <?php
                                    if (isset($_SESSION['user']) && $_SESSION['user'] != []) {
                                    ?>
                                        <a href="addorder.php?id=<?= $val['id'] ?>" class="btn btn-primary">ყიდვა</a>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>



        </section>

        <!-- contact -->
        <section id="contact">
            <div class="container contact-form">
                <div class="contact-image">
                    <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
                </div>
                <form action="mailsend.php" method="post" data-aos="zoom-in-up">
                    <h3>დაგვიკავშირდი</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="txtName" class="form-control" placeholder="სახელი *" value="" />
                            </div>
                            <div class="form-group mt-1">
                                <input type="text" name="txtEmail" class="form-control" placeholder="ფოსტა *" value="" />
                            </div>
                            <div class="form-group mt-1">
                                <input type="text" name="txtPhone" class="form-control" placeholder="ტელეფონი *" value="" />
                            </div>
                            <div class="form-group mt-1">
                                <input type="submit" name="btnSubmit" class="btnContact" value="გაგზავნა" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea name="txtMsg" class="form-control" placeholder="წერილი *" style="width: 100%; height: 150px;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</main>

<?php
include 'footer.php';
?>