const generateQRCode = document.querySelector("#generateQRCode");
const qrCodeInput = document.querySelector("#qrCodeInput");
const generateQRBtn = document.querySelector(".generateQRBtn");
const qrCodeImg = document.querySelector(".qr-code img");
const generatedQRCode = document.querySelector(".qr-url");
const downloadQRCodeBtn = document.querySelector(".qr-download-btn");

let preValue;

generateQRBtn.addEventListener("click", () => {
    let qrValue = qrCodeInput.value.trim();
    if(!qrValue || preValue === qrValue) return;
    preValue = qrValue;
    generateQRBtn.innerHTML = '<strong><i class="fa-solid fa-spinner me-2"></i>Generating QR Code...</strong>';
    qrCodeImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue}`;
    generatedQRCode.value = qrCodeImg.src;
    qrCodeImg.addEventListener("load", () => {
        generateQRCode.classList.add("active");
        downloadQRCodeBtn.style.display = "block";
        generateQRBtn.innerHTML = '<strong><i class="fa-solid fa-square-plus me-2"></i>Generating QR Code</strong>';
    });
});

qrCodeInput.addEventListener("keyup", () => {
    if(!qrCodeInput.value.trim()) {
        wrapper.classList.remove("active");
        preValue = "";
    }
});

downloadQRCodeBtn.addEventListener("click", e => {
    e.preventDefault();
    downloadQRCodeBtn.innerHTML = '<strong><i class="fa-solid fa-spinner me-2"></i>Downloading QR Code...</strong>';
    fetchFile(generatedQRCode.value);
});

function fetchFile(url) {
    fetch(url).then(res => res.blob()).then(file => {
        let tempUrl = URL.createObjectURL(file);
        const aTag = document.createElement("a");
        aTag.href = tempUrl;
        // aTag.download = url.replace(/^.*[\\\/]/, '');
        aTag.download = "qr-code";
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