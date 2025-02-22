<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Registration Form | CodingLab</title>
   
</head>
<body>
  <?php
  $fullname ='';
  $phone_number = '';
  $email = '';
  $password = '';
  $department = '';
  $phone_numbe='';
  $salary = '';
  $state ='';
  $country = '';
  $district = '';
  $zip_code = '';
  $street = '';
  $gender = '';
  $salary_type = '';
  $adress_number = '';
  $address_id='';
  $login_id='';
  $emp_id = '';



  if($mode == 'edit'){
    foreach($employees as $e){
      $fullname = $e->emp_name;
      $phone_number = $e->phone_number;
      $email = $e->email;
      $password = $e->password;
      $department = $e->department;
      $phone_number =$e->phone_number;
      $salary = $e->salary;
      $state = $e->state;
      $country = $e->country;
      $district = $e->district;
      $zip_code = $e->zip_code;
      $street = $e->street;
      $gender = $e->gender;
      $salary_type = $e->salary_type;
      $adress_number = $e->adress_number;
      $address_id = $e->adress_id;
      $emp_id = $e->emp_id;
      $login_id = $e->login_id;
    }
  }
?>





  
  <div class="container">
    <!-- Title section -->
    <div class="title">Registration</div>
    <div class="content">
      <!-- Registration form -->
      <form action="<?=base_url()?>/employee/process" id="registration_form" method="post">
        <input type="hidden" name="mode" value="<?=$mode?>" id="">
        <input type="hidden" name="emp_id" value="<?=$emp_id?>" id="">
        <input type="hidden" name="address_id" value="<?=$address_id?>" id="">
        <input type="hidden" name="login_id" value="<?=$login_id?>" id="">
        <div class="user-details">
          

          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="fullname" value="<?=$fullname?>"  placeholder="Enter your name" required>
          </div> 


          <div class="input-box">
            <span class="details">DOB</span>
            <input type="text" name="DOB" placeholder="DD/MM/YY format"  required>
          </div>
       
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone_number" value="<?=$phone_number?>" placeholder="Enter your number" required>
          </div>

          
        <div class="gender-details">
         <strong>Gender</strong>
         <select name="gender" required>
            <option <?php if($gender=='male') echo "selected";?> value="male">Male</option>
            <option <?php if($gender=='female')echo "selected";?> value="female">female</option>
            <option <?php if($gender=='others')echo "selected";?> value="others">others</option>
         </select>
        </div>
        

         
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" value="<?=$email?>"  placeholder="Enter your email" required>
          </div>
        

          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password"  value="<?=$password?>" id="password" placeholder="Enter your password" required>
          </div>
        

          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="cf_password" id="cf_password" placeholder="Confirm your password" required>
          </div>
        </div>

        <div class="input-box">
            <span class="details">department</span>
            <input type="text" name="department" value="<?=$department?>">
          </div>

          

          <div class="input-box">
            <span class="details">Salary</span>
            <input type="text" name="salary" value="<?=$salary?>" placeholder="Enter your salary" required>
          </div>
        
         <div class="gender-details">
         <strong>Salary Type</strong>
         <select name="salary_type" required>
            <option <?php if($salary_type=='monthly') echo "selected";?> value="monthly">Monthly</option>
            <option <?php if($salary_type=='weekly') echo "selected";?> value="female">weekly</option>
            <option <?php if($salary_type=='daily') echo "daily";?>value="others">daily</option>
         </select>
        </div>
        
     

        <!-- Address Details -->
        <div class="user-details">
          <!-- Country -->
          <div class="input-box">
           
            <span class="details">country</span>
            <input type="text" name="country" value="<?=$country?>" placeholder="Enter your country" required>
          </div>

          <!-- State -->
          <div class="input-box">
            <span class="details">State</span>
            <input type="text" name="state" value="<?=$state?>" placeholder="Enter your state" required>
          </div>

          <!-- District -->
          <div class="input-box">
            <span class="details">District</span>
            <input type="text" name="district" value="<?=$district?>" placeholder="Enter your district" required>
          </div>
          <!-- Zip Code -->
          <div class="input-box">
            <span class="details">Zip Code</span>
            <input type="text" name="zip_code" value="<?=$zip_code?>" placeholder="Enter your zip code" required>
          </div>
          <!-- Street -->
          <div class="input-box">
            <span class="details">Street</span>
            <input type="text" name="street" value="<?=$street?>" placeholder="Enter your street" required>
          </div>
          <!-- Address Number -->
          <div class="input-box">
            <span class="details">Address Number</span>
            <input type="text" name="adress_number" value="<?=$adress_number?>" placeholder="Enter your address number" required>
          </div>
        </div>

        <!-- Submit button -->
        <div class="button">
          <button type="submit" 
           value="">submit</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function form_submit(){
        var password = document.getElementById('password').value;
        var cf_password = document.getElementById('cf_password').value;
        var form = document.getElementById('registration_form').value;
        if(password != cf_password){
            alert("Password not matching");
        }else{
            alert("password matching");
            form.submit();
        }
    }

  </script>

  <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  height: 300vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: linear-gradient(135deg,rgb(6, 23, 34),rgb(172, 63, 215));
}

.container {
  max-width: 1000px;
  width: 200%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}

.container .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}

.container .title::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

.content form .user-details {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}

form .user-details .input-box {
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}

form .input-box span.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}

.user-details .input-box input {
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}

.user-details .input-box input:focus,
.user-details .input-box input:valid {
  border-color: #9b59b6;
}

.gender-details{
  margin-top:30px;
}


form .category {
  display: flex;
  width: 80%;
  margin: 14px 0;
  justify-content: space-between;
}

form .category label {
  display: flex;
  align-items: center;
  cursor: pointer;
}

form .category label .dot {
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}

#dot-1:checked~.category label .one,
#dot-2:checked~.category label .two,
#dot-3:checked~.category label .three {
  background: rgb(39, 5, 52);
  border-color: #d9d9d9;
}

form input[type="radio"] {
  display: none;
}

form .button {
  height: 45px;
  margin: 35px 0;
}

form .button input {
  height: 100%;
  width: 100%;
  border-radius: 5px;
  border: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  background: linear-gradient(135deg, rgb(22, 39, 51), #9b59b6);
}

form .button input:hover {
  background: linear-gradient(-135deg, rgb(16, 40, 56), #9b59b6);
}

/* New styles for the address section */
form .user-details .input-box {
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}

/* Address Fields */
form .user-details .input-box {
  width: 100%;
}

/* Responsive media query for smaller devices */
@media(max-width: 584px) {
  .container {
    max-width: 100%;
  }
  form .user-details .input-box {
    margin-bottom: 15px;
    width: 100%;
  }
  form .category {
    width: 100%;
  }
  .content form .user-details {
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar {
    width: 5px;
  }
}

/* Responsive media query for very small devices */
@media(max-width: 459px) {
  .container .content .category {
    flex-direction: column;
  }
}


  </style>
</body>
</html>
