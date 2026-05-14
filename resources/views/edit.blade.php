<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form action="{{ url('/students/update/'.$student->id) }}" method="POST">

    @csrf

    <label>Name</label>

    <input type="text" 
           name="name"
           value="{{ $student->name }}">

    <br><br>

    <label>Email</label>

    <input type="email"
           name="email"
           value="{{ $student->email }}">

    <br><br>

    <label>Age</label>

    <input type="number"
           name="age"
           value="{{ $student->age }}">

    <br><br>

    <button type="submit">Update</button>

</form>

</body>
</html>