let defaultMsg="";
let emailErrorMsg="X Email address should be non-empty with the format xyx@xyz.xyz.";
let loginErrorMsg="X User name should be non-empty, and within 30 characters long.";
let passErrorMsg="X Password should be at least 8 characters: 1 uppercase, 1 lowercase.";


let loginInput = document.querySelector("#username");
let loginError = document.createElement('p');
loginError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[0].append(loginError);


let passInput = document.querySelector("#password");
let passError = document.createElement('p');
passError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[1].append(passError);


let emailInput = document.querySelector("#email");
let emailError = document.createElement('p');
emailError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[2].append(emailError);


function validateEmail() {
    let email = emailInput.value;
    let regexp = /\S+@\S+\.\S+/;
    let error;

    if (regexp.test(email)) {
        error = defaultMsg;
        emailInput.classList.remove("error-border");

    } else {
        error = emailErrorMsg;
        emailInput.classList.add("error-border");
    }
    return error;
}

function validateLogin() {
    let login = loginInput.value.trim();
    let error;

    if (login.length <= 30 && login.length > 0) {
        error = defaultMsg;
        loginInput.value = login.toLowerCase();
        loginInput.classList.remove("error-border");
    } else {
        error = loginErrorMsg;
        loginInput.classList.add("error-border");
    }
    return error;
}

function validatePass() {
    let pass = passInput.value;
    let error;

    if (/[a-z]/.test(pass) && /[A-Z]/.test(pass) && pass.length >= 8) {
        error = defaultMsg;
        passInput.classList.remove("error-border");
    } else {
        error = passErrorMsg;
        passInput.classList.add("error-border");
    }
    return error;
}

function validate(){
    let valid = true;//global validation 

    let emailValidation = validateEmail();
    if(emailValidation!==defaultMsg){
        emailError.textContent = emailValidation;
        valid = false;  
    }

    let loginValidation = validateLogin();
    if(loginValidation!==defaultMsg){
        loginError.textContent = loginValidation;
        valid = false;  
    }

    let passValidation = validatePass();
    if(passValidation!==defaultMsg){
        passError.textContent = passValidation;
        valid = false;  
    }
    return valid;
};

// add event listner to the email if you entered correct email,the error paragraph with be empty
emailInput.addEventListener("blur",()=>{ // arrow function
    let x = validateEmail();
    if(x == defaultMsg){
        emailError.textContent=defaultMsg;
    }
    emailInput.classList.remove("error-border");  
});

loginInput.addEventListener("blur",()=>{ // arrow function
    let x = validateLogin();
    if(x == defaultMsg){
        loginError.textContent=defaultMsg;
    } 
    loginInput.classList.remove("error-border"); 
});

passInput.addEventListener("blur",()=>{ // arrow function
    let x = validatePass();
    if(x == defaultMsg){
        passError.textContent=defaultMsg;
    }
    passInput.classList.remove("error-border");
});






