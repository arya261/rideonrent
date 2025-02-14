<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkin List</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/main.css">
</head>
<body>
<div class="main-container" style="">
    <?php $this->load->view("common/sidebar");?>
    <div class="right-container">
    <div class="header-class">
            <h2>Checkin List</h2>
        </div>
        
        <table class="checkout-table">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Customer Name</th>
                    <th> Vehicle Name</th>
                    <th>license Plate</th>
                    <th>Checkout Date</th>
                    <th>Checkin Date</th>
                    <th>Odometer In</th>
                    <th>Fuel In</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sno=1;
                 foreach($checkin as $c){
                    ?>
                <tr>
                    <td><?=$sno?></td>
                    <td><?=$c->customer_name?></td>
                    <td><?=$c->make." ".$c->model?></td>
                    <td><?=$c->license_plate?></td>
                    <td><?=$c->checkout_date?></td>
                    <td><?=$c->checkin_date?></td>
                    <td><?=$c->ordometer_in?></td>
                    <td><?=$c->fuel_in?></td>
                    <td><?=$c->amount?></td>
                    <td>
                        <button class="edit-btn" onclick="edit(<?=$c->checkin_id?>)">Edit</button>
                        <button class="delete-btn" onclick="delete_item(<?=$c->checkin_id?>)">Delete</button>
                    </td>
                </tr>
                <?php $sno++; } ?>
            </tbody>
        </table>
    </div>
    </div>
    <script>
        function edit(checkin_id){
            window.location.href="<?=base_url()?>checkin/edit/" +checkin_id;
        }
        function delete_item(checkin_id){
            window.location.href="<?=base_url()?>checkin/delete/"  +checkin_id;
        }
    </script>
</body>
</html>
