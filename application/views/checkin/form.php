<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/checkoutform.css">
    
</head>
<body>
    <?php
    $ordometer_out ='';
    $fuel_out ='';
    $checkout_date = '';
    $expected_checkin_date = '';
    $fixed_charge ='';
    $amount ='';
    $remark ='';
    $discount = '';
    // $mode = 'add';

    if($mode =='edit'){
        foreach($checkout as $c){
            $ordometer_out = $c->ordometer_out;
            $fuel_out = $c->fuel_out;
            $checkout_date = $c->checkout_date;
            $expected_checkin_date = $c->expected_checkin_date;
            $fixed_charge = $c->fixed_charge;
            $amount = $c->amount;
            $remark = $c->remark;
            $discount = $c->discount;
        }
      
    }
    ?>












    <form action="<?=base_url()?>/checkout/process" id="registration_form" method="post">
    <div style class="container">
        <!-- Left Section -->
        <div class="left">
            <h3>Select Vehicle</h3>
            <div class="form-group">
                <label for="vehicle">Vehicle:</label>
                <select id="vehicle" name="vehicle_id">
                    <option <?php if($vehicle=='1') echo "selected";?> value="1">Vehicle 1</option>
                    <option <?php if($vehicle=='2') echo "selected";?> value="2">Vehicle 2</option>
                    <option <?php if($vehicle=='3') echo "selected";?> value="3">Vehicle 3</option>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="odometer">Odometer In:</label>
                    <input type="text" id="odometer" name="ordometer_in" value="<?=$ordometer_in?>" placeholder="Enter Odometer Reading">
                </div>

                <div class="form-group">
                    <label for="fuel">Fuel In:</label>
                    <input type="text" id="fuel" name="	fuel_in" value="<?=$fuel_in?>" placeholder="Enter Fuel Reading">
                </div>
            </div>
        </div>

        <div class="line"></div>

        <!-- Right Section -->
        <div class="right">
        <div class="form-group">
                    <label for="duration">Select customer</label>
                    <input type="text" id="duration" name="customer_name" placeholder="select customer">
                </div>
            <div class="form-row">
               
                <div class="form-group">
                    <label for="startDate">From Date:</label>
                    <input type="date" id="startDate" name="checkout_date" value="<?=$checkout_date?>">
                </div>
                <div class="form-group">
                    <label for="startTime">From Time:</label>
                    <input type="time" id="startTime" name="from_datetime">
                </div>
            </div>
            <div class="form-row">
               
                <div class="form-group">
                    <label for="endDate">To Date:</label>
                    <input type="date" id="endDate" name="expected_checkin_date" value="<?=$expected_checkin_date?>">
                </div>
                <div class="form-group">
                    <label for="endTime">To Time:</label>
                    <input type="time" id="endTime" name="to_datetime">
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
                    <input type="text" id="duration" name="fixed_charge" value="<?=$fixed_charge?>">
                </div>
                <div class="form-group">
                    <label for="duration">Discount:</label>
                    <input type="text" id="duration" name="discount" value="<?=$discount?>">
                </div>
                <div class="form-group">
                    <label for="duration">Total Amount:</label>
                    <input type="text" id="duration" name="amount" value="<?=$amount?>" >
                </div>
            </div>
            <div class="form-group">
                <label for="remark">Notes:</label>
                <textarea id="remark" name="notes" value="<?=$notes?>" rows="4" placeholder="Enter any remarks"><?=$remark?></textarea>
            </div>

            <button type="submit" class="button">confirm checkout</button>
        </div>
    </div>
    </form>
</body>
</html>
