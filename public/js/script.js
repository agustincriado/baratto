const CreateTable = () => {
    const root = document.getElementById('root');
    root.appendChild(TableObject());
    const database = document.getElementById('database');
}
const TableObject = () => {
    const root = document.getElementById("root");
    const table = document.createElement("div");
    const tableChild = document.createElement("h3");
    const text = document.createTextNode("Mesa")
    tableChild.appendChild(text);
    const object = table.appendChild(tableChild);
    console.log(root.children.length);
    for (i = root.children.length; i <= root.children.length; i++) {
        object.setAttribute('id', 'mesa_' + (i + 1));
        object.innerText = "Mesa" + (i + 1);
        object.setAttribute('onclick', 'showInv(id)')
    }
    return object;
}


const showInv = (idMesa) => {
    clearToggle();
    clearInv();
    const element = document.getElementById(idMesa);
    //element.classList.toggle('selected');
    element.classList.toggle('text-warning');
    element.classList.toggle('bg-dark');
    const database = document.getElementById('database');
    for ( i = 0; i < database.children.length; i++) {
        const dato = database.children[i];
        database.children[i].style.display = 'block';
        database.children[i].addEventListener('click', () => {
            toCart(dato.innerText, idMesa);
        })
    }
    clearCart()
    toggleCart(idMesa);
    toggleSubCount(idMesa);
}

const clearInv = () => {
    const database = document.getElementById('database');
    const dbClone = database.cloneNode(true);
    database.parentNode.replaceChild(dbClone, database);
}

const clearToggle = () => {
    const root = document.getElementById('root');
    for (i = 0; i< root.children.length; i++) {
    //root.children[i].classList.remove('selected');
    root.children[i].classList.remove('text-warning');
    root.children[i].classList.remove('bg-dark');
    }
}

const hideInv = () => {
    const database = document.getElementById('database');
    for ( i = 0; i < database.children.length; i++) {
        database.children[i].style.display = 'none';
    }
}

const toCart = (info, idMesas) => {
    const array = info.split("\n");
    const arrayNumber = Number(array[1]);
    clearCart()
    subCount(idMesas, arrayNumber);
    toggleSubCount(idMesas)
    const innerTable = document.getElementById('innerTable_'+idMesas);
    if (!innerTable) {
    const aside = document.getElementById('aside');
    const div = document.createElement('div')
    div.setAttribute('class', idMesas)
    div.setAttribute('id', 'innerTable_'+idMesas);
    const text = document.createTextNode(info);
    div.appendChild(text);
    aside.appendChild(div);
    toggleCart(idMesas);
    } else {
        const div = document.createElement('div')
        div.setAttribute('class', idMesas)
        div.setAttribute('id', 'aside_'+idMesas);
        const text = document.createTextNode(info);
        div.appendChild(text);
        innerTable.appendChild(div);
        toggleCart(idMesas);
    }
}

const clearCart = () => {
    const aside = document.getElementById('aside');
    for (i = 0; i< aside.children.length; i++) {
    aside.children[i].classList.remove('show');
    }
}

const toggleCart = (idMesas) => {
    const element = document.querySelectorAll("." + idMesas);
    for (i=0; i < element.length; i++) {
        if(element[i].classList.contains("show")) {
        console.log("");
    } else element[i].classList.toggle("show");
    }
    
}

const toggleSubCount = (idMesas) => {
    const element = document.querySelectorAll("#subtotal_" + idMesas);
    for (i=0; i < element.length; i++) {
        if(element[i].classList.contains("show")) {
        console.log("");
    } else element[i].classList.toggle("show");
    }
}

const subCount = (idMesas, arrayNumber) => {
    const carrito = document.getElementById('aside');
    const account = document.getElementById("subtotal_"+idMesas);
    if (!account) {
    const node = document.createElement('div');
    node.setAttribute('id', "subtotal_" + idMesas);
    const nodeChild = document.createTextNode(arrayNumber);
    node.appendChild(nodeChild);
    carrito.appendChild(node);
    const subtotal = Number(document.getElementById("subtotal_"+idMesas).textContent);
    const result = subtotal + arrayNumber;
    nodeChild.textContent = Math.round(subtotal*100)/100;
    } else {
        const result = Number(account.textContent) + arrayNumber;
        account.textContent = Math.round(result*100)/100;
    }
}