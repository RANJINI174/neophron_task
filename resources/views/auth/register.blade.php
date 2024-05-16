    @if($errors->any())
    <ul>
    {{!!implode('',$errors->all('<li>:message</li>'))!!}}
    </ul>
    @endif
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Customer Registration</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
             header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
            .container {
                max-width: 400px;
                margin: 50px auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            .form-group {
                margin-bottom: 15px;
            }
            .form-group label {
                display: block;
                font-weight: bold;
            }
            .form-group input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            .form-group button {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .form-group button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <header>
             <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
           <div class="container-fluid">
          <a  class="navbar-brand" href="{{ url('sports') }}">【ＮＥＯＰＨＲＯＮ】<h2></h2></a>
          <a  class="navbar-brand" href="{{ url('register') }}">register<h2></h2></a>


          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
               <span class="navbar-toggler-icon"></span>
             </button>



        </header>
    <div class="container">
        <h2>Customer Registration</h2>
        <form action="/store" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <button type="submit">signup</button>
                <p>Already have an account? <a href="{{url('login')}}"> sign in</a></p>
            </div>

        </form>
    </div>

    </body>
    </html>
