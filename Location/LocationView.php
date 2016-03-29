<div id="content" class="Location-Div" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
     xmlns="http://www.w3.org/1999/html">
    <form action="LocationInput.php" method="POST" enctype="multipart/form-data">
        <label class="LocationLabel"> Name <br> </label><input type="text" name="name" class="RegisterInput"/></label><br>
        <label class="LocationLabel"> Beschreibung <br> <input type="text" name="description" class="RegisterInput"/></label><br>
        <label class="LocationLabel"> Position <br> <input type="text" name="position" class="RegisterInput"/></label><br>
        <label class="LocationLabel"l>File <br> </label><input type="file" name="userfile[]" id="userfile[]" class="LocationInput"/></label><br>
        <input type="submit" class="LocationButton" />
    </form>
</div>