<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Agent Login | NB4</title>
		<link rel="canonical" href="" />

		<!-- Meta -->

		<meta property="og:locale" content="en_US"/>
		<meta property="og:type" content="website"/>
		<meta property="og:title" content="NB4" />
		<meta property="og:description" content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s" />
		<meta property="og:url" content="" />
		<meta property="og:site_name" content="NB4" />
		<meta property="og:image" content=""/>
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:title" content="NB4" />

		<!-- Style -->

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/core.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/editor.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/style.css">

		<!-- Fav icons -->

		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>/assets/images/fav/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>/assets/images/fav/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>/assets/images/fav/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>/assets/images/fav/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>/assets/images/fav/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>/assets/images/fav/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>/assets/images/fav/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>/assets/images/fav/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>/assets/images/fav/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>/assets/images/fav/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>/assets/images/fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>/assets/images/fav/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>/assets/images/fav/favicon-16x16.png">
		<meta name="msapplication-TileImage" content="<?php echo base_url();?>/assets/images/fav/ms-icon-144x144.png">
		<meta name="msapplication-TileColor" content="#961E1E">
		<meta name="theme-color" content="#961E1E">
		


	</head>
	     <script src="<?php echo base_url();?>/assets/js/jquery-2.2.3.min.js"></script>
	     <script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
		
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.js"></script-->
	     <script type="text/javascript">

            </script>

<script type="text/javascript">

