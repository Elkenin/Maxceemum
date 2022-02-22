
  /*<! =============== AUTO CHECK NO =============== !>*/
  var yes1 = document.getElementById("yes1").checked;
  var yes2 = document.getElementById("yes2").checked;
  var yes3 = document.getElementById("yes3").checked;
  var yes4 = document.getElementById("yes4").checked;
  var yes5 = document.getElementById("yes5").checked;
  var yes6 = document.getElementById("yes6").checked;
  var yes7 = document.getElementById("yes7").checked;
  var yes8 = document.getElementById("yes8").checked;
  var yes9 = document.getElementById("yes9").checked;
  var yes10 = document.getElementById("yes10").checked;
  var yes11 = document.getElementById("yes11").checked;
  var yes12 = document.getElementById("yes12").checked;
  var yes13= document.getElementById("yes13").checked;
  var yes14 = document.getElementById("yes14").checked;
  var yes15 = document.getElementById("yes15").checked;
  var yes16 = document.getElementById("yes16").checked;
  var yes17 = document.getElementById("yes17").checked;
  var yes18 = document.getElementById("yes18").checked;
  var yes19 = document.getElementById("yes19").checked;
  if(yes1==false&&yes2==false&&yes3==false&&yes4==false&&yes5==false&&yes6==false&&yes7==false&&yes8==false&&yes9==false&&yes10==false&&yes11==false&&yes12==false&&yes13==false&&yes14==false&&yes15==false&&yes16==false&&yes17==false&&yes18==false&&yes19==false)
  {
    document.getElementById("no1").checked = true;
    document.getElementById("no2").checked = true;
    document.getElementById("no3").checked = true;
    document.getElementById("no4").checked = true;
    document.getElementById("no5").checked = true;
    document.getElementById("no6").checked = true;
    document.getElementById("no7").checked = true;
    document.getElementById("no8").checked = true;
    document.getElementById("no9").checked = true;
    document.getElementById("no10").checked = true;
    document.getElementById("no11").checked = true;
    document.getElementById("no12").checked = true;
    document.getElementById("no13").checked = true;
    document.getElementById("no14").checked = true;
    document.getElementById("no15").checked = true;
    document.getElementById("no16").checked = true;
    document.getElementById("no17").checked = true;
    document.getElementById("no18").checked = true;
    document.getElementById("no19").checked = true;
  }
  else if(yes1==true&&yes2==true&&yes3==true&&yes4==true&&yes5==true&&yes6==true&&yes7==true&&yes8==true&&yes9==true&&yes10==true&&yes11==true&&yes12==true&&yes13==true&&yes14==true&&yes15==true&&yes16==true&&yes17==true&&yes18==true&&yes19==true)
  {
    document.getElementById("no1").checked = false;
    document.getElementById("no2").checked = false;
    document.getElementById("no3").checked = false;
    document.getElementById("no4").checked = false;
    document.getElementById("no5").checked = false;
    document.getElementById("no6").checked = false;
    document.getElementById("no7").checked = false;
    document.getElementById("no8").checked = false;
    document.getElementById("no9").checked = false;
    document.getElementById("no10").checked = false;
    document.getElementById("no11").checked = false;
    document.getElementById("no12").checked = false;
    document.getElementById("no13").checked = false;
    document.getElementById("no14").checked = false;
    document.getElementById("no15").checked = false;
    document.getElementById("no16").checked = false;
    document.getElementById("no17").checked = false;
    document.getElementById("no18").checked = false;
    document.getElementById("no19").checked = false;
  }



  let date = new Date();
  var year = date.getFullYear();
  var month = date.getMonth()+1;
  var day = date.getDate();
  var currentdate = `${month}/${day}/${year}`;
     document.getElementById("date").value = `${currentdate}`;


     
     var my_handlers = {


        fill_cities: function(){

            var province_code = $(this).val().toString();
            $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
        },


        fill_barangays: function(){

            var city_code = $(this).val().toString();
            $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
        }
    };

    $(function(){
     
        $('#province').on('change', my_handlers.fill_cities);
        $('#city').on('change', my_handlers.fill_barangays);

       
        $('#province').ph_locations({'location_type': 'provinces'});
        $('#city').ph_locations({'location_type': 'cities'});
        $('#barangay').ph_locations({'location_type': 'barangays'});

        $('#province').ph_locations('fetch_list');
    });
    
    $("#province").on('change', function(val){ console.log(val)});
  