<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Jou L. Satulombon</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: white;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        h1 a {
            color: #333;
            text-decoration: none;
        }
        h1 a:hover {
            color: #666;
        }
        h2 {
            margin-bottom: 15px;
            color: #333;
        }
        hr {
            margin-bottom: 30px;
            border: none;
            border-top: 1px solid #ddd;
        }
        a {
            color: #0066cc;
            text-decoration: none;
            padding: 5px 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        button {
            padding: 8px 16px;
            background: #0066cc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #0052a3;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: Arial, sans-serif;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1><a href="{{ route('todos.index') }}">MarkJou's To-Do List</a></h1>
    <hr>
    @yield('content')
</body>
</html>