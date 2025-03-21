# Vietnix Platform Logger

Thư viện PHP để gửi log đến một endpoint tùy chỉnh.

## Yêu cầu

- PHP >= 7.4
- Composer

## Cài đặt

```bash
composer require vietnix/php-platform-vendor
```

## Cách sử dụng

```php
use Vietnix\PlatformVendor\PlatformLogger;

// Khởi tạo logger
$logger = new PlatformLogger(
    'https://your-endpoint.com', // URL endpoint
    'your-api-key'              // API key
);

// Gửi log
$logger->sendLog(
    'Nội dung log',  // Message
    3,              // Level (mặc định là 3 - DEBUG)
    ['key' => 'value'] // Metadata tùy chọn
);
```

## Các mức độ log

| Level | Giá trị | Mô tả |
|-------|---------|--------|
| URGENT | 1 | Khẩn cấp |
| ERROR | 2 | Lỗi |
| DEBUG | 3 | Debug (mặc định) |
| WARN | 4 | Cảnh báo |
| INFO | 5 | Thông tin |

## Response

Hàm `sendLog()` sẽ trả về:
- `true`: Khi log được gửi thành công (status code 200 hoặc 201)
- `false`: Khi có lỗi xảy ra

## License

MIT 