// --------------------------------------------------form validation script--------------------------------------------------

// input variables

var form = document.getElementById('form');
var fullName = document.getElementById('fullName');
var email = document.getElementById('email');
var password = document.getElementById('password');
var repeatPassword = document.getElementById('repeatPassword');


// error messages variables

var FullNameInputHelp = document.getElementById('FullNameInputHelp');
var EmailInputHelp = document.getElementById('EmailInputHelp');
var PasswordInputHelp = document.getElementById('PasswordInputHelp');
var ReapeatPasswordInputHelp = document.getElementById('ReapeatPasswordInputHelp');

// Regex values

const NameRegex = /^[A-Za-z]+(?: [A-Za-z]+)*$/;
const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PasswordRegex = /^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/;

// Submit only after all values are correct function

form.addEventListener('submit', e => {
  e.preventDefault();

  var passwordValue = password.value;

  if(NameRegex.test(fullName.value) && EmailRegex.test(email.value) && PasswordRegex.test(password.value) && (passwordValue === repeatPassword)){
    form.submit();
  }
})

// Full Name Error Check

fullName.addEventListener('input', function(e) { 
  var currentValue = e.target.value;
  var valid = NameRegex.test(currentValue);

  if(!valid){
    FullNameInputHelp.style.display = 'block';
    fullName.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400";
  } else {
    FullNameInputHelp.style.display = 'none';
    fullName.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light";
  }
})

// Email Error Check

email.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = EmailRegex.test(currentValue);

  if(!valid){
    EmailInputHelp.style.display = 'block';
    email.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400";
  } else {
    EmailInputHelp.style.display = 'none';
    email.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light";
  }
})

// Password Error Check

password.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = PasswordRegex.test(currentValue);

  if(!valid){
    PasswordInputHelp.style.display = 'block';
    password.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400";
  } else {
    PasswordInputHelp.style.display = 'none';
    password.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light";
  }
})

// Password Repeat Match Check

repeatPassword.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var passwordValue = password.value;

  if(!(passwordValue === currentValue)){
    ReapeatPasswordInputHelp.style.display = 'block';
    repeatPassword.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400";
  } else {
    ReapeatPasswordInputHelp.style.display = 'none';
    repeatPassword.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light";
  }
})