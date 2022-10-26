
export const options = {
    "regex": /card_[0-9]+/i
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

export function createLogin(main_root) {
    main_root.innerHTML = ''
    var form = document.createElement("form");
    form.setAttribute("method", "get")
    form.setAttribute("action", "index.php")
    form.innerHTML = '<div class="form-group"><label for="input-email">Endereço de E-mail</label><input class="form-control" id="input-email" type="email" placeholder="Insira seu E-mail" name="email"><small id="emailHelp" class="form-text text-muted">Seu e-mail não será compartilhado com niguem.</small></div><div class="form-group"><label for="input-pass">Senha</label><input class="form-control" id="input-pass" type="password" placeholder="Insira sua senha" name="senhaLog"></div><div class="form-group"><input class="form-check-input" id="input-ch" type="checkbox"><label class="form-check-label">Ver senha</label></div><div class="form-group"><button type="submit" class="btn btn-primary">Login</button><a href="#" id="reg-a">Não Possui Uma Conta? Registre-se.</a></div>'

    return {
        full_form: form
    }
}

export function createReg(main_root) {
    main_root.innerHTML = ''
    var form = document.createElement("form")
    form.setAttribute("method", "post")
    form.setAttribute("action", "index.php")
    form.innerHTML = `
    <div class="form-inline form-group align-items-center">
        <div class="form-group">
            <label for="input-nome">Nome</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">#</span>
                </div>
                <input class="form-control" id="input-nome" type="text" placeholder="Insira seu Nome" aria-describedby="inputGroupPrepend" name="usuario" required>
            </div
        </div>
    </div>
    <div class="form-group">
        <label for="input-email">Endereço de E-mail</label>
        <input class="form-control" id="input-email" type="email" placeholder="Insira seu E-mail" name="email">
        <small id="emailHelp" class="form-text text-muted">Seu e-mail não será compartilhado com niguem.</small>
    </div>
    <div class="form-group">
        <label for="input-pass">Senha</label>
        <input class="form-control" id="input-pass" type="password" placeholder="Insira sua senha" name="senha" required>
        <label for="input-pass_">Confirme sua senha</label>
        <input class="form-control" id="input-pass_" type="password" placeholder="Insira novamente sua senha" required>
    </div>
    <div class="form-group">
        <input class="form-check-input" id="input-ch" type="checkbox">
        <label class="form-check-label">Ver senha</label>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Registro</button>
        <a href="#" id="reg-b">Já Possui Uma Conta?</a>
    </div>`

    return {
        full_form: form
    }
}
