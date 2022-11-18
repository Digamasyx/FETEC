// Imports
import { default as Getter } from './functions/index.js' 

const subModal = document.getElementById('subModal')

subModal.addEventListener('show.bs.modal', (event) => {

    const REGIOES = {
        1: "Norte",
        2: "Nordeste",
        3: "Sul",
        4: "Sudeste",
        5: "Centro Oeste"
    }

    const data = Getter.getData("data")


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
        nomeCientifico: subModal.querySelector("#subModalSurName").innerText = data[clickedElement.idInt]['nomeCientifico']
    }

})

const subCanvas = document.getElementById("subOffCanvas");
const pseudoId = document.getElementById("basic-addon2");
const pseudoId_ = document.getElementById("basic-addon2_")

subCanvas.addEventListener("show.bs.offcanvas", (event) => {
    let value = Getter.getData("pseudoid");

    const PseudoChange = {
        value: pseudoId.value = value,
        text: pseudoId.innerText = value,
        value_: pseudoId_.value = value,
    }

    subCanvas.addEventListener("shown.bs.offcanvas", (event) => {
        pseudoId.addEventListener("click", () => {
            value = Getter.getData("pseudoid");
            PseudoChange.value = pseudoId.value = value
            PseudoChange.value_ = pseudoId_.value = value
            PseudoChange.text = pseudoId.innerText = value
        })
    })
})



const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));