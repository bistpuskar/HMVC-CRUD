<?php
echo validation_errors('<p style="color:red;">','</p>'); 
echo form_open('user/submit');

echo "Name";
echo form_input('name',$name);

echo "</br>";

echo "Address";
echo form_input('address',$address);

echo "</br>";

echo "Email";
echo form_input('email',$email);
echo "</br>";

echo "Phone";
echo form_input('phone',$phone);
echo "</br>";

echo form_submit('submit','Submit');

if(isset($update_id)){
	echo form_hidden('update_id',$update_id);
}
echo form_close();
 ?>