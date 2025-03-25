<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role & Permission Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #e6f0ff; /* Light blue background */
        }
        .container {
            width: 90%;
            margin: auto;
            background: white;
            padding: 20px;
            border: 2px solid #003366; /* Dark blue border */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #cc0000; /* Red heading */
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            margin: 5px 0;
            font-size: 14px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #003366; /* Dark blue border */
            text-align: left;
        }
        th {
            background: #003366; /* Dark blue header */
            color: white;
        }
        .btn-add {
            background: #cc0000; /* Red button */
            color: white;
        }
        .btn-view {
            background: #003366; /* Dark blue button */
            color: white;
        }
        .btn-edit {
            background: #ffcc00; /* Yellow button */
            color: black;
        }
        .btn-delete {
            background: #cc0000; /* Red button */
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Users List</h2>
        
        @if (session('success'))
            <p style="color: green; text-align: center;">{{ session('success') }}</p>
        @endif
        
        <a href="{{ route('users.create') }}" class="btn btn-add">+ Add User</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Permission</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->permission }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-view">View</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
