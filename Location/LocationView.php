<div id="content" class="Location-Div" xmlns="http://www.w3.org/1999/html">
    <form action="../Location/LocationInput.php" method="POST" enctype="multipart/form-data">
        <label class="LocationLabel" for="name"> Name</label><br><input type="text" id="name" name="name" class="RegisterInput"/><br>
        <label class="LocationLabel" for="description"> Beschreibung</label><br><input type="text" id="description" name="description" class="RegisterInput"/><br>
        <label class="LocationLabel" for="position"> Position</label> <br> <input type="text" name="position" id="position" class="RegisterInput"/><br>
        <label class="LocationLabel" for="userfile[]">File <br> </label><input type="file" name="userfile[]" id="userfile[]" class="LocationInput"/><br>
        <button class="LocationButton" onclick="createLocation()" >Absenden</button>
    </form>
</div>