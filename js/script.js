window.onload = main;

function main()
{
   let boton = document.getElementById('generar');
   boton.onclick = peticion;
}


function peticion()
{
   $.post("ajax/peticion.php" , function(data)
   {

      let tam = data.length;
      let contador = [0,0,0,0,0];

      for (let i = 0; i < tam; i++) {

          switch(data[i][4])
          {
            case 'Guadalajara':
               contador[0]++;
            break;
            case 'San Pedro Tlaquepaque':
               contador[1]++;
            break;
            case 'Zapopan':
               contador[2]++;
            break;
            case 'Tlajomulco de Zúñiga':
               contador[3]++;
            break;
            case 'Tonalá':
               contador[4]++;
            break;
         }
      }

      generarGrafica(contador);
   })
}

function generarGrafica(datos)
{
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
     let data = google.visualization.arrayToDataTable([
      ['Task', 'Municipios'],
      ['Guadalajara',     datos[0]],
      ['San Pedro Tlaquepaque',      datos[1]],
      ['Zapopan',  datos[2]],
      ['Tlajomulco de Zúñiga', datos[3]],
      ['Tonalá',    datos[4]]
     ]);

     let options = {
      title: 'Municipios'
     };

     let chart = new google.visualization.PieChart(document.getElementById('piechart'));

     chart.draw(data, options);
   }


}
