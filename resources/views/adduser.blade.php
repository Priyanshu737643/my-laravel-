<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
<h1>Add User</h1>
<form action="/adduser" method="post">
    @csrf

    <label>Name:</label>
    <input type="text" name="username" value="{{ old('username') }}"><br>
    <span class="text-danger">@error('username') {{ $message }} @enderror</span><br>

    <label>Email:</label>
    <input type="text" name="useremail" value="{{ old('useremail') }}"><br>
    <span class="text-danger">@error('useremail') {{ $message }} @enderror</span><br>

    <label>Age:</label>
    <input type="text" name="userage" value="{{ old('userage') }}"><br>
    <span class="text-danger">@error('userage') {{ $message }} @enderror</span><br>

    <label>City:</label>
    <select name="city">
        <option value="">--Select City--</option>
        <option value="Delhi">Delhi</option>
        <option value="Mumbai">Mumbai</option>
        <option value="Chandigarh">Chandigarh</option>
        <option value="Kolkata">Kolkata</option>
    </select><br>
    <span class="text-danger">@error('city') {{ $message }} @enderror</span><br>

    <button type="submit">Submit</button>
</form>