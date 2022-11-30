# **Đi sâu hơn về INDEX trong Database**

Hiệu suất là điều cực kỳ quan trọng trong nhiều sản phẩm tiêu dùng như: thương mại điện tử, hệ thống thanh toán, trò chơi, ứng dụng giao thông, v.v. Mặc dù cơ sở dữ liệu được tối ưu hóa nội bộ thông qua nhiều cơ chế để đáp ứng các yêu cầu về hiệu suất của chúng trong thế giới hiện đại, nhưng cũng phụ thuộc rất nhiều vào nhà phát triển ứng dụng — xét cho cùng, chỉ nhà phát triển mới biết ứng dụng phải thực hiện những truy vấn nào.

Các nhà phát triển xử lý cơ sở dữ liệu quan hệ (relational databases) đã từng sử dụng hoặc ít nhất là đã nghe nói về lập index và đó là một khái niệm rất phổ biến trong thế giới cơ sở dữ liệu. Tuy nhiên, phần quan trọng nhất là phải hiểu những cái gì cần lập index & làm cách nào để lập index giúp tốc độ truy vấn tăng. Để làm được điều đó, bạn cần phải hiểu cách mà bạn sẽ truy vấn các bảng trong cơ sở dữ liệu của mình. Chỉ có thể tạo một index phù hợp khi bạn biết chính xác bạn phải truy vấn dữ liệu như thế nào và dữ liệu được trả về ra sao.

Theo thuật ngữ đơn giản, một index ánh xạ các khóa tìm kiếm tới dữ liệu tương ứng trên đĩa bằng cách sử dụng các cấu trúc dữ liệu trong bộ nhớ và trên đĩa khác nhau. Index được sử dụng để tăng tốc độ tìm kiếm bằng cách giảm số lượng record để tìm kiếm.

Chủ yếu là một index được tạo trên các cột được chỉ định trong mệnh đề `WHERE` của truy vấn khi cơ sở dữ liệu truy xuất và lọc dữ liệu từ các bảng dựa trên các cột đó. Nếu bạn không tạo index, cơ sở dữ liệu sẽ quét tất cả các hàng, lọc ra các hàng phù hợp và trả về kết quả. Với hàng triệu record, thao tác quét này có thể mất nhiều giây và thời gian phản hồi cao này khiến các API & ứng dụng chậm hơn và không sử dụng được. Hãy xem một ví dụ -

Ở đây sử dụng MySQL với công cụ cơ sở dữ liệu mặc định là InnoDB, mặc dù vậy nhưng các khái niệm được giải thích trong bài viết này ít nhiều giống nhau trong các máy chủ cơ sở dữ liệu khác cũng như Oracle, MSSQL, v.v.

Tạo một bảng có tên `index_demo` với cú pháp sau:

```sql
CREATE TABLE index_demo ( 
    name VARCHAR(20) NOT NULL, 
    age INT, 
    pan_no VARCHAR(20), 
    phone_no VARCHAR(20) 
);
```

Bây giờ Chèn một số dữ liệu ngẫu nhiên vào bảng, bảng của ta có 5 hàng trông giống như sau:

!['...'](img/CRQKjuAqZ5BpQpQFJIMRmnb23VdRb9UUqJfb.png)

Vì chưa tạo bất kỳ index nào trên bảng này nên khi kiểm tra bằng lệnh: `SHOW INDEX`. Nó trả về 0 kết quả.

Bây giờ, nếu chúng ta chạy một truy vấn `SELECT` đơn giản, vì không có index do người dùng xác định, truy vấn sẽ quét toàn bộ bảng để tìm ra kết quả:

```sql
EXPLAIN SELECT * FROM index_demo WHERE name = 'alex';
```

!['...'](img/cTrVkwvORbzU51MvqnKt7sDTHfQznnjKKFsJ.png)

`EXPLAIN` hiển thị cách công cụ truy vấn lập kế hoạch thực hiện truy vấn. Trong ảnh chụp màn hình ở trên, bạn có thể thấy rằng cột `rows` trả về `5` và `possible_keys` trả về `null`. `possible_keys` đại diện cho tất cả các chỉ số có sẵn có thể được sử dụng trong truy vấn này. Cột `key` biểu thị index nào thực sự sẽ được sử dụng trong số tất cả các index có thể có trong truy vấn này.

