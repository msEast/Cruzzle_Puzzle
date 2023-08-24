document.addEventListener('DOMContentLoaded', function() {
    const loginTab = document.getElementById('login-tab');
    const signupTab = document.getElementById('signup-tab');
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
  
    loginTab.addEventListener('click', function() {
      loginForm.classList.add('active');
      signupForm.classList.remove('active');
      loginTab.classList.add('active');
      signupTab.classList.remove('active');
    });
  
    signupTab.addEventListener('click', function() {
      loginForm.classList.remove('active');
      signupForm.classList.add('active');
      loginTab.classList.remove('active');
      signupTab.classList.add('active');
    });
  });
  