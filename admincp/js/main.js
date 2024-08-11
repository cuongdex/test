if(window.location.search.includes('success=1')) {
  alert("Ngành học đã được thêm thành công.");
}
if(window.location.search.includes('error=1')) {
  alert("Có lỗi xảy ra khi thêm ngành học.");
}

let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
arrow[i].addEventListener("click", (e)=>{
let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
arrowParent.classList.toggle("showMenu");
});
}

function toggleText(element) {
  element.classList.toggle('full-text'); // Toggle class 'full-text' on click
}

;

  $(document).ready(function() {
    $('.show_phuong_thuc_btn').click(function() {
      var ma_nganh = $(this).closest('tr').find('.quantrong').text().trim();
        // Lưu ma_nganh vào Local Storage
        localStorage.setItem('ma_nganh', ma_nganh);
        // console.log("Ma nganh duoc chon: " + ma_nganh);
    });
});


$(document).ready(function() {
  $('.show_phuong_thuc_btn').click(function() {
    // console.log(1)
    var localData = localStorage.getItem('ma_nganh');

      // Sử dụng AJAX để gửi yêu cầu đến file PHP
      $.ajax({
          url: 'quanly/hienthi.php', // Đường dẫn tới tập tin PHP
          method: 'POST', // Phương thức gửi dữ liệu
          data: { manganh : localData },
          success: function(response) {
              // Hiển thị kết quả từ tập tin PHP trong vùng có id là 'phuong_thuc_content'
              $('.chon_phuong_thuc').html(response);
              $(".chon_phuong_thuc").toggleClass("show");

              // console.log(response)
          },
          error: function(xhr, status, error) {
              // Xử lý lỗi nếu có
              console.error(error);
          }
      });
  });
});



$(document).ready(function(){
  $(".click_opt").click(function(){
    $(".them_nganh_hoc").toggleClass("show");
  });
  });
  
  $(document).ready(function(){
    $("#close").click(function(){
      $(".them_nganh_hoc").toggleClass("show");
    });
    });
  
  $(document).ready(function(){
    $("#check").click(function(){
      // $(".them_nganh_hoc").toggleClass("show");
    });
    })

function cucquantrong() {
  $(".chon_phuong_thuc").toggleClass("show");
}
    
function dongsua() {
  $(".sua_nganh_hoc").toggleClass("show");
}

function dongphuongthuc() {
  $(".sua_phuong_thuc").toggleClass("hide");
  // console.log(1)
}
  
function dongthaydoi(){
  $(".doi_chi_tieu").toggleClass("hide");

}

function dongtraloi(){
  $(".show_tra_loi").toggleClass("hide");

}
 
function luutraloi(){
  
}

function luuphuongthuc(){
  var selectedCheckboxes = [];
        $('.phuong_thuc_ts:checked').each(function() {
            selectedCheckboxes.push($(this).val()); // Thêm giá trị của ô đã chọn vào mảng
        });

        var localData = localStorage.getItem('ma_nganh');
        if (localData) {
            selectedCheckboxes.push(localData);
        }
        location.reload();

        $.ajax({
            url: 'quanly/chon_phuong_thuc.php',
            method: 'POST',
            data: { phuongthuc: selectedCheckboxes }, // Gửi mảng các giá trị đã chọn
            success: function(response) {
                // Xử lý phản hồi từ server nếu cần
                // console.log(response)
                $('#selected_checkboxes').html(response); // Hiển thị phản hồi trong vùng hiển thị
            }
        });
}




  $(document).ready(function(){
    $(".lay_gia_tri").click(function() {
        var ma_nganh = $(this).closest("tr").find(".quantrong").text().trim();
        $.ajax({
          url: 'quanly/sua_nganh_hoc.php',
          method: 'GET',
          data: { manganh: ma_nganh }, // Gửi mảng các giá trị đã chọn
          success: function(response) {
              $('.sua_nganh_hoc').html(response);
              $(".sua_nganh_hoc").toggleClass("show");
          }
      });
    });
  });

  $(document).ready(function(){
    $(".lay_gia_tri_pt").click(function() {
        var ma_pt = $(this).closest("tr").find(".quantrong").text().trim();
        $.ajax({
          url: 'quanly/sua_phuong_thuc.php',
          method: 'GET',
          data: { maphuongthuc: ma_pt }, // Gửi mảng các giá trị đã chọn
          success: function(response) {
              $('.sua_phuong_thuc').html(response);
              $(".sua_phuong_thuc").toggleClass("hide");
          }
      });
    });
  });

  $(document).ready(function(){
    $(".show_thay_doi").click(function() {
        var ma_nganh = $(this).closest("tr").find(".quantrong").text().trim();
        console.log(ma_nganh)
        $.ajax({
          url: 'quanly/thay_doi_diem.php',
          method: 'GET',
          data: { manganh: ma_nganh }, // Gửi mảng các giá trị đã chọn
          success: function(response) {
              $('.doi_chi_tieu').html(response);
              $(".doi_chi_tieu").toggleClass("hide");
          }
      });
    });
  });


  $(document).ready(function(){
    $(".show_cau_tra_loi").click(function() {
        var stt = $(this).closest("tr").find(".quantrong").text().trim();
        console.log(stt)
        $.ajax({
          url: 'quanly/show_tra_loi.php',
          method: 'GET',
          data: { id: stt }, // Gửi mảng các giá trị đã chọn
          success: function(response) {
              $('.show_tra_loi').html(response);
              $(".show_tra_loi").toggleClass("hide");
          }
      });
    });
  });
