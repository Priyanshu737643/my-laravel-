@foreach($students as $student)
    <h3>Student Information</h3>
    <p>Student Name: {{ $student['name'] }}</p>
    <p>Student Id: {{ $student['id'] }}</p>
    <p>Course: {{ $student['course'] }}</p>
@endforeach
<a href="/">Home</a>
















<!-- <?php
foreach($students as $student){
    echo "Student Information<br>";
    echo "Student Name: " . $student['name'] . "<br>";
    echo "Student Id: " . $student['id'] . "<br>";
    echo "Course: " . $student['course'] . "<br><br>";
}
?> -->


