<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee List</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/emplist.css">
</head>
<body>
  <div class="container">
    <h2>Employee List</h2>
    <table>
      <thead>
        <tr>
          <th>s_no</th>
          <th>Employee Name</th>
          <th>Department</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $s_no=1; foreach($employees as $e){?>
        <tr>
          <td><?=$s_no?></td>
          <td><?=$e->emp_name?></td>
          <td><?=$e->department?></td>
          <td><?=$e->email?></td>
          <td><?=$e->phone_number?></td>
          <td>
            <button class="edit-btn" onclick="edit(<?=$e->emp_id?>)">Edit</button>
            <button class="delete-btn"  onclick="delete_item(<?=$e->emp_id?>)">Delete</button>
          </td>
        </tr>
        <?php $s_no ++;}?>
      </tbody>
    </table>
  </div>
  <script>
    function edit(emp_id){
      window.location.href ="<?=base_url()?>employee/edit/" + emp_id;
    }
    // funtion delete_item(emp_id){
    //   // window.location.href="<?//=base_url()?>employee/delete" + emp_id;
    // }
  </script>
</body>
</html>
