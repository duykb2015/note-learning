# **Giới thiệu về Memory Management**

> [On update ...](https://www.geeksforgeeks.org/memory-management-in-operating-system/)

<https://dev.to/deepu105/demystifying-memory-management-in-modern-programming-languages-ddd>

<https://deepu.tech/memory-management-in-golang/>

Như đã nêu ở trên sơ qua trong phần hệ điều hành, giờ chúng ta sẽ đi sâu hơn nữa.

Quản lý bộ nhớ là quá trình kiểm soát và điều phối cách ứng dụng chương trình truy cập bộ nhớ máy tính.

Khi một chương trình chạy trên hệ điều hành của một máy tính, nó cần truy cập tới RAM của máy tính để:

* Tải các đoạn mã khởi động của chính chương trình đó.

* Lưu trữ các giá trị dữ liệu và cấu trúc dữ liệu được sử dụng bởi chương trình.

* Tải bất kỳ hệ thống run-time nào được yêu cầu để chương trình thực thi.

> ***RAM (Random Access Memory):*** là bộ nhớ tạm của máy tính giúp lưu trữ thông tin hiện hành để CPU có thể truy xuất và xử lý. </br>
>RAM không thể lưu trữ được dữ liệu khi mất nguồn điện cung cấp. Nếu như thiết bị bị mất nguồn, tắt máy thì dữ liệu trên RAM sẽ bị xóa. </br>
> ***Run-time system:*** Hệ thống thời gian chạy hoặc môi trường thời gian chạy là một hệ thống con tồn tại cả trong máy tính nơi chương trình được tạo ra, cũng như trong máy tính nơi chương trình dự định chạy.

Khi một chương trình sử dụng bộ nhớ, có hai vùng bộ nhớ mà chúng sử dụng, bộ nhớ Stack và Heap.

## **Stack**

**Stack** hay *ngăn xếp* được sử dụng để cấp phát bộ nhớ tĩnh (dữ liệu được lưu trữ trong bộ nhớ này sẽ tồn tại tới khi chương trình kết thúc) và đúng như tên gọi, nó là ngăn xếp vào sau ra trước (***LIFO***: last in first out)

* Do tính chất này, quá trình lưu trữ và lấy dữ liệu từ ngăn xếp diễn ra rất nhanh vì không cần tra cứu mà chỉ cần lưu trữ và lấy dữ liệu từ khối trên cùng của nó.

* Nhưng điều này có nghĩa là bất kỳ dữ liệu nào được lưu trữ trên ngăn xếp phải là hữu hạn và static (Kích thước của dữ liệu được biết tại thời điểm biên dịch).

* Đây là nơi lưu trữ dữ liệu thực thi của các chức năng dưới dạng khung ngăn xếp. Mỗi khung là một khối không gian lưu trữ dữ liệu cần thiết cho chức năng đó. Ví dụ: mỗi khi một hàm khai báo một biến mới, nó sẽ được "đẩy" lên khối trên cùng trong ngăn xếp. Sau đó, mỗi khi một hàm thoát, khối trên cùng sẽ bị xóa, do đó, tất cả các biến được hàm đó đẩy lên ngăn xếp sẽ bị xóa. Chúng có thể được xác định tại thời điểm biên dịch do tính chất tĩnh của dữ liệu được lưu trữ ở đây.
