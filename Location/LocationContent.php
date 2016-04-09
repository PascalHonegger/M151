<div id="content" class="Location-Div">
    <form onsubmit="createLocation(); return false;" id="createLocationForm">
        <label class="LocationLabel" for="name"> Name</label><br>
        <input type="text" id="name" name="name" class="RegisterInput" required/><br>
        <label class="LocationLabel" for="description"> Beschreibung</label><br>
        <input type="text" id="description" name="description" class="RegisterInput" required/><br>
        <label class="LocationLabel" for="position"> Position</label><br>
        <input type="text" name="position" id="position" class="RegisterInput" required/><br>
        <label class="LocationLabel" for="userfile">File<br></label>
        <input type="file" name="userfile[]" id="userfile" class="LocationInput"/><br>

        <button class="LocationButton" id="submit" type="submit">Absenden</button>
    </form>
</div>