## **Primary Key**

Truy vấn trên rất kém hiệu quả. Hãy tối ưu hóa truy vấn này. Ta sẽ chuyển cột `phone_no` thành `PRIMARY KEY` với giả định rằng không hai tài khoản có cùng một số điện thoại trong hệ thống của chúng ta. Nhưng trước tiên cần phải lưu ý những điều sau:

- Khóa chính phải là một phần của nhiều truy vấn quan trọng trong ứng dụng của bạn.

- Khóa chính là một ràng buộc xác định mỗi hàng trong một bảng là duy nhất. Nếu nhiều cột là một phần của khóa chính, thì sự kết hợp đó phải là duy nhất cho mỗi hàng.

- Khóa chính phải là Non-null. Một cột có thể chứa giá trị rỗng không thể trờ thành một khóa chính. Theo tiêu chuẩn ANSI SQL, các khóa chính phải tương đương với nhau và bạn chắc chắn có thể biết liệu giá trị của cột khóa chính này lớn hơn, nhỏ hơn hay bằng giá trị của một cột khoá chính khác. Vì `NULL` có nghĩa là một giá trị không xác định (*undefined*) trong các tiêu chuẩn SQL, nên bạn không thể so sánh một cách xác định `NULL` với bất kỳ giá trị nào khác, vì vậy `NULL` về mặt logic là không được phép.

- Loại khóa chính lý tưởng phải là một số như `INT` hoặc `BIGINT` vì so sánh số nguyên nhanh hơn, nên việc duyệt qua index sẽ rất nhanh.

Thông thường, chúng ta xác định trường `id` là `AUTO INCREMENT` trong bảng và sử dụng trường đó làm khóa chính, nhưng việc lựa chọn khóa chính là phụ thuộc vào nhà phát triển.

## **Điều gì sẽ xảy ra nếu bạn không tự tạo bất kỳ khóa chính nào?**

Không bắt buộc phải tự tạo khóa chính. Nếu bạn chưa xác định bất kỳ khóa chính nào, InnoDB sẽ ngầm tạo một khóa cho bạn vì InnoDB theo thiết kế phải có một khóa chính trong mỗi bảng. Vì vậy, sau khi bạn tạo khóa chính cho bảng đó, InnoDB sẽ xóa khóa chính được xác định tự động trước đó.

Vì hiện tại chúng ta không có bất kỳ khóa chính nào được xác định, hãy xem InnoDB theo mặc định sẽ tạo ra những gì cho chúng ta:

```sql
SHOW EXTENDED INDEX FROM index_demo;
```

!['...'](img/49GA8I8PuohOIIAjmWpztDIWgyAwD8LUwVQN.png)

`EXTENDED` hiển thị tất cả các chỉ số mà người dùng không thể sử dụng được, nhưng được hoàn toàn quản lý bởi MySQL.

Ở đây chúng ta thấy rằng MySQL đã xác định một index tổng hợp (chúng ta sẽ thảo luận về các index tổng hợp sau) trên `DB_ROW_ID` , `DB_TRX_ID`, `DB_ROLL_PTR` và tất cả các cột được xác định trong bảng. Trong trường hợp không có khóa chính do người dùng xác định, index này được sử dụng để tìm các bản ghi duy nhất.

## **Sự khác biệt giữa key và index là gì?**

Mặc dù các thuật ngữ `key` và `index` được sử dụng thay thế cho nhau, nhưng `key` có nghĩa là một ràng buộc áp đặt lên hành vi của cột. Trong trường hợp này, ràng buộc là khóa chính không được phép rỗng, là trường dùng để xác định mỗi hàng. Mặt khác, `index` là một cấu trúc dữ liệu đặc biệt giúp tạo điều kiện tìm kiếm dữ liệu trên bảng.

Bây giờ, hãy tạo index chính trên `phone_no` và kiểm tra index đã tạo:

```sql
ALTER TABLE index_demo ADD PRIMARY KEY (phone_no);
SHOW INDEXES FROM index_demo;
```

https://www.freecodecamp.org/news/database-indexing-at-a-glance-bb50809d48bd/