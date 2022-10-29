const openform_a = document.getElementById("user-li")
const mainForm = document.getElementById("mainForm")
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
    if (event.target.id !== "mainForm" && event.target.style.display === "block") {
        mainForm.style.display = "none"
    }

}

openform_a.addEventListener("click", () => {
    mainForm.style.display = "block"
})
mainForm.addEventListener("click", (event) => {
    if (event.target.id === "closeF") {
        mainForm.style.display = "none"
    }
})