var warrnty = '';
var warranty = '';
var inactivityTime = 0;
var logoutTime = 300; 

$(document).ready(function(){
      $('.deletedcp').click(function(){
          var id = $(this).data('id');
          swal({
            title: "WARNING!!",
            text: "Are you sure? Once deleted, you will not be able to recover this data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })	
        .then((willDelete) => {
            if (willDelete){
                $.ajax({
                    method: 'POST',
                    url: 'DeleteDcpData',
                    data: {id:id},
                    success: function(response){
                        swal("DCP", "Data has been deleted", "success").then(() => {
                            location.reload();
                        });
                    }
                });
            } 
            else{}
        });       
    });
  });

  $(document).ready(function(){
      $('.editdcp').click(function(){
          var id = $(this).data('id');
          var radiobtn1 = document.getElementById('edityes');
          var radiobtn2 = document.getElementById('editno');
          $.ajax({
              method: 'post',
              url: 'GetDcpData',
              dataType: 'json',
              data:{id: id},
              success:function(response){
                  if(response[0]['Warranty'] == 'yes'){
                      radiobtn1.checked = true;   
                  }else if (response[0]['Warranty'] == 'no'){
                      radiobtn2.checked = true;
                  }else{
                      radiobtn1.checked = false;
                      radiobtn2.checked = false;
                  }
                  $('#editpackage').val(response[0]['Package']);
                  $('#edityear').val(response[0]['Year']);
                  $('#editdevice').val(response[0]['Device']);
                  $('#editserial').val(response[0]['Serial']);
                  $('#editbrand').val(response[0]['Brand']);
                  $('#editspecification').val(response[0]['Specification']);
                  $('#editunitcost').val(response[0]['UnitCost']);
                  $('#editcondition').val(response[0]['State']);
                  $('#editao').val(response[0]['AccountableOfficer']);
                  $('#pid').val(response[0]['Pid']);
                  $('#editdcpmodal').modal("show");

                  radiobtn1.addEventListener("click",function(){
                  if (radiobtn1.checked) {
                    console.log(warrnty);
                      warrnty = 'yes';
                  } 
                  })
                  radiobtn2.addEventListener("click",function(){
                      if (radiobtn2.checked) {
                        console.log(warrnty);
                        warrnty = 'no';
                  } 
                  })
              }
          });
      });
  });
  

  $(document).ready(function(){
      $('#updatedcp').click(function(){
          var editpackage = document.getElementById('editpackage').value;
          var edityear = document.getElementById('edityear').value;
          var editdevice = document.getElementById('editdevice').value;
          var editserial = document.getElementById('editserial').value;
          var editbrand = document.getElementById('editbrand').value;
          var editspecification = document.getElementById('editspecification').value;
          var editunitcost = document.getElementById('editunitcost').value;
          var editcondition = document.getElementById('editcondition').value;
          var editao = document.getElementById('editao').value;
          var pid = document.getElementById('pid').value;

          $.ajax({
              method: 'POST',
              url: 'UpdateDcpData',
              data:{
                  editpackage: editpackage,
                  edityear: edityear,
                  editdevice: editdevice,
                  editserial: editserial,
                  editbrand: editbrand,
                  editspecification: editspecification,
                  editunitcost: editunitcost,
                  editcondition: editcondition,
                  editao: editao,
                  pid:pid,
                  warranty: warrnty
              },
              success: function(response){
                  $('#editdcpmodal').modal('hide');
                  swal("Updated", "", "success").then(() => {
                      location.reload();
                  });
              }
          });    
      });
  });

  
$(document).ready(function(){
    $('#sendreport').click(function(){
        var school = document.getElementById('school').value;
        var district = document.getElementById('district').value;
        var address = document.getElementById('address').value;
        var cellphone = document.getElementById('cellphone').value;
        var contactperson= document.getElementById('contactperson').value;
        var reportwarranty = document.getElementById('reportwarranty').value;
        var dcppackage= document.getElementById('dcppackage').value;
        var devicemodel = document.getElementById('devicemodel').value;
        var serialno = document.getElementById('serialno').value;
        var deviceissue = document.getElementById('deviceissue').value;
        var ictreport = document.getElementById('ictreport').value;
        
        $.ajax({
            method: 'post',
            url: 'SendReport',
            data:{
                school: school,
                district: district,
                address: address,
                cellphone: cellphone,
                contactperson: contactperson,
                reportwarranty: reportwarranty,
                dcppackage: dcppackage,
                devicemodel: devicemodel,
                serialno: serialno,
                deviceissue: deviceissue,
                ictreport: ictreport,       
            },
            success:function(response){
                $('#reportmodal').modal('hide');
                swal("Repair & maintenance", "Report has been sent", "success").then(() => {
                    location.reload();
                });
            }
        });
    });
});




$(document).ready(function(){   
    $('.addmodalbtn').click(function(){
        $('#addpackagemodal').modal("show");
        var yes = document.getElementById('yes');
        var no = document.getElementById('no');
        yes.addEventListener("click",function(){
            if (yes.checked)    {
                warranty = 'yes';
                console.log(warranty);
            } 
            })
            no.addEventListener("click",function(){
                if (no.checked) {  
                    warranty = 'no';
                    console.log(warranty);
            } 
            })
    });
});



  
  $(document).ready(function(){
      $('#addpackage').click(function(){
          var package = document.getElementById('package').value;
          var year = document.getElementById('year').value;
          var device = document.getElementById('device').value;
          var serial = document.getElementById('serial').value;
          var brand = document.getElementById('brand').value;
          var specification = document.getElementById('specification').value;
          var unitcost = document.getElementById('unitcost').value;
          var condition = document.getElementById('condition').value;
          var ao = document.getElementById('ao').value;
          var wrt = warranty;

          $.ajax({
           method: 'post',
           url:'AddPackage',
           data:{
              package: package,
              year: year,
              device: device,
              serial: serial,
              brand: brand,
              warranty: wrt,
              specification: specification,
              unitcost: unitcost,
              condition: condition,
              ao: ao
           },
           success: function(response){
              $('#addpackagemodal').modal('hide');
              swal("DCP", "Data has been added", "success").then(() => {
                      location.reload();
                  });
           }
          });
      });
  });


	document.addEventListener('mousemove', function() {
	    inactivityTime = 0;
	});
	document.addEventListener('keypress', function() {
		inactivityTime = 0;
	});
	function startLogoutTimer(){
			  setInterval(function() {
				inactivityTime += 1;
                console.log(inactivityTime);
				    if (inactivityTime >= logoutTime) {
					    window.location.href = "../login";
					}
				}, 1000);
			}
					
					