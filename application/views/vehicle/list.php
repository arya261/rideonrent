<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle List</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/main.css">
</head>
<body>

<div class="main-container">
    <?php $this->load->view("common/sidebar");?>
    <div class="right-container">
        <div class="header-class">
            <h2>Vehicle List</h2>
            <button class="add-but"><a class="add-a" href="<?=base_url()?>vehicle/add/"> + NEW VEHICLE</a></button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Make/Model</th>
                    <th>License Plate</th>
                    <th>Registration Number</th>
                    <th>Daily Charge</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php $sl_no=1; foreach($vehicles as $v){?>
                <tr>
                    <td><?=$sl_no?></td>
                    <td><?=$v->make." ". $v->model?></td>
                    <td><?=$v->license_plate?></td>
                    <td><?=$v->registration_number?></td>
                    <td><?=$v->daily_charge?></td>
                    <td><?=$v->status?></td>
                    <td>
                        <button class="edit-btn" onclick="edit(<?=$v->vehicle_id?>)">Edit</button>
                        <button class="delete-btn" onclick="delete_item(<?=$v->vehicle_id?>)">Delete</button>
                    </td>
                </tr>
                <?php $sl_no ++;}?>
            
                <!-- More rows as needed -->
            </tbody>
        </table>
    </div>
    </div>
    <script>
        function edit(vehicle_id){
            window.location.href = "<?=base_url()?>/vehicle/edit/" + vehicle_id;   
        }
         function delete_item(vehicle_id){
            window.location.href="<?=base_url()?>vehicle/delete/" +vehicle_id;
         }
    </script>
</body>
</html>
