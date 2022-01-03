const showAll = () => {
    let element = document.getElementById("root");
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
    const div = document.createElement("div");
    const rows = ["ID", "Nombre", "Cantidad", "Precio de compra", "Precio de venta"];
    rows.forEach(element => {
        row = document.createElement("p");
        el = document.createTextNode(element);
        row.appendChild(el);
        div.appendChild(row);
    });
    root.appendChild(div);
    fetch('./db.php?ShowAll')
    .then(response => response.json())
    .then(data => data.forEach(asd => {
        const root = document.getElementById('root');
        let arr = Object.values(asd);
        let nodo = document.createElement("div");
        arr.forEach(element => {
            hijo = document.createElement("p");
            segundo = document.createTextNode(element);
            hijo.appendChild(segundo)
            nodo.appendChild(hijo)
        })
        root.appendChild(nodo)
        })
    );
}

const toggleForm = (value) => {
    let element = document.getElementById("root");
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
    let forms = ['create','update','delete'];
    forms.forEach((value) => {
        document.getElementById("form_" + value).classList.remove("show");
    })
    document.getElementById("form_" + value).classList.toggle("show");
}

const toggle = (value) => {
    document.getElementById("div_" + value).classList.toggle("show")
}
