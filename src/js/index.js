// Imports
import Getter from './functions/index.js' 

const subModal = document.getElementById('subModal');
const subOffCanvas = document.getElementById("subSubOffCanvas");
const Getter_ = new Getter();

subModal.addEventListener('show.bs.modal', (event) => {

    const REGIOES = {
        1: "Norte",
        2: "Nordeste",
        3: "Sul",
        4: "Sudeste",
        5: "Centro Oeste"
    }

    const data = Getter_.getData("data")


    const clickedElement = {
        main: document.getElementById(event.relatedTarget.id),
        idInt: parseInt(document.getElementById(event.relatedTarget.id).id.charAt(document.getElementById(event.relatedTarget.id).id.length - 1), 10)
    }

    const clickedData = {
        img: clickedElement.main.querySelector('.card-img-top').src,
        title: clickedElement.main.querySelector('.card-title'),
        desc: clickedElement.main.querySelector('.card-text')
    }

    const modalElements = {
        title: subModal.querySelector("#subModalLabel").innerText = clickedData.title.innerText,
        img: subModal.querySelector("#subModalImg").src = clickedData.img,
        desc: subModal.querySelector("#subModalDesc").innerText = clickedData.desc.innerText,
        fullDesc: subModal.querySelector("#subModalFullDesc").innerText = data[clickedElement.idInt]['fullDesc'],
        nome: subModal.querySelector("#subModalName").innerText = data[clickedElement.idInt]['nomePl'],
        regiao: subModal.querySelector("#subModalLocal").innerText = REGIOES[data[clickedElement.idInt]['regiao']],
        nomeCientifico: subModal.querySelector("#subModalSurName").innerText = data[clickedElement.idInt]['nomeCientifico'],
        criador: subModal.querySelector("#subModalCreator").innerText = data[clickedElement.idInt]['criador'].replace("_", "#")
    }

})

const subCanvas = document.getElementById("subOffCanvas");
const pseudoId = document.getElementById("basic-addon2");
const pseudoId_ = document.getElementById("basic-addon2_")

subCanvas.addEventListener("show.bs.offcanvas", (event) => {
    let value = Getter_.getData("pseudoid");

    const PseudoChange = {
        value: pseudoId.value = value,
        text: pseudoId.innerText = value,
        value_: pseudoId_.value = value,
    }

    subCanvas.addEventListener("shown.bs.offcanvas", (event) => {
        pseudoId.addEventListener("click", () => {
            value = Getter_.getData("pseudoid");
            PseudoChange.value = pseudoId.value = value
            PseudoChange.value_ = pseudoId_.value = value
            PseudoChange.text = pseudoId.innerText = value
        })
    })
})

subOffCanvas.addEventListener("show.bs.offcanvas", (event) => {
    let isValid;
    const exit = document.getElementById("exitBtn");
    const passChang = {
        pass: document.getElementById("passChange"),
        confirm: document.getElementById("passChangeConfirm")
    };

    const checkBox = document.getElementById("confirmCheck");
    const changButton = document.getElementById("btnChang");

    const msgConf = document.getElementById("accDelete");
    const confCheck = document.getElementById("confirmDelete");
    const confBtn = document.getElementById("deleteConfirm");

    msgConf.addEventListener("keyup", () => {
        if (msgConf.value.toLowerCase() !== "confirmo") {
            msgConf.classList.remove("is-valid");
            msgConf.classList.add("is-invalid");
            isValid = false;
        } else {
            msgConf.classList.remove("is-invalid");
            msgConf.classList.add("is-valid");
            isValid = true;
        }
    })

    confCheck.addEventListener("change", () => {
        if (isValid === true) {
            Getter_.deleteAcc(confBtn);
        }
    })

    passChang.pass.addEventListener("keyup", () => {
        if (passChang.pass.value !== passChang.confirm.value) {
            passChang.pass.classList.remove("is-valid")
            passChang.confirm.classList.remove("is-valid")
            passChang.pass.classList.add("is-invalid")
            passChang.confirm.classList.add("is-invalid")
        } else {
            passChang.pass.classList.remove("is-invalid")
            passChang.confirm.classList.remove("is-invalid")
            passChang.pass.classList.add("is-valid")
            passChang.confirm.classList.add("is-valid")
        }
    })

    passChang.confirm.addEventListener("keyup", () => {
        if (passChang.pass.value !== passChang.confirm.value) {
            passChang.pass.classList.remove("is-valid")
            passChang.confirm.classList.remove("is-valid")
            passChang.pass.classList.add("is-invalid")
            passChang.confirm.classList.add("is-invalid")
        } else {
            passChang.pass.classList.remove("is-invalid")
            passChang.confirm.classList.remove("is-invalid")
            passChang.pass.classList.add("is-valid")
            passChang.confirm.classList.add("is-valid")
        }
    })

    checkBox.addEventListener("change", () => {
        Getter_.changePass(passChang, changButton, checkBox);
    })

    exit.addEventListener("click", () => {
        Getter_.destroySession();
    })
})


window.addEventListener("load", () => {
    try {
        const toast = document.getElementById("liveToast");
        const err = {
            msg: document.getElementById("errorMsg"),
            val: document.getElementById("errorVal")
        }
        Getter_.accExists(toast, [err]);
    } catch (e) {
        throw console.log(e);
    }
})
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
const toastElList = document.querySelectorAll('.toast')
const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl))