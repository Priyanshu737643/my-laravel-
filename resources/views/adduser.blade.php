<!-- 
<pre>
    @php
    print_r($errors->all())
    @endphp
</pre> 
-->




<form action="/adduser" method="post">
    @csrf
    <label>Name:</label>
    <input type="text" name="username"><br>
    <span class="text-danger">
        @error("username")
        {{$message}}
        @enderror
    </span>
    <br>

    <label>Email:</label>
    <input type="email" name="useremail"><br>
    <span class="text-danger">
        @error("useremail")
        {{$message}}
        @enderror
    </span>
    <br>

    <label>Age:</label>
    <input type="number" name="userage"><br>
    <span class="text-danger">
        @error("userage")
        {{$message}}
        @enderror
    </span>
    <br>

    <label>City:</label>
    <select name="city"><br>
    <option value="">--Select City--</option>
    <option value="Delhi">Delhi</option>
    <option value="Mumbai">Mumbai</option>
    <option value="Chandigarh">Chandigarh</option>
    <option value="Banglore">Banglore</option>
    </select><br>
    <span class="text-danger">
        @error("city")
        {{$message}}
        @enderror
    </span>
    <br>

    <button type="submit">Submit</button>
</form>