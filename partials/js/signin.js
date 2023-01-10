const signinForm = document.querySelector(".signin-form");
const signinBtn = document.querySelector(".signinBtn");
const closeBtn = document.querySelector(".closeBtn");
const signInAlertMsg = document.querySelector(".alert-messages");
const userPassword = document.querySelector(".userPassword #userPassword");
const upEyeIcon = document.querySelector(".userPassword i");

// TODO Forgot Password Form
const forgotPasswordForm = document.querySelector(".forgot-password-form");
const submitBtn = document.querySelector(".submitBtn");
const forgotPasswordAlertMsg = document.querySelector(".forgot-password-form .alert-messages");

// TODO Unhold User Account Form
const unholdUserAccountForm = document.querySelector(".user-account-unhold-form");
const unholdReturnMessage = document.querySelector(".unholdReturnMessage");

// TODO Change Password (Forgot Password)
const changePasswordForm = document.querySelector(".change-password-form");
const resetBtn = document.querySelector(".resetBtn");
const changePasswordModal = new bootstrap.Modal(document.querySelector("#changePasswordModal"), {keyboard: false});
const userUniqueIdFP = document.querySelector(".userUniqueIdFP").value;
const passwordFP = document.querySelectorAll(".passwordFP");
const newPasswordFP = document.querySelector("#newPasswordFP");
const cNewPasswordFP = document.querySelector("#cNewPasswordFP");
const changePasswordAlertMsg = document.querySelector(".change-password-form .alert-messages");

console.log(userUniqueIdFP);

if (userUniqueIdFP) {
    changePasswordModal.show();
}

passwordFP.forEach((element) => {
    element.onkeypress = ()=> {
        setInterval(()=> {
            if (newPasswordFP.value != "" && cNewPasswordFP.value != "" ) {
                resetBtn.style.display = 'block';
            } else {
                resetBtn.style.display = 'none';
            }
        },  100);
    }
})

changePasswordForm.onsubmit = (e)=> {
    e.preventDefault();
}

resetBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "partials/php/change-password-fp", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Success!', 'You can sign in now your account!', 'success').then(function() {
                        window.location.href = "index.php?route=home";
                    });
                } else {
                    changePasswordAlertMsg.style.display = "block";
                    changePasswordAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(changePasswordForm);
    xhr.send(formData);
}

// TODO Sign in
signinForm.onsubmit = (e)=> {
    e.preventDefault();
}

signinBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "partials/php/signin", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "patient") {
                    window.location.href = "index.php?route=my-home";
                } else if (data === "guest") {
                    window.location.href = "index.php?route=my-home";
                } else if (data === "admin") {
                    window.location.href = "./admin/index.php?route=buildings";
                } else {
                    signInAlertMsg.style.display = "block";
                    signInAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(signinForm);
    xhr.send(formData);
}

closeBtn.onclick = ()=> { 
    signInAlertMsg.style.display = "none";
}

upEyeIcon.onclick = ()=> {
    if (userPassword.type === "password") {
        userPassword.type = "text";
        upEyeIcon.classList.add("active");
    } else {
        userPassword.type = "password";
        upEyeIcon.classList.remove("active");
    }
}

// TODO Forgot Password
forgotPasswordForm.onsubmit = (e)=> {
    e.preventDefault();
}

submitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "partials/php/forgot-password", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Success!', 'Please check you email for your reset password verification!', 'success').then(function() {
                        window.location.href = "index.php?route=home";
                    });
                } else {
                    forgotPasswordAlertMsg.style.display = "block";
                    forgotPasswordAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(forgotPasswordForm);
    xhr.send(formData);
}

// TODO Unhold User Account 
setInterval(()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "partials/php/unhold", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    unholdReturnMessage.value = data;
                } 
            }
        }
    }
    let formData = new FormData(unholdUserAccountForm);
    xhr.send(formData);
},  1000);

//    for (var pair of formData.entries())
//     {
//     console.log(pair[0]+ ', '+ pair[1]); 
//     }