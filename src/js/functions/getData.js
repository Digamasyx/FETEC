export default async function getData() {
    var data = {};

    const req = new XMLHttpRequest();

    
    req.open("get", "./../../src/php/fun/sendData.php", false);
    req.onload = function () {
        data = {
            data: JSON.parse(this.responseText)
        }
    }
    req.send();

    return data
    
}