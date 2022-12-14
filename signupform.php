<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>

<body>
    <section class="container forms">

        <div class="form signup">
            <div class="form-content">
                <header>Signup</header>
                <form action="#">
                    <div class="field input-field">
                        <input type="name" placeholder="Name" class="input">
                    </div>

                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="password">
                    </div>

                    <div class="field input-field">
                        <input type="number" placeholder="Number" class="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field button-field">
                        <button>Signup</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Already have an account? <a href="login.php" class="link login-link">Login</a></span>
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
</body>

</html>