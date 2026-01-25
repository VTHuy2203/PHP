# Cosmetics E-commerce Website

---

## Tính năng chính

### 1) Khách hàng (Client)
- Xem danh sách sản phẩm, xem chi tiết sản phẩm
- Tìm kiếm / lọc sản phẩm (theo danh mục, thương hiệu, giá…)
- Giỏ hàng và đặt hàng

### 2) Quản trị (Admin)
- CRUD sản phẩm (thêm / sửa / xoá)
- Quản lý danh mục, thương hiệu (tuỳ phiên bản)
- Quản lý đơn hàng: duyệt đơn, cập nhật trạng thái
- Quản lý người dùng


---

## Công nghệ sử dụng
- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML/CSS/JavaScript


---

## Cấu trúc thư mục (tham khảo)
> Có thể khác tuỳ cách bạn tổ chức project.

- `/Admin` : giao diện + chức năng quản trị  
- `/Client` : giao diện khách hàng  
- `/assets` : css/js/images  
- `/config` : cấu hình kết nối DB  

---

## Cài đặt & Chạy dự án (Local)

### 1) Yêu cầu
- XAMPP/WAMP (PHP 7+)
- Laragon
- MySQL 5.7+ / 8.0
- Trình duyệt

### 2) Import Database
1. Mở phpMyAdmin
2. Tạo database : `webmipham1`
3. Import file `.sql` (nếu có)

### 3) Cấu hình kết nối DB
Tìm file cấu hình DB và sửa:
- host, user, password, database

### 4) Chạy web
- Copy project vào thư mục `htdocs` (XAMPP)
- Mở:
  - Client: `http://localhost/TTTT1\TTTT\WebBanHangMyPham/`
  - Admin: `http://localhost/TTTT1\TTTT\AdminManage/`



