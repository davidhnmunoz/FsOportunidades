// $(document).ready(function() {
//     $(".test-input").blur(function() {
//         var id = this.value;
//         $.ajax({
//             url: URL + '../php/agregar_cuenta.php',
//             data: {
//                 id: id
//             },
//             type: 'POST',
//             success: function(response) {
//                 if (response == "used") {
//                     $(".test-input").css("border", "1px solid red");
//                 } else {
//                     $(".test-input").css("border", "1px solid green");
//                 }
//             }
//         });
//     });
// });