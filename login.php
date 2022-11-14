<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


    <!-- ========== Css add here  ============= -->
    <link rel="stylesheet" href="login.css">

    <title>Document</title>
</head>

<body>

    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form action="#" id="form">
                    <div class="field input-field">
                        <input type="number" placeholder="Number" id="num" class="input">
                    </div>

                    <div class="field button-field">
                        <!-- <button>Login</button> -->
                        <input type="submit" value="Get Otp">

                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="signupform.php" class="link signup-link">Signup</a></span>
                </div>
            </div>

            <div class="line"></div>

            <div class="media-options">
                <a href="#" class="field facebook">
                    <i class='bx bxl-facebook facebook-icon'></i>
                    <span>Login with Facebook</span>
                </a>
            </div>

            <div class="media-options">
                <a href="#" class="field google">
                    <img src="images/google.png" alt="" class="google-img">
                    <span>Login with Google</span>
                </a>
            </div>

        </div>

    </section>

    <script src="include/function.js"></script>

    <script>
    function show_data(type) {
        document.getElementById('show').innerHTML = type;
        document.getElementsByClassName('show_message')[0].style.display = "block";
        setTimeout(() => {
            document.getElementsByClassName('show_message')[0].style.display = "none";
        }, "2000");
    }



    var a = document.getElementById('form');

    a.addEventListener('submit', function(e) {

        // auto submission of form
        e.preventDefault();

        var b = document.getElementById('num').value;

        if (validate_num(b)) {

            var FormData = {
                'num': b
            }

            jsondata = JSON.stringify(FormData);

            // fetch post request

            fetch('http://localhost/root/college_project/insert.php', {
                    method: 'POST',
                    body: jsondata,
                    headers: {
                        'Content-type': 'application/json',
                    }
                })
                .then((response) => response.json())
                // .then((data) => {
                //     console.log(data);
                // })
                .then((data) => {
                    console.log(data);

                    if (data.code == 4002) {
                        window.location.href = "verify_otp.php";
                    }

                });

        } else {
            show_data("Enter valid number");
        }
    });
    </script>

</body>

</html>