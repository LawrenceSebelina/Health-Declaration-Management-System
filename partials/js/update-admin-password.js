const changePassForm = document.querySelector(".update-admin-password-form");
const changePassBtn = document.querySelector(".changeAdminPassBtn");
const changePassAlertMsg = document.querySelector(".update-admin-password-form .alert-messages");
// const updateAdminCurPassword = document.querySelector(".update-admin-password-form .adminCurPassword #adminCurPassword");
// const uacurpEyeIcon = document.querySelector(".update-admin-password-form .adminCurPassword i");
const updateAdminPassword = document.querySelector(".update-admin-password-form .adminPassword #adminPassword");
const uapEyeIcon = document.querySelector(".update-admin-password-form .adminPassword i");
const updateAdminCPassword = document.querySelector(".update-admin-password-form .adminCPassword #adminCPassword");
const uacpEyeIcon = document.querySelector(".update-admin-password-form .adminCPassword i");

changePassForm.onsubmit = (e)=> {
    e.preventDefault();
}

changePassBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../partials/php/update-admin-password", true);
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

// uacurpEyeIcon.onclick = ()=> {
//     if (updateAdminCurPassword.type === "password") {
//         updateAdminCurPassword.type = "text";
//         uacurpEyeIcon.classList.add("active");
//     } else {
//         updateAdminCurPassword.type = "password";
//         uacurpEyeIcon.classList.remove("active");
//     }
// }

uapEyeIcon.onclick = ()=> {
    if (updateAdminPassword.type === "password") {
        updateAdminPassword.type = "text";
        uapEyeIcon.classList.add("active");
    } else {
        updateAdminPassword.type = "password";
        uapEyeIcon.classList.remove("active");
    }
}

uacpEyeIcon.onclick = ()=> {
    if (updateAdminCPassword.type === "password") {
        updateAdminCPassword.type = "text";
        uacpEyeIcon.classList.add("active");
    } else {
        updateAdminCPassword.type = "password";
        uacpEyeIcon.classList.remove("active");
    }
}