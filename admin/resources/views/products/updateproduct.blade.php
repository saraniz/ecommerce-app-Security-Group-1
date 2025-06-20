<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    
</head>
<body>

    <h2>Update Product</h2>

    <div class="form-wrapper">
        <form action="{{ route('updatep_post.{id}', $data->id) }}" method="POST" enctype="multipart/form-data" id="login1">
            @csrf

            <label>Product ID:
                <input type="text" name="product_id" value="{{$data->id}}" required>
            </label>

            <label>Product Name:
                <input type="text" name="product_name" value="{{$data->name}}" required>
            </label>

            <label>Description:
                <input type="text" name="description" value="{{$data->description}}" required>
            </label>

            <label>Price:
                <input type="number" name="price" value="{{$data->price}}" required>
            </label>

            <label>Quantity:
                <input type="number" name="quantity" value="{{$data->quantity}}" required>
            </label>

            <label>Status:
                <input type="text" name="status" value="{{$data->status}}" required>
            </label>

            <label>Image:
              <img src="{{ asset('storage/' . $data->image) }}" alt="Post Image" width="150">
                <input type="file" name="image" value="{{$data->image}}">
            </label>

            <label>Category ID:
                <input type="text" name="category_id" value="{{$data->category_id}}" required>
            </label>

            <input type="submit" value="Update Product" id="sub">
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

