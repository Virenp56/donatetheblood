<?php 
  //include header file
  include ('include/header.php');

  if (isset($_POST['submit'])) {

	  if (isset($_POST['term']) === true) {

			//Name input check
		  if(isset($_POST['name']) && !empty($_POST['name'])){

				if (preg_match('/^[A-Za-z\s]+$/',$_POST['name'])) {

					$name = $_POST['name'];

				}else{
					$nameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Please lower and upper case and space charecter are allow.</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
					</button>
				    </div>';
					}
		  }else{
			$nameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please fill the name field</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		  }


		  //Gender Input check
		  if(isset($_POST['gender']) && !empty($_POST['gender'])){

			$gender = $_POST['gender'];
		  }else{
			$genderError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please select your gender</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		  }

		//Day Input
		  if(isset($_POST['day']) && !empty($_POST['day'])){
			$day = $_POST['day'];
		  }else{
			$dayError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please select day</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		  }


		  //month
		  if(isset($_POST['month']) && !empty($_POST['month'])){
			$month = $_POST['month'];
		  }else{
			$monthError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please select month</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		  }

		  //year
		  if(isset($_POST['year']) && !empty($_POST['year'])){
			$year = $_POST['year'];
		  }else{
			$yearError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please select year</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		  }

		  //blood group
		  if(isset($_POST['blood_group']) && !empty($_POST['blood_group'])){
			$blood_group = $_POST['blood_group'];
		  }else{
			$blood_groupError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please select blood Group</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		  }


		  //city
		  if(isset($_POST['city']) && !empty($_POST['city'])){

			if (preg_match('/^[A-Za-z\s]+$/',$_POST['city'])) {

					$city = $_POST['city'];

			}else{
				$cityError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Please lower and upper case and space charecter are allow.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>';
			}
		  }else{
			$cityError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please fill the city field</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		  }


		  if(isset($_POST['contact_no']) && !empty($_POST['contact_no'])){

			if (preg_match('/\d{10}/',$_POST['contact_no'])) {

				$contact = $_POST['contact_no'];
			}else{
				$contactError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>contact should consist of 10 charecters.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>';
			}
		  }else{
			$contactError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please fill the contact field</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		  }


//password
		  if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['c_password']) && !empty($_POST['c_password'])) {

				if (strlen($_POST['password'])>=6) {

						if ($_POST['password'] == $_POST['c_password']) {
							$password = $_POST['password']; 
						}else{
							$passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Password are not same.</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  		    <span aria-hidden="true">&times;</span>
							</button>
			  				</div>';
						}
			
				}else{
					$passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>The password should consist of 6 character.</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  		<span aria-hidden="true">&times;</span>
					</button>
		  			</div>';
				}


	  	}else{
		  $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Please fill password field.</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>';
	 	}


		 //mail check
	  if(isset($_POST['email']) && !empty($_POST['email'])){

				$pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[_a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/';

					if (preg_match($pattern,$_POST['email'])) {

						$check_email = $_POST['email'];

						$sql ="SELECT email FROM donor WHERE email='$check_email' ";

						$result = mysqli_query($connection,$sql);

						if (mysqli_num_rows($result)>0) {
						$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Sorry this email already exist.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
						</button>
			 		    </div>';
						}else {
						$email = $_POST['email'];
						}


					}else{
						$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Please enter valid email.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>';
					}
	  }else{
				$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Please fill the email field</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>';
	}

	//Inset Data
	  
	  if (isset($name) && isset($blood_group) && isset($gender) && isset($day) && isset($month) && isset($year) 
	  		&& isset($email) && isset($contact) && isset($city) && isset($password)) {

				$DonorDOB=$year."-".$month."-".$day;

				$password = md5($password);

				$sql = "INSERT INTO donor(name,gender,email,city,dob,contact_no,save_life_date,password,blood_group) 
				VALUES ('$name','$gender','$email','$city','$DonorDOB','$contact',0,'$password','$blood_group')";

		

				if(mysqli_query($connection, $sql)) {
				$submitSuccess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data inserted successfully.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				}else {

				$submitError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data not inserted Try Again</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				}
		}

	}
	  else{
		$termError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Please agree with our tearms and conditions.</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>';
	}


  }
?>

<style>
	.size{
		min-height: 0px;
		padding: 60px 0 40px 0;
		
	}
	.form-container{
		background-color: white;
		border: .5px solid #eee;
		border-radius: 5px;
		padding: 20px 10px 20px 30px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
	}
	.form-group{
		text-align: left;
	}
	h1{
		color: white;
	}
	h3{
		color: #e74c3c;
		text-align: center;
	}
	.red-bar{
		width: 25%;
	}
</style>
<div class="container-fluid red-background size">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="text-center">Donate</h1>
			<hr class="white-bar">
		</div>
	</div>
