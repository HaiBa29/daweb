

function setupHoverEffect() {
  const textBike = document.querySelector('.text-bike');
  const imgHover = document.querySelector('.img-hover');
  const headerBike = document.querySelector('.header-bike');
  const contentBike = document.querySelector('.content-bike');
  
  textBike.addEventListener('mouseover', () => {
    imgHover.classList.add('blur-effect');
    headerBike.style.filter = 'blur(2px)';
    contentBike.style.opacity = '1';
  });

  textBike.addEventListener('mouseout', () => {
    imgHover.classList.remove('blur-effect');
    headerBike.style.filter = 'blur(0)';
    contentBike.style.opacity = '0';
  });
}

// Gọi hàm setupHoverEffect() để thiết lập hiệu ứng cho các phần tử tương ứng
setupHoverEffect();


// Định nghĩa hàm sẵn sàng
function ready() {
  // Lấy tất cả các phần tử button-bike
  const buttonBikes = document.querySelectorAll('.button-bike');

  // Duyệt qua từng button-bike
  buttonBikes.forEach(function (buttonBike) {
    // Lấy phần tử div chứa icon và chữ ADD TO CART
    const loveDiv = buttonBike.querySelector('.love');
    const heartIcon = loveDiv.querySelector('i');
    const watchlistText = loveDiv.querySelector('.watchlist-text');

    // Lấy phần tử div chứa icon và chữ LIKE
    const cartDiv = buttonBike.querySelector('.chon');
    const checkboxIcon = cartDiv.querySelector('i');
    const selectText = cartDiv.querySelector('.select-text');

    // Tạo biến để theo dõi trạng thái của icon và nội dung
    let isLiked = false;
    let isAddedToCart = false;

    // Bắt sự kiện click vào icon của chữ ADD TO CART
    heartIcon.addEventListener('click', function () {
      // Đảo ngược trạng thái
      isAddedToCart = !isAddedToCart;

      // Thay đổi class của icon
      heartIcon.classList.toggle('bxs-cart', isAddedToCart);
      heartIcon.classList.toggle('bx-cart', !isAddedToCart);
      // Thay đổi nội dung của chữ ADD TO CART
      watchlistText.textContent = isAddedToCart ? 'REMOVE FROM CART' : 'ADD TO CART';
    });

    // Bắt sự kiện click vào icon của chữ LIKE
    checkboxIcon.addEventListener('click', function() {
      // Đảo ngược trạng thái
      isLiked = !isLiked;

      // Thay đổi class của icon
      checkboxIcon.classList.toggle('bxs-heart', isLiked);
      checkboxIcon.classList.toggle('bx-heart', !isLiked);

      // Thay đổi nội dung của chữ LIKE
      selectText.textContent = isLiked ? 'UNLIKE' : 'LIKE';
    });
  });
}

// Gọi hàm ready khi trang web đã sẵn sàng
document.addEventListener('DOMContentLoaded', ready);




// Gọi hàm sẵn sàng khi tài liệu HTML được tải
document.addEventListener('DOMContentLoaded', ready);

function applyHoverEffects() {
  const textBikes = document.querySelectorAll('.text-bike');
  const imgHovers = document.querySelectorAll('.img-hover');
  const headerBikes = document.querySelectorAll('.header-bike');
  const contentBikes = document.querySelectorAll('.content-bike');

  textBikes.forEach((textBike, index) => {
    const imgHover = imgHovers[index];
    const headerBike = headerBikes[index];
    const contentBike = contentBikes[index];

    textBike.addEventListener('mouseover', () => {
      imgHover.classList.add('blur-effect');
      headerBike.style.filter = 'blur(2px)';
      contentBike.style.opacity = '1';
    });

    textBike.addEventListener('mouseout', () => {
      imgHover.classList.remove('blur-effect');
      headerBike.style.filter = 'blur(0)';
      contentBike.style.opacity = '0';
    });
  });
}

// Gọi hàm applyHoverEffects để áp dụng hiệu ứng cho các phần tử tương ứng
applyHoverEffects();


class ProductController {
  constructor() {
      this.productContainer = document.getElementById("productContainer");
  }

  showProductContainer() {
      if (this.productContainer.classList.contains("hidden")) {
          this.productContainer.classList.remove("hidden");
          // Thêm mã ở đây để lấy và điền dữ liệu nếu cần
      } else {
          this.productContainer.classList.add("hidden");
      }
  }

  closeProductDetails() {
      this.productContainer.classList.add("hidden");
  }

  // Thêm các phương thức khác nếu cần
}

// Tạo một đối tượng từ lớp ProductController
const productController = new ProductController();





//-------- tìm kiếm-----------------------


// script.js

var searchIcon = document.getElementById('searchIcon');
var searchInput = document.getElementById('searchInput');

searchIcon.addEventListener('click', function() {
    searchInput.focus();
});

searchIcon.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
        document.getElementById('searchForm').submit();
    }
});

searchInput.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
        document.getElementById('searchForm').submit();
    }
});




// ----------------------truyền sang trang con


// ----------------------truyền sang trang con
document.addEventListener("DOMContentLoaded", function () {
  var loveButtons = document.querySelectorAll(".love , .text-bike");

  loveButtons.forEach(function (button) {
      button.addEventListener("click", function () {
          var bikeId = button.dataset.bikeId;

          // Hiển thị thông báo
         // alert("Đã truy vấn được bike_id: " + bikeId);

          // Chuyển hướng đến trang con và truyền bike_id
          redirectToDetailPage(bikeId);
      });
  });
});

function redirectToDetailPage(bikeId) {
  // Sử dụng bikeId theo cần thiết (ví dụ: log nó ra console)
  console.log("Bike ID:", bikeId);

  // Chuyển hướng đến trang con và truyền bike_id
  window.location.href = 'cart.php?bike_id=' + bikeId;
}

