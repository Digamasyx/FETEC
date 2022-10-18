const card_root = document.getElementById("card")
const catalog_body = document.getElementById("catalog_body")

const modal = document.createElement("div")
const modal_content = document.createElement("p")


card_root.onclick = function() {

    modal_content.innerText = "Lorem"

    modal.setAttribute("id", "modal")
    modal_content.setAttribute("id", "modal_content")
    
    modal.appendChild(modal_content)
    document.body.appendChild(modal)
    
    modal.style.display = "block"

    if(modal.style.display === "block") {
    }
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none"
    }
}