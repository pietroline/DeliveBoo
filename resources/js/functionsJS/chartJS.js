
// inizio gestione chartJS
// resources/views/admin/charts/index.blade.php

const moneyMonth = document.getElementsByClassName("mJS_moneyMonth");

let money = [0,0,0,0,0,0,0,0,0,0,0,0];
for(let i=0; i<moneyMonth.length; i++){
    money[i] = moneyMonth[i].innerHTML;
};


const labels = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Statistiche ordini ricevuti',
      backgroundColor:  'rgba(255, 140, 40, 0.2)',
      fill:true,
      borderColor: '#ff8c28',
      borderWidth: 1,
      data: money,
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
        plugins: {
            legend: {
              display: false
            }
          }
    }
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );


// fine gestione chartJS


// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------