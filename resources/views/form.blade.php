<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            background-color: rgb(82, 109, 125);
            color: #fff;
            padding: 20px;
            text-align: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999; 
        }


        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="file"] {
            padding: 5px;
        }

        .alert {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 3px;
        }

        .error {
            color: #f00;
            font-size: 14px;
            margin-top: 5px;
        }

        button[type="submit"] {
            background-color: rgb(82, 109, 125);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/form" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="username">Username</label>
        <input type="text" name="username" value="{{ old('username') }}">
        @error('username')
            <p>{{ $message }}</p>
        @enderror

        <label for="password">Password</label>
        <input type="password" name="password" value="{{ old('password') }}">
        @error('password')
            <p>{{ $message }}</p>
        @enderror

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <label for="NIK">NIK (National Identity Number)</label>
        <input type="text" name="NIK" value="{{ old('NIK') }}">
        @error('NIK')
            <p>{{ $message }}</p>
        @enderror

        <label for="phonenumber">Phone Number</label>
        <input type="text" name="phonenumber" value="{{ old('phonenumber') }}">
        @error('phonenumber')
            <p>{{ $message }}</p>
        @enderror

        <label for="image">Image (Max 2MB, .jpeg/.jpg/.png)</label>
        <input type="file" name="image">
        @error('image')
            <p>{{ $message }}</p>
        @enderror

        <label for="file">File (PDF, DOC, DOCX)</label>
        <input type="file" name="file">
        @error('file')
            <p>{{ $message }}</p>
        @enderror

        <label for="video">Video (MP4, AVI)</label>
        <input type="file" name="video">
        @error('video')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Submit</button>
    </form>
    @if (session('success'))
    @include('success')
    @endif
</body>
</html>