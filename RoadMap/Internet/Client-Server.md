# Nội dung chính

* [Client Server architecture](#what-is-client-server-architecture-kiến-trúc-client-server-là-gì)
    
    * [Client là gì?](#client-là-gì)

    * [Server là gì?](#server-là-gì)

* [Cách kiến trúc Client Server hoạt động](#cách-kiến-trúc-client-server-hoạt-động)

* [Các loại kiến trúc Client Server](#các-loại-kiến-trúc-client-server)

# What is Client Server Architecture? (Kiến trúc Client Server là gì?)

Kiến trúc Client Server (máy khách - máy chủ) hiểu đơn giản như một mô hình người tiêu dùng - nhà sản xuất, trong đó Client là người tiêu dùng, là người yêu cầu dịch vụ, còn Server là nhà sản xuất, tức là nhà cung cấp dịch vụ. Tiếp theo đây sẽ trình bày thêm để làm rõ thực sự Client Server là gì.

## Client là gì?

Client (máy khách) có thể là một hệ thống hoặc một chương trình kết nối đến một hệ thống hoặc phần mềm từ xa khác để nạp dữ liệu. Client sẽ gửi yêu cầu lên Server và thông tin sẽ được trả về (*ví dụ đơn giản cho một yêu cầu ở đây là khi bạn truy cập vào trang facebook.com, tức là bạn đang kết nối đến server của facebook và thông tin trả về sẽ là một trang web có hình ảnh, giao diện, màu sắc ...*). 

Có thể chia ra làm 3 loại Client: thick, thin và hybird.

* ***Thick Client:*** là loại Client có thể làm việc, thực hiện các thao tác mà không cần máy chủ, điển hình là máy tính cá nhân vì phần lớn các hoạt động trên máy tính không kết nối tởi máy chủ nào cả (ví dụ: tạo file, xoá file, ... những hành động này có thể thực hiện trực tiếp trên máy tính kể cả khi không có internet).

* ***Thin Client***: là loại Client hoạt động phụ thuộc nhiều vào máy chủ, trình duyệt là một ví dụ. Hầu như mọi hoạt động, thao tác, dữ liệu trên một trang web của trình duyệt đều kết nối tới một Server.

* ***Hybird Client***: là loại Client kết hợp từ Thick và Thin Client. Ví dụ ở đây là game online, việc hiện thị hình ảnh, âm thanh của trò chơi được máy tính của Client xử lý, nhưng các thao tác như bắn súng, mua hàng, di chuyển đều kết nối tới Server.

## Server là gì?

Server (Máy chủ) là một hệ thống hoặc một chương trình máy tính đóng vai trò là nhà cung cấp dữ liệu. Nó có thể cung cấp dữ liệu thông qua mạng LAN (Mạng cục bộ) hoặc WAN (Mạng diện rộng) bằng cách sử dụng [internet](./Internet.md). Các chức năng được cung cấp bởi máy chủ được gọi là dịch vụ (services). Các dịch vụ này được cung cấp để đáp ứng yêu cầu của khách hàng.

Một số Server phổ biến:

* ***Database Server (Máy chủ cơ sở dữ liệu)***: được sử dụng để duy trì và chia sẻ cơ sở dữ liệu qua mạng (ví dụ: ...).

* ***Application Server (Máy chủ ứng dụng)***: được sử dụng để lưu trữ các ứng dụng bên trong trình duyệt web cho phép sử dụng chúng mà không cần cài đặt về máy (ví dụ: office 365 online...).

* ***Mail Server***: được sử dụng để liên lạc qua email (ví dụ: Google Email...).

* ***Web Server (Máy chủ Web)***: được sử dụng để lưu trữ các trang web vì có thể có web trên toàn thế giới.

* ***Gamming Server (Máy chủ chơi game)***: được sử dụng để chơi các trò chơi nhiều người chơi.

* ***File Server (Máy chủ tệp)***: được sử dụng để chia sẻ tệp và thư mục qua mạng.

Client và Server không nhất thiết phải ở cùng một vị trí. Chúng có thể được đặt ở các vị trí khác nhau hoặc có thể nằm dưới dạng các quy trình khác nhau trên cùng một máy tính. Chúng được kết nối qua Web và tương tác qua giao thức [HTTP](./HTTP.md). Một Server có thể nhận nhiều yêu cầu (request) từ Client, và ngược lại, một Client có thể yêu cầu đến nhiều Server.

# Cách kiến trúc Client Server hoạt động

![How Client Server work](./img/Server.png)

Như thể hiện trong sơ đồ, một Server có thể phục vụ các yêu cầu của nhiều Client (có thể lên đến hàng triệu, hàng tỷ yêu cầu). Tương tự, một Client có thể yêu cầu dữ liệu từ nhiều Server khác nhau. Hãy xem xét một ví dụ về Google. Ở đây, Google đóng vai trò là Server và những người dùng (có thể chính là bạn) ở các vị trí khác nhau trên thế giới đóng vai trò là một Client.

Vậy nó hoạt động thế nào? Hãy xem phầm bên dưới:

* Giao thức [HTTP](./HTTP.md) (sẽ nói chi tiết sau bài này) giúp thiết lập kết nối giữa Client và Server.

* Client gửi yêu cầu dưới dạng [XML](https://topdev.vn/blog/xml-la-gi/) hoặc [JSON](https://topdev.vn/blog/json-la-gi/) qua kết nối đang hoạt động. Client và Server đều hiểu được yêu cầu này.

* Khi nhận được yêu cầu của Client, Server sẽ tìm kiếm dữ liệu được yêu cầu và gửi lại các chi tiết liên quan dưới dạng phản hồi (response) ở cùng định dạng mà yêu cầu đã được nhận (hiểu nôm na là Client yêu cầu gì Server sẽ phản hồi lại cái đó, ví dụ: Client yêu cầu đăng nhập, Server sẽ chuyển đến trang đăng nhập và hiển thị giao diện đăng nhập cho Client).

![HTTP request](./img/HTTP-Request.png)

Sơ đồ trên cho thấy quá trình giao tiếp giữa máy khách và máy chủ. Máy khách gửi một yêu cầu HTTP, máy chủ sẽ gửi một phản hồi HTTP. Chúng ta hãy xem xét một ví dụ để hiểu thêm về nó.

Giả sử rằng bạn cần đi mua sắm từ nhà đến một cửa hàng bên kia đường. Bạn có thể đi bằng xe đạp và khi tiếp cận có thể đặt hàng cho nhân viên bán hàng mà bạn cần. Bây giờ nếu nhân viên bán hàng tìm thấy hàng hóa, anh ta sẽ mang chúng đến cho bạn nếu không, anh ta sẽ cho bạn biết về tình trạng không có hàng của chúng.

Bây giờ, bạn có thể liên kết ví dụ trên với điều hướng đến một trang web, con đường giữa nhà bạn và cửa hàng là kết nối internet. Phương thức vận chuyển mà bạn đã chọn để di chuyển là TCP / IP, xác định giao thức truyền thông để dữ liệu di chuyển qua internet. Địa chỉ của shop là DNS (Domain Name Server) của website. Ngôn ngữ giao tiếp của bạn với người bán hàng là HTTP (Giao thức truyền siêu văn bản) xác định ngôn ngữ tương tác giữa máy khách và máy chủ. Yêu cầu đặt hàng của bạn là yêu cầu HTTP và cập nhật về tính sẵn có của mặt hàng là phản hồi HTTP.

Khi trình duyệt web gửi một yêu cầu đến máy chủ với DNS của trang web và máy chủ chấp thuận yêu cầu của khách hàng, nó sẽ gửi một thông báo thành công 200 OK. Thông báo này có nghĩa là máy chủ đã định vị trang web và nó sẽ gửi lại các tệp trang web dưới dạng phần nhỏ dữ liệu cho trình duyệt. Sau đó, trình duyệt sẽ thu thập và lắp ráp các phần nhỏ này lại để tạo thành trang web hoàn chỉnh và hiển thị cho chúng tôi.

# Các loại kiến trúc Client Server

Kiến trúc Client-Server có bốn kiểu sau:

* Kiến trúc 1 tầng (1-tier).

* Kiến trúc 2 tầng (2-tier).

* Kiến trúc 3 tầng (3-tier).

* Kiến trúc N tầng (N-tier).

### Kiến trúc 1 tầng

Trong kiến ​​trúc 1 tầng, logic nghiệp vụ, logic dữ liệu và giao diện người dùng đều nằm trên cùng một máy. Môi trường đơn giản và rẻ vì máy khách và máy chủ nằm trên cùng một hệ thống, nhưng sự khác biệt về dữ liệu dẫn đến việc lặp lại công việc. Các hệ thống như vậy lưu trữ dữ liệu trong một tệp cục bộ hoặc một trình điều khiển được chia sẻ. Ví dụ về các ứng dụng 1 tầng là trình phát MP3 hoặc tệp MS Office.

### Kiến trúc 2 tầng

Kiến trúc 2 tầng cung cấp môi trường tốt nhất về mặt hiệu suất do không có bất kỳ máy chủ can thiệp nào. Giao diện người dùng nằm ở phía máy khách trong khi cơ sở dữ liệu ở phía máy chủ. Cơ sở dữ liệu và logic nghiệp vụ có thể được lưu trữ ở máy khách hoặc máy chủ, nhưng chúng phải không thay đổi.

### Kiến trúc 3 tầng

Kiến trúc 3 tầng liên quan đến một phần mềm trung gian được sử dụng để tương tác giữa máy khách và máy chủ. Mặc dù nó đắt tiền nhưng rất dễ sử dụng. Phần mềm trung gian cải thiện hiệu suất và tính linh hoạt. Nó lưu trữ business và data logic. 

<!-- Ba lớp trong kiến ​​trúc 3 tầng là:

* Presentation Layer (Client tier)
* Application Layer (Business tier)
* Database Layer (Data tier) -->

Hầu hết tất cả các ứng dụng web đều là ví dụ về kiến ​​trúc 3 tầng.

## Kiến trúc N tầng

Kiến trúc n-tier là dạng thu nhỏ của kiến ​​trúc 3 tầng. Trong môi trường như vậy, chức năng xử lý, quản lý dữ liệu và trình bày được tách biệt trong các lớp khác nhau. Sự cách ly giúp hệ thống dễ dàng quản lý và bảo trì. Đây cũng được gọi là kiến ​​trúc nhiều tầng.

> Không biết phải đi đâu? Tiếp tục với [HTTP](./HTTP.md)