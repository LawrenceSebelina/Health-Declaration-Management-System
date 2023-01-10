const editQuestionForm = document.querySelector(".edit-question-form");
const editQBtn = document.querySelector(".editQBtn");
// const alertMsg = document.querySelector(".alert-messages");

editQuestionForm.onsubmit = (e)=> {
    e.preventDefault();
}

editQBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../partials/php/edit-question", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Success!', 'Save changes successfully!', 'success').then(function() {
                        // window.location = document.referrer;
                        window.location.href = window.location.href;
                        // window.location.href = "index.php?route=signup";
                    });
                } 
                // else {
                //     alertMsg.style.display = "block";
                //     alertMsg.textContent = data;
                // }
            }
        }
    }
    let formData = new FormData(editQuestionForm);
    xhr.send(formData);
}