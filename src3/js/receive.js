$(document).ready(function(){
      var now = moment().format("MM/DD/YYYY");
      $("#datepicker").val(now);
      $('#qty').val('0');
      $('#totalqty').val('0');

      $('#qty').keypress(function(e){
        if(e.which == 13)
        {
          AddRow();
          e.preventDefault();
        }
      });

      $('#btnsave').click(function(){  
         var voucher = $('#voucherno').val();
         var date = $('#datepicker').val();
         var totalqty = $('#totalqty').val();
         var syskey = $('#sys').val();
         var table = document.getElementById("receivetable");
         var count = table.rows.length;
        if(count > 0)
        { 
          var header={syskey:syskey,voucher:voucher,date:date,totalqty:totalqty};
          var body = new Array();
          for(var i =1;i < count;i++)
          {   
              var row={id:i,code:table.rows[i].cells[1].innerHTML,currency:table.rows[i].cells[2].innerHTML,qty:table.rows[i].cells[3].innerHTML};
              body.push(row);    
          }
          var jsonheader = JSON.stringify(header);
          var jsondetail = JSON.stringify(body);
          if($('#btnsave').html()=='Save')
          {
          $.ajax({
            url:"../dao/transaction.php",
            method:"post",
            data:{rheader:jsonheader,rdetail:jsondetail},
            success:function(data){
                    window.location.href="receive.php";
                    window.open("receivevoucher.php?syskey="+data);
            }
        });
        }
        else
        {
        $.ajax({
            url:"../dao/transaction.php",
            method:"post",
            data:{urheader:jsonheader,rdetail:jsondetail},
            success:function(data){
                    window.location.href="receive.php";
                    window.open("receivevoucher.php?syskey="+data);
            }
        });
        }
      }
      else{
          alert("Please Fill Information!");
        return;
       }
     });

    $('#btnPrint').click(function(){
        var date = $('#reservation').val();//$('#type option:selected').val();
        var d = date.split("-");
        var fdate = d[0];
        var tdate = d[1];
        var text = $('#search').val();
        var table = document.getElementById("receivehistory");
        var count = table.rows.length;
        var filter={fdate:fdate,tdate:tdate,text:text};
        var body = new Array();

        for(var i =1;i < count;i++)
        {   
            var row={date:table.rows[i].cells[1].innerHTML,voucher:table.rows[i].cells[2].innerHTML,qty:table.rows[i].cells[3].innerHTML,staff:table.rows[i].cells[5].innerHTML,location:table.rows[i].cells[4].innerHTML};
            body.push(row);    
        }
        var jsonfilter = JSON.stringify(filter);
        var jsondetail = JSON.stringify(body);
        document.cookie="filter="+jsonfilter;
        document.cookie="body="+jsondetail;
        window.location.href="receive.php";
        window.open("receivereport.php");      
    });

    $("#btnsearch").click(function(){
      var date = $('#reservation').val();//$('#type option:selected').val();
      var d = date.split("-");
      var fdate = d[0];
      var tdate = d[1];
      var search = $('#search').val();
      var filter={fdate:fdate,tdate:tdate,search:search};
        var jsonfilter = JSON.stringify(filter);
        $.ajax({
        url:"../dao/transaction.php",
        method:"post",
        data:{receivefilter:jsonfilter},
        success:function(data){
           $('#receivehistory').html(data);
        }
      });
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

function DeleteRow()
{
  var index,table = document.getElementById("receivetable");
  var totamount = 0;var delamt = 0;var qty=0;var amount=0;
  var totqty = parseFloat($("#totalqty").val());
    for(var i = 1; i< table.rows.length;i++)
    {
      table.rows[i].cells[4].onclick=function()
      {      	      
        index=this.parentElement.rowIndex;
        var qty = table.rows[index].cells[3].innerHTML;
        table.deleteRow(index);
        totqty-=qty;
        $('#totalqty').val(totqty);
      }
    }
}

  function AddRow()
  {
      var table = document.getElementById("receivelist");
      var newid = table.rows.length+1;
      var qty = $("#qty").val();
      var currency=$("#currency option:selected").text();
      var code=$("#currency").val();      
      var totqty = parseFloat($("#totalqty").val());
      totqty += parseFloat(qty);
      var str='<tr class="bg-pale-dark">\n\
      <td>' + newid + '</td>\n\
      <td>' + code + '</td>\n\
      <td>' + currency + '</td>\n\
      <td onclick="showInput(this.parentElement.rowIndex)">' + qty + '</td>\n\
      <td><a class="fa fa-close" id="delbtn" href="#" onclick="DeleteRow()">Delete</a></td></tr>';
        $("#receivelist").append(str); 
        $("#qty").val("0"); 
        $('#totalqty').val(totqty);
        //$('#currency').focus();       
  }
function receiveEdit(syskey)
{
  showDialog();
  $.ajax({
      url:"../dao/transaction.php",
      method:"post",
      data:{rsyskey:syskey},
      success:function(data){
          var header = JSON.parse(data);
          $('#voucherno').val(header[0].voucherNo);
          $('#datepicker').val(header[0].voucherDate);
          $('#totalqty').val(header[0].totalQty);
          var str = "";
              for(i = 0; i < header[1].length; i++){
                   str +='<tr class="bg-pale-dark">\n\
                   <td>' + header[1][i].id + '</td>\n\
                   <td>' + header[1][i].code + '</td>\n\
                   <td>' + header[1][i].currency + '</td>\n\
                   <td onclick="showInput(this.parentElement.rowIndex)">' + header[1][i].qty + '</td>\n\
                   <td><a class="fa fa-close" id="delbtn" href="#" onclick="DeleteRow()">Delete&nbsp</a></td></tr>';        
            }
          $("#receivelist").html(str); 
          $('#btnsave').html('Update');
          $('#sys').val(header[0].syskey);
        }
      });
}

function receiveView(syskey)
{
  showDialog();
  $.ajax({
      url:"../dao/transaction.php",
      method:"post",
      data:{rsyskey:syskey},
      success:function(data){
          var header = JSON.parse(data);
          $('#voucherno').val(header[0].voucherNo);
          $('#datepicker').val(header[0].voucherDate);
          $('#totalqty').val(header[0].totalQty);
 		  var str = "";
          for(i = 0; i < header[1].length; i++){
              str +='<tr class="bg-pale-dark">\n\
              <td>' + header[1][i].id + '</td>\n\
              <td>' + header[1][i].code + '</td>\n\
              <td>' + header[1][i].currency + '</td>\n\
              <td>' + header[1][i].qty + '</td>\n\
              <td></td></tr>';        
            }
          $("#receivelist").html(str); 
          $('#btnsave').html('Update');
          $('#sys').val(header[0].syskey);
        }
      });
}

function showDialog()
{
  document.getElementById("overlay").style.display="block";
  document.getElementById("ratedialog").style.display="block";
}

function hideDialog()
{
    document.getElementById("overlay").style.display="none";
    document.getElementById("ratedialog").style.display="none";
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

function QtyFocus()
{
	document.getElementById("qty").value = '0';
  document.getElementById("qty").focus();
}

function Clear(formno){

  $("#voucherno").val(formno);
  var now = moment().format("MM/DD/YYYY");
  $("#datepicker").val(now); 
  $('#qty').val('0');
  $('#totalqty').val('0');  
  $('#btnsave').html('Save');
  $('#sys').val('0');
  $("#receivelist").html("");
  showDialog();
  
}

function EditRow()
{
  table = document.getElementById("receivetable");
  var index = $('#editindex').val();
  var qty = $('#editqty').val();
  table.rows[index].cells[3].innerHTML = qty;
  var totamount = 0;var delamt = 0;var qty=0;var amount=0;var totqty = 0;var totamt = 0;
    for(var i = 1; i< table.rows.length;i++)
    {
      qty = table.rows[i].cells[3].innerHTML;
      totqty+=parseFloat(qty);
      $('#totalqty').val(totqty);
    }

    hideInput();
}