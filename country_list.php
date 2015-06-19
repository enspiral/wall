<select class="usr_country form-control text-input form-control" name="usr_country" id="contries">
​​​​​​​​​​​​	<option value="0">-- Please Select --</option>
	<option value="885">Cambodia</option>
	<option value="64">New Zealand</option>
	<option value="93">Afghanistan</option>	
	<option value="355">Albania</option>	
	<option value="93">Algeria</option>
	<option value="213">American Samoa</option>
	<option value="376">Andorra</option>
	<option value="244">Angola</option>
	<option value="61">Austria</option>
	<option value="994">Azerbaijan</option>
	<option value="973">Belarus</option>
	<option value="375">Belgium</option>
	<option value="501">Belize</option>
	<option value="229">Benin</option>
	<option value="1">Bermuda</option>
	<option value="975">Bhutan</option>
	<option value="267">Botswana</option>
	<option value="55">Brazil</option>
	<option value="359">Brunei</option>
	<option value="257">Burkina Faso</option>
	<option value="855">Cambodia</option>
	<option value="237">Cameroon</option>
	<option value="1">Canada</option>
	<option value="238">Cape Verde</option>
	<option value="1">Cayman Islands</option>
	<option value="236">Central African Republic</option>
	<option value="235">Chad</option>
	<option value="56">Chile</option>
    <option value="86">China</option>
    <option value="57">Colombia</option>
    <option value="269">Comoros</option>
    <option value="242">Congo</option>
    <option value="682">Cook Islands</option>
    <option value="506">Costa Rica</option>
    <option value="385">Croatia</option>
    <option value="53">Cuba</option>
    <option value="599">Curacao</option>
    <option value="357">Cyprus</option>
    <option value="420">Czech Republic</option>
    <option value="243">Democratic Republic of Congo</option>
    <option value="45">Denmark</option>
    <option value="246">Diego Garcia</option>
    <option value="253">Djibouti</option>
    <option value="1">Dominica</option>
    <option value="420">Czech Republic</option>
    <option value="243">Democratic Republic of Congo</option>
    <option value="44">England</option>
    <option value="240">Equatorial Guinea</option>
    <option value="291">Eritrea</option>
    <option value="372">Estonia</option>
    <option value="251">Ethiopia</option>
    <option value="243">Falkland (Malvinas) Islands</option>
    <option value="298">Faroe Islands</option>
    <option value="679">Fiji</option>
    <option value="358">Finland</option>
    <option value="33">France</option>
    <option value="594">French Polynesia</option>
    <option value="241">Gabon</option>
    <option value="220">Gambia</option>
    <option value="995">Georgia</option>
    <option value="49">Germany</option>
    <option value="233">Ghana</option>
    <option value="30">Greece</option>
    <option value="299">Greenland</option>
    <option value="590">Guadeloupe</option>
    <option value="502">Guatemala</option>		
    <option value="224">Guinea</option>
    <option value="850">North Korea</option>
    <option value="91">India</option>
    <option value="62">Indonesia</option>
    <option value="98">Iran</option>
    <option value="39">Italy</option>
    <option value="972">Israel</option>
    <option value="81">Japan</option>
    <option value="856">Laos</option>
    <option value="60">Malaysia</option>
    <option value="977">Nepal</option>
    <option value="66">Thailand</option>
    <option value="44">United Kingdom</option>
    <option value="84">Vietnam</option>
    <option value="268">Swaziland</option>




</select>
<!-- <input name="code" id="inputCode" /> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	// var select = $(this).val();
	// $("input").val(select);

	alert('hi')
	$('body').on('change','#contries', function(){
		var valueSelected = $(this).val()
		$('input#inputCode').val(valueSelected)
	})

</script>
<?php 

$country_list = array(
		"cambodian",
		"New Zealander",
		"Afghan",
		"Albanian",
		"Algerian",
		"American Samoan",
		"Andorran",
		"Angolan",
		"Australian",
		"Azerbaijani",
		"Belarusian",
		"Belgian",
		"Belizean",
		"Beninese",
		"Bermudian",
		"Bhutanes",
		"Botswanan",
		"Brazilian",
		"Bruneian",
		"Burkinese",
		"Cambodian",
		"Cameroonian",
		"Canadian",
		"Cape Verdean",
		"Caymanian ",
		"Central African",
		"Chadian",
		"Chilean",
		"Chinese",
		"Colombian",
		"Comorian",
		"Congolese",
		"New Zealand citizens",
		"Costa Rican",
		"Croat",
		"Cuban",
		"Dutch",
		"Cypriot",
		"Czech",
		"Congolese",
		"Danish",
		"Diego Garcia",
		"Djiboutian",
		"Dominican",
		"English",
		"Guinean",
		"Eritrean",
		"Estonian",
		"Ethiopian",
		"British citizen",
		"Faroe",
		"Fijian",
		"Finnish",
		"French",
		"French Polynesian",
		"Gabonese",
		"Gambian",
		"Georgian",
		"German",
		"Ghanaian",
		"Greek",
		"Greenlander",
		"French",
		"Guatemalan",
		"Guinean",
		"Korean",
		"Indian",
		"Indonesian",
		"Iranian",
		"Italian",
		"Israeli",
		"Japanese",
		"Laotian",
		"Malaysian",
		"Nepalese",
		"Thai",
		"British",
		"Vietnamese",
		"Swazi"
	);
	
	?>