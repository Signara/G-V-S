<?php

use Illuminate\Database\Seeder;

class CountryCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('country_codes')->insert([
            'id' => 1,
            'iso' => 'AF',
            'name' => 'AFGHANISTAN',
            'nicename' => 'Afghanistan',
            'iso3' => 'AFG',
            'numcode' => 4,
            'phonecode' => 93,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('country_codes')->insert([
            'id' => 2,
            'iso' => 'AL',
            'name' => 'ALBANIA',
            'nicename' => 'Albania',
            'iso3' => 'ALB',
            'numcode' => 8,
            'phonecode' => 355,
            'created_at' => now(),
            'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 3,
            'iso' => 'DZ',
            'name' => 'ALGERIA',
            'nicename' => 'Algeria',
            'iso3' => 'DZA',
            'numcode' => 12,
            'phonecode' => 213,
            'created_at' => now(),
            'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 4,
            'iso' => 'AS',
            'name' => 'AMERICAN SAMOA',
            'nicename' => 'American Samoa',
            'iso3' => 'ASM',
            'numcode' => 16,
            'phonecode' => 1684,
            'created_at' => now(),
            'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 5,
            'iso' => 'AD',
            'name' => 'ANDORRA',
            'nicename' => 'Andorra',
            'iso3' => 'AND',
            'numcode' => 20,
            'phonecode' => 376,
            'created_at' => now(),
            'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 6,
            'iso' => 'AO',
            'name' => 'ANGOLA',
            'nicename' => 'Angola',
            'iso3' => 'AGO',
            'numcode' => 24,
            'phonecode' => 244,
            'created_at' => now(),
            'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 7,
            'iso' => 'AI',
            'name' => 'ANGUILLA',
            'nicename' => 'Anguilla',
            'iso3' => 'AIA',
            'numcode' => 660,
            'phonecode' => 1264,
            'created_at' => now(),
            'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 8,'iso' => 'AQ','name' => 'ANTARCTICA','nicename' => 'Antarctica','iso3' => NULL,'numcode' => NULL,'phonecode' => 0,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 9,'iso' => 'AG','name' => 'ANTIGUA AND BARBUDA','nicename' => 'Antigua and Barbuda','iso3' => 'ATG','numcode' => 28,'phonecode' =>1268,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 10,'iso' => 'AR','name' => 'ARGENTINA','nicename' => 'Argentina','iso3' => 'ARG','numcode' => 32,'phonecode' =>54,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 11,'iso' => 'AM','name' => 'ARMENIA','nicename' => 'Armenia','iso3' => 'ARM','numcode' => 51,'phonecode' =>374,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 12,'iso' => 'AW','name' => 'ARUBA','nicename' => 'Aruba','iso3' => 'ABW','numcode' => 533,'phonecode' =>297,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 13,'iso' => 'AU','name' => 'AUSTRALIA','nicename' => 'Australia','iso3' => 'AUS','numcode' => 36,'phonecode' =>61,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 14,'iso' => 'AT','name' => 'AUSTRIA','nicename' => 'Austria','iso3' => 'AUT','numcode' => 40,'phonecode' =>43,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert([
            'id' => 15,'iso' => 'AZ','name' => 'AZERBAIJAN','nicename' => 'Azerbaijan','iso3' => 'AZE','numcode' => 31,'phonecode' =>994,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert([
        'id' => 16,'iso' => 'BS','name' => 'BAHAMAS','nicename' => 'Bahamas','iso3' => 'BHS','numcode' => 44,'phonecode' =>1242,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert([
        'id' => 17,'iso' => 'BH','name' => 'BAHRAIN','nicename' => 'Bahrain','iso3' => 'BHR','numcode' => 48,'phonecode' =>973,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert([
        'id' => 18,'iso' => 'BD','name' => 'BANGLADESH','nicename' => 'Bangladesh','iso3' => 'BGD','numcode' => 50,'phonecode' =>880,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 19,'iso' => 'BB','name' => 'BARBADOS','nicename' => 'Barbados','iso3' => 'BRB','numcode' => 52,'phonecode' =>1246,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 20,'iso' => 'BY','name' => 'BELARUS','nicename' => 'Belarus','iso3' => 'BLR','numcode' => 112,'phonecode' =>375,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 21,'iso' => 'BE','name' => 'BELGIUM','nicename' => 'Belgium','iso3' => 'BEL','numcode' => 56,'phonecode' =>32,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 22,'iso' => 'BZ','name' => 'BELIZE','nicename' => 'Belize','iso3' => 'BLZ','numcode' => 84,'phonecode' =>501,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 23,'iso' => 'BJ','name' => 'BENIN','nicename' => 'Benin','iso3' => 'BEN','numcode' => 204,'phonecode' =>229,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 24,'iso' => 'BM','name' => 'BERMUDA','nicename' => 'Bermuda','iso3' => 'BMU','numcode' => 60,'phonecode' =>1441,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 25,'iso' => 'BT','name' => 'BHUTAN','nicename' => 'Bhutan','iso3' => 'BTN','numcode' => 64,'phonecode' =>975,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 26,'iso' => 'BO','name' => 'BOLIVIA','nicename' => 'Bolivia','iso3' => 'BOL','numcode' => 68,'phonecode' =>591,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 27,'iso' => 'BA','name' => 'BOSNIA AND HERZEGOVINA','nicename' => 'Bosnia and Herzegovina','iso3' => 'BIH','numcode' => 70,'phonecode' =>387,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 28,'iso' => 'BW','name' => 'BOTSWANA','nicename' => 'Botswana','iso3' => 'BWA','numcode' => 72,'phonecode' =>267,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 29,'iso' => 'BV','name' => 'BOUVET ISLAND','nicename' => 'Bouvet Island','iso3' => NULL,'numcode' => NULL,'phonecode' =>0,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 30,'iso' => 'BR','name' => 'BRAZIL','nicename' => 'Brazil','iso3' => 'BRA','numcode' => 76,'phonecode' =>55,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 31,'iso' => 'IO','name' => 'BRITISH INDIAN OCEAN TERRITORY','nicename' => 'British Indian Ocean Territory','iso3' => NULL,'numcode' => NULL,'phonecode' =>246,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 32,'iso' => 'BN','name' => 'BRUNEI DARUSSALAM','nicename' => 'Brunei Darussalam','iso3' => 'BRN','numcode' => 96,'phonecode' =>673,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 33,'iso' => 'BG','name' => 'BULGARIA','nicename' => 'Bulgaria','iso3' => 'BGR','numcode' => 100,'phonecode' =>359,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 34,'iso' => 'BF','name' => 'BURKINA FASO','nicename' => 'Burkina Faso','iso3' => 'BFA','numcode' => 854,'phonecode' =>226,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 35,'iso' => 'BI','name' => 'BURUNDI','nicename' => 'Burundi','iso3' => 'BDI','numcode' => 108,'phonecode' =>257,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 36,'iso' => 'KH','name' => 'CAMBODIA','nicename' => 'Cambodia','iso3' => 'KHM','numcode' => 116,'phonecode' =>855,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 37,'iso' => 'CM','name' => 'CAMEROON','nicename' => 'Cameroon','iso3' => 'CMR','numcode' => 120,'phonecode' =>237,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 38,'iso' => 'CA','name' => 'CANADA','nicename' => 'Canada','iso3' => 'CAN','numcode' => 124,'phonecode' =>1,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 39,'iso' => 'CV','name' => 'CAPE VERDE','nicename' => 'Cape Verde','iso3' => 'CPV','numcode' => 132,'phonecode' =>238,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 40,'iso' => 'KY','name' => 'CAYMAN ISLANDS','nicename' => 'Cayman Islands','iso3' => 'CYM','numcode' => 136,'phonecode' =>1345,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 41,'iso' => 'CF','name' => 'CENTRAL AFRICAN REPUBLIC','nicename' => 'Central African Republic','iso3' => 'CAF','numcode' => 140,'phonecode' =>236,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 42,'iso' => 'TD','name' => 'CHAD','nicename' => 'Chad','iso3' => 'TCD','numcode' => 148,'phonecode' =>235,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 43,'iso' => 'CL','name' => 'CHILE','nicename' => 'Chile','iso3' => 'CHL','numcode' => 152,'phonecode' =>56,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 44,'iso' => 'CN','name' => 'CHINA','nicename' => 'China','iso3' => 'CHN','numcode' => 156,'phonecode' =>86,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 45,'iso' => 'CX','name' => 'CHRISTMAS ISLAND','nicename' => 'Christmas Island','iso3' => NULL,'numcode' => NULL,'phonecode' =>61,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 46,'iso' => 'CC','name' => 'COCOS (KEELING) ISLANDS','nicename' => 'Cocos (Keeling) Islands','iso3' => NULL,'numcode' => NULL,'phonecode' =>672,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 47,'iso' => 'CO','name' => 'COLOMBIA','nicename' => 'Colombia','iso3' => 'COL','numcode' => 170,'phonecode' =>57,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 48,'iso' => 'KM','name' => 'COMOROS','nicename' => 'Comoros','iso3' => 'COM','numcode' => 174,'phonecode' =>269,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 49,'iso' => 'CG','name' => 'CONGO','nicename' => 'Congo','iso3' => 'COG','numcode' => 178,'phonecode' =>242,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 50,'iso' => 'CD','name' => 'CONGO','nicename' => 'THE DEMOCRATIC REPUBLIC OF THE Congo','iso3' => 'COD','numcode' => 180,'phonecode' =>242,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 51,'iso' => 'CK','name' => 'COOK ISLANDS','nicename' => 'Cook Islands','iso3' => 'COK','numcode' => 184,'phonecode' =>682,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 52,'iso' => 'CR','name' => 'COSTA RICA','nicename' => 'Costa Rica','iso3' => 'CRI','numcode' => 188,'phonecode' =>506,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 53,'iso' => 'CI','name' => 'COTE DIVOIRE','nicename' => 'Cote DIvoire','iso3' => 'CIV','numcode' => 384,'phonecode' =>225,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 54,'iso' => 'HR','name' => 'CROATIA','nicename' => 'Croatia','iso3' => 'HRV','numcode' => 191,'phonecode' =>385,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 55,'iso' => 'CU','name' => 'CUBA','nicename' => 'Cuba','iso3' => 'CUB','numcode' => 192,'phonecode' =>53,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 56,'iso' => 'CY','name' => 'CYPRUS','nicename' => 'Cyprus','iso3' => 'CYP','numcode' => 196,'phonecode' =>357,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 57,'iso' => 'CZ','name' => 'CZECH REPUBLIC','nicename' => 'Czech Republic','iso3' => 'CZE','numcode' => 203,'phonecode' =>420,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 58,'iso' => 'DK','name' => 'DENMARK','nicename' => 'Denmark','iso3' => 'DNK','numcode' => 208,'phonecode' =>45,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 59,'iso' => 'DJ','name' => 'DJIBOUTI','nicename' => 'Djibouti','iso3' => 'DJI','numcode' => 262,'phonecode' =>253,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 60,'iso' => 'DM','name' => 'DOMINICA','nicename' => 'Dominica','iso3' => 'DMA','numcode' => 212,'phonecode' =>1767,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 61,'iso' => 'DO','name' => 'DOMINICAN REPUBLIC','nicename' => 'Dominican Republic','iso3' => 'DOM','numcode' => 214,'phonecode' =>1809,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 62,'iso' => 'EC','name' => 'ECUADOR','nicename' => 'Ecuador','iso3' => 'ECU','numcode' => 218,'phonecode' =>593,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 63,'iso' => 'EG','name' => 'EGYPT','nicename' => 'Egypt','iso3' => 'EGY','numcode' => 818,'phonecode' =>20,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 64,'iso' => 'SV','name' => 'EL SALVADOR','nicename' => 'El Salvador','iso3' => 'SLV','numcode' => 222,'phonecode' =>503,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 65,'iso' => 'GQ','name' => 'EQUATORIAL GUINEA','nicename' => 'Equatorial Guinea','iso3' => 'GNQ','numcode' => 226,'phonecode' =>240,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 66,'iso' => 'ER','name' => 'ERITREA','nicename' => 'Eritrea','iso3' => 'ERI','numcode' => 232,'phonecode' =>291,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 67,'iso' => 'EE','name' => 'ESTONIA','nicename' => 'Estonia','iso3' => 'EST','numcode' => 233,'phonecode' =>372,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 68,'iso' => 'ET','name' => 'ETHIOPIA','nicename' => 'Ethiopia','iso3' => 'ETH','numcode' => 231,'phonecode' =>251,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 69,'iso' => 'FK','name' => 'FALKLAND ISLANDS (MALVINAS)','nicename' => 'Falkland Islands (Malvinas)','iso3' => 'FLK','numcode' => 238,'phonecode' =>500,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 70,'iso' => 'FO','name' => 'FAROE ISLANDS','nicename' => 'Faroe Islands','iso3' => 'FRO','numcode' => 234,'phonecode' =>298,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 71,'iso' => 'FJ','name' => 'FIJI','nicename' => 'Fiji','iso3' => 'FJI','numcode' => 242,'phonecode' =>679,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 72,'iso' => 'FI','name' => 'FINLAND','nicename' => 'Finland','iso3' => 'FIN','numcode' => 246,'phonecode' =>358,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 73,'iso' => 'FR','name' => 'FRANCE','nicename' => 'France','iso3' => 'FRA','numcode' => 250,'phonecode' =>33,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 74,'iso' => 'GF','name' => 'FRENCH GUIANA','nicename' => 'French Guiana','iso3' => 'GUF','numcode' => 254,'phonecode' =>594,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 75,'iso' => 'PF','name' => 'FRENCH POLYNESIA','nicename' => 'French Polynesia','iso3' => 'PYF','numcode' => 258,'phonecode' =>689,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 76,'iso' => 'TF','name' => 'FRENCH SOUTHERN TERRITORIES','nicename' => 'French Southern Territories','iso3' => NULL,'numcode' => NULL,'phonecode' =>0,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 77,'iso' => 'GA','name' => 'GABON','nicename' => 'Gabon','iso3' => 'GAB','numcode' => 266,'phonecode' =>241,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 78,'iso' => 'GM','name' => 'GAMBIA','nicename' => 'Gambia','iso3' => 'GMB','numcode' => 270,'phonecode' =>220,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 79,'iso' => 'GE','name' => 'GEORGIA','nicename' => 'Georgia','iso3' => 'GEO','numcode' => 268,'phonecode' =>995,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 80,'iso' => 'DE','name' => 'GERMANY','nicename' => 'Germany','iso3' => 'DEU','numcode' => 276,'phonecode' =>49,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 81,'iso' => 'GH','name' => 'GHANA','nicename' => 'Ghana','iso3' => 'GHA','numcode' => 288,'phonecode' =>233,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 82,'iso' => 'GI','name' => 'GIBRALTAR','nicename' => 'Gibraltar','iso3' => 'GIB','numcode' => 292,'phonecode' =>350,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 83,'iso' => 'GR','name' => 'GREECE','nicename' => 'Greece','iso3' => 'GRC','numcode' => 300,'phonecode' =>30,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 84,'iso' => 'GL','name' => 'GREENLAND','nicename' => 'Greenland','iso3' => 'GRL','numcode' => 304,'phonecode' =>299,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 85,'iso' => 'GD','name' => 'GRENADA','nicename' => 'Grenada','iso3' => 'GRD','numcode' => 308,'phonecode' =>1473,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 86,'iso' => 'GP','name' => 'GUADELOUPE','nicename' => 'Guadeloupe','iso3' => 'GLP','numcode' => 312,'phonecode' =>590,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 87,'iso' => 'GU','name' => 'GUAM','nicename' => 'Guam','iso3' => 'GUM','numcode' => 316,'phonecode' =>1671,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 88,'iso' => 'GT','name' => 'GUATEMALA','nicename' => 'Guatemala','iso3' => 'GTM','numcode' => 320,'phonecode' =>502,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 89,'iso' => 'GN','name' => 'GUINEA','nicename' => 'Guinea','iso3' => 'GIN','numcode' => 324,'phonecode' =>224,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 90,'iso' => 'GW','name' => 'GUINEA-BISSAU','nicename' => 'Guinea-Bissau','iso3' => 'GNB','numcode' => 624,'phonecode' =>245,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 91,'iso' => 'GY','name' => 'GUYANA','nicename' => 'Guyana','iso3' => 'GUY','numcode' => 328,'phonecode' =>592,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 92,'iso' => 'HT','name' => 'HAITI','nicename' => 'Haiti','iso3' => 'HTI','numcode' => 332,'phonecode' =>509,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 93,'iso' => 'HM','name' => 'HEARD ISLAND AND MCDONALD ISLANDS','nicename' => 'Heard Island and Mcdonald Islands','iso3' => NULL,'numcode' => NULL,'phonecode' =>0,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 94,'iso' => 'VA','name' => 'HOLY SEE (VATICAN CITY STATE)','nicename' => 'Holy See (Vatican City State)','iso3' => 'VAT','numcode' => 336,'phonecode' =>39,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 95,'iso' => 'HN','name' => 'HONDURAS','nicename' => 'Honduras','iso3' => 'HND','numcode' => 340,'phonecode' =>504,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 96,'iso' => 'HK','name' => 'HONG KONG','nicename' => 'Hong Kong','iso3' => 'HKG','numcode' => 344,'phonecode' =>852,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 97,'iso' => 'HU','name' => 'HUNGARY','nicename' => 'Hungary','iso3' => 'HUN','numcode' => 348,'phonecode' =>36,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 98,'iso' => 'IS','name' => 'ICELAND','nicename' => 'Iceland','iso3' => 'ISL','numcode' => 352,'phonecode' =>354,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 99,'iso' => 'IN','name' => 'INDIA','nicename' => 'India','iso3' => 'IND','numcode' => 356,'phonecode' =>91,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 100,'iso' => 'ID','name' => 'INDONESIA','nicename' => 'Indonesia','iso3' => 'IDN','numcode' => 360,'phonecode' =>62,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 101,'iso' => 'IR','name' => 'IRAN','nicename' => 'ISLAMIC REPUBLIC OF','iso3' => 'IRN','numcode' => 364,'phonecode' =>98,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 102,'iso' => 'IQ','name' => 'IRAQ','nicename' => 'Iraq','iso3' => 'IRQ','numcode' => 368,'phonecode' =>964,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 103,'iso' => 'IE','name' => 'IRELAND','nicename' => 'Ireland','iso3' => 'IRL','numcode' => 372,'phonecode' =>353,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 104,'iso' => 'IL','name' => 'ISRAEL','nicename' => 'Israel','iso3' => 'ISR','numcode' => 376,'phonecode' =>972,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 105,'iso' => 'IT','name' => 'ITALY','nicename' => 'Italy','iso3' => 'ITA','numcode' => 380,'phonecode' =>39,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 106,'iso' => 'JM','name' => 'JAMAICA','nicename' => 'Jamaica','iso3' => 'JAM','numcode' => 388,'phonecode' =>1876,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 107,'iso' => 'JP','name' => 'JAPAN','nicename' => 'Japan','iso3' => 'JPN','numcode' => 392,'phonecode' =>81,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 108,'iso' => 'JO','name' => 'JORDAN','nicename' => 'Jordan','iso3' => 'JOR','numcode' => 400,'phonecode' =>962,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 109,'iso' => 'KZ','name' => 'KAZAKHSTAN','nicename' => 'Kazakhstan','iso3' => 'KAZ','numcode' => 398,'phonecode' =>7,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 110,'iso' => 'KE','name' => 'KENYA','nicename' => 'Kenya','iso3' => 'KEN','numcode' => 404,'phonecode' =>254,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 111,'iso' => 'KI','name' => 'KIRIBATI','nicename' => 'Kiribati','iso3' => 'KIR','numcode' => 296,'phonecode' =>686,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 112,'iso' => 'KP','name' => 'KOREA','nicename' => 'DEMOCRATIC PEOPLES REPUBLIC OF, Korea','iso3' => 'PRK','numcode' => 408,'phonecode' =>850,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 113,'iso' => 'KR','name' => 'KOREA','nicename' => 'REPUBLIC OF,Korea','iso3' => 'KOR','numcode' => 410,'phonecode' =>82,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 114,'iso' => 'KW','name' => 'KUWAIT','nicename' => 'Kuwait','iso3' => 'KWT','numcode' => 414,'phonecode' =>965,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 115,'iso' => 'KG','name' => 'KYRGYZSTAN','nicename' => 'Kyrgyzstan','iso3' => 'KGZ','numcode' => 417,'phonecode' =>996,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 116,'iso' => 'LA','name' => 'LAO PEOPLES DEMOCRATIC REPUBLIC','nicename' => 'Lao Peoples Democratic Republic','iso3' => 'LAO','numcode' => 418,'phonecode' =>856,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 117,'iso' => 'LV','name' => 'LATVIA','nicename' => 'Latvia','iso3' => 'LVA','numcode' => 428,'phonecode' =>371,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 118,'iso' => 'LB','name' => 'LEBANON','nicename' => 'Lebanon','iso3' => 'LBN','numcode' => 422,'phonecode' =>961,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 119,'iso' => 'LS','name' => 'LESOTHO','nicename' => 'Lesotho','iso3' => 'LSO','numcode' => 426,'phonecode' =>266,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 120,'iso' => 'LR','name' => 'LIBERIA','nicename' => 'Liberia','iso3' => 'LBR','numcode' => 430,'phonecode' =>231,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 121,'iso' => 'LY','name' => 'LIBYAN ARAB JAMAHIRIYA','nicename' => 'Libyan Arab Jamahiriya','iso3' => 'LBY','numcode' => 434,'phonecode' =>218,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 122,'iso' => 'LI','name' => 'LIECHTENSTEIN','nicename' => 'Liechtenstein','iso3' => 'LIE','numcode' => 438,'phonecode' =>423,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 123,'iso' => 'LT','name' => 'LITHUANIA','nicename' => 'Lithuania','iso3' => 'LTU','numcode' => 440,'phonecode' =>370,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 124,'iso' => 'LU','name' => 'LUXEMBOURG','nicename' => 'Luxembourg','iso3' => 'LUX','numcode' => 442,'phonecode' =>352,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 125,'iso' => 'MO','name' => 'MACAO','nicename' => 'Macao','iso3' => 'MAC','numcode' => 446,'phonecode' =>853,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 126,'iso' => 'MK','name' => 'MACEDONIA','nicename' => 'THE FORMER YUGOSLAV REPUBLIC OF,Macedonia','iso3' => 'MKD','numcode' => 807,'phonecode' =>389,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 127,'iso' => 'MG','name' => 'MADAGASCAR','nicename' => 'Madagascar','iso3' => 'MDG','numcode' => 450,'phonecode' =>261,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 128,'iso' => 'MW','name' => 'MALAWI','nicename' => 'Malawi','iso3' => 'MWI','numcode' => 454,'phonecode' =>265,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 129,'iso' => 'MY','name' => 'MALAYSIA','nicename' => 'Malaysia','iso3' => 'MYS','numcode' => 458,'phonecode' =>60,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 130,'iso' => 'MV','name' => 'MALDIVES','nicename' => 'Maldives','iso3' => 'MDV','numcode' => 462,'phonecode' =>960,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 131,'iso' => 'ML','name' => 'MALI','nicename' => 'Mali','iso3' => 'MLI','numcode' => 466,'phonecode' =>223,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 132,'iso' => 'MT','name' => 'MALTA','nicename' => 'Malta','iso3' => 'MLT','numcode' => 470,'phonecode' =>356,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 133,'iso' => 'MH','name' => 'MARSHALL ISLANDS','nicename' => 'Marshall Islands','iso3' => 'MHL','numcode' => 584,'phonecode' =>692,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 134,'iso' => 'MQ','name' => 'MARTINIQUE','nicename' => 'Martinique','iso3' => 'MTQ','numcode' => 474,'phonecode' =>596,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 135,'iso' => 'MR','name' => 'MAURITANIA','nicename' => 'Mauritania','iso3' => 'MRT','numcode' => 478,'phonecode' =>222,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 136,'iso' => 'MU','name' => 'MAURITIUS','nicename' => 'Mauritius','iso3' => 'MUS','numcode' => 480,'phonecode' =>230,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 137,'iso' => 'YT','name' => 'MAYOTTE','nicename' => 'Mayotte','iso3' => NULL,'numcode' => NULL,'phonecode' =>269,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 138,'iso' => 'MX','name' => 'MEXICO','nicename' => 'Mexico','iso3' => 'MEX','numcode' => 484,'phonecode' =>52,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 139,'iso' => 'FM','name' => 'MICRONESIA','nicename' => 'FEDERATED STATES OF,Micronesia','iso3' => 'FSM','numcode' => 583,'phonecode' =>691,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 140,'iso' => 'MD','name' => 'MOLDOVA','nicename' => 'REPUBLIC OF,Moldova','iso3' => 'MDA','numcode' => 498,'phonecode' =>373,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 141,'iso' => 'MC','name' => 'MONACO','nicename' => 'Monaco','iso3' => 'MCO','numcode' => 492,'phonecode' =>377,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 142,'iso' => 'MN','name' => 'MONGOLIA','nicename' => 'Mongolia','iso3' => 'MNG','numcode' => 496,'phonecode' =>976,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 143,'iso' => 'MS','name' => 'MONTSERRAT','nicename' => 'Montserrat','iso3' => 'MSR','numcode' => 500,'phonecode' =>1664,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 144,'iso' => 'MA','name' => 'MOROCCO','nicename' => 'Morocco','iso3' => 'MAR','numcode' => 504,'phonecode' =>212,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 145,'iso' => 'MZ','name' => 'MOZAMBIQUE','nicename' => 'Mozambique','iso3' => 'MOZ','numcode' => 508,'phonecode' =>258,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 146,'iso' => 'MM','name' => 'MYANMAR','nicename' => 'Myanmar','iso3' => 'MMR','numcode' => 104,'phonecode' =>95,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 147,'iso' => 'NA','name' => 'NAMIBIA','nicename' => 'Namibia','iso3' => 'NAM','numcode' => 516,'phonecode' =>264,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 148,'iso' => 'NR','name' => 'NAURU','nicename' => 'Nauru','iso3' => 'NRU','numcode' => 520,'phonecode' =>674,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 149,'iso' => 'NP','name' => 'NEPAL','nicename' => 'Nepal','iso3' => 'NPL','numcode' => 524,'phonecode' =>977,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 150,'iso' => 'NL','name' => 'NETHERLANDS','nicename' => 'Netherlands','iso3' => 'NLD','numcode' => 528,'phonecode' =>31,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 151,'iso' => 'AN','name' => 'NETHERLANDS ANTILLES','nicename' => 'Netherlands Antilles','iso3' => 'ANT','numcode' => 530,'phonecode' =>599,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 152,'iso' => 'NC','name' => 'NEW CALEDONIA','nicename' => 'New Caledonia','iso3' => 'NCL','numcode' => 540,'phonecode' =>687,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 153,'iso' => 'NZ','name' => 'NEW ZEALAND','nicename' => 'New Zealand','iso3' => 'NZL','numcode' => 554,'phonecode' =>64,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 154,'iso' => 'NI','name' => 'NICARAGUA','nicename' => 'Nicaragua','iso3' => 'NIC','numcode' => 558,'phonecode' =>505,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 155,'iso' => 'NE','name' => 'NIGER','nicename' => 'Niger','iso3' => 'NER','numcode' => 562,'phonecode' =>227,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 156,'iso' => 'NG','name' => 'NIGERIA','nicename' => 'Nigeria','iso3' => 'NGA','numcode' => 566,'phonecode' =>234,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 157,'iso' => 'NU','name' => 'NIUE','nicename' => 'Niue','iso3' => 'NIU','numcode' => 570,'phonecode' =>683,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 158,'iso' => 'NF','name' => 'NORFOLK ISLAND','nicename' => 'Norfolk Island','iso3' => 'NFK','numcode' => 574,'phonecode' =>672,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 159,'iso' => 'MP','name' => 'NORTHERN MARIANA ISLANDS','nicename' => 'Northern Mariana Islands','iso3' => 'MNP','numcode' => 580,'phonecode' =>1670,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 160,'iso' => 'NO','name' => 'NORWAY','nicename' => 'Norway','iso3' => 'NOR','numcode' => 578,'phonecode' =>47,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 161,'iso' => 'OM','name' => 'OMAN','nicename' => 'Oman','iso3' => 'OMN','numcode' => 512,'phonecode' =>968,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 162,'iso' => 'PK','name' => 'PAKISTAN','nicename' => 'Pakistan','iso3' => 'PAK','numcode' => 586,'phonecode' =>92,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 163,'iso' => 'PW','name' => 'PALAU','nicename' => 'Palau','iso3' => 'PLW','numcode' => 585,'phonecode' =>680,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 164,'iso' => 'PS','name' => 'PALESTINIAN TERRITORY,OCCUPIED','nicename' => 'Palestinian Territory Occupied','iso3' => NULL,'numcode' => NULL,'phonecode' =>970,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 165,'iso' => 'PA','name' => 'PANAMA','nicename' => 'Panama','iso3' => 'PAN','numcode' => 591,'phonecode' =>507,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 166,'iso' => 'PG','name' => 'PAPUA NEW GUINEA','nicename' => 'Papua New Guinea','iso3' => 'PNG','numcode' => 598,'phonecode' =>675,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 167,'iso' => 'PY','name' => 'PARAGUAY','nicename' => 'Paraguay','iso3' => 'PRY','numcode' => 600,'phonecode' =>595,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 168,'iso' => 'PE','name' => 'PERU','nicename' => 'Peru','iso3' => 'PER','numcode' => 604,'phonecode' =>51,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 169,'iso' => 'PH','name' => 'PHILIPPINES','nicename' => 'Philippines','iso3' => 'PHL','numcode' => 608,'phonecode' =>63,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 170,'iso' => 'PN','name' => 'PITCAIRN','nicename' => 'Pitcairn','iso3' => 'PCN','numcode' => 612,'phonecode' =>0,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 171,'iso' => 'PL','name' => 'POLAND','nicename' => 'Poland','iso3' => 'POL','numcode' => 616,'phonecode' =>48,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 172,'iso' => 'PT','name' => 'PORTUGAL','nicename' => 'Portugal','iso3' => 'PRT','numcode' => 620,'phonecode' =>351,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 173,'iso' => 'PR','name' => 'PUERTO RICO','nicename' => 'Puerto Rico','iso3' => 'PRI','numcode' => 630,'phonecode' =>1787,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 174,'iso' => 'QA','name' => 'QATAR','nicename' => 'Qatar','iso3' => 'QAT','numcode' => 634,'phonecode' =>974,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 175,'iso' => 'RE','name' => 'REUNION','nicename' => 'Reunion','iso3' => 'REU','numcode' => 638,'phonecode' =>262,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 176,'iso' => 'RO','name' => 'ROMANIA','nicename' => 'Romania','iso3' => 'ROM','numcode' => 642,'phonecode' =>40,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 177,'iso' => 'RU','name' => 'RUSSIAN FEDERATION','nicename' => 'Russian Federation','iso3' => 'RUS','numcode' => 643,'phonecode' =>70,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 178,'iso' => 'RW','name' => 'RWANDA','nicename' => 'Rwanda','iso3' => 'RWA','numcode' => 646,'phonecode' =>250,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 179,'iso' => 'SH','name' => 'SAINT HELENA','nicename' => 'Saint Helena','iso3' => 'SHN','numcode' => 654,'phonecode' =>290,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 180,'iso' => 'KN','name' => 'SAINT KITTS AND NEVIS','nicename' => 'Saint Kitts and Nevis','iso3' => 'KNA','numcode' => 659,'phonecode' =>1869,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 181,'iso' => 'LC','name' => 'SAINT LUCIA','nicename' => 'Saint Lucia','iso3' => 'LCA','numcode' => 662,'phonecode' =>1758,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 182,'iso' => 'PM','name' => 'SAINT PIERRE AND MIQUELON','nicename' => 'Saint Pierre and Miquelon','iso3' => 'SPM','numcode' => 666,'phonecode' =>508,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 183,'iso' => 'VC','name' => 'SAINT VINCENT AND THE GRENADINES','nicename' => 'Saint Vincent and the Grenadines','iso3' => 'VCT','numcode' => 670,'phonecode' =>1784,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 184,'iso' => 'WS','name' => 'SAMOA','nicename' => 'Samoa','iso3' => 'WSM','numcode' => 882,'phonecode' =>684,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 185,'iso' => 'SM','name' => 'SAN MARINO','nicename' => 'San Marino','iso3' => 'SMR','numcode' => 674,'phonecode' =>378,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 186,'iso' => 'ST','name' => 'SAO TOME AND PRINCIPE','nicename' => 'Sao Tome and Principe','iso3' => 'STP','numcode' => 678,'phonecode' =>239,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 187,'iso' => 'SA','name' => 'SAUDI ARABIA','nicename' => 'Saudi Arabia','iso3' => 'SAU','numcode' => 682,'phonecode' =>966,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 188,'iso' => 'SN','name' => 'SENEGAL','nicename' => 'Senegal','iso3' => 'SEN','numcode' => 686,'phonecode' =>221,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 189,'iso' => 'CS','name' => 'SERBIA AND MONTENEGRO','nicename' => 'Serbia and Montenegro','iso3' => NULL,'numcode' => NULL,'phonecode' =>381,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 190,'iso' => 'SC','name' => 'SEYCHELLES','nicename' => 'Seychelles','iso3' => 'SYC','numcode' => 690,'phonecode' =>248,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 191,'iso' => 'SL','name' => 'SIERRA LEONE','nicename' => 'Sierra Leone','iso3' => 'SLE','numcode' => 694,'phonecode' =>232,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 192,'iso' => 'SG','name' => 'SINGAPORE','nicename' => 'Singapore','iso3' => 'SGP','numcode' => 702,'phonecode' =>65,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 193,'iso' => 'SK','name' => 'SLOVAKIA','nicename' => 'Slovakia','iso3' => 'SVK','numcode' => 703,'phonecode' =>421,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 194,'iso' => 'SI','name' => 'SLOVENIA','nicename' => 'Slovenia','iso3' => 'SVN','numcode' => 705,'phonecode' =>386,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 195,'iso' => 'SB','name' => 'SOLOMON ISLANDS','nicename' => 'Solomon Islands','iso3' => 'SLB','numcode' => 90,'phonecode' =>677,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 196,'iso' => 'SO','name' => 'SOMALIA','nicename' => 'Somalia','iso3' => 'SOM','numcode' => 706,'phonecode' =>252,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 197,'iso' => 'ZA','name' => 'SOUTH AFRICA','nicename' => 'South Africa','iso3' => 'ZAF','numcode' => 710,'phonecode' =>27,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 198,'iso' => 'GS','name' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS','nicename' => 'South Georgia and the South Sandwich Islands','iso3' => NULL,'numcode' => NULL,'phonecode' =>0,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 199,'iso' => 'ES','name' => 'SPAIN','nicename' => 'Spain','iso3' => 'ESP','numcode' => 724,'phonecode' =>34,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 200,'iso' => 'LK','name' => 'SRI LANKA','nicename' => 'Sri Lanka','iso3' => 'LKA','numcode' => 144,'phonecode' =>94,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 201,'iso' => 'SD','name' => 'SUDAN','nicename' => 'Sudan','iso3' => 'SDN','numcode' => 736,'phonecode' =>249,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 202,'iso' => 'SR','name' => 'SURINAME','nicename' => 'Suriname','iso3' => 'SUR','numcode' => 740,'phonecode' =>597,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 203,'iso' => 'SJ','name' => 'SVALBARD AND JAN MAYEN','nicename' => 'Svalbard and Jan Mayen','iso3' => 'SJM','numcode' => 744,'phonecode' =>47,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 204,'iso' => 'SZ','name' => 'SWAZILAND','nicename' => 'Swaziland','iso3' => 'SWZ','numcode' => 748,'phonecode' =>268,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 205,'iso' => 'SE','name' => 'SWEDEN','nicename' => 'Sweden','iso3' => 'SWE','numcode' => 752,'phonecode' =>46,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 206,'iso' => 'CH','name' => 'SWITZERLAND','nicename' => 'Switzerland','iso3' => 'CHE','numcode' => 756,'phonecode' =>41,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 207,'iso' => 'SY','name' => 'SYRIAN ARAB REPUBLIC','nicename' => 'Syrian Arab Republic','iso3' => 'SYR','numcode' => 760,'phonecode' =>963,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 208,'iso' => 'TW','name' => 'TAIWAN','nicename' => 'PROVINCE OF CHINA,Taiwan,Province of China','iso3' => 'TWN','numcode' => 158,'phonecode' =>886,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 209,'iso' => 'TJ','name' => 'TAJIKISTAN','nicename' => 'Tajikistan','iso3' => 'TJK','numcode' => 762,'phonecode' =>992,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 210,'iso' => 'TZ','name' => 'TANZANIA','nicename' => 'UNITED REPUBLIC OF,Tanzania, United Republic of','iso3' => 'TZA','numcode' => 834,'phonecode' =>255,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 211,'iso' => 'TH','name' => 'THAILAND','nicename' => 'Thailand','iso3' => 'THA','numcode' => 764,'phonecode' =>66,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 212,'iso' => 'TL','name' => 'TIMOR-LESTE','nicename' => 'Timor-Leste','iso3' => NULL,'numcode' => NULL,'phonecode' =>670,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 213,'iso' => 'TG','name' => 'TOGO','nicename' => 'Togo','iso3' => 'TGO','numcode' => 768,'phonecode' =>228,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 214,'iso' => 'TK','name' => 'TOKELAU','nicename' => 'Tokelau','iso3' => 'TKL','numcode' => 772,'phonecode' =>690,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 215,'iso' => 'TO','name' => 'TONGA','nicename' => 'Tonga','iso3' => 'TON','numcode' => 776,'phonecode' =>676,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 216,'iso' => 'TT','name' => 'TRINIDAD AND TOBAGO','nicename' => 'Trinidad and Tobago','iso3' => 'TTO','numcode' => 780,'phonecode' =>1868,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 217,'iso' => 'TN','name' => 'TUNISIA','nicename' => 'Tunisia','iso3' => 'TUN','numcode' => 788,'phonecode' =>216,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 218,'iso' => 'TR','name' => 'TURKEY','nicename' => 'Turkey','iso3' => 'TUR','numcode' => 792,'phonecode' =>90,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 219,'iso' => 'TM','name' => 'TURKMENISTAN','nicename' => 'Turkmenistan','iso3' => 'TKM','numcode' => 795,'phonecode' =>7370,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 220,'iso' => 'TC','name' => 'TURKS AND CAICOS ISLANDS','nicename' =>'Turks and Caicos Islands','iso3' => 'TCA','numcode' => 796,'phonecode' =>1649,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 221,'iso' => 'TV','name' => 'TUVALU','nicename' => 'Tuvalu','iso3' => 'TUV','numcode' => 798,'phonecode' =>688,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 222,'iso' => 'UG','name' => 'UGANDA','nicename' => 'Uganda','iso3' => 'UGA','numcode' => 800,'phonecode' =>256,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 223,'iso' => 'UA','name' => 'UKRAINE','nicename' => 'Ukraine','iso3' => 'UKR','numcode' => 804,'phonecode' =>380,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 224,'iso' => 'AE','name' => 'UNITED ARAB EMIRATES','nicename' => 'United Arab Emirates','iso3' => 'ARE','numcode' => 784,'phonecode' =>971,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 225,'iso' => 'GB','name' => 'UNITED KINGDOM','nicename' => 'United Kingdom','iso3' => 'GBR','numcode' => 826,'phonecode' =>44,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 226,'iso' => 'US','name' => 'UNITED STATES','nicename' => 'United States','iso3' => 'USA','numcode' => 840,'phonecode' =>1,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 227,'iso' => 'UM','name' => 'UNITED STATES MINOR OUTLYING ISLANDS','nicename' => 'United States Minor Outlying Islands','iso3' => NULL,'numcode' => NULL,'phonecode' =>1,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 228,'iso' => 'UY','name' => 'URUGUAY','nicename' => 'Uruguay','iso3' => 'URY','numcode' => 858,'phonecode' =>598,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 229,'iso' => 'UZ','name' => 'UZBEKISTAN','nicename' => 'Uzbekistan','iso3' => 'UZB','numcode' => 860,'phonecode' =>998,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 230,'iso' => 'VU','name' => 'VANUATU','nicename' => 'Vanuatu','iso3' => 'VUT','numcode' => 548,'phonecode' =>678,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 231,'iso' => 'VE','name' => 'VENEZUELA','nicename' => 'Venezuela','iso3' => 'VEN','numcode' => 862,'phonecode' =>58,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 232,'iso' => 'VN','name' => 'VIET NAM','nicename' => 'Viet Nam','iso3' => 'VNM','numcode' => 704,'phonecode' =>84,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 233,'iso' => 'VG','name' => 'VIRGIN ISLANDS','nicename' => 'BRITISH,Virgin Islands, British','iso3' => 'VGB','numcode' => 92,'phonecode' =>1284,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 234,'iso' => 'VI','name' => 'VIRGIN ISLANDS, U.S.','nicename' => 'Virgin Islands, U.s.','iso3' => 'VIR','numcode' => 850,'phonecode' =>1340,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 235,'iso' => 'WF','name' => 'WALLIS AND FUTUNA','nicename' => 'Wallis and Futuna','iso3' => 'WLF','numcode' => 876,'phonecode' =>681,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 236,'iso' => 'EH','name' => 'WESTERN SAHARA','nicename' => 'Western Sahara','iso3' => 'ESH','numcode' => 732,'phonecode' =>212,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 237,'iso' => 'YE','name' => 'YEMEN','nicename' => 'Yemen','iso3' => 'YEM','numcode' => 887,'phonecode' =>967,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 238,'iso' => 'ZM','name' => 'ZAMBIA','nicename' => 'Zambia','iso3' => 'ZMB','numcode' => 894,'phonecode' =>260,'created_at' => now(),'updated_at' => now()
        ]);DB::table('country_codes')->insert(['id' => 239,'iso' => 'ZW','name' => 'ZIMBABWE','nicename' => 'Zimbabwe','iso3' => 'ZWE','numcode' => 716,'phonecode' =>263,'created_at' => now(),'updated_at' => now()
        ]);
    }
}

