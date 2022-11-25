# **Hệ điều hành**

## **Nội dung**

## **Hệ điều hành là gì?**

Hệ điều hành (OS) là giao diện (interface) giữa người dùng và phần cứng máy tính. Hệ điều hành là một phần mềm thực hiện tất cả các tác vụ cơ bản như quản lý tệp, quản lý bộ nhớ, quản lý quy trình, xử lý input - output, điều khiển các thiết bị ngoại vi như ổ đĩa và máy in.

Hệ điều hành là phần mềm cho phép các ứng dụng tương tác với phần cứng của máy tính. Phần mềm có chứa các thành phần cốt lõi của hệ điều hành được gọi là **Kernel**.

> **Kernel** là một chương trình máy tính điều khiển mọi thứ khác, nó là hạt nhân - trái tim của hệ điều hành! Bất cứ điều gì xảy ra trên máy tính đều đi qua nó. Đó là chương trình cốt lõi trong hệ điều hành, cũng là chương trình đầu tiên tải sau bộ nạp khởi động. Sau đó, nó thực hiện tất cả các cuộc nói chuyện giữa phần cứng và phần mềm hoặc ứng dụng. Vì vậy, nếu bạn khởi chạy một chương trình, giao diện người dùng sẽ gửi yêu cầu tới Kernel. Kernel sau đó gửi yêu cầu tới CPU, Bộ nhớ để gán sức mạnh xử lý, bộ nhớ và những thứ khác để ứng dụng có thể chạy trơn tru ở giao diện người dùng.

Mục đích chính của Hệ điều hành là cho phép các ứng dụng (software) tương tác với phần cứng của máy tính, quản lý tài nguyên phần cứng và phần mềm của hệ thống.

Một số Hệ điều hành phổ biến hiện nay bao gồm: Linux,Windows, VMS, OS/400, AIX, z/OS, v.v. Ngày nay, Hệ điều hành được tìm thấy hầu hết trong mọi thiết bị như điện thoại di động, máy tính cá nhân, máy tính lớn, ô tô, TV , Đồ chơi ...

## **Cấu trúc của hệ điều hành**
![Cấu trúc hdh](img/conceptual_view.jpg)

## **Các chức năng quan trọng của hệ điều hành**

### **Memory Management**

**Quản lý bộ nhớ** đề cập đến việc quản lý **Primary Memory** hoặc **Main Memory**. **Bộ nhớ chính** là một mảng lớn các *word* hoặc *byte* trong đó mỗi *word* hoặc *byte* có địa chỉ riêng của nó.

**Bộ nhớ chính** cung cấp khả năng lưu trữ nhanh chóng có thể được CPU truy cập trực tiếp. Để một chương trình được thực thi, chương trình đó phải nằm trong bộ nhớ chính. 

Hệ điều hành thực hiện các hoạt động sau để quản lý bộ nhớ:

- Lưu giữ các dấu vết của bộ nhớ chính, tức là phần nào của nó được ai sử dụng, phần nào không được sử dụng.

- Trong multiprogramming, hệ điều hành quyết định tiến trình nào sẽ lấy bộ nhớ khi nào và bao nhiêu.

- Cấp phát bộ nhớ khi một tiến trình yêu cầu.

- Thu hồi bộ nhớ khi một tiến trình không còn cần sử dụng hoặc đã kết thúc.


### **Processor Management**

**Quản lý bộ xử lý**: trong môi trường đa chương trình (multiprogramming), hệ điều hành quyết định tiến trình nào lấy bộ xử lý khi nào và trong bao lâu. Chức năng này được gọi là **lập lịch trình process scheduling**. 

Hệ điều hành thực hiện các hoạt động sau để quản lý bộ xử lý:

- Theo dõi bộ xử lý và trạng thái của quá trình. Chương trình chịu trách nhiệm cho nhiệm vụ này được gọi là **bộ điều khiển giao thông - traffic controller**.

- Phân bổ bộ xử lý (CPU) cho một quá trình.

- Bỏ phân bổ bộ xử lý khi một quy trình không còn được yêu cầu.

### **Device Management**

**Quản lý thiết bị**: hệ điều hành quản lý giao tiếp thiết bị thông qua trình điều khiển tương ứng của chúng. Nó thực hiện các hoạt động sau để quản lý thiết bị -

