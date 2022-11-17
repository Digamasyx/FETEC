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

    const data = Getter.getData()


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
