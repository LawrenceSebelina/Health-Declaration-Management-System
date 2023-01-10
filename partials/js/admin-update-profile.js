const adminUpdateProfile = document.querySelector(".admin-uprofile-form");
const adminUpdateProfBtn = document.querySelector(".adminUpdateProfBtn");
const adminUpdateProfAlertMsg = document.querySelector(".admin-uprofile-form .alert-messages");

adminUpdateProfile.onsubmit = (e)=> {
    e.preventDefault();
}

adminUpdateProfBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../partials/php/admin-update-profile", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Success!', 'New profile information saved successfully!', 'success').then(function() {
                        // window.location = document.referrer;
                        window.location.href = window.location.href;
                        // window.location.href = "index.php?route=form";
                    });
                } else {
                    adminUpdateProfAlertMsg.style.display = "block";
                    adminUpdateProfAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(adminUpdateProfile);
    xhr.send(formData);
}