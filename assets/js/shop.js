// Khi người dùng nhấp vào nút "Thêm vào giỏ hàng"
addToCartButtons.forEach(button => {
    button.addEventListener("click", () => {
        const productNameElement = button.parentElement.querySelector(".title");
        const productPriceElement = button.parentElement.querySelector(".product-price");

        // Kiểm tra xem các phần tử tồn tại trước khi đọc nội dung
        if (productNameElement && productPriceElement) {
            const productName = productNameElement.textContent;
            const productPrice = productPriceElement.textContent;

            // Gửi yêu cầu POST để thêm sản phẩm vào giỏ hàng với username của người dùng
            addToCart(username, productName, productPrice);
        }
    });
});

function addToCart(username, productName, productPrice) {
    // Gửi yêu cầu POST đến server để thêm sản phẩm vào giỏ hàng của người dùng dựa trên username
    fetch("../detail/process_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `add_to_cart=1&username=${username}&product_name=${productName}&product_price=${productPrice}`,
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Hiển thị thông báo từ server
    })
    .catch(error => {
        console.error("Lỗi: " + error);
    });
}
// Khi người dùng muốn xem giỏ hàng
viewCartButton.addEventListener("click", () => {
    // Gửi yêu cầu GET để lấy thông tin giỏ hàng dựa trên username của người dùng
    fetch(`view_cart.php?username=${username}`)
    .then(response => response.text())
    .then(data => {
        // Hiển thị thông tin giỏ hàng lên trang web
        cartItems.innerHTML = data;
        modal.style.display = "block"; // Hiển thị modal
    })
    .catch(error => {
        console.error("Lỗi: " + error);
    });
});
