const loginBtn = document.getElementById('login-btn');
const signupBtn = document.getElementById('signup-btn');
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');

// Show login form and hide signup form
loginBtn.addEventListener('click', () => {
    loginForm.style.display = 'block';
    signupForm.style.display = 'none';
    loginBtn.classList.add('btn-primary');
    loginBtn.classList.remove('btn-secondary');
    signupBtn.classList.add('btn-secondary');
    signupBtn.classList.remove('btn-primary');
});

// Show signup form and hide login form
signupBtn.addEventListener('click', () => {
    loginForm.style.display = 'none';
    signupForm.style.display = 'block';
    signupBtn.classList.add('btn-primary');
    signupBtn.classList.remove('btn-secondary');
    loginBtn.classList.add('btn-secondary');
    loginBtn.classList.remove('btn-primary');
});
