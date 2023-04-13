# **Caching**

## **Caching là gì**

**Cache** (hay dịch tiếng Việt là *bộ nhớ đệm*, đọc là `kaSH`) là nơi lưu các tập dữ liệu, thường chỉ có tính chất tạm thời, để giúp cho các yêu cầu (request) trong tương lai đối với dữ liệu những dữ liệu này được cung cấp một cách nhanh nhất có thể. Dữ liệu trong **cache** được lưu trữ trong phần cứng truy cập nhanh như **RAM**.

**Caching** là một kỹ thuật tăng tốc độ truy xuất dữ liệu và giảm tải cho hệ thống một cách hiểu quả bằng cách lưu trữ một bản sao của dữ liệu nào đó trong bộ nhớ trung gian, nhằm giảm thiểu thời gian truy cập dữ liệu từ các nguồn lưu trữ chậm hoặc tốn kém như bộ nhớ chính, đĩa cứng hay mạng. Các dữ liệu được lưu trữ trong bộ nhớ cache sẽ được sử dụng nếu có yêu cầu truy cập dữ liệu tương tự trong tương lai. Vì bộ nhớ cache có thời gian truy cập nhanh hơn so với bộ nhớ chính hay đĩa cứng, việc sử dụng caching giúp tăng tốc độ xử lý và giảm thiểu thời gian chờ đợi của người dùng khi truy cập vào dữ liệu. Caching được sử dụng rộng rãi trong nhiều ứng dụng và hệ thống như trình duyệt web, cơ sở dữ liệu, ứng dụng di động, trò chơi, và các hệ thống tìm kiếm.

## **Caching lưu dữ liệu như thế nào**

> Trong laravel lumen cache được lưu dưới dạng `key -  value`

Cách lưu trữ dữ liệu trong bộ nhớ cache cũng phụ thuộc vào loại caching được sử dụng. Ví dụ, nếu sử dụng caching toàn bộ trang (full-page caching), trang web sẽ được lưu trữ trong bộ nhớ cache. Khi người dùng truy cập trang web đó, trang sẽ được tải từ bộ nhớ cache thay vì phải tải lại từ máy chủ. Trong trường hợp cache truy vấn (query caching), các kết quả của các truy vấn phổ biến sẽ được lưu trữ trong bộ nhớ cache. Khi một truy vấn giống như truy vấn đã được lưu trữ trong bộ nhớ cache, kết quả của truy vấn sẽ được trả về từ bộ nhớ cache thay vì phải truy cập cơ sở dữ liệu.

Các bước hoạt động cơ bản của caching như sau:

* ***Truy xuất dữ liệu:*** Khi một yêu cầu được đưa ra để truy xuất dữ liệu, trình điều khiển của chương trình sẽ tìm kiếm dữ liệu trong cache trước tiên. Nếu dữ liệu có sẵn trong cache, nó sẽ được trả về ngay lập tức. Nếu dữ liệu không có sẵn trong cache, trình điều khiển sẽ truy vấn nơi lưu trữ dữ liệu, chẳng hạn như cơ sở dữ liệu hoặc máy chủ web.

* ***Lưu trữ dữ liệu:*** Sau khi dữ liệu được trả về, trình điều khiển sẽ lưu trữ nó trong cache. Nếu dữ liệu được truy xuất nhiều lần, nó sẽ được lưu trữ trong cache trong thời gian dài, giúp tăng tốc độ truy xuất dữ liệu trong tương lai.

* ***Quản lý cache:*** Các dữ liệu trong cache sẽ được quản lý và cập nhật để đảm bảo rằng chúng luôn được cập nhật và phù hợp với nhu cầu của chương trình. Caching là một cách hiệu quả để tăng tốc độ truy xuất dữ liệu và giảm thời gian phản hồi của các ứng dụng. Tuy nhiên, việc quản lý cache cần phải được thực hiện cẩn thận để đảm bảo tính toàn vẹn của dữ liệu và tránh các lỗi về dữ liệu lỗi thời (stale data).

## **Tại sao lại sử dụng bộ nhớ cache**

Caching được sử dụng để cải thiện hiệu suất của hệ thống bằng cách giảm thiểu thời gian truy cập dữ liệu và tăng tốc độ xử lý của ứng dụng. Các lợi ích của việc sử dụng caching bao gồm:

* ***Tăng tốc độ truy cập dữ liệu:*** Khi dữ liệu đã được lưu trữ trong bộ nhớ cache, thời gian truy cập dữ liệu sẽ nhanh hơn rất nhiều so với việc truy cập dữ liệu từ nguồn gốc của nó. Điều này giúp giảm thiểu thời gian phản hồi và cải thiện hiệu suất của hệ thống.

* ***Tiết kiệm tài nguyên hệ thống:*** Khi dữ liệu được lưu trữ trong bộ nhớ cache, hệ thống sẽ không cần phải truy cập nguồn dữ liệu gốc nhiều lần để truy xuất dữ liệu. Điều này giúp tiết kiệm tài nguyên hệ thống, giảm tải cho cơ sở dữ liệu và tăng khả năng xử lý của máy chủ.

* ***Cải thiện thời gian đáp ứng:*** Khi ứng dụng phải xử lý hàng loạt yêu cầu từ nhiều người dùng, việc sử dụng caching giúp cải thiện thời gian đáp ứng của hệ thống. Dữ liệu đã được lưu trữ trong bộ nhớ cache sẽ được truy xuất và phục vụ ngay lập tức, giúp giảm thiểu thời gian chờ đợi của người dùng.

