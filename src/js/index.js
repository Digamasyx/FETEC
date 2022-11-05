// Imports
import { getPos } from "./functions/getPos.js"



// User Open Form Div
const openform_a = document.getElementById("user-li")
// Main Form || Login Form
const mainForm = document.getElementById("mainForm")
// Sub Form || Register Form
const subForm = document.getElementById("subForm")
// (If Logged Only) It will substitute the main form with a config popup
const userConfig = document.getElementById("userConfig")

/* This is a read-only object, 
 * which contains listeners for the forms and returns void or null, 
 * and its frozen by Object.freeze()
 */
const inputs_ = {
    text: document.getElementById("warning-text"),
    subText: document.getElementById("warning-text-"),
    form : [
        mainForm.addEventListener("keyup", (event) => {
        inputs_.text.style.display = (event.getModifierState("CapsLock")) ? "block" : "none"
        }),
        subForm.addEventListener("keyup", (event) => {
            inputs_.subText.style.display = (event.getModifierState("CapsLock")) ? "block" : "none"
        })
    ]
}
Object.freeze(inputs_)


/* This element contains the following message,
 * pt-br (Não possui conta? Registre-se),
 * en-us (Don't have an account? register)
 */
const reg_main = document.getElementById("reg-main")
/*
 * This element its the secondary body in it contains the cards
 */
const catalog_body = document.getElementById("catalog_body")

/*
 * This parts creates elements for futher use 
 */
const modal = document.createElement("div")
const modal_content = document.createElement("p")


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

}

openform_a.addEventListener("click", () => {
    for (const child of openform_a.children) {
        if (child.id === "user") {
            mainForm.style.display = "block"
        } else if (child.id === "user_") {
            userConfig.style.left = getPos(openform_a).offSet.left + "px"
            userConfig.style.display = "block"
        }
    }
})


reg_main.addEventListener("click", (event) => {
    if (event.target.id === reg_main.id) {
        mainForm.style.display = "none"
        subForm.style.display = "block"
    }
})

mainForm.addEventListener("click", (event) => {
    if (event.target.id === "closeF") {
        mainForm.style.display = "none"
    }
})
subForm.addEventListener("click", (event) => {
    if (event.target.id === "closeF-sub") {
        subForm.style.display = "none"
    }
})