$(document).ready(function(){	
	

var i=1;
jQuery(document).on('change','.htype',function (e) {
	e.preventDefault();
	
	    var hotel_type=$(this).val();
	
		var ids=$(this).attr('id');
		
        var id = $(this).attr('id').substr(11);
	 
	    var dest=$("#selUser_"+id).val();
	    var starrate=$("#star_rate_"+id).val();
 
	
		
		
		   
	  if(hotel_type != ''){ 
	 
		 $.ajax({
				url: "<?php echo base_url();?>/Home/fetch_hotel_type",
				method : 'POST',
				data:{hotel_type: hotel_type,dest:dest,starrate:starrate},
		
	 success: function(data)
        { 
		
		              
					
                   }
					
                });
					}
				  else{
						
					$("#hotel_"+id).html('<option value="">Select Hotel</option>');
					}
		     });
			 
			 
		jQuery(document).on('change','.htl',function (e) {
	
	      
	  
	    var hotel=$(this).val();
   
		
		var id = $(this).attr('id').substr(6);
	
	    var dest=$("#selUser_"+id).val();
		
		
		
		    
	 if(hotel != ''){
	 
		 $.ajax({
				url: "<?php echo base_url();?>/Home/hotel_roomtype",
				method : 'POST',
				data:{hotel: hotel},
		
	 success: function(data)
        { 
		
		              
						//for(var i=1;i<=50;i++){
							
					   $("#room_type_"+id).html(data);
					 
						
                   }
					
                });
					}
				  else{
						
					$("#room_type_"+id).html('<option value="">Select RoomType</option>');
					}
		     });	

 
  jQuery(document).on('change','.chk ',function (e) {
	  e.preventDefault();

	   var i=1;
	   var id=$(this).attr('id').substr(9);
	  
	    var checkout=$(this).val();

		var checkin=$("#checkin_"+id).val();
		var single=  Number($('#single').val());
		var double= Number($('#double').val());
		var extraadult=Number($('#extraadult').val());
		var extrachild=Number($('#extrachild').val());
		var childwoutbed=Number($('#childwoutbed').val());
		var hotel=$("#hotel_"+id).val();
		
		var roomtype=$("#room_type_"+id).val();	
		
		var meal=$("#meal_plan_"+id).val();
		var no_adults=Number($('#no_adults').val());
		var no_child=Number($('#no_child').val());
		
		var add_require=$("#additional_require_"+id).val();
	
	
	
		var startDay = new Date(checkin);
        var endDay = new Date(checkout);
		var days =(endDay - startDay) / 86400000 ;
		var nights=days;
		var no_night= parseInt(nights);
		
	
		
		
	 
		 $.ajax({
				url: "<?php echo base_url();?>/Home/hotel_rate_calc",
				method : 'POST',
				dataType: "json",
				data:{checkout:checkout,checkin:checkin,single:single,double:double,extraadult:extraadult,extrachild:extrachild,childwoutbed:childwoutbed,hotel:hotel,meal:meal,no_adults:no_adults,no_child:no_child,add_require:add_require,no_night:no_night,roomtype:roomtype},
		
	 success: function(data)
        { 
				
		}
					
            });
 			
		});	
		
		
	
			
      $("#additional_require").change(function(){
     
		  var id=$(this).val();
		 
				if ($(this).val() == '6') {
		
			    $('#others').css('display', 'block');
			
               }
                else{
					 $('#others').css('display', 'none');
			 }
			
           
            
             
          
        });

		$("#permit").change(function(){
       
	   var id=$(this).val();
	  
			 if ($(this).val() == 'yes') {
	 
			 $('#amot').css('display', 'block');
			  $("#amot").val(500);
		 
			}
			 else{
				  $('#amot').css('display', 'none');
		  }
		 
		
		 
		  
	   
	 });

	
		
		
		jQuery(document).on('change','#fleet',function (e) {
	       
	    var fleet=$('#fleet').val();
		
	 
		    
	if(fleet != ''){
	 
		 $.ajax({
				url: "<?php echo base_url();?>/Home/hotel_vehicletype",
				method : 'POST',
				data:{fleet: fleet},
		
	 success: function(data)
        { 
		
		              
						//for(var i=1;i<=50;i++){
							
					   $('#vtype').html(data);
					  
						
                   }
					
                });
					}
				  else{
						
					$('#vtype').html('<option value="">Select vehicletype</option>');
					}
		     });

		
			  $(document).on('change','#vtype',function (e) {
			
				var type = $(this).val();
			  
				var total=$('#total_km').val();
				
				var no_days =$('#noofdays').val();
		      
			  var arrival=$('#arrival').val();
			   var depart=$('#departure').val();
				
		
				$.ajax({
				url: "<?php echo base_url();?>/Home/findexta_km",
				method : 'POST',
				data:{type: type,total:total,no_days:no_days,arrival:arrival,depart:depart},
		
	 success: function(data)
        { 
		
		              
						
                   }
					
                });
				
				 
		     });	

			
	  jQuery(document).on('change','#amot',function (e) {
		 
		
			    var pamt=$(this).val();
				
				var extra_km =$('#extra_km').val(); 
			
				var total=$('#total_km').val();
				var no_days =$('#noofdays').val();
				var type =$('#vtype').val();
			   var arrival=$('#arrival').val();
			   var depart=$('#departure').val();
			 
		       
				$.ajax({
				url: "<?php echo base_url();?>/Home/transport_rate",
				method : 'POST',
				data:{type: type,total:total,no_days:no_days,extra_km:extra_km,pamt:pamt,arrival:arrival,depart:depart},
		
	 success: function(data)
        { 
	
                   }
					
                });
				
				 
		     });	


			 jQuery(document).on('blur','.amount',function (e) {
			
			var sum=0;
			var sum1=0;
			var t_rate=$('#t_rate').val();
		

			$('.amount').each(function(){
				sum +=Number($(this).val());
				var t_rate=$('#t_rate').val();
				
			   sum1=+t_rate + +sum;

			});
			
			          
			$('#cost').val(sum1.toFixed(2));

			});

		

		$(document).on('change','#perc',function (e) {
			
						
				var per=$(this).val();
				var pcost=$('#cost').val();
				
				 var perce=(pcost*per)/100;
				
				$('#mamount').val(perce.toFixed(2));
		 

			}); 
			
		
		
			
			
				$('#perc').bind('blur',function() {
				
				var per=$(this).val();
				
				
				if(per < 5){
				
					alert("The markup percentage is below 5% .So Please contact admin");
					return false;
				}
					
				
		 

			});
      $(document).on('blur','#mamount',function (e) {

        //$('#mamount').click(function(){ 
		 var markupamt=$(this).val();
		 var pcost=$('#cost').val();
		 var  total=+pcost + +markupamt;
		
			$('#subtotal').val(total.toFixed(2));
		 
		});
	 $(document).on('blur','#gst',function (e) {	
       //  $('#gst').click(function(){ 
		 var gst=$(this).val();
		 var stotal=$('#subtotal').val();
		 var  gstamt=(stotal*gst)/100;
		 
		  $('#pgst').val(gstamt.toFixed(2));
		 
		});	
	  $(document).on('blur','#pgst',function (e) {				
       //  $('#pgst').click(function(){ 
		 var pgst=$(this).val();
		 var stotal=$('#subtotal').val();
		 var  costquote=+stotal + +pgst;
		 
		  $('#totalquote').val(costquote.toFixed(2));
		 
		});	 
		


			 $('#kids').on('change keyup blur',function () {

    
    var val = $(this).val();
   
    $('#selectage').empty();
    var selectage;
    for (var i = 0, length = val; i < length; i++) {

        output = 'Age : <input type="text" name="age"/><hr/>';
        $('#selectage').append(selectage);
    }

});
		
	
	
	
    
	
	var j=1;  
    var n = document.getElementById("totalcount").value;
	
      $(document).on('click', '.ti-plus', function(){  
	 
           j++; 
		   // var n = document.getElementById("total_count").value;
		   
           $('#dynamic_field').append('<div class="fieldset" id="day'+j+'"><label class="fieldset-lbl">Day'+j+'</label><div id="row'+j+'"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12" style="color: red;"></div></br></br><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><label>Destinations '+n+'</label><div class="select-box"><select id="selUser_'+j+'" name="selUser[]" class="cls"><option value="">Select Destination</option><?php foreach($result as $row){?><option value="<?=$row->location_id?>"><?=$row->location?></option><?php }?></select></div><span class="error-field hide">Please fill the required field</span></div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><label>Star Rating'+n+'</label><div class="select-box"><select name="star_rate[]" id="star_rate_'+j+'" class="star"><option value="">Select Rating</option><?php foreach($starrating as $row){?><option value="<?=$row->star_id?>"><?=$row->star_name?></option><?php }?></select></div><span class="error-field hide">Please fill the required field</span></div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><label>Hotel Type'+n+'</label><div class="select-box"><select name="hotel_type[]" id="hotel_type_'+j+'" class="htype"><option value="">Select Type</option><?php foreach($hoteltype as $row){?><option value="<?=$row->type_id?>"><?=$row->type?></option><?php }?></select></div><span class="error-field hide">Please fill the required field</span></div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><label>Hotels'+n+'</label><div class="select-box"><select id="hotel_'+j+'" name="hotel[]" class="htl"><option value="">Select Hotel</option></select></div><span class="error-field hide">Please fill the required field</span></div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><label>Room Type'+n+'</label><div class="select-box"><select name="room_type[]" id="room_type_'+j+'"><option value="">Select Room Type</option></select></div><span class="error-field hide">Please fill the required field</span></div></div><div class="col-lg-6 col-md-6 col-sm-6"><div class="input-block"><label>Meal Plan</label><div class="select-box"><select name="meal_plan[]" id="meal_plan_'+j+'"><option value="">Select MealPlan</option>Select MealPlan</option><?php foreach($meal_plan as $row){?><option value="<?=$row->id?>"><?=$row->meal_plan?></option></option><?php }?></select></div><span class="error-field hide">Please fill the required field</span></div></div><div class="col-lg-6 col-md-6 col-sm-6"><div class="input-block"><label>Additional Requirements</label><div class="select-box"><select name="additional_require[]" id="additional_require_'+j+'"><option value="">Select additional requirement</option><?php foreach($add_require as $row){?><option value="<?=$row->id?>"><?=$row->add_require?></option></option><?php }?></select></div><span class="error-field hide">Please fill the required field</span></div></div> <div class="col-lg-12 col-md-12 col-sm-12"><div class="input-block"><label>Itenerary</label> <textarea class="richtext-editor" name="itenerary[]" id="itenerary_'+j+'"></textarea></div><span class="error-field hide">Please fill the required field</span> </div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><label>Checkin Date</label><div class="text-box"><input type="date" name="checkin[]" id="checkin_'+j+'"/></div><span class="error-field hide">Please fill the required field</span></div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><label>checkout Date</label><div class="text-box"><input type="date" name="checkout[]" id="checkout_'+j+'" class="chk"/></div><span class="error-field hide">Please fill the required field</span></div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><label>Hotal Rate</label><div class="text-box"><input type="text" name="rate[]" id="rate_'+j+'" class="amount" /></div><span class="error-field hide">Please fill the required field</span></div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><div class="text-box"><input type="hidden" name="srate[]" id="srate_'+j+'" /></div> </div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><div class="text-box"><input type="hidden" name="drate[]" id="drate_'+j+'" /></div> </div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><div class="text-box"><input type="hidden" name="extraradult[]" id="extraradult_'+j+'" /></div> </div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><div class="text-box"><input type="hidden" name="extrarchild[]" id="extrarchild_'+j+'" /></div> </div></div><div class="col-lg-3 col-md-3 col-sm-3"><div class="input-block"><div class="text-box"><input type="hidden" name="childrwoutbed[]" id="childrwoutbed_'+j+'" /></div> </div></div><div class="fieldset-button-block"><button type="button" name="minuss[]" id="minuss_'+j+'" class="fs-minus ti-minus" ></button><button type="button" name="add[]" id="add_'+j+'"  class="ti-plus"></button></div></div></div></div></div></div>');
		  		  
		n++;
        $("#totalcount").val(n);
  
			
        });
     													             
     $(document).on('click', '.ti-minus', function(){  
           
		  var button_id= $(this).attr('id').substr(7);
           

           $('#day'+button_id+'').remove();  

         
        });  
  
  
   $(document).on('click','#save',function(e) {
	 
	var data = $("#frm_package").serialize();
	
	
	$.ajax({
		 data: data,
	   	 type: "post",
		 url: "<?php echo base_url();?>/Home/package_booking",
		
		success: function(data){
			
			 alert("inserted successfully"); 
					   
			      $("#v-package-tab").removeClass("active");
				
				   $('#v-package').removeClass("active");
				   $('#v-payment-tab').addClass("active");
				   $('#v-payment').addClass("active show");	
				  
	  				   $("#pid").val(data);
						
			 
		 }
	});
});
	
	
	  $('#bt_payment').click(function(){
		
	var data = $("#payment").serialize();
		
		$.ajax({
			data: data,
			type: "post",
			url: "<?php echo base_url();?>/Home/add_payment",
			 
			success: function(result){
			
				alert("Payment added Successfully");			
				
					$("#agid").val(result);
					
		}
	});
 });
 
 
 
 $("#payment").change(function(){
        
			var pid1=jq('#pid').val();
			
            $.ajax
            ({
                type: "POST",
			  url:"<?php echo site_url('Home/getpackageCost')?>/"+pid1,	
            
                success: function(html)
                    {
						
                        $("#tamt").val(html);
                    } 
            });
        });
 

$(document).on('change','.cls',function (e) {
	     var itin=$(this).val();
	    
                
	 $.ajax({
				url: "<?php echo base_url();?>/Home/itenerary_display",
				method : 'POST',
				data:{itin:itin},
				//dataType: "JSON",
	  success: function(data)
        { 
		  alert(data);
		$("#MyPopup").modal("show");
	     var html ='';
			var list = data.split(',');
			 //alert(list);
			 for(i=0;i<list.length;i++){
				var checked = "";
				//alert(list[i]);
				
				html +='<div class="custom-control custom-checkbox mb-20"><input type="radio" class="custom-control-input" id="itener'+list[i]+'" name="itener" value="'+list[i]+'" '+checked+' onchange="doalert(this.value)"/><label class="custom-control-label" for="itener'+list[i]+'">'+list[i]+'</label></div>';
				    $('#itenerarylist').html(html);
					
			 }
		}
	});
});
 
 $(document).on('click','#update',function(e) {
	 
	    var name=$('#i_name').val();
		$.ajax({
			data: {name:name},
			type: "post",
			
			
			success: function(data){
								
				 $('#itenerary_1').val(name);		
				$('#MyPopup').modal('hide'); 
               			
				   
   
			}
		});
	});	









 

});



   
</script>

 
 
 
   

	
	
  
 
 


