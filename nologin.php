<body>
  <div class="main-bot">
    <div class="header">
      <i class="fa fa-chevron-left exit" aria-hidden="true"></i>
      <p>Live Chat</p>
      <i class="fa fa-times exit" aria-hidden="true"></i>
    </div>

    <div class="chat-container">
    </div>
    <div class="center-button">
        <button id="nologin">đăng nhập</button>
    </div>

  </div>
<script>
  $(document).ready(function(){
    $("#chat").click(function(){
      $(".main-bot").show();
      $("#chat").hide();
    });
  });   

  $(document).ready(function(){
    $("#nologin").click(function(){
        window.location.href = "dangnhap.php";
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