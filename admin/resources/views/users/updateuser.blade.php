<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    
</head>
<body>

    <h2>Update User</h2>

    <div class="form-wrapper">
        <form action="{{ route('updateu_post.{id}', $data->id) }}" method="POST" enctype="multipart/form-data" id="login1">
            @csrf
        
            <label>User ID:
                <input type="text" name="user_id" value="{{$data->id}}" required>
            </label>

            <label>User Full Name:
                <input type="text" name="user_name" value="{{$data->fullname}}" required>
            </label>

            <label>Email:
                <input type="text" name="email" value="{{$data->email}}" required>
            </label>

            <label>Password:
                <input type="text" name="password" value="{{$data->password}}" required>
            </label>

            <label>Is_Verified:
                <input type="number" name="is_verified" value="{{$data->is_verified}}" required>
            </label>

            
            <input type="submit" value="Update User" id="sub">
        </form>
    </div>

</body>

<style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            margin-top: 40px;
            font-size: 32px;
            text-align: center;
        }

        .form-wrapper {
            margin-top: 30px;
            width: 500px;
            background: rgba(90, 111, 2, 0.1);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            text-align: left;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            padding: 8px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 6px;
            width: 100%;
        }

        #sub {
            background-color: #191970;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 10px;
        }

        #sub:hover {
            background-color: #00008b;
        }
    </style>
</html>

