const contactUsForm = document.querySelector(".contact-us-form");
const contactUsBtn = document.querySelector(".contactUsBtn");
const contactUsAlertMsg = document.querySelector(".alert-messages");

contactUsForm.onsubmit = (e)=> {
    e.preventDefault();
}

contactUsBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "partials/php/submit-contact-us", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Success!', 'Your message submitted!', 'success').then(function() {
                        // window.location = document.referrer;
                        window.location.href = window.location.href;
                        // window.location.href = "index.php?route=signup";
                    });
                } else {
                    contactUsAlertMsg.style.display = "block";
                    contactUsAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(contactUsForm);
    xhr.send(formData);
}