$(document).ready(function(){
    $('#district').on('change', function(){
        var districtID = $(this).val();
        if(districtID){
            $.ajax({
                type:'POST',
                url:'../ajaxEmpPerInfo/ajaxData.php',
                data:'districtId='+districtID,
                success:function(html){
                    $('#schools').html(html);
                }
            }); 
        }else{
            $('#schools').html('<option value="">Select district first</option>');
        }
    });
});