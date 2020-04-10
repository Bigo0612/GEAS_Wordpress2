<?php
/* Template Name: Paiement */
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

<body>
<header>This is the header</header>
<div id="content">
    <p>This is the element you only want to capture</p>
    <h3 style="color: red">hkgbgkb</h3>
</div>
<button id="print">Download Pdf</button>
<footer>This is the footer</footer>
<div id="demo">
    <p>fjff</p>
</div>

<button id="button">fgf</button>
</body>


<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script>//var pdf = new jsPDF('p', 'pt', 'letter');
   // pdf.addHTML($('#ElementYouWantToConvertToPdf')[0], function () {
   //     pdf.save('Test.pdf');
 //   });

   $('#print').click(function() {

       var w = document.getElementById("content").offsetWidth;
        var h = document.getElementById("content").offsetHeight;
       html2canvas(document.getElementById("content"), {
        dpi: 300, // Set to 300 DPI
      scale: 3, // Adjusts your resolution
      onrendered: function(canvas) {
        var img = canvas.toDataURL("image/jpeg", 1);
      var doc = new jsPDF('L', 'px', [w, h]);
     doc.addImage(img, 'JPEG', 0, 0, w, h);
     doc.save('sample-file.pdf');
            }
      });
    });
    $('#button').on('click',function(){
        var doc = new jsPDF ();
        var elementHTML = $ ( '#demo' ) .html ();
        var specialElementHandlers = {
            '#elementH' : function ( élément, rendu ){
                return  true ;
            }
        };
        doc.fromHTML (elementHTML, 15 , 15 , {
            'width' : 70 ,
            'elementHandlers' : specialElementHandlers
        });
// Enregistrer le PDF
        doc.save ( 'CV.pdf' );
    })</script>