# WorkPlex

Mô tả ngắn gọn về dự án.

## Yêu Cầu Hệ Thống

- PHP >= 7.4
- MySQL >= 5.7
- Composer
- Node.js và npm

## Cài Đặt

Để cài đặt và chạy dự án này trên máy của bạn, hãy làm theo các bước sau:

### Bước 1: Clone Repository

Mở terminal và chạy lệnh sau để clone dự án:

```bash
git clone https://github.com/tanh11704/workplex
```

### Bước 2: Cài Đặt Các Thư Viện PHP

Chuyển đến thư mục dự án:
```bash
cd workplex
```

Cài đặt các gói thư viện bằng Composer:
```bash
composer install
```

### Bước 3: Cài Đặt Các Gói NPM
```bash
npm install
```

### Bước 4: Tạo File .env
```bash
cp .env.example .env
```

### Bước 5: Tạo Key Cho Ứng Dụng
```bash
php artisan key:generate
```

### Bước 6: Chạy Migrations và Seeders
```bash
php artisan migrate --seed
```

### Bước 7: Liên Kết Storage
```bash
php artisan storage:link
```

### Bước 8: Chạy Ứng Dụng
```bash
npm run dev
php artisan serve
```
