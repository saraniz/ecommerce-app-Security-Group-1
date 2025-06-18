<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    
</head>
<body>

    <h2>Update Order</h2>

    <div class="form-wrapper">
        <form action="{{ route('updateo_post.{id}', $data->id) }}" method="POST" enctype="multipart/form-data" id="login1">
            @csrf
        
            <label>Order ID:
                <input type="text" name="order_id" value="{{$data->id}}" required>
            </label>

            <label>User ID:
                <input type="text" name="user_id" value="{{$data->user_id}}" required>
            </label>

            <label>Total Amount:
                <input type="number" name="total_amount" value="{{$data->total_amount}}" required>
            </label>

            <label>Status:
                <input type="text" name="status" value="{{$data->status}}" required>
            </label>

            <label>Payment Method:
                <input type="text" name="payment_method" value="{{$data->payment_method}}" required>
            </label>

            <label>Shipping Address:
                <input type="text" name="shipping_address" value="{{$data->shipping_address}}" required>
            </label>

        
            <input type="submit" value="Update Order" id="sub">
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

