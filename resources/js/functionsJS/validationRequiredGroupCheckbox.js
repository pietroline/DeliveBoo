const checkboxes = document.getElementsByClassName("mJS_checkbox");
const displayRequired = document.getElementById("mJS_displayRequired");

let checkboxTrue = 0;

for(let i=0; i<checkboxes.length; i++){
    const checkbox = checkboxes[i];
    // JSON.parse converte una stringa in un oggetto
    const array = JSON.parse(checkbox.value);

    checkbox.addEventListener("click", function(e){

        
      if(checkbox.checked){
          checkboxTrue++;
      }else if(!checkbox.checked && checkboxTrue>0){
        checkboxTrue--;
      }
     
      if(checkboxTrue==0){
        displayRequired.classList.remove("ms_text-transparent");
        displayRequired.classList.add("text-danger");
       
      }else{
        displayRequired.classList.remove("text-danger");
        displayRequired.classList.add("ms_text-transparent");
      }

    });
      
}


