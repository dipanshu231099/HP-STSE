// var doc = new jsPDF();
// var specialElementHandlers = {
//     '#AdmitCard': function (element, renderer) {
//         return true;
//     }
// };

// $('#genPdf').click(function () {
//     doc.fromHTML($('#AdmitCard').html(), 15, 15, {
//         'width': 170,
//             'elementHandlers': specialElementHandlers
//     });
//     doc.save('Admit-Card.pdf');
// });

function genPDF()
{
    html2canvas(document.body,{
    onrendered:function(canvas){

    var img=canvas.toDataURL("image/png");
    var doc = new jsPDF();
    doc.addImage(img,'JPEG',20,20);
    doc.save('test.pdf');
    }

    });

}

$('#genPdf').click(genPDF());

