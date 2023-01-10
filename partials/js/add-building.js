const addBuildingForm = document.querySelector(".add-building-form");
const addBBtn = document.querySelector(".addBBtn");
const addBAlertMsg = document.querySelector(".alert-messages");
const addBCloseIcon = document.querySelector(".addBCloseIcon");
const addBCloseBtn = document.querySelector(".addBCloseBtn");

const generateQRCode = document.querySelector("#generateQRCode");
// const generateQRCode = document.querySelector("#generateQRCode");
const qrCodeInput = document.querySelector("#buildingName");
const generateQRBtn = document.querySelector(".generateQRBtn");
const qrCodeImg = document.querySelector(".qr-code img");
const generatedQRCode = document.querySelector(".qr-url");
const downloadQRCodeBtn = document.querySelector(".addBBtn");

addBuildingForm.onsubmit = (e)=> {
    e.preventDefault();
}

addBBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../partials/php/add-building", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    downloadQRCodeBtn.innerHTML = '<strong><i class="fa-solid fa-spinner me-2"></i>Downloading QR Code...</strong>';
                    fetchFile(generatedQRCode.value);

                    swal('Success!', 'New building added successfully!', 'success').then(function() {
                        // window.location = document.referrer;
                        // window.location.href = window.location.href;
                        window.location.href = "index.php?route=buildings";
                    });
                } else {
                    addBAlertMsg.style.display = "block";
                    addBAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addBuildingForm);
    xhr.send(formData);
}

let preValue;

generateQRBtn.addEventListener("click", () => {
    let qrValue = "HDMS/index.php?mab=" + qrCodeInput.value.trim();
    if (!qrValue || preValue === qrValue) {
        addBAlertMsg.style.display = "block";
        addBAlertMsg.textContent = "Please filled up all fields!";
    } else {
        addBAlertMsg.style.display = "none";
        preValue = qrValue;
        generateQRBtn.innerHTML = '<strong><i class="fa-solid fa-spinner me-2"></i>Generating QR Code...</strong>';
        qrCodeImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue}`;
        generatedQRCode.value = qrCodeImg.src;
        qrCodeImg.addEventListener("load", () => {
            // generateQRCode.classList.add("d-block");
            generateQRCode.style.display = "block";
            downloadQRCodeBtn.style.display = "block";
            generateQRBtn.innerHTML = '<strong><i class="fa-solid fa-square-plus me-2"></i>Generating QR Code</strong>';
            generateQRBtn.style.display = "none";
        });
    };
});

qrCodeInput.addEventListener("keyup", () => {
    if(!qrCodeInput.value.trim()) {
        wrapper.classList.remove("active");
        preValue = "";
    }
});

// downloadQRCodeBtn.addEventListener("click", e => {
//     e.preventDefault();
//     downloadQRCodeBtn.innerHTML = '<strong><i class="fa-solid fa-spinner me-2"></i>Downloading QR Code...</strong>';
//     fetchFile(generatedQRCode.value);
// });

function fetchFile(url) {
    fetch(url).then(res => res.blob()).then(file => {
        let tempUrl = URL.createObjectURL(file);
        const aTag = document.createElement("a");
        aTag.href = tempUrl;
        // aTag.download = url.replace(/^.*[\\\/]/, '');
        aTag.download = qrCodeInput.value.trim();
        document.body.appendChild(aTag);
        aTag.click();
        downloadQRCodeBtn.innerHTML = '<strong><i class="fa-solid fa-download me-2"></i>Download QR Code</strong>';
        URL.revokeObjectURL(tempUrl);
        aTag.remove();
    }).catch(() => {
        alert("Failed to download file!");
        downloadQRCodeBtn.innerHTML = '<strong><i class="fa-solid fa-download me-2"></i>Download QR Code</strong>';
    });
}

addBCloseBtn.onclick = ()=> { 
    addBAlertMsg.style.display = "none";
    generateQRCode.style.display = "none";
    downloadQRCodeBtn.style.display = "none";
    generateQRBtn.style.display = "block";
}

addBCloseIcon.onclick = ()=> { 
    addBAlertMsg.style.display = "none";
    generateQRCode.style.display = "none";
    downloadQRCodeBtn.style.display = "none";
    generateQRBtn.style.display = "block";
}