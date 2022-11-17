export default class Getter {

    static getData(type = "") {
    
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
        }
    
        return JSON.parse(req.responseText);
        
    }

    static getPos(element, posOffset = "") {

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
}