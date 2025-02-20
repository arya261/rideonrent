<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout List</title>
    
        </div>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/main.css">
</head>
<body>
    <div class="main-container" style="">
    <?php $this->load->view("common/sidebar");?>
        <div class="right-container">
        <div class="header-class">
            <h2>CHECKOUT LIST</h2>
            <button class="add-but"><a class="add-a" href="<?=base_url()?>checkout/add/"> + NEW CHECKOUT</a></button>
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
                    <th>Odometer Out</th>
                    <th>Fuel Out</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sno=1;
                 foreach($checkout as $c){
                    ?>
                <tr>
                    <td><?=$sno?></td>
                    <td><?=$c->customer_name?></td>
                    <td><?=$c->make." ".$c->model?></td>
                    <td><?=$c->license_plate?></td>
                    <td><?=$c->checkout_date?></td>
                    <td><?=$c->expected_checkin_date?></td>
                    <td><?=$c->ordometer_out?></td>
                    <td><?=$c->fuel_out?></td>
                    <td><?=$c->amount?></td>
                    <td>
                        <button class="edit-btn" onclick="edit(<?=$c->checkout_id?>)">Edit</button>
                        <button class="delete-btn" onclick="delete_item(<?=$c->checkout_id?>)">Delete</button>
                        <?php if($c->checkin_id == ''){?>
                        <button class="checkin-btn" onclick="checkin(<?=$c->checkout_id?>)">Checkin</button>
                        <?php }?>
                    </td>
                </tr>
                <?php $sno++; } ?>
            </tbody>
        </table>
    </div>
    </div>
    <script>
        function edit(vehicle_id){
            window.location.href="<?=base_url()?>checkout/edit/" +vehicle_id;
        }
        function delete_item(checkout_id){
            window.location.href="<?=base_url()?>checkout/delete/"  +checkout_id;
        }
        function checkin(checkout_id){
            window.location.href="<?=base_url()?>checkin/add/" +checkout_id;
        }
    </script>
</body>
</html>
