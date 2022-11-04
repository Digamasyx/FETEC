const openform_a = document.getElementById("user-li")
const mainForm = document.getElementById("mainForm")
const subForm = document.getElementById("subForm")

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

const reg_main = document.getElementById("reg-main")
// Catalog
const catalog_body = document.getElementById("catalog_body")

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
    mainForm.style.display = "block"
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

