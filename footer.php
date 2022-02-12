<footer>
    <div class="container-fluid text-white p-3" style="background-color:#2b2d42">
        <div class="row row-md-cols-3">
            <div class="col"></div>
            <div class="col d-flex align-items-center justify-content-center">
                <span>© Copyright 2022 | Design By: Jaba Khizanishvili</span>
            </div>
            <div class="col">
                <div class="btn-group">
                    <button type="button" class="dropdown-toggle p-1" data-bs-toggle="dropdown">
                        <span style="font-size:12px"> <?= $language[$lang]['choose'] ?> </span>

                    </button>
                    <ul class="dropdown-menu" style="min-width:0">
                        <li><a class="dropdown-item" href="http://localhost/jaba/FINALPROJECT/?lang=geo"><img src="./assets/images/geo.png" style="width: 40px" alt="a"></a></li>
                        <li><a class="dropdown-item" href="http://localhost/jaba/FINALPROJECT?lang=en"><img src="./assets/images/en.png" style="width: 40px" alt="a"></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <?php

    if (isset($_SESSION['successorder']) && $_SESSION['successorder'] == true) {
        $_SESSION['successorder'] = false;
    ?>

        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'succsess',
                    title: 'წარმატებით დაემატა პროდუქტი!',
                    text: `თქვენ წარმატებით შეიძინეთ ბილეთი!`,
                })
            })
        </script>

    <?php
    }

    if (isset($_SESSION['emailsend']) && $_SESSION['emailsend'] == true && isset($_GET['mailsuccsess'])) {
        $_SESSION['emailsend'] == false;
        unset($_SESSION['emailsend']);
    ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'succsess',
                    title: 'წერილი წარმატებით გაიგზავნა!',
                    text: `ადმინისტრაცია დაგიკავშირდებათ უახლოეს მომავალში!`,
                })
            })
        </script>

    <?php
    }



    if (isset($_SESSION['loginback']) && $_SESSION['loginback'] == true && isset($_GET['succsess'])) {
        $_SESSION['loginback'] = false;
    ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'succsess',
                    title: 'ავტორიზაციის დასასრული',
                    text: `თქვენ წარმატებით გაიარეთ ავტორიზაცია!`,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            })
        </script>
    <?php
    } else if (isset($_GET['error']) && $_SESSION['loginback'] == false) { ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'ავტორიზაციის შეცდომა',
                    text: `ასეთი მომხმარებელი არ არსებობს!`,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            })
        </script>
    <?php
    }


    if (isset($_SESSION['back']) && $_SESSION['back'] == true) {
        $_SESSION['back'] = false;
    ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'succsess',
                    title: 'რეგისტრაციის დასასრული',
                    text: `წარმატებით გაიარეთ რეგისტრაცია`,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            })
        </script>


    <?php
    } else if (isset($_GET['errors']) && $_SESSION['back'] != true) {    ?>

        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'რეგისტრაციის შეცდომა',
                    text: `შეცდომა`,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            })
        </script>



    <?php
    }
    ?>
</footer>
<script src="main.js"></script>
<script>
    $(window).on("scroll", function() {
        if (scrollY > 500) {
            $(".uparrow").show(500);
        } else $(".uparrow").hide(500);
    })
    $('.uparrow').click(() => {
        $("html, body").animate({
            scrollTop: 0
        }, 100);
    })
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
    });
</script>

</body>

</html>