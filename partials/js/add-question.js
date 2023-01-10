const addQuestionForm = document.querySelector(".add-question-form");
const submitQBtn = document.querySelector(".submitNewQBtn");
const addQAlertMsg = document.querySelector(".alert-messages");

addQuestionForm.onsubmit = (e)=> {
    e.preventDefault();
}

submitQBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../partials/php/add-question", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Success!', 'New question added successfully!', 'success').then(function() {
                        // window.location = document.referrer;
                        // window.location.href = window.location.href;
                        window.location.href = "index.php?route=questions";
                    });
                } else {
                    addQAlertMsg.style.display = "block";
                    addQAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addQuestionForm);
    xhr.send(formData);
}