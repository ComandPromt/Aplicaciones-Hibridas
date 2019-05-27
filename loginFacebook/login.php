<?php
    session_start();

    if (isset($_POST['userID'])) {
        $_SESSION['userID'] = $_POST['userID'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['picture'] = $_POST['picture'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['accessToken'] = $_POST['accessToken'];

        exit("success");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facebook Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3" align="center">
                <img src="images/logo.png"><br><br>
                <form>
                    <input class="form-control" placeholder="Email..."><br>
                    <input class="form-control" placeholder="Password..."><br>
                    <input type="submit" value="Log In">
                    <input type="button" onclick="logIn()" value="Log In With Facebook">
                </form>
            </div>
        </div>
    </div>
    <script
            src="http://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script>
        var person = { userID: "", name: "", accessToken: "", picture: "", email: ""};

        function logIn() {
            FB.login(function (response) {
                if (response.status == "connected") {
                    person.userID = response.authResponse.userID;
                    person.accessToken = response.authResponse.accessToken;

                    FB.api('/me?fields=id,name,email,picture.type(large)', function (userData) {
                        person.name = userData.name;
                        person.email = userData.email;
                        person.picture = userData.picture.data.url;

                        $.ajax({
                           url: "login.php",
                           method: "POST",
                           data: person,
                           dataType: 'text',
                           success: function (serverResponse) {
                               console.log(person);
                               if (serverResponse == "success")
                                   window.location = "index.php";
                           }
                        });
                    });
                }
            }, {scope: 'public_profile, email'})
        }

        window.fbAsyncInit = function() {
            FB.init({
                appId            : 'xxxxxxxxxxxxxxxxxxxxx',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v2.11'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>
</html>
