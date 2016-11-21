<?php
/**
 * @author Oğuzhan ÇAKAR
 * @webSite http://www.ogzcakar.net
 * Date: 19.11.2016
 */

require 'arabamClass.php';

$arabamCom  = new arabamCom();

//print_r($arabamCom->categoryList());
//      Tüm Kategorileri Listeler

//print_r($arabamCom->categoryList('Klasik Araçlar'));
//     Klasik Araçlar Kategorisinin Alt Kategori Listeler

//print_r($arabamCom->categoryListContent('Klasik Araçlar' , '' ,2));
    //Klasik Araçlar Kategorisinin 2.sayfasındaki ilanlarını listeler

//print_r($arabamCom->categoryListContent('Klasik Araçlar' , 'Cadillac ' , '2' ));
    //Klasik Araçlar Menüsünün Cadillac Alt Kategorisinin 2.sayfasındaki ilanları listeler

//print_r($arabamCom->detail('http://www.arabam.com/ilan/sahibinden-satilik-mercedes-180/2011-mercedes-c-180-1-8-7-ileri-wurth-seramik-kaplamali/6439322'));
    //Girilen İlan Linkinin detayını listeler



