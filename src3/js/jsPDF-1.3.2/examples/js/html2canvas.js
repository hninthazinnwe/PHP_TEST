
var pdf = new jsPDF('p','pt','a4');

pdf.addHTML(document.body,function() {
	var string = pdf.out t('datauristring');
	$('.preview-pane').attr('src', string);
});
