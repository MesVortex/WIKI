// --------------------------------------------------form validation script--------------------------------------------------

// input variables

var form = document.getElementById('form');
var email = document.getElementById('email');
var password = document.getElementById('password');


// error messages variables

var EmailInputHelp = document.getElementById('EmailInputHelp');
var PasswordInputHelp = document.getElementById('PasswordInputHelp');

// Regex values

const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PasswordRegex = /^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/;

// Submit only after all values are correct function

form.addEventListener('submit', e => {
  e.preventDefault();

  if(EmailRegex.test(email.value) && PasswordRegex.test(password.value)){
    form.submit();
  }
})

email.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = EmailRegex.test(currentValue);

  if(!valid){
    EmailInputHelp.style.display = 'block';
    email.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    EmailInputHelp.style.display = 'none';
    email.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5";
  }
})

// Password Error Check

password.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = PasswordRegex.test(currentValue);

  if(!valid){
    PasswordInputHelp.style.display = 'block';
    password.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    PasswordInputHelp.style.display = 'none';
    password.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5";
  }
})
