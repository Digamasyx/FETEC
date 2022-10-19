import { options } from './functions/index.js'

const catalog_body = document.getElementById("catalog_body")

const modal = document.createElement("div")
const modal_content = document.createElement("p")


catalog_body.onclick = function(event) {

    if(!event.target.id.toLowerCase().includes("card")) {
        return
    }

    modal_content.innerText = "Lorem"

    modal.setAttribute("id", "modal")
    modal_content.setAttribute("id", "modal_content")
    
    modal.appendChild(modal_content)
    document.body.appendChild(modal)
    
    modal.style.display = "block"

}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none"
    }
}