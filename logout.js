
function jslogout() {
    $( document ).ready(function() {
$.ajax({
type: 'GET',
url: 'logout.php',
success: function (data) {
window.location.reload(false); 
},
error: function (data) {
alert('An error occurred.');
},
});
});
}