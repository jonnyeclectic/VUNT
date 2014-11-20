<select>
<?php
    foreach($myDropdown as $dd)
        echo "<option value='". $dd->name ."'>". $dd->name ."</option>";
?>
</select>