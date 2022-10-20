
export const options = {
    "regex": /card_[0-9]+/i
}


/**
 * 
 * @param {HTMLElement} element Root Element to get data
 * @param {[HTMLElement, string]} specificElement Specific element to return
 * @readonly This function its only a read-only function it doesn't change the element itself
 * @returns {HTMLElement} Returns a HTMLElement array with its respective child elements
 */
export function getElementData(element, specificElement = [null, null]) {
    if (specificElement[0] === null) {
        return element.innerHTML
    } else if (specificElement[0] !== null) {
        const elements = []
        for (const child of element.children) {
            if (child.id === specificElement[1]) {
                return child
            } else {

                if (specificElement[1] === null) {
                    return child
                } else {
                    if (child.childElementCount !== 0) {
                        for(const child_ of child.children) {
                            if (child_.id === specificElement[1]) {
                                return child_
                            } else {
                                if (child_.childElementCount !== 0) {
                                    for(const child_1 of child_.children) {
                                        if (child_1.id === specificElement[1]) {
                                            return child_1
                                        }
                                    }
                                }
                            }
                        }
                    }
                    return child
                }
            }
        }
    }
}
