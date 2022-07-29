# REST 

Viết tắt của REpresentational State Transfer. Là một kiểu kiến trúc được sử dụng trong việc giao tiếp giữa các máy tính (máy tính cá nhân và máy chủ của trang web) trong việc quản lý các tài nguyên trên internet. REST được sử dụng rất nhiều trong việc phát triển các ứng dụng Web Services sử dụng giao thức HTTP trong giao tiếp thông qua mạng internet. Các ứng dụng sử dụng kiến trúc REST này thì sẽ được gọi là ứng dụng phát triển theo kiểu RESTful.

Một Web API (hay Web Services) tuân theo kiểu kiến trúc REST được gọi là REST API.

## Guiding Principles of REST

Những ràng buộc của REST: Không có định nghĩa hay tiêu chuẩn cụ thể, nó là một loạt các ràng buộc mà khi ta tuân theo, sẽ tạo ra việc triển khai theo kiến trúc REST.

1 Giao diện thống nhất (Uniform Interface): (?)

    Có 4 ràng buộc phụ để đảm bảo giao diện được thống nhất.

    1.1 Định danh các tài nguyên (Identification of Resources): (?)

    1.2 Thao khống thông qua biểu tả (Manipulation of resources through representations): (?)

    1.3 Thông điệp tự mô tả (Self-descriptive messages): (?)

    1.4 Siêu phương tiện là Engine của trạng thái ứng dụng (Hypermedia as the engine of application state): (?)

2 Phi trạng thái (Stateless): Sử dụng REST đồng nghĩa với việc không sử dụng SESSION, mọi giao tiếp đều mang theo đủ lượng thông tin cần thiết để có thể xử lý.

3 Có thể lưu vào bộ nhớ đệm (Cacheable): Trong mọi trao đổi, dữ liệu phải được đánh dấu là dữ liệu có thể lưu vào bộ nhớ cache hoặc không thể lưu trong bộ nhớ cache. Dữ liệu có thể lưu vào bộ nhớ cache có thể được máy khách lưu trữ và sử dụng lại. Không có dữ liệu nào được lưu trữ trên máy chủ vì điều này sẽ vi phạm ràng buộc nguyên tắc không trạng thái (Stateless) ở trên. Khả năng lưu trữ dữ liệu vào bộ nhớ cache làm giảm băng thông vì không cần băng thông để duy trì một phiên truy cập Client - Server.

4 Client - Server: Ràng buộc này về cơ bản có nghĩa là các ứng dụng máy khách và ứng dụng máy chủ PHẢI có thể phát triển riêng biệt mà không có bất kỳ sự phụ thuộc nào vào nhau. Một Client chỉ nên biết các tài nguyên URI.

5 Hệ thống phân lớp (Layered system): (?) (Mọi thay đổi hoặc gián đoạn đối với hệ thống trung gian vô hình đối với máy khách, cho phép các hệ thống trung gian đó cung cấp cân bằng tải, bảo mật hoặc các chức năng khác)

6 Code on demand: (?)

    GET: lấy dữ liệu.
    POST: tạo mới dữ liệu.
    PUT: cập nhật dữ liệu.
    DELETE: xoá dữ liệu.
