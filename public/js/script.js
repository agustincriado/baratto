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
    element.classList.toggle('text-warning');
    element.classList.toggle('bg-dark');
    const database = document.getElementById('database');
    for ( i = 0; i < database.children.length; i++) {
        const dato = database.children[i];
        database.children[i].style.display = 'inline';
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
    clearCart();
    subCount(idMesas, arrayNumber);
    toggleSubCount(idMesas);
    checkIfExists(info, idMesas);
    createButtons(idMesas);
    toggleCart(idMesas);
    
}

const checkIfExists = (info, idMesas) => {
    const array = info.split("\n");
    const mesaNumber = idMesas.split("_")
    const formMesa = document.getElementById('formMesa');
    const checkLabel = document.getElementById('innerTable_'+idMesas+'_label');
    const elementInfo = array[0] + " " + array[1];

    if (!checkLabel) {     
        const input = document.createElement('input');
        const label = document.createElement('label');
        label.setAttribute('for', 'innerTable_'+idMesas);
        label.setAttribute('id', 'innerTable_'+idMesas+'_label');
        label.setAttribute('class', idMesas);
        label.textContent = elementInfo;
        
        input.setAttribute('class', idMesas);
        input.setAttribute('id', 'innerTable_'+idMesas);
        input.setAttribute('value', mesaNumber[1]);
        input.setAttribute('name', "Mesa");
        
        formMesa.appendChild(label);
        formMesa.appendChild(input);
    } else {
        const labels = document.querySelectorAll('#innerTable_'+idMesas+'_label');
        for (i=0; i<labels.length; i++) {
            if (labels[i].textContent == elementInfo) {
                return false;
            }
        }
        if (checkLabel.textContent != elementInfo) {
            const input = document.createElement('input');
            const label = document.createElement('label');
            label.setAttribute('for', 'innerTable_'+idMesas);
            label.setAttribute('id', 'innerTable_'+idMesas+'_label');
            label.setAttribute('class', idMesas);
            label.textContent = elementInfo;
            input.setAttribute('class', idMesas);
            input.setAttribute('id', 'innerTable_'+idMesas);
            input.setAttribute('value', mesaNumber[1]);
            input.setAttribute('name', "Mesa");

            formMesa.appendChild(label);
            formMesa.appendChild(input);
        }
    }
}
const clearCart = () => {
    const formMesa = document.getElementById('formMesa');
    const aside = document.getElementById('aside')
    for (i = 0; i< formMesa.children.length; i++) {
    formMesa.children[i].classList.remove('show');
    }
    for (i=0; i<aside.children.length; i++) {
        aside.children[i].classList.remove('show');
    }
}

const toggleCart = (idMesas) => {
    const element = document.querySelectorAll("." + idMesas);
    for (i=0; i < element.length; i++) {
        element[i].classList.toggle("show");
    }
    
}

const toggleSubCount = (idMesas) => {
    const element = document.querySelectorAll("#subtotal_" + idMesas);
    for (i=0; i < element.length; i++) {
        element[i].classList.toggle("show");
    }
}

const subCount = (idMesas, arrayNumber) => {
    const formMesa = document.getElementById('formMesa');
    const account = document.getElementById("subtotal_"+idMesas);
    if (!account) {
    const node = document.createElement('input');
    node.setAttribute('id', "subtotal_" + idMesas);
    node.setAttribute('value', arrayNumber);
    node.setAttribute('name', 'Consumo');
    formMesa.appendChild(node);
    } else {
        const result = Number(account.value) + arrayNumber;
        account.setAttribute("value", Math.round(result*100)/100);
    }
}

const createButtons = (idMesas) => {
    const cartSubmit = document.getElementById("submit_"+idMesas);
    const cartReset = document.getElementById("reset_"+idMesas);
    const aside = document.getElementById('aside');
    const formMesa = document.getElementById('formMesa');
    if (!cartSubmit && !cartReset) {
        const submit = document.createElement('button');
        submit.setAttribute('type', 'submit');
        submit.innerText = "Guardar";
        submit.setAttribute('id', 'submit_'+idMesas);
        submit.setAttribute('class', idMesas);
        const reset = document.createElement('button');
        reset.addEventListener('click', () => {
            console.log(formMesa.children)
            console.log(formMesa[2])
           
            /*for (i=0;i<(formMesa.children.length-1);i++) {
                console.log(formMesa.children)
                log
                console.log(formMesa[i]) 
            }/*
            reset.remove();
            submit.remove();*/
        }
        )
        reset.innerText = "Borrar Datos";
        reset.setAttribute('id', 'reset_'+idMesas);
        reset.setAttribute('class', idMesas);
        aside.appendChild(submit);
        aside.appendChild(reset);
    }
}