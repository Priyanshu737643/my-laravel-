@php
<pre>
    print_r($errors->all())
</pre>
@endphp

<form action="/adduser" method="post">
    @csrf
    <label>Name:</label>
    <input type="text" name="username"><br>
    <label>Email:</label>
    <input type="email" name="useremail"><br>
    <label>Age:</label>
    <input type="number" name="userage"><br>
    <label>City:</label>
    <select name="city"><br>
    <option value="">--Select City--</option>
    <option value="Delhi">Delhi</option>
    <option value="Mumbai">Mumbai</option>
    <option value="Chandigarh">Chandigarh</option>
    <option value="Banglore">Banglore</option>
    </select><br>
    <button type="submit">Submit</button>
</form>