</div>
<div class="container size">
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
					<h3>SignUp</h3>
					
					<hr class="red-bar">
					<?php
					if (isset($termError)) echo $termError;

					if (isset($submitSuccess))	echo $submitSuccess;

					if (isset($submitError))	echo $submitError;

					?>
					
          <!-- Error Messages -->

				<form class="form-group" action="" method="post" novalidate="">
					<div class="form-group">
						<label for="fullname">Full Name</label>
						<input type="text" name="name" id="fullname" placeholder="Full Name" required pattern="[A-Za-z/\s]+" title="Only lower and upper case and space" class="form-control" value="<?php if (isset($name)) echo $name;?>">

						<?php if (isset($nameError)) echo $nameError;?>
					</div><!--full name-->
					<div class="form-group">
              <label for="name">Blood Group</label><br>
              <select class="form-control demo-default" id="blood_group" name="blood_group" required>
                <option value="">---Select Your Blood Group---</option>
				<?php if (isset($blood_group)) echo'<option selected=""value="'.$blood_group.'" >'.$blood_group.'</option>';?>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
			  <?php if(isset($blood_groupError)) echo $blood_groupError; ?>
            </div><!--End form-group-->

			
					<div class="form-group">
				              <label for="gender">Gender</label><br>
				              		Male<input type="radio" name="gender" id="gender" value="Male" style="margin-left:10px; margin-right:10px;" checked>
				              		Female<input type="radio" name="gender" id="gender" value="Female" style="margin-left:10px;" <?php if (isset($gender)) {if($gender=="Female") echo'checked';}?>>
									  <?php
					if (isset($genderError)) echo $genderError;
					?>
								</div><!--gender-->
					
				    <div class="form-inline">
              <label for="name">Date of Birth</label><br>
              <select class="form-control demo-default" id="date" name="day" style="margin-bottom:10px;" required>
			  
                <option value="">---Date---</option>
				<?php if (isset($day)) echo'<option selected=""value="'.$day.'" >'.$day.'</option>';?>
                <option value="01" >01</option><option value="02" >02</option><option value="03" >03</option><option value="04" >04</option><option value="05" >05</option><option value="06" >06</option><option value="07" >07</option> <option value="08" >08</option><option value="09" >09</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option><option value="13" >13</option><option value="14" >14</option><option value="15" >15</option><option value="16" >16</option><option value="17" >17</option><option value="18" >18</option><option value="19" >19</option><option value="20" >20</option><option value="21" >21</option><option value="22" >22</option><option value="23" >23</option><option value="24" >24</option><option value="25" >25</option><option value="26" >26</option><option value="27" >27</option><option value="28" >28</option><option value="29" >29</option><option value="30" >30</option><option value="31" >31</option>
              </select>


              <select class="form-control demo-default" name="month" id="month" style="margin-bottom:10px;" required>
                <option value="">---Month---</option>
				<?php if (isset($month)) echo'<option selected=""value="'.$month.'" >'.$month.'</option>';?>

                <option value="01" >January</option><option value="02" >February</option><option value="03" >March</option><option value="04" >April</option><option value="05" >May</option><option value="06" >June</option><option value="07" >July</option><option value="08" >August</option><option value="09" >September</option><option value="10" >October</option><option value="11" >November</option><option value="12" >December</option>
              </select>
              <select class="form-control demo-default" id="year" name="year" style="margin-bottom:10px;" required>

                <option value="">---Year---</option>
				<?php if (isset($year)) echo'<option selected=""value="'.$year.'" >'.$year.'</option>';?>
                <option value="1957" >1957</option><option value="1958" >1958</option><option value="1959" >1959</option><option value="1960" >1960</option><option value="1961" >1961</option><option value="1962" >1962</option><option value="1963" >1963</option><option value="1964" >1964</option><option value="1965" >1965</option><option value="1966" >1966</option><option value="1967" >1967</option><option value="1968" >1968</option><option value="1969" >1969</option><option value="1970" >1970</option><option value="1971" >1971</option><option value="1972" >1972</option><option value="1973" >1973</option><option value="1974" >1974</option><option value="1975" >1975</option><option value="1976" >1976</option><option value="1977" >1977</option><option value="1978" >1978</option><option value="1979" >1979</option><option value="1980" >1980</option><option value="1981" >1981</option><option value="1982" >1982</option><option value="1983" >1983</option><option value="1984" >1984</option><option value="1985" >1985</option><option value="1986" >1986</option><option value="1987" >1987</option><option value="1988" >1988</option><option value="1989" >1989</option><option value="1990" >1990</option><option value="1991" >1991</option><option value="1992" >1992</option><option value="1993" >1993</option><option value="1994" >1994</option><option value="1995" >1995</option><option value="1996" >1996</option><option value="1997" >1997</option><option value="1998" >1998</option><option value="1999" >1999</option><option value="2000" >2000</option><option value="2001" >2001</option><option value="2002" >2002</option>
              </select>
			 
            </div><!--End form-group-->
			<?php if(isset($dayError)) echo $dayError; ?>
			<?php if(isset($monthError)) echo $monthError; ?>
			<?php if(isset($yearError)) echo $yearError; ?>
		


				    <div class="form-group">
						<label for="fullname">Email</label>
						<input type="text" name="email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please write correct email" class="form-control" value="<?php if (isset($email)) echo $email;?>">
						<?php if(isset($emailError)) echo $emailError; ?>

					</div>

					<div class="form-group">
              <label for="contact_no">Contact No</label>
              <input type="text" name="contact_no" placeholder="03********" class="form-control" required pattern="^\d{10}$" title="10 numeric characters only" maxlength="10" value="<?php if (isset($contact)) echo $contact;?>">
			  <?php if(isset($contactError)) echo $contactError; ?>

			</div><!--End form-group-->

					<div class="form-group">
              <label for="city">City</label>
              <select name="city" id="city" class="form-control demo-default" required>
	<option value="">-- Select --</option>
	<?php if (isset($city)) echo'<option selected=""value="'.$city.'" >'.$city.'</option>';?>