<script>
 function toggle(names) {
      var t=names.value;
	  
        var tamt = document.getElementById('tmt');
	    var aamt = document.getElementById('amt');
		
		if(t=='total'){
			tamt.style.display = 'block';
			
			aamt.style.display = 'none';
		}
		else if(t=='advance'){
			aamt.style.display = 'block';
			tamt.style.display = 'none';
		}
       
			
        else {
			
            tamt.style.display = 'none';
			aamt.style.display = 'none';
        }
    }


	function GetDays(){
                var arrival = new Date(document.getElementById("arrival").value);
				
                var departure = new Date(document.getElementById("departure").value);
                var days1=(departure - arrival) / (24 * 3600 * 1000);
				var days=days1+1;
				return parseInt(days);
        }
		function GetNights(){
                var arrival = new Date(document.getElementById("arrival").value);
				
                var departure = new Date(document.getElementById("departure").value);
                  var days =(departure - arrival) / 86400000 ;
				   var nights=days;
				   return parseInt(nights);
				 
        }

        function cal(){
        if(document.getElementById("departure")){
            document.getElementById("noofdays").value=GetDays();
			 document.getElementById("noofnight").value=GetNights();
        }  
    }
	
	function doalert(id)
	{
		
		
		$.ajax({
				url: "<?php echo base_url();?>/Home/getItinerary",
				method : 'POST',
				               
				data:{id:id},
		 success: function(data)
        { 
		
		  $('#i_name').html(data);
		 
		}		
	});			
	}
 
  

  
		
	


