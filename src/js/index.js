import * as Functions from './functions/index.js'


var user_reg;
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
    user_content.appendChild(Functions.createLogin(user_content).full_form)
    user_modal.appendChild(user_content)

    document.body.appendChild(user_modal)

    user_modal.style.display = "block"


    user_reg = document.getElementById("reg-a")
    user_reg.addEventListener("click", (event) => {
            user_content.appendChild(Functions.createReg(user_content).full_form)
    })
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

document.body.oninput = function (event) {
    try {
        var pass = {
            pass_main: document.getElementById("input-pass"),
            pass_conf: document.getElementById("input-pass_")
        }
    } catch (e) {
        throw new Error(e)
    } finally {

        if (pass.pass_main !== null && pass.pass_conf !== null) {
            pass.pass_main.oninput = function (event) {
                if (pass.pass_main.value != pass.pass_conf.value) {
                    pass.pass_main.style.borderColor = "red"
                    pass.pass_conf.style.borderColor = "red"
                } else if (pass.pass_main.value == pass.pass_conf.value) {
                    pass.pass_main.style.borderColor = "#ced4da"
                    pass.pass_conf.style.borderColor = "#ced4da"
                    console.log("Same")
                }
            }

            pass.pass_conf.oninput = function (event) {
                if (pass.pass_main.value !== pass.pass_conf.value) {
                    pass.pass_main.style.borderColor = "red"
                    pass.pass_conf.style.borderColor = "red"
                } else if (pass.pass_main.value == pass.pass_conf.value) {
                    pass.pass_main.style.borderColor = "#ced4da"
                    pass.pass_conf.style.borderColor = "#ced4da"
                    console.log("Same")
                }
            }
        }
    }
}


user_content.addEventListener("click", (event) => {
    if (event.target.id === "input-ch") {
        const check = document.getElementById("input-ch")
        const pass = {
            pass_main: document.getElementById("input-pass"),
            pass_conf: document.getElementById("input-pass_")
        }

        if(check.checked) {
            if (pass.pass_main === null) { return } else { pass.pass_main.setAttribute("type", "text") }
            if (pass.pass_conf === null) { return } else { pass.pass_conf.setAttribute("type", "text") }
        } else {
            if (pass.pass_main === null) { return } else { pass.pass_main.setAttribute("type", "password") }
            if (pass.pass_conf === null) { return } else { pass.pass_conf.setAttribute("type", "password") }
        }

    }
    
})
document.body.addEventListener("click", (event) => {
    try {
        if (event.target.id === "reg-b") {
            user_content.appendChild(Functions.createLogin(user_content).full_form)
        }
        if (event.target.id === "reg-a") {
            user_content.appendChild(Functions.createReg(user_content).full_form)
        }
    } catch (e) {

    }
})
 