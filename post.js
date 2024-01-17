let defaultMsg="";
let contentErrorMsg="X Blog content should be non-empty, and within 1500 characters long.";


let contentInput = document.querySelector("#blogContent");
let contentError = document.createElement('p');
contentError.setAttribute("class", "warning");
document.querySelectorAll(".textfield").appendChild(contentError);


function validateContent() {
    let content = contentInput.value.trim();
    let error;

    if (content.length <= 1500 && content.length > 0) {
        error = defaultMsg;
        contentInput.classList.remove("error-border");
    } else {
        error = contentErrorMsg;
        contentInput.classList.add("error-border");
    }
    return error;
}


function validate(){
    let valid = true;//global validation 

    let contentValidation = validateContent();
    if(contentValidation!==defaultMsg){
        contentError.textContent = contentValidation;
        valid = false;  
    }

    return valid;
};


contentInput.addEventListener("blur",()=>{ // arrow function
    let x = validateContent();
    if(x == defaultMsg){
        contentError.textContent=defaultMsg;
    } 
    contentInput.classList.remove("error-border"); 
});