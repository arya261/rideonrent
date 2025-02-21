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
            <h2>Checkout List</h2>
            <a class="add-a" href="<?=base_url()?>checkout/add/"><button style="height:35px; font-weight:600" class="add-but"> + NEW CHECKOUT</button></a>
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
                        <div class="dropdown">
                            <button class="dropdown-button" id="dropdownButton<?=$c->checkout_id?>">More</button>
                            <div class="dropdown-menu" id="dropdownMenu<?=$c->checkout_id?>">
                                <a href="#" class="dropdown-item" onclick="edit(<?=$c->checkout_id?>)">Edit</a>
                                <a href="#" class="dropdown-item" onclick="delete_item(<?=$c->checkout_id?>)">Delete</a>
                                <?php if ($c->checkin_id == '') { ?>
                                    <a href="#" class="dropdown-item" onclick="checkin(<?=$c->checkout_id?>)">Checkin</a>
                                <?php } ?>
                            </div>
                        </div>
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
   <script>
        document.querySelectorAll('.dropdown-button').forEach(button => {
            button.addEventListener('click', function(event) {
                var dropdownId = this.id.replace("dropdownButton", "dropdownMenu");
                var dropdownMenu = document.getElementById(dropdownId);
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== dropdownMenu) {
                        menu.style.display = 'none'; 
                    }
                });
            
                dropdownMenu.style.display = (dropdownMenu.style.display === "block") ? "none" : "block";
            });
        });
        window.addEventListener('click', function(event) {
            if (!event.target.matches('.dropdown-button')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.style.display = 'none';
                });
            }
        });
    </script>
</body>
</html>
