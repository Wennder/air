$(function(){
    $('#addMyAirplane').click(addMyAirplane)
})

function addMyAirplane(){
    
    $.ajax({
        url: $('#add_airplane_path').val() + '?' + $('#airplanesForm').serialize(),
        dataType: 'json',
        success: function(response){
            if(response.success ==true){
                var tr = $('<tr>');
                tr.append('<td></td>').append('<td>'+response.seats+'</td>')
                .append('<td>'+response.type+'</td>')
                .append('<td>'+response.airline+'</td>')
                .append('<td><input type="button" value="Удалить" onclick="removeAirplane({$row->id},this)"></td>')
                .insertAfter('tr:last');
                
            }
        }
    })
    return false;
}

function removeAirplane(id, t){
    $.ajax({
        url: $('#remove_airplane_path').val() + '/' + id,
        dataType: 'json',
        success: function(response){
            if(response.success){
                $(t).parents('tr').remove();
            }
        }
    })
}