* ***Giảm chi phí vận hành hệ thống:*** Khi hệ thống hoạt động nhanh hơn, tốn ít tài nguyên hơn và cung cấp trải nghiệm người dùng tốt hơn, chi phí vận hành hệ thống cũng giảm đi. Điều này giúp tăng hiệu quả hoạt động của hệ thống và giảm chi phí cho doanh nghiệp.

> **Tóm lại, sử dụng caching giúp cải thiện hiệu suất của hệ thống, tăng tốc độ xử lý, giảm tải cho cơ sở dữ liệu và giảm chi phí vận hành hệ thống.**

## **Sử dụng caching khi nào**

* **Khi dữ liệu được truy cập thường xuyên:** Nếu dữ liệu được truy cập thường xuyên, việc lưu trữ dữ liệu trong bộ nhớ cache sẽ giúp tăng tốc độ truy cập và giảm thời gian phản hồi của ứng dụng.

* **Khi dữ liệu thay đổi ít:** Nếu dữ liệu ít thay đổi, việc lưu trữ dữ liệu trong bộ nhớ cache sẽ giúp tiết kiệm tài nguyên và giảm tải cho cơ sở dữ liệu.

* **Khi tài nguyên hệ thống có hạn:** Nếu tài nguyên hệ thống có hạn, việc sử dụng caching giúp giảm tải cho hệ thống và tăng tốc độ xử lý của ứng dụng.

* **Khi có nhiều người dùng truy cập đồng thời:** Nếu ứng dụng có nhiều người dùng truy cập đồng thời, việc sử dụng caching giúp cải thiện thời gian đáp ứng của hệ thống và giảm thời gian chờ đợi của người dùng.

* **Khi chi phí cho việc truy cập dữ liệu là đắt đỏ:** Nếu chi phí cho việc truy cập dữ liệu là đắt đỏ, việc sử dụng caching giúp giảm chi phí và tăng hiệu quả của hệ thống.

> Tuy nhiên, cũng cần lưu ý rằng việc sử dụng caching không phải là giải pháp cho mọi trường hợp. Có những trường hợp khi việc sử dụng caching có thể gây ra các vấn đề về đồng bộ hóa dữ liệu hoặc gây ra tình trạng lỗi vì dữ liệu trong cache không còn đúng. Do đó, trước khi sử dụng caching, cần phải đánh giá cẩn thận và đảm bảo rằng việc sử dụng caching sẽ giúp cải thiện hiệu suất của hệ thống một cách an toàn và hiệu quả.

## **Nhược điểm của caching**

Mặc dù việc caching có nhiều lợi ích, nhưng nó cũng có một số nhược điểm như sau:

* **Dữ liệu cũ:** Nếu dữ liệu trong cache không được cập nhật thường xuyên hoặc cache không được xóa định kỳ, người dùng có thể nhận được dữ liệu cũ, không chính xác hoặc không đầy đủ.

* **Chi phí bộ nhớ:** Lưu trữ dữ liệu trong cache đòi hỏi chi phí bộ nhớ và không phải lúc nào cũng có đủ bộ nhớ để lưu trữ tất cả các dữ liệu trong cache.

* **Không phù hợp với dữ liệu động:** Cache là phù hợp với dữ liệu tĩnh nhưng không phù hợp với dữ liệu động. Nếu dữ liệu thay đổi thường xuyên, việc cập nhật cache sẽ trở nên phức tạp và tốn kém.

* **Tốn thời gian và tài nguyên:** Việc đưa dữ liệu vào và lấy dữ liệu ra khỏi cache có thể tốn thời gian và tài nguyên máy tính.

* **Phức tạp khi phân tán:** Khi ứng dụng phân tán trên nhiều máy chủ, việc quản lý và cập nhật cache có thể trở nên phức tạp và đòi hỏi nhiều thời gian và công sức.

Vì vậy, khi sử dụng cache, người lập trình cần cân nhắc kỹ lưỡng giữa lợi ích và nhược điểm của cache và xem xét cách tối ưu hóa việc sử dụng cache để đảm bảo hiệu quả và hiệu suất của ứng dụng.

## **Ứng dụng của caching**

Caching được sử dụng rộng rãi trong nhiều lĩnh vực, bao gồm:

* **Ứng dụng web:** Caching được sử dụng để tăng tốc độ tải trang và giảm thời gian phản hồi của trang web. Các trình duyệt web, máy chủ web và các proxy server thường sử dụng caching để lưu trữ các tài nguyên như HTML, CSS, JavaScript và hình ảnh.

* **Cơ sở dữ liệu:** Caching được sử dụng để cải thiện hiệu suất của các ứng dụng sử dụng cơ sở dữ liệu. Các công nghệ caching như Memcached và Redis được sử dụng để lưu trữ các kết quả truy vấn cơ sở dữ liệu phổ biến để giảm thiểu số lần truy cập cơ sở dữ liệu và tăng tốc độ truy vấn.

* **Ứng dụng di động:** Caching được sử dụng trong các ứng dụng di động để giảm thời gian phản hồi và tiết kiệm băng thông. Các tài nguyên như hình ảnh, âm thanh và video được lưu trữ trong cache để người dùng không phải tải lại các tài nguyên đó mỗi khi truy cập ứng dụng.

* **Hệ thống tìm kiếm:** Caching được sử dụng trong các hệ thống tìm kiếm để lưu trữ các kết quả tìm kiếm phổ biến và giảm thiểu số lần truy vấn tới cơ sở dữ liệu.

* **Hệ thống máy chủ:** Caching được sử dụng trong các hệ thống máy chủ để lưu trữ các tài nguyên phổ biến như tập tin hình ảnh, file tài liệu, các gói phần mềm... để giảm thiểu tải cho ổ đĩa và cải thiện hiệu suất của hệ thống.