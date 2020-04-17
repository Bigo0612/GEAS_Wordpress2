<?php
/* Template Name: Paiement */
get_header();?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

<div class="wrap_facture">
    <?php
    $factures = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}Professionel WHERE id_Professionel = 16", OBJECT);
    $numfactures = $wpdb->get_row( "SELECT max(id_factures) AS numfac FROM {$wpdb->prefix}Professionel WHERE id_Professionel = 16", OBJECT);
    $nomClient = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}Enfants_has_Client INNER JOIN geas_Enfant ON geas_Enfant.id_Enfant = geas_Enfants_has_Client.fk_id_Enfant INNER JOIN  geas_Client ON geas_Client.id_Client = geas_Enfants_has_Client.fk_id_Client INNER JOIN  geas_TypeRelation ON geas_TypeRelation.id_TypeRelation = geas_Enfants_has_Client.TypeRelation_id_TypeRelation WHERE id_Enfant = 1" , OBJECT );
    $numeroFactures = $numfactures->numfac + 1;
    $numeroFactures = sprintf('%05d',$numeroFactures);
    $date = new DateTime()
    ?>
    <div class="float2">
        <div class="logo"><img src="img/geas.png"></div>
         <h2 class="titrefacture">Facture</h2>
    </div>
    <div class="float2">
        <div class="details_entreprise">
            <h3 class="factureSubtitle"><?php echo $factures->nom_entreprise ?></h3>
            <p class="table_Professionel"><?php echo $factures->raison_sociale ?></p>
            <p class="table_Professionel"><?php echo $factures->adresse1 ?></p>
            <p class="table_Professionel"><?php echo $factures->ville . ' ' . $factures->cp ?></p>
            <p class="table_Professionel"><?php echo $factures->tel_pro ?></p>
            <p class="table_Professionel"><?php echo $factures->mail ?></p>
        </div>
    </div>
    <div class="clear"></div>
        <div class="entete">
            <div class="float3">
                <h3 class="factureSubtitle">Facture n° : <?php echo $numeroFactures ?></h3>
            </div>
            <div class="float3">
                <h3 class="factureSubtitle"><?php $datetime = date("d/m/Y");
                    echo $datetime; ?></h3>
            </div>
            <div class="float3">
                <h3 class="factureSubtitle">Facture à régler avant le : <?php $datetime = date("d-m-Y");
                   $newd = date('d/m/Y',strtotime('+7 days +1 month',strtotime($datetime)));

                    Echo $newd;?></h3>
            </div>
            <h3 class="factureSubtitle2">Période du <?php
                $dateDeb = $date -> format('01/m/Y');
                $dateFin = $date -> format('t/m/Y');
                echo $dateDeb . ' au ' . $dateFin;?></h3>

        </div>
        <h3 class="float1_5">Nom</h3>
        <h3 class="float1_2">Etablissement / accueil</h3>
        <h3 class="float1_2">Désignation</h3>
        <h3 class="float1_3">Base</h3>
        <h3 class="float1_3">Tarif</h3>
        <h3 class="float1_3">Montant</h3>
            <div class="descriptif">
                <p class="desc_details"><?php echo $nomClient->nom_Client ?></p>
                <p class="desc_details2"><?php echo $factures->nom_entreprise ?></p>
                <p class="desc_details2"></p>
            </div>
            <div class="montant">
                <h4 class="montant_float">32</h4>
                <h4 class="montant_float">56</h4>
                <h4 class="montant_float">765</h4>
            </div>
    <div class="sous_total">
        <p class="sous_total_float">Sous Total : </p>
    </div>
            <div class="banderole">
                <p class="total_p">Reste à payer pour cette facture : </p>
                <p class="total_p2">TOTAL FACTURE : </p>
            </div>
            <div class="float5">
                <p class="modalit_paiemant">Modes de paiements :</p>
                <p class="modalit_paiemant">- Par carte bancaire sur le site www.GEAS.com</p>
                <p class="modalit_paiemant">Condition de paiements</p>
                <p class="modalit_paiemant">- Par carte bancaire, par chèque à l'ordre du trésor public</p>
                <p class="modalit_paiemant">- En espèces dans la limite de 300€</p>
                <p class="modalit_paiemant">- Par prélèvement bancaire</p>
            </div>
            <div class="float5">
                <p class="modalit_paiemant">bdjbcdjc</p>
                <p class="modalit_paiemant"></p>
            </div>
    <div class="clear"></div>
            <div class="banderole2">
                <p class="coupon">A joindre avec au règlement</p>
            </div>
            <div class="bas_page">
                <div class="coupondet">
                    <h3 class="coupdetail">Facture n° : <?php echo $numeroFactures ?></h3>
                    <h3 class="coupdetail"><?php echo $factures->nom_entreprise ?></h3>
                    <h3 class="coupdetail">Période du <?php
                        $dateDeb = $date -> format('01/m/Y');
                        $dateFin = $date -> format('t/m/Y');
                        echo $dateDeb . ' au ' . $dateFin;?></h3>
                </div>
                <div class="coupondet2">
                    <h3 class="coupdetail">Date : <?php $datetime = date("d/m/Y");
                        echo $datetime; ?></h3>
                    <h3 class="coupdetail">TOTAL FACTURE : </h3>
                </div>
            </div>
</div>
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