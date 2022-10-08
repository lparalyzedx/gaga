<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'logo' => 'https://www.redteks.com/images/logo-black.svg',
            'favicon' => 'https://www.redteks.com/images/logo-black.svg',
            'instagram' => 'https://www.instagram.com/redtekskimya/',
            'facebook' => 'https://www.facebook.com/Redteks-Kimya-Tekstil-San-ve-Tic-A%C5%9E-335239720683053/',
            'youtube' => 'https://youtube.com/redtekskimya',
            'linkedin' => 'https://www.linkedin.com/company/redtekskimya/',
            'email' => 'info@redteks.com',
            'twitter' => '05457338357',
            'phone' => '03425031121',
            'address' => '2. Organize Sanayi Bölgesi Dursun Bak Bulvarı No:5 Şehitkamil/Gaziantep',
            'map' => 'https://www.google.com/maps/d/u/0/embed?mid=1eFxxZd31bsn9_n_3kWxfpv2MrIhypfs&ehbc=2E312F&ll=40.99257369999997%2C39.7793105&z=17',
            'company_description' => 'Kalitenin kimyası sloganı ile yola çıkan firmamız 2017 yılında Gaziantep’te kurulmuştur. Tekstil Yardımcı Kimyasalları, Temel Kimyasal, Tekstil Boyaları, Su Kimyasalları, Yapı Kimyasalları ve Softonend markamız adı altında Endüstriyel Temizlik Ürünleri ile kimya sektöründe hizmet vermekteyiz 2018 yılında Alptekin Boya ve 2019 yılında Akkim Kimya Tekstil yardımcı kimyasalları bölge bayiliğini alarak kısa zamanda büyük ivme kazanmış ürün gamımızı genişletmiş bulunmaktayız. Yine 2019 yılında tekstil sektörünün su geri kazanımı ve çevreci politikamız doğrultusunda Su Kimyasalları sektöründe de faaliyet göstermeye başlamış bulunmaktayız. Bünyemizde bulunan geniş kapsamlı Ar-Ge laboratuvarımız,Akkim kimya laboratuvarı ve anlaşmalı olduğumuz üniversite laboratuvarlarını kullanarak sizlere en iyi hizmeti sunmaktayız. Redteks Kimya olarak, temellerimizi müşteri memnuniyeti üzerine kurmuş, ürün kalitesi ve hizmet anlayışı ile kimya sektöründe yurt içi ve yurt dışında tercih edilen firmalar arasındaki konumumuzu daha ileri taşımayı hedefliyoruz. Sürekli büyüyen genç ve dinamik çalışan kadromuz ile kalitemizden ödün vermeden müşterilerimize hizmet vermeye devam edeceğiz.',
            'policy' => '6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”) uyarınca, Şirketimiz tarafından, Veri Sorumlusu sıfatıyla, kişisel verileriniz, iş amaçlarıyla bağlı olarak, aşağıda açıklandığı çerçevede kullanılmak, kaydedilmek, saklanmak, güncellenmek, aktarılmak ve/veya sınıflandırılmak suretiyle işlenecektir. Bu kapsamda Şirketimiz tarafından başta özel hayatın gizliliği olmak üzere, kişilerin temel hak ve özgürlüklerini korumak ve kişisel verilerin korunması amacıyla düzenlenen Kanun ve Yönetmelikler gereğince Şirketimiz, kişisel verilerinizin hukuka aykırı olarak işlenmesini önleme, hukuka aykırı olarak erişilmesini önleme ve muhafazasını sağlama amacıyla, uygun güvenlik düzeyini temin etmeye yönelik tüm teknik ve idari tedbirleri almaktadır.',
            'whyus' => 'meksfosfpsfo',
            'terms' => 'Önemli'
        ]);
    }
}
