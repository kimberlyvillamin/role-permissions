<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        form {
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: 600;
            margin: 10px 0 5px;
        }
        input, select, button {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            transition: 0.3s;
        }
        button:hover {
            background-color: #2980b9;
        }
        .permissions {
            margin-top: 10px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            align-items: center;
        }
        .permissions label {
            display: flex;
            align-items: center;
            font-weight: normal;
            margin: 5px 0;
        }
        .permissions input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create User</h2>
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
                <label><input type="checkbox" name="permission[]" value="edit_post" class="permission-checkbox"> Edit Post</label>
                <label><input type="checkbox" name="permission[]" value="create_post" class="permission-checkbox"> Create Post</label>
                <label><input type="checkbox" name="permission[]" value="publish_post" class="permission-checkbox"> Publish Post</label>
                <label><input type="checkbox" name="permission[]" value="delete_post" class="permission-checkbox"> Delete Post</label>
            </div>


            <input type="hidden" id="hidden_permissions" name="permission">


            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>


            <button type="submit">Create User</button>
        </form>
    </div>


    <script>
        function togglePermissions() {
            let role = document.getElementById('role').value;
            let checkboxes = document.querySelectorAll('.permission-checkbox');
           
            if (role === 'admin') {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                    checkbox.disabled = false;
                });
            } else {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                    checkbox.disabled = false;
                });
            }
        }


        function handleFormSubmit(event) {
            let checkboxes = document.querySelectorAll('.permission-checkbox');
            let hiddenPermissions = document.getElementById('hidden_permissions');


            let selectedPermissions = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value)
                .join(",");


            hiddenPermissions.value = selectedPermissions;
        }


        window.onload = togglePermissions;
    </script>
</body>
</html>
