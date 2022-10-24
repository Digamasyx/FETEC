import { options, getElementData, getPos, createForm } from './functions/index.js'

// Catalog
const catalog_body = document.getElementById("catalog_body")

const modal = document.createElement("div")
const modal_content = document.createElement("p")

// Header
const user_body = document.getElementById("user")

const user_modal = document.createElement("div")
const user_content = document.createElement("div")


user_body.addEventListener("click", (event) => {

    user_modal.setAttribute("id", "user_modal")
    user_content.setAttribute("id", "user_content")
    user_content.appendChild(createForm(user_content).full_form)
    user_modal.appendChild(user_content)

    document.body.appendChild(user_modal)

    user_modal.style.display = "block"
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
    if (event.target === modal) {
        modal.style.display = "none"
    }
    if (event.target === user_modal) {
        user_modal.style.display = "none"
    }
}

user_content.addEventListener("click", (event) => {
    if (event.target.id === "input-ch") {
        const check = document.getElementById("input-ch")
        const pass = document.getElementById("input-pass")
        if(check.checked) {
            pass.setAttribute("type", "text")
        } else {
            pass.setAttribute("type", "password")
        }

    }
})