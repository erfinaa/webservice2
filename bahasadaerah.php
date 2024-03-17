<?php
$url = "http://api.codespade.com:4517/codespade/api/bahasa-daerah";
$data = file_get_contents($url);
$result = json_decode($data);

//echo "<pre>";
//print_r($result);

echo "<h2>Daftar Bahasa Daerah</h2>";

if (is_array($result)) {
    echo "<table border='1'>";
    echo "<tr>
    <th>Nomor</th>
    <th>Bahasa</th>
    <th>List Wilayah</th>
    <th>List Provinsi</th>
    </tr>";

    foreach ($result as $language) {
        echo "<tr>";
        echo "<td>" . $language->nomor . "</td>";
        echo "<td>" . $language->bahasa . "</td>";

        echo "<td>";
        foreach ($language->listWilayah as $wilayah) {
            echo $wilayah . "<br>";
        }
        echo "</td>";

        echo "<td>";
        foreach ($language->listProvinsi as $provinsi) {
            echo $provinsi->provinsi . "<br>";
            echo "<ul>";
            foreach ($provinsi->deskripsi as $deskripsi) {
                echo "<li>" . $deskripsi . "</li>";
            }
            echo "</ul>";
        }
        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data available.";
}
?>