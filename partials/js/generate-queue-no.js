const generateQueueNoForm = document.querySelector(".generate-queueno-form");
const generateQueueNoBtn = document.querySelector(".generateQueueNoBtn");
const generateQNAlertMsg = document.querySelector(".generate-queueno-form .alert-messages");
const generateQNModal = new bootstrap.Modal(document.querySelector("#generateQNModal"), {keyboard: false});
const buildingNumber = document.querySelector(".buildingNumber");
const queueNumber = document.querySelector(".queueNumber");
const doneBtn = document.querySelector(".doneBtn");

generateQueueNoForm.onsubmit = (e)=> {
    e.preventDefault();
}

generateQueueNoBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'json';
    xhr.open("POST", "partials/php/generate-queue-no", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data.returnMessage === "success") {
                    swal('Success!', 'Generate New Queue No.:!', 'success').then(function() {
                        // window.location.href = "index.php?route=my-home";
                        dataPAgreementModal.hide();
                        generateQNModal.show();
                        buildingNumber.textContent = data.buildingNo;
                        queueNumber.textContent = data.queueNo;
                        doneBtn.href = "index.php?route=my-settings&action=my-hdf&view="+data.declarationUniqueId;
                        // declarationUniqueId.value = data.substring(15);
                    });
                } else if (data === "failed") {
                    swal('Warning!', 'It seems something wrong happened. Please try fill up new health declaration!', 'warning').then(function() {
                        window.location.href = "index.php?route=my-home";
                    });
                } else {
                    generateQNAlertMsg.style.display = "block";
                    generateQNAlertMsg.textContent = data;
                } 
                
            }
        }
    }
    let formData = new FormData(generateQueueNoForm);
    xhr.send(formData);
}




