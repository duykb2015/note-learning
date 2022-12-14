# **HTTP**

> Để hiểu hết được phần này, trước tiên cần tìm hiểu kiến trúc [Client Server](./Client-Server.md)


## **Nội dung**:

- [HTTP là gì?](#http-là-gì)

- [HTTP Request là gì?](#http-request-là-gì)
    
- [HTTP Request header](#request-header)

- [HTTP Request body](#request-body)

## **HTTP là gì?**

Giao thức truyền siêu văn bản (The Hypertext Transfer Protocol) là nền tảng của WWW được thiết kế để truyền thông tin giữa các thiết bị được nối mạng và chạy trên các lớp khác của ngăn xếp giao thức mạng. Một ví dụ điển hình cho HTTP là mô hình [Client Server](./Client-Server.md).

- WWW (hay [*World Wide Web*](https://vi.wikipedia.org/wiki/World_Wide_Web) - mạng lưới toàn cầu) là một không gian thông tin toàn cầu mà mọi người có thể truy cập, được sử dụng để tải các trang web bằng các liên kết siêu văn bản ([hypertext](https://vi.wikipedia.org/wiki/Si%C3%AAu_v%C4%83n_b%E1%BA%A3n) [link](https://vi.wikipedia.org/wiki/Si%C3%AAu_li%C3%AAn_k%E1%BA%BFt)) . HTTP là một giao thức [lớp ứng dụng](https://vi.wikipedia.org/wiki/T%E1%BA%A7ng_%E1%BB%A9ng_d%E1%BB%A5ng).

## **HTTP request là gì?**

Yêu cầu HTTP là cách các nền tảng truyền thông trên internet, ví dụ như trình duyệt web, yêu cầu thông tin họ cần để tải một trang web (nôm na là trình duyệt web sẽ yêu cầu lên [Web Server](https://vi.wikipedia.org/wiki/M%C3%A1y_ch%E1%BB%A7_web) yêu cầu các thông tin để hiển thị ra một trang web hoàn chỉnh, thông tin ở đây là các hình ảnh, văn bản, giao diện).

Một request sẽ chứa các dữ liệu được mã hoá, bao gồm:

- HTTP version type: loại phiên bản của HTTP
- URL: [địa chỉ web](https://vi.wikipedia.org/wiki/URL)
- HTTP Method.
- HTTP Request Headers.
- Optional HTTP Body.

> Ở đây khi trình bày sẽ nói cụ thể là [trình duyệt web](./WebBrowser.md).


### **Trước tiên HTTP Method**

Phương thức (method) dùng để chỉ các hành động mà trình duyệt yêu cầu tới server. Bao gồm:

- **GET**: là phương thức được Client (máy khách, ở đây có thể là chính bạn) gửi dữ liệu lên Server thông qua đường dẫn URL nằm trên thanh địa chỉ của trình duyệt. Server sẽ nhận đường dẫn đó và phân tích trả về kết quả cho bạn. Hơn nữa, nó là một phương thức được sử dụng phổ biến mà không cần có request body (sẽ nói ở dưới).

    Điển hình là khi bạn mở một trang web, bạn sẽ nhập địa chỉ vào thanh tìm kiếm trên trình duyệt ví dụ: `wikipedia.org`, kết quả sẽ trả về một trang bách khoa toàn thư chứa hình ảnh, màu sắc, văn bản ...

    Một số đặc điểm chính của phương thức Get là:

    1. Giới hạn độ dài của các giá trị là 255 kí tự.
    2. Chỉ hỗ trợ các dữ liệu kiểu String.
    3. Có thể lưu vào bộ nhớ cache.
    4. Các tham số truyền vào được lưu trữ trong lịch sử trình duyệt.
    5. Có thể được bookmark (đánh dấu rồi xem lại sau) do được lưu trong lịch sử trình duyệt.

- **POST**: là phương thức gửi dữ liệu đến server giúp bạn có thể thêm mới dữ liệu hoặc cập nhật dữ liệu đã có vào database. 
    
    > Ví dụ đơn giản là chức năng đăng nhập, bạn nhập tài khoản, mật khẩu, sau đó bấm nút đăng nhập. Dữ liệu sẽ được gửi lên server để xử lý.

    Chúng ta sẽ gửi thông tin cần thêm hoặc cập nhật trong phần body request.

    Một số đặc điểm chính của Post là:

    1. Dữ liệu cần thêm hoặc cập nhật không được hiển thị trong URL của trình duyệt.
    3. Dữ liệu không được lưu trong lịch sử trình duyệt.
    4. Không có hạn chế về độ dài của dữ liệu.
    5. Hỗ trợ nhiều kiểu dữ liệu như: String, binary, integers,..

- **PUT**: Cách hoạt động tương tự như Post nhưng nó chỉ được sử dụng để cập nhật dữ liệu đã có trong database. Khi sử dụng nó, bạn phải sửa toàn bộ dữ liệu của một đối tượng.

    > Ví dụ bản sửa thông tin cá nhân trên facebook, và bấm nút cập nhật. Dữ liệu của bạn sẽ được lưu lại và kết quả hiển thị sẽ giống với những gì bạn vừa sửa.

- **DELETE**: Giống như tên gọi, khi sử dụng phương thức Delete sẽ xoá các dữ liệu của server về tài nguyên thông qua [URI](https://vi.wikipedia.org/wiki/URI). Cũng giống như GET, phương thức này không có body request.


Ngoài ra còn có một số phương thức khác có thể tìm hiêu thêm [tại đây](https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods).

### **Request header**

Request header giúp client có thể gửi yêu cầu lên server. Mỗi yêu cầu sẽ kèm theo các thông số, và các thông số đó được gọi là Header Parameters. Trình duyệt và server sẽ dựa vào các thông số header này để trả dữ liệu và hiển thị dữ liệu cho phù hợp.

Các thông số mà các bạn có thể gặp khá thường xuyên như:

- **User-Agent**: cho phép server xác định ứng dụng, hệ điều hành, nhà cung cấp và phiên bản.

- **Connection**: kiểm soát kết nối mạng. Nói cách khác, cho phép dừng hoặc tiếp tục kết nối sau khi server thực hiện xong yêu cầu.

- **Cache-Control**: chỉ định chính sách bộ nhớ đệm của trình duyệt.

- **Accept-Language**: cho biết tất cả các ngôn ngữ (tự nhiên) mà client có thể hiểu được.

### **Request Body**

Cho phép client gừi đến yêu cầu bổ sung cần server thực hiện như: tạo mới hoặc cập nhật dữ liệu mà không thể truyền trên Header Parameters.

> Source: [HTTP REQUEST](https://toolsqa.com/client-server/http-request/)

