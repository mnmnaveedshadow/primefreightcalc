
						function selectCity(cId){
							$('#city').load('ajax_pages/show_cities.php',{ c_id:cId });
						}

						function selectCityOrginAir(cId){
							$('#city_orgin_air').load('ajax_pages/show_cities.php',{ c_id:cId });
						}

						function selectCityDestiAir(cId){
							$('#city_desti_air').load('ajax_pages/show_cities.php',{ c_id:cId });
						}


						function selectAirportOrgin(aId){
							$('#airport_orgin').load('ajax_pages/show_airport.php',{ ap_id:aId });
						}

						function selectAirportDestination(aId){
							$('#airport_desti').load('ajax_pages/show_airport.php',{ ap_id:aId });
						}
						// start of sea
						function selectCityOrginSea(cId){
							$('#city_orgin_sea').load('ajax_pages/show_cities.php',{ c_id:cId });
						}

						function selectCityDestiSea(cId){
							$('#city_desti_sea').load('ajax_pages/show_cities.php',{ c_id:cId });
						}

						function selectSeaPortOrgin(cId){
								$('#seaport_sea_orgin').load('ajax_pages/show_seaport.php',{ id:cId });
						}

						function selectSeaPortDesti(cId){
								$('#seaport_sea_desti').load('ajax_pages/show_seaport.php',{ id:cId });
						}
						//end of sea
						// start of land
						function selectCityOrginLand(cId){
							$('#city_orgin_land').load('ajax_pages/show_cities.php',{ c_id:cId });
						}

						function selectCityDestiLand(cId){
							$('#city_desti_land').load('ajax_pages/show_cities.php',{ c_id:cId });
						}

						function selectBorderOrgin(cId){
								$('#border_orgin').load('ajax_pages/show_border.php',{ id:cId });
						}

						function selectBorderDesti(cId){
								$('#border_desti').load('ajax_pages/show_border.php',{ id:cId });
						}

function addOrUpdateCustomerInfo(){
  var name = document.getElementById('customerName').value;
  var email = document.getElementById('email').value;
  var phoneNumber = document.getElementById('phoneNumber').value;
  var companyName = document.getElementById('companyName').value;
  var countries = document.getElementById('countries').value;
  var city = document.getElementById('city').value;
  var address = document.getElementById('address').value;

  $.ajax({
    url:'backend/add_customer.php',
    method:'POST',
    data:{
      u_name:name,
      u_email:email,
      u_phoneNumber:phoneNumber,
      u_companyName:companyName,
      u_countries:countries,
      u_city:city,
      u_address:address,
    },
    success:function(response){
      if(response == 200){
        document.getElementById('customer_service').style.display='block';
        document.getElementById('customer_info').style.display='none';
      }
      else {
        Swal.fire({
        title: "Oops!",
        text: "Something Went Wrong",
        icon: "error",
        timer: 10000,
        timerProgressBar: true,
        showConfirmButton: true
        });
      }
    }
  });

}

function add_package_details(){
  var p_qty = document.getElementById('p_qty').value;
  var p_l = document.getElementById('p_l').value;
  var p_w = document.getElementById('p_w').value;
  var p_h = document.getElementById('p_h').value;
  var p_we = document.getElementById('p_we').value;

  $.ajax({
    url:'backend/add_packages.php',
    method:'POST',
    data:{
      qty:p_qty,
      leng:p_l,
      width:p_w,
      height:p_h,
      weight:p_we
    },
    success:function(response){
      console.log(response);
      if(response == 200){
        $('#show_packages').load('ajax_pages/show_packages_table.php');
      }
      else if (response == 700) {
        Swal.fire({
        title: "Oops!",
        text: "You Need To Add The Customer First",
        icon: "error",
        timer: 10000,
        timerProgressBar: true,
        showConfirmButton: true
        });
      }
      else {
        Swal.fire({
        title: "Oops!",
        text: "Something Went Wrong",
        icon: "error",
        timer: 10000,
        timerProgressBar: true,
        showConfirmButton: true
        });
      }
    }
  });

}
function del_p(p_id){
  $.ajax({
    url:'backend/del_package.php',
    method:'POST',
    data:{
      pack_id:p_id
    },
    success:function(response){
      console.log(response);
      if(response == 200){
        $('#show_packages').load('ajax_pages/show_packages_table.php');
      }
      else {
        Swal.fire({
        title: "Oops!",
        text: "Something Went Wrong",
        icon: "error",
        timer: 10000,
        timerProgressBar: true,
        showConfirmButton: true
        });
      }
    }
  });
}
function alertWarehouse(){
  Swal.fire({
  title: "Request Sent",
  text: "One Of Our Agent Will Contact You Shortly",
  icon: "success",
  timer: 10000,
  timerProgressBar: true,
  showConfirmButton: true
  });
}

function selectService(sid){
  if(sid == 1){
    document.getElementById('package_details').style.display = "block";
    document.getElementById('warehouse_price').style.display = "none";
  }
  else if (sid == 2) {
    document.getElementById('warehouse_price').style.display = "block";
    document.getElementById('package_details').style.display = "none";
  }
}

function selectShipping(shipId){
  if(shipId == 1){
    document.getElementById('airfrieght_form').style.display = "block";
    document.getElementById('seafreight_form').style.display = "none";
    document.getElementById('landfrieght_form').style.display = "none";
  }
  else if (shipId == 2) {
    document.getElementById('seafreight_form').style.display = "block";
    document.getElementById('airfrieght_form').style.display = "none";
    document.getElementById('landfrieght_form').style.display = "none";
  }
  else if (shipId == 3) {
    document.getElementById('landfrieght_form').style.display = "block";
    document.getElementById('airfrieght_form').style.display = "none";
    document.getElementById('seafreight_form').style.display = "none";
  }
}

function goToShipping(){
  document.getElementById('shipping_services').style.display = "block";
    document.getElementById('package_details').style.display = "none";
}
