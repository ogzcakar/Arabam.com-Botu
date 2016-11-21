<?php
/**
 * @author Oğuzhan ÇAKAR
 * @webSite http://www.ogzcakar.net
 * Class arabamCom
 * Date: 19.11.2016
 */
 
require 'helper/simple_html_dom.php';
require 'helper/permaLink.php';

class arabamCom
{
    static $result = [];

    public function categoryList($subcategory = null)
    {
        if(empty($subcategory))
        {
            $sites = file_get_html('http://www.arabam.com/');
            $find = '.menu-column .mb16 #popularUsedCarUl li a';
        }else
        {
            $sites = file_get_html('http://www.arabam.com/ikinci-el/' . permalink($subcategory));
            $find = '.vertical-half-padder-minus ul li ul li a';
        }

        foreach ($sites->find($find) as $list)
        {
            $name = explode('(' , $list->plaintext);
            $result[] = $name[0];
        }

        return $result;
    }

    public function categoryListContent($category , $subCategory = null , $page = 1 )
    {
        if(empty($subCategory))
        {
            $sites = file_get_html('http://www.arabam.com/ikinci-el/'.permalink($category).'?page='.$page);
        }else
        {
            $sites = file_get_html('http://www.arabam.com/ikinci-el/'.permalink($category).'/'.permalink($subCategory).'?page='.$page);
        }
        foreach ($sites->find('.advert-list-filter-row') as $list)
        {
            @$result[] = [
                'İlanın Resmi' => $list->find('img' , 0)->attr['data-src'],
                'İlanın İsmi' => $list->find('h4[class=dib advert-list-meta-title p8] a span', 0)->plaintext,
                'Açıklama'=> $list->find('h4[class=dib advert-list-meta-title p8] a span', 1)->plaintext,
                'Model'=> $list->find('p[class=dib advert-list-meta-year tac p4] a', 0)->plaintext,
                'Kilometre'=> $list->find('p[class=dib advert-list-meta-kilometers tac p4] a', 0)->plaintext,
                'Renk'=> $list->find('p[class=dib advert-list-meta-color tac p4] a', 0)->plaintext,
                'Tarih'=> $list->find('p[class=dib advert-list-meta-startedAt tac p4 hidden-xs] a', 0)->plaintext,
                'Yer'=> $list->find('p[class=dib advert-list-meta-cityCounty tac p4 hidden-xs] a span', 0)->plaintext,
                'Fiyat'=> $list->find('p[class=dib advert-list-meta-price recalculate-xs tac tar-in-xs p4] a', 0)->plaintext,
                'İlanın Linki' => 'http://www.arabam.com'.$list->find('a[class=fl pr advert-list-with-image]', 0)->href
            ];
        }
        unset($result[0]);
        return array_values($result);
    }

    public function detail($url)
    {
        $sites = file_get_html($url);

        @$information['İlanın Başlığı'] = $sites->find('h1[class=vertically-centered-biggest48]' ,0)->plaintext;
        @$information['İlanın Fiyatı']= $sites->find('h3[class=font-default-plus]' ,0)->plaintext;
        @$information['İlanın Yeri'] = $sites->find('p[class=one-line-overflow] span' ,0)->plaintext;
        @$information['Araç detayları'] = $sites->find('div[class=car-detail-container] div[class=mb16]' ,0)->plaintext;
        @$information['İlanın Sahibi'] = $sites->find('div[class=user-info] h2' ,0)->plaintext;

        foreach ($sites->find('.thumb-container') as $photo)
        {
            $photos[] = [
                'Küçük Fotoğraf' => $photo->find('img' , 0)->src,
                'Büyük Fotoğraf' => str_replace('120x90' , '800x600' ,$photo->find('img' , 0)->src)
            ];
        }

        foreach ($sites->find('.detail-specs-summary') as $othInformation)
        {
            $otherInformation[] = [
                $othInformation->find('dt' , 0)->plaintext => $othInformation->find('dd' , 0)->plaintext,
            ];
        }

        foreach ($sites->find('div[class=checklist-container] ul li[class=color-grey6]  ') as $hardIinformation)
        {
            $hardwareInformation[] = [
                $hardIinformation->find('span' , 0)->plaintext
            ];
        }

        foreach ($sites->find('ol[class=tags-container] li[class=mb16]  ') as $damage)
        {
            $damageStatus[] = [
                $damage->find('span[class=tag-name]' , 0)->plaintext => $damage->find('span[class=tag-status]' , 0)->plaintext
            ];
        }

        $result[] = [
            'Genel Bilgiler' => $information,
            'Fotoğraflar' => $photos,
            'Diğer Bilgiler' => $otherInformation,
            'Donanım Bilgileri' => $hardwareInformation,
            'Hasar Bilgileri' => $damageStatus
        ];

        return  $result;
    }

}


