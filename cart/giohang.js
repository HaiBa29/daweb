function removeFromCart(cartId) {
    // Hiển thị cửa sổ xác nhận từ Swal
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
        // Nếu người dùng nhấn "Yes"
        if (result.isConfirmed) {
            // Gửi yêu cầu xóa sản phẩm sử dụng fetch
            fetch('remove_from_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'cart_id=' + cartId,
            })
            .then(response => response.text())
            .then(data => {
                // Xử lý phản hồi từ server
                Swal.fire({
                    icon: 'success',
                    title: 'Item Removed',
                    text: data,
                });
                // Có thể cập nhật lại giao diện hoặc làm các công việc khác sau khi xóa
                // Reload trang sau khi xóa thành công
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
}