</script>


  
    

</head>



	<body>

		

		<div class="wrapper">
			<div class="inner-wrapper">
			<?php include "sidebar.php"?>
				<!--aside class="side-bar skew">
					<figure class="brand-logo">
						<img src="assets/images/brand-logo.png">
						<button class="menu-close ti-close show-sm"></button>
					</figure>
					<div class="side-menu-body">
						<div class="scroll">
							<ul class="side-menu-link">
								<li>
									<a href="<?php echo base_url();?>/Home/agent_list">
										<span class="agent-ico sidebar-icon"></span>
										<span class="menu-title">Agent</span>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>/Hotel/hotel_listing" class="">
										<span class="register-ico sidebar-icon"></span>
										<span class="menu-title">Hotel Registration</span>
									</a>
								</li>
								<li class="active">
									<a href="agent-login.html">
										<span class="login-ico sidebar-icon"></span>
										<span class="menu-title">Agent Login</span>
									</a>
								</li>
								<li>
									<a href="reports.html" class="">
										<span class="report-ico sidebar-icon"></span>
										<span class="menu-title">Reports</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="package-ico sidebar-icon"></span>
										<span class="menu-title">NB4 Package Booking</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="chatbot-ico sidebar-icon"></span>
										<span class="menu-title">Chat Botim</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="location-ico sidebar-icon"></span>
										<span class="menu-title">Destination News</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="user-ico sidebar-icon"></span>
										<span class="menu-title">User Setup</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="acccounts-ico sidebar-icon"></span>
										<span class="menu-title">Acccounts</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="settings-ico sidebar-icon"></span>
										<span class="menu-title">Settings</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="calendar-ico sidebar-icon"></span>
										<span class="menu-title">Calendar</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="reservation-ico sidebar-icon"></span>
										<span class="menu-title">Reservation</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="transporting-ico sidebar-icon"></span>
										<span class="menu-title">Transporting</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="validation-ico sidebar-icon"></span>
										<span class="menu-title">Validation & Account Review</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="">
										<span class="approval-ico sidebar-icon"></span>
										<span class="menu-title">Account Approval</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="side-menu-footer">
						<button class="toggle-btn active"></button>
					</div>
				</aside-->

				<div class="right-content-area">
					<header class="header-block">
						<div class="header-inner">
							<div class="header-left">
								<button class="hamburger"></button>
								<!-- <div class="search-box">
									<input type="text" placeholder="Search here..">
								</div> -->
							</div>
							<?php include('header.php');?>
						</div>
					</header>
					<div class="main-content-area without-filter">
						<div class="content-block">
							<div class="content-header">
								<h1>Agent Login</h1>
								 <div class="content-header-right">
                                    <a class="general-btn transparent-grey" href="<?php echo base_url();?>/Home/package_list"><span class="ti-arrow-left"></span>Back to listing</a>
                                </div>
							</div>
							
							<div class="content-body">
								<div class="wizard-tab">
									<div class="wizard-tab-left">
										<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
											<a class="nav-link package-design active" id="v-package-tab" data-toggle="pill" href="#v-package" role="tab" aria-controls="v-package" aria-selected="true">Package Designing</a>

											<!--a class="nav-link calendar-info" id="calendar-info-tab" data-toggle="pill" href="#calendar-info" role="tab" aria-controls="calendar-info" aria-selected="false">Calendar</a>

											<a class="nav-link arrival-ico" id="v-arrial-tab" data-toggle="pill" href="#v-arrial" role="tab" aria-controls="v-arrial" aria-selected="false">Arrival Details & Alert</a>

											<a class="nav-link booking-info" id="v-booking-tab" data-toggle="pill" href="#v-booking" role="tab" aria-controls="v-booking" aria-selected="true">Confirmed Bookings</a>

											<a class="nav-link cancel-booking" id="booking-cancel-tab" data-toggle="pill" href="#booking-cancel" role="tab" aria-controls="booking-cancel" aria-selected="false">Amend & Cancel Booking</a-->

											<a class="nav-link payment-ico" id="v-payment-tab" data-toggle="pill" href="#v-payment" role="tab" aria-controls="v-payment" aria-selected="false">Payment Details</a>

											<!--a class="nav-link discussion-ico" id="v-discussion-tab" data-toggle="pill" href="#v-discussion" role="tab" aria-controls="v-discussion" aria-selected="false">Discussions</a-->
										</div>
									</div>
									<div class="wizard-tab-right">
										<div class="tab-content" id="v-pills-tabContent">
											<div class="tab-pane fade show active" id="v-package" role="tabpanel" aria-labelledby="v-package-tab">
												<div class="form-wrapper">
													<div class="form-tab-header">
														<h5>Package Designing</h5>
														
														<button class="general-btn" id="save" "style:padding-right:10px">Save</button>
													
														<!--a class="general-btn add" href="<?php echo base_url();?>/Home/sendUserMail"><span class="ti-plus"></span>Send</a-->
													</div>
													<div class="form-tab-body">
														<div class="scroll">
															<div class="form-tab-body-inner">
																<form id="frm_package" action="">
															    
																<div class="row">
																	
																	<div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																			<label>Tour Code</label>
																			<div class="text-box">
																			 <?php 																			 
																			    /* $kode_spl = 'BLS';
																				 $tgl = date("Y/m/d");
																				   for ($counter = 1; $counter <=300; $counter++) {
      																			 $spl_no = date('Y/m/d', strtotime($tgl)) .'/'. str_pad($counter, 3, 0, STR_PAD_LEFT);;	
																			     $unique = $kode_spl.'/'.$spl_no ;
																				   }*/
																				?>
																				<input type="text" name="name" value=<?=$randtoken?>>
																				
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																			<label>Agent</label>
																			<div class="select-box">
																			
																				<select name="agent" id="agent">
																				<?php foreach($agent as $val){?>
																				<option value='<?=$val->user_id?>'><?=$val->first_name?></option> 
																			<?php }?>
																					
																				</select>
																			</div>
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																
																	
																	<div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																			<label>Date of Arrival</label>
																			<div class="text-box">
																			 <input required type="date" name="arrival" id="arrival" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>" onchange="cal()"/>
																				
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																			<label>Date of Departure</label>
																			<div class="text-box">
																			 <input required type="date" name="departure" id="departure" title="Choose your desired date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" onchange="cal()"/>
																				
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																			<label> No of Nights</label>
																			<div class="text-box">
																				<input type="number" name="noofnight" id="noofnight" >
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																			<label> No of Days</label>
																			<div class="text-box">
																				<input type="number" name="noofdays" id="noofdays">
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																			<label>No of Adults</label>
																			<div class="text-box">
																			<input type="text" name="no_adults" id="no_adults" />
																			
																			<!--div class="counter-box">
																				<button class="decrement ti-minus"></button>
																				<input type="number" class="counter" name="no_adults" value=3/>
																				<button class="increment ti-plus"></button>
																			</div-->
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	
																
																	<div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																	   		<label>No of children</label>
																	  		<div class="text-box">
																				<input type="number" min="0" max="5" id="no_child" name="no_child" />
																			</div>																		
																		</div>
																	</div> 

																	<div id="selectAge"></div>																
																		
																	<div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																			<label>Port of Arrival</label>
																			<div class="select-box">
																				<select name="port_arrival"  id="port_arrival">
																					<option>Select Port</option>
																					<?php foreach($port as $row){?>																				
																					<option value='<?=$row->id?>'><?=$row->port_name?></option> 
																					<?php }?>																					
																				</select>
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																			<label>Port of Departure</label>
																			<div class="select-box" >
																				<select name="port_depart" id="port_depart" >
																					<option>Select Port</option>
																					<?php foreach($port as $row){?>
																					
																				
																				<option value='<?=$row->id?>'><?=$row->port_name?></option> 
																			<?php }?>
																				</select>
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	
																	<div class="col-lg-12 col-md-12 col-sm-12">
																		<div class="input-block">
																			<label> No of Rooms</label>
																			<div class="text-box">
																				<input type="number" name="noofrooms" id="noofrooms">
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-2 col-md-2 col-sm-2">
																		<div class="input-block">
																			<label>single</label>
																			<div class="text-box">
																				<input type="number" name="single" id="single">
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-2 col-md-2 col-sm-2">
																		<div class="input-block">
																			<label>Double</label>
																			<div class="text-box">
																				<input type="number" name="double" id="double">
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-2 col-md-2 col-sm-2">
																		<div class="input-block">
																			<label>ExtrabedAdult</label>
																			<div class="text-box">
																				<input type="number" name="extraadult" id="extraadult">
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-2 col-md-2 col-sm-2">
																		<div class="input-block">
																			<label>ExtrabedChild</label>
																			<div class="text-box">
																				<input type="number" name="extrachild" id="extrachild">
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																	<div class="col-lg-2 col-md-2 col-sm-2">
																		<div class="input-block">
																			<label>Childwithoutbed</label>
																			<div class="text-box">
																				<input type="number" name="childwoutbed" id="childwoutbed">
																			</div>
																			<span class="error-field hide">Please fill the required field</span>
																		</div>
																	</div>
																</div>
																
																	<div class="fieldset">
																	<label class="fieldset-lbl">Transportation Details</label>
																	<div class="row">
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																			<label>Total Km</label>
																				<div class="text-box" >
																					<input type="text" name="total_km" id="total_km" />
																				</div>
																			<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																				<label>Fleet Details</label>
																				<div class="select-box">
																					<select name="fleet" id="fleet">
																						<option>Select Fleet</option>
																						<?php foreach($vehicle as $row){?>
																						<?php //print_r($row);exit();?>
																					
																					<option value='<?=$row->vc_id?>'><?=$row->vc_category?></option> 
																				<?php }?>
	
																					</select>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																				<label>Vehicle Types</label>
																				<div class="select-box">
																					<select name="vtype" id="vtype">
																							<option value="">Select Vehicle Types</option> 
																															
																					</select>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">																			
																				<label>Extra KM</label>
																				<div class="text-box" >
																					<input type="number" name="extra_km" id="extra_km" />
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<!--div class="col-lg-6 col-md-12 col-sm-12">
																		<div class="input-block">
																			
																				<label>Permit</label>
																				<div class="select-box">
																				<select name="permit" id="permit" class="per">
																				<option value="yes">Yes</option>
																				<option value="no">No</option>
																				</select>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div-->

																		<div class="col-lg-6 col-md-12 col-sm-12" id="amot">
																			<div class="input-block">
																				<label>Permit Amount <sup class="superscript"></sup></label>
																				<div class="text-box">
																					<input type="text" name="amot" id="amot"/>
																				</div>
																		
																			</div>
																		</div>

																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																				<label>Transport Rate</label>
																				<div class="text-box">
																					<input type="text" name="t_rate" id="t_rate"/>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																	</div>
																</div>	
                                                                
																<div class="fieldset" id="day">
																	<label class="fieldset-lbl">Day1</label>	
																	<div class="row">								
																		<div class="col-lg-3 col-md-3 col-sm-3">
																			<div class="input-block">
																				<label>Destinations</label>
																				<div class="select-box">																
																					<select id="selUser_1"  name="selUser[]" class="cls">																			
																						<option value="">Select Destination</option> 
																						<?php foreach($result as $row){?>																				
																							<option value='<?=$row->location_id?>'><?=$row->location?></option> 
																						<?php }?>  
																					</select>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>	
																			</div>
																		</div>																																												
																		<div id="result"></div>	
              <div class="col-lg-3 col-md-3 col-sm-3">
																			<div class="input-block">
																				<label>Star Rating</label>
																				<div class="select-box">																		
																					<select name="star_rate[]" id="star_rate_1" class="star">
																						<option value="">Select star rating</option> 
																						<?php foreach($starrating as $row){?>																				
																						<option value='<?=$row->star_id?>'><?=$row->star_name?></option> 
																						<?php }?>
																					</select>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>	
																		<div class="col-lg-3 col-md-3 col-sm-3">
																			<div class="input-block">
																				<label>Hotel Type</label>
																				<div class="select-box">																		
																					<select name="hotel_type[]" id="hotel_type_1" class="htype">
																						<option value="">Select Type</option> 
																						<?php foreach($hoteltype as $row){?>																				
																						<option value='<?=$row->type_id?>'><?=$row->type?></option> 
																						<?php }?>
																					</select>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>																	
																		<div class="col-lg-3 col-md-3 col-sm-3">
																			<div class="input-block"><label>Hotels</label>
																				<div class="select-box">
																					<?//print_r($result1);exit();?>
																					<select id="hotel_1"  name="hotel[]" class="htl">																			
																						<option value="">Select Hotel</option> 
																					</select>
																				</div>																			
																				<span class="error-field hide">Please fill the required field</span>																		
																			</div>
																		</div>
																		<div id="result"></div>																																		
																		<div class="col-lg-3 col-md-3 col-sm-3">
																			<div class="input-block">
																				<label>Room Type</label>
																				<div class="select-box">
																					<select name="room_type[]" id="room_type_1"  >
																					<option value="">Select RoomType</option> 	
																					</select>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-6 col-sm-6">
																			<div class="input-block">
																				<label>Meal Plan</label>
																				<div class="select-box">
																					<select name="meal_plan[]"  id="meal_plan_1">
																						<option value="">Select MealPlan</option>
																						<?php foreach($meal_plan as $row){?>
																					
																					<option value='<?=$row->id?>'><?=$row->meal_plan?></option> 
																				<?php }?>
																						
																					</select>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>																		
																		<div class="col-lg-6 col-md-6 col-sm-6">
																			<div class="input-block">
																				<label>Additional Requirements</label>
																				<div class="select-box">
																					<select name="additional_require[]" id="additional_require_1">
																						<option value="">Select additional requirement</option>
																						<?php foreach($add_require as $row){?>
																					
																						<option value='<?=$row->id?>'><?=$row->add_require?></option> 
																						<?php }?>
																					</select>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-3 col-md-3 col-sm-3" id="others" style="display: none;">
																			<div class="input-block">
																			<label>other Requirements</label>
																				<div class="text-box" >
																					<input type="text" name="other" id="other" />
																				</div>
																			<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>																	
																		
																		
																		
																		  <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="input-block">
                                                                            <label>Itenerary</label>
                                                                            <div class="input-box">                                                                                
                                                                                <textarea class="richtext-editor" name="itenerary[]" id="itenerary_1"></textarea>
                                                                            </div>
                                                                            <span class="error-field hide">Please fill the required field</span>
                                                                        </div>
                                                                    </div>
																	<div class="col-lg-3 col-md-3 col-sm-3">
																			<div class="input-block">
																				<label>Checkin Date</label>
																				<div class="text-box">
																				<input required type="date" name="checkin[]" id="checkin_1" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>" />
																					<!--input type="date" name="checkin[]" id="checkin"/-->
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-3 col-md-3 col-sm-3">
																			<div class="input-block">
																				<label>checkout Date</label>
																				<div class="text-box">
																				<input required type="date" name="checkout[]" id="checkout_1" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>" class="chk" />
																					
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																	<div class="col-lg-3 col-md-3 col-sm-3">
																			<div class="input-block">
																				<label>Hotal Rate</label>
																				<div class="text-box">
																					<input type="text" name="rate[]" id="rate_1" class="amount" />
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		 <div class="col-lg-3 col-md-3 col-sm-3">
																					<div class="input-block">
																						<div class="text-box">
																					<input type="hidden" name="srate[]" id="srate_1" />
																				</div>
																			</div>
																			</div>
																			 <div class="col-lg-3 col-md-3 col-sm-3">
																					<div class="input-block">
																						<div class="text-box">
																					<input type="hidden" name="drate[]" id="drate_1" />
																				</div>
																			</div>
																			</div>
																			<div class="col-lg-3 col-md-3 col-sm-3">
																					<div class="input-block">
																						<div class="text-box">
																					<input type="hidden" name="extraradult[]" id="extraradult_1" />
																				</div>
																			</div>
																			</div>   
																				  <div class="col-lg-3 col-md-3 col-sm-3">
																					<div class="input-block">
																						<div class="text-box">
																					<input type="hidden" name="extrarchild[]" id="extrarchild_1" />
																				</div>
																			</div>
																			</div>
																			<div class="col-lg-3 col-md-3 col-sm-3">
																					<div class="input-block">
																						<div class="text-box">
																					<input type="hidden" name="childrwoutbed[]" id="childrwoutbed_1" />
																				</div>
																			</div>
																			</div>
																		
																				
																				
																		
																			
																		<div class="fieldset-button-block">
																			<button type="button" name="minuss[]" id="minuss_1" class="fs-minus ti-minus" ></button>
																			<button type="button" name="add[]" id="add_1"  class="ti-plus"></button>
																			
																		</div>
																		
																		</div>
																	
																		
																	</div>
																	
																	<div id="dynamic_field"></div>
																	
																
															
																
																<div class="fieldset">
																	<label class="fieldset-lbl">Package Costing Details</label>
																	<div class="row">
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																				<label>Package Cost</label>
																				<div class="text-box">
																					<input type="text" name="cost" id="cost"/>
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																				<label>Markup Percentage%</label>
																				<div class="text-box">
																					<input type="text" name="perc" id="perc">
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																				<label>Markup Amount</label>
																				<div class="text-box">
																					<input type="text" name="mamount" id="mamount">
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																				<label>SubTotal</label>
																				<div class="text-box">
																					<input type="text" name="subtotal" id="subtotal">
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																				<label>GST%</label>
																				<div class="text-box">
																					<input type="text" name="gst" id="gst">
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																				<label>GST Amount</label>
																				<div class="text-box">
																					<input type="text" name="pgst" id="pgst">
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-12 col-sm-12">
																			<div class="input-block">
																				<label>Total Quote with Taxes</label>
																				<div class="text-box">
																					<input type="text" name="totalquote" id="totalquote">
																				</div>
																				<span class="error-field hide">Please fill the required field</span>
																			</div>
																		</div>
																	</div>																	
																	<input type="hidden" name="totalcount" id="totalcount" value="2">
																</div>
																	
																
																	
																																				
																															
																</form>
																</div>
															</div>
														</div>
													</div>
												</div>
											

											<!------------End Package tab----------------------------->

											<!--div class="tab-pane fade" id="calendar-info" role="tabpanel" aria-labelledby="calendar-info-tab">
												<div class="form-wrapper">
													<div class="form-tab-header">
														<h5>Calendar</h5>
														<button class="general-btn">Save</button>
													</div>
													<div class="form-tab-body">
														<div class="scroll">
															<div class="form-tab-body-inner">
															</div>
														</div>
													</div>
												</div>
											</div-->
											<!--div class="tab-pane fade" id="v-arrial" role="tabpanel" aria-labelledby="v-arrial-tab">
												<div class="form-wrapper">
													<div class="form-tab-header">
														<h5>Arrival Details & Alert</h5>
														<button class="general-btn">Save</button>
													</div>
													<div class="form-tab-body">
														<div class="scroll">
															<div class="form-tab-body-inner">

															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade show active" id="v-booking" role="tabpanel" aria-labelledby="v-booking-tab">
												<div class="form-wrapper">
													<div class="form-tab-header">
														<h5>Confirmed Bookings</h5>
														<button class="general-btn">Save</button>
													</div>
													<div class="form-tab-body">
														<div class="scroll">
															<div class="form-tab-body-inner">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="booking-cancel" role="tabpanel" aria-labelledby="booking-cancel-tab">
												<div class="form-wrapper">
													<div class="form-tab-header">
														<h5>Amend & Cancel Booking</h5>
														<button class="general-btn">Save</button>
													</div>
													<div class="form-tab-body">
														<div class="scroll">
															<div class="form-tab-body-inner">
															</div>
														</div>
													</div>
												</div>
											</div-->
											
											
											<div class="tab-pane fade" id="v-payment" role="tabpanel" aria-labelledby="v-payment-tab">
											
												<div class="form-wrapper">
												 
													<form id="payment">
													<div class="form-tab-header">
													
														<h5>Payment Details</h5>
														
															
														<input type="hidden" name="pid" id="pid" value="">
														
													
														<?php // echo "sdsadsds".$cost;?>
														 <button class="general-btn" id="bt_payment" type="button">Save</button>
													</div>
													<div class="form-tab-body">
														<div class="scroll">
															<div class="form-tab-body-inner">
															  <div class="row">
															   <div class="col-lg-6 col-md-12 col-sm-12">
                                                                        <div class="input-block">
                                                                            <label>Payment <sup class="superscript">*</sup></label>
                                                                            <div class="select-box">
																			 <select name="payment" id="payment" onchange="toggle(this);">
                                                                             <option value="total">Total Amount</option>
																			<option value="advance">Advance Amount</option>
																			</select>
                                                                            </div>
                                                                           
                                                                        </div>
                                                                    </div>
																	    <div class="col-lg-6 col-md-12 col-sm-12" id="tmt" style="display: none;">
                                                                        <div class="input-block">
                                                                            <label>Total Amount <sup class="superscript">*</sup></label>
                                                                            <div class="text-box">
                                                                                <input type="text" name="tamt" id="tamt"  >
                                                                            </div>
                                                                            <!--span class="error-field">Please fill the required field</span-->
                                                                        </div>
                                                                    </div>
																	 <div class="col-lg-6 col-md-12 col-sm-12" id="amt" style="display: none;">
                                                                        <div class="input-block">
                                                                            <label>Advance Amount <sup class="superscript">*</sup></label>
                                                                            <div class="text-box">
                                                                                <input type="text" name="aamt" id="aamt"/>
                                                                            </div>
                                                                            <!--span class="error-field">Please fill the required field</span-->
                                                                        </div>
                                                                    </div>
															  
															   <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="input-block">
																		<label>Mode Of Payment</label>
																			<div class="select-box">
                                                                           <select name="payment_method" id="payment_method">
																		   <option value="">-Select Payment Method-</option>
																			<option value="Cash">Cash</option>
																			<option value="Cheque">Cheque</option>
																			<option value="DD">DD</option>
																			<option value="NEFT">NEFT</option>
																			<option value="RTGS">RTGS</option>
																			<option value="IMPS">IMPS</option>
																			<option value="UPI">UPI</option>
																			<option value="Net Banking">Net Banking</option>
																			<option value="Debit Card">Debit Card</option>
																			<option value="Credit Card">Credit Card</option>
																			<option value="PhonePe">PhonePe</option>
																			<option value="GooglePay">GooglePay</option>
																			<option value="Paytm">Paytm</option>
																			<option value="Paypal">Paypal</option>
																			</select>
																			</div>
                                                                        </div>
                                                                    </div>
                                                                    <!--div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="input-block">
                                                                            <label>Advance Payment <sup class="superscript">*</sup></label>
                                                                            <div class="text-box">
                                                                                <input type="text" name="advance_payment" id="advance_payment"/>
                                                                            </div>
                                                                            <span class="error-field">Please fill the required field</span>
                                                                        </div>
                                                                    </div-->
                                                                    <!--div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="input-block">
                                                                            <label>Balance Amount <sup class="superscript">*</sup></label>
                                                                            <div class="text-box">
                                                                              <input type="text" name="bal_amt" id="bal_amt"/>
                                                                            </div>
                                                                            <span class="error-field hide">Please fill the required field</span>
                                                                        </div>
                                                                    </div-->
																	 
																	
																	
                                                                                                                     
                                                                   
                                                                </div>
															

															</div>
														</div>
													</div>
													</form>
												</div>
											</div>
											
											<div class="tab-pane fade" id="v-discussion" role="tabpanel" aria-labelledby="v-discussion-tab">
												<div class="form-wrapper">
													<div class="form-tab-header">
														<h5>Discussions</h5>
													</div>
													<div class="form-tab-body">
														<div class="scroll">
															<div class="form-tab-body-inner">

															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
             <div id="MyPopup" class="modal fade" role="dialog" width="100%" height="100%">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;</button>
                    <h4 class="modal-title">
                    </h4>
                </div>
                <div class="modal-body">
				<form id="update_form">
            <div class="scroll">
                                                        
               <div class="form-tab-body-inner">
               <div class="row">
			      <input type="hidden" id="aid" name="aid" class="form-control" required>	
                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="input-block">
                                            <label>IteneraryName </label>
												<div class="text-box">
                                                                    <div id="itenerarylist"></div>
																	 
                                                                      </div>
                                                                  
																																								<textarea  name="i_name" id="i_name"></textarea>
                                                                    </div>
                                                                    
                                                                   
                                                
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>	                                                 
		<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="general-btn" id="update">Save changes</button>
      </div>
	  </form>
                </div>
               
            </div>
        </div>
    </div>
     </div>
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/popper.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/layout.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/editor.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/app.js"></script>

	</body>

</html>
