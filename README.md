![haydeAd1](https://user-images.githubusercontent.com/43846778/123560827-66445380-d7ad-11eb-99a7-0db99f505bc3.jpg)

# HAYDE Sosyal Medya Projesi

Projenin kullanım kılavuzu ve genel teknik rapor proje ana dizininde kendi isimleriyle yer almaktadir.


## Bilgisayarınızda Çalıştırmak İçin

Projenin çalışabilmesi için bilgisayarınızda PHP, Laravel, MySql, Composer ve Npm kurulu olmalıdır.

**PHP kurulumu için:** `https://www.php.net/manual/tr/install.php`

**Laravel kurulumu için:** `https://laravel.com/docs/8.x/installation`

**MySql kurulumu için:** `https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/`

**MySql kurulumu için:** `https://getcomposer.org/download/`

**Composer kurulumu için:** `https://getcomposer.org/download/`

**Npm kurulumu için:** `https://www.npmjs.com/get-npm`

Gerekli Kurulumların ardından:

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

Sosyal medya uygulamasına kayıt olabilmeniz için `btu.edu.tr` uzantılı bir mail adresine sahip olmalısınız. Kayıt işleminizi gerçekleştirdiğinizde mail adresinize bir onay maili düşecektir. Onaylama mailindeki linke tıkladığınızda kayıt işleminiz onaylanacak ve giriş ekranına yönlendirileceksiniz. Proje local olarak çalıştığı için mail adresinizdeki linke projeyi çalıştırdığınız işletim sisteminden tıklamanız gerekmektedir.
