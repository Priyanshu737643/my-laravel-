<h1>Upload Files</h1>
<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="">
    <button type="submit">Upload Files</button>
</form>

