<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h2>Sign Up for Account</h2>
    <form action="/register" method="POST">
        @csrf
        <div style="background-color:green;">
            @if(Session::get('success'))
                <div style="color:black; margin: 1rem; ">
                    {{Session::get('success')}}
                </div>
            @endif

            @if(Session::get('Fail'))
                <div style="color: red;">
                    {{Session::get('Fail')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email">

        </div>



        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                placeholder="Password">
        </div>
        <div class="form-group">
            <label for="radiobutton"> Account Type:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="account_type" id="inlineRadio1" value="Invidual">
                <label class="form-check-label" for="inlineRadio1">Invidual</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="account_type" id="inlineRadio2" value="Business">
                <label class="form-check-label" for="inlineRadio2">Business</label>
            </div>

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</body>

</html>
