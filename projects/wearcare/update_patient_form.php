<?php
//one single echo statement to include the entire patient update form
//this contains a hidden input field so that we know which patient to update. Very sneaky
echo '
<form action="update_patient.php" method="POST">
<input type="hidden" name="patient_id" value="'.$patient_id.'">
<label for="doctor">
<select name="doctor">
    <option value="Dr Solo" '.$solo.'>Dr Solo</option>
    <option value="Dr Kenobi" '.$kenobi.'>Dr Kenobi</option>
    <option value="Dr Fett" '.$fett.'>Dr Fett</option>
</select>
<input type="submit" value="Update">
</form>';
?>