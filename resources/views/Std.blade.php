std.blade.php----- <!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
</head>
<body>

    <h2>Student Registration Form</h2>

    <form action="{{ url('/students/store') }}" method="POST">

        @csrf

        <label>Name :</label>
        <input type="text" name="name" maxlength="20" required>
        <br><br>

        <label>Email :</label>
        <input type="email" name="email" required>
        <br><br>

        <label>Age :</label>
        <input type="number" name="age" required>
        <br><br>

        <input type="submit" value="Save Student">

    </form>

</body>
</html>