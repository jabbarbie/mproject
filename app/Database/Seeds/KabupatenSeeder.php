<?php namespace App\Database\Seeds;

class KabupatenSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $this->db->query("
                    INSERT INTO  tbl_kabupaten (id_kabupaten, id_provinsi, name, status) VALUES
                    ('6101', '61', 'KABUPATEN SAMBAS', '0'),
                    ('6102', '61', 'KABUPATEN BENGKAYANG', '0'),
                    ('6103', '61', 'KABUPATEN LANDAK', '0'),
                    ('6104', '61', 'KABUPATEN MEMPAWAH', '0'),
                    ('6105', '61', 'KABUPATEN SANGGAU', '0'),
                    ('6106', '61', 'KABUPATEN KETAPANG', '0'),
                    ('6107', '61', 'KABUPATEN SINTANG', '0'),
                    ('6108', '61', 'KABUPATEN KAPUAS HULU', '0'),
                    ('6109', '61', 'KABUPATEN SEKADAU', '0'),
                    ('6110', '61', 'KABUPATEN MELAWI', '0'),
                    ('6111', '61', 'KABUPATEN KAYONG UTARA', '0'),
                    ('6112', '61', 'KABUPATEN KUBU RAYA', '0'),
                    ('6171', '61', 'KOTA PONTIANAK', '0'),
                    ('6172', '61', 'KOTA SINGKAWANG', '0'),
                    ('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT', '0'),
                    ('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR', '0'),
                    ('6203', '62', 'KABUPATEN KAPUAS', '1'),
                    ('6204', '62', 'KABUPATEN BARITO SELATAN', '0'),
                    ('6205', '62', 'KABUPATEN BARITO UTARA', '0'),
                    ('6206', '62', 'KABUPATEN SUKAMARA', '0'),
                    ('6207', '62', 'KABUPATEN LAMANDAU', '0'),
                    ('6208', '62', 'KABUPATEN SERUYAN', '0'),
                    ('6209', '62', 'KABUPATEN KATINGAN', '1'),
                    ('6210', '62', 'KABUPATEN PULANG PISAU', '1'),
                    ('6211', '62', 'KABUPATEN GUNUNG MAS', '1'),
                    ('6212', '62', 'KABUPATEN BARITO TIMUR', '0'),
                    ('6213', '62', 'KABUPATEN MURUNG RAYA', '0'),
                    ('6271', '62', 'KOTA PALANGKA RAYA', '1'),
                    ('6301', '63', 'KABUPATEN TANAH LAUT', '0'),
                    ('6302', '63', 'KABUPATEN KOTA BARU', '0'),
                    ('6303', '63', 'KABUPATEN BANJAR', '0'),
                    ('6304', '63', 'KABUPATEN BARITO KUALA', '0'),
                    ('6305', '63', 'KABUPATEN TAPIN', '0'),
                    ('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN', '0'),
                    ('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH', '0'),
                    ('6308', '63', 'KABUPATEN HULU SUNGAI UTARA', '0'),
                    ('6309', '63', 'KABUPATEN TABALONG', '0'),
                    ('6310', '63', 'KABUPATEN TANAH BUMBU', '0'),
                    ('6311', '63', 'KABUPATEN BALANGAN', '0'),
                    ('6371', '63', 'KOTA BANJARMASIN', '0'),
                    ('6372', '63', 'KOTA BANJAR BARU', '0'),
                    ('6401', '64', 'KABUPATEN PASER', '0'),
                    ('6402', '64', 'KABUPATEN KUTAI BARAT', '0'),
                    ('6403', '64', 'KABUPATEN KUTAI KARTANEGARA', '0'),
                    ('6404', '64', 'KABUPATEN KUTAI TIMUR', '0'),
                    ('6405', '64', 'KABUPATEN BERAU', '0'),
                    ('6409', '64', 'KABUPATEN PENAJAM PASER UTARA', '0'),
                    ('6411', '64', 'KABUPATEN MAHAKAM HULU', '0'),
                    ('6471', '64', 'KOTA BALIKPAPAN', '0'),
                    ('6472', '64', 'KOTA SAMARINDA', '0'),
                    ('6474', '64', 'KOTA BONTANG', '0'),
                    ('6501', '65', 'KABUPATEN MALINAU', '0'),
                    ('6502', '65', 'KABUPATEN BULUNGAN', '0'),
                    ('6503', '65', 'KABUPATEN TANA TIDUNG', '0'),
                    ('6504', '65', 'KABUPATEN NUNUKAN', '0'),
                    ('6571', '65', 'KOTA TARAKAN', '0')"
                );
        }
}

?>