//checkout.js
function submitForm() {
      // Ngăn chặn hành vi mặc định của nút submit
      event.preventDefault();

    var name = document.getElementById('billing-name').value;
    var email = document.getElementById('billing-email-address').value;
    var phone = document.getElementById('billing-phone').value;
    var address = document.getElementById('billing-address').value;
   
    // Kiểm tra xem cả hai trường đã được nhập chưa
    if (name.trim() === '' || address.trim() === '') {
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Vui lòng nhập đầy đủ thông tin tên và địa chỉ.',
        });
        return;
    }

    // Kiểm tra email có đúng định dạng không
    var emailRegex = /\S+@\S+\.\S+/;
    if (!emailRegex.test(email) || !email.endsWith('@gmail.com')) {
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Vui lòng nhập đúng định dạng email (@gmail.com).',
        });
        return;
    }

    // Kiểm tra số điện thoại có đúng định dạng không
    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone)) {
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Vui lòng nhập số điện thoại có 10 số liền nhau.',
        });
        return;
    }

    // Nếu tất cả điều kiện đều đúng, thực hiện hành động mong muốn
    // (ở đây có thể là submit form, chuyển trang, etc.)
    Swal.fire({
        icon: 'success',
        title: 'Thành công!',
        text: 'Form đã được gửi thành công!',
    });

    // Kích hoạt sự kiện submit của form khi nút ngoài form được nhấn
    document.getElementById('myForm').submit();
}

