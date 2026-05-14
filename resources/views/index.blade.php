<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>

<h2>Student Records</h2>

<a href="/students/create">Add Student</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Action</th>
    </tr>

    @foreach($students as $student)

    <tr>

        <td>{{ $student->id }}</td>

        <td>{{ $student->name }}</td>

        <td>{{ $student->email }}</td>

        <td>{{ $student->age }}</td>

        <td>

            <a href="/students/edit/{{ $student->id }}">
                Edit
            </a>

            |

            <a href="/students/delete/{{ $student->id }}">
                Delete
            </a>

        </td>

    </tr>

    @endforeach

</table>

</body>
</html>