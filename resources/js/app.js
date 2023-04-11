import './bootstrap';
import 'flowbite';

$(document).ready(function() {

    var table = $('#myTable').DataTable({
        language: {
            lengthMenu: 'Afficher _MENU_ enregistrements par page',
            zeroRecords: 'Rien trouvé 😥- désolé',
            info: 'Afficher la page _PAGE_ de _PAGES_',
            infoEmpty: 'Aucun enregistrement disponible',
            infoFiltered: '(filtré à partir de _MAX_ enregistrements totaux)',
            search: "Recherche:",
            paginate: {
                first: "Premier",
                last: "Dernier",
                next: "Suivant",
                previous: "Précédent",
            },
        },
            responsive: true,
            // dom: 'Bfrtip',
            dom: 'Blfrtip',
        buttons: [
            // 'excel','csv'
            {
                extend:'excel',
                messageTop:'Les informations contenues dans ce tableau sont la propriété de IDW',
                title:'IDW Data',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12]
                }
            },
            {
                extend:'csv',
                messageTop:'Les informations contenues dans ce tableau sont la propriété de IDW',
                title:'IDW Data'

            },
            {
            
            extend:'colvis',
            text:'Visibilité',
            },
        ],
        select: true
        })
        .columns.adjust()
        .responsive.recalc();
        
    });