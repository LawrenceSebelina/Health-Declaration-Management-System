const updateProfile = document.querySelector(".update-profile-form");
const updateUserProfBtn = document.querySelector(".updateUserInfoBtn");
const updateUserInfoAlertMsg = document.querySelector(".update-profile-form .alert-messages");

updateProfile.onsubmit = (e)=> {
    e.preventDefault();
}

updateUserProfBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "partials/php/user-update-profile", true);
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
                    updateUserInfoAlertMsg.style.display = "block";
                    updateUserInfoAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(updateProfile);
    xhr.send(formData);
}