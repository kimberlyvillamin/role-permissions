<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #e6f0ff; /* Light blue background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
            border: 2px solid #cc0000; /* Red border */
        }
        h2 {
            margin-bottom: 15px;
            color: #cc0000; /* Red heading */
        }
        .info {
            margin-bottom: 10px;
            font-size: 14px;
            color: #003366; /* Dark blue text */
        }
        strong {
            display: block;
            color: #cc0000; /* Red strong text */
        }
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 12px;
            background: #003366; /* Dark blue button */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        a:hover {
            background: #cc0000; /* Red hover effect */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Details</h2>
        <div class="info"><strong>ID:</strong> {{ $user->id }}</div>
        <div class="info"><strong>Name:</strong> {{ $user->name }}</div>
        <div class="info"><strong>Email:</strong> {{ $user->email }}</div>
        <div class="info"><strong>Role:</strong> {{ $user->role }}</div>
        <a href="{{ route('users.index') }}">Back</a>
    </div>
</body>
</html>
