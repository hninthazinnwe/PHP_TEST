$(document).ready(function(){
    var now = moment().format("MM/DD/YYYY");
    $("#datepicker").val(now);
    $('#qty').val('1');
    $('#totalqty').val('0');
    
    $('#qty').keypress(function(e){
        if(e.which == 13)
        {
          AddRow();
          e.preventDefault();
        }
    });

    $('#btnsave').click(function(){  
         var syskey = $('#sys').val();
         var voucher = $('#voucherno').val();
         var date = $('#datepicker').val();
         var totalqty = $('#totalqty').val();
         var type = $('#type').val();
         var location = $('#location').val();
         var table = document.getElementById("transfertable");
         var count = table.rows.length;
      
        if(count > 0)
        { 
          var header={syskey:syskey,type:type,location:location,voucher:voucher,date:date,totalqty:totalqty};
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
            alert();
            $.ajax({
               url:"../dao/transaction.php",
               method:"post",
               data:{theader:jsonheader,tdetail:jsondetail},
               success:function(data){
                alert(data);
                    window.location.href="transfer.php";
                    window.open("transfervoucher.php?syskey="+data);
               }
            });
          }
          else
          {
            $.ajax({
               url:"../dao/transaction.php",
               method:"post",
               data:{utheader:jsonheader,tdetail:jsondetail},
               success:function(data){
                    window.location.href="transfer.php";
                    window.open("transfervoucher.php?syskey="+data);
               }
            });
          }
      }
      else
      {
          alert("Please Fill Information!");
          return;
       }
    });

    $('#btnPrint').click(function(){
        var date = $('#reservation').val();
        var d = date.split("-");
        var fdate = d[0];
        var tdate = d[1];
        var text = $('#search').val();
        var table1 = document.getElementById("transferInhistory");
        var table2 = document.getElementById("transferOuthistory");
        var count1 = table1.rows.length;
        var count2 = table2.rows.length;
        var filter={fdate:fdate,tdate:tdate,text:text};
        var body1 = new Array();
        var body2 = new Array();
        for(var i =1;i < count1;i++)
        {   
            var row={date:table1.rows[i].cells[1].innerHTML,voucher:table1.rows[i].cells[2].innerHTML,qty:table1.rows[i].cells[3].innerHTML,staff:table1.rows[i].cells[5].innerHTML,location:table1.rows[i].cells[4].innerHTML};
            body1.push(row);    
        }

        for(var i =1;i < count2;i++)
        {   
            var row={date:table2.rows[i].cells[1].innerHTML,voucher:table2.rows[i].cells[2].innerHTML,qty:table2.rows[i].cells[3].innerHTML,staff:table2.rows[i].cells[5].innerHTML,location:table2.rows[i].cells[4].innerHTML};
            body2.push(row);    
        }
        var jsonfilter = JSON.stringify(filter);
        var jsondetail1 = JSON.stringify(body1);
        var jsondetail2 = JSON.stringify(body2);

        document.cookie="filter="+jsonfilter;
        document.cookie="bodyIn="+jsondetail1;
        document.cookie="bodyOut="+jsondetail2;

        window.location.href="transfer.php";
        window.open("transferreport.php");  
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
        data:{transferfilter:jsonfilter},
        success:function(data){
           $('#transferInhistory').html(data[0]);
           $('#transferOuthistory').html(data[1]);
        }
      });  
    });
});

function transferEdit(syskey)
{
  showDialog();
  $.ajax({
      url:"../dao/transaction.php",
      method:"post",
      data:{tsyskey:syskey},
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
          $("#transferlist").html(str); 
          $('#btnsave').html('Update');
          $('#sys').val(header[0].syskey);
        }
      });
}

function transferView(syskey)
{
  showDialog();
  $.ajax({
      url:"../dao/transaction.php",
      method:"post",
      data:{tsyskey:syskey},
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
          $("#transferlist").html(str); 
          $('#btnsave').html('Update');
          $('#sys').val(header[0].syskey);
        }
      });
}    

function DeleteRow()
{
  var index,table = document.getElementById("transfertable");
  var totamount = 0;var delamt = 0;var qty=0;var amount=0;
  var totqty = parseFloat($("#totalqty").val());
    for(var i = 1; i< table.rows.length;i++)
    {
      table.rows[i].cells[4].onclick=function()
      {
        qty = table.rows[i].cells[3].innerHTML;
        index=this.parentElement.rowIndex;
        table.deleteRow(index);
        totqty-=qty;
        $('#totalqty').val(totqty);
      }
    }

  }

function showDialog()
{
  document.getElementById("overlay").style.display="block";
  document.getElementById("dialog").style.display="block";
}

function hideDialog()
{
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

function QtyFocus()
{
  document.getElementById("qty").value = '0';
  document.getElementById("qty").focus();
}
  
function AddRow()
{
      var table = document.getElementById("transferlist");
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
      <td>' + qty + '</td>\n\
      <td><a class="fa fa-close" id="delbtn" href="#" onclick="DeleteRow()">Delete</a></td></tr>';
        $("#transferlist").append(str); 
        $("#qty").val("1"); 
        $('#totalqty').val(totqty);
        $('#currency').focus();
}

function QtyFocus()
{
    $('#qty').focus();         
}

function Clear(formno)
{
  $("#voucherno").val(formno);
  var now = moment().format("MM/DD/YYYY");
  $("#datepicker").val(now); 
  $('#qty').val('0');
  $('#totalqty').val('0');  
  $('#btnsave').html('Save');
  $('#sys').val('0');
  $("#transferlist").html("");
  showDialog();  
}

function EditRow()
{
  table = document.getElementById("transfertable");
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