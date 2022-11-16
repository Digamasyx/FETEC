export default function getData() {
    var data;

    const req = new XMLHttpRequest();

    
    req.open("get", "./../../src/php/fun/sendData.php", false);
    req.send(null);

    return JSON.parse(req.responseText);
    
}