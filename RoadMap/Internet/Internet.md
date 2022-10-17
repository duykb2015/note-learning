# Internet

## Internet là gì?

Internet là một hệ thống thông tin toàn cầu có thể được truy nhập công cộng gồm các mạng máy tính được liên kết với nhau. Hệ thống này truyền thông tin theo kiểu nối chuyển gói dữ liệu ([packet switching](https://vi.wikipedia.org/wiki/Chuy%E1%BB%83n_m%E1%BA%A1ch_g%C3%B3i)) dựa trên một giao thức liên mạng đã được chuẩn hóa ([giao thức IP](https://vi.wikipedia.org/wiki/Internet_Protocol)). Hệ thống này bao gồm hàng ngàn mạng máy tính nhỏ hơn của các doanh nghiệp, của các viện nghiên cứu và các trường đại học, của người dùng cá nhân và các chính phủ trên toàn cầu.

- *Package Switching (Chuyển mạch gói)*: là một loại kĩ thuật gửi dữ liệu từ máy tính nguồn tới nơi nhận hay còn gọi là máy tính đích.

- *IP (Internet Protocol: giao thức internet)*: là một giao thức hướng dữ liệu được sử dụng bởi các máy chủ nguồn và đích để truyền dữ liệu trong một liên mạng chuyển mạch gói. 

## Internet hoạt động như thế nào?

- *Trước tiên, địa chỉ mạng (internet address)*: 

    Vì Internet là một mạng toàn cầu gồm các máy tính nên mỗi máy tính kết nối với Internet phải có một địa chỉ duy nhất. Địa chỉ Internet có dạng nnn.nnn.nnn.nnn trong đó nnn phải là một số từ 0 - 255 (Ví dụ: 192.168.0.1). Địa chỉ này được gọi là địa chỉ IP (IP address). 

    Nếu truy cập Internet thông qua Nhà cung cấp dịch vụ Internet ([ISP](https://vi.wikipedia.org/wiki/Nh%C3%A0_cung_c%E1%BA%A5p_d%E1%BB%8Bch_v%E1%BB%A5_Internet), ở đây là dùng wifi, cap mạng hay sim đăng ký mạng), bạn sẽ được cấp một địa chỉ IP, và nó sẽ được gán dài hạn trong suốt thời gian truy cập internet cho đến khi bạn dừng kết nối. Nếu truy cập Internet từ mạng cục bộ ([LAN - Local Area Network](https://vi.wikipedia.org/wiki/M%E1%BA%A1ng_c%E1%BB%A5c_b%E1%BB%99), một hệ thống mạng dùng trong phạm vi nhỏ, ví dụ: trường học, công ty ...), máy tính của bạn sẽ có địa chỉ IP cố định hoặc được cấp một địa chỉ IP tạm thời tự động từ máy chủ [DHCP](https://vi.wikipedia.org/wiki/DHCP) (một loại giao thức tự động cấp địa chỉ IP, giúp cho việc cấp địa chỉ IP nhanh chóng hơn). Khi kết nối tới internet, địa chỉ IP của bạn là DUY NHẤT, không có một máy tính thứ hai cùng truy cập trên internet có địa chỉ IP giống bạn.

- *Stacks và Packets (tầng và gói tin)*: 

    Nhờ vào địa chỉ IP ta có thế kết nối đến internet, nhưng để các máy tính giao tiếp được với nhau, ta cần một phương thức, ở đây là giao thức [TCP/IP](https://vi.wikipedia.org/wiki/TCP/IP) (TCP viết tắt của Transmission Control Protocol). Giao thức này giúp cho các máy tính có thể hiểu và phản hồi lại các yêu cầu từ những máy tính khác nhờ phân ra các tầng xử lý bằng ngăn xếp (___stacks___) (để hiểu kỹ càng và chi tiết hơn về các tầng, xem mô hình [OSI](https://vi.wikipedia.org/wiki/M%C3%B4_h%C3%ACnh_OSI), một thiết kế dựa vào nguyên lý tầng cấp, lý giải một cách trừu tượng kỹ thuật kết nối truyền thông giữa các máy tính và thiết kế giao thức mạng giữa chúng).

    Giao thức TCP sẽ phân giải dữ liệu (hình ảnh, văn bản, tập tin...) từ máy tính nguồn thành các gói tin (___packets___) nhỏ để có thể quản lý được, sau đó các gói tin này sẽ được đánh số thứ tự và gửi đến máy đích, trong qua trình gửi nếu xảy ra lỗi hoặc gói tin bị mất, tuỳ vào trường hợp máy đích sẽ gửi phản hồi lại để máy nguồn gửi lại gói tin đó, giúp việc giao tiếp giữa hay máy được liền mạch. Sau khi gửi toàn bộ dữ liệu, máy đích sẽ được ghép lại thành dữ liệu hoàn chỉnh như ban đầu.

- *Định tuyến Internet (Internet Routing):*

    Máy tính có thể kết nối đến internet, trao đổi với máy tính khác, vậy làm thế nào để các gói tin tìm đường qua Internet? Mỗi máy tính kết nối đến Internet có biết các máy tính khác đang ở đâu không? Các gói tin có đơn giản là được gửi tới mọi máy tính trên Internet không? Câu trả lời là KHÔNG. Một máy tính không thể biết một máy tính khác đang ở đâu và các gói tin khi gửi sẽ không được gửi đến mọi máy tính. Để làm được điều này các máy tính phải thông qua một thứ gọi là bộ định tuyến (router).

    Khi một gói tin đi đến một bộ định tuyến, bộ định tuyến sẽ kiểm tra địa chỉ IP được đính kèm trong gói tin được gửi máy tính gốc (IP được đính kèm theo gói tin nhờ giao tức TCP). Bộ định tuyến sẽ kiểm tra bảng định tuyến của nó, nếu địa chỉ IP có tồn tại trên internet, gói tin sẽ được gửi đến đó. Ngược lại nếu không tìm thấy, thì bộ định tuyến sẽ gửi gói tin trên một tuyến đường mặc định gọi là [Default Gateway](https://vi.wikipedia.org/wiki/C%E1%BB%95ng_m%E1%BA%B7c_%C4%91%E1%BB%8Bnh) (một nút bên trong mạng máy tính trong đó giao thức TCP/IP được sử dụng như một máy chủ chuyển tiếp (bộ định tuyến) đến những mạng khác khi không có thông số kỹ thuật định tuyến nào khác khớp với địa chỉ IP đích của gói tin), thông qua các bộ định tuyến khác đi tới một nơi gọi là NSP Backbone (hiểu đơn giản đây là đầu não của các bộ định tuyến, nơi đây chứa toàn bộ các tuyến đường tới những bộ định tuyến khác (?!?)), sau đó từ NSP gói tin sẽ tiếp tục đi xuống các bộ định tuyến nhỏ hơn để tìm địa chỉ IP đích. Nếu vẫn không tìm thấy, gói tin sẽ bị drop (huỷ bỏ), một lỗi sẽ được trả về cho máy tính đã gửi gói tin

    ....

    > Không biết phải đi đâu? Tiếp tục với [HTTP](./HTTP.md)