<option value="Adilabad">Adilabad</option> <option value="Agra">Agra</option> <option value="Ahmedabad">Ahmedabad</option> <option value="Ahmednagar">Ahmednagar</option> <option value="Aizawl">Aizawl</option> <option value="Ajitgarh(Mohali)">Ajitgarh (Mohali)</option> <option value="Ajmer">Ajmer</option> <option value="Akola">Akola</option> <option value="Alappuzha">Alappuzha</option> <option value="Aligarh">Aligarh</option> <option value="Alirajpur">Alirajpur</option> <option value="Allahabad">Allahabad</option> <option value="Almora">Almora</option> <option value="Alwar">Alwar</option> <option value="Ambala">Ambala</option> <option value="AmbedkarNagar">Ambedkar Nagar</option> <option value="Amravati">Amravati</option> <option value="Amrelidistrict">Amreli district</option> <option value="Amritsar">Amritsar</option> <option value="Anand">Anand</option> <option value="Anantapur">Anantapur</option> <option value="Anantnag">Anantnag</option> <option value="Angul">Angul</option> <option value="Anjaw">Anjaw</option> <option value="Anuppur">Anuppur</option> <option value="Araria">Araria</option> <option value="Ariyalur">Ariyalur</option> <option value="Arwal">Arwal</option> <option value="AshokNagar">Ashok Nagar</option> <option value="Auraiya">Auraiya</option> <option value="Aurangabad">Aurangabad</option> <option value="Aurangabad">Aurangabad</option> <option value="Azamgarh">Azamgarh</option> <option value="Badgam">Badgam</option> <option value="Bagalkot">Bagalkot</option> <option value="Bageshwar">Bageshwar</option> <option value="Bagpat">Bagpat</option> <option value="Bahraich">Bahraich</option> <option value="Baksa">Baksa</option> <option value="Balaghat">Balaghat</option> <option value="Balangir">Balangir</option> <option value="Balasore">Balasore</option> <option value="Ballia">Ballia</option> <option value="Balrampur">Balrampur</option> <option value="Banaskantha">Banaskantha</option> <option value="Banda">Banda</option> <option value="Bandipora">Bandipora</option> <option value="BangaloreRural">Bangalore Rural</option> <option value="BangaloreUrban">Bangalore Urban</option> <option value="Banka">Banka</option> <option value="Bankura">Bankura</option> <option value="Banswara">Banswara</option> <option value="Barabanki">Barabanki</option> <option value="Baramulla">Baramulla</option> <option value="Baran">Baran</option> <option value="Bardhaman">Bardhaman</option> <option value="Bareilly">Bareilly</option> <option value="Bargarh(Baragarh)">Bargarh (Baragarh)</option> <option value="Barmer">Barmer</option> <option value="Barnala">Barnala</option> <option value="Barpeta">Barpeta</option> <option value="Barwani">Barwani</option> <option value="Bastar">Bastar</option> <option value="Basti">Basti</option> <option value="Bathinda">Bathinda</option> <option value="Beed">Beed</option> <option value="Begusarai">Begusarai</option> <option value="Belgaum">Belgaum</option> <option value="Bellary">Bellary</option> <option value="Betul">Betul</option> <option value="Bhadrak">Bhadrak</option> <option value="Bhagalpur">Bhagalpur</option> <option value="Bhandara">Bhandara</option> <option value="Bharatpur">Bharatpur</option> <option value="Bharuch">Bharuch</option> <option value="Bhavnagar">Bhavnagar</option> <option value="Bhilwara">Bhilwara</option> <option value="Bhind">Bhind</option> <option value="Bhiwani">Bhiwani</option> <option value="Bhojpur">Bhojpur</option> <option value="Bhopal">Bhopal</option> <option value="Bidar">Bidar</option> <option value="Bijapur">Bijapur</option> <option value="Bijapur">Bijapur</option> <option value="Bijnor">Bijnor</option> <option value="Bikaner">Bikaner</option> <option value="Bilaspur">Bilaspur</option> <option value="Bilaspur">Bilaspur</option> <option value="Birbhum">Birbhum</option> <option value="Bishnupur">Bishnupur</option> <option value="Bokaro">Bokaro</option> <option value="Bongaigaon">Bongaigaon</option> <option value="Boudh(Bauda)">Boudh (Bauda)</option> <option value="Budaun">Budaun</option> <option value="Bulandshahr">Bulandshahr</option> <option value="Buldhana">Buldhana</option> <option value="Bundi">Bundi</option> <option value="Burhanpur">Burhanpur</option> <option value="Buxar">Buxar</option> <option value="Cachar">Cachar</option> <option value="CentralDelhi">Central Delhi</option> <option value="Chamarajnagar">Chamarajnagar</option> <option value="Chamba">Chamba</option> <option value="Chamoli">Chamoli</option> <option value="Champawat">Champawat</option> <option value="Champhai">Champhai</option> <option value="Chandauli">Chandauli</option> <option value="Chandel">Chandel</option> <option value="Chandigarh">Chandigarh</option> <option value="Chandrapur">Chandrapur</option> <option value="Changlang">Changlang</option> <option value="Chatra">Chatra</option> <option value="Chennai">Chennai</option> <option value="Chhatarpur">Chhatarpur</option> <option value="ChhatrapatiShahujiMaharajNagar"> Chhatrapati Shahuji Maharaj Nagar </option> <option value="Chhindwara">Chhindwara</option> <option value="Chikkaballapur">Chikkaballapur</option> <option value="Chikkamagaluru">Chikkamagaluru</option> <option value="Chirang">Chirang</option> <option value="Chitradurga">Chitradurga</option> <option value="Chitrakoot">Chitrakoot</option> <option value="Chittoor">Chittoor</option> <option value="Chittorgarh">Chittorgarh</option> <option value="Churachandpur">Churachandpur</option> <option value="Churu">Churu</option> <option value="Coimbatore">Coimbatore</option> <option value="CoochBehar">Cooch Behar</option> <option value="Cuddalore">Cuddalore</option> <option value="Cuttack">Cuttack</option> <option value="DadraandNagarHaveli"> Dadra and Nagar Haveli </option> <option value="Dahod">Dahod</option> <option value="DakshinDinajpur">Dakshin Dinajpur</option> <option value="DakshinaKannada">Dakshina Kannada</option> <option value="Daman">Daman</option> <option value="Damoh">Damoh</option> <option value="Dantewada">Dantewada</option> <option value="Darbhanga">Darbhanga</option> <option value="Darjeeling">Darjeeling</option> <option value="Darrang">Darrang</option> <option value="Datia">Datia</option> <option value="Dausa">Dausa</option> <option value="Davanagere">Davanagere</option> <option value="Debagarh(Deogarh)">Debagarh (Deogarh)</option> <option value="Dehradun">Dehradun</option> <option value="Deoghar">Deoghar</option> <option value="Deoria">Deoria</option> <option value="Dewas">Dewas</option> <option value="Dhalai">Dhalai</option> <option value="Dhamtari">Dhamtari</option> <option value="Dhanbad">Dhanbad</option> <option value="Dhar">Dhar</option> <option value="Dharmapuri">Dharmapuri</option> <option value="Dharwad">Dharwad</option> <option value="Dhemaji">Dhemaji</option> <option value="Dhenkanal">Dhenkanal</option> <option value="Dholpur">Dholpur</option> <option value="Dhubri">Dhubri</option> <option value="Dhule">Dhule</option> <option value="DibangValley">Dibang Valley</option> <option value="Dibrugarh">Dibrugarh</option> <option value="DimaHasao">Dima Hasao</option> <option value="Dimapur">Dimapur</option> <option value="Dindigul">Dindigul</option> <option value="Dindori">Dindori</option> <option value="Diu">Diu</option> <option value="Doda">Doda</option> <option value="Dumka">Dumka</option> <option value="Dungapur">Dungapur</option> <option value="Durg">Durg</option> <option value="EastChamparan">East Champaran</option> <option value="EastDelhi">East Delhi</option> <option value="EastGaroHills">East Garo Hills</option> <option value="EastKhasiHills">East Khasi Hills</option> <option value="EastSiang">East Siang</option> <option value="EastSikkim">East Sikkim</option> <option value="EastSinghbhum">East Singhbhum</option> <option value="Eluru">Eluru</option> <option value="Ernakulam">Ernakulam</option> <option value="Erode">Erode</option> <option value="Etah">Etah</option> <option value="Etawah">Etawah</option> <option value="Faizabad">Faizabad</option> <option value="Faridabad">Faridabad</option> <option value="Faridkot">Faridkot</option> <option value="Farrukhabad">Farrukhabad</option> <option value="Fatehabad">Fatehabad</option> <option value="FatehgarhSahib">Fatehgarh Sahib</option> <option value="Fatehpur">Fatehpur</option> <option value="Fazilka">Fazilka</option> <option value="Firozabad">Firozabad</option> <option value="Firozpur">Firozpur</option> <option value="Gadag">Gadag</option> <option value="Gadchiroli">Gadchiroli</option> <option value="Gajapati">Gajapati</option> <option value="Ganderbal">Ganderbal</option> <option value="Gandhinagar">Gandhinagar</option> <option value="Ganganagar">Ganganagar</option> <option value="Ganjam">Ganjam</option> <option value="Garhwa">Garhwa</option> <option value="GautamBuddhNagar">Gautam Buddh Nagar</option> <option value="Gaya">Gaya</option> <option value="Ghaziabad">Ghaziabad</option> <option value="Ghazipur">Ghazipur</option> <option value="Giridih">Giridih</option> <option value="Goalpara">Goalpara</option> <option value="Godda">Godda</option> <option value="Golaghat">Golaghat</option> <option value="Gonda">Gonda</option> <option value="Gondia">Gondia</option> <option value="Gopalganj">Gopalganj</option> <option value="Gorakhpur">Gorakhpur</option> <option value="Gulbarga">Gulbarga</option> <option value="Gumla">Gumla</option> <option value="Guna">Guna</option> <option value="Guntur">Guntur</option> <option value="Gurdaspur">Gurdaspur</option> <option value="Gurgaon">Gurgaon</option> <option value="Gwalior">Gwalior</option> <option value="Hailakandi">Hailakandi</option> <option value="Hamirpur">Hamirpur</option> <option value="Hamirpur">Hamirpur</option> <option value="Hanumangarh">Hanumangarh</option> <option value="Harda">Harda</option> <option value="Hardoi">Hardoi</option> <option value="Haridwar">Haridwar</option> <option value="Hassan">Hassan</option> <option value="Haveridistrict">Haveri district</option> <option value="Hazaribag">Hazaribag</option> <option value="Hingoli">Hingoli</option> <option value="Hissar">Hissar</option> <option value="Hooghly">Hooghly</option> <option value="Hoshangabad">Hoshangabad</option> <option value="Hoshiarpur">Hoshiarpur</option> <option value="Howrah">Howrah</option> <option value="Hyderabad">Hyderabad</option> <option value="Hyderabad">Hyderabad</option> <option value="Idukki">Idukki</option> <option value="ImphalEast">Imphal East</option> <option value="ImphalWest">Imphal West</option> <option value="Indore">Indore</option> <option value="Jabalpur">Jabalpur</option> <option value="Jagatsinghpur">Jagatsinghpur</option> <option value="JaintiaHills">Jaintia Hills</option> <option value="Jaipur">Jaipur</option> <option value="Jaisalmer">Jaisalmer</option> <option value="Jajpur">Jajpur</option> <option value="Jalandhar">Jalandhar</option> <option value="Jalaun">Jalaun</option> <option value="Jalgaon">Jalgaon</option> <option value="Jalna">Jalna</option> <option value="Jalore">Jalore</option> <option value="Jalpaiguri">Jalpaiguri</option> <option value="Jammu">Jammu</option> <option value="Jamnagar">Jamnagar</option> <option value="Jamtara">Jamtara</option> <option value="Jamui">Jamui</option> <option value="Janjgir-Champa">Janjgir-Champa</option> <option value="Jashpur">Jashpur</option> <option value="Jaunpurdistrict">Jaunpur district</option> <option value="Jehanabad">Jehanabad</option> <option value="Jhabua">Jhabua</option> <option value="Jhajjar">Jhajjar</option> <option value="Jhalawar">Jhalawar</option> <option value="Jhansi">Jhansi</option> <option value="Jharsuguda">Jharsuguda</option> <option value="Jhunjhunu">Jhunjhunu</option> <option value="Jind">Jind</option> <option value="Jodhpur">Jodhpur</option> <option value="Jorhat">Jorhat</option> <option value="Junagadh">Junagadh</option> <option value="JyotibaPhuleNagar">Jyotiba Phule Nagar</option> <option value="Kabirdham(formerlyKawardha)"> Kabirdham (formerly Kawardha) </option> <option value="Kadapa">Kadapa</option> <option value="Kaimur">Kaimur</option> <option value="Kaithal">Kaithal</option> <option value="Kakinada">Kakinada</option> <option value="Kalahandi">Kalahandi</option> <option value="Kamrup">Kamrup</option> <option value="KamrupMetropolitan">Kamrup Metropolitan</option> <option value="Kanchipuram">Kanchipuram</option> <option value="Kandhamal">Kandhamal</option> <option value="Kangra">Kangra</option> <option value="Kanker">Kanker</option> <option value="Kannauj">Kannauj</option> <option value="Kannur">Kannur</option> <option value="Kanpur">Kanpur</option> <option value="KanshiRamNagar">Kanshi Ram Nagar</option> <option value="Kanyakumari">Kanyakumari</option> <option value="Kapurthala">Kapurthala</option> <option value="Karaikal">Karaikal</option> <option value="Karauli">Karauli</option> <option value="KarbiAnglong">Karbi Anglong</option> <option value="Kargil">Kargil</option> <option value="Karimganj">Karimganj</option> <option value="Karimnagar">Karimnagar</option> <option value="Karnal">Karnal</option> <option value="Karur">Karur</option> <option value="Kasaragod">Kasaragod</option> <option value="Kathua">Kathua</option> <option value="Katihar">Katihar</option> <option value="Katni">Katni</option> <option value="Kaushambi">Kaushambi</option> <option value="Kendrapara">Kendrapara</option> <option value="Kendujhar(Keonjhar)"> Kendujhar (Keonjhar) </option> <option value="Khagaria">Khagaria</option> <option value="Khammam">Khammam</option> <option value="Khandwa(EastNimar)">Khandwa (East Nimar)</option> <option value="Khargone(WestNimar)"> Khargone (West Nimar) </option> <option value="Kheda">Kheda</option> <option value="Khordha">Khordha</option> <option value="Khowai">Khowai</option> <option value="Khunti">Khunti</option> <option value="Kinnaur">Kinnaur</option> <option value="Kishanganj">Kishanganj</option> <option value="Kishtwar">Kishtwar</option> <option value="Kodagu">Kodagu</option> <option value="Koderma">Koderma</option> <option value="Kohima">Kohima</option> <option value="Kokrajhar">Kokrajhar</option> <option value="Kolar">Kolar</option> <option value="Kolasib">Kolasib</option> <option value="Kolhapur">Kolhapur</option> <option value="Kolkata">Kolkata</option> <option value="Kollam">Kollam</option> <option value="Koppal">Koppal</option> <option value="Koraput">Koraput</option> <option value="Korba">Korba</option> <option value="Koriya">Koriya</option> <option value="Kota">Kota</option> <option value="Kottayam">Kottayam</option> <option value="Kozhikode">Kozhikode</option> <option value="Krishna">Krishna</option> <option value="Kulgam">Kulgam</option> <option value="Kullu">Kullu</option> <option value="Kupwara">Kupwara</option> <option value="Kurnool">Kurnool</option> <option value="Kurukshetra">Kurukshetra</option> <option value="KurungKumey">Kurung Kumey</option> <option value="Kushinagar">Kushinagar</option> <option value="Kutch">Kutch</option> <option value="LahaulandSpiti">Lahaul and Spiti</option> <option value="Lakhimpur">Lakhimpur</option> <option value="LakhimpurKheri">Lakhimpur Kheri</option> <option value="Lakhisarai">Lakhisarai</option> <option value="Lalitpur">Lalitpur</option> <option value="Latehar">Latehar</option> <option value="Latur">Latur</option> <option value="Lawngtlai">Lawngtlai</option> <option value="Leh">Leh</option> <option value="Lohardaga">Lohardaga</option> <option value="Lohit">Lohit</option> <option value="LowerDibangValley">Lower Dibang Valley</option> <option value="LowerSubansiri">Lower Subansiri</option> <option value="Lucknow">Lucknow</option> <option value="Ludhiana">Ludhiana</option> <option value="Lunglei">Lunglei</option> <option value="Madhepura">Madhepura</option> <option value="Madhubani">Madhubani</option> <option value="Madurai">Madurai</option> <option value="MahamayaNagar">Mahamaya Nagar</option> <option value="Maharajganj">Maharajganj</option> <option value="Mahasamund">Mahasamund</option> <option value="Mahbubnagar">Mahbubnagar</option> <option value="Mahe">Mahe</option> <option value="Mahendragarh">Mahendragarh</option> <option value="Mahoba">Mahoba</option> <option value="Mainpuri">Mainpuri</option> <option value="Malappuram">Malappuram</option> <option value="Maldah">Maldah</option> <option value="Malkangiri">Malkangiri</option> <option value="Mamit">Mamit</option> <option value="Mandi">Mandi</option> <option value="Mandla">Mandla</option> <option value="Mandsaur">Mandsaur</option> <option value="Mandya">Mandya</option> <option value="Mansa">Mansa</option> <option value="Marigaon">Marigaon</option> <option value="Mathura">Mathura</option> <option value="Mau">Mau</option> <option value="Mayurbhanj">Mayurbhanj</option> <option value="Medak">Medak</option> <option value="Meerut">Meerut</option> <option value="Mehsana">Mehsana</option> <option value="Mewat">Mewat</option> <option value="Mirzapur">Mirzapur</option> <option value="Moga">Moga</option> <option value="Mokokchung">Mokokchung</option> <option value="Mon">Mon</option> <option value="Moradabad">Moradabad</option> <option value="Morena">Morena</option> <option value="MumbaiCity">Mumbai City</option> <option value="Mumbaisuburban">Mumbai suburban</option> <option value="Munger">Munger</option> <option value="Murshidabad">Murshidabad</option> <option value="Muzaffarnagar">Muzaffarnagar</option> <option value="Muzaffarpur">Muzaffarpur</option> <option value="Mysore">Mysore</option> <option value="Nabarangpur">Nabarangpur</option> <option value="Nadia">Nadia</option> <option value="Nagaon">Nagaon</option> <option value="Nagapattinam">Nagapattinam</option> <option value="Nagaur">Nagaur</option> <option value="Nagpur">Nagpur</option> <option value="Nainital">Nainital</option> <option value="Nalanda">Nalanda</option> <option value="Nalbari">Nalbari</option> <option value="Nalgonda">Nalgonda</option> <option value="Namakkal">Namakkal</option> <option value="Nanded">Nanded</option> <option value="Nandurbar">Nandurbar</option> <option value="Narayanpur">Narayanpur</option> <option value="Narmada">Narmada</option> <option value="Narsinghpur">Narsinghpur</option> <option value="Nashik">Nashik</option> <option value="Navsari">Navsari</option> <option value="Nawada">Nawada</option> <option value="Nawanshahr">Nawanshahr</option> <option value="Nayagarh">Nayagarh</option> <option value="Neemuch">Neemuch</option> <option value="Nellore">Nellore</option> <option value="NewDelhi">New Delhi</option> <option value="Nilgiris">Nilgiris</option> <option value="Nizamabad">Nizamabad</option> <option value="North24Parganas">North 24 Parganas</option> <option value="NorthDelhi">North Delhi</option> <option value="NorthEastDelhi">North East Delhi</option> <option value="NorthGoa">North Goa</option> <option value="NorthSikkim">North Sikkim</option> <option value="NorthTripura">North Tripura</option> <option value="NorthWestDelhi">North West Delhi</option> <option value="Nuapada">Nuapada</option> <option value="Ongole">Ongole</option> <option value="Osmanabad">Osmanabad</option> <option value="Pakur">Pakur</option> <option value="Palakkad">Palakkad</option> <option value="Palamu">Palamu</option> <option value="Pali">Pali</option> <option value="Palwal">Palwal</option> <option value="Panchkula">Panchkula</option> <option value="Panchmahal">Panchmahal</option> <option value="PanchsheelNagardistrict(Hapur)"> Panchsheel Nagar district (Hapur) </option> <option value="Panipat">Panipat</option> <option value="Panna">Panna</option> <option value="PapumPare">Papum Pare</option> <option value="Parbhani">Parbhani</option> <option value="PaschimMedinipur">Paschim Medinipur</option> <option value="Patan">Patan</option> <option value="Pathanamthitta">Pathanamthitta</option> <option value="Pathankot">Pathankot</option> <option value="Patiala">Patiala</option> <option value="Patna">Patna</option> <option value="PauriGarhwal">Pauri Garhwal</option> <option value="Perambalur">Perambalur</option> <option value="Phek">Phek</option> <option value="Pilibhit">Pilibhit</option> <option value="Pithoragarh">Pithoragarh</option> <option value="Pondicherry">Pondicherry</option> <option value="Poonch">Poonch</option> <option value="Porbandar">Porbandar</option> <option value="Pratapgarh">Pratapgarh</option> <option value="Pratapgarh">Pratapgarh</option> <option value="Pudukkottai">Pudukkottai</option> <option value="Pulwama">Pulwama</option> <option value="Pune">Pune</option> <option value="PurbaMedinipur">Purba Medinipur</option> <option value="Puri">Puri</option> <option value="Purnia">Purnia</option> <option value="Purulia">Purulia</option> <option value="Raebareli">Raebareli</option> <option value="Raichur">Raichur</option> <option value="Raigad">Raigad</option> <option value="Raigarh">Raigarh</option> <option value="Raipur">Raipur</option> <option value="Raisen">Raisen</option> <option value="Rajauri">Rajauri</option> <option value="Rajgarh">Rajgarh</option> <option value="Rajkot">Rajkot</option> <option value="Rajnandgaon">Rajnandgaon</option> <option value="Rajsamand">Rajsamand</option> <option value="RamabaiNagar(KanpurDehat)"> Ramabai Nagar (Kanpur Dehat) </option> <option value="Ramanagara">Ramanagara</option> <option value="Ramanathapuram">Ramanathapuram</option> <option value="Ramban">Ramban</option> <option value="Ramgarh">Ramgarh</option> <option value="Rampur">Rampur</option> <option value="Ranchi">Ranchi</option> <option value="Ratlam">Ratlam</option> <option value="Ratnagiri">Ratnagiri</option> <option value="Rayagada">Rayagada</option> <option value="Reasi">Reasi</option> <option value="Rewa">Rewa</option> <option value="Rewari">Rewari</option> <option value="RiBhoi">Ri Bhoi</option> <option value="Rohtak">Rohtak</option> <option value="Rohtas">Rohtas</option> <option value="Rudraprayag">Rudraprayag</option> <option value="Rupnagar">Rupnagar</option> <option value="Sabarkantha">Sabarkantha</option> <option value="Sagar">Sagar</option> <option value="Saharanpur">Saharanpur</option> <option value="Saharsa">Saharsa</option> <option value="Sahibganj">Sahibganj</option> <option value="Saiha">Saiha</option> <option value="Salem">Salem</option> <option value="Samastipur">Samastipur</option> <option value="Samba">Samba</option> <option value="Sambalpur">Sambalpur</option> <option value="Sangli">Sangli</option> <option value="Sangrur">Sangrur</option> <option value="SantKabirNagar">Sant Kabir Nagar</option> <option value="SantRavidasNagar">Sant Ravidas Nagar</option> <option value="Saran">Saran</option> <option value="Satara">Satara</option> <option value="Satna">Satna</option> <option value="SawaiMadhopur">Sawai Madhopur</option> <option value="Sehore">Sehore</option> <option value="Senapati">Senapati</option> <option value="Seoni">Seoni</option> <option value="SeraikelaKharsawan">Seraikela Kharsawan</option> <option value="Serchhip">Serchhip</option> <option value="Shahdol">Shahdol</option> <option value="Shahjahanpur">Shahjahanpur</option> <option value="Shajapur">Shajapur</option> <option value="Shamli">Shamli</option> <option value="Sheikhpura">Sheikhpura</option> <option value="Sheohar">Sheohar</option> <option value="Sheopur">Sheopur</option> <option value="Shimla">Shimla</option> <option value="Shimoga">Shimoga</option> <option value="Shivpuri">Shivpuri</option> <option value="Shopian">Shopian</option> <option value="Shravasti">Shravasti</option> <option value="Sibsagar">Sibsagar</option> <option value="Siddharthnagar">Siddharthnagar</option> <option value="Sidhi">Sidhi</option> <option value="Sikar">Sikar</option> <option value="Simdega">Simdega</option> <option value="Sindhudurg">Sindhudurg</option> <option value="Singrauli">Singrauli</option> <option value="Sirmaur">Sirmaur</option> <option value="Sirohi">Sirohi</option> <option value="Sirsa">Sirsa</option> <option value="Sitamarhi">Sitamarhi</option> <option value="Sitapur">Sitapur</option> <option value="Sivaganga">Sivaganga</option> <option value="Siwan">Siwan</option> <option value="Solan">Solan</option> <option value="Solapur">Solapur</option> <option value="Sonbhadra">Sonbhadra</option> <option value="Sonipat">Sonipat</option> <option value="Sonitpur">Sonitpur</option> <option value="South24Parganas">South 24 Parganas</option> <option value="SouthDelhi">South Delhi</option> <option value="SouthGaroHills">South Garo Hills</option> <option value="SouthGoa">South Goa</option> <option value="SouthSikkim">South Sikkim</option> <option value="SouthTripura">South Tripura</option> <option value="SouthWestDelhi">South West Delhi</option> <option value="SriMuktsarSahib">Sri Muktsar Sahib</option> <option value="Srikakulam">Srikakulam</option> <option value="Srinagar">Srinagar</option> <option value="Subarnapur(Sonepur)"> Subarnapur (Sonepur) </option> <option value="Sultanpur">Sultanpur</option> <option value="Sundergarh">Sundergarh</option> <option value="Supaul">Supaul</option> <option value="Surat">Surat</option> <option value="Surendranagar">Surendranagar</option> <option value="Surguja">Surguja</option> <option value="Tamenglong">Tamenglong</option> <option value="TarnTaran">Tarn Taran</option> <option value="Tawang">Tawang</option> <option value="TehriGarhwal">Tehri Garhwal</option> <option value="Thane">Thane</option> <option value="Thanjavur">Thanjavur</option> <option value="TheDangs">The Dangs</option> <option value="Theni">Theni</option> <option value="Thiruvananthapuram">Thiruvananthapuram</option> <option value="Thoothukudi">Thoothukudi</option> <option value="Thoubal">Thoubal</option> <option value="Thrissur">Thrissur</option> <option value="Tikamgarh">Tikamgarh</option> <option value="Tinsukia">Tinsukia</option> <option value="Tirap">Tirap</option> <option value="Tiruchirappalli">Tiruchirappalli</option> <option value="Tirunelveli">Tirunelveli</option> <option value="Tirupur">Tirupur</option> <option value="Tiruvallur">Tiruvallur</option> <option value="Tiruvannamalai">Tiruvannamalai</option> <option value="Tiruvarur">Tiruvarur</option> <option value="Tonk">Tonk</option> <option value="Tuensang">Tuensang</option> <option value="Tumkur">Tumkur</option> <option value="Udaipur">Udaipur</option> <option value="Udalguri">Udalguri</option> <option value="UdhamSinghNagar">Udham Singh Nagar</option> <option value="Udhampur">Udhampur</option> <option value="Udupi">Udupi</option> <option value="Ujjain">Ujjain</option> <option value="Ukhrul">Ukhrul</option> <option value="Umaria">Umaria</option> <option value="Una">Una</option> <option value="Unnao">Unnao</option> <option value="UpperSiang">Upper Siang</option> <option value="UpperSubansiri">Upper Subansiri</option> <option value="UttarDinajpur">Uttar Dinajpur</option> <option value="UttaraKannada">Uttara Kannada</option> <option value="Uttarkashi">Uttarkashi</option> <option value="Vadodara">Vadodara</option> <option value="Vaishali">Vaishali</option> <option value="Valsad">Valsad</option> <option value="Varanasi">Varanasi</option> <option value="Vellore">Vellore</option> <option value="Vidisha">Vidisha</option> <option value="Viluppuram">Viluppuram</option> <option value="Virudhunagar">Virudhunagar</option> <option value="Visakhapatnam">Visakhapatnam</option> <option value="Vizianagaram">Vizianagaram</option> <option value="Vyara">Vyara</option> <option value="Warangal">Warangal</option> <option value="Wardha">Wardha</option> <option value="Washim">Washim</option> <option value="Wayanad">Wayanad</option> <option value="WestChamparan">West Champaran</option> <option value="WestDelhi">West Delhi</option> <option value="WestGaroHills">West Garo Hills</option> <option value="WestKameng">West Kameng</option> <option value="WestKhasiHills">West Khasi Hills</option> <option value="WestSiang">West Siang</option> <option value="WestSikkim">West Sikkim</option> <option value="WestSinghbhum">West Singhbhum</option> <option value="WestTripura">West Tripura</option> <option value="Wokha">Wokha</option> <option value="Yadgir">Yadgir</option> <option value="YamunaNagar">Yamuna Nagar</option> <option value="Yanam">Yanam</option> <option value="Yavatmal">Yavatmal</option> <option value="Zunheboto">Zunheboto</option>
</select>
	<?php if(isset($cityError)) echo $cityError; ?>
         
</div><!--city end-->

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" value="" placeholder="Password" class="form-control" required pattern=".{6,}">
            </div><!--End form-group-->

            <div class="form-group">
              <label for="password">Confirm Password</label>
              <input type="password" name="c_password" value="" placeholder="Confirm Password" class="form-control" required pattern=".{6,}">
			  <?php if(isset($passwordError)) echo $passwordError; ?>

			</div><!--End form-group-->

            <div class="form-inline">
              <input type="checkbox"checked="" name="term" value="true" required style="margin-left:10px;">
              <span style="margin-left:10px;"><b>I am agree to donate my blood and show my Name, Contact Nos. and E-Mail in Blood donors List</b></span>
            </div><!--End form-group-->
			
					<div class="form-group">
						<button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">SignUp</button>
					</div>
				</form>
		</div>
	</div>
</div>

<?php 
  //include footer file
  include ('include/footer.php');
?>