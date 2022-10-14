<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="#" id="form">
        <input type="number" name="" placeholder="enter your otp here" id="num">
        <input type="submit" value="Get Otp">
    </form>
    <script src="include/function.js"></script>


    <script>
    var form = document.getElementById('form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        var p = document.getElementById('num').value;


        if (validate_otp(p, 6)) {

            var FormData = {
                'ot': p
            }

            jsondata = JSON.stringify(FormData);

            fetch("http://localhost/root/college_project/validate_otp.php", {
                    method: 'POST',
                    body: jsondata,
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then((response) => response.json())
                .then((data) => {
                    // console.log(data);

                    if (data.code == 200) {
                        window.location.href = "index.html";
                    }

                });

        } else {
            alert("plese enter valid otp");
        }

    });
    </script>

</html>