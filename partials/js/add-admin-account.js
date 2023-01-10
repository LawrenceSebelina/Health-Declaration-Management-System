const addAdminAccountForm = document.querySelector(".add-admin-form");
const addAdminAccBtn = document.querySelector(".addAdminAccount");
const addAdminAlertMsg = document.querySelector(".add-admin-form .alert-messages");
const adminPassword = document.querySelector(".add-admin-form .adminPassword #adminPassword");
const apEyeIcon = document.querySelector(".add-admin-form .adminPassword i");
const adminCPassword = document.querySelector(".add-admin-form .adminCPassword #adminCPassword");
const acpEyeIcon = document.querySelector(".add-admin-form .adminCPassword i");

addAdminAccountForm.onsubmit = (e)=> {
    e.preventDefault();
}

addAdminAccBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../partials/php/add-admin-account", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Registration Success!', 'New admin account created!', 'success').then(function() {
                        // window.location = document.referrer;
                        window.location.href = window.location.href;
                        // window.location.href = "index.php?route=signup";
                    });
                } else {
                    addAdminAlertMsg.style.display = "block";
                    addAdminAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addAdminAccountForm);
    xhr.send(formData);
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

//    for (var pair of formData.entries())
//     {
//     console.log(pair[0]+ ', '+ pair[1]); 
//     }