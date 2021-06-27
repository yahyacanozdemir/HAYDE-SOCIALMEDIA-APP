# HAYDE Sosyal Medya Projesi

![haydeAd1](https://user-images.githubusercontent.com/43846778/123560827-66445380-d7ad-11eb-99a7-0db99f505bc3.jpg)

Bu proje Bursa Teknik Üniversitesi 2020-2021 dönemi bahar yarıyılı içerisinde, Web Uygulama Tasarımı ve Yazılım Mühendisliği dersleri ortak projesi olarak
* [Yahya Can Özdemir](https://www.linkedin.com/in/yahyacanozdemir/)
* [Erdoğan Turpcu](https://github.com/erdogantrpc)
* [Dilara Kanalici](https://github.com/dilarakanalici)
* [Hatice Çelik](https://github.com/haticelik)
tarafından geliştirilmiştir. 
            
Hayde, Bursa Teknik Üniversitesi öğrencilerine özel bir sosyal medya sitesi olarak geliştirilmekle beraber, bir sosyal medya sitesinden beklenen neredeyse her şeyi yerine getirebilmektedir. Proje, domain & hosting ücretlerinden kaçınmak ve üniversite adına temel bir gereksinim olmadığı için canlıya taşınmamıştır.
   
Projede yazılan kod alanının esnekliği (adaptability) ile MVC katmanlı mimarisi sayesinde Hayde, her üniversite mailiyle kullanıma, yeni güncellemelere ve tüm üniversitelerin özeline göre yeniden uyarlanabilir.

## Kurulumlar

Projenin çalışabilmesi için bilgisayarınızda PHP, Laravel, MySql, Composer ve Npm kurulu olmalıdır.

**PHP kurulumu için:** `https://www.php.net/manual/tr/install.php`

**Laravel kurulumu için:** `https://laravel.com/docs/8.x/installation`

**MySql kurulumu için:** `https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/`

**MySql kurulumu için:** `https://getcomposer.org/download/`

**Composer kurulumu için:** `https://getcomposer.org/download/`

**Npm kurulumu için:** `https://www.npmjs.com/get-npm`
##

## Projeyi Çalıştırmak

Projeyi klonlayın

```bash
  git clone https://link-to-project
```

Proje dizinine gidin ve gerekli Node modüllerini kurmak için aşağıdaki kodu çalıştırın:

```bash
  npm i
```

Composer paketlerini kurmak için aşağıdaki kodları sırasıyla çalıştırın:

```bash
  composer install
```

```bash
  composer update
```

Veritabanını oluşturmak için öncelikle proje dizinindeki `.env` dosyasının içerisinde `DB_PASSWORD` değişkenine mysql şifrenizi atayın. Ardından `localhost/phpmyadmin` adresine giderek `hayde` isminde bir veritabanı oluşturun. Sonrasında projede geliştirilen veritabanını local olarak kullanabilmek için aşağıdaki kodu çalıştırın

```bash
  php artisan migrate
```

Son olarak projeyi sunucunuzda çalıştırmak için aşağıdaki kodu çalıştırın:

```bash
  php artisan serve
```

Tüm bu adımların ardından proje `127.0.0.1/8080` adresinden ulaşabilirsiniz.


## Dokümanlar 

* [HAYDE TEKNİK RAPOR](https://github.com/yahyacanozdemir/HAYDE-SOCIALMEDIA-APP/files/6722408/HAYDE.TEKNIK.RAPOR.pdf)
* [HAYDE KULLANIM KILAVUZU](https://github.com/yahyacanozdemir/HAYDE-SOCIALMEDIA-APP/files/6722412/HAYDE.KULLANIM.KILAVUZU.pdf)

## Görseller

![Başlıksız-2](https://user-images.githubusercontent.com/43846778/123561704-b5d94e00-d7b2-11eb-9a3e-345a2e150b45.png)
![Başlıksız-3](https://user-images.githubusercontent.com/43846778/123562009-a2c77d80-d7b4-11eb-9d36-b6920c706b40.png)
![Başlıksız-4](https://user-images.githubusercontent.com/43846778/123562013-a8bd5e80-d7b4-11eb-938a-4195fccca915.png)
![Başlıksız-5](https://user-images.githubusercontent.com/43846778/123562246-2897f880-d7b6-11eb-8e0f-27c4ce3d2045.png)


## Not 

Bu repodaki orjinal sosyal medya uygulamasına kayıt olabilmeniz için `btu.edu.tr` uzantılı bir mail adresine sahip olmalısınız. Kayıt işleminizi gerçekleştirdiğinizde mail adresinize bir onay maili düşecektir. Onaylama mailindeki linke tıkladığınızda kayıt işleminiz onaylanacak ve giriş ekranına yönlendirileceksiniz. Proje local olarak çalıştığı için mail adresinizdeki linke projeyi çalıştırdığınız işletim sisteminden tıklamanız gerekmektedir.


