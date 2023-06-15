/* getting the password hide-show button */
const eyeBtn = document.querySelector('#showBtn')
const passwrd = document.querySelector('#password')

eyeBtn.onclick = function(){
    if(passwrd.type === 'password'){
        passwrd.setAttribute('type','text')
        this.classList.add('show')
    }else{
        passwrd.setAttribute('type','password')
        this.classList.remove('show')
    }
}




//first name validation field
const firstName = document.querySelector('#firstName')
firstName.addEventListener('keyup', validateFName)
function validateFName(){
    var fName = firstName.value

    if(fName ==''){
		document.querySelector('#errFname').innerHTML ='<b>Firstname is Required</b>'
		return false
	}
	if(fName.length < 3 ){
		document.querySelector('#errFname').innerHTML ='<b>Firstname should have more than 3 characters</b>'
		return false
    }
	else{
        if(fName.match(/^(?=.*\d).+$/)){
            document.querySelector('#errFname').innerHTML ='<b>Improper Username!</b>'
            return false;
        }else{
            document.querySelector('#errFname').innerHTML ='<i class="fa-solid fa-check-circle"></i>'
	        return true
        }
    }
}

//last name validation field
const lastName = document.querySelector('#lastName')
lastName.addEventListener('keyup', validateLName)
function validateLName(){
    var lName = lastName.value

    if(lName ==''){
		document.querySelector('#errLname').innerHTML ='<b>Lastname is Required</b>'
		return false
	}
	if(lName.length < 3 ){
		document.querySelector('#errLname').innerHTML ='<b>Lastname should have atleast 3 characters</b>'
		return false
    }
	else{
        if(lName.match(/^(?=.*\d).+$/)){
            document.querySelector('#errLname').innerHTML ='<b>Improper Username!</b>'
            return false;
        }else{
            document.querySelector('#errLname').innerHTML ='<i class="fa-solid fa-check-circle"></i>'
	        return true
        }
    }
}

//password validation field
passwrd.addEventListener('keyup', validatePasswrd)
function validatePasswrd(){

    let data = passwrd.value; //get the password value
    /* Regular Expressions */ 
    const lower = new RegExp('(?=.*[a-z])');
    const upper = new RegExp('(?=.*[A-Z])');
    const number = new RegExp('(?=.*[0-9])');
    const special = new RegExp('(?=.*[!@#$%^&*])');
    const minlength = new RegExp('(?=.{8,})');

    /* Password level check list elements */
    const upperCase = document.getElementById('upper');
    const lowerCase = document.getElementById('lower');
    const digit = document.getElementById('number');
    const specialChar = document.getElementById('special');
    const minLength = document.getElementById('length');

    //lowercase validation check
    if(lower.test(data)){
        lowerCase.classList.add('valid')
    }else{
        lowerCase.classList.remove('valid')
    }
    //upppercase validation check
    if(upper.test(data)){
        upperCase.classList.add('valid')
    }else{
        upperCase.classList.remove('valid')
    }
    //number validation check
    if(number.test(data)){
        digit.classList.add('valid')
    }else{
        digit.classList.remove('valid')
    }
    //special character validation check
    if(special.test(data)){
        specialChar.classList.add('valid')
    }else{
        specialChar.classList.remove('valid')
    }
    //length validation check
    if(minlength.test(data)){
        minLength.classList.add('valid')
    }else{
        minLength.classList.remove('valid')
    }

    
    /* strength checking */
    function checkStrength(Value){
        var i=0
        if(Value.length > 6)
            i++
        if(Value.length >= 10)
            i++
        if(/[A-Z]/.test(Value))
            i++
        if(/[0-9]/.test(Value))
            i++
        if(/[A-Za-z0-8]/.test(Value))
            i++
        return i
    }
    /* set strong weak or medium according to size */
    let Value = passwrd.value;
    let strength = checkStrength(Value);

    //clears the strength field if password value is empty
    if(strength==0 || Value==""){
        document.querySelector('#errPasswrd').innerHTML ='<b>Password is Required</b>'
		return false
    }
    if(strength <= 2){
        document.querySelector('#errPasswrd').innerHTML ='<b>Password is weak</b>'
        document.querySelector('#errPasswrd').style.color = '#f00'
		return false
    }
    else if(strength >= 2 && strength <= 4){
        document.querySelector('#errPasswrd').innerHTML ='<b>Password is medium</b>'
        document.querySelector('#errPasswrd').style.color = '#ffd634'                            
		return false
    }
    else {
        document.querySelector('#errPasswrd').innerHTML ='<b>Password is strong</b>'
        document.querySelector('#errPasswrd').style.color = '#01e701'
		return true
    }
    
}

