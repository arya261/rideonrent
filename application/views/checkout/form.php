<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/checkoutform.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body>
    <?php
    $checkout_id = '';
    $ordometer_out ='';
    $fuel_out ='';
    $checkout_date = '';
    $checkout_time = date('H:i:s');
    $expected_checkin_date = '';
    $expected_checkin_time = date('H:i:s');
    $fixed_charge ='';
    $amount ='';
    $remark ='';
    $discount = '';
    $vehicle_id = '';
    $customer_id = '';

    if($mode =='edit'){
        foreach($checkout as $c){
            $ordometer_out = $c->ordometer_out;
            $fuel_out = $c->fuel_out;
            $checkout_date = date("Y-m-d", strtotime($c->checkout_date));
            $checkout_time = date("H:i", strtotime($c->checkout_date));
            $expected_checkin_date = date("Y-m-d", strtotime($c->expected_checkin_date));
            $expected_checkin_time = date("H:i", strtotime($c->expected_checkin_date));
            $fixed_charge = $c->fixed_charge;
            $amount = $c->amount;
            $remark = $c->remark;
            $discount = $c->discount;
            $checkout_id = $c->checkout_id;
            $vehicle_id = $c->vehicle_id;
            $customer_id = $c->customer_id;
        }
    }
    ?>











    <form action="<?=base_url()?>/checkout/process" id="registration_form" method="post">
        
    <div class="container">
        <!-- Left Section -->
        <div class="left">
        <input type="hidden" name="mode" value="<?=$mode?>" id="">
        <input type="hidden" name="checkout_id" value="<?=$checkout_id?>" id="">
        
            <h3>Select Vehicle</h3>
            <div class="form-group">
                <label for="vehicle">Vehicle:</label>
                <select id="vehicle" name="vehicle_id">
                    <?php foreach($vehicle as $v) { ?>
                        <option <?php if($v->vehicle_id == $vehicle_id) echo "selected"?> value="<?=$v->vehicle_id?>"><?=$v->vehicle_name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="odometer">Odometer Reading:</label>
                    <input type="text" id="odometer" name="ordometer_out" value="<?=$ordometer_out?>" placeholder="Enter Odometer Reading">
                </div>

                <div class="form-group">
                    <label for="fuel">Fuel Reading:</label>
                    <input type="text" id="fuel" name="fuel_out" value="<?=$fuel_out?>" placeholder="Enter Fuel Reading">
                </div>
            </div>
        </div>

        <div class="line"></div>

        <!-- Right Section -->
        <div class="right">
        <div class="form-group">
                    <label for="duration">Select customer</label>
                    <select name="customer_id" id="">
                        <?php foreach($customer as $c){?>
                            <option <?php if($c->customer_id == $customer_id) echo "selected"?> value="<?=$c->customer_id?>"><?=$c->customer_name?></option>
                            <?php }?>
                    </select>
                </div>
            <div class="form-row">
               
                <div class="form-group">
                    <label for="startDate">From Date:</label>
                    <input type="date" id="startDate" name="checkout_date" value="<?=$checkout_date?>">
                </div>
                <div class="form-group">
                    <label for="startTime">From Time:</label>
                    <input type="time" id="startTime" name="from_datetime" value="<?=$checkout_time?>">
                </div>
            </div>
            <div class="form-row">
               
                <div class="form-group">
                    <label for="endDate">To Date:</label>
                    <input type="date" class="datepicker" id="endDate" name="expected_checkin_date" value="<?=$expected_checkin_date?>">
                </div>
                <div class="form-group">
                    <label for="endTime">To Time:</label>
                    <input type="time" id="endTime" name="to_datetime" value="<?=$expected_checkin_time?>">
                </div>
            </div>
            <!-- <div class="form-row">

                <div class="form-group">
                    <label for="duration">Duration:</label>
                    <input type="text" id="duration" name="duration" placeholder="Enter Duration">
                </div>
            </div> -->
            <div class="form-row">
                <div class="form-group">
                    <label for="duration">Fixed Charge:</label>
                    <input onin type="text" id="fixed_charge" name="fixed_charge" value="<?=$fixed_charge?>" oninput="calculateamount()">
                </div>
                <div class="form-group">
                    <label for="duration">Discount:</label>
                    <input type="text" id="discount" name="discount" value="<?=$discount?>" oninput="calculateamount()">
                </div>
                <div class="form-group">
                    <label for="duration">Total Amount:</label>
                    <input readonly type="text" id="amount" name="amount" value="<?=$amount?>" >
                </div>
            </div>
            <div class="form-group">
                <label for="remark">Remark:</label>
                <textarea id="remark" name="remark" value="<?=$remark?>" rows="4" placeholder="Enter any remarks"><?=$remark?></textarea>
            </div>

            <button type="submit" class="button">confirm checkout</button>
        </div>
    </div>
    </form>
    <script>
        function calculateamount() {
              const fixedcharges = parseFloat(document.getElementById('fixed_charge').value) || 0;
              const discount = parseFloat(document.getElementById('discount').value) || 0;
                if (fixedcharges < 0 ) {
                    swal('Invalid fixed charge')
                    document.getElementById('fixed_charge').value = '0';
                }
                if (discount < 0 ) {
                    swal('Invalid discount')
                    document.getElementById('discount').value = '0';
                }
              const amount = fixedcharges - discount;
              document.getElementById('amount').value = amount.toFixed(2,amount);               
            }
    </script>
</body>
</html>
