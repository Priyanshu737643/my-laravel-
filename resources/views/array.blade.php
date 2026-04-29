@foreach($students as $student)

    <div style="border:1px solid #ccc; padding:15px; margin-bottom:20px; border-radius:10px;">
        
        <h2>Student Details</h2>

        <!-- Original Data -->
        <p><strong>Name:</strong> {{ $student['name'] }}</p>
        <p><strong>ID:</strong> {{ $student['id'] }}</p>
        <p><strong>Course:</strong> {{ $student['course'] }}</p>

        <hr>

        <!-- array_change_key_case -->
        <h3>Uppercase Keys</h3>
        @php
            $upperCaseStudent = array_change_key_case($student, CASE_UPPER);
        @endphp
        <pre>{{ print_r($upperCaseStudent, true) }}</pre>

        <hr>

        <!-- array_keys -->
        <h3>Keys</h3>
        @foreach(array_keys($student) as $key)
            <span style="margin-right:10px;">{{ $key }}</span>
        @endforeach

        <hr>

        <!-- array_values -->
        <h3>Values</h3>
        @foreach(array_values($student) as $value)
            <span style="margin-right:10px;">{{ $value }}</span>
        @endforeach

        <hr>

        <!-- array_key_exists -->
        <h3>Check Key Exists</h3>
        @if(array_key_exists('name', $student))
            <p style="color:green;">✔ Name exists: {{ $student['name'] }}</p>
        @else
            <p style="color:red;">✘ Name not found</p>
        @endif

        <hr>

        <!-- in_array -->
        <h3>Check Value Exists</h3>
        @if(in_array('BTECH', $student))
            <p style="color:blue;">🎓 BTECH student found: {{ $student['name'] }}</p>
        @else
            <p>Not a BTECH student</p>
        @endif

    </div>

@endforeach