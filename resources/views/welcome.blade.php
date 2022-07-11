<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
</head>
<body>
    <div id="main">
        <div id="header" class="clear">
            <ul id="nav">
                <li><a href="">Trang chủ</a></li>
                <li><a href="">Giảng viên</a></li>
                <li><a href="">Khóa học</a></li>
                <li><a href="">Liên hệ</a></li>
                <li>
                    <a href="">
                        NHIỀU HƠN
                        <i class="nav-arrow-down ti-angle-down"></i>
                    </a>
                    
                    <ul class="subnav">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </li>
            </ul>
            <div class="search-btn">
                <i class="search-icon ti-search"></i>
            </div>
            
        </div>
        <img id="slider" src="/assets/img/slider.jpg" alt="">
        <div id="content">
            <div id="teacher" class="content-section">
                <h1 class="section-heading">GIẢNG VIÊN</h1>
                <p class="section-sub-heading">Người dẫn dắt bạn đến với con đường thành công</p>
               <div class="row member-list">
                    <div class="col col-half">
                        <img id="img-teacher" src="/assets/img/teacher.jpg" alt="">
                   </div>
                   <div class="col col-half">
                       <h3 class="text-center">Nguyễn Thị Kim Thích</h3>
                       <p class="section-sub-heading">Câu sologan của Nguyễn Thị Kim Thích</p>
                       <ul class="text-teacher">
                            <li>Tốt nghiệp loại Khá Sư phạm Ngôn ngữ Anh Đại học Quy Nhơn</li>
                            <li>Kinh nghiệm trên 10 năm giảng dạy từ tiểu học đến cấp 2, từ miền quê đến thành phố</li>
                            <li>Sở thích ăn hàng, xem phim, đi du lịch và vui chơi với trẻ em</li>
                         </ul>
                   </div>
               </div>
            </div>
            
            <div id="class" class="class-section">
                <div class="content-section">
                    <h1 class="section-heading">KHÓA HỌC</h1>
                    <p class="section-sub-heading">Hãy chọn khóa học phù hợp với bạn</p>
                    
                    <ul class="class-list">
                        <li>LỚP 6 <span class="full">Hết chỗ</span></li>
                        <li>LỚP 7 <span class="full">Hết chỗ</span></li>
                        <li>LỚP 8 <span class="full">Hết chỗ</span></li>
                        <li>LỚP 9 <span class="quantity">2</span></li>
                    </ul>

                    <div class="row room-list">
                        <div class="col col-half-half">
                            <img src="/assets/img/room/lop6.jpg" alt="" class="room-img">
                            <div class="room-body">
                                <h3 class="room-heading">LỚP 6</h3>
                                <P class="room-time">Thứ 2 4 6, 17h30 - 19h30</P>
                                <p class="room-content">Những bài học cơ bản trong SGK và cũng cố kiến thức</p>
                                <button href="" class="btn js-join-room">Tham gia</button>
                            </div>
                        </div>
                        <div class="col col-half-half">
                            <img src="/assets/img/room/lop7.jpg" alt="" class="room-img">
                            <div class="room-body">
                                <h3 class="room-heading">LỚP 7</h3>
                                <P class="room-time">Thứ 3 5 7, 17h30 - 19h30</P>
                                <p class="room-content">Những bài học cơ bản trong SGK và cũng cố kiến thức</p>
                                <button href="" class="btn js-join-room">Tham gia</button>
                            </div>
                        </div>
                        <div class="col col-half-half">
                            <img src="/assets/img/room/lop8.jpg" alt="" class="room-img">
                            <div class="room-body">
                                <h3 class="room-heading">LỚP 8</h3>
                                <P class="room-time">Thứ 2 4 6, 14h30 - 16h30</P>
                                <p class="room-content">Những bài học cơ bản trong SGK và cũng cố kiến thức</p>
                                <button href="" class="btn js-join-room">Tham gia</button>
                            </div>
                        </div>
                        <div class="col col-half-half">
                            <img src="/assets/img/room/lop9.jpg" alt="" class="room-img">
                            <div class="room-body">
                                <h3 class="room-heading">LỚP 9</h3>
                                <P class="room-time">Thứ 3 5 7, 14h30 - 16h30</P>
                                <p class="room-content">Những bài học cơ bản trong SGK và cũng cố kiến thức</p>
                                <button href="" class="btn js-join-room">Tham gia</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div id="contact" class="content-section">
                <h2 class="section-heading">LIÊN HỆ</h2>
                <p class="section-sub-heading">Mọi thắc mắc vui lòng liên hệ</p>
    
            </div>
        </div>
        
       
    
        <div id="footer">
            
        </div>
        
    </div>
</body>
</html>