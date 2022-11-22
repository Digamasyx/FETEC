export default class Getter {

    // Errors
    #errTypes;

    constructor() {
        this.#errTypes = ["Conta Existente", "Valores Incorretos Inseridos", "Post Com O Mesmo Nome Já Existe", "Senha Incorreta"];
    }


    deleteAcc(event) {
        const req = new XMLHttpRequest();

        event.disabled = !event.disabled

        event.addEventListener("click", () => {
            req.open("POST", "./../../src/php/fun/deleteAcc.php", false);
            req.send(null);
            if (req.responseText === "ACCDELETED") window.location.reload();
        })
    }

    changePass(data, event, main) {
        const req = new XMLHttpRequest();
        if (data.pass.value !== data.confirm.value) main.checked = !main.checked;
        if (data.pass.value === data.confirm.value) {
            if (event.disabled) { 
                event.disabled = !event.disabled; 
            }
            event.addEventListener("click", () => {
                req.open("POST", "./../../src/php/fun/changePass.php", false);
                req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                req.send("passChange="+data.pass.value);

                if (req.responseText === "PASSCHANGED") window.location.reload();
            })
        }
    } 

    destroySession() {
        const req = new XMLHttpRequest();
        req.open("get", "./../../src/php/fun/sessionDestroy.php", false);
        req.send(null);
        if (req.responseText === "DESTROYED") return window.location.reload()
    }

    getData(type = "") {
    
        const req = new XMLHttpRequest();
    
        switch (type){
            case "data":
                req.open("get", "./../../src/php/fun/sendData.php", false);
                req.send(null);
                break;
            case "validation":
                req.open("post", "./../../src/php/fun/validation.php", false);
                req.send(null);
                break;
            case "pseudoid":
                req.open("get", "./../../src/php/fun/getPseudoId.php", false);
                req.send(null);
        }
    
        return JSON.parse(req.responseText);
        
    }

    getPos(element, posOffset = "") {

        const bodyRect = document.body.getBoundingClientRect(),
            elementRect = element.getBoundingClientRect()
        var offSet;

        switch (posOffset) 
        {

            case "top":
                offSet = elementRect.top - bodyRect.top
                break
            case "right":
                offSet = elementRect.right - bodyRect.right
                break
            case "left":
                offSet = elementRect.left - bodyRect.left
                break
            case "bottom":
                offSet = elementRect.bottom - bodyRect.bottom
                break
            default:
                offSet = {
                    top: elementRect.top - bodyRect.top,
                    right: elementRect.right - bodyRect.right,
                    left: elementRect.left - bodyRect.left,
                    bottom: elementRect.bottom - bodyRect.bottom
                }
        }

        return {
            offSet: offSet,
            elementRect: elementRect
        }
    }

    accExists(document, options = []) {
        const toast = new bootstrap.Toast(document);
        const defaultText = {
            msg: options[0].msg.innerText,
            val: options[0].val.innerText
        };
        if (this.#checkExistence("accExists=")[0] === "EXISTS") {
            const values = this.#checkExistence("accExists=");
            options[0].msg.innerText = defaultText.msg + " "+ this.#errTypes[1 - parseInt(values[1], 16)];
            options[0].val.innerText = defaultText.val + " "+ values[1];
            return toast.show();
        }
        if (this.#checkExistence("postExists=")[0] === "POSTEXISTS") {
            const values = this.#checkExistence("postExists=");
            options[0].msg.innerText = defaultText.msg + " "+ this.#errTypes[parseInt(values[1], 16)];
            options[0].val.innerText = defaultText.val + " "+ values[1];
            return toast.show();
        }
        if (this.#checkExistence("userLogged=")[0] === "INCORRECTPASS") {
            const values = this.#checkExistence("userLogged=");
            options[0].msg.innerText = defaultText.msg + " "+ this.#errTypes[parseInt(values[1], 16)];
            options[0].val.innerText = defaultText.val + " "+ values[1];
            return toast.show();
        }
    }

    #checkExistence(cookieName = "") {
        if (!cookieName) throw new Error("Invalid Cookie Name");
        try {
            switch (cookieName) {
                case "accExists=":
                    if (document.cookie.split(";")[1]) {
                        let cookieData = document.cookie.split(";")[1].slice(cookieName.length + 1);
                        if (cookieData.toLowerCase() === "exists") return ["EXISTS", "0x01"];
                        if (cookieData.toLowerCase() === "notexists") return ["NOTEXISTS", -1];
                        else return ["UNSET", -2];
                    }
                case "postExists=":
                    if (document.cookie.split(";")[1]) {
                        let cookieData = document.cookie.split(";")[1].slice(cookieName.length + 1);
                        if (cookieData.toLowerCase() === "postexists") return ["POSTEXISTS", "0x02"];
                        if (cookieData.toLowerCase() === "postnotexists") return ["POSTNOTEXISTS", -1]
                        else return ["UNSET", -2]
                    }
                case "userLogged=":
                    if (document.cookie.split(";")[1]) {
                        let cookieData = document.cookie.split(";")[1].slice(cookieName.length + 1);
                        if (cookieData.toLowerCase() === "incorrectpass") return ["INCORRECTPASS", "0x03"];
                        if (cookieData.toLowerCase() === "logged") return ["LOGGED", -1];
                        else return ["UNSET", -2];
                    }
            }
            return ["NOTSET", -3];
        } catch (e) {
            throw new Error(e)
        }
    }
}

