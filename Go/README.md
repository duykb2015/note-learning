## Điểm mạnh:
	1. Go giúp xây dựng phần mềm đơn giản, có nhiều thư viện, bảo mật cao.
  
	2. Hỗ trợ đa nền tảng: vì khi biên dịch, nó sẽ biên dịch ra mã máy (Machine code: loại ngôn ngữ thường được dùng để tạo ra các chương trình, giúp máy tính có thể hiểu và ngay lập tức thực thi lệnh theo yêu cầu mà không cần thông qua các trình hỗ trợ biên dịch) nên nó có thể chạy ngay với hệ điều hành đang sử dụng mà không cần cài đặt gì thêm.

	3. Sử dụng đa core: giúp tăng hiệu năng xử lý.
	 
	4 Concurrency (Xử lý đồng thời) là một nhiệm vụ lớn được chia thành các nhiệm vụ con nhỏ hơn và chạy cùng một lúc. Gồm:

		4.1 Goroutine: là một hàm không cần chờ các hàm khác chạy xong, mà chạy đồng thời cùng với các hàm khác (song song).

		4.2 Channel: là tính năng giúp goroutine trao đổi dữ liệu với nhau. Tuy nhiên, khi một goroutine truyền dữ liệu vào một channel, goroutine đó sẽ dừng chương trình lại cho đến khi có một goroutine khác lấy dữ liệu từ channel đó ra. Nếu không, goroutine đó sẽ đi vào trạng thái chờ.

		4.3 Buffered Channel: là các channel giới hạn dữ liệu vào, giúp goroutine gửi một số lượng dữ liệu nhất định vào channel mà không cần phải chờ cho tới khi các goroutine khác lấy dữ liệu ra.

		4.4 Select: Tương tự như switch

		4.5 Sync.Mutex: Khi một chương trình chạy concurrently, sẽ có những đoạn code dùng chung một tài nguyên. Nhưng những tài nguyên đó không thể cùng một lúc được truy cập đến bởi nhiều người, vì nó sẽ gây ra xung đột. Đoạn code như vậy được gọi là critical section. 
		Mutex viết tắt của Mutual Exclusion. Có nghĩa là loại trừ lẫn nhau. Nó giúp quản lí các tài nguyên dùng chung trong cùng một thời điểm chỉ có một concurrentcy sử dụng, sau khi sử dụng xong mới đưa tiếp cho concurency khác, tránh việc xung đột xảy ra.

	Khi dùng concurrentcy, nên có một khoảng nghỉ để các goroutine có đủ thời gian để hoàn thành trước khi chương trình kết thúc.