<div id="content">
    <form action="LocationInput.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="creator"/><br>
        <input type="text" name="name" /><br>
        <input type="text" name="description"/><br>
        <input type="text" name="position"/><br>
        <label>File: </label><input type="file" name="userfile[]" id="userfile[]" /><br>
        <input type="submit" />
    </form>
</div>