//validate mobile number field
const phoneNum = document.querySelector('#phoneNum')
phoneNum.addEventListener('keyup', validatePhNum)
function validatePhNum(){
	var PhNum = phoneNum.value;
    if(PhNum == ""){
        document.querySelector('#errPhNum').innerHTML ='<b>Phone number is Required</b>'
        return false
    }
    if(PhNum.match(/^(\+?\d{1,4}[\s-])?(?!0+\s+,?$)\d{10}\s*,?$/)){
        document.querySelector('#errPhNum').innerHTML ='<i class="fa-solid fa-check-circle"></i>'
	    return true
    }else{
        if (PhNum.length < 10) {
            document.querySelector('#errPhNum').innerHTML ='<b>Mobile Number should have 10 digits</b>'
            return false;
        }else{
            document.querySelector('#errPhNum').innerHTML ='<b>Invalid Phone Number!</b>'
            return false;
        }
    }
	
}
 

//validate email field
const mailId = document.querySelector('#mailId')
mailId.addEventListener('keyup', validateMail)
function validateMail(){
    var email = mailId.value;
	if(email == "" ){
		document.querySelector('#errMail').innerHTML ='<b>Email Id is Required</b>'
		return false;
	}
	if (email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/)) {
		document.querySelector('#errMail').innerHTML ='<i class="fa-solid fa-check-circle"></i>'
		return true;
	}else{
		document.querySelector('#errMail').innerHTML ='<b>Invalid mail Id!</b>'
		return false;
	}
}


//validate gender selection
function validateGenSelect(){
    /* The radio buttons */
    var isMale = document.getElementById('Male')
    var isFemale = document.getElementById('Female')
    var isOthers = document.getElementById('Others')

	if(isMale.checked || isFemale.checked || isOthers.checked){
        document.querySelector('#errGender').innerHTML =''
		return true;
	}else{
        document.querySelector('#errGender').innerHTML ='<b>Please select Gender!</b>'
		return false;
	}
}


//validate courses selection
function validateCourseSelect(){
    /* The checkboxes */
    var isBCA = document.getElementById('bca')
    var isMCA = document.getElementById('mca')
    var isBsc = document.getElementById('bsc')
    var isBtech = document.getElementById('btech')
    var isMtech = document.getElementById('mtech')

    if(isBCA.checked || isBsc.checked || isMCA.checked || isBtech.checked || isMtech.checked){
        document.querySelector('#errCourses').innerHTML =''
        return true;
    }else{
		document.querySelector('#errCourses').innerHTML ='<b>Please select a Course!</b>'
		return false;
    }
}


//City validation field
const city = document.querySelector('#city')
city.addEventListener('keyup' , validateCityName)
function validateCityName(){
    var cityName = city.value

    if(cityName ==''){
		document.querySelector('#errCity').innerHTML ='<b>City name is Required</b>'
		return false
	}
	if(cityName.length < 3 ){
		document.querySelector('#errCity').innerHTML ='<b>City name should have atleast 3 characters</b>'
		return false
    }
	else{
        if(cityName.match(/^(?=.*\d).+$/)){
            document.querySelector('#errCity').innerHTML ='<b>Please enter valid city name!</b>'
            return false;
        }else{
            document.querySelector('#errCity').innerHTML ='<i class="fa-solid fa-check-circle"></i>'
	        return true
        }
    }
}


//State selection validation
function validateStateName(){

    var stateName = document.querySelector('#selectState').value
    if(stateName == ""){
        document.querySelector('#errState').innerHTML ='<b>State name is Required</b>'
		return false
    }else{
        document.querySelector('#errState').innerHTML ='<i class="fa-solid fa-check-circle"></i>'
	    return true
    }
}


//final return check for all seperate validations
function validateForm()
{
    if(validateFName() && validateLName() && validatePasswrd() && validatePhNum() && validateMail() && validateGenSelect() && 
        validateCourseSelect() && validateCityName() && validateStateName()){
        return true
    }else{
        return false
    }
}



/* function for reset button */
const resetBtn = document.querySelector('#resetBtn')
resetBtn.addEventListener('click', (e)=>{
	e.preventDefault()
    //clear input fields
    firstName.value=""
    lastName.value=""
    passwrd.value=""
    phoneNum.value=""
    mailId.value=""
    city.value=""
    //reset error messages
    document.querySelector('#errFname').innerHTML=''
    document.querySelector('#errLname').innerHTML=''
    document.querySelector('#errPasswrd').innerHTML=''
    document.querySelector('#errPhNum').innerHTML=''
    document.querySelector('#errMail').innerHTML=''
    document.querySelector('#errGender').innerHTML=''
    document.querySelector('#errCourses').innerHTML=''
    document.querySelector('#errCity').innerHTML=''
    document.querySelector('#errState').innerHTML=''
    eyeBtn.classList.remove('show')     //reset hide button
    passwrd.setAttribute('type','password')    //reset password type 
    document.querySelectorAll('li').forEach(points => points.classList.remove('valid'))     //reset the password keypoints 
    document.querySelectorAll('.form-check-input').forEach(options => options.checked = false) //clears selection for radio buttons and checkboxes
    document.querySelector('#selectState').selectedIndex = 0    //reset dropdown options to initial
});

