window.onload = function(){
  document.getElementById("show-user-dates-option").style.display='none';
  document.getElementById("show-pub-dates-option").style.display='none';
  document.getElementById("show-proj-dates-option").style.display='none';
};

function user_reportDates(){
    if($('.show-user-dates-option').is(':visible')){
        $(".show-user-dates-option").slideUp();
	$(".show-pub-dates-option").slideUp();
        $(".show-proj-dates-option").slideUp();
    }else 
        if($('.show-user-dates-option').is(':hidden')){
            $(".show-user-dates-option").slideDown();
            $(".show-pub-dates-option").slideUp();
            $(".show-proj-dates-option").slideUp();
    }
        
}

function pub_reportDates(){
    if($('.show-pub-dates-option').is(':visible')){
	$(".show-pub-dates-option").slideUp();
	$(".show-user-dates-option").slideUp();
        $(".show-proj-dates-option").slideUp();
    }else 
        if($('.show-pub-dates-option').is(':hidden')){
            $(".show-pub-dates-option").slideDown();
            $(".show-user-dates-option").slideUp();
            $(".show-proj-dates-option").slideUp();
        }
}

function proj_reportDates(){
    if($('.show-proj-dates-option').is(':visible')){
        $(".show-proj-dates-option").slideUp();
        $(".show-user-dates-option").slideUp();
        $(".show-pub-dates-option").slideUp();
    }else 
        if($('.show-proj-dates-option').is(':hidden')){
            $(".show-proj-dates-option").slideDown();
            $(".show-user-dates-option").slideUp();
            $(".show-pub-dates-option").slideUp();
        }
}





/* SAVE TO PDF */


/*
function saveAspdf() {
var pdf = new jsPDF('p','mm','a4');
pdf.addHTML(document.body,function() {
    pdf.save('web.pdf');
});
}

*/
/*
var doc = new jsPDF();
    var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
    };
    

$('#cmd').click(function () {
    
    var html=$("#printableArea").html();
    doc.fromHTML(html, 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
*/



