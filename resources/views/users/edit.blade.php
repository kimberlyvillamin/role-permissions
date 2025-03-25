<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .permissions {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
        }
        .permissions label {
            display: flex;
            align-items: center;
            width: 50%;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form action="{{ route('users.store') }}" method="POST" onsubmit="handleFormSubmit(event)">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="role">Role:</label>
            <select id="role" name="role" required onchange="togglePermissions()">
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <option value="editor">Editor</option>
            </select>

            <div class="permissions">
                <label><input type="checkbox" name="permission[]" value="edit_post"> Edit Post</label>
                <label><input type="checkbox" name="permission[]" value="create_post"> Create Post</label>
                <label><input type="checkbox" name="permission[]" value="publish_post"> Publish Post</label>
                <label><input type="checkbox" name="permission[]" value="delete_post"> Delete Post</label>
            </div>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
