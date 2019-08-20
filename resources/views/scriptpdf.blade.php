<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">

    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  </head>
  <body>
    <script type="text/javascript">

    $('#cmd2').click(function () {

        var len = 4; //$x(".//body/div/div").length
        var pdf = new jsPDF('p', 'mm','a4');
        var position = 0;
        Hide
        for (let i = 1;i  <= len; i++){
            html2canvas(document.querySelector('#pg'+i),
                {dpi: 300, // Set to 300 DPI
                scale: 1 // Adjusts your resolution
                }).then(canvas => {
                pdf.addImage(canvas.toDataURL("images/png", 1), 'PNG', 0,position, 210, 295);

                if (i == len){
                    pdf.save('sample-file.pdf');
                }else{
                    pdf.addPage();
                }
            });
        }
    });

    </script>
<div class="">

</div>
  </body>
</html>
