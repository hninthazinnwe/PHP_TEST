
$(document).ready(function(){

        $('#btnSerial').click(function(){          
            document.getElementById('serial').style.display="block";
        });
        $('#btnAdd').click(function(){
            var alpha = $('#key').val();
            var number = $('#hex').val();
            var other = $('#hex1').val();
            var d = other.split(",");
            var length = d.length;
            if(alpha != "" && number!= "")
            {
            if(d[0]=='င္')
            {
               var c =  d[1];
               //var serial = parseFloat(number)+i;
               findKey(alpha+number);
               var str="<li class='btn btn-sm btn-info divpad'>"+alpha+number+"</li>";
               $("#list").append(str);
               for(var i = 1 ; i<= c ;i++)
                {
                    var serial = parseFloat(number)+i;
                    findKey(alpha+serial);
                    var str="<li class='btn btn-sm btn-info divpad'>"+alpha+serial+"</li>";
                    $("#list").append(str); 
                }
            }
            else if(d[0]=='မႊာ')
            {
                var c =  d[1];
                var serial = parseFloat(number)+i;
                findKey(alpha+number);
                var str="<li class='btn btn-sm btn-info divpad'>"+alpha+number+"</li>";
                $("#list").append(str);
                for(var i = 1 ; i<= c ;i++)
                {
                    var alphabet = ["က","ခ","ဂ","ဃ","င","စ","ဆ","ဇ","ဈ","ည","ဋ","ဌ","ဍ","ဎ","ဏ","တ","ထ","ဒ","ဓ","န","ပ","ဖ","ဗ","ဘ","မ","ယ","ရ","လ","ဝ","သ","ဟ","ဠ","အ","ကက","ကခ","ကဂ","ကဃ","ကင","ကစ","ကဆ","ကဇ","ကဈ","ကည","ကဋ","ကဌ","ကဍ","ကဎ","ကဏ","ကတ","ကထ","ကဒ","ကဓ","ကန","ကပ","ကဖ","ကဗ","ကဘ","ကမ","ကယ","ကရ","ကလ","ကဝ","ကသ","ကဟ","ကဠ","ကအ"];
 				    var a = alphabet.indexOf(alpha);
                    var serial = alphabet[a+i];
                    findKey(serial+number);
                    var str="<li class='btn btn-sm btn-info divpad'>"+serial+number+"</li>";
                    $("#list").append(str);                     
                }
            }
            else
            { 
                //var serial = parseFloat(number)+i;
                findKey(alpha+number);
                var str="<li class='btn btn-sm btn-info divpad'>"+alpha+number+"</li>";
                $("#list").append(str);
                var count = $("ul#list li").length;            
                $('#qty').html(count);
                $('#key').val('');
                $('#hex').val('');
                $('#hex1').val('');
                document.getElementById('serial').style.display='none';

                for(var i = 1 ; i<= length ;i++){
                  var num = d[i];
                  var l = number.length;
                  var n = num.length;
                  var res = number.substr(0, l-n);
                  var serail=res+num;
                  findKey(alpha+serail);
                  var str="<li class='btn btn-sm btn-info divpad'>"+alpha+serail+"</li>";
                  $("#list").append(str);
                  var count = $("ul#list li").length;            
                  $('#qty').html(count);
                  $('#key').val('');
                  $('#hex').val('');
                  $('#hex1').val('');
                  document.getElementById('serial').style.display='none';
                }                
            }

            var count = $("ul#list li").length;            
            $('#qty').html(count);
            $('#key').val('');
            $('#hex').val('');
            $('#hex1').val('');
            document.getElementById('serial').style.display='none';
          }
        });

        $("#list").on('click', 'li', function () {
            BindInput(this.innerHTML);
            $(this).attr('id', 'eli');
        });

        $('#btninsert').on('click',function(){
            var type = $('#edittype').val();
            if(type == 'times')
            {
                table = document.getElementById("buytable");
                var index = $('#editindex').val();
                var times = $('#input').val(); 
                table.rows[index].cells[1].innerHTML = times;
                hideInput();
            }
            else if(type == 'ratio')
            {
                table = document.getElementById("buytable");
                var index = $('#editindex').val();
                var ratio = $('#input').val();
                table.rows[index].cells[4].innerHTML = ratio;
                var ratio = parseFloat(table.rows[index].cells[4].innerHTML);
                var amount = parseFloat(table.rows[index].cells[5].innerHTML);
                table.rows[index].cells[5].innerHTML = amount+(amount*(ratio/100));
                hideInput();
            }
            else{
                var input = $('#input').val();
                $('#eli').html(input);            
                $('#eli').attr('id', '');
                hideInput();
            }          
        });

        $('#btninputdel').on('click',function(){
            $('#eli').remove();
            var count = $("ul#list li").length;            
            $('#qty').html(count);
            hideInput();
        });

        $('#btnsave').on('click',function(){
            var voucher = $('#voucherno').val();
            var date = $('#datepicker').val();
            var customer = $('#supplier option:selected').val();
            var totalqty = $('#totalqty').val();
            var totalamt = $('#totalamount').val();
            var syskey = $('#sys').val();
            var table = document.getElementById("buytable");
            var count = table.rows.length;
      
            if(customer != 0 && count != 0 && totalqty != 0)
            { 
                var header={syskey:syskey,voucher:voucher,date:date,customer:customer,totalamount:totalamt,totalqty:totalqty};
                var body = new Array();               
                for(var i = 1;i < count;i++)
                {   
                    var row={id:i,times:table.rows[i].cells[1].innerHTML,code:table.rows[i].cells[2].innerHTML,description:table.rows[i].cells[3].innerHTML,ratio:parseFloat(table.rows[i].cells[4].innerHTML),prizeamount:table.rows[i].cells[5].innerHTML,qty:table.rows[i].cells[6].innerHTML,amount:table.rows[i].cells[7].innerHTML};
                    body.push(row);   
                }
                var serial = new Array();
                for(var i = 1;i < count;i++)
                { 
                    var key = table.rows[i].cells[8].innerHTML;                   
                    var k = key.split(",");
                    for(var j = 0;j < k.length;j++)
                    {
                        var num = k[j];
                        var n = num.length;
                        var alpha = num.substr(0, n-6);
                        var a = alpha.length;
                        var number =  num.substring(a, 7);
                        var row={id:i,code:table.rows[i].cells[2].innerHTML,description:table.rows[i].cells[3].innerHTML,alpha:alpha,number:number};  
                        serial.push(row);  
                    } 
                }
                var jsonheader = JSON.stringify(header);
                var jsondetail = JSON.stringify(body);
                var jsonserial = JSON.stringify(serial);
                if($('#btnsave').html()=='Save')
                {
                    $.ajax({
                    url:"../dao/buy.php",
                    method:"post",
                    data:{header:jsonheader,detail:jsondetail,serial:jsonserial},
                    success:function(data){
                    window.location.href="../page/buy.php";
                    window.open("../page/buyvoucher.php?syskey="+data);
                   }  
                  });
                }
                else
                {
                    $.ajax({
                    url:"../dao/php.php",
                    method:"post",
                    data:{header:jsonheader,detail:jsondetail,serial:jsonserial},
                    success:function(data){
                    window.location.href="../page/php.php";
                    window.open("../page/buyvoucher.php?syskey="+data);
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

        $("#times").change(function () {
          $('#timesvalue').val($("[name='r']:checked").next('label').text());
    });

    $('#btntimes').click(function(){ 
         table = document.getElementById("buytable");
         var index = $('#editindex').val();
         var times = $('#timesvalue').val(); 
         table.rows[index].cells[1].innerHTML = times;
         hidetimes();
     });

    $('#btnratio').click(function(){ 
         table = document.getElementById("buytable");
         var index = $('#editindex').val(); 
         var ratio = $('#input').val();
         var amount = parseFloat(table.rows[index].cells[10].innerHTML);
         var qty = parseFloat(table.rows[index].cells[6].innerHTML);
         table.rows[index].cells[4].innerHTML = ratio;
         table.rows[index].cells[5].innerHTML = amount+(amount*(ratio/100));
         table.rows[index].cells[7].innerHTML = qty*(amount+(amount*(ratio/100)));
         hideInput();
     });
    
    $("#btnsearch").click(function(){
      var date = $('#reservation').val();//$('#type option:selected').val();
      var d = date.split("-");
      var fdate = d[0].trim();
      var tdate = d[1].trim();
      var search = $('#search').val();
      var filter={fdate:fdate,tdate:tdate,search:search};
      var jsonfilter = JSON.stringify(filter);
      $.ajax({
        url:"../dao/buy.php",
        method:"post",
        data:{buyfilter:jsonfilter},
        success:function(data){       
           $('#buyhistory').html(data);
        }
      });
    });

  });

  function Clear(){
  $("#voucherno").val();
  var now = moment().format("MM/DD/YYYY");
  $("#datepicker").val(now); 
  $('#totalqty').val('0');
  $('#totalamount').val('0');  
  $('#btnsave').html('Save');
  $('#syskey').val('0');
  $("#buylist").html("");
  showDialog();  
}

function AddRow(code){
        $.ajax({
          url:"../dao/buy.php",
          method:"post",
          data:{GetPrize:code},
          success:function(data){
            prize = JSON.parse(data);
            var amount = prize.amount;  
            var table = document.getElementById("buylist");
            var newid = table.rows.length+1;
            var des = $('#prize option:selected').html();
            var code = $('#prize option:selected').val();
            var str='<tr class="bg-pale-dark">\n\
            <td>' + newid + '</td>\n\
            <td onclick="showtimes(this.parentElement.rowIndex);">1(်စ္ေထာင္)</td>\n\
            <td>' + code + '</td>\n\
            <td>' + des + '</td>\n\
            <td onclick="showratio(this.parentElement.rowIndex);">0</td>\n\
            <td>' + amount + '</td>\n\
            <td onclick="showSerial(this.parentElement.rowIndex);">' + 0 + '</td>\n\
            <td>' + 0 + '</td>\n\
            <td></td>\n\
            <td><a class="fa fa-close" id="delbtn" href="#" onclick="DeleteRow()">Delete&nbsp</a></td>\n\
            <td>' + amount + '</td></tr>';
            $("#buylist").append(str); 
            $('#prize').focus();       
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

  function showSerial(index){
  table = document.getElementById("buytable");
  document.getElementById('editindex').value=index;
  document.getElementById("serialoverlay").style.display="block";
  document.getElementById("seraildialog").style.display="block";
  document.getElementById("btninsert").style.display="block";
  document.getElementById("btninputdel").style.display="block";
  var serial = table.rows[index].cells[8].innerHTML;
  if(serial != '')
  {
     var k = serial.split(",");
     for(var j = 0;j < k.length;j++)
     {
        var num = k[j];
        var str="<li class='btn btn-sm btn-info divpad'>"+num+"</li>";
        $("#list").append(str);  
     } 
  }
  var count = $("ul#list li").length;            
  $('#qty').html(count); 
}

function hideSerial(){
    table = document.getElementById("buytable");
    var index = $('#editindex').val();
    var amount = table.rows[index].cells[5].innerHTML;    
    var qty = $('#qty').html();
    var arr = [];

    $('ul#list li').each(function(){
      arr.push($(this).text());
    });

    table.rows[index].cells[7].innerHTML = parseFloat(qty)*parseFloat(amount);
    table.rows[index].cells[6].innerHTML = qty;
    table.rows[index].cells[8].innerHTML = arr;
    
    var count = table.rows.length;var totqty=0;var totamt=0;
    for(var i = 1;i<count;i++)
    {
      var amt = parseFloat(table.rows[i].cells[7].innerHTML);
      var qty = parseFloat(table.rows[i].cells[6].innerHTML); 
      totqty += qty;
      totamt += amt;
    }

    $('#totalqty').val(totqty);
    $('#totalamount').val(totamt);
    document.getElementById("serialoverlay").style.display="none";
    document.getElementById("seraildialog").style.display="none";
    $('#qty').html('0');
    $("ul#list li").remove();            
    
  }
function BindInput(value){
    document.getElementById('editlabel').innerHTML="အကၡရာနံပါတ္ :";
    document.getElementById('edittype').value="";
    document.getElementById('input').value=value;
    document.getElementById("inputoverlay").style.display="block";
    document.getElementById("alertinput").style.display="block";
    document.getElementById("btninputdel").style.display="block"; 
  }  
function hideInput(){
    document.getElementById('editlabel').innerHTML="";
    document.getElementById('edittype').value="";
    document.getElementById("input").value="";
    document.getElementById("inputoverlay").style.display="none";
    document.getElementById("alertinput").style.display="none";
  }
function hidetimes(){
    document.getElementById("inputoverlay").style.display="none";
    document.getElementById("times").style.display="none";
  }  
function findKey(num){
    var list = [];
    $('#list li').each(function(){
        list.push($(this).text());
    }); 
    for(var i=0; i<list.length; i++){
    var name = list[i];
    if(name == num){
      alert('ထီနံပါတ္ '+value+' သည္ေရြးျပီးသားျဖစ္ပါသည္');
      break;
    }     
  }
}  
function showtimes(index){
    document.getElementById('editindex').value=index;
    document.getElementById("times").style.display="block";
    document.getElementById("inputoverlay").style.display="block";
}
function showratio(index){
    document.getElementById('editindex').value=index;
    document.getElementById('edittype').value="ratio";
    document.getElementById('input').value="";
    document.getElementById("inputoverlay").style.display="block";
    document.getElementById("alertinput").style.display="block"; 
    document.getElementById("btnratio").style.display="block";  
}
function buyEdit(syskey)
{
	showDialog();
	$.ajax({
			url:"../dao/buy.php",
			method:"post",
			data:{syskey:syskey},
			success:function(data){
					var header = JSON.parse(data);
					$('#voucherno').val(header[0].voucherNo);
					$('#datepicker').val(header[0].voucherDate);
					$('#supplier').val(header[0].customerId);
					$('#totalqty').val(header[0].totalqty);
		      $('#totalamount').val(header[0].totalAmount);
		      var str = "";
                  for(i = 0; i < header[1].length; i++){ 
                  str += '<tr class="bg-pale-dark">\n\
      						<td>' + header[1][i].id + '</td>\n\
      						<td onclick="showtimes(this.parentElement.rowIndex)">' + header[1][i].times + '</td>\n\
      						<td>' + header[1][i].code + '</td>\n\
      						<td>' + header[1][i].description + '</td>\n\
      						<td onclick="showratio(this.parentElement.rowIndex)">' + header[1][i].ratio + '</td>\n\
      						<td>' + header[1][i].amount + '</td>\n\
      						<td onclick="showSerial(this.parentElement.rowIndex)">' + header[1][i].qty + '</td>\n\
      						<td>' + header[1][i].totalamount + '</td>\n\
      						<td>' + header[1][i].serial + '</td>\n\
                  <td><a class="fa fa-close link-red" id="delbtn" href="#" onclick="DeleteRow()">Delete&nbsp</a></td>\n\
      						<td>' + header[1][i].amount + '</td></tr>';  
    				}
					$("#buylist").html(str); 
					$('#btnsave').html('Update');
					$('#sys').val(header[0].syskey);
				}
			});

}

function buyView(syskey)
{
  //document.getElementById("supplier").className = "form-control select";
	showDialog();  
	$.ajax({
			url:"../dao/buy.php",
			method:"post",
			data:{syskey:syskey},
			success:function(data){
					var header = JSON.parse(data);
					$('#voucherno').val(header[0].voucherNo);
					$('#datepicker').val(header[0].voucherDate);
					$('#totalqty').val(header[0].totalqty);
          var sup = document.getElementById("supplier");
          for (var i = 0; i < sup.options.length; ++i) {
            if (sup.options[i].value === header[0].customerId)
            {
              sup.options[i].selected = true;
            }            
          }
		        $('#totalamount').val(header[0].totalAmount);
		        var str = "";
                for(i = 0; i < header[1].length; i++){
                  str += '<tr class="bg-pale-dark">\n\
      						<td>' + header[1][i].id + '</td>\n\
      						<td onclick="showtimes(this.parentElement.rowIndex)">' + header[1][i].times + '</td>\n\
      						<td>' + header[1][i].code + '</td>\n\
      						<td>' + header[1][i].description + '</td>\n\
      						<td onclick="showratio(this.parentElement.rowIndex)">' + header[1][i].ratio + '</td>\n\
      						<td>' + header[1][i].amount + '</td>\n\
      						<td onclick="showSerial(this.parentElement.rowIndex)">' + header[1][i].qty + '</td>\n\
      						<td>' + header[1][i].totalamount + '</td>\n\
      						<td>' + header[1][i].serial + '</td>\n\
                  <td></td>\n\
                  <td>' + header[1][i].amount + '</td></tr>';      
    				}
					$("#buylist").html(str); 
					$('#btnsave').html('View');
					$('#sys').val(header[0].syskey);
				}
			});
}

function DeleteRow()
{
  var index,table = document.getElementById("buytable");
  var totamount = 0;var delamt = 0;var qty=0;var amount=0;
  var totqty = parseFloat($("#totalqty").val());
  var totamt = parseFloat($("#totalamount").val());
    for(var i = 1; i< table.rows.length;i++)
    {
      table.rows[i].cells[9].onclick=function()
      {
        index=this.parentElement.rowIndex;
        qty = table.rows[index].cells[6].innerHTML;
        amount = table.rows[index].cells[7].innerHTML;
        table.deleteRow(index);
        totqty-=qty;
        totamt-=amount;
        $('#totalqty').val(totqty);
        $('#totalamount').val(totamt);
      }
    }
  }

  function Delete(sys){
     var syskey = sys;
      if(confirm("Are you sure you want to delete?"))
        {
           window.location.href="../dao/buy.php?buydel="+syskey;
     }
  }

function tabletoPdf()
{
//var doc = new jsPDF('p','pt', 'a4', true);
alert(1);
/*
var res = doc.autoTableHtmlToJson(document.getElementById("buyhistory"));
alert(res);
var columns = [res.columns[0], res.columns[1]];
doc.autoTable(columns, res.data, {startY: 60});*/

/*var doc = new jsPDF('p','pt', 'a4', true);
alert();
doc.autotable(10, 10, '', null, {
left:10,
top:10,
bottom: 10,
width: 170,
autoSize:false,
printHeaders: true
});
doc.save('sample-file.pdf');*/

//var elem = document.getElementById("buyhistory");
//var res = doc.autoTableHtmlToJson(elem);
//doc.autoTable(res.columns, res.data);
 var pdf = new jsPDF();
        pdf.text(30, 30, 'Hello world!');
        pdf.save('hello_world.pdf');

}



