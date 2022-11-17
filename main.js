/*const firstName = document.querySelector('#firstNameInput');
const invoice = document.querySelector('#invoiceInput');
const password = document.querySelector('#passInput');

const firstNameError = document.querySelector('#firstNameError');
const invoiceError = document.querySelector('#invoiceError');
const passError = document.querySelector('#passError');

const Comenzar = document.querySelector('#Comenzar');

Comenzar.addEventListener('click', (event)=>{
    event.preventDefault();
    validateEmpty(firstName.value, firstName, firstNameError, 'nombre');
    validateEmpty(invoice.value, invoice, invoiceError, 'factura');
    validateEmpty(password.value, password, passError, 'telefono');
});


function validateEmpty(valueInput, divInput, divError, nameInput){
    if(valueInput.length == 0){
        showError(divInput, divError, `No puede estar vacío tu ${nameInput}`);
    }else{
        hideError(divInput, divError);
    }
}

function showError(divInput, divError, error){
    divInput.style.border = ' 1px solid red';
    divError.innerHTML = `<img class="icon-error" src="./images/icon-error.svg" alt="">
    <p class="error">${error}</p>`
}

function hideError(divInput, divError){
    divInput.style.border = ' 1px solid hsl(246, 25%, 77%)';
    divError.innerHTML = ``
}*/