const updateAdminAccForm = document.querySelector(".update-admin-form");
const updateAdminAccBtn = document.querySelector(".updateAdminAccount");
const updateAdminProfAlertMsg = document.querySelector(".update-admin-form .alert-messages");

updateAdminAccForm.onsubmit = (e)=> {
    e.preventDefault();
}

updateAdminAccBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../partials/php/update-admin-profile", true);
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
                    updateAdminProfAlertMsg.style.display = "block";
                    updateAdminProfAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(updateAdminAccForm);
    xhr.send(formData);
}