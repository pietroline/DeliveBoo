// inizio gestione della conferma di eliminazione
// resources/views/admin/foods/index.blade.php

const buttons = document.getElementsByClassName("mJS_deleteButton");
const name = document.getElementById("mJS_modelName");
const form = document.getElementById("mJS_form");


for(let i=0; i<buttons.length; i++){
    const button = buttons[i];
    // JSON.parse converte una stringa in un oggetto
    const array = JSON.parse(button.value);

    button.addEventListener("click", function(e){

        
        name.innerHTML = `Confermi di eliminare <strong>${array.name}</strong>?`
        
        form.action = window.location.href + `/${array.id}`;
    });
}


// fine gestione della conferma di eliminazione


// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------