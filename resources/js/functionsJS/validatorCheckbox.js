
// inizio gestione di validazione delle checkbox lato client
// resources/views/admin/home.blade.php
// resources/views/admin/foods/create.blade.php
  
    
    const form = document.querySelector('#sectionForm');
    const checkboxes = form.querySelectorAll('input[type=checkbox]');

    if (checkboxes) {
        for (let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener('change', checkValidity);
        }

        checkValidity();
        
        function checkValidity() {
            const errorMessage = !isChecked() ? 'Seleziona almeno una tipologia' : '';
            for (let j = 0; j < checkboxes.length; j++) {
                checkboxes[j].setCustomValidity(errorMessage);
            }   
        }

        function isChecked() {
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) return true;
            }

            return false;
        }

    }


// fine gestione di validazione delle checkbox lato client


// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------