- Theo dõi tất cả các thiết bị. Chương trình chịu trách nhiệm cho nhiệm vụ này được gọi là bộ điều khiển I / O.

- Quyết định quá trình lấy thiết bị khi nào và trong bao lâu.

- Phân bổ thiết bị một cách hiệu quả.

- Thu hồi phân bổ thiết bị.

### **File Management**

**Quản lý tệp**: hệ thống tệp thường được tổ chức thành các thư mục để dễ dàng điều hướng và sử dụng. Các thư mục này có thể chứa các tệp và các chỉ dẫn khác.

Hệ điều hành thực hiện các hoạt động sau để quản lý tệp:

- Theo dõi thông tin, vị trí, mục đích sử dụng, trạng thái... Các cơ sở tập thể thường được gọi là **hệ thống file - file system**.

- Quyết định ai nhận được tài nguyên.

- Phân bổ các resources.

- Thu hồi phân bổ các resources.

### **Other Important Activities**

**Các hoạt động quan trọng khác**.

Sau đây là một số hoạt động quan trọng mà Hệ điều hành thực hiện:

- **Bảo mật** - Bằng mật khẩu và các kỹ thuật tương tự khác, nó ngăn chặn truy cập trái phép vào các chương trình và dữ liệu.

- **Kiểm soát hiệu suất hệ thống** - Ghi lại sự chậm trễ giữa yêu cầu dịch vụ và phản hồi từ hệ thống.

- **Job accounting** - Theo dõi thời gian và nguồn lực được sử dụng bởi các công việc và người dùng khác nhau.

- **Hỗ trợ phát hiện lỗi** - Production of dumps, traces, error messages, các công cụ hỗ trợ gỡ lỗi và phát hiện lỗi khác.

- **Phối hợp giữa phần mềm khác và người dùng** - Điều phối và phân công trình biên dịch, thông dịch, lắp ráp và các phần mềm khác cho những người dùng khác nhau của hệ thống máy tính.

## **Cách hệ điều hành hoạt động**

CPU máy tính biết cách thực hiện lệnh. Nhưng nó cần ai đó cho nó biết lệnh nào để thực thi. Đó là công việc của Hệ điều hành (OS). Bất cứ khi nào bạn khởi động máy tính của mình, nó sẽ đọc các byte đầu tiên trên Ổ đĩa của bạn, nơi nó mong đợi thấy các lệnh để khởi động hệ điều hành.

## **Memory Management**

> [On update ...](https://www.geeksforgeeks.org/memory-management-in-operating-system/)
Như đã nêu ở trên sơ qua ở trên, giờ chúng ta sẽ đi sâu hơn nữa.

Vậy bộ nhớ chính là gì?

Bộ nhớ chính là trung tâm hoạt động của một máy tính hiện đại. Bộ nhớ chính là một mảng lớn các từ hoặc byte, có kích thước từ hàng trăm nghìn đến hàng tỷ. Bộ nhớ chính là kho lưu trữ thông tin có sẵn nhanh chóng được chia sẻ bởi CPU và các thiết bị I/O. Bộ nhớ chính là nơi lưu giữ các chương trình và thông tin khi bộ xử lý sử dụng chúng một cách hiệu quả. Bộ nhớ chính được liên kết với bộ xử lý, vì vậy việc di chuyển các hướng dẫn và thông tin vào và ra khỏi bộ xử lý là cực kỳ nhanh chóng. Bộ nhớ chính còn được gọi là RAM (Bộ nhớ truy cập ngẫu nhiên). Bộ nhớ này là bộ nhớ dễ bay hơi.RAM bị mất dữ liệu khi xảy ra sự cố mất điện.

### **Process Management**

> [Xem chi tiết](ProcessManagement.md)

### **Interprocess Communication**

> [On update ...](https://www.geeksforgeeks.org/inter-process-communication-ipc/)

### **Threads and Concurrency**

> [On update ... Thread](https://www.backblaze.com/blog/whats-the-diff-programs-processes-and-threads/)

> [On update ... Concurrency](https://www.javatpoint.com/concurrency-in-operating-system)

### *I/O Management**

> [On update ...](https://www.tutorialspoint.com/operating_system/os_io_hardware.htm)

