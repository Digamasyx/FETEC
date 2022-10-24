
export const options = {
    "regex": /card_[0-9]+/i
}


/**
 * 
 * @param {HTMLElement} element Root Element to get data
 * @param {[HTMLElement, string]} specificElement Specific element to return
 * @readonly This function its only a read-only function it doesn't change the element itself
 * @returns {{HTMLElement, bool: true}} Returns a HTMLElement array with its respective child elements
 */
export function getElementData(element, specificElement = [null, null]) {
    if (specificElement[0] === null) {
        return {element: element.innerHTML, bool: true}
    } else if (specificElement[0] !== null) {
        const elements = []
        for (const child of element.children) {
            if (child.id === specificElement[1]) {
                return {child: child, bool: true}
            } else {

                if (specificElement[1] === null) {
                    return {child: child, bool: true }
                } else {
                    if (child.childElementCount !== 0) {
                        for(const child_ of child.children) {
                            if (child_.id === specificElement[1]) {
                                return {child: child_, bool: true}
                            } else {
                                if (child_.childElementCount !== 0) {
                                    for(const child_1 of child_.children) {
                                        if (child_1.id === specificElement[1]) {
                                            return {child: child_1, bool: true}
                                        }
                                    }
                                }
                            }
                        }
                    }
                    return {child: child, bool: true}
                }
            }
        }
    }
}

export function getPos(element, [vertical = 0, horizontal = 0]) {
    const bodyPos = document.body.getBoundingClientRect();
    const elementPos = element.getBoundingClientRect();

    if (vertical == 0) {
        if (horizontal == 0) {
            return {
                vertical: elementPos.top - bodyPos.top,
                horizontal: elementPos.left - bodyPos.left
            }
        }
        return {
            horizontal: elementPos.left - bodyPos.left
        }
    } else if (vertical == 1) {
        if (horizontal == 1) {
            return {
                vertical: elementPos.top - bodyPos.top,
                horizontal: elementPos.left - bodyPos.left
            }
        }
        return {
            vertical: elementPos.top - bodyPos.top
        }
    }
}

export function createForm(main_root) {
    main_root.innerHTML = ''
    const form = document.createElement("form")
    // E-Mail
    const div_ = document.createElement("div")
    div_.setAttribute("class", "form-group")
    // Senha
    const div_1 = document.createElement("div")
    div_1.setAttribute("class", "form-group")
    // Check
    const div_ch = document.createElement("div")
    div_ch.setAttribute("class", "form-check")

    // Login & registro
    const div_l = document.createElement("div")
    div_l.setAttribute("class", "form-group")

    // E-Mail
    const label = document.createElement("label")
    label.setAttribute("for", "input-email")
    // Senha
    const label_ = document.createElement("label")
    label_.setAttribute("for", "input-pass")
    // Check
    const label_ch = document.createElement("label")
    Object.assign(label_ch, {
        for: 'input-ch',
        className: 'form-check-label'
    })


    label.innerText = "Endereço de E-mail"
    label_.innerText = "Senha"
    label_ch.innerText = "Ver senha"

    // E-Mail
    const input = document.createElement("input")
    Object.assign(input, {
        className: 'form-control',
        id: 'input-email',
        type: 'email',
        placeholder: 'Insira seu E-mail'
    })

    // Senha
    const input_ = document.createElement("input")
    Object.assign(input_, {
        className: 'form-control',
        id: 'input-pass',
        type: 'password',
        placeholder: 'Insira sua senha'
    })

    // Check
    const input_ch = document.createElement("input")
    Object.assign(input_ch, {
        className: 'form-check-input',
        id: 'input-ch',
        type: 'checkbox'
    })

    const btn = document.createElement("button")
    Object.assign(btn, {
        type: 'submit',
        className: 'btn btn-primary'
    })
    btn.innerText = "Login"
    const reg = document.createElement("a")
    Object.assign(reg, {
        href: '#',
        id: 'reg-a'
    })
    reg.innerText = "Não Possui Uma Conta? Registre-se."

    const small = document.createElement("small")
    Object.assign(small, {
        id: 'emailHelp',
        className: 'form-text text-muted'
    })
    small.innerText = "Seu e-mail não será compartilhado com niguem."

    // E-Mail
    div_.appendChild(label)
    div_.appendChild(input)
    div_.appendChild(small)

    // Senha
    div_1.appendChild(label_)
    div_1.appendChild(input_)

    // Check
    div_ch.appendChild(label_ch)
    div_ch.appendChild(input_ch)

    // Log & Reg
    div_l.appendChild(btn)
    div_l.appendChild(reg)

    form.appendChild(div_)
    form.appendChild(div_1)
    form.appendChild(div_ch)
    form.appendChild(div_l)

    return {
        form_email: div_,
        form_pass: div_1,
        form_check: div_ch,
        full_form: form
    }
}
