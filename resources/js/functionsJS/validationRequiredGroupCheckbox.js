// inizio validazione group input checkbox
// resources/views/admin/foods/index.blade.php

  const checkboxes = document.getElementsByClassName("mJS_checkbox");
  const displayRequired = document.getElementById("mJS_displayRequired");

  let checkboxTrue = 0;

  for(let i=0; i<checkboxes.length; i++){
      const checkbox = checkboxes[i];
    
      checkbox.addEventListener("click", function(e){

        
        if(checkbox.checked){
          // quando viene impostato un check nelle input in esame incremento una variabile interna dello script
            checkboxTrue++;
        }else if(!checkbox.checked && checkboxTrue>0){
          // quando viene tolto un check nelle input in esame decremento una variabile interna dello script
          checkboxTrue--;
        }
      
        // verifico se la variabile che tiene il conto dei check sulle input > 0 e imposto le classi adeguate
        if(checkboxTrue==0){ 
          displayRequired.classList.remove("ms_text-transparent");
          displayRequired.classList.add("text-danger");
        
        }else{
          displayRequired.classList.remove("text-danger");
          displayRequired.classList.add("ms_text-transparent");
        }
        
      });
        
  }

// fine validazione group input checkbox


// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------


