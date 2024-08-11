<body>
  <div class="main-bot">
    <div class="header">
      <i class="fa fa-chevron-left exit" aria-hidden="true"></i>
      <p>Live Chat</p>
      <i class="fa fa-times exit" aria-hidden="true"></i>
    </div>

    <div class="chat-container">

    </div>

    <div class="box-input">
      <textarea name="" id="user_message" cols="49" rows="1"></textarea>
      <button id="btn_send">Gửi</button>
    </div>
  </div>
<script>
  $('#user_message').keyup(function(e){
    if(e.which == 13){ // 13 là mã ASCII của phím "Enter"
      e.preventDefault(); // Ngăn chặn hành động mặc định của phím "Enter"
      var message = $(this).val(); // Lấy nội dung từ input
      var b = '[Ban]: '
      $('.chat-container').append('<div class="chat-item sent">\
          <div class="box">\
            <div class="message">' + message + '</div>\
          </div>\
        </div>');
      $(this).val(''); // Xóa nội dung trong input

      $.ajax({
        type:'POST',
        url: 'http://localhost:5005/webhooks/rest/webhook',
        data : '{"sender":"test","message":"'+message+'"}',
        success: function(data){
          var b = '[BOT]: '
          data.forEach(element => {
            $('.chat-container').append('<div class="chat-item received">\
              <div class="box">\
                <div class="message">' + element.text + '</div>\
              </div>\
            </div>');
          });
        }
      });
    }
  });

  // Bắt sự kiện khi người dùng nhấp vào nút "Send"
  $('#btn_send').click(function(){
    var message = $('#user_message').val(); // Lấy nội dung từ input
    $('.chat-container').append('<div class="chat-item sent">\
        <div class="box">\
          <div class="message">' + message + '</div>\
        </div>\
      </div>');
    $('#user_message').val(''); // Xóa nội dung trong input

    $.ajax({
      type:'POST',
      url: 'http://localhost:5005/webhooks/rest/webhook',
      data : '{"sender":"test","message":"'+message+'"}',
      success: function(data){
        data.forEach(element => {
          $('.chat-container').append('<div class="chat-item received">\
              <div class="box">\
                <div class="message">' + element.text + '</div>\
              </div>\
            </div>');
        });
      }
    });
  });

  $(document).ready(function(){
    $("#chat").click(function(){
      $(".main-bot").show();
      $("#chat").hide();
    });
  });   


  $(document).ready(function(){
    $(".exit").click(function(){
      $(".main-bot").hide();
      $("#chat").show();
    });
  });  
  
</script>
</body>