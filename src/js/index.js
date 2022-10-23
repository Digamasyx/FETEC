import { options, getElementData, getPos } from './functions/index.js'

// Catalog
const catalog_body = document.getElementById("catalog_body")

const modal = document.createElement("div")
const modal_content = document.createElement("p")

// Header
const user_body = document.getElementById("user")

const user_modal = document.createElement("div")

user_body.addEventListener("click", (event) => {
    console.log(`Top ${getPos(user_body, [1, 0]).vertical}`)
})

catalog_body.addEventListener("click", (event) => {

    if(event.target.id.toLowerCase().includes("catalog_body")) {
        return
    }
    
    const clicked_element = document.getElementById(event.target.id)
    

    modal_content.innerText = "Lorem"

    modal.setAttribute("id", "modal")
    modal_content.setAttribute("id", "modal_content")
    
    modal.appendChild(modal_content)
    document.body.appendChild(modal)
    
    modal.style.display = "block"

})

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none"
    }
}