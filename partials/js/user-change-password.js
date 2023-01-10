const changePassForm = document.querySelector(".change-password-form");
const changePassBtn = document.querySelector(".changePassInfoBtn");
const changePassAlertMsg = document.querySelector(".change-password-form .alert-messages");
const userCurPassword = document.querySelector(".change-password-form .userCurPassword #userCurPassword");
const ucurpEyeIcon = document.querySelector(".change-password-form .userCurPassword i");
const userPassword = document.querySelector(".change-password-form .userPassword #userPassword");
const upEyeIcon = document.querySelector(".change-password-form .userPassword i");
const userCPassword = document.querySelector(".change-password-form .userCPassword #userCPassword");
const ucpEyeIcon = document.querySelector(".change-password-form .userCPassword i");

changePassForm.onsubmit = (e)=> {
    e.preventDefault();
}

changePassBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "partials/php/user-change-password", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Success!', 'New password saved successfully!', 'success').then(function() {
                        // window.location = document.referrer;
                        window.location.href = window.location.href;
                        // window.location.href = "index.php?route=form";
                    });
                } else {
                    changePassAlertMsg.style.display = "block";
                    changePassAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(changePassForm);
    xhr.send(formData);
}

ucurpEyeIcon.onclick = ()=> {
    if (userCurPassword.type === "password") {
        userCurPassword.type = "text";
        ucurpEyeIcon.classList.add("active");
    } else {
        userCurPassword.type = "password";
        ucurpEyeIcon.classList.remove("active");
    }
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

ucpEyeIcon.onclick = ()=> {
    if (userCPassword.type === "password") {
        userCPassword.type = "text";
        ucpEyeIcon.classList.add("active");
    } else {
        userCPassword.type = "password";
        ucpEyeIcon.classList.remove("active");
    }
}