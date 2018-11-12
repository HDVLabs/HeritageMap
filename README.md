# What is it? #
_Türkçe için lütfen aşağı bakın_

CultureMapper provides an interface for the Cultural Heritage Inventory of Hrant Dink Foundation, and replaces the interactive map which served between 2015-2018.

For further information about the project please visit https://turkiyekulturvarliklari.hrantdink.org

# How it works? #

CultureMapper uses Leaflet, a lightweight javascript library for interactive maps. Using Leaflet means less vendor lock-in as choosing between tile providers is as easy as changing a variable.

It reads from a (mysql for the moment) database for the geolocation and basic information of cultural heritage sites, creates a geojson and use it to draw the map. Map markers show the ethnicity by color and which kind of site is found by its shape.

Clicking the marker gives a bit more information about the site and shows a thumbnail (if database has any visual of the site). Clicking any information in the popup calls a modal window to show all applicable information on the site.

Administrative panel is merely forms for listing and updating any site or static information in the database.

# Nedir bu? #

CultureMapper, Hrant Dink Vakfı'nın Kültürel Miras Envanteri için arayüz sunar. Bu amaçla yazılmış ve 2015-2018 arasında kullanılmış etkileşimli haritanın yerini almak üzere tasarlanmıştır.

Projeyle ilgili daha çok bilgi için https://turkiyekulturvarliklari.hrantdink.org adresini ziyaret edebilirsiniz.

# Nasıl Çalışır? #

CultureMapper etkileşimli haritalar için hafif bir javascript kitaplığı sunan Leaflet ile çalışır. Bu sayede bir firmanın insafına kalmadan haritayı geliştirme imkânı buluyoruz, zira Leaflet'te harita sağlayıcıyı değiştirmek için tek bir değişkeni güncellemek yetiyor.

Uygulama basitçe bir (şimdilik mysql) veritabanından coğrafi konum ve diğer basit bilgileri sorguladığı bir geojson dosyası oluşturup, bu dosyayla bir harita çiziyor.

Haritadaki imleçler renkleriyle hangi etnik topluluğa ait olduklarını, şekilleriyle de işaret ettikleri yapının işlevini gösterir. İmlece tıklandığında açılan minik baloncukta (varsa) görsel ve basit bilgiler görülebilir. Buradaki herhangi bir bilgiye tıklandığında açılan modal pencerede yapıya ait veritabanında bulunan bilgilerin tamamı okunabilir.

Yönetim paneli ihtiyacı karşılayacak minimum özellikle sadece veritabanını listeleyen ve güncelleyen formlardan ibaret.
