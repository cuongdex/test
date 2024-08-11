<?php  ?>
<div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus'></i> -->
      <a href="index.php" class="logo_name">CIT</a>
    </div>
    <ul class="nav-links">
      <li>
        <div class="iocn-link">
          <a href="#">
            <span class="link_name">Quản lý ngành học</span>
        </a>
        <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a href="index.php?quanlycp=qlttts">Các ngành tuyển sinh</a></li>
          <li><a href="index.php?quanlycp=ptxt">Phương thức xét tuyển</a></li>
          <li><a href="index.php?quanlycp=chitieu">Chỉ tiêu - Điểm</a></li>

        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="index.php?quanlycp=ql_ptxt">
            <span class="link_name">QL phương thức xét tuyển</span>
          </a>
        </div>
      </li>

      <li>
        <div class="iocn-link">
          <a href="index.php?quanlycp=cauhoi">
            <span class="link_name">QL Chatbot</span>
          </a>
        </div>
      </li>
    
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <!-- <img src="image/profile.jpg" alt="profileImg"> -->
      </div>
      <div class="name-job">
        <div class="profile_name"><?php session_start(); if(isset($_SESSION['dang_nhap'])){
              echo $_SESSION['dang_nhap'];
        } ?></div>
      </div>
      <a href="index.php?quanlycp=dangxuat"> <i class='bx bx-log-out' ></i> </a>
    </div>
  </li>
</ul>
  </div>

