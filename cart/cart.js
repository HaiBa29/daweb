/*
// JavaScript (with jQuery)
$(document).ready(function () {
    $("#addToCartBtn").click(function () {
         console.log("Button clicked!"); // Thêm dòng này để kiểm tra
        var bikeId = $(this).data("bike-id");
        var quantity = $("#quantity").val();  // Get quantity from input field
        var size = $("#size").val();          // Get size from dropdown

        // Ajax request to add to cart
        $.ajax({
            type: "POST",
            url: "addToCart.php",
            data: { bikeId: bikeId, quantity: quantity, size: size },
            success: function (response) {
                // Handle success response (if needed)
                console.log("Product added to cart successfully");
            },
            error: function (xhr, status, error) {
                // Handle error response (if needed)
                console.error("Error adding product to cart:", error);
            }
        });
    });
});

*/
// script.js
function addToCart(bikeId, quantity, size) {
    $.ajax({
        type: "POST",
        url: "addToCart.php",
        data: { bikeId: bikeId, quantity: quantity, size: size },
        success: function (response) {
            console.log("Product added to cart successfully");
        },
        error: function (xhr, status, error) {
            console.error("Error adding product to cart:", error);
        }
    });
}

$(document).ready(function () {
    $("#addToCartBtn").click(function () {
        console.log("Button clicked!");
        var bikeId = $(this).data("bike-id");
        var quantity = $("#quantity").val();
        var size = $("#size").val();

        addToCart(bikeId, quantity, size);
    });
});
