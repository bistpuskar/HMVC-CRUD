<h1> MY Task </h1>
<?php 
echo anchor('user/create','<p>Create New User</p>');
foreach ($query->result() as $key => $row) {
    $edit_url = base_url().'user/create/'.$row->id;
   echo "<h2>".$row->address."&nbsp; &nbsp;<a href='".$edit_url."'>Edit</a></h2>";
}
 ?>