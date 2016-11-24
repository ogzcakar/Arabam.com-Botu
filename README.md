# Arabam.com Botu

PHP ile OOP yapısını kullanarak arabam.com için bir bot sizlere sunuyorum. Kullanmanız ve geliştirmeniz dileğiyle.

Bot Bize :

 - Kategoriler 

 - Herhangi bir kategorinin Alt Kategorileri 

 - Herhangi bir kategorinin içerisinde bulunan ilanlar 

 - Herhangi bir kategorinin herhangi bir alt kategorisinin içerisinde bulunan ilanlar 

 - Kategori veya alt kategoride bulunan ilanların diğer sayfaları
 
 sunuyor.


# Kullanım

index.php içerisinde tüm fonksiyonlar yorum satırı ile belirtilmiştir. Tek yapmanız gereken istediğiniz fonksiyonun yorum satırını kaldırmak.

Örnek Olarak Demoda Çalışan Fonksiyon:

``` php
print_r($arabamCom->detail('http://www.arabam.com/ilan/sahibinden-satilik-mercedes-180/2011-mercedes-c-180-1-8-7-ileri-wurth-seramik-kaplamali/6439322'));
```

veya Klasik Araçlar Menüsünün Cadillac Alt Kategorisinin 2.sayfasındaki ilanları listelemek için

``` php
print_r($arabamCom->categoryListContent('Klasik Araçlar' , 'Cadillac ' , '2' ));
```

# Projenin Anlatımı & Demosu

Anlatım : [Arabam.com Bot Anlatımı](http://www.ogzcakar.net/arabam-com-botu) 

İlan Detay Sayfasının Demosu : [Arabam.com Belirli Bir İlanın Detay Bilgileri](http://www.ogzcakar.net/demo/arabamCom/) 
