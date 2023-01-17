# **Index**

## **Các loại index**

    Một trong những vấn đề tốn nhiều thời gian, công sức của lập trình viên đó là việc nâng cao hiệu năng (performance) cho hệ thống. Sẽ không có vấn đề gì nếu hệ thống chỉ có số người dùng và lượng dữ liệu không quá lớn, nhưng ngược lại, nếu hệ thống có sô lượng người dùng và dữ liệu rất lớn, việc tối ưu hoá các query với database sẽ là then chốt để tối ưu hiệu năng (optimize performance) cho hệ thống.

## **Index là gì?**

Index là một cấu trúc dữ liệu giúp xác định nhanh chóng các records trong table.

Hiểu một cách đơn giản thì nếu không có index thì SQL phải scan toàn bộ table để tìm được các records có liên quan. Dữ liệu càng lớn, tốc độ query sẽ càng chậm.
