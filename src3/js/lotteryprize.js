
$(document).ready(function(){

        $('#btnSerial').click(function(){          
            document.getElementById('serial').style.display="block";
        });
        $('#prize').change(function(){
            AddRow();
        });
        $('#btnAdd').click(function(){
            var alpha = $('#key').val();
            var number = $('#hex').val();
            var other = $('#hex1').val();
            var d = other.split(",");
            var length = d.length;
            
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
        });

        $("#list").on('click', 'li', function () {
            BindInput(this.innerHTML);
            $(this).attr('id', 'eli');
        });

        $('#btninsert').on('click',function(){
            var input = $('#input').val();
            $('#eli').html(input);            
            $('#eli').attr('id', '');
            hideInput();          
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
            var times = $('#times option:selected').html();
            var totalqty = $('#totalqty').val();
            var syskey = $('#sys').val();
            var table = document.getElementById("lotteryprizetable");
            var count = table.rows.length;
            if(times != "" && count != 0 )
            { 
                var header={syskey:syskey,voucher:voucher,date:date,times:times,totalqty:totalqty};
                var body = new Array();               
                for(var i = 1;i < count;i++)
                {   
                    var row={id:i,times:table.rows[i].cells[0].innerHTML,code:table.rows[i].cells[1].innerHTML,description:table.rows[i].cells[2].innerHTML,prizeamount:table.rows[i].cells[3].innerHTML,qty:table.rows[i].cells[4].innerHTML};
                    body.push(row);    
                }
                var serial = new Array();
                for(var i = 1;i < count;i++)
                { 
                    var key = table.rows[i].cells[5].innerHTML;                   
                    var k = key.split(",");
                    for(var j = 0;j < k.length;j++)
                    {
                        var num = k[j];
                        var n = num.length;
                        var alpha = num.substr(0, n-6);
                        var a = alpha.length;
                        var number =  num.substring(a, 7);
                        var row={id:i,code:table.rows[i].cells[1].innerHTML,description:table.rows[i].cells[2].innerHTML,alpha:alpha,number:number};  
                        serial.push(row);  
                    } 
                }
                var jsonheader = JSON.stringify(header);
                var jsondetail = JSON.stringify(body);
                var jsonserial = JSON.stringify(serial);
                if($('#btnsave').html()=='Save')
                {
                    $.ajax({
                    url:"../dao/lotteryprize.php",
                    method:"post",
                    data:{header:jsonheader,detail:jsondetail,serial:jsonserial},
                    success:function(data){
                    window.location.href="../page/lotteryprize.php";
                   }  
                  });
                }
                else
                {
                    $.ajax({
                    url:"../dao/lotteryprize.php",
                    method:"post",
                    data:{header:jsonheader,detail:jsondetail,serial:jsonserial},
                    success:function(data){
                    window.location.href="../page/lotteryprize.php";
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

    });

  function Clear(){
  $("#times").val();
  var now = moment().format("MM/DD/YYYY");
  $("#datepicker").val(now); 
  $('#totalqty').val('0'); 
  $('#btnsave').html('Save');
  $('#syskey').val('0');
  $("#lotteryprizelist").html("");
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
      var table = document.getElementById("lotteryprizelist");
      var newid = table.rows.length+1;
      var des = $('#prize option:selected').html();
      var code = $('#prize option:selected').val();
      var str='<tr class="bg-pale-dark">\n\
      <td>' + newid + '</td>\n\
      <td>' + code + '</td>\n\
      <td>' + des + '</td>\n\
      <td>' + amount + '</td>\n\
      <td onclick="showSerial(this.parentElement.rowIndex);">' + 0 + '</td>\n\
      <td>' + '' + '</td>\n\
      <td><a class="fa fa-close" id="delbtn" href="#" onclick="DeleteRow()">Delete&nbsp</a></td></tr>';
      $("#lotteryprizelist").append(str); 
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
  document.getElementById('editindex').value=index;
  document.getElementById("serialoverlay").style.display="block";
  document.getElementById("sdialog").style.display="block";
  var serial = table.rows[index].cells[5].innerHTML;
  var k = serial.split(",");
  for(var j = 0;j < k.length;j++)
     {
        var num = k[j];
        var str="<li class='btn btn-sm btn-info divpad'>"+num+"</li>";
        $("#list").append(str);  
     }
  var count = l.length;            
  $('#qty').html(count);     
  }

function hideSerial(){
    table = document.getElementById("lotteryprizetable");
    var index = $('#editindex').val();   
    var qty = $('#qty').html();
    var arr = [];

    $('ul#list li').each(function(){
      arr.push($(this).text());
    });

    table.rows[index].cells[4].innerHTML = qty;
    table.rows[index].cells[5].innerHTML = arr;
    var totqty = parseFloat($("#totalqty").val());
    totqty += parseFloat(qty);
    $('#totalqty').val(totqty);
    document.getElementById("serialoverlay").style.display="none";
    document.getElementById("sdialog").style.display="none";
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
function lotteryprizeEdit(syskey)
{
	showDialog();
	$.ajax({
			url:"../dao/lotteryprize.php",
			method:"post",
			data:{syskey:syskey},
			success:function(data){
					var header = JSON.parse(data);
					$('#voucherno').val(header[0].voucherNo);
					$('#datepicker').val(header[0].lotteryDate);
					$('#times').val(header[0].times);
					$('#totalqty').val(header[0].n1);
          var str = "";

              for(i = 0; i < header[1].length; i++){
                  str += '<tr class="bg-pale-dark">\n\
                  <td>' + header[1][i].id + '</td>\n\
                  <td>' + header[1][i].code + '</td>\n\
                  <td>' + header[1][i].description + '</td>\n\
                  <td>' + header[1][i].amount + '</td>\n\
                  <td onclick="showSerial(this.parentElement.rowIndex)">' + header[1][i].qty + '</td>\n\
                  <td>' + header[1][i].serial + '</td>\n\
      						<td><a class="fa fa-close" id="delbtn" href="#" onclick="DeleteRow()">Delete&nbsp</a></td></tr>';  
    				}
					$("#lotteryprizelist").html(str); 
					$('#btnsave').html('Update');
					$('#sys').val(header[0].syskey);
				}
		});
}

function lotteryprizeView(syskey)
{
	showDialog();
	$.ajax({
			url:"../dao/lotteryprize.php",
			method:"post",
			data:{syskey:syskey},
			success:function(data){
					var header = JSON.parse(data);
					$('#voucherno').val(header[0].voucherNo);
					$('#datepicker').val(header[0].lotteryDate);
					$('#times').val(header[0].times);
					$('#totalqty').val(header[0].n1);
		      var str = "";

            for(i = 0; i < header[1].length; i++){
                  str += '<tr class="bg-pale-dark">\n\
      						<td>' + header[1][i].id + '</td>\n\
      						<td>' + header[1][i].code + '</td>\n\
      						<td>' + header[1][i].description + '</td>\n\
      						<td>' + header[1][i].amount + '</td>\n\
      						<td onclick="showSerial(this.parentElement.rowIndex)">' + header[1][i].qty + '</td>\n\
      						<td>' + header[1][i].serial + '</td>\n\
      						<td></td></tr>';       
    				}
					$("#lotteryprizelist").html(str); 
					$('#btnsave').html('View');
					$('#sys').val(header[0].syskey);
				}
			});
}


