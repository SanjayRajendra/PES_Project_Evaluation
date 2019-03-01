function get(id) 
{
    var dt= new Date();
    var yyyy = dt.getFullYear().toString();
    var mm = (dt.getMonth()+1).toString();
    var dd  = dt.getDate().toString();
    var min = yyyy +'-'+ (mm[1]?mm:"0"+mm[0]) +'-'+ (dd[1]?dd:"0"+dd[0]);
    $('#'+id).prop('min',min);
}