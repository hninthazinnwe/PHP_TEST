$(document).ready(function(){
	var now = moment().format("MM/DD/YYYY");
	$("#datepicker").val(now);
	$('#rate').val('0');
	$('#unit').val('0');
	$('#qty').val('1');
	$('#amount').val('0');
	$('#totalqty').val('0');
	$('#totalamount').val('0');

	$('#btnsave').click(function(){

		var voucher = $('#voucherno').val();
		var date = $('#datepicker').val();
		var type = $('#type').val();
		var payment = $('#payment').val();
		var location = $('#location').val();
		var customer = $('#customer').val();
		var totalqty = $('#totalqty').val();
		var totalamt = $('#totalamount').val();
		var syskey = $('#sys').val();

        var table = document.getElementById("exchangetable");
		var count = table.rows.length;
  		
		if(payment != null && customer != null && count > 0)
			{	
		    var header={syskey:syskey,voucher:voucher,date:date,type:type,payment:payment,location:location,customer:customer,totalamount:totalamt,totalqty:totalqty};
  			
  			var body = new Array();
  			for(var i =1;i < count;i++)
  			{  	
  			    var row={id:i,code:table.rows[i].cells[1].innerHTML,currency:table.rows[i].cells[2].innerHTML,rate:table.rows[i].cells[3].innerHTML,unit:table.rows[i].cells[4].innerHTML,qty:table.rows[i].cells[5].innerHTML,amount:table.rows[i].cells[6].innerHTML};
 		  	    body.push(row);    
  			}
  			var jsonheader = JSON.stringify(header);
  			var jsondetail = JSON.stringify(body);
  			if($('#btnsave').html()=='Save')
	        {
  			$.ajax({
				url:"../dao/exchange.php",
				method:"post",
				data:{header:jsonheader,detail:jsondetail},
				success:function(data){
					window.location.href="../page/exchange.php";
					window.open("../page/exchangevoucher.php?syskey="+data);
				}
			});
  		    }
  		    else
  		    {
			$.ajax({
				url:"../dao/exchange.php",
				method:"post",
				data:{uheader:jsonheader,detail:jsondetail},
				success:function(data){
					window.location.href="../page/exchange.php";
					window.open("../page/exchangevoucher.php?syskey="+data);
				}
			});
  		    }
			}
		    else{
			    alert("Please Fill Information!");
				return;
  		    }
	    });

		$('#btnOK').click(function(){
			EditRow();
	    });

	    $('#editqty').keypress(function(e){
        if(e.which == 13)
        {
          EditRow();
          e.preventDefault();
        }
    });

 });

function exchangeEdit(syskey)
{
	showDialog();
	$.ajax({
			url:"../dao/exchange.php",
			method:"post",
			data:{syskey:syskey},
			success:function(data){
					var header = JSON.parse(data);
					$('#voucherno').val(header[0].voucherNo);
					$('#datepicker').val(header[0].exchangeDate);
					$('#type').val(header[0].recordType);
					$('#payment').val(header[0].paymentType);
					$('#customer').val(header[0].customerId);
					$('#totalqty').val(header[0].totalqty);
		            $('#totalamount').val(header[0].totalAmount);
		            $('#location').val(header[0].n1);

		            if(header[0].recordType == 3)
		            {
            			document.getElementById('pay').value = "1";
            			document.getElementById('pay').style.display="none";
            			document.getElementById('loc').style.display="block";
		            }
		            else
		            {
            			document.getElementById('pay').style.display="block";
            			document.getElementById('loc').style.display="none";
		            }

		            var str = "";

                    for(i = 0; i < header[1].length; i++){
                    str += '<tr class="bg-pale-dark">\n\
      						<td>' + header[1][i].id + '</td>\n\
      						<td>' + header[1][i].code + '</td>\n\
      						<td>' + header[1][i].currency + '</td>\n\
      						<td>' + header[1][i].rate + '</td>\n\
      						<td>' + header[1][i].unit + '</td>\n\
      						<td onclick="showInput(this.parentElement.rowIndex)">' + header[1][i].qty + '</td>\n\
      						<td>' + header[1][i].amount + '</td>\n\
      						<td><a class="fa fa-close" id="delbtn" href="#" onclick="DeleteRow()">Delete&nbsp</a></td></tr>';       
    				}
					$("#exchangelist").html(str); 
					$('#btnsave').html('Update');
					$('#sys').val(header[0].syskey);
				}
			});

}

function exchangeView(syskey)
{
	showDialog();
	$.ajax({
			url:"../dao/exchange.php",
			method:"post",
			data:{syskey:syskey},
			success:function(data){
					var header = JSON.parse(data);
					$('#voucherno').val(header[0].voucherNo);
					$('#datepicker').val(header[0].exchangeDate);
					$('#type').val(header[0].recordType);
					$('#payment').val(header[0].paymentType);
					$('#customer').val(header[0].customerId);
					$('#totalqty').val(header[0].totalqty);
		            $('#totalamount').val(header[0].totalAmount);
		            var str = "";

                    for(i = 0; i < header[1].length; i++){
                    str += '<tr class="bg-pale-dark">\n\
      						<td>' + header[1][i].id + '</td>\n\
      						<td>' + header[1][i].code + '</td>\n\
      						<td>' + header[1][i].currency + '</td>\n\
      						<td>' + header[1][i].rate + '</td>\n\
      						<td>' + header[1][i].unit + '</td>\n\
      						<td>' + header[1][i].qty + '</td>\n\
      						<td>' + header[1][i].amount + '</td>\n\
      						<td></td></tr>';       
    				}
					$("#exchangelist").html(str); 
					$('#btnsave').html('Update');
					$('#sys').val(header[0].syskey);
				}
			});

}

function showDialog(){
  document.getElementById("overlay").style.display="block";
  document.getElementById("dialog").style.display="block";
}

function hideDialog(){
    document.getElementById("overlay").style.display="none";
    document.getElementById("dialog").style.display="none";
}

function showInput(index){
  document.getElementById("editindex").value=index;
  document.getElementById("inputoverlay").style.display="block";
  document.getElementById("alertinput").style.display="block";
  document.getElementById("editqty").focus();
}

function hideInput(){
	document.getElementById("editqty").value="";
    document.getElementById("inputoverlay").style.display="none";
    document.getElementById("alertinput").style.display="none";
  }

function EditRow()
{
  table = document.getElementById("exchangetable");
  var index = $('#editindex').val();
  var qty = $('#editqty').val();
  var unit = table.rows[index].cells[4].innerHTML;
  var rate = table.rows[index].cells[3].innerHTML;
  table.rows[index].cells[5].innerHTML = qty;
  table.rows[index].cells[6].innerHTML = qty*unit*rate;  
  var totamount = 0;var delamt = 0;var qty=0;var amount=0;var totqty = 0;var totamt = 0;
    for(var i = 1; i< table.rows.length;i++)
    {
      qty = table.rows[i].cells[5].innerHTML;
      amount = table.rows[i].cells[6].innerHTML;
      totqty+=parseFloat(qty);
      totamt+=parseFloat(amount);
      $('#totalqty').val(totqty);
      $('#totalamount').val(totamt);
    }

    hideInput();
}
