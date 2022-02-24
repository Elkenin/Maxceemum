/*<!-- ========== Get Plan Type =========== --!>*/
function calculate(value)
{
  var webrequest=new XMLHttpRequest();
  webrequest.onreadystatechange = function()
  {
    if(value.lenght == 0)
    {
      document.getElementById("amounttopay").value = "";
      document.getElementById("numberperpay").value = "";
      document.getElementById("amountperpay").value = "";
      document.getElementById("totalamount").value = "";
      return;
    }
    if(this.readyState == 4 && this.status == 200)
    {
      var arr = JSON.parse(this.responseText);
      document.getElementById("amounttopay").value = arr[0];
      document.getElementById("numberperpay").value = arr[1];
      document.getElementById("amountperpay").value = arr[2];
      document.getElementById("totalamount").value = arr[3];
    }
  }

  var type = document.getElementById("plantype").value;
  webrequest.open("GET","autofill.php?amount="+value+"&type="+type, true);
  webrequest.send();
} 

function search()
{
  var webrequest=new XMLHttpRequest();
  webrequest.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status == 200)
    {
      var arr = JSON.parse(this.responseText);
      if (arr[0] == "Account not Found!")
      {
        Swal.fire(
        {
          icon: 'info',
          html: '<b>Account not Found!</b>',
          showCloseButton: true,
          showCancelButton: false,
          focusConfirm: false,
          confirmButtonText:
          'OK',
          confirmButtonAriaLabel: 'ok',
          cancelButtonText:
          '<i class="fa fa-thumbs-down"></i>',
          cancelButtonAriaLabel: 'Thumbs down'
        })
      }
      else if (arr[0] != "Account not Found!")
      {
        /*<!--========= Getting all Response Info =========-->*/
        /*<!--========= Getting Members Page TextBox ID`s =========-->*/
        document.getElementById("contractno").value = arr[0];
        document.getElementById("memberid").value = arr[1];
        document.getElementById("date").value = arr[2];
        document.getElementById("lastname").value = arr[3];
        document.getElementById("firstname").value = arr[4];
        document.getElementById("middlename").value = arr[5];
        document.getElementById("suffix").value = arr[6];
        document.getElementById("address").value = arr[7];
        $('#province option:selected').text(arr[8]);
        //document.getElementById("showprov").text = arr[8];
        document.getElementById("showcity").text = arr[9];
        document.getElementById("showbar").text = arr[10];
        document.getElementById("zipcode").value = arr[11];
        document.getElementById("bday").value = arr[12];
        document.getElementById("age").value = arr[13];
        document.getElementById("bplace").value = arr[14];
        document.getElementById("gender").value = arr[15];
        document.getElementById("civilstatus").value = arr[16];
        document.getElementById("number").value = arr[17];
        document.getElementById("email").value = arr[18];
        document.getElementById("height").value = arr[19];
        document.getElementById("weight").value = arr[20];
        /*<!--========= Beneficiaries Info =========-->*/

        /*<!--========= Primary Info =========-->*/
        document.getElementById("pname").value = arr[21];
        document.getElementById("prelationship").value = arr[22];
        document.getElementById("page").value = arr[23];
        document.getElementById("pbday").value = arr[24];
        /*<!--========= Contingent Info =========-->*/
        document.getElementById("cname").value = arr[25];
        document.getElementById("crelationship").value = arr[26];
        document.getElementById("cage").value = arr[27];
        document.getElementById("cbday").value = arr[28];
        /*<!--========= Agent Info =========-->*/
        document.getElementById("agentid").value = arr[29]; document.getElementById("agentid").readOnly = true;
        document.getElementById("agent-fullname").value = arr[30];  document.getElementById("agent-fullname").readOnly = true;
        document.getElementById("agent-position").value = arr[31];  document.getElementById("agent-position").readOnly = true;
        /*<!--========= Plan Type Info =========-->*/
        arr[32] = document.getElementById("plantype").value = arr[32];  document.getElementById("plantype").readOnly = true;
        document.getElementById("modeofpayment").value = arr[33]; document.getElementById("modeofpayment").readOnly = true;
        document.getElementById("amounttopay").value = arr[34]; document.getElementById("amounttopay").readOnly = true;
        document.getElementById("numberperpay").value = arr[35];  document.getElementById("numberperpay").readOnly = true;
        document.getElementById("amountperpay").value = arr[36];  document.getElementById("amountperpay").readOnly = true;
        document.getElementById("totalamount").value = arr[37]; document.getElementById("totalamount").readOnly = true;

        /*<!--========= Health Info =========-->*/
        if(arr[38] == 1){document.getElementById("yes1").checked=true;document.getElementById("no1").checked=false;}
        if(arr[39] == 1){document.getElementById("yes2").checked=true;document.getElementById("no2").checked=false;}
        if(arr[40] == 1){document.getElementById("yes3").checked=true;document.getElementById("no3").checked=false;}
        if(arr[41] == 1){document.getElementById("yes4").checked=true;document.getElementById("no4").checked=false;}
        if(arr[42] == 1){document.getElementById("yes5").checked=true;document.getElementById("no5").checked=false;}
        if(arr[43] == 1){document.getElementById("yes6").checked=true;document.getElementById("no6").checked=false;}
        if(arr[44] == 1){document.getElementById("yes7").checked=true;document.getElementById("no7").checked=false;}
        if(arr[45] == 1){document.getElementById("yes8").checked=true;document.getElementById("no8").checked=false;}
        if(arr[46] == 1){document.getElementById("yes9").checked=true;document.getElementById("no9").checked=false;}
        if(arr[47] == 1){document.getElementById("yes10").checked=true;document.getElementById("no10").checked=false;}
        if(arr[48] == 1){document.getElementById("yes11").checked=true;document.getElementById("no11").checked=false;}
        if(arr[49] == 1){document.getElementById("yes12").checked=true;document.getElementById("no12").checked=false;}
        if(arr[50] == 1){document.getElementById("yes13").checked=true;document.getElementById("no13").checked=false;}
        if(arr[51] == 1){document.getElementById("yes14").checked=true;document.getElementById("no14").checked=false;}
        if(arr[52] == 1){document.getElementById("yes15").checked=true;document.getElementById("no15").checked=false;}
        if(arr[53] == 1){document.getElementById("yes16").checked=true;document.getElementById("no16").checked=false;}
        if(arr[54] == 1){document.getElementById("yes17").checked=true;document.getElementById("no17").checked=false;}
        if(arr[55] == 1){document.getElementById("yes18").checked=true;document.getElementById("no18").checked=false;}
        if(arr[56] == 1){document.getElementById("yes19").checked=true;document.getElementById("no19").checked=false;}
        document.getElementById("num20").value = arr[57];
        return false;
      }
    }
  }
  var member = document.getElementById("member").value;
  var username = document.getElementById("username").value;
  webrequest.open("GET","autofill.php?member="+member+"&username="+username, true);
  webrequest.send();
}

/*<!-- ========== Get Agent =========== --!>*/
  function getid(value)
  {
    var webrequest=new XMLHttpRequest();
    webrequest.onreadystatechange = function()
    {
      if(value.lenght == 0)
      {
        document.getElementById("agent-fullname").value = "";
        document.getElementById("agent-position").value = "";
        return;
      }
      if(this.readyState == 4 && this.status == 200)
      {
        var arr = JSON.parse(this.responseText);
        document.getElementById("agent-fullname").value = arr[0];
        document.getElementById("agent-position").value = arr[1];
      }
    }
    webrequest.open("GET","autofill.php?name="+value, true);
    webrequest.send();
}


function getaddress()
{
  document.getElementById("newprovince").value = $('#province option:selected').text();
  document.getElementById("newcity").value = $('#city option:selected').text();
  document.getElementById("newbarangay").value = $('#barangay option:selected').text();
}
