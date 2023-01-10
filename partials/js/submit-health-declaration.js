const healthDecForm = document.querySelector(".healthdec-form");
const submitHealthDec = document.querySelector(".submitHealthDec");
const healthDecAlertMsg = document.querySelector(".healthdec-form .alert-messages");
const closeBtn = document.querySelector(".closeBtn");
const healthDecContent = document.querySelector(".health-declaration-content");
const otherUserComorbidity = document.querySelector("#otherUserComorbidity");
const otherUserComorbidityLabel = document.querySelector("#otherUserComorbidityLabel");
const dataPAgreementModal = new bootstrap.Modal(document.querySelector("#dataPAgreementModal"), {keyboard: false});
const hdFormModal = new bootstrap.Modal(document.querySelector("#hdFormModal"), {keyboard: false});
const dataAgreement = document.querySelector("#dataAgree");
const dataAgreementCheckBox = document.querySelector(".generateQueueNoBtn");
const resetHDContentBtn = document.querySelector(".resetHDContentBtn");
const resetHDContentIcon = document.querySelector(".resetHDContentIcon");
const declarationUniqueId = document.querySelector("#declarationUniqueId");

healthDecForm.onsubmit = (e)=> {
    e.preventDefault();
}

submitHealthDec.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'json';
    xhr.open("POST", "partials/php/submit-health-declaration", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "failed") {
                    swal('Warning!', 'You have possible symptoms of COVID-19 virus based on your answers in your Health Declaration Form. Moreover, due to the strong restrictions, protocols, and guidelines from IATF you will not be able to enter to PHMC-B. Thank you for understaing and keep safe!', 'warning').then(function() {
                        window.location.href = "index.php?route=signout";
                    });
                } else if (data === "success_guest") {
                    swal('Success!', 'Your health declaration submitted!', 'success').then(function() {
                        window.location.href = "index.php?route=my-home";
                    });
                } else if (data.returnMessage === "success_patient") {
                    swal('Success!', 'Your health declaration submitted!', 'success').then(function() {
                        hdFormModal.hide();
                        healthDecAlertMsg.style.display = "none";
                        dataPAgreementModal.show();
                        declarationUniqueId.value = data.declarationUniqueId;
                        // console.log(data);
                    });
                // } else if (data === "success_guest") {
                //     swal('Success!', 'Your health declaration submitted!', 'success').then(function() {
                //         window.location.href = "index.php?route=my-home";
                //     });
                } else {
                    healthDecAlertMsg.style.display = "block";
                    healthDecAlertMsg.textContent = data;
                }

                // else {
                //     swal('Success!', 'Your health declaration submitted!', 'success').then(function() {
                //         // window.location.href = "index.php?route=my-home";
                //         hdFormModal.hide();
                //         dataPAgreementModal.show();
                //         declarationUniqueId.value = data;
                //     });
                // }
            }
        }
    }
    let formData = new FormData(healthDecForm);
    xhr.send(formData);
}

// setInterval(() => {
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "partials/php/get-health-declaration", true);
//     xhr.onload = ()=> {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             if (xhr.status === 200) {
//                 let data = xhr.response;
//                 healthDecContent.innerHTML = data;
//             }
//         }
//     }
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhr.send();
// }, 500);

closeBtn.onclick = ()=> { 
    otherUserComorbidity.style.display = "none";
    otherUserComorbidityLabel.style.display = "none";
}

others = (other)=> { 
    if (other == 'Other') {
        otherUserComorbidity.style.display = 'block';
        otherUserComorbidityLabel.style.display = 'block';
    } else {
        otherUserComorbidity.style.display = 'none';
        otherUserComorbidityLabel.style.display = 'none';
    }      
}

dataAgreement.onclick = ()=> { 
    if (dataAgreement.checked == true) {
        dataAgreementCheckBox.style.display = 'block';
    } else {
        dataAgreementCheckBox.style.display = 'none';
    } 
}
resetHDContentBtn.onclick = ()=> { 
    healthDecForm.reset(); 
}

resetHDContentIcon.onclick = ()=> { 
    healthDecForm.reset(); 
}