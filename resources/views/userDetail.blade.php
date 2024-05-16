<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        
        <div class="row">
            <div class="col">
                Name:
            </div>
            <div class="col">
                {{ $user->name }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Email:
            </div>
            <div class="col">
                {{ $user->email }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Account Type:
            </div>
            <div class="col">
                {{ $user->account_type }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Balance
            </div>
            <div class="col">
                {{ $user->balance }}
            </div>
        </div>
        <br>
        <br>
        <h3>Deposite Table</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach($deposites as $deposite)
              <tr>
                <th scope="row">1</th>
                <td>{{$deposite->amount}}</td>
                <td>{{$deposite->date}}</td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
          <br>
        <br>
        <h3>Withdrawl Table</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Fee</th>
              </tr>
            </thead>
            <tbody>
                @foreach($withdrawl as $withdraw)
              <tr>
                <th scope="row">1</th>
                <td>{{$withdraw->amount}}</td>
                <td>{{$withdraw->date}}</td>
                <td>{{$withdraw->fee}}</td>

              </tr>
              @endforeach
              
            </tbody>
          </table>

        <div>
            <a href="/deposite-form" class="btn btn-success">Deposit</a>
       </div>
       <br>
       <div>
        <a href="/withdraw-form" class="btn btn-success">Withdraw</a>
   </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>
