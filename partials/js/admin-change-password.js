const adminCPassForm = document.querySelector(".admin-cpassword-form");
const adminCPassBtn = document.querySelector(".adminChangePassBtn");
const adminCPassAlertMsg = document.querySelector(".admin-cpassword-form .alert-messages");
const adminCurPassword = document.querySelector(".admin-cpassword-form .adminCurPassword #adminCurPassword");
const acurpEyeIcon = document.querySelector(".admin-cpassword-form .adminCurPassword i");
const adminPassword = document.querySelector(".admin-cpassword-form .adminPassword #adminPassword");
const apEyeIcon = document.querySelector(".admin-cpassword-form .adminPassword i");
const adminCPassword = document.querySelector(".admin-cpassword-form .adminCPassword #adminCPassword");
const acpEyeIcon = document.querySelector(".admin-cpassword-form .adminCPassword i");

adminCPassForm.onsubmit = (e)=> {
    e.preventDefault();
}

adminCPassBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../partials/php/admin-change-password", true);
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
                    adminCPassAlertMsg.style.display = "block";
                    adminCPassAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(adminCPassForm);
    xhr.send(formData);
}

acurpEyeIcon.onclick = ()=> {
    if (adminCurPassword.type === "password") {
        adminCurPassword.type = "text";
        acurpEyeIcon.classList.add("active");
    } else {
        adminCurPassword.type = "password";
        acurpEyeIcon.classList.remove("active");
    }
}

apEyeIcon.onclick = ()=> {
    if (adminPassword.type === "password") {
        adminPassword.type = "text";
        apEyeIcon.classList.add("active");
    } else {
        adminPassword.type = "password";
        apEyeIcon.classList.remove("active");
    }
}

acpEyeIcon.onclick = ()=> {
    if (adminCPassword.type === "password") {
        adminCPassword.type = "text";
        acpEyeIcon.classList.add("active");
    } else {
        adminCPassword.type = "password";
        acpEyeIcon.classList.remove("active");
    }
}