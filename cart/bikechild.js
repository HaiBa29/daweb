document.addEventListener("DOMContentLoaded", function () {
    // Kiểm tra xem 'bike_id' có trong URL không
    var bikeId = getParameterByName('bike_id');
  /*
    if (bikeId) {
      // Thực hiện các thao tác cần thiết với bikeId
      console.log('bike_id từ URL:', bikeId);
    } else {
      console.log('Không có bike_id trong URL');
    }*/
  });
  
  // Hàm để lấy tham số từ URL
  function getParameterByName(name) {
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(window.location.href);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }
  


  // nút trở lại lịch sử
  function goBack() {
    // Sử dụng window.history.back() để quay trở lại trang trước đó
    window.history.back();
}

// cài đặt max cho số lượng
function validateQuantityInput(input) {
  var maxQuantity = parseInt(input.getAttribute('max'));
  var enteredValue = parseInt(input.value);

  if (enteredValue > maxQuantity) {
      input.value = maxQuantity;
  }
}
