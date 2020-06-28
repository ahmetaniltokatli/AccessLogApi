Log yapısını daily olarak ayarladığım için her request, request action, ip ve date olarak storage/log altına loglanıyor. Tabii loglama için ayrı yapılar da düşünülebilirdi. İşler daha da büyüdüğü zaman MongoDB veya ElasticSearch kullanılabilirdi. Ama ben burada ufak bir yapı olduğu için storage da tuttum. Bunun için bir middleware yazıldı. Her istekte önce burası çalışıyor ve logu yazıyor, sonra işlemine devam ediyor.Redis örneği için de basit bir metod yazdım. Metod sadece user metodunu çalıştırdığınız zaman Redis'e user'ın name ve mail bilgisini yazıyor. GetUserRedis metodu ise redisten bu bilgileri okuyup json olarak dönüyor.

Projeyi klonladıktan sonra aşağıdaki adımları uygulayarak projeyi lokalinizde ayağı kaldırabilirsiniz. 

-Proje dizinine gidilir.

-composer install => kütüphaneleri yükler.

-.env.example dosyasını koplayıp .env diye bir dosya yaratılır.

-.env dosyasında, kullandığınız database konfigürasyonları yapılır.

-php artisan key:generate => yeni bir app key oluşturulur.

-php artisan migrate => User ve token bilgilerini içeren tablolar oluşturulur.

-php artisan passport:install => Token yapısı için kullanıdığımız passport'un şifreleme anahtarlarını içeren personal access and password grant datalarını oluşturur.

-php artisan serve => Artisan komutu ile serve edebilirsiniz.

Tüm isteklerde Header da Accept: application/json gönderilmeli.

Postman üzerinden signup:

http://127.0.0.1:8000/api/auth/signup => POST
Parametreler:
email
password
password_confirmation
name 

Postman üzerinden login:

http://127.0.0.1:8000/api/auth/login => POST
Parametreler:
email
password
Dönen token'ı alıp bir sonraki istektek Bearer token olarak kullanılacak.

Postman üzerinden user bilgisi:
http://127.0.0.1:8000/api/auth/user => GET
Header'a Authorization: Bearer "token" eklenmeli. Bu metod şu an ki user bilgilerini döner.

Postman üzerinden redis kullanılarak user'ın name ve email bilgilerinin alınması.(Redis örneği)
http://127.0.0.1:8000/api/auth/getUserRedis => GET
Header'a Authorization: Bearer "token" eklenmeli. Bu metod redis te ki user name ve email bilgisini döner.
