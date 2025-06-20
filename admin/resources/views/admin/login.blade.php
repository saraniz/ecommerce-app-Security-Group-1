<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Login</title>
    </head>
    <body id="login">
        <h2>Admin Login </h2>
        <div class="mk">
        <form action="{{route('admin.auth')}}" method="post" enctye="multipart/form-data" id="login1">
            @csrf
            <label>User Name :
                <input type="text" name="username" placeholder="Enter User name here" required="">
                <br>
                <label>Password :    
                <input type="password" name="password" placeholder="Enter password here" required="">
                
                <br><!-- comment -->
                <input type="submit" value="Login" id="sub">
                
            
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
        </form>
        </div>
    </body>
    
    <style>
body {
    margin: 5px;
    padding-left: 300px;
    padding-right: 300px;
    padding-top: 150px;
    font-family: sans-serif;
    background: url() no-repeat;
    
}
 
form {
    margin: 10px;
    padding:100px;
    border: 2px solid #ddd;
    border-radius: 12px;
    background-color:green;
    background: rgba(90, 111, 2, 0.1);
}
 
h2 {
    float: left;
    font-size: 40px;
    margin-bottom: 50px;
    padding-left: 250px;
}
.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border-left: 5px solid #dc3545;
}
 
label {
    width: 100%;
    overflow: hidden;
    font-size: 20px;
    padding-left: 30px;
    margin: 8px 0;
    gap: 100px;
}
br{
    line-height: 30px;
}
.mk{
    margin: 100px;
}

input {
    border: none;
    outline: none;
    background: none;
    font-size: 18px;
    
    border-radius: 4px;
    border: 2px solid #ddd;
    line-height: 30px;
    line-break: 80px;
    margin-bottom: 20px;
}
 
#sub {
    width: 20%;
    padding-left: 8px;
    color: #ffffff;
    background: none #191970;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    cursor: pointer;
    margin: 12px 0;
}
    </style